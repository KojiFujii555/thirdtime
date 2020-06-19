@extends('layouts.app')

@section('level')

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

@endsection
