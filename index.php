<?php
require_once 'config/connect.php';
$goods = mysqli_query($connect, "SELECT * FROM `goods`");
$goods = mysqli_fetch_all($goods);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <table>
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>&#8657  </th>
            <th>&#9998</th>
            <th>&#10006</th>
        </tr>
        <?php
        foreach ($goods as $item) {
        ?>
            <tr>
                <td><?php echo $item[0]; ?></td>
                <td><?php echo $item[1]; ?></td>
                <td><?php echo $item[2]; ?></td>
                <td><?php echo $item[3]; ?></td>
                <td><a href="product.php?id=<?= $item[0] ?>">Watch</a></td>
                <td><a href="update.php?id=<?= $item[0] ?>">Update</a></td>
                <td><a href="/vendor/delete.php?id=<?= $item[0] ?>">Delete</a></td>
            </tr>
        <?php
        }
        ?>

    </table>
    <h2>Add one good</h2>
    <form action="vendor/create.php" method="post">
        <p>Name</p>
        <input type="text" name="title">
        <p>Description</p>
        <textarea name="description"></textarea>
        <p>Price</p>
        <input type="number" name="price">
        <button type="submit">Add </button>
    </form>

</body>

</html>