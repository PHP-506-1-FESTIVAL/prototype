<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'board_id',
        'comment_id',
        'user_id',
        'report_no',
        'report_detail',
        'report_type',
        'admin_id',
        'handle_flg',
        'review_id',
    ];

    protected $primaryKey = 'report_id';
}
