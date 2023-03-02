<?php
session_start();
if(isset($_SESSION['id']))
{
    if(!$_SESSION['type']==0)
    {
        echo "<br /> <br/> <center><h1>>_<هذه الصفحه تخص محمد فقط</h1></center>";die;

    }
}
else
{
     header("Location:login.php");
}
include "conect.php";
$userData=mysqli_query($conn,"SELECT `user_id`, `user_name`, `user_pass`, `Type` FROM `t_user` WHERE  `user_id`=$_GET[id]");
$userData=mysqli_fetch_assoc($userData);
if(! isset($_POST['save']))
{
    $_POST['id']=$userData['user_id'];
    $_POST['name']=$userData['user_name'];
    $_POST['pass']=$userData['user_pass'];
}
?>
<html dir="rtl">
<link rel="stylesheet" href="adduse.css">
<div class="add">
    <center>
    <form action="" method="post">
        <table>
            <tr>
                <td>معرف المستخدم</td>
                <td class="id"><input type="text" name="id" value="<?php if (isset($_POST['name'])) {echo $_POST['name'];}?>" readonly=""></td>
            </tr>
            <tr>
                <td>اسم المستخدم</td>
                <td><input type="text" name="name" value="<?php if (isset($_POST['id'])) {echo $_POST['id'];}?>"></td>
            </tr>
            <tr>
                <td>كلمة مرور</td>
                <td><input type="password" name="pass" value="<?php if (isset($_POST['pass'])) {echo $_POST['pass'];}?>"></td>
            </tr>
            <tr>
                <td colspan="2" class="save"><input type="submit" name="save" value="حفظ"></td>
            </tr>
        </table>
    </form>
    </center>
</div>




</html>