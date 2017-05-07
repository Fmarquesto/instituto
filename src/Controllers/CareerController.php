<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 6/5/2017
 * Time: 00:11
 */

namespace App\Controllers;


use App\Models\Career;
use App\Models\Subject;

class CareerController extends Controller
{
    public function getCareers($request, $response)
    {
        $careers = Career::all()->toArray();
        foreach ($careers as $k =>$career){
            $careers[$k]['quantity'] = Subject::where('career_id',$career['id'])->get()->count();
        }
        return $this->view->render($response, 'career/careers.twig',[
            "data"=>json_encode($careers)
        ]);
    }
}