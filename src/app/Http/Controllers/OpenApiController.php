<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class OpenApiController extends Controller
{
    public function store(Request $request)
    {
        // 축제 데이터를 가져올 API URL
        $apiUrl = "https://apis.data.go.kr/B551011/KorService1/searchFestival1?serviceKey=%2Bo8Vb5NgOSYJzSk0%2BzIXmtmXJjrt8BEfzTWdSne%2BbWytU6UOZxtWQpwXvNBYPcnxx1PUuTYdhZ6tq7sp%2BwksMw%3D%3D&numOfRows=600&pageNo=1&MobileOS=ETC&MobileApp=AppTest&_type=json&listYN=Y&arrange=d&eventStartDate=20230101";

        // API에서 데이터를 가져옴
        $response = Http::withoutVerifying()->get($apiUrl)->json();//Http::withoutVerifying()는 SSL 인증서를 확인하지 않도록 설정하는 메서드
        //응답 데이터에서 response, body, items, item을 차례대로 접근하여 items 배열과 그 안에 있는 item들을 추출. 이 배열은 API에서 받은 축제 데이터의 목록을 나타냅니다
        $items = $response['response']['body']['items']['item'];//

        foreach ($items as $item) {
            $Festival = new Festival();
            $Festival->festival_title = $item['title'];
            $Festival->festival_start_date = $item['eventstartdate'];
            $Festival->festival_end_date = $item['eventenddate'];
            $Festival->area_code = $item['areacode'];
            $Festival->sigungu_code = $item['sigungucode'];
            $Festival->map_x = $item['mapx'];
            $Festival->map_y = $item['mapy'];
            $Festival->content_type_id = $item['contenttypeid'];
            $Festival->tel = $item['tel'];
            $Festival->poster_img = $item['firstimage'];
            $Festival->list_img = $item['firstimage2'];
            $Festival->save();
        }
        
        return response()->json(['message' => '데이터 저장 성공.']);
    }


}


?>