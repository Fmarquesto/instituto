<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 4/5/2017
 * Time: 22:12
 */

namespace App\Middleware;


class Middleware
{
    protected $container;

    function __construct($container)
    {
        $this->container = $container;
    }
}