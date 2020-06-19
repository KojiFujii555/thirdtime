@extends('layouts.app')

@section('level')
 @if (\Auth::check())


    <h1>id = {{ $level->id }} のメッセージ詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $level->id }}</td>
        </tr>
        <tr>
            <th>メッセージ</th>
            <td>{{ $level->level }}</td>
        </tr>
    </table>

    {{-- メッセージ編集ページへのリンク --}}
    {!! link_to_route('levels.edit', 'このメッセージを編集', ['level' => $level->id], ['class' => 'btn btn-light']) !!}

    {{-- メッセージ削除フォーム --}}
    {!! Form::model($level, ['route' => ['levels.destroy', $level->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
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
