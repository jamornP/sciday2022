<?php 
 use App\Model\Sciday\Activity;
 $activityObj = new Activity;  
 use App\Model\Sciday\Level;
 $levelObj = new Level;  
 use App\Model\Sciday\Project;
 $projectObj = new Project;  
 session_start(); 
?>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark fs-24" style="height: 80px; background-color:rgb(2,29,75);">
    <div class="container-fluid" >
        <a class="navbar-brand fs-28" href="#"><i class='bx bx-planet'></i> Science Day&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/science/sciday/pages/"><i class='bx bx-home-circle' ></i> หน้าหลัก</a>
                </li>
                <!-- $_SESSION['role']=='member' OR $_SESSION['role']=='chairman' -->
                <?php if($_SESSION['role']=='member' OR $_SESSION['role']=='chairman' OR 1==1){ ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bx-edit-alt'></i> กิจกรรม
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown" style="background-color:rgb(233,152,20);">
                            <?php 
                                $activitys = $activityObj->getActivityByYear('2022');
                                foreach($activitys as $activity){
                                    $activitty = base64_encode($activity['id']);
                                    echo "
                                        <li><a class='dropdown-item fs-18' href='{$activity['link']}?activity={$activitty}'><i class='bx bx-chevron-right-circle' ></i> {$activity['name']}</a></li>
                                    ";
                                }
                            ?>
                        </ul>
                    </li>
                <?php } ?> 
                <?php if($_SESSION['role']=='committee' OR $_SESSION['role']=='chairman'){ ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bx bx-edit-alt'></i> ทีมที่สมัคร <?php //echo $_SESSION['activity'];?>
                    </a>
                    <ul class="dropdown-menu bg-warning " aria-labelledby="navbarScrollingDropdown" style="background-color:rgb(233,152,20);">
                        <?php
                        $levels = $levelObj->getLevelByActivity ($_SESSION['activity']);
                        foreach($levels AS $level){
                            echo "
                                <li><a class='dropdown-item fs-18' href='/science/sciday/project/admin.php?activity={$_SESSION['activity']}&level={$level['id']}'><i class='bx bx-chevron-right-circle' ></i> {$level['name']}</a></li
                            ";
                        }
                        ?>
                        >
                    </ul>
                </li>
                <?php } ?>
                <?php if($_SESSION['role']=='chairman'){ ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bx bx-edit-alt'></i> สรุปผลการแข่งขัน
                    </a>
                    <ul class="dropdown-menu bg-warning " aria-labelledby="navbarScrollingDropdown" style="background-color:rgb(233,152,20);">
                        <?php
                        $levels = $levelObj->getLevelByActivity ($_SESSION['activity']);
                        foreach($levels AS $level){
                            echo "
                                <li><a class='dropdown-item fs-18' href='/science/sciday/project/manage.php?activity={$_SESSION['activity']}&level={$level['id']}'><i class='bx bx-chevron-right-circle' ></i> {$level['name']}</a></li
                            ";
                        }
                        ?>
                        >
                    </ul>
                </li>
                <?php } ?>
            </ul>
            <div class="d-flex">
                <?php if($_SESSION['login']){?>
                    
                        
                            <a class="nav-link dropdown-toggle active text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['name']." ".$_SESSION['surname']." (".$_SESSION['role'].")" ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown" style="background-color:rgb(96,168,197);"  >
                            <a class="dropdown-item" href="">ข้อมูลที่สมัครกิจกรรม</a>
                            <hr class="dropdown-divider">
                                <?php  
                                    $pros = $projectObj->getProjectByUser($_SESSION['id']);
                                    foreach($pros AS $pro){
                                        $pro_id = base64_encode($pro['id']);
                                        echo "
                                            <a class='dropdown-item' href='/science/sciday/project/member.php?activity=2&project_id={$pro_id}'><i class='bx bx-right-arrow-alt' ></i> {$pro['project_name']}</a>
                                        ";
                                    }
                                ?>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item" href="/science/sciday/auth/logout.php">ออกจากระบบ</a>
                            </div>
                       
                   
                <?php }else{?>
                    <a class="nav-link text-white" href="/science/sciday/auth/register.php"><i class='bx bx-registered' ></i> ลงทะเบียน</a>
                    <div class="vr"></div>
                    <a class="nav-link text-white" href="/science/sciday/auth/login.php"><i class='bx bx-user-circle'></i> เข้าสู่ระบบ</a>
                <?php }?>
            </div>
            
        </div>
    </div>
</nav>