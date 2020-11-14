<?php include("../conn.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../includes/header.php" ?>
    <script>
        function update() {
            let str = $("#src")
            str.val(str.val().replace(/(\"\d+\")|(\'\d+\')/g, (e) => {
                return e.replace(/1/g, "a").replace(/0/g, "1").replace(/a/g, "0")
            }));
        }
    </script>
</head>
<body>
    <?php include "../includes/navbar.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-12" style="margin-top: 120px;">
                <h3>原始程式</h3>
                <hr>
            </div>
            <div class="col-12">
                <textarea name="" id="src" class="w-100" style="height: 500px"></textarea>
                <input type="button" class="btn btn-primary btn-lg" value="轉換" onclick="update()">
            </div>
        </div>
    </div>
</body>
</html>