<?php
    $message = '';
    $products = [];

    //Configure these values in the config.inc file
    $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        $qoh;
        $vendor;

        $insert_query = "INSERT INTO PRODUCT (PROD_NAME, PROD_PRICE, PROD_QOH, PROD_VENDOR_PROVIDED) VALUES ('$name', '$price', '$qoh', '$vendor')";
        $db->query($insert_query);
    }

    $select_query = "SELECT * FROM PRODUCT";
    $result; //Complete this instruction by querying the database
    $products = $result->fetch_all(MYSQLI_ASSOC);

    $db->close();
?>

<html>
<head>
    <title>Inventory</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Inventory</h1>
    <hr />
    <h2>Add Product</h2>

    <!-- FORM HERE -->

    <p><?php echo $message; ?></p>

    <hr />
    <h2>Products</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity on Hand</th>
                <th>Vendor Provided?</th>
            </tr>
        </thead>
        <tbody>
            
            <!-- TABLE BODY HERE -->

        </tbody>
    </table>

</body>
</html>
