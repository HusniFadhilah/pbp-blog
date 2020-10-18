<?php
function sweetalert($text, $icon, $title)
{
    session()->setFlashdata('text', $text);
    session()->setFlashdata('icon', $icon);
    session()->setFlashdata('title', $title);
}
