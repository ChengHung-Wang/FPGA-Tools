<?php include("conn.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "includes/header.php" ?>
    <script>
        $(function() {

        })
    </script>
    <style>
        body {

            position: relative;
        }
        body::before {
            content: '';
            background-image: url("img/bg.jpg");
            width: 100%;
            height: 100vh;
            position: absolute;
            background-position: top;
            background-size: 50%;
            background-repeat: no-repeat;
            opacity: .3;
            filter: grayscale(100%);
        }
    </style>
</head>
<body>
    <?php include "includes/navbar.php"; ?>
    <!-- code... -->

</body>
</html>