<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 4/5/2017
 * Time: 20:28
 */

namespace App\Controllers;


use App\Auth\Auth;

class Controller
{
    protected $container;

    /**
     * @var \Slim\Views\Twig
     */
    protected $view;

    /**
     * @var \Illuminate\Database\Capsule\Manager
     */
    protected $db;

    /**
     * @var \Slim\Router
     */
    protected $router;

    /**
     * @var \App\Validation\Validator
     */
    protected $validator;

    /**
     * @var Auth
     */
    protected $auth;

    /**
     * @var \Slim\Flash\Messages
     */
    protected $flash;

    function __construct($container)
    {
        $this->container = $container;
        $this->view = $container->view;
        $this->db = $container->db;
        $this->router = $container->router;
        $this->validator = $container->validator;
        $this->auth = $container->auth;
        $this->flash = $container->flash;
    }
}