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
                </tr>
            </thead>
            <tbody>
                <tr>
                    {{-- メッセージ詳細ページへのリンク --}}
                    <td>{{ $level->name  }}</td>
                    <td>{{ $level->price }}</td>
                    <td>{{ $level->register }}</td>
                </tr>
                <tr>
                    <td>{{ $level->memo }}</td>
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
