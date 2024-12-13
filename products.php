<!DOCTYPE html>
<!-- product of admin -->
<html lang="en">
<head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products | المنتجات الخاصة بنا</title>
   <style>
       /* إعدادات الخلفية */
       body {
           background: linear-gradient(135deg, rgb(207, 185, 151), rgb(231, 215, 195), rgb(245, 237, 224));
           margin: 0;
           font-family: 'Cairo', sans-serif;
       }

       /* إعدادات العنوان */
       h3 {
           font-weight: bold;
           color: black;
           font-size: 2em;
           text-align: center;
           margin: 20px 0;
       }

       /* إعدادات حاوية الكروت */
       .card-container {
           display: flex;
           flex-wrap: wrap;
           gap: 20px;
           justify-content: center;
           padding: 20px;
           margin-top: 20px;
       }

       /* إعدادات الكرت */
       .card {
           width: 250px;
           background-color: #fff;
           border-radius: 8px;
           box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
           overflow: hidden;
           display: flex;
           flex-direction: column;
           text-align: center;
           padding: 15px;
       }

       /* إعدادات الصورة داخل الكرت */
       .card img {
           width: 100%;
           height: 180px;
           object-fit: cover;
           border-radius: 8px 8px 0 0;
       }

       /* إعدادات العنوان داخل الكرت */
       .card-title {
           font-size: 18px;
           color: #333;
           margin: 10px 0 5px;
       }

       /* إعدادات النص داخل الكرت */
       .card-text {
           font-size: 14px;
           color: #666;
           margin-bottom: 10px;
       }

       /* إعدادات الروابط (الأزرار) */
       a {
           text-decoration: none;
           font-size: 15px;
           padding: 10px 15px;
           font-weight: bold;
           color: white;
           border-radius: 5px;
           margin: 5px;
       }

       /* زر تعديل المنتج */
       .edit {
           background-color: #28a745; /* لون أخضر للتعديل */
       }

       /* زر حذف المنتج */
       .del {
           background-color: #dc3545; /* لون أحمر للحذف */
       }
   </style>
</head>
<body>
    <h3>جميع منتجاتنا</h3>

    <?php
    include('config.php');
    $result = mysqli_query($con, "SELECT * FROM product");
    echo "<div class='card-container'>";
    while($row = mysqli_fetch_array($result)) {
        echo "
            <div class='card'>
                <img src='$row[image]' class='card-img-top'>
                <div class='card-body'>
                    <h5 class='card-title'>$row[name]</h5>
                    <p class='card-text'>$row[price]</p>
                    <a href='delete.php?id=$row[id]' class='del'>حذف المنتج</a>
                    <a href='update.php?id=$row[id]' class='edit'>تعديل المنتج</a>
                </div>
            </div>
        ";
    }
    echo "</div>";
    ?>
</body>
</html>
