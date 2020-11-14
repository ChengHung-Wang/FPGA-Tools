<?php
    include "../conn.php";
    $_GET['prefix'] = "../";
    $_GET['title'] = "腳位轉換器";
    $description = find("components", ["name" => "秉華實驗板"])[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../includes/header.php" ?>
    <style>
        input[type='file'] {
            display: none;
        }
        #fpga {
            width: 950px;
            height: 950px;
            border-radius: 45px;
            border: 1px #ddd solid;
            position: relative;
            overflow: hidden;
            background: #333 url("../img/intel-header-logo.svg") no-repeat center;
            background-size: 300px;
        }
        .cube {
            border: 1px rgba(255, 255, 255, .8) solid;
            padding: 1px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            cursor: pointer;
        }
        .pin_sec {
            position: absolute;
            flex-wrap: wrap;
        }
        #fpga_top_sec {
            top: 0;
            width: 100%;
            height: 30px;
            padding: 0 60px;
            flex-direction: row-reverse;
        }
        #fpga_left_sec {
            left: 0;
            top: 60px;
            width: 30px;
            height: calc(100% - 120px);
        }
        #fpga_left_sec .cube {
            margin: 0 calc((30px / 2) - ((920px / 60) / 2));
        }
        #fpga_bottom_sec {
            bottom: 0;
            width: 100%;
            height: 30px;
            padding: 0 60px;
        }
        #fpga_right_sec {
            right: 0;
            top: 60px;
            width: 30px;
            height: calc(100% - 120px);
            flex-direction: column-reverse;
        }
        #fpga_right_sec .cube {
            margin: 0 calc((30px / 2) - ((920px / 60) / 2));
        }
        .out_cube > span {
            position: absolute;
            font-size: 12px;
            color: white;
            margin-left: 15px;
            transform: scale(.6);
            width: max-content;
        }
        .out_cube {
            position: relative;
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        .component_circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>
    <script>
        let ic = {
            name: "EP3C40Q240C8N",
            pin_limit: 240
        };
        let clock = [
            31, 32, 33, 34, 152, 151, 150, 149, 209, 210, 211, 212, 89, 90, 91, 92
        ];
        let component_type = [];
        let option = {
            hide_clock: true,
            show_io_name: true
        };
        $(function() {
            draw();
        })
        function io_update(id) {
            let io_name = prompt(id + " - 請輸入周邊板上的接口名稱")
            $.ajax({
                url: api_url,
                type: "post",
                data: {
                    option: "vhdl_io_map",
                    type: "side_board_pin_name",
                    vhdl_pin: id,
                    io_name: io_name,
                    success:() => {
                        draw();
                    }
                }
            })

        }
        function draw() {
            $.ajax({
                url: api_url,
                type: "post",
                async: false,
                data: {
                    option: "function_pin"
                },
                success: (data) => {
                    data = data.data;
                    let side_round = ["left", "bottom", "right", "top"];
                    let side_option = [
                        {
                            deg: 0,
                            margin_left: "15px"
                        },
                        {
                            deg: 270,
                            margin_left: "0px"
                        },
                        {
                            deg: 0,
                            margin_left: "-35px"
                        },
                        {
                            deg: 90,
                            margin_left: "0px"
                        }
                    ]
                    for (let side = 0; side < 4; side++) {
                        let this_side_div = $("#fpga_" + side_round[side] + "_sec");
                        this_side_div.empty();
                        for (let side_pin = 0; side_pin < 60; side_pin++) {
                            let this_pin = side * 60 + (side_pin + 1);
                            let target_data = data.filter(e => e.fpga_pin == "PIN_" + this_pin);
                            if(target_data.length >= 1 && component_type.indexOf(target_data[0].name) == -1)
                                component_type.push(target_data[0].name);
                            this_side_div.append(`
                                <div onclick="io_update('PIN_${this_pin}')" pin="PIN_${this_pin}" class="out_cube" style="transform: rotateZ(${side_option[side].deg}deg);">
                                    <span style="
                                        ${target_data.length >= 1 ? "color: " + target_data[0].color : ""};
                                        left: ${side_option[side].margin_left};" pin="PIN_${this_pin}">
                                            PIN_${this_pin} ${option.show_io_name && target_data.length >= 1 ? `- ${target_data[0].side_board}` : ''}
                                    </span>
                                    <div style="${target_data.length >= 1 ? "background-color: " + target_data[0].color : ""};${target_data.length >= 1 ? "border: 1px solid " + target_data[0].color : ""}" pin="PIN_${this_pin}" class="cube" id="PIN_${this_pin}"></div>
                                </div>
                            `);
                        }
                    }
                    hide_clock();
                    color_type();
                }
            })
        }
        function hide_clock() {
            for(let i = 0; i < 240; i ++) {
                if(clock.indexOf(i) != -1 && option.hide_clock) {
                    $("[pin=PIN_" + i + "]").hide();
                }
            }
        }
        function color_type() {
            component_type.forEach(e => {
                $.ajax({
                    url: api_url,
                    type: "post",
                    data: {
                        option: "component_description",
                        name: e
                    },
                    async: false,
                    success: (data) => {
                        data = data.data[0];
                        console.log(data);
                        $("#component_color").append(`
                           <div class="row fac">
                                <div class="col-3">
                                    <div class="component_circle" style="background: ${data.type_color};"></div>
                                </div>
                                <div class="col-9">
                                    <h6 class="m-0">${data.name}</h6>
                                    <span style="font-size: 12px;" class="text-secondary">關鍵字：${data.description}</span>
                                </div>
                                <div class="col-12"><hr></div>
                            </div>
                        `);
                    }
                })
            });
        }
    </script>
</head>
<body>
<?php include "../includes/navbar.php"; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-2 bd-sidebar" style="border-right: 1px #ddd solid; top: 0; min-height: 100vh;">
            <div class="row" style="margin-top: 120px;">
                <div class="col-12">
                    <h5 style="height: 33px;"><strong>操作選項</strong></h5>
                    <hr>
                </div>
                <div class="col-12 fbc pb-2 pt-2">
                    <span>鎖定接腳</span>
                    <input option="lock_pin" type="checkbox" checked>
                </div>
                <div class="col-12 fbc pb-2 pt-2">
                    <span>隱藏CLOCK接腳</span>
                    <input option="hide_clock" type="checkbox" checked>
                </div>

                <div class="col-12" style="position: absolute; bottom: 30px;">
                    <button type="button" onclick="download()" class="btn btn-primary btn-lg btn-block" style="background: #0071c5!important;">下載</button>
                </div>
            </div>
        </div>


        <div class="col-8" style="margin-top: 80px;">
            <div class="row h-100">
                <div class="col-12 h-100 fcc">
                    <div id="fpga">
                        <div id="fpga_top_sec" class="pin_sec fac">
                        </div>
                        <div id="fpga_left_sec" class="pin_sec fac">
                        </div>
                        <div id="fpga_bottom_sec" class="pin_sec fac">
                        </div>
                        <div id="fpga_right_sec" class="pin_sec fac">
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <nav class="d-none d-xl-block col-xl-2 bd-toc bd-sidebar" style="border-right: 1px #ddd solid; top: 0; min-height: 100vh;padding: 0 15px;">
            <div class="row" style="margin-top: 120px;">
                <div class="col-12" id="component_color">

                </div>
            </div>
        </nav>
    </div>
</div>

<input type="file" id="src_file">
<input type="file" id="edit_file">
<a href="" style="display: none" id="download"></a>
</body>
</html>