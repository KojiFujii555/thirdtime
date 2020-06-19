@extends('layouts.app')

@section('level')
 @if (Auth::check())

    <h1>id: {{ $level->id }} のメッセージ編集ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($level, ['route' => ['levels.update', $level->id], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('level', 'メッセージ:') !!}
                    {!! Form::text('level', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
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