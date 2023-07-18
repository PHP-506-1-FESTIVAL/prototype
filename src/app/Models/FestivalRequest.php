<?php

// {{-- CREATE TABLE `festival_requests` (
//     요청번호 `req_id`	INT	NOT NULL	COMMENT 'PK, AUTO_INCREMENT',
//     요청자 ID `user_id`	INT	NOT NULL	COMMENT 'FK',
//     요청 날짜 `created_at`	TIMESTAMP	NULL,
//     축제 이름 `req_title`	VARCHAR(255)	NOT NULL,
//     행사 시작일 `req_start_date`	DATE	NOT NULL,
//     행사 종료일 `req_end_date`	DATE	NOT NULL,
//     지역코드 `area_code`	VARCHAR(64)	NOT NULL,
//     시군구 코드 `sigungu_code`	VARCHAR(64)	NOT NULL,
//     GPS X좌표 `map_x`	VARCHAR(64)	NOT NULL,
//     GPS Y좌표 `map_y`	VARCHAR(64)	NOT NULL,
//     관광타입 `content_type_id`	VARCHAR(64)	NOT NULL,
//     전화 번호 `tel`	VARCHAR(64)	NOT NULL,
//     포스터 이미지 `poster_img`	VARCHAR(512)	NULL	COMMENT 'path',
//     썸네일 이미지 `list_img`	VARCHAR(512)	NULL	COMMENT 'path',
//     홈페이지 `homepage`	VARCHAR(512)	NULL,
//     사업자 번호 `business_id`	VARCHAR(64)	NOT NULL,
//     요청 상태 `req_state`	CHAR(1)	NOT NULL	DEFAULT '0'	COMMENT '0미승인, 1승인,2 반려',
//     처리 날짜 `updated_at`	TIMESTAMP	NULL,
//     처리관리자 번호 `admin_id`	INT	NOT NULL	COMMENT 'FK'
// ); --}}

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
