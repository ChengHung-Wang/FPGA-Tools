<?php include("../conn.php") ?>
<!doctype html>
<html lang="en">
<head>
    <?php
    $_GET['title'] = "4x4 KeyScan";
    include "../includes/header.php"
    ?>
    <style>
        .table .thead-dark th {
            background: #7abe3e!important;
            border: none!important;
        }
    </style>
</head>
<body>
<?php include "../includes/navbar.php"; ?>
<div class="container" style="margin-top: 120px;">
    <div class="row">
        <div class="col-4">
            <img src="component_images/4x4.png" alt="" class="w-100">
        </div>
        <div class="col-1"></div>
        <div class="col-7 mt-2">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">FPGA PIN</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>key_row1</td>
                        <td>PIN_226</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>key_row2</td>
                        <td>PIN_223</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>key_row3</td>
                        <td>PIN_219
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>key_row4</td>
                        <td>PIN_217</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>key_col1</td>
                        <td>PIN_214</td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>key_col2</td>
                        <td>PIN_203</td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>key_col3</td>
                        <td>PIN_201</td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td>key_col4</td>
                        <td>PIN_197
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>