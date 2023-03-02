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
?>
<link rel="stylesheet" href="adduse.css">
<center> 
<div class="add">
 
<form action="" method="post">
    <?php
   $userId=mysqli_query($conn,"SHOW TABLE STATUS FROM `loginform` LIKE 't_user'");
   $userId=mysqli_fetch_assoc($userId);
   $userId=$userId['Auto_increment'];
    ?>
   <table>
    <tr>
        <td> <label>User ID</label> </td>
        <td> <input type="text" name="id" value="<?php echo $userId ?>" readonly="" style="background-color:silver ;"/></td>
    </tr>
    <tr><td colspan="2"><br/></td></tr>
    <tr>
        <td> <label>User name</label></td>
        <td><input type="text" name="name" value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>"/></td>
    </tr>
    <tr><td colspan="2"><br/></td></tr>
    <tr>
        <td>password</td>
        <td><input type="password" name="pass" value="<?php if(isset($_POST['pass'])){echo $_POST['pass'];} ?>"/></td>
    </tr>
    <tr><td colspan="2"><br/></td></tr>
    <tr>
        <td>Confirm</td>
        <td><input type="password" name="c_pass" value="<?php if(isset($_POST['c_pass'])){echo $_POST['c_pass'];} ?>"></td>
    </tr>
    <tr><td colspan="2"><br/></td></tr>
    <tr>
        <td colspan="2" style="text-align:center;"><input type="submit" name="save" value="Save"></td>
    </tr>
    <?php
   if(isset($_POST['save'])) 
   {
      if(!empty($_POST['name']))
      {
        if(!empty($_POST['pass']))
        {
            if($_POST['pass']==$_POST['c_pass'])
            {
                $name=$_POST['name'];
                $pass=$_POST['pass'];
                if(mysqli_query($conn,"INSERT INTO `t_user`(`user_name`, `user_pass`, `Type`) VALUES ('$name',' $pass','1')"))
                {
                    echo "تم اضافة مستخدم جديد";
                }

            }
            else
            {
                echo "<br /> <p>كلمة السر غير متطابقه</p>";
            }
        }
        else
        {
            echo "<br/> <p>ادخل كملة مرور قويه</p>";
        }
      }
      else
      {
        echo "<br/> <p>رجاء ادخل الاسم</p>";
      }
    

   }
     ?>
   </table>
   </center>
  
</form>
</div>
