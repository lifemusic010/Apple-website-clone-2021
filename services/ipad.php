<!-- serial_num, product_type, model, price -->
<?php
require_once('../login.php');
$getIpadProductQuery = "SELECT * FROM product WHERE product_type = 'iPad'";
$ipadProductRes = $connection->query($getIpadProductQuery);
$ipadProductList = [];
if ($ipadProductRes->num_rows > 0) {
    while ($row = $ipadProductRes->fetch_assoc()) {
        $ipadProductList[] = $row;
    }
}
?>