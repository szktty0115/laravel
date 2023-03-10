@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-blue">
                    <div class="d-flex justify-content-center mt-1">
                        <h3 class="header-title text-center">
                            <strong>大会日程編集</strong>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-danger text-center mt-4">
                        ※は必須入力です。
                    </div>
                    <form method="POST" action="{{ route('tournament.update', ['id' => $query['id']]) }}" enctype="multipart/form-data" class="mt-3">
                        @csrf
                        <div class="form-group row">
                            <label for="game_name" class="col-md-4 col-form-label text-md-right"><span class="text-danger">※</span>ゲーム名</label>
                            <div class="col-md-6">
                                <input id="game_name" type="text" class="form-control @error('game_name') is-invalid @enderror" name="game_name" value="{{ $query['game_name'] }}" required autocomplete="game_name" autofocus>
                                @error('game_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><span class="text-danger">※</span>大会名</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $query['name'] }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="starting_date" class="col-md-4 col-form-label text-md-right"><span class="text-danger">※</span>募集期間</label>
                            <div class="row">
                                <div class="col ml-3">
                                    <input id="starting_date" type="date" class="form-control w-auto text-right @error('starting_date') is-invalid @enderror" name="starting_date" value="{{ $query['starting_date'] }}" required autocomplete="starting_date" autofocus>
                                    @error('starting_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col mt-2">～</div>
                                <div class="col">
                                    <input id="ending_date" type="date" class="form-control w-auto text-right @error('ending_date') is-invalid @enderror" name="ending_date" value="{{ $query['ending_date'] }}" required autocomplete="ending_date" autofocus>
                                    @error('ending_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="limit" class="col-md-4 col-form-label text-md-right"><span class="text-danger">※</span>人数上限</label>
                            <div class="col-md-6">
                                <input id="limit" type="text" class="form-control @error('limit') is-invalid @enderror" name="limit" value="{{ $query['limit'] }}" required autocomplete="limit" autofocus>
                                @error('limit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right"><span class="text-danger">※</span>大会日時</label>
                            <div class="row">
                                <div class="col ml-3">
                                    <input id="recruit_start" type="date" class="form-control w-auto text-right @error('recruit_start') is-invalid @enderror" name="recruit_start" value="{{ $query['recruit_start'] }}" required autocomplete="recruit_start" autofocus>
                                    @error('recruit_start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col mt-2">～</div>
                                <div class="col">
                                    <input id="recruit_end" type="date" class="form-control w-auto text-right @error('recruit_end') is-invalid @enderror" name="recruit_end" value="{{ $query['recruit_end'] }}" required autocomplete="recruit_end" autofocus>
                                    @error('recruit_end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="guidelines" class="col-md-4 col-form-label text-md-right">募集要項</label>
                            <div class="col-md-6">
                                <input id="guidelines" type="text" class="form-control @error('guidelines') is-invalid @enderror" name="guidelines" value="{{ $query['guidelines'] }}" required autocomplete="guidelines" autofocus>
                                @error('guidelines')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="img" class="col-md-4 col-form-label text-md-right">画像</label>
                            <div class="col-md-6">
                                <input id="img" type="file" class="@error('img') is-invalid @enderror" name="img" value="{{ old('img') }}" required autocomplete="img" autofocus>
                                @error('img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-outline-primary">確認</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection