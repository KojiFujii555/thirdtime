<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;  

class LevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function level_up(){
        $data = [];
        if (\Auth::check()) { 
            $user = \Auth::user();
            $levels = $user->levels()->orderBy('created_at', 'desc')->paginate(10);
            $data = [
                'user' => $user,
                'levels' => $levels,
            ];
        }
        return $data;
     }

     public function index()
    {
        $data = $this -> level_up();
        return view('levels.index',$data);
    }     
        
    
    public function second()
    {
        $data = $this -> level_up();
        return view('levels.second', $data);
    }        
    
    public function third()
    {
        $data = $this -> level_up();
        return view('levels.third', $data);
    }   
    
    public function buy()
    {
       $data = $this -> level_up();
        return view('levels.buy', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        $user = \Auth::user();
        $level = new Level;
        $response = '';
        $keyword = '';
        $url = 'https://app.rakuten.co.jp/services/api/IchibaItem/Search/20170706';
        $params = [
        'format' => 'json',
        'applicationId' => '1084521773457364307',
        'hits' => 15,
        'imageFlag' => 1
    ];
        
        return view('levels.create', [
            'level' => $level,
            'user' => $user,
            'response' => $response, 
            'keyword' => $keyword,
            'url' => $url,
            'params' => $params,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {       
        
        // バリデーション
        $request->validate([
            'price' => 'required|max:255',
            'name' => 'required|max:255',
            'register' => 'required|max:255',
            'url' => 'required',
        ]);
        
        $level = new Level;
        $level -> user_id = \Auth::id();
        $level->level = 0;
        $level->price = $request->price; 
        $level->name = $request->name; 
        $level->url = $request->url; 
        $level->memo = $request->memo; 
        $level->register = $request->register; 
        $level->save();  

        return redirect('/levels');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        $level = Level::findOrFail($id);
        $user = \Auth::user();

         if (\Auth::id() === $level->user_id){
        return view('levels.show', [
            'level' => $level,
            'user' => $user,
        ]);}
        return redirect('/levels');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $level = Level::findOrFail($id);
        if (\Auth::id() === $level->user_id){
        return view('levels.edit', [
            'level' => $level,
        ]);}
         return redirect('/');
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
         
        // idの値でメッセージを検索して取得
        $level = Level::findOrFail($id);
        $level->level = $level->level + 1;
        $level->save();
        // トップページへリダイレクトさせる
        return redirect('/levels/create');
    }    

    
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        // idの値でメッセージを検索して取得

        $level = Level::findOrFail($id);
    
        // メッセージを削除
        if (\Auth::id() === $level->user_id) {
                    $level->delete();
        }


        // トップページへリダイレクトさせる
        return redirect('/levels/create');
    }     
    
    public function rakuten(Request $request) 
    {
        $request->validate([
        'keyword' => 'min:2',
        ]);

    $user = \Auth::user();
        $level = new Level;
        $response = '';
        $keyword = '';
        $url = 'https://app.rakuten.co.jp/services/api/IchibaItem/Search/20170706';
        $params = [
        'format' => 'json',
        'applicationId' => '1084521773457364307',
        'hits' => 5,
        'imageFlag' => 1
    ];

        // 検索する！のボタンが押された場合の処理
    if ($request->keyword) {

        $keyword = $request->keyword;
        $excute = $this -> execute_api($url, $params, $keyword);
        $response = json_decode($excute);  // JSONデータをオブジェクトにする
    }
        return view('levels.create', [
            'level' => $level,
            'user' => $user,
            'response' => $response, 
            'keyword' => $keyword,
            'url' => $url,
            'params' => $params,
        ]);
    }

            // Web APIを実行する
        public function execute_api($url, $params, $keyword) {
        $query = http_build_query($params, "", "&");
        $search_url = $url . '?' . $query . '&keyword=' . $keyword;

        return file_get_contents($search_url);
    }
}
