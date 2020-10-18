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
