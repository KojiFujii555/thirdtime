@extends('layouts.app')

@section('level')

    <h1>さんの欲しいもの</h1>

    @if (count($levels) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>メッセージ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($levels as $level)
                <tr>
                    {{-- メッセージ詳細ページへのリンク --}}
                    <td>{!! link_to_route('levels.show', $level->id, ['level' => $level->id]) !!}</td>
                    <td>{{ $level->level }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    {{-- メッセージ作成ページへのリンク --}}
    {!! link_to_route('levels.create', '欲しいもの新規登録', [], ['class' => 'btn btn-primary']) !!}

@endsection