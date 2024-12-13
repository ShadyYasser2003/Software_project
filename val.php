<?php
//confirm your parchase
include('config.php');
$ID=$_GET['id'];
$up=mysqli_query($con,"select * from product where id=$ID");
$data=mysqli_fetch_array($up)

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تاكيد شراء المنتج </title>
</head>
<body>
    <style>
        input{
            display: none;
        }
       .main{
         width:13em;
         position: relative;
         left:36em;
        font-size: large;
        padding: 20px  ;
        margin-top: 20px;
        box-shadow:0px -2px 20px 7px silver;

       }
        button{
            border : none;
padding: 10px;
width: 408;
font-weight: bold;
font-size: 15px;
background-color:yellow;
cursor: pointer;
font-family: 'Cairo', sans-serif;
margin-bottom: 15px;
        }
    </style>
    <div class="main">
    <center>
        <form action="insertion.php" method="post">
        <h2>هل فعلا تريد اضافة المنتج</h2>
            <input type="text" name="id"  value="<?php echo $data['id']?>">
            <input type="text" name="name" value="<?php echo $data['name']?>">
            <input type="text" name="price" value="<?php echo $data['price']?>">
            <button name="add" type="submit" >تأكيد اضافة المنتج للعربة</button>
            <br>
<a href="shop.php">الرجوع لصفحة المنتجات</a>
  </form>  
</center>
    </div>
    
</body>
</html>