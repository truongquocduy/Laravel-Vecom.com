<?php
    namespace App\Classes;

    class Status {
        public function get($code) {
            switch ($code) {
                case "000":
                    $this->code = 200;
                    $this->type = "000";
                    break;
            }
            return $result;
        }
    }
?>