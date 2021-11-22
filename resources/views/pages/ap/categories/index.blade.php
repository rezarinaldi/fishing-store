@extends('layouts.admin')

@section('title')
Admin | Kategori DK Pancing
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
                            <li class="breadcrumb-item active">Kategori Produk</li>
                        </ol>
                    </div>
                </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                        @if(session()->get('failed'))
                        <div class="alert alert-warning">
                            {{ session()->get('failed') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-lg-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-description">
                            <a href="{{ route('ap.categories.create') }}"><button type="button" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Tambah Data Baru</button></a>
                        </p>
                        <div class="card-tools">
                            <div class="mx-auto pull-right">
                                <div class="">
                                    <form action="" method="GET" role="search">
                                        <div class="input-group">
                                            <span class="input-group-btn mr-1 mt-2">
                                                <button class="btn btn-info" type="submit" title="seacrh">
                                                    <span class="fas fa-search"></span>
                                                </button>
                                            </span>
                                            <input name="keyword" id="keyword" class="form-control mr-1 mt-2" placeholder="Cari berdasarkan nama kategori" value="{{ request('keyword') }}">
                                            <a href="{{ route('ap.categories.index') }}" class="mr-1 mt-2">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-danger" type="button" title="Refresh page">
                                                        <span class="fas fa-sync-alt"></span>
                                                    </button>
                                                </span>
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover text text-center">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Kategori</th>
                                            <th>Slug</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach($categories as $key => $c)
                                    <tbody>
                                        <tr>
                                            <td>{{ ($categories->currentPage()-1) * $categories->perpage() + $key + 1 }}</td>
                                            <td>{{ $c->nm_category }}</td>
                                            <td>{{ $c->slug }} </td>
                                            <td>
                                                <div class="d-flex centered">
                                                    <a href="{{ route('ap.categories.edit', $c->id) }}" class="btn btn-outline-warning mr-2" type="button" style="color: #404040;" onmouseover="this.style.color='white'" onMouseOut="this.style.color='#404040'">
                                                        <i class="fas fa-pencil-alt"></i> Edit
                                                    </a>

                                                    <button type="button" class="btn btn-outline-danger" style="color: #404040;" onmouseover="this.style.color='white'" onMouseOut="this.style.color='#404040'" data-toggle="modal" data-target="#delete_categories_{{ $c->id }}">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>

                                                    <div class="modal fade" id="delete_categories_{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <form action="{{ route('ap.categories.destroy', $c->id)}}" id="form_delete_post_{{ $c->id }}" method="post">
                                                                @csrf
                                                                @method('DELETE');
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Yakin mau hapus kategori "<b>{{ $c->nm_category }}</b>" ?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                                        <button type="submit" class="btn btn-danger">Yes! Delete It</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        {{ $categories->onEachSide(5)->appends([
                            'keyword' => request('keyword')])->links() 
                        }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection