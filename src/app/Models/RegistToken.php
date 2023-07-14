<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistToken extends Model
{
    use HasFactory;

    protected $primaryKey = 'mail_id';
    public $timestamps = false;
}
