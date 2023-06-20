<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FestivalHit extends Model
{
    use HasFactory;

    protected $primaryKey = 'hit_id';
    protected $fillable=[
        'select_cnt',
        'hit_timer',
        'hit_today',
        'hit_id'
    ];

    protected $hidden = [
        'remember_token'
    ];
    public $timestamps = false;
}
