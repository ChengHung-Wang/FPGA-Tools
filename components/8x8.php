<?php include("../conn.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $_GET['title'] = "DotMatrixTool";
        include "../includes/header.php"
    ?>
    <link href="8x8_target/cover.css" rel="stylesheet">
    <link href="8x8_target/prettify/prettify.css" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="8x8_target/colorPicker/style.css">
    <script type="text/javascript" src="8x8_target/prettify/prettify.js"></script>
    <script src="8x8_target/app.js"></script> <!-- for DotMatrixTool js -->
    <script src="8x8_target/colorPicker/main.js"></script>
    <script>
        let hex_code = "";
        let binary_code = "";
        function copyText(text) {
            console.log(text);
            $("#hide_copy_code").val(text);
            $("#hide_copy_code")[0].select();
            document.execCommand("copy"); // 執行瀏覽器複製命令
            $("#copy_success_alert").alert();
        }
    </script>
</head>
<body>
<?php include "../includes/navbar.php"; ?>
<div class="container position-fixed" style="left: 50%; transform: translate(-50%, 0%); z-index: 9999999999">
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade hide" id="copy_success_alert" role="alert" style="margin-top: 180px;z-index: 999999999999">
                <strong>Copy Success!!!</strong> 快貼到VSCode裡去
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>
<input type="text" id="hide_copy_code" style="display: none;">
<div class="container-fluid">
    <div class="row">
        <div class="col-2 bd-sidebar d-flex justify-content-center align-items-start" style="border-right: 1px #ddd solid; top: 0; min-height: 100vh; flex-wrap: wrap">
            <div class="row" style="margin-top: 120px;">
<!--                <div class="col-12">-->
<!--                    <h3 style="height: 33px;"><strong>操作選項</strong></h3>-->
<!--                </div>-->
                <div class="col-12">
                    <div class="color-picker-body">
                        <div class="container-ColorPicker">

                            <div class="redSub" onclick="color_type = 0"></div>
                            <div class="greenSub" onclick="color_type = 1"></div>
                            <div class="orangeSub" onclick="color_type = 2"></div>
                            <div class="red" onclick="color_type = 0">
                                <div class="colorName">Red</div>
                                <div class="hex">#FF605F</div>
                                <div class="rgb">rgb(255, 96, 95)</div>
                            </div>
                            <div class="green" onclick="color_type = 1">
                                <div class="colorName">Green</div>
                                <div class="hex">#96D100</div>
                                <div class="rgb">rgb(150, 209, 0)</div>
                            </div>
                            <div class="orange" onclick="color_type = 2">
                                <div class="colorName">Orange</div>
                                <div class="hex">#ff8e42</div>
                                <div class="rgb">rgb(255, 142, 66)</div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                </div>
                <div class="col-12 d-flex justify-content-center flex-wrap">
                    <div class="btn-group side_option">
                        <div class="dropdown" id="widthDropDiv">
                            <button class="btn btn-default dropdown-toggle" type="button" id="widthDrop"
                                    data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true">
                                Width
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="widthDrop">
                                <li><a class="dropdown-item" href="#">4</a></li>
                                <li><a class="dropdown-item" href="#">6</a></li>
                                <li><a class="dropdown-item" href="#">8</a></li>
                                <li><a class="dropdown-item" href="#">16</a></li>
                                <li><a class="dropdown-item" href="#">24</a></li>
                                <li><a class="dropdown-item" href="#">32</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="btn-group side_option">
                        <div class="dropdown" id="heightDropDiv">
                            <button class="btn btn-default dropdown-toggle" type="button" id="heightDrop"
                                    data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true">
                                Height
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="heightDrop">
                                <li><a class="dropdown-item" href="#">8</a></li>
                                <li><a class="dropdown-item" href="#">16</a></li>
                                <li><a class="dropdown-item" href="#">24</a></li>
                                <li><a class="dropdown-item" href="#">32</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Options - Byte Order -->
                    <div class="btn-group side_option">
                        <div class="dropdown" id="byteDropDiv">
                            <button class="btn btn-default dropdown-toggle" type="button" id="byteDrop"
                                    data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true">
                                Byte Order
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="heightDrop">
                                <li><a class="dropdown-item" href="#">Row Major</a></li>
                                <li><a class="dropdown-item" href="#">Column Major</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Options - Endian -->
                    <div class="btn-group side_option">
                        <div class="dropdown" id="endianDropDiv">
                            <button class="btn btn-default dropdown-toggle" type="button" id="endianDrop"
                                    data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true">
                                Endian
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="heightDrop">
                                <li><a class="dropdown-item" href="#">Big Endian (MSB)</a></li>
                                <li><a class="dropdown-item" href="#">Little Endian (LSB)</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Options -->
                </div>
            </div>
            <button type="button" class="btn btn-primary" id="generateButton">Generate</button>
        </div>
        <div class="col-10" style="text-align: center">
            <div class="row" style="margin-top: 120px; margin-right: 30px;">
                <?php include("8x8_target/include/dotmatrixtool.php") ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>