<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 6/5/2017
 * Time: 00:41
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserCareer extends Model
{
    const ABANDONADA    = 'A';
    const EN_CURSO      = 'C';
    const FINALIZADA    = 'F';

    protected $table = 'user_careers';

    protected $fillable = [
        'user_id',
        'career_id',
        'status',
    ];
}