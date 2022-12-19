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
                    <div class="container">
                        <form action="">
                            @csrf
                            <div class="row justify-content-center mb-3">
                                <div class="col-md-6 input-group">
                                    <input id="" type="text" class="form-control" name="" value="">
                                    <button class="btn btn-outline-secondary" type="submit">検索</button>
                                </div>
                            </div>
                        </form>
                        <div class="d-flex justify-content-center">
                            <table>
                                @foreach($query as $user)
                                @foreach($user->tournament as $value)
                                <tr>
                                    <td colspan="4" rowspan="3">
                                        <div class="card">
                                            <div class="card-header">画像</div>
                                            <div class="card-body">{{ $value['img'] }}</div>
                                        </div>
                                    </td>
                                    <td colspan="4">
                                        <div class="card">
                                            <div class="card-header">大会名</div>
                                            <div class="card-body">{{ $value['name'] }}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="card">
                                            <div class="card-header">募集期間</div>
                                            <div class="card-body">{{ $value['starting_date'] }}~{{ $value['ending_date'] }}</div>
                                        </div>
                                    </td>
                                    <td colspan="1">
                                        <div class="card">
                                            <div class="card-header">人数上限</div>
                                            <div class="card-body">{{ $value['limit'] }}}}</div>
                                        </div>
                                    </td>
                                    <td colspan="1">
                                        <div class="card">
                                            <div class="card-header">大会日時</div>
                                            <div class="card-body">{{ $value['recruit_start'] }}~{{ $value['recuit_end'] }}</div>
                                        </div>
                                    </td>
                                    <td></td>
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
                                @endforeach
                                @endforeach
                            </table>
                        </div>
                        <div class="row justify-content-center mt-3">
                            <a href="" class="btn btn-primary">応募</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection