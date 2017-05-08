<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 5/5/2017
 * Time: 21:52
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects as S';

    protected $fillable = [
        'career_id',
        'name',
        'code',
        'schedule'
    ];

}