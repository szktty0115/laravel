@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-blue">
                    <div class="d-flex justify-content-center mt-1">
                        <h3 class="header-title text-center">
                            <strong>応募フォーム</strong>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">こちらの募集に応募します。</div>
                    <div class="container">
                        <table class="table table-bordered mb-0 mt-2">
                            <thead class="text-center table-active">
                                <tr>
                                    <th>大会名</th>
                                    <th>大会期間</th>
                                    <th>募集人数</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $query['name'] }}</td>
                                    <td>{{ $query['starting_date'] }}~~{{ $query['ending_date'] }}</td>
                                    <td>{{ $query['limit'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered mt-0">
                            <thead class="text-center table-active">
                                <tr>
                                    <th>募集期間</th>
                                    <th>募集要項</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $query['recruit_start'] }}~~{{ $query['recruit_end'] }}</td>
                                    <td>{{ $query['guidelines'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-danger text-center mt-4">
                        ※ユーザー情報をご確認ください。
                    </div>
                    <form method="POST" action="{{ route('ca.update', ['id' => $query->id]) }}" class="mt-3">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><span class="text-danger">※</span>ユーザー名</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $general['name'] }}" required autocomplete="name" autofocus readonly>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right"><span class="text-danger">※</span>生年月日</label>
                            <div class="col-md-6">
                                <input id="birthday" type="text" class="form-control text-right @error('birthday') is-invalid @enderror" name="birthday" value="{{ $general['birthday'] }}" required autocomplete="birthday" autofocus readonly>
                                @error('birthday')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right"><span class="text-danger">※</span>電話番号</label>
                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ $user['tel'] }}" required autocomplete="tel" autofocus readonly>

                                @error('tel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><span class="text-danger">※</span>メールアドレス</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user['email'] }}" required autocomplete="email" autofocus readonly>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center mt-4 mb-2">
                            ※意気込みをお願いします。
                        </div>
                        <div class="form-group row">
                            <label for="guidelines" class="col-md-4 col-form-label text-md-right">コメント</label>
                            <div class="col-md-6">
                                <input id="guidelines" type="text" class="form-control @error('guidelines') is-invalid @enderror" name="guidelines" value="{{ $user['guidelines'] }}" autocomplete="guidelines" autofocus>
                                @error('guidelines')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary">確認</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection