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

    protected $table = 'subject_user';

    protected $fillable = [
        'user_career_id',
        'subject_id',
        'status',
    ];
}