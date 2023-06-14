<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrantPrivilege extends Model
{
    use HasFactory;

    protected $primaryKey = 'privilege_id';
}
