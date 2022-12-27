@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-center mb-4">
        <a href="{{ route('tournament.create', ['id' => $id]) }}" class="btn btn-outline-primary">新規大会作成</a>
        <a href="/admins/{{ $id }}" class="btn btn-outline-primary ml-5">主催者情報編集</a>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-blue">
                    <div class="d-flex justify-content-center mt-1">
                        <h3 class="header-title text-center">
                            <strong>募集中の大会一覧</strong>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <table class="table table-bordered mt-2">
                            <thead class="text-center table-active">
                                <tr>
                                    <th>ゲーム名</th>
                                    <th>大会名</th>
                                    <th>募集期間</th>
                                    <th>人数上限</th>
                                    <th>大会日時</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($query as $value)
                                <tr>
                                    <td>{{ $value['game_name'] }}</td>
                                    <td>{{ $value['name'] }}</td>
                                    <td>{{ date('Y-m-d', strtotime($value['starting_date'])) }}~{{ date('Y-m-d', strtotime($value['ending_date'])) }}</td>
                                    <td>{{ $value['limit'] }}</td>
                                    <td>{{ date('Y-m-d', strtotime($value['recruit_start'])) }}~{{ date('Y-m-d', strtotime($value['recruit_end'])) }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-outline-primary" href="{{ route('al.index', ['id' => $value['id']]) }}">応募者</a>
                                        <a class="btn btn-outline-primary mt-2" href="{{ route('tournament.update', ['id' => $value['id']]) }}">編集</a>
                                        <form action="/users/{{$value->id}}" method="POST" onclick="return confirm('本当に削除しますか??')">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" class="btn btn-outline-danger mt-2" value="削除" />
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection