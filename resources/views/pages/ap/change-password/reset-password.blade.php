@extends('layouts.admin')

@section('title')
Admin | Reset Password DK Pancing
@endsection

@section('sidebar')
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2><i class="nav-icon fas fa-user-cog"></i>Reset Password</h2>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Reset Password</li>
                        </ol>
                    </div>
                </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header bg-primary text text-white">Reset Password</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('ap.change-password.store') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Password Sekarang</label>
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @if($errors->has('current_password')) is-invalid @endif" name="current_password" value="{{ old('current_password') }}">
                                            @if($errors->has('current_password'))
                                            <div class="invalid-feedback">{{ $errors->first('current_password') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Password Baru</label>

                                        <div class="col-md-6">
                                            <input id="new_password" type="password" class="form-control @if($errors->has('new_password')) is-invalid @endif" name="new_password" value="{{ old('new_password') }}">
                                            @if($errors->has('new_password'))
                                            <div class="invalid-feedback">{{ $errors->first('new_password') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Konfirm Password Baru</label>

                                        <div class="col-md-6">
                                            <input id="new_confirm_password" type="password" class="form-control @if($errors->has('new_confirm_password')) is-invalid @endif" name="new_confirm_password" value="{{ old('new_confirm_password') }}">
                                            @if($errors->has('new_confirm_password'))
                                            <div class="invalid-feedback">{{ $errors->first('new_confirm_password') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Ubah Password
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
    </div>
</div>
@endsection