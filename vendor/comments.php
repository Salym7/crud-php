<?php
require_once '../config/connect.php';
print_r($_POST);
$id_product = $_POST['id_product'];
$text = $_POST['text'];
print_r($id_product);

mysqli_query($connect, "INSERT INTO `comments` (`id_comments`, `id_product`, `text`) VALUES (NULL, '$id_product', '$text');");

header("location: /product.php?id=$id_product");
