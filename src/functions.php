<?php
if (!function_exists('expect')) {
    function expect($actual) {
        return new \PSpec\Expect($actual);
     }
}

