<?php
function crop_string($string_lengkap, $value_crop_string)
{
    $crop_string = trim(substr(strip_tags($string_lengkap), 0, $value_crop_string));
    if (strlen($string_lengkap) > $value_crop_string) {
        $crop_string = $crop_string . "...";
    }
    return $crop_string;
}

function crop_text_post($judul_lengkap, $text_lengkap, $value_crop_judul1, $value_crop_judul2, $value_crop_text1, $value_crop_text2, $value_crop_text3)
{
    if (strlen($judul_lengkap) > $value_crop_judul1) {
        $num_char = $value_crop_text1;
    }
    if (strlen($judul_lengkap) >= $value_crop_judul2 && strlen($judul_lengkap) <= $value_crop_judul1) {
        $num_char = $value_crop_text2;
    }
    if (strlen($judul_lengkap) > 0 && strlen($judul_lengkap) < $value_crop_judul2) {
        $num_char = $value_crop_text3;
    }

    $crop_text = trim(substr(strip_tags($text_lengkap), 0, $num_char));
    if (strlen($text_lengkap) > $value_crop_judul1) {
        $crop_text = $crop_text . "...";
    }

    return $crop_text;
}
