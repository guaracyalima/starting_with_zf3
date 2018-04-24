<?php
/**
 * Created by PhpStorm.
 * User: guabirabadev
 * Date: 24/04/2018
 * Time: 13:10
 */

$db = new PDO('sqlite:' . realpath(__DIR__) . '/blog.db');
$fh = fopen(__DIR__ . '/schema.sql', 'r');
    while ($line = fread($fh, 4096))
    {
        $db->exec($line);
    }

   fclose($fh);