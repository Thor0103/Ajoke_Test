<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joke extends Model
{

    public $timestamps = false;
    protected $fillable = [
         'jokecontent', 'vote_fun','vote_nofun'
    ];

    protected $primaryKey = 'id';
    protected $table = 'contents';

}
