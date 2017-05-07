<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 6/5/2017
 * Time: 00:05
 */

namespace App\Controllers;


use App\Models\Correlative;
use App\Models\SubjectUser;
use App\Models\UserCareer;

class UserController extends Controller
{
    public function getEnroll($request, $response)
    {
        $userCareers = UserCareer::where('user_id',$_SESSION['user'])->get()->toArray();
        $user2 = UserCareer::where('user_id',$_SESSION['user'])->select('user_careers.id','careers.name as Carrera','user_careers.status as Estado')
            ->join('users', 'users.id', '=', 'user_careers.user_id')
            ->join('careers','careers.id','=','user_careers.career_id')
            ->where('user_careers.status',UserCareer::EN_CURSO)
            ->get()
            ->toArray();
        return $this->view->render($response, 'user/enroll.twig',[
            'userCareers'=>$user2
        ]);
    }

    public function getEnrollSubjectsByStatus($request, $response, $args)
    {
        $subjects = SubjectUser::where('user_career_id',$args['userCareerId'])
            ->join('subjects','subjects.id','=','subject_user.subject_id');
            //->select('subjects.id','subjects.name','subjects.code','subjects.schedule','subject_user.status');
        $noData = ["sEcho"=>1,"iTotalRecords"=>"0","iTotalDisplayRecords"=>"0","aaData"=>[]];
        $data=[
            'APROBADAS'=>[],
            'DISPONIBLES'=>[],
            'NODISPONIBLES'=>[]
        ];
        foreach ($subjects->get()->toArray() as $subject) {
            if($subject['status'] == SubjectUser::APROBADA){
                $data['APROBADAS'][] = $subject;
            }else if($this->isAvailableToEnroll($subject)){
                $data['DISPONIBLES'][] = $subject;
            }else{
                $data['NODISPONIBLES'][] = $subject;
            }
        }
        //$data = isset($data['data']) ? $data : $noData;
        return $response->withJson($data);
    }

    private function isAvailableToEnroll($subjectUser)
    {
        $correlatives = Correlative::where('c.subject_id',$subjectUser['subject_id'])
            ->join('subject_user as su','su.subject_id','=','c.correlative_id')
            ->select('su.id as SUID','c.id as CID', 'su.status', 'c.type'    )
            ->get()
            ->first();
        if(empty($correlatives)){
            return true;
        }
        if($correlatives->type == 'C' && $correlatives->status != SubjectUser::PENDIENTE){
            return true;
        }

        return false;
    }
}