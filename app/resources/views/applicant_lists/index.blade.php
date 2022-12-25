@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-blue">
                    <div class="d-flex justify-content-center mt-1">
                        <h3 class="header-title text-center">
                            <strong>応募情報一覧</strong>
                            @csrf
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <table class="table table-bordered mt-2">
                            <thead class="text-center table-active">
                                <tr>
                                    <th>ユーザー名</th>
                                    <th>生年月日</th>
                                    <th>電話番号</th>
                                    <th>メールアドレス</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($query as $value)
                                <tr>
                                    <td>{{ $value->user->general->name }}</td>
                                    <td>{{ $value->user->general->birthday }}</td>
                                    <td>{{ $value->user->tel }}</td>
                                    <td>{{ $value->user->email }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('reservation.delete', ['id' => $value['id']]) }}" method="POST">
                                            @csrf
                                            <input type="submit" class="btn btn-danger mt-3" value="削除" />
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