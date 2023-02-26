<?php
    use App\Models\Setting;

    if(!function_exists('settings')) {
        function settings($title) {
            $settingTarget = Setting::where('title', $title)->first();
            if(!$settingTarget) {
                return "Không xác định";
            }
            return $settingTarget->value;
        }
    }
?>