<?php
    function url(){
        global $site_folder;
        return sprintf(
            "%s://%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['HTTP_HOST'] . '/' . $site_folder . '/'
        );
    }
    function navbar_active($arr) {
        $url = explode("/", $_SERVER["PHP_SELF"]);
        $after = array_pop($url);
        return in_array($after, $arr);
    }
    function navbar_components() {
        return find("components", "");
    }
    function dd($data) {
        echo json_encode($data, JSON_PRETTY_PRINT);
    }