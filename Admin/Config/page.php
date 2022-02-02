<?php
error_reporting(0);

   if($_GET['page']=='dashboard'){
        include 'Page/profile/profile.php';
   }else if($_GET['page']=='akun'){
        include 'Page/akun/akun.php';
   }else if($_GET['page']=='content'){
     include 'Page/content/content.php';
}
?>