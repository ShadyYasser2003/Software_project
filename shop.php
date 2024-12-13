<!DOCTYPE html>
<!-- shop of user -->
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products| المنتجات </title>
    
</head>
<body>
   <nav class="navbar navbar-dark bg-dark">
      <a id="aa" class="navbar-brand" href="card.php"> MyCard | عربتي</a>
   </nav>
   <style>
    body{

        background-image: url(back\ ground1.jpg );
        background-size: 100% 100%;
        background-attachment: fixed;
    }
       h3{
        font-family: 'Cairo', sans-serif;
        font-weight: bold;
        color: black;
        font-size:25px;
       }
       .card{
         font-size: larger;
         padding: 20px ;
         font-family: 'Cairo', sans-serif;
         float: right;
         margin-top: 20px;
         margin-left: 10px;
         margin-right: 10px;
         color: black;
         box-shadow:1px 1px 1px rgb(sliver) ;
         border:2px solid white;
       }
      .card img{
         box-shadow: silver;
        width: 200px;
        height: 200px;

      }
      
      a{
        text-decoration:none;
        font-size: 20px;
        font-family: 'Cairo', sans-serif;
        font-weight: bold;
        background-color: #1F87CF;
        color: white;
    
    } 
    #aa{
        margin-left: 70px;
        text-decoration: none;
        color: white;
    }
.card-title
{
    font-size:20px;
}
.card-text
{
    font-size:20px;
         font-weight: 800;
}

      
    </style>

   <Center>
    <H3> المنتجات المتوفرة</H3>
   </Center>
   <?php
include('config.php');
$result = mysqli_query($con,"SELECT *FROM product");
while($row =mysqli_fetch_array($result))
{
    echo"
    <center>
    <main>
    <div class='card' style='width: 18rem;'>
       <img src='$row[image]' >
       <div class='card-body'>
           <h5 class='card-title'>$row[name]</h5>
           <p class='card-text'>$row[price]</p>
           <a href='val.php?  id=$row[id]' > اضافة المنتج للعربة </a>

       </div>
    </div>
    </main>
    <center>
    ";
}
   ?>



</body>
</html>
