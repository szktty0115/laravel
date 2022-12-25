@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-center mb-4">
        <a href="/tournaments" class="btn btn-outline-dark">大会一覧</a>
        <a href="{{ route('user.edit', ['id' => $id]) }}" class="btn btn-outline-dark ml-5">ユーザー情報編集</a>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-blue">
                    <div class="d-flex justify-content-center mt-1">
                        <h3 class="header-title text-center">
                            <strong>予約済み大会一覧</strong>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <table class="table table-bordered mt-2">
                            <thead class="text-center table-active">
                                <tr>
                                    <th>大会名</th>
                                    <th>大会日時</th>
                                    <th>募集期間</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($query as $value)
                                <tr>
                                    <td>{{ $value['name'] }}</td>
                                    <td>{{ $value['starting_date'] }}~{{ $value['ending_date'] }}</td>
                                    <td>{{ $value['recruit_start'] }}~{{ $value['recruit_end'] }}</td>
                                    <td>
                                        <form action="{{ route('reservation.user.delete', ['id' => $value['id']]) }}" method="POST" onclick="return confirm('本当に削除しますか??')">
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