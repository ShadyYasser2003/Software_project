<!DOCTYPE html>
<!-- html page of admin -->
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Market | اضافة المنتجات</title>
    <link rel="stylesheet" href="index.css">

</head>
<body>
    <style>
body{

background-image: url(logo.webp);
background-size: 100% 100%;
background-attachment: fixed;

}
h2{
font-family: 'Cairo', sans-serif;
font-weight: bold;
font-stretch: 40%;
}
.main{
width: 40;
box-shadow: lpx 1px 10px silver;
margin-top: 45px;
padding: 10px;
}
input{
margin-bottom: 10px;
width: 25%;
padding: 5px;
font-family: 'Cairo', sans-serif;
font-size: 15px;
font-weight: bold;
margin-inline-start: 10px;

}
button{
border : none;
padding: 10px;
width: 420;
font-weight: bold;
font-size: 15px;
background-color: #633c2c;
cursor: pointer;
font-family: 'Cairo', sans-serif;
margin-bottom: 15px;
color:white;
}
label{
padding: 10px;
cursor: pointer;
font-weight: bold;
font-size: 15px;
background-color: #965c44;
font-family: 'Cairo', sans-serif;
color: white;
}
a {
text-decoration:none;
font-size: 20px;
font-family: 'Cairo', sans-serif;
font-weight: bold;
background-color: #965c44;
color: white;

}
p{
    margin-top: 50px;
}
    </style>
    <center>
        <div class="main">
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <h2>Online Coffee </h2>     
                <input type="text" name='name' >
                <label> اسم المنتج</label>
                <br>
                <input type="text" name='price'>
                <label> سعر المنتج</label>
                <br>
                <input type="file" id="file" name='image' style='display:none;'>
                <label for="file">ااضافة صورة للمنتج</label>
                <button name=" upload"> ✅اضافة المنتج</button>
                <br><br>
                <a href="products.php">  عرض كل المنتجات</a>
            </form>
        </div>
       <p>Developer by Brothers</p>
    </center>
</body>
</html>
