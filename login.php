<?php
include "conect.php";
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="login">
    <form action="login.php" method="post">
        <table>
            <tr>
                <td><label class="user"> اسم المستخدم : </label></td>
                <td><input type="text" name="name" value="" / class="inuse"><br /> <br /></td>
            </tr>
              <tr>
                <td><label class="pass">كلمة السر :</label></td>
                <td> <input type="password" name="pass"value="" / class="inpass"><br /> <br /></td>
              </tr>

              <tr>
                <td> <input type="submit" name="login" value="تسجيل دخول" / class="log"></td>
              </tr>

        </table>
   
      
        
       
       
    </form>
    <?php
    if (isset($_POST['login']))
    {
      if(! empty($_POST['name']))
      {
        if(is_numeric($_POST['name']))
      {
        if(!empty($_POST['pass']))
        {
          $name=$_POST['name'];
          $pass=$_POST['pass'];
          $userData=mysqli_query($conn,"SELECT `user_id`, `user_name`, `user_pass`, `Type` FROM `t_user` WHERE  `user_id`=$id and `user_pass`='$pass'");
          $userData=mysqli_fetch_assoc($userData);
          if(!empty($userData))
          {
            $_SESSION['type']=$userData['Type'];
            $_SESSION['name']=$name;
            $_SESSION['id']=$userData['user_id'];
            if($_SESSION['tybe']=='admin')
            {
               header("Location:admin.php");
           }
         
        
          
             
          }
          else
          {
            echo "لا يوجد مستخدم بهاذا الاسم";
          }

       
        }
        else
        {
          echo "<br /> رجاء ادخال كلمة السر ^_^";
        }
      }
      else
      {
        echo "<br /> الاسم غير صالح>_<";
      }
      }
      else
      {
        echo "<br /> >_<قلنا ادخل قيمه صحيحه";
      }
    }
    ?>

</div>    
</body>
</html>