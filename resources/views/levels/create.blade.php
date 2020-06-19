@extends('layouts.app')

@section('level')

    <h1>メッセージ新規作成ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($level, ['route' => 'levels.store']) !!}

                <div class="form-group">
                    {!! Form::label('level', 'メッセージ:') !!}
                    {!! Form::text('level', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection