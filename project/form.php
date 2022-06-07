<?php require $_SERVER['DOCUMENT_ROOT']."/sciday2022/vendor/autoload.php"?>
<?php //require $_SERVER['DOCUMENT_ROOT']."/sciday2022/auth/auth.php"?>
<?php 
 use App\Model\Sciday\Activity;
    $activityObj = new Activity; 
    $activitys = $activityObj->getActivityById(base64_decode($_REQUEST['activity']));
    $activity_name = $activitys['name'];
 use App\Model\Sciday\Level;
 $levelObj = new Level;   
 use App\Model\Sciday\Title;
 $titleObj = new Title; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sciday-2022</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/sciday2022/components/link.php"?>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="font-prompt fs-18 wave-bg">
    <?php require $_SERVER['DOCUMENT_ROOT']."/sciday2022/components/navbar.php"?>
    <!-- <h1>Sciday-2022</h1> -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg"></div>
            <div class="col-lg-8">
                
            </div>
            <div class="col-lg"></div>
        </div>
        
            <div class="d-flex justify-content-between">
                <span class="badge rounded-pill bg-warning mt-3 shadow">
                    <h2><b>&nbsp;&nbsp;&nbsp;กิจกรรมประกวด โครงงานวิทยาศาสตร์&nbsp;&nbsp;&nbsp;</b></h2>
                </span>
            </div>
            <div class="container mt-3 ">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h4> กรอกรายละเอียดใบสมัคร</h4>
                    </div>
                    <div class="card-body">
                        <hr class="text-warning">
                        <h5 class="text-primary"><b>ส่วนที่ 1 ใช้ในการสมัคร</b></h5>
                        <hr class="text-warning">
                        <form action="save.php" method="post" enctype="multipart/form-data" id="">
                            <input type="hidden" class="form-control" name="activity" value="<?php echo $activity_name;?>">
                            <input type="hidden" class="form-control" name="user_id" value="<?php echo $_SESSION['id'];?>">
                            <div class="row mt-2">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="" class="text-primary"><b class="fs-18">1. ชื่อโครงงานวิทยาศาสตร์<font color="red">*</font></b></label>
                                        <input type="text" class="form-control w-75" name="project_name" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="" class="text-primary"><b class="fs-18">2. ระดับการศึกษาที่เข้าร่วมประกวดโครงงานวิทยาศาสตร์ ประจำปี 2565<font color="red">*</font></b></label>
                                    </div>
                                    <div class="form-group mt-2">
                                        <?php 
                                            $levels =$levelObj->getLevelByActivity('2');
                                            foreach($levels AS $level){
                                                echo "
                                                    <div class='form-check form-check-inline'>
                                                        <input class='form-check-input' type='radio' name='level_id' id='inlineRadio{$level['id']}' value='{$level['id']}' checked>
                                                        <label class='form-check-label' for='inlineRadio{$level['id']}'>{$level['name']}</label>
                                                    </div>
                                                ";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="" class="text-primary"><b class="fs-18">3. ชื่อสถานศึกษา/โรงเรียน <font color="red">*</font> ตัวอย่างการกรอก 'โรงเรียน.......'<font color="red"> ห้ามใช้ ร.ร.</font></b></label>
                                        <input type="text" class="form-control w-75" name="school" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group mt-2">
                                        <label for="" class="text-primary"><b class="fs-18">รายชื่อผู้เข้าประกวดโครงงานวิทยาศาสตร์<font color="red">*</font> <font color="red">(ไม่เกิน 3 คน)</font></b></label>
                                        <ol>
                                            <li>
                                                <div class="d-flex mb-2">
                                                    <div class="">
                                                        <select class="form-select" aria-label="Default select example" name="stitle[]">
                                                            <option selected>คำนำหน้าชื่อ</option>
                                                            <?php 
                                                                $titles = $titleObj->getAllTitle();
                                                                foreach($titles AS $title){
                                                                    echo "
                                                                        <option value='{$title['id']}'>{$title['name']}</option>
                                                                    ";
                                                                }
                                                            ?>
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ชื่อ" name="sname[]">
                                                    </div>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="นามสกุล" name="ssurname[]">
                                                    </div>
                                                    <button class="btn btn-success mx-2 sbtn-add text-white">เพิ่ม</button>
                                                    <button class="btn btn-danger sbtn-remove text-white">ลบ</button>
                                                </div>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group mt-2">
                                        <label for="" class="text-primary"><b class="fs-18">อาจารย์ที่ปรึกษาโครงงานวิทยาศาสตร์ <font color="red">(ไม่เกิน 2 คน)</font></b></label>
                                        <ol>
                                            <li>
                                                <div class="d-flex mb-2">
                                                    <div class="">
                                                        <select class="form-select" aria-label="Default select example" name="ttitle[]">
                                                            <option selected>คำนำหน้าชื่อ</option>
                                                            <?php 
                                                                foreach($titles AS $title){
                                                                    echo "
                                                                        <option value='{$title['id']}'>{$title['name']}</option>
                                                                    ";
                                                                }
                                                            ?>
                                                            <!-- <option value="1">เด็กชาย</option>
                                                            <option value="2">เด็กหญิง</option>
                                                            <option value="3">นาย</option>
                                                            <option value="3">นางสาว</option>
                                                            <option value="3">นาง</option> -->
                                                        </select>
                                                    </div>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ชื่อ" name="tname[]">
                                                    </div>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="นามสกุล" name="tsurname[]">
                                                    </div>
                                                    <button class="btn btn-success mx-2 tbtn-add text-white">เพิ่ม</button>
                                                    <button class="btn btn-danger tbtn-remove text-white">ลบ</button>
                                                </div>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group mt-2">
                                        <div class="mb-3 w-75">
                                            <label for="formFileMultiple" class="form-label text-primary "><b class="fs-18">Upload ไฟล์ใบสมัคร ความยาวไม่เกิน 5 หน้ากระดาษ A4<font color="red">*</font></b></label>
                                            <input class="form-control" type="file" id="formFileMultiple" name="file_doc" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group mt-2">
                                        <div class="mb-3 w-75">
                                            <label for="formFileMultiple" class="form-label text-primary "><b class="fs-18">Upload ไฟล์รูปภาพ <font color="red">( *.png หรือ *.jpg )</font> เท่านั้น</b></label>
                                            <div class="container">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="dropzone" id="drop"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="text-warning">
                           
                                            
                            <!-- <div class="form-control"> -->
                                <div class="d-flex flex-row-reverse bd-highlight mt-3">
                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                </div>
                            <!-- </div> -->
                        </form>
                    </div>
                </div>
                
            </div>
       
    </div>
    <br>
    <br>
    <br>
    <script src="js/script.js"></script>
    <script src="js/drop.js"></script>
    <script>
        function readURL(input) {
            if (input.files[1]) {
                let reader = new FileReader();
                document.querySelector('#imgControl').classList.replace("d-none", "d-block");
                reader.onload = function(e) {
                    let element = document.querySelector('#imgUpload');
                    element.setAttribute("src", e.target.result);
                }
                reader.readAsDataURL(input.files[1]);
            
            }
        }
    </script>
    </div>
  
</body>

</html>