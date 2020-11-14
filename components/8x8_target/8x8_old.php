<?php include("../conn.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../includes/header.php" ?>
    <script>
        let str = "";
        let vcc_type = 0;
        let active = false;
        let now_color = 0; // 0 => green, 1 => yellow, 2 => orange, 3 => red
        let color_class = ["green", "yellow", "orange", "red"];
        let data = [];
        $(function() {
            init();

        })
        function init(data = "") {
            $("#draw").empty();
            if(data == "") {
                for(let i = 0; i < 8; i ++) {
                    for(let j = 0; j < 8; j ++) {
                        $("#draw").append(`<div class="c" data="${(i * 8) + (j)}" onclick="hover('${(i * 8) + (j)}', true)" onmouseenter="hover('${(i * 8) + (j)}')"></div>`);
                    }
                }
            }
            document.addEventListener("mousedown", () => {
                active = true;
            });
            document.addEventListener("mouseup", () => {
                active = false;
            });
        }
        function hover(id,focus = false) {
            if(!active && !focus)
                return;
            parseInt(id);
            // data => color, active
            color_class.forEach(e => {
                $(`.c[data='${id}']`).removeClass(e);
            })
            $(`.c[data='${id}']`).addClass(color_class[now_color]);
        }
        function change_color(id) {
            id = parseInt(id);
            $(".color_option").empty();
            $(`.color_option[onclick="change_color('${id}')"]`).append(`✓`);
            now_color = id;
        }
        function save() {
        }
    </script>
    <style>
        input[type='text'] {
            border: 0;
            border-bottom: 1px #ddd solid;
            padding-bottom: 5px;
            outline: none;
        }
        .c {
            width: 25px;
            height: 25px;
            background: #aaa;
            border-radius: 50%;
            margin: 2.5px;
            transition: 0.07s ease-in-out;
        }
        #draw {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%) scale(1.5);
            width: 244px;
            height: 244px;
            display: flex;
            align-items: center;
            justify-items: center;
            flex-wrap: wrap;
            border: 2px #ddd solid;
        }
        .orange {
            background: #FF6600!important;
        }
        .green {
            background: #00c0a3;
        }
        .yellow {
            background: #FFE338;
        }
        .red {
            background: #B00D23;
        }
        .color_option {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            color: white;
        }
    </style>
</head>
<body>
<?php include "../includes/navbar.php"; ?>
<div class="container" style="margin-top: 120px;">
    <div class="row fac">
        <div class="col-12">
            <h3>8x8 點矩陣 LED</h3>
        </div>
        <div class="col-1">
            <span>disp_G</span>
        </div>
        <div class="col-11">
            <input type="text" id="disp_G" class="w-100 mb-2">
        </div>
        <div class="col-1">
            <span>disp_R</span>
        </div>
        <div class="col-11">
            <input type="text" id="disp_R" class="w-100 mb-2">
        </div>
        <div id="draw">

        </div>
        <div class="container fixed-bottom">
            <div class="row" style="height: 150px;">
                <div class="col-4">

                </div>
                <div class="col-4 fac">
                    <div class="color_option fcc green" onclick="change_color('0')"></div>
                    <div class="color_option fcc yellow" onclick="change_color('1')"></div>
                    <div class="color_option fcc orange" onclick="change_color('2')"></div>
                    <div class="color_option fcc red" onclick="change_color('3')"></div>
                    <div class="color_option fcc bg-secondary" onclick="change_color('4')"></div>
                </div>
                <div class="col-4">

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>