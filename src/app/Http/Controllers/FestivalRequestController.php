<?php
/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : Controllers
 * 파일명       : FestivalRequestController.php
 * 이력         : v002 0718 신유진 new
 ************************************************/

namespace App\Http\Controllers;

use App\Models\FestivalRequest;
use Illuminate\Http\Request;

class FestivalRequestController extends Controller
{
    // [축제 요청] 페이지 이동 -> MainController.php_115line

    // [축제 요청] DB에 저장하는 함수
    public function store(Request $request)
    {
        // 'user_id',
        // 'req_title',
        // 'req_start_date',
        // 'req_end_date',
        // 'area_code',
        // 'sigungu_code',
        // 'map_x',
        // 'map_y',
        // 'content_type_id',
        // 'tel',
        // 'poster_img',
        // 'list_img',
        // 'homepage',
        // 'business_id',
        // 'req_state',
        // 'admin_id '

        $request->validate([
            // '받은 값' => '체크해줄것'
            'writetitle'     => 'required|between:1,50'
            ,'writecontent'  => 'required|between:1,2000'
        ]);

        $boards = new FestivalRequest([
            'user_id' => session()->get('user_id')
            ,'req_title' => $request->input('writetitle')
            
            ,'board_content' => $request->input('writecontent')
            ,'board_title' => $request->input('writetitle')
            ,'board_content' => $request->input('writecontent')
            ,'board_title' => $request->input('writetitle')
            ,'board_content' => $request->input('writecontent')
            ,'board_title' => $request->input('writetitle')
            ,'board_content' => $request->input('writecontent')
            ,'board_title' => $request->input('writetitle')
            ,'board_content' => $request->input('writecontent')
        ]);

        $boards->save();

        $id = $boards->board_id;

        // 추가된 글의 상세 페이지로 이동
        return redirect()->route('board.show', ['board' => $id]);
    }
}
