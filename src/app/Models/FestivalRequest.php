<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FestivalRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'req_title',
        'req_start_date',
        'req_end_date',
        'area_code',
        'sigungu_code',
        'map_x',
        'map_y',
        'content_type_id',
        'tel',
        'poster_img',
        'list_img',
        'homepage',
        'business_id',
        'req_state',
        'admin_id '
    ];

    protected $primaryKey = 'req_id';
}
