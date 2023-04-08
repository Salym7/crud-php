<?php
require_once 'config/connect.php';
$goods_id = $_GET['id'];
$good = mysqli_query($connect, "SELECT * FROM `goods` WHERE `id`='$goods_id'");
$good = mysqli_fetch_assoc($good);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update good</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <h2>Update this good</h2>
    <form action="vendor/update.php" method="post">
        <input type="hidden" name="id" value="<?= $goods_id  ?>">
        <p>Name</p>
        <input type="text" name="title" value="<?= $good['title']  ?>">
        <p>Description</p>
        <textarea name="description"><?= $good['description'] ?></textarea>
        <p>Price</p>
        <input type="number" name="price" value="<?= $good['price']  ?>">
        <button type="submit">Add </button>
    </form>

</body>

</html>