<?php
require_once 'dbconfig.php';

$brand = !empty($_GET['brand']) ? $_GET['brand'] : null;
$type = !empty($_GET['type']) ? $_GET['type'] : null;
$price = !empty($_GET['price']) ? $_GET['price'] : null;

$sql = "SELECT * FROM products WHERE 1=1 ";

if ($brand !== null) {
    $sql .= "AND brand = :brand ";
}

if ($type !== null) {
    $sql .= "AND type = :type ";
}

if ($price !== null) {
    $prices = explode('-', $price);
    $lowPrice = intval($prices[0]);
    $highPrice = intval($prices[1]);
    $sql .= "AND price BETWEEN :lowPrice AND :highPrice ";
}

$stmt = $mysqli->prepare($sql);

if ($brand !== null) {
    $stmt->bindValue(':brand', $brand);
}

if ($type !== null) {
    $stmt->bindValue(':type', $type, PDO::PARAM_INT);
}

if ($price !== null) {
    $stmt->bindValue(':lowPrice', $lowPrice, PDO::PARAM_INT);
    $stmt->bindValue(':highPrice', $highPrice, PDO::PARAM_INT);
}

$stmt->execute();

$result = $stmt->fetchAll();

include 'header.php'; // include header and other necessary files
// Here you would loop through $result to display the products, just like in product.php

while ($row = $result->fetch_assoc()) : ?>
    <!-- Display your product here -->
<?php endwhile;

include 'footer.php';
?>
