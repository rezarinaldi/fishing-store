@extends('layouts.admin')

@section('title')
Admin | Ubah Kategori {{ config('settings.name') }}
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
                            <li class="breadcrumb-item active">Ubah Kategori Produk</li>
                        </ol>
                    </div>
                </div>
        </section>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ubah Kategori</h4>
                        <form class="forms-sample" action="{{ route('ap.categories.update',$category->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            @if(session()->get('success'))
                            <div class="alert alert-success">
                                <span class="text text-sm">{{ session()->get('success') }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id" name="id" placeholder="id"
                                    value="{{ $category->id }}" hidden>
                            </div>
                            <div class="form-group">
                                <label for="nm_category">Nama Kategori</label>
                                <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif"
                                    id="nm_category" name="nm_category" value="{{ $category->nm_category }}"
                                    placeholder="Nama Kategori">
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