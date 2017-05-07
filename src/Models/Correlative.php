<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 6/5/2017
 * Time: 12:52
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Correlative extends Model
{
    protected $table = 'correlatives as c';

    protected $fillable = [
        'subject_id',
        'correlative_id',
        'type'
    ];

    public static $type = [
        'C'=>'Cursada',
        'A'=>'Aprobada'
    ];
}