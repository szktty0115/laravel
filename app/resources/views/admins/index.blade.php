@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-center mb-4">
        <a href="{{ route('tournaments.create') }}" class="btn btn-primary">新規大会作成</a>
        <a href="" class="btn btn-primary ml-5">主催者情報編集</a>
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
                                    <th>大会名</th>
                                    <th>募集期間</th>
                                    <th>人数上限</th>
                                    <th>大会日時</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>sample</td>
                                    <td>sample</td>
                                    <td>sample</td>
                                    <td>sample</td>
                                    <td class="text-center">
                                        <a href="">応募者一覧</a>
                                        <a href="">編集</a>
                                        <a href="">削除</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>sample</td>
                                    <td>sample</td>
                                    <td>sample</td>
                                    <td>sample</td>
                                    <td class="text-center">
                                        <a href="">応募者一覧</a>
                                        <a href="">編集</a>
                                        <a href="">削除</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>sample</td>
                                    <td>sample</td>
                                    <td>sample</td>
                                    <td>sample</td>
                                    <td class="text-center">
                                        <a href="">応募者一覧</a>
                                        <a href="">編集</a>
                                        <a href="">削除</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection