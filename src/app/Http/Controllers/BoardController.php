<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    private $Board;

    public function __construct(Board $Board){
        // Laravel 의 IOC(Inversion of Control) 입니다
        // 일단은 이렇게 모델을 가져오는 것이 추천 코드라고 생각하시면 됩니다.
        $this->Board = $Board;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // laravel 페이징 사용

        // ->get() 대신, ->paginate(한페이지에 보여줄 글 갯수)를 사용
        $data = Board::select(['board_id', 'user_id', 'board_title', 'board_content', 'created_at', 'updated_at', 'deleted_at', 'board_hit'])->orderBy('board_id', 'DESC')->paginate(10);
        // products 의 데이터를 최신순으로 페이징을 해서 가져옵니다.
        // $Boards = $this->Board->latest()->paginate(10);
        
        // return view('뷰파일 이름', compact('보내줄 변수명')); 
        return view('festival_talktalk', compact('data'));
        // produce/index.blade 에 $products 를 보내줍니다
        // return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 상세 페이지
    public function show(Board $Board){
    // show 에 경우는 해당 페이지의 모델 값이 파라미터로 넘어옵니다.
        return view('board.show', compact('board'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
