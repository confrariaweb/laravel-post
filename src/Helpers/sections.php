<?php
if (!function_exists('postSections')) {
    function postSections()
    {
        return resolve('PostSectionService')->all();
    }
}