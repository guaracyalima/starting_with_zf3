<?php
/**
 * Created by PhpStorm.
 * User: guabirabadev
 * Date: 24/04/2018
 * Time: 12:41
 */

namespace Blog;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . "/../config/module.config.php";
    }
}