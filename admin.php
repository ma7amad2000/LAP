<link rel="stylesheet" href="style.css">
<?php
session_start();
if(isset($_SESSION['id']))
{
    if($_SESSION['type']==0)
    {
        echo $_SESSION['name'];

    }
    else
    {
        echo "<br /> <br/> <center><h1>>_<هذه الصفحه تخص محمد فقط</h1></center>";die;
    }
}
else
{
    header("Location:login.php");
}
if(isset($_GET['out']))
{
    session_destroy();
    header("Location:login.php");
}
include "conect.php";
?>

<br /> <br />
<div class="texts">
    <p class="new"><a href="addNewUser.php">مستخدم <span>جديد</span> </a></p>
    <p class="all"><a href="alluser.php">كل <span>المستخدين</span> </a></p>
</div>
<a href="admin.php?out">تسجيل خروج</a>
