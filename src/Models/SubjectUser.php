<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 6/5/2017
 * Time: 12:49
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class SubjectUser extends Model
{
    const APROBADA      = 'A';
    const CURSADA       = 'C';
    const PENDIENTE     = 'P';
    const ENCURSO       = 'E';

    protected $table = 'subject_user as SU';

    protected $fillable = [
        'user_career_id',
        'subject_id',
        'status',
    ];

    public function changeStatus($status)
    {
        $this->update([
           'status' => $status
        ]);
    }
}