<?php include("../conn.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../includes/header.php" ?>
    <script>
        let str = "";
        function update(text) {
            str = text;
            $("#ans").text(str.replace(/1/g, "a").replace(/0/g, "1").replace(/a/g, "0"));
        }
    </script>
    <style>
        input[type='text'] {
            border: 0;
            border-bottom: 1px #ddd solid;
            padding-bottom: 5px;
            outline: none;
        }
    </style>
</head>
<body>
    <?php include "../includes/navbar.php"; ?>
    <div class="container" style="margin-top: 120px;">
        <div class="row fac">
            <div class="col-12">
                <h3>共陰陽轉換</h3>
                <hr>
            </div>
            <div class="col-1">
                <span>原始字串</span>
            </div>
            <div class="col-10">
                <input type="text" id="str" class="w-100">
            </div>
            <div class="col-1 fec">
                <input type="button" class="btn btn-primary"  value="轉換" onclick="update($('#str').val())">
            </div>
            <div class="col-12">
                <br><br><br>
                <h2 id="ans"></h2>
            </div>
        </div>
    </div>
</body>
</html>