<?php
    if(!function_exists('languages')) {
        function languages($key) {
            $path = public_path() . "/assets/languages/KaHVx5OUEY.json";
            $listLanguagues = json_decode(file_get_contents($path), true);
            return $listLanguagues[$key];
        }
    }
?>