<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 5/5/2017
 * Time: 18:31
 */

namespace App\Middleware;


class OldInputMiddleware extends Middleware
{
    function __invoke($request, $response, $next)
    {
        $this->container->view->getEnvironment()->addGlobal('old',isset($_SESSION['old'])?$_SESSION['old']:null);
        $_SESSION['old'] = $request->getParams();
        return $next($request, $response);
    }
}