<?php
    include "faster.php";
    include "php_api.php";
    $conn = new PDO("mysql:host=127.0.0.1;dbname=jiyi_skills;charset=utf8", "root", "");
    $site_folder = "csv_to_json";
    function api_ok($data = "") {
        header("Content-type: application/json; charset=utf-8");
        echo json_encode([
            "success" => true,
            "message" => "",
            "data" => $data
        ], JSON_PRETTY_PRINT);
        die();
    }
    function api_err($mess = "") {
        header("Content-type: application/json");
        echo json_encode([
            "success" => false,
            "message" => $mess,
            "data" => ""
        ], JSON_PRETTY_PRINT);
        die();
    }