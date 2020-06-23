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
     public function index()
    {
        $data = [];
        if (\Auth::check()) { 
            $user = \Auth::user();
            $levels = $user->levels()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'levels' => $levels,
            ];
        }
        
        return view('levels.index', $data);
    }     
    
    public function second()
    {
        $data = [];
        if (\Auth::check()) { 
            $user = \Auth::user();
            $levels = $user->levels()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'levels' => $levels,
            ];
        }
        
        return view('levels.second', $data);
    }     
    
    public function third()
    {
        $data = [];
        if (\Auth::check()) { 
            $user = \Auth::user();
            $levels = $user->levels()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'levels' => $levels,
            ];
        }
        
        return view('levels.third', $data);
    }   
    public function buy()
    {
        $data = [];
        if (\Auth::check()) { 
            $user = \Auth::user();
            $levels = $user->levels()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'levels' => $levels,
            ];
        }
        
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
        return view('levels.create', [
            'level' => $level,
            'user' => $user,
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

        $level = new Level;
        $level->user_id = \Auth::id(); 
        $level->level = $request->level;
        $level->save();

        return redirect('/');
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
         if (\Auth::id() === $level->user_id){
        return view('levels.show', [
            'level' => $level,
        ]);}
         return redirect('/');
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
        // メッセージを更新
        $level->user_id = \Auth::id(); 
        $level->level = $request->level;
        $level->save();
        // トップページへリダイレクトさせる
        return redirect('/');
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
        return redirect('/');
        
    }
}
