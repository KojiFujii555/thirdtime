@extends('layouts.app')

@section('level')
 @if (Auth::check())
    <h1>{{ Auth::user()->name }}さんの欲しいもの</h1>
    
        <table class="table table-striped">
            {{-- タブ --}}
            @include('levels.navtabs')
            <thead>
                <tr>
                    <th>商品名</th>
                    <th>値段</th>
                    <th>登録日</th>
                    <th>商品リンク</th>
                    <th>購入の有無</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($levels as $level)
                @if ($level->level === '3')
                <tr>
                        {{-- 楽天へのリンク --}}
                    <td>{!! link_to_route('levels.show', $level->name, ['level' => $level->id]) !!}</td>
                    <td>{{ $level->price }}</td>
                    <td>{{ $level->register }}</td>
                    <td><button type="button" class="btn btn-success" onclick="window.open('{{ $level->url }}')">購入ボタン</button></td>                   
                    <td>
                        {{-- メッセージ削除フォーム --}}
                        {!! Form::model($level, ['route' => ['levels.destroy', $level->id], 'method' => 'delete']) !!}
                        {!! Form::submit('買った', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>

    <!--{{-- メッセージ作成ページへのリンク --}}-->
    <!--{!! link_to_route('levels.create', '欲しいもの新規登録', [], ['class' => 'btn btn-primary']) !!}-->
@else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Third Time</h1>
                <p>衝動買いを防止して、賢く節約</p>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', '新規登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
                {{-- ログインページへのリンク --}}
                {!! link_to_route('login', 'ログイン', [],['class' => 'btn btn-lg btn-primary']) !!}

            </div>
        </div>
    @endif
@endsection