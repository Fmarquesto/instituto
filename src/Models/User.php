<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 4/5/2017
 * Time: 20:55
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table ='users';

    protected $fillable = [
        'username',
        'password',
        'name',
        'document',
        'enrollment',
        'birthdate'
    ];

    public static $type = [
        'AL'=>'Alumno',
        'AD'=>'Administrador'
    ];

}