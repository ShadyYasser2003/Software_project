<!DOCTYPE html>
<!-- sales product -->
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عربتي| منتجاتي </title>
</head>
<body>
    <style>
        body{
            background-color: whitesmoke;
        }
        h3{
            font-family: 'Cairo', sans-serif;
        font-weight: bold;
        color: black;
        font-size:x-large;
        }
        main{
            width: 40%;
            margin-top: 30px;
        }
        table{ 
            box-shadow: 1px 1px 20px silver;
            font-size: x-large;
            padding: .5rem;
            width: 50%;
            
        }
        thead{
            background: #3498DB;
            color: white;
        }
        tbody{
            text-align: center;
            background-color: aliceblue;
        }
        
        .del
        {
    padding:2px ;     
    text-decoration:none;
    display:block;
    font-size: large;
    font-family: 'Cairo', sans-serif;
    font-weight: bold;
    background-color: red;
    color: white; 
        }
#aa{
    background-color:steelblue ;
    display: block;
    width:15em;
    padding:5px ;
 border-radius:50%;
    text-decoration:none;
    font-size: large;
    font-family: 'Cairo', sans-serif;
    font-weight: bold;
    color: white;
}
.a2
{
    background-color:green ;
    padding: 5px;
    padding:5px ;
    border-radius:50%;
    text-decoration:none;
    font-size: large;
    font-family: 'Cairo', sans-serif;
    font-weight: bold;
    color: white;

}
    </style>
    
<center>
    <h3>
        منتجاتك المحجوزة
    </h3>
</center>
    
   <?php
   include('config.php');
   $result=mysqli_query($con,"select * from addcard ");
   while($row=mysqli_fetch_array($result)){
echo"
<center>
<table class='table'>
    <thead>
    <tr>
        <th scope='clo'> product name</th>
        <th scope='clo'>product price  </th>
        <th scope='clo'> Delete product</th>
    </tr>

    </thead>
    <tbody>
        <tr>
               <td>$row[name]</td>
                  <td>$row[price]</td>
                     <td> <a href='del_card.php? id=$row[id]' class='del'> ازالة</a> </td>
        </tr>
    </tbody>
</table>
</center>
            "
   ;}
   ?>
    <center><br>
        <a id='aa' href="shop.php"> الرجوع الي صفحة المنتجات</a><br><br>
        <a class="a2" href="payment.php"> تأكيد الشراء</a>
    </center>
</body>
</html>