<!DOCTYPE html>
<!--update admin page -->
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Market |تحديث المنتجات</title>
    <link rel="stylesheet" href="index.css">
<style>
    body{

background-image: url(logo.webp);
background-size: 100% 100%;
background-attachment: fixed;

}
</style>
</head>
<body>
  <?php

include('config.php');
$ID=$_GET['id'];
$up=mysqli_query($con,"select * from product where id=$ID");
$data=mysqli_fetch_array($up)

?>
    <center>
        <div class="main">
            <form action="up.php" method="post" enctype="multipart/form-data">
                <h2> تعديل المنتجات</h2>
                <input type="text" name='id' value='<?php echo $data['id']?>' >
                <br>
                <input type="text" name='name' value='<?php echo $data['name']?>' >
                <label> تعديل اسم المنتج </label>
                <br>
                <input type="text" name='price' value='<?php echo $data['price']?>' >
                <label> تعديل سعر المنتج</label>
                <br>
                <input type="file" id="file" name='image' style='display:none;'>
                <label for="file">تحديث صورة المنتج</label>
                <button name=" update" type="submit "> ✅تحديث المنتج</button>
                <br><br>
                <a href="products.php">  عرض كل المنتجات</a>
            </form>
        </div>
       <br><br><br><br><br><br><br><br><br><br> <p> <b><i>Developer by Brothers</i> </b></p>
    </center>
</body>
</html>
