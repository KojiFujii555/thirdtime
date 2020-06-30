
     
        <div class="container">
            <h2>欲しいもの検索</h2>

            <div class="row">
                <div class="col-6">
               {{-- 検索フォーム --}}
                {!! Form::open(['route' => 'levels.rakuten']) !!}
                    <div class="form-group">
                    {!! Form::label('name', '検索キーワード') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('検索する', ['class' => 'btn btn-danger']) !!}
            　　{!! Form::close() !!}
        　　　　       
                </div>
            </div>

            <hr />

            @if ($response && $response->hits > 0)
                <div class="row">
                    <div class="col-12">
                        <h2>検索結果一覧</h2>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">画像</th>
                                    <th>商品名</th>
                                    <th>価格</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($response->Items as $item)
                                    <tr>
                                        <td class="text-center">
                                            <!--{{HTML::image($item->Item->smallImageUrls[0]->imageUrl, ENT_QUOTES, "UTF-8")}}-->
　　　　　　　　　　　　　　　　　　　<h2>あああ</h2>  
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
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
