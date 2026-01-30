<?php

$last_name           = $_POST['last_name'];
$first_name          = $_POST['first_name'];
$address             = $_POST['address'];
$city                = $_POST['city'];
$postal_code         = $_POST['postal_code'];


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Données du client</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>



<div class="container">
    <div class="header">

        <h3>Client Data</h3>
        <p><a href="index.html">Add User</a></p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Last Name</strong></td>
                <td style="color: #000000; font-weight: bold;">
                    <?php echo strtoupper($last_name); ?>
                </td>
            </tr>
            <tr>
                <td><strong>First Name</strong></td>
                <td style="color: #3d3d3d;"><?php echo $first_name; ?></td>
            </tr>
            <tr>
                <td><strong>Address</strong></td>
                <td><?php echo $address; ?></td>
            </tr>
            <tr>
                <td><strong>City</strong></td>
                <td><?php echo $city; ?></td>
            </tr>
            <tr>
                <td><strong>Postal code</strong></td>
                <td><?php echo $postal_code; ?></td>
            </tr>
        </tbody>
    </table>
</div>

    
</body>
</html>