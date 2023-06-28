<?php

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : Controllers
 * 파일명       : BoardController.php
 * 이력         : v001 0613 신유진 new
 ************************************************/

namespace App\Http\Controllers;

// Model사용
use App\Models\Board;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoardController extends Controller
{
    private $Board;

    // public function __construct(Board $Board){
    //     // Laravel 의 IOC(Inversion of Control)
    //     // 이렇게 모델을 가져오는 것이 추천 코드
    //     $this->Board = $Board;
    // }

    // // 제약) 로그인이 되어있을 경우에만 접근 가능 <단,index 메소드는 제외>
    // public function __construct(){
    // $this->middleware('auth')->except('index');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
// [게시판 메인 페이지]
    public function index()
    {
        // user id가 아닌 user nickname으로 표현하기 위한 조인
        $data = DB::table('boards')
        ->join('users', 'boards.user_id', '=', 'users.user_id' )
        ->select('boards.board_id', 'users.user_nickname', 'boards.board_title', 'boards.board_content', 'boards.created_at', 'boards.updated_at', 'boards.deleted_at', 'boards.board_hit')
        // ->where('favorites.user_id', session('user_id'))
        ->where('boards.deleted_at', null)
        ->orderBy('boards.board_id', 'DESC')
        ->paginate(10);

        // laravel 페이징 사용
        // ->get() 대신, ->paginate(한페이지에 보여줄 글 갯수)를 사용
        // 1. board_id / DESC 페이징
        // $data = Board::select(['board_id', 'user_id', 'board_title', 'board_content', 'created_at', 'updated_at', 'deleted_at', 'board_hit'])->orderBy('board_id', 'DESC')->paginate(10);
        // 2. latest() 페이징
        // $data = $this->Board->latest()->paginate(10);

        // return view('뷰파일 이름', compact('보내줄 변수명'));
        // return view('board_list', compact('data'));
        return view('board_list', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
// [작성 페이지] 이동
    public function create()
    {
        // 로그인 체크(로그인 안된상태면 접근 못하게)
        // -----------------------------------------로그인후 글작성페이지로 이동하도록 고쳐주세요
        if(auth()->guest()) {
            return redirect()->route('user.login');
        }

        return view('board_write');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
// [작성 페이지] DB에 저장하는 함수
    public function store(Request $request)
    {
        $request->validate([
            // '받은 값' => '체크해줄것'
            'writetitle'     => 'required|between:1,50'
            ,'writecontent'  => 'required|between:1,2000'
        ]);

        $boards = new Board([
            'user_id' => session()->get('user_id')
            ,'board_title' => $request->input('writetitle')
            ,'board_content' => $request->input('writecontent')
        ]);

        $boards->save();

        $id = $boards->board_id;

        // 게시판 메인페이지(목록)으로 이동
        // return redirect()->route('board.index');
        // 추가된 글 상세 페이지로 이동
        return redirect()->route('board.show', ['board' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // [상세 페이지] 이동
    public function show($board_id){
        // $data = Board::find($board_id);

        // user id가 아닌 user nickname으로 표현하기 위한 조인
        $boards = DB::table('boards')
        ->join('users', 'boards.user_id', '=', 'users.user_id' )
        ->select('boards.board_id', 'users.user_id', 'users.user_nickname', 'boards.board_title', 'boards.board_content', 'boards.created_at', 'boards.updated_at', 'boards.board_hit')
        ->where('boards.board_id', $board_id)->get();

        $data = Board::find($board_id);
        // dump($data);
        $data->board_hit++;
        $data->save();

        // + 쿠키의 이름으로 사용할 고유한 값을 생성
        // + ex) 게시물 id가 1인 경우 $cookieKey는 'boardHits1'
        // $cookieName = 'boardHits'.$board_id;
        // $hitsTime = now()->addMinutes(10); // 조회수 쿨타임 설정

        // + 쿠키가 존재하지 않을 경우에만 아래의 로직을 실행
        // + Cookie::has($cookieName) : $cookieKey로 지정한 이름의 쿠키가 있는지 확인
        // + 쿠키가 존재하는 경우 true, 존재하지 않는 경우 false를 반환
        // if (!Cookie::has($cookieName)) {
            // $boards->hits++; // 조회수 올려주기
            // $boards->timestamps = false; // 조회수 올려도 수정일자 바뀌지 않게
            // $boards->save();

            // + Cookie::queue() : Laravel에서 제공하는 쿠키를 설정하고 브라우저에 전송하는 메서드
            // + $cookieKey는 쿠키의 이름, true는 쿠키의 값, $hitsTime->timestamp는 쿠키의 유효 기간을 초 단위의 정수 값으로 설정
            // + $hitsTime->timestamp : $hitsTime 변수가 Carbon 객체인데, Cookie::queue() 메서드는 세 번째 매개변수로 정수 값을 요구하기때문에 timestamp로 변환
            // Cookie::queue($cookieName, true, $hitsTime->timestamp);
        // }

        // find() : 에외발생시 false만 리턴, 프로그램이 계속 실행됨
        // findOrFail() : 예외발생시 에러처리(404)

        return view('board_detail')->with('boards', $boards)->with('data', $data);
        // return view('board_detail')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // [수정 페이지] 이동
    public function edit($board_id)
    {

        // 로그인 체크(로그인 안된상태면 접근 못하게)
        if(auth()->guest()) {
            return redirect()->route('user.login');
        }

        $boards = Board::find($board_id);

        // 작성자 체크(작성자가 지금 로그인 되어있는 사람일 경우만 접근)
        if(auth() === $boards->board_id) {
            return view('board_edit')->with('boards', Board::findOrFail($board_id));
        }
        else {
            return redirect()->route('user.login');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // [수정 페이지] 수정내용 등록
    public function update(Request $request, $board_id)
    {
        // id를 리퀘스트 객체에 합치기
        $request->request->add(['user_id' => $board_id]);

        // 유효성 검사 : error나면 바로 return
        $request->validate([
            'title'     => 'required|between:3,30'
            ,'content'  => 'required|max:2000'
            ,'user_id'       => 'required|integer'
        ]);

        // $validator->fails() : error가 있다면 true
        // if($validator->fails()) {
            // redirect()->back(); : 이전에 요청이 왔던 페이지로 돌아감
        //     return redirect()
        //         ->back()
        //         ->withErrors($validator)
        //         ->withInput($request->only('title', 'content'));
        // }

        $boards = Board::find($board_id);
        $boards->board_title = $request->title;
        $boards->board_content = $request->content;
        $boards->save();

        return redirect()->route('board.show', ['board' => $board_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 글 삭제
    public function destroy($board_id)
    {
        // board_id에 해당하는 board를 destroy(ctrl+클릭해보기)
        // destory()는 파라미터를 PK(id)를 받아야함
        // dump($board_id);
        Board::destroy($board_id);
        return redirect('/board');
    }
    //0628 김재성 검색기능
    public function search(Request $val)
    {
        $val->validate(['search'=>'required|max:100']);
        // dump($val);
        $result_search=DB::table('boards')
        ->join('users', 'boards.user_id', '=', 'users.user_id' )
        ->select('boards.board_id', 'users.user_nickname', 'boards.board_title', 'boards.board_content', 'boards.created_at', 'boards.updated_at', 'boards.deleted_at', 'boards.board_hit')->where('boards.deleted_at', null)
        ->where(function ($query) use ($val) {
            $query->where('board_title','like','%'.$val->search.'%') // 제목에 검색내용이 포함된경우
            ->orWhere('board_content','like','%'.$val->search.'%'); // 보드내용에 검색내용이 포함된경우
        })->paginate(10);
        // dump($result_search);
        return view('board_list')->with('data',$result_search);
    }
}
