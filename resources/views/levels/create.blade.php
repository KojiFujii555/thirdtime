@extends('layouts.app')

@section('level')
<body>
    <h1>新規登録</h1>

    <div class="col-12">
      {{-- タブ --}}
            @include('levels.navtabs')
  
        <div class="col-12 row">
         
            <div class="col-6">
                     {!! Form::model($level, ['route' => 'levels.store']) !!}
                <div class="form-group">
                    {!! Form::label('form_product', '商品名:') !!}
                    {!! Form::text('name', null, [
                     'class' => 'form-control',
                     'id' => 'form_product'
                    ]) !!}                   
                    {!! Form::label('form_price', '値段:') !!}
                    {!! Form::text('price', null, [
                     'class' => 'form-control',
                     'id' => 'form_price'
                    ]) !!}
                    {!! Form::label('form_url', '商品URL:') !!}
                    {!! Form::text('url', null, [
                     'class' => 'form-control',
                     'id' => 'form_url'
                    ]) !!}
                    {!! Form::label('form_date', '日付:') !!}
                     {!! Form::date('register', \Carbon\Carbon::now(), [
                     'class' => 'form-control',
                     'id' => 'form_date'
                     ]) !!}
                    
                    {!! Form::label('level', 'メモ:') !!}
                    {!! Form::text('memo', null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('新規登録する', ['class' => 'btn btn-primary']) !!}            
             {!! Form::close() !!}
            </div>     
            <div class='col-6'>
                  {{-- 楽天api --}}
            @include('levels.rakuten')
            </div>
     </div>
    </div>

</body>
@endsection