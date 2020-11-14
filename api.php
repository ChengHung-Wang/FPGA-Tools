<?php
    include "conn.php";
    header("Content-type: application/json;");
    if(!isset($_POST['option'])) {
        echo json_encode([
            "success" => false,
            "message" => "no provide option",
            "data" => ""
        ], JSON_PRETTY_PRINT);
        die();
    }
    if($_POST['option'] == "csv2json") {
        $csv= $_POST['data'];
        $array = array_map("str_getcsv", explode("\n", $csv));
        $final_data = [
            "table_name" => [],
            "data" => []
        ];
        $src_type = [];
        foreach($array as $main) {
            $str = join("", $main);
            if(strpos($str, "#") === false && str_replace(" ", "", $str) != "") {
                $converted[] = $main;
            }
        }
        $final_data["table_name"] = $converted[0];
        unset($converted[0]);
        foreach($converted as $main) {
            $cache = [];
            foreach($main as $key => $value) {
                $cache[$final_data["table_name"][$key]] = $value;
            }
            $final_data["data"][] = $cache;
        }
        echo json_encode($final_data, JSON_PRETTY_PRINT);
    }
    if($_POST['option'] == "vhdl_io_map") {
        if($_POST['type'] == "side_board_pin_name") {
            $update_id = find("vhdl_io_map", [
                "fpga_pin_id" => find("fpga", ["name" => $_POST['vhdl_pin']])[0]["id"],
            ])[0]["id"];
            $board_pin_id = find("side_board", ["name" => $_POST['io_name']]);
            if(count($board_pin_id) != 0) {
                auto_insert("vhdl_io_map", $update_id, [
                    "board_pin_id" => $board_pin_id[0][id],
                    "fpga_pin_id" => find("fpga", ["name" => $_POST['vhdl_pin']])[0]["id"]
                ]);
            }
        }
        api_ok();
    }
    if($_POST['option'] == "side_board_pre") {
        $target = f("SELECT * FROM `side_board` WHERE `name` LIKE '%" . $_POST['text'] .  "%'");
    }
    if($_POST['option'] == "function_pin") {
        $data = [];
        foreach(find("components", "") as $component) {
            $search = count(explode(",", $component["description"])) > 1 ? explode(",", $component["description"]) : [$component["description"]];
            foreach($search as $value) {
                $search_results = f("SELECT * FROM `side_board` WHERE `name` LIKE '%$value%'");
                foreach($search_results as $search_result) {
                    $fpga_pin = find("vhdl_io_map", ["board_pin_id" => $search_result["id"]]);
                    $data[] = [
                        "name" => $component["name"],
                        "side_board" => $search_result["name"],
                        "fpga_pin" => count($fpga_pin) == 0 ? "" : find("fpga", ["id" => $fpga_pin[0]["fpga_pin_id"]])[0]["name"],
                        "fpga_id" => count($fpga_pin) == 0 ? "" : find("fpga", ["id" => $fpga_pin[0]["fpga_pin_id"]])[0]["id"],
                        "row" => $search_result["row"] + 1,
                        "col" => $search_result["col"] + 1,
                        "io_index" => $search_result["index_at"],
                        "side" => $search_result["side"] == "0" ? "left" : "right",
                        "color" => $component["type_color"]
                    ];
                }
            }
        }
        api_ok($data);
    }
    if($_POST['option'] == "component_description") {
        api_ok(find("components", ["name" => $_POST['name']]))[0];
    }
    if($_POST["option"] == "ic_pin") {
        api_ok(find("fpga", ""));
    }
    // post option and text
    if($_POST["option"] == "big5_code") {
        $data = [];
        foreach(json_decode($_POST['text']) as $text) {
            $this_cache = (unpack("H*", iconv("utf-8","big-5", $text)));
            array_push($data, join("", array_values($this_cache)));
        }
        api_ok($data);
    }
    if($_POST['option'] == "big5_decode") {
        $data = [];
        foreach(json_decode($_POST['text']) as $text) {
            $this_cache = pack("H*", iconv("big-5", "utf-8", $text));
            array_push($data, $this_cache);
        }
    }
    // 彰師附工牛掰版
    // post option and data from "big5_code_converter.php"
    if($_POST['option'] == "big5_encode_sivs") {
        $data = [];
        foreach(json_decode($_POST['data']) as $main) {
            $cache = "";
            foreach($main->text as $text) {
                if($text == "")
                    break;
                $cache = $cache . join("", unpack("H*", iconv("utf-8", "big-5", $text)));
            }
            $data[] = [
                "length" => strlen($cache) / 2,
                "big5_code" => 'x"' . join('", x"', str_split($cache, 2)) . '"',
                "src" => $main
            ];
        }
        api_ok($data);
    }