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
        // メッセージ一覧を取得
        $levels = Level::all();

        // メッセージ一覧ビューでそれを表示
        return view('levels.index', [
            'levels' => $levels,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $level = new Level;

        // メッセージ作成ビューを表示
        return view('levels.create', [
            'level' => $level,
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
        // メッセージを作成
        $level = new Level;
        $level->level = $request->level;
        $level->save();

        // トップページへリダイレクトさせる
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
        // idの値でメッセージを検索して取得
        $level = Level::findOrFail($id);

        // メッセージ詳細ビューでそれを表示
        return view('levels.show', [
            'level' => $level,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // idの値でメッセージを検索して取得
        $level = Level::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('levels.edit', [
            'level' => $level,
        ]);
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
        $level->delete();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}
