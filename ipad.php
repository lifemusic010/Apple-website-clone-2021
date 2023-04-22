<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iPad Store</title>
</head>

<body>
    <?php
    require_once "login.php";
    require_once "./services/size.php";
    require_once "./services/ipad.php";
    require_once "./services/uuid.php";
    require_once "./services/user.php";
    $uuid = generateUuidV4();
    function findUserById($userArray, $targetId)
    {
        foreach ($userArray as $user) {
            if ($user['userid'] == $targetId) {
                return $user;
            }
        }
        // No user found with the specified userId
        return null;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $model = $_POST["model"];
        $size = $_POST["size"];
        $price = $_POST["price"];
        $user = $_POST["user"];
        $findUser = findUserById($userInfoList, $user);
        if ($findUser === null) {
            echo "User not found";
            return;
        }

        $userId = $findUser['userid'];
        $cardNum = $findUser['card_num'];

        $insertShoppingSqlQuery = "INSERT INTO shopping_cart (id, userid, serial_num, card_num, capa)
        VALUES ('$uuid', '$userId', '$model', '$cardNum', '$size')";

        if ($connection->query($insertShoppingSqlQuery) === TRUE) {
            echo "New record created successfully in shipping";
        } else {
            echo "Error: " . $insertShoppingSqlQuery . "<br>" . $connection->error;
        }
    }

    ?>
    <div class="product">
        <h2>iPad</h2>

        <form method="post" action="ipad.php">
            <label for="user">User:</label>
            <select id="user" name="user">
                <?php
                foreach ($userInfoList as $userInfo): ?>
                    <option value="<?= $userInfo['userid'] ?>"><?= $userInfo['userid'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label for="model">Model:</label>
            <select id="model" name="model">
                <?php foreach ($ipadProductList as $ipadProduct): ?>
                    <option value="<?= $ipadProduct['serial_num'] ?>" data-price="<?= $ipadProduct['price'] ?>"><?= $ipadProduct['model'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label for="size">GB Size:</label>
            <select id="size" name="size">
                <?php foreach ($sizeInfoList as $sizeInfo): ?>
                    <option value="<?= $sizeInfo['id'] ?>" data-price="<?= $sizeInfo['price'] ?>"><?= $sizeInfo['size'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <div id="price">Price: $759.99</div>
            <input type="hidden" id="hiddenPrice" name="price" value="759.99">

            <button type="submit">Purchase</button>
        </form>
    </div>

    <script>
        const updatePrice = () => {
            const model = document.getElementById("model");
            const size = document.getElementById("size");
            const price = model.options[model.selectedIndex].getAttribute("data-price");
            const sizePrice = size.options[size.selectedIndex].getAttribute("data-price");

            document.getElementById("price").textContent = "Price: $" + (parseFloat(price) + parseFloat(sizePrice));
            document.getElementById("hiddenPrice").value = parseFloat(price) + parseFloat(sizePrice);
        };

        document.getElementById("model").addEventListener("change", updatePrice);
        document.getElementById("size").addEventListener("change", updatePrice);
    </script>


</body>

</html>