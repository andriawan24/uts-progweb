<?php
    function format_number_currency($num) {
        return "Rp" . number_format($num, 2);
    }

    function sub_date_to_day($date1) {
        date_default_timezone_set('Asia/Jakarta');
        $date_1 = strtotime($date1);
        $date_2 = strtotime(date('Y-m-d H:i:s'));

        $seconds = $date_1 - $date_2;
        if ($seconds > 86400) {
            return round($seconds / 86400) . ' Days Left';
        } else {
            if ($seconds > 3600) {
                return round($seconds / 60 / 60) . ' Hours Left';
            } else {
                return round($seconds / 60) . ' Minutes Left';
            }
        }
    }

    function calculate_percentage($value, $total) {
        $percentage = ($value / $total) * 100;
        return $percentage;
    }
?>