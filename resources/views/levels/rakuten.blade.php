<html>
  <head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
　</head>
　<body>

        <div class="container">
            <h2>欲しいもの検索</h2>

            <div class="row">
                <div class="col-6">
               {{-- 検索フォーム --}}
                {!! Form::open(['route' => 'levels.rakuten']) !!}
                    <div class="form-group">
                    {!! Form::label('keyword', '検索キーワード') !!}
                    {!! Form::text('keyword', null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('検索する', ['class' => 'btn btn-success']) !!}
            　　{!! Form::close() !!}
        　　　　       
                </div>
            </div>

            <hr />

            @if ($response && $response->hits > 0)
                <div class="row">
                    <div class="col-12">
                        <h2>検索結果</h2>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">画像</th>
                                    <th>商品名</th>
                                    <th>価格</th>
                                    <th>ボタン</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($response->Items as $item)
                                     <tr>
                                        <td class="text-center">
                                            <img src="{{ $item->Item->smallImageUrls[0]->imageUrl }}">
                                        </td>
                                        <td>
                                            <a class="product" href="{{ $item->Item->itemUrl }}" target="_blank">
                                             {{ $item->Item->itemName }}
                                            </a>
                                        </td>
                                        <td>
                                           <p class="price">¥{{ number_format($item->Item->itemPrice) }} </p>  
                                        </td>          
                                        <td>
                                            <input class="want_btn" type="button" value="欲しい"></input>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <p>検索結果はありません</p>
            @endif
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
        <script src="{{ secure_asset('js/main.js') }}"></script>
        </body>