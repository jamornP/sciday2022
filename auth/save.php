<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php
use App\Model\Sciday\Auth;

$userObj = new Auth;
$_POST['ck'] = uniqid();
echo "<pre>";
print_r($_POST);
echo "</pre>";
// $ck=explode("@",$_POST['email']);
// if($ck[1]!='kmitl.ac.th'){
//     header("location: /car/pages/auth/register.php?msg=email");
//     exit;
// }
$result = $userObj->createUser($_POST);
if($result) {
    header("location: /science/sciday/auth/login.php");
}else {
    header("location: /science/sciday/auth/register.php?msg=error");
}

?>