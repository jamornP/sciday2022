<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"?>
<?php
use App\Model\Sciday\Auth;
$userObj = new Auth;

print_r($_REQUEST);
 $result = $userObj->checkUser($_POST);
if($result) {
    
    // if($_SESSION['role']=='admin'){
    //     header("location: /car/pages/book/index.php");
    // }else{
    //     header("location: /car/pages/member/index.php");
    // }
    header("location: /science/sciday/pages/index.php");
}else {
    header("location: /science/sciday/auth/login.php?msg=error");
}
?>