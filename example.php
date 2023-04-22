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

    $sql = "SELECT u.userid, u.name, s.shipping_address, s.serial_num
    FROM shopping_cart c
    LEFT JOIN user_info u on u.userid = c.userid
    LEFT JOIN shipping s on s.userid = c.userid"
    ;

    $res = $connection->query($sql);

    if ($res->num_rows > 0) {
        echo "<table><tr>
        <th>UserID</th>
        <th>Shipping_Address</th>
        <th>Name</th>
        </tr>";

        while ($row = $res->fetch_assoc()) {
            echo "<tr><td>" . $row["userid"] . "</td>
            <td>" . $row["shipping_address"] . "</td>
            <td>" . $row["name"] . "</td></tr>";
        }
        echo "</table>";
    }