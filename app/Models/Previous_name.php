<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Previous_name extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $hidden = ['id', 'CompanyNumber'];
}