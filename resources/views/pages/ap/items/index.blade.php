@extends('layouts.admin')

@section('title')
Admin | Item {{ config('settings.name') }}
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
                        <h2><i class="nav-icon fab fa-product-hunt"></i> Produk</h2>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Produk</li>
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
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-description">
                            <a href="{{ route('ap.items.create') }}"><button type="button" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Tambah Data Baru</button></a>
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
                                            <input name="keyword" id="keyword" class="form-control mr-1 mt-2" placeholder="Cari berdasarkan nama produk" value="{{ request('keyword') }}">
                                            <a href="{{ route('ap.items.index') }}" class="mr-1 mt-2">
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
                                            <th>Banyak</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach($items as $key => $i)
                                    <tbody>
                                        <tr>
                                            <td>{{ ($items->currentPage()-1) * $items->perpage() + $key + 1 }}</td>
                                            <td>{{ $i->nm_items }}</td>
                                            <td>{{ $i->quantity }} </td>
                                            <td>
                                                @php $total = 0 @endphp
                                                @if($i->discount > 0)
                                                @php $total += $i['price'] - $i['discount'] @endphp
                                                @else($i->discount = 0)
                                                @php $total += $i['price'] @endphp
                                                @endif
                                                @currency($total)
                                            </td>
                                            <td>
                                                <div class="d-flex centered">
                                                    <a href="{{ route('ap.items.show', $i->id) }}" class="btn btn-outline-info mr-2" type="button"  style="color: #404040;" onmouseover="this.style.color='white'" onMouseOut="this.style.color='#404040'">
                                                        <i class="fas fa-eye"></i> Detail
                                                    </a>

                                                    <a href="{{ route('ap.items.edit', $i->id) }}" class="btn btn-outline-warning mr-2" type="button" style="color: #404040;" onmouseover="this.style.color='white'" onMouseOut="this.style.color='#404040'">
                                                        <i class="fas fa-pencil-alt"></i> Edit
                                                    </a>

                                                    <button type="button" class="btn btn-outline-danger" style="color: #404040;" onmouseover="this.style.color='white'" onMouseOut="this.style.color='#404040'" data-toggle="modal" data-target="#delete_categories_{{ $i->id }}">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>

                                                    <div class="modal fade" id="delete_categories_{{ $i->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <form action="{{ route('ap.items.destroy', $i->id)}}" id="form_delete_post_{{ $i->id }}" method="post">
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
                                                                        Yakin mau hapus kategori "<b>{{ $i->nm_category }}</b>" ?
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
                        {{ $items->onEachSide(5)->appends([
                            'keyword' => request('keyword')])->links() 
                        }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection