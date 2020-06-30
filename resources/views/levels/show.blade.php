@extends('layouts.app')

@section('level')
 @if (\Auth::check())


    <h1>id = {{ $level->id }} のメッセージ詳細ページ</h1>
         {{-- タブ --}}
            @include('levels.navtabs')

     <table class="table table-striped">
            <thead>
                   <tr>
                    <th>商品</th>
                    <th>値段</th>
                    <th>登録日</th>
                    <th>欲しいボタン</th>
                    <th>いらないボタン</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    {{-- メッセージ詳細ページへのリンク --}}
                    <td>{!! link_to_route('levels.show', $level->id, ['level' => $level->id]) !!}</td>
                    <td>{{ $level->level }}</td>
                    <td>{{ $level->level }}</td>
                    <td>欲しい！</td>
                    <td>
                        {{-- メッセージ削除フォーム --}}
                        {!! Form::model($level, ['route' => ['levels.destroy', $level->id], 'method' => 'delete']) !!}
                        {!! Form::submit('いらない', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                <tr>
                    <td>{{ $level->level }}</td>
                </tr>
            </tbody>
        </table>

             @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Tasklist</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif

@endsection
