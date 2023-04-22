<?php
require_once "../login.php";
$getSizeQuery = "SELECT * FROM model_capa";
$sizeRes = $connection->query($getSizeQuery);
$sizeInfoList = [];
if ($sizeRes->num_rows > 0) {
    while ($row = $sizeRes->fetch_assoc()) {
        $sizeInfoList[] = $row;
    }
}
?>