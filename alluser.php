<?php
session_start();
if(isset($_SESSION['id']))
{
    if($_SESSION['type']==0)
    {
      
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
include "conect.php";
?>
<link rel="stylesheet" href="style1.css">
<div class="all">
    <table class="tab" border="1">
        <tr class="t-r">
           <td><strong>User ID</strong></td> 
           <td><strong>User Name</strong></td>
           <td></td>
           <td></td>

        </tr>
        
        <?php
        if(isset($_GET['id']))
        {
            mysqli_query($conn,"DELETE FROM `t_user` WHERE `user_id`=$_GET[id]");
        }
        $userData=mysqli_query($conn,"SELECT `user_id`, `user_name` FROM `t_user` WHERE `Type`=1 ");
        while($row=mysqli_fetch_array($userData))
        {
            echo "<tr style=' text-align: center;'>";
            echo "<td>".$row['user_id']."</td>";
            echo "<td>".$row['user_name']."</td>";
            echo "<td><a href='alluser.php?id=$row[user_id]'>حذف</a></td>";
            echo "<td><a href='edit.php?id=$row[user_id]'>تعديل</a></td>";
            echo "</tr>";
        }
        ?>

    </table>
</div>