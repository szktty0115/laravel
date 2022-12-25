@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-blue">
                    <div class="d-flex justify-content-center mt-1">
                        <h3 class="header-title text-center">
                            <strong>募集中の大会一覧</strong>
                        </h3>
                    </div>
                </div>

                <div class="card-body">
                    <div class="container" id="content">
                        <form action="/tournaments" method="GET">
                            @csrf
                            <div class="row justify-content-center mb-3">
                                <div class="col-md-6 input-group">
                                    <input id="keyword" type="text" class="form-control" name="keyword" value="{{ $keyword }}">
                                    <input type="hidden" id="count" value="5">
                                    <button class="btn btn-outline-secondary ml-2" type="submit">検索</button>
                                </div>
                            </div>
                        </form>
                        @foreach($query as $value)
                        <div class="d-flex justify-content-center">
                            <table>
                                <tr>
                                    <td colspan="4" rowspan="3" width="30%">
                                        <div class="card">
                                            <div class="card-header">画像</div>
                                            <img class="card-body" src="{{ Storage::url($value['img']) }}" width="100%">
                                        </div>
                                    </td>
                                    <td colspan="1" width='25%'>
                                        <div class="card">
                                            <div class="card-header">ゲーム名</div>
                                            <div class="card-body">{{ $value['game_name'] }}</div>
                                        </div>
                                    </td>
                                    <td colspan="1" width='25%'>
                                        <div class="card">
                                            <div class="card-header">大会名</div>
                                            <div class="card-body">{{ $value['name'] }}</div>
                                        </div>
                                    </td>
                                    <td colspan="1" width='20%'>
                                        <div class="card">
                                            <div class="card-header">会社名</div>
                                            <div class="card-body">{{ $value['admin_name'] }}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1">
                                        <div class="card">
                                            <div class="card-header">募集期間</div>
                                            <div class="card-body">{{ date('Y-m-d', strtotime($value['starting_date'])) }}~{{ date('Y-m-d', strtotime($value['ending_date'])) }}</div>
                                        </div>
                                    </td>
                                    <td colspan="1">
                                        <div class="card">
                                            <div class="card-header">大会日時</div>
                                            <div class="card-body">{{ date('Y-m-d', strtotime($value['recruit_start'])) }}~{{ date('Y-m-d', strtotime($value['recruit_end'])) }}</div>
                                        </div>
                                    </td>
                                    <td colspan="1">
                                        <div class="card">
                                            <div class="card-header">人数上限</div>
                                            <div class="card-body">{{ $value['limit'] }}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <div class="card">
                                            <div class="card-header">募集要項</div>
                                            <div class="card-body">{{ $value['guidelines'] }}</div>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                        <div class="row justify-content-center mt-3 mb-4">
                            <a href="{{ route('ca.index', ['id' => $value['id']]) }}" class="btn btn-outline-primary">応募</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
            // ajax post送信するために必要
        });

        // スクロールされた時に実行
        $(window).on("scroll", function() {
            // スクロール位置
            const bodyHeight = $(document).innerHeight(); // body(全ての長さ)の高さを取得
            const windowHeight = window.innerHeight; // windowの高さを取得(ブラウザで見えているもの)

            let sclTop = $(window).scrollTop();
            const bottomPoint = bodyHeight - windowHeight - sclTop;
            //スクロールした長さ　＊要注意

            // 画面最下部にスクロールされている場合
            if (bottomPoint <= 1) {
                // ajaxコンテンツ追加処理
                ajaxAddContent()
            }
        });

        function ajaxAddContent() {
            // 追ajaxAddContent
            var add_content = "";
            // コンテンツ件数           
            var count = $("#count").val();
            console.log(count);
            var keyword = $("#keyword").val();
            // ajax処理
            $.post({
                type: "post",
                datatype: "json",
                url: "/ajax",
                data: {
                    count: count,
                    keyword: keyword,
                } //
            }).done(function(data) {
                console.log(data);
                // コンテンツ生成
                $.each(data[0], function(key, val) {
                    add_content = "<div class='d-flex justify-content-center'><table><tr><td colspan='4'rowspan='3' width='30%'><div class='card'><div class='card-header'>画像</div><img src='/storage/" + val.img + "' class='card-body' width='100%'></div></td>  <td colspan='1' width='25%'><div class='card'><div class='card-header'>ゲーム名</div><div class='card-body'>" + val.game_name + "</div></div></td> <td colspan='1' width='25%'><div class='card'><div class='card-header'>大会名</div><div class='card-body'>" + val.name + "</div></div></td> <td colspan='1' width='20%'><div class='card'><div class='card-header'>会社名</div><div class='card-body'>" + val.admin_name + "</div></div></td></tr> <tr><td colspan='1'><div class='card'><div class='card-header'>募集期間</div><div class='card-body'>" + val.starting_date + "~" + val.ending_date + "</div></div></td><td colspan='1'><div class='card'><div class='card-header'>大会日時</div><div class='card-body'>" + val.recruit_start + "~" + val.recruit_end + "</div></div></td><td colspan='1'><div class='card'><div class='card-header'>人数上限</div><div class='card-body'>" + val.limit + "</div></div></td></tr> <tr><td colspan='4'><div class='card'><div class='card-header'>募集要項</div><div class='card-body'>" + val.guidelines + "</div></div></td></tr></table> </div><div class='row justify-content-center mt-3 mb-4'><a href='competition_application/" + val.id + "' class='btn btn-outline-primary'>応募</a></div>";
                    $("#content").append(add_content);
                })
                // コンテンツ追加
                $("#count").val(data[1]);
            }).fail(function(e) {
                console.log(e);
            })
        }
    });
</script>