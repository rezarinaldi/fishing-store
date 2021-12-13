@extends('layouts.admin')

@section('title')
Admin | Kategori {{ config('settings.name') }}
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
                        <h2><i class="nav-icon fas fa-book"></i> Kategori Produk</h2>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('ap.categories.index') }}">Kategori Produk</a>
                            </li>
                            <li class="breadcrumb-item active">Tambah Kategori Produk</li>
                        </ol>
                    </div>
                </div>
        </section>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Kategori</h4>
                        <form class="forms-sample" action="{{ route('ap.categories.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id" name="id" placeholder="id" hidden>
                            </div>
                            <div class="form-group">
                                <label for="nm_category">Nama Kategori</label>
                                <input type="text"
                                    class="form-control @if($errors->has('nm_category')) is-invalid @endif"
                                    id="nm_category" name="nm_category" placeholder="Nama Kategori">
                                @if($errors->has('nm_category'))
                                <div class="invalid-feedback">{{ $errors->first('nm_category') }}</div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{ route('ap.categories.index') }}" class="btn btn-light">
                                Batal
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection