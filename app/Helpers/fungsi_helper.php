<?php
function sweetalert($text, $icon, $title, $href = null)
{
    if ($href != null) {
        session()->setFlashdata('href', $href);
    }
    session()->setFlashdata('text', $text);
    session()->setFlashdata('icon', $icon);
    session()->setFlashdata('title', $title);
}

function random_color()
{
    return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}
