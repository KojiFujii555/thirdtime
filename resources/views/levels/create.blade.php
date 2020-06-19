@extends('layouts.app')

@section('level')

    <h1>メッセージ新規作成ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($level, ['route' => 'levels.store']) !!}

                <div class="form-group">
                    {!! Form::label('level', 'メッセージ:') !!}
                    {!! Form::text('level', null, ['class' => 'form-control']) !!}
                    {!! Form::label('level', '値段:') !!}
                    {!! Form::text('level', null, ['class' => 'form-control']) !!}
                    {!! Form::label('level', '商品URL:') !!}
                    {!! Form::text('level', null, ['class' => 'form-control']) !!}
                    {!! Form::label('level', 'メモ:') !!}
                    {!! Form::text('level', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('新規登録する', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection