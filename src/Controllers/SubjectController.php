<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 5/5/2017
 * Time: 21:24
 */

namespace App\Controllers;


use App\Models\Career;
use App\Models\Subject;
use Slim\Http\Response;

class SubjectController extends Controller
{

    public function getSubjects($request, $response)
    {
        $careers = Career::all();
        return $this->view->render($response, 'subject/subjects.twig',[
            'careers'=>$careers
        ]);
    }

    public function getSubject($request, Response $response,$args)
    {
        $subjects = array();
        $noData = ["sEcho"=>1,"iTotalRecords"=>"0","iTotalDisplayRecords"=>"0","aaData"=>[]];
        $idCareer = $args['idCareer'];
        foreach (Subject::where('career_id',$idCareer)->get() as $subject) {
            $subjects['data'][] = [
                'name'=>$subject->name,
                'id'=>$subject->id,
                'code'=>$subject->code
            ];
        }
        $data = isset($subjects['data']) ? $subjects : $noData;
        return $response->withJson($data);

    }
}