<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 4/5/2017
 * Time: 22:13
 */

namespace App\Middleware;


class ValiationErrorsMiddleware extends Middleware
{
    public function __invoke($request, $response, $next)
    {
        $this->container->view->getEnvironment()->addGlobal('errors',isset($_SESSION['errors'])?$_SESSION['errors']:null);
        unset($_SESSION['errors']);

        $response = $next($request, $response);
        return $response;
    }

}