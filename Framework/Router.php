<?php

namespace SamplitsApp;

class Router
{
    public static function routeTo($path)
    {
        $homecontroller = new PricingHomeController();
        if (strpos($path, '/') === 0) {
            $homecontroller->index();
            return;
        } 

    }
}