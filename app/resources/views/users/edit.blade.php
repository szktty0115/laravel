@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-blue">
                    <div class="d-flex justify-content-center mt-1">
                        <h3 class="header-title text-center">
                            <strong>ユーザー情報編集</strong>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.store', ['id' => $id]) }}" class="mt-3">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><span class="text-danger">※</span>ユーザー名</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="<?php if (isset($general['name'])) {
                                                                                                                                                echo $general['name'];
                                                                                                                                            } ?>" required autocomplete="name" autofocus>
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
                                <input id="birthday" type="date" class="form-control text-right @error('birthday') is-invalid @enderror" name="birthday" value="<?php if (isset($general['birthday'])) {
                                                                                                                                                                    echo $general['birthday'];
                                                                                                                                                                } ?>" required autocomplete="birthday" autofocus>
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
                                <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="<?php if (isset($query['tel'])) {
                                                                                                                                            echo $query['tel'];
                                                                                                                                        } ?>" required autocomplete="tel" autofocus>

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
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="<?php if (isset($query['email'])) {
                                                                                                                                                echo $query['email'];
                                                                                                                                            } ?>" required autocomplete="email" autofocus>
                                @error('email')
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
    @endsection