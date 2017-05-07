<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 4/5/2017
 * Time: 20:22
 */

namespace App\Controllers;


class HomeController extends Controller
{
    public function index($request, $response)
    {
        return $this->view->render($response, 'home.twig');
    }
}