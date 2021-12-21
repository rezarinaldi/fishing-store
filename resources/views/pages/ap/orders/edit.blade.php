@extends('layouts.admin')

@section('title')
Admin | Ubah Pesanan {{ config('settings.name') }}
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
                            <li class="breadcrumb-item"><a href="{{ route('ap.orders.index') }}">Pesanan</a></li>
                            <li class="breadcrumb-item active">Ubah Pesanan</li>
                        </ol>
                    </div>
                </div>
        </section>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body text text-black">
                        <h4 class="card-title">Ubah Pesanan</h4>
                        <form class="forms-sample" action="{{ route('ap.orders.update',$order->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @if(session()->get('success'))
                            <div class="alert alert-success">
                                <span class="text text-sm">{{ session()->get('success') }}</span>
                            </div>
                            @endif
                            @if(session()->get('failed'))
                            <div class="alert alert-warning">
                                <span class="text text-sm">{{ session()->get('failed') }}</span>
                            </div>
                            @endif
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id" name="id" placeholder="id" hidden>
                            </div>
                            <div class="form-group">
                                <label for="user_id">Nama Pemesan</label>
                                <select class="form-control js-example-basic-single w-100"
                                    aria-label="Default select example" id="user_id" name="user_id"
                                    value="{{ $order->user['id'] }}">
                                    @foreach($user as $u)
                                    @if($u->id == $order->user['id'])
                                    <option class="text text-black" value={{ $u->id }} selected>{{ $u->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="item_id">Produk yang dibeli</label>
                                <ol>
                                    @foreach($order->details as $detail)
                                    <li>{{ $detail->item->nm_items }}</li>
                                    @endforeach
                                </ol>
                            </div>
                            <div class="form-group">
                                <label for="date">Tanggal Pesan</label>
                                <input type="text" class="form-control @if($errors->has('date')) is-invalid @endif"
                                    id="date" name="date" value="{{ $order->created_at }}" readonly>
                                @if($errors->has('date'))
                                <div class="invalid-feedback">{{ $errors->first('date') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="payment_method">Metode Pengiriman</label>
                                <select class="form-control form-select-lg mb-3" aria-label="Default select example"
                                    id="shipping_method" name="shipping_method" value="{{ $order->shipping_method }}">
                                    @foreach(["pick-up" => "Diambil", "delivery" => "Dikirim"] AS $shipping_method =>
                                    $pm)
                                    <option value="{{ $shipping_method }}" {{ old("shipping_method", $order->
                                        shipping_method) == $shipping_method ? "selected" : "" }}>{{ $pm }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status Pembayaran</label>
                                <select class="form-control form-select-lg mb-3" aria-label="Default select example"
                                    id="status" name="status" value="{{ $order->status }}">
                                    @foreach(["unpaid" => "Belum dibayar", "process" => "Proses Pengemasan", "delivered" => "Proses Pengiriman", "success" => "Sudah Sampai", "cancel" => "Batal"] AS $status
                                    => $ps)
                                    <option value="{{ $status }}" {{ old("status", $order->
                                        status) == $status ? "selected" : "" }}>{{ $ps }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="transfers_slip">Bukti Pembayaran</label>
                                <input type="text" class="form-control" id="transfers_slip" name="transfers_slip"
                                    value="{{ $order->transfers_slip }}" readonly>

                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{ route('ap.orders.index') }}" class="btn btn-light">
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