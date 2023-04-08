<?php
require_once 'config/connect.php';
$goods_id = $_GET['id'];
$good = mysqli_query($connect, "SELECT * FROM `goods` WHERE `id`='$goods_id'");
$good = mysqli_fetch_assoc($good);
$comments = mysqli_query($connect, "SELECT * FROM `comments`");
$comments = mysqli_fetch_all($comments);
function filter_by_second_value($arr)
{
    global $goods_id;
    return $arr[1] == $goods_id;
}
$comments = array_filter($comments, 'filter_by_second_value');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head><input type="hidden" name="id" value="<?= $goods_id  ?>">

<body>
    <a href="/">main page</a>
    <hr>
    <h2><?= $good['title']; ?></h2>
    <div><?= $good['description']; ?></div>
    <div><?= $good['price']; ?></div>
    <hr>
    <form action="vendor/comments.php" method="post">
        <input type="hidden" name="id_product" value="<?= $goods_id  ?>">
        <h3>Add comment</h3>
        <textarea name="text" cols="30" rows="10"></textarea>
        <button type=" submit">Add </button>
    </form>
    <hr>
    <h3>Comments</h3>
    <ul>
        <?php
        foreach ($comments as $comment) {
        ?>
            <li><?= $comment[2] ?></li>
        <?php
        }
        ?>
    </ul>


</body>

</html>
