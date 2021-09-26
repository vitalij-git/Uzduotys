<?php

function Redirect($url) {
    flush(); 
    ob_flush();
    header("Location: $url", true, 301); 
    exit;
}

?>