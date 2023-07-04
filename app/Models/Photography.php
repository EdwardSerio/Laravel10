<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photography extends Model
{
    use HasFactory;

    protected $table = 'photographies';
    protected $primaryKey = 'idnumber';

    public $incrementing = false;
    public $timestamps = false;

}
