<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <title>Document</title>
</head>
<bdoy>
    <?php
    require_once "login.php";

    $sql = "SELECT u.userid, o.shipping_address, o.serial_num
    FROM shipping o
    LEFT JOIN user_info u on u.userid = o.userid";

    $res = $connection->query($sql);
    if ($res->num_rows > 0) {
        echo "<table><tr><th>Order</th>
        <th>UserID</th>
        <th>Shipping_Address</th>
        <th>Serial_num</th></tr>";

        while ($row = $res->fetch_assoc()) {
            echo "<tr><td>" . $row["userid"] . "</td>
            <td>" . $row["shipping_address"] . "</td>
            <td>" . $row["serial_num"] . "</td></tr>";
        }
        echo "</table>";
    }

    $table1 = 'order';
    $table2 = 'user_info';

    $sql = "SELECT u.userid, o.shipping_address, o.serial_num
    FROM " . $table1 . "o 
    LEFT JOIN " . $table2 . " u on o.userid = u.userid";