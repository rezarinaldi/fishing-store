@extends('layouts.admin')

@section('title')
Admin | Pesan {{ config('settings.name') }}
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
                        <h2><i class="nav-icon fas fa-inbox"></i> Kotak Pesan</h2>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Kotak Pesan</li>
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
            <div class="col-lg-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
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
                                            <input name="keyword" id="keyword" class="form-control mr-1 mt-2" placeholder="Cari berdasarkan nama pengirim atau email pengirim" value="{{ request('keyword') }}">
                                            <a href="{{ route('ap.contacts.index') }}" class="mr-1 mt-2">
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
                                            <th>Nama Pengirim</th>
                                            <th>E-Mail Pengirim</th>
                                            <th>Pesan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach($contacts as $key => $c)
                                    <tbody>
                                        <tr>
                                            <td>{{ ($contacts->currentPage()-1) * $contacts->perpage() + $key + 1 }}</td>
                                            <td>{{ $c->name }}</td>
                                            <td>{{ $c->email }} </td>
                                            <td>{{ Str::limit($c->message, 50) }} </td>
                                            <td>
                                                <div class="d-flex centered">
                                                    <a href="{{ route('ap.contacts.show', $c->id) }}" class="btn btn-outline-info mr-2" type="button" style="color: #404040;" onmouseover="this.style.color='white'" onMouseOut="this.style.color='#404040'">
                                                        <i class="fas fa-eye"></i> Lihat
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        {{ $contacts->onEachSide(5)->appends([
                            'keyword' => request('keyword')])->links() 
                        }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection