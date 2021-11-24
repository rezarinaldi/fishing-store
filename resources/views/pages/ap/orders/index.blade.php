@extends('layouts.admin')

@section('title')
Admin | Pesanan DK Pancing
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
                        <h2><i class="nav-icon fas fa-shopping-basket"></i> Pesanan</h2>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pesanan</li>
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
                        <!-- <p class="card-description">
                            <a href="{{-- route('ap.orders.create') --}}"><button type="button" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Tambah Data Baru</button></a>
                        </p> -->
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
                                            <a href="{{ route('ap.orders.index') }}" class="mr-1 mt-2">
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
                                            <th>Nama Pemesan</th>
                                            <th>Tanggal</th>
                                            <th>Status Pembayaran</th>
                                            <th>Status Pesanan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach($orders as $key => $o)
                                    <tbody>
                                        <tr>
                                            <td>{{ ($orders->currentPage()-1) * $orders->perpage() + $key + 1 }}</td>
                                            <td>{{ $o->user['name'] }}</td>
                                            <td>{{ $o->date }}</td>
                                            <td>
                                                @if($o->payment_status == 'unpaid')
                                                <span class="badge badge-outline-danger p-3">Belum Bayar</span>
                                                @elseif($o->status == 'paid')
                                                <span class="badge badge-outline-success p-3">SUdah Bayar</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($o->status == 'new')
                                                <span class="badge badge-outline-primary badge-pill p-3">New</span>
                                                @elseif($o->status == 'process')
                                                <span class="badge badge-info badge-outline-pill p-3">Proses</span>
                                                @elseif($o->status == 'delivered')
                                                <span class="badge badge-outline-success badge-pill p-3">Mengirim</span>
                                                @elseif($o->status == 'cancel')
                                                <span class="badge badge-outline-danger badge-pill p-3">Batal</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex centered">
                                                    <a href="{{ route('ap.orders.show', $o->id) }}" class="btn btn-outline-info mr-2" type="button" style="color: #404040;" onmouseover="this.style.color='white'" onMouseOut="this.style.color='#404040'">
                                                        <i class="fas fa-eye"></i> Detail
                                                    </a>

                                                    <a href="{{ route('ap.orders.edit', $o->id) }}" class="btn btn-outline-warning mr-2" type="button" style="color: #404040;" onmouseover="this.style.color='white'" onMouseOut="this.style.color='#404040'">
                                                        <i class="fas fa-pencil-alt"></i> Edit
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        {{ $orders->onEachSide(5)->appends([
                            'keyword' => request('keyword')])->links() 
                        }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection