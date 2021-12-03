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
                        <form class="forms-sample" action="{{ route('ap.orders.update',$order->id) }}" method="post" enctype="multipart/form-data">
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
                                <select class="form-control js-example-basic-single w-100" aria-label="Default select example" id="user_id" name="user_id" value="{{ $order->user['id'] }}">
                                    @foreach($user as $u)
                                    @if($u->id == $order->user['id'])
                                    <option class="text text-black" value={{ $u->id }} selected>{{ $u->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="item_id">Nama Produk</label>
                                <select class="form-control form-select-lg mb-3" aria-label="Default select example" id="item_id" name="item_id" value="{{ $order->item['nm_items'] }}">
                                    @foreach($item as $i)
                                    @if($i->id == $order->item['id'])
                                    <option value={{ $i->id }} selected>{{ $i->nm_items}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="date">Tanggal Pesan</label>
                                <input type="text" class="form-control @if($errors->has('date')) is-invalid @endif" id="date" name="date" value="{{ $order->date }}" readonly>
                                @if($errors->has('date'))
                                <div class="invalid-feedback">{{ $errors->first('date') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="quantity">Jumlah Pesanan</label>
                                <input type="number" class="form-control @if($errors->has('quantity')) is-invalid @endif" id="quantity" name="quantity" value="{{ $order->quantity }}" readonly>
                                @if($errors->has('quantity'))
                                <div class="invalid-feedback">{{ $errors->first('quantity') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="total_price">Total Harga</label>
                                <input type="number" class="form-control @if($errors->has('total_price')) is-invalid @endif" id="total_price" name="total_price" value="{{ $order->total_price }}" readonly>
                                @if($errors->has('total_price'))
                                <div class="invalid-feedback">{{ $errors->first('total_price') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="payment_method">Metode Pembayaran</label>
                                <select class="form-control form-select-lg mb-3" aria-label="Default select example" id="payment_method" name="payment_method" value="{{ $order->payment_method }}">
                                @foreach(["pick up" => "Diambil", "sending" => "Mengirim"] AS $payment_method => $pm)
                                <option value="{{ $payment_method }}" {{ old("payment_method", $order->payment_method) == $payment_method ? "selected" : "" }}>{{ $pm }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="payment_status">Status Pembayaran</label>
                                <select class="form-control form-select-lg mb-3" aria-label="Default select example" id="payment_status" name="payment_status" value="{{ $order->payment_status }}">
                                @foreach(["paid" => "Sudah dibayar", "unpaid" => "Belum dibayar"] AS $payment_status => $ps)
                                <option value="{{ $payment_status }}" {{ old("payment_status", $order->payment_status) == $payment_status ? "selected" : "" }}>{{ $ps }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="transfers_slip">Bukti Pembayaran</label>
                                <input type="text" class="form-control" id="transfers_slip" name="transfers_slip" value="{{ $order->transfers_slip }}" readonly>
                                
                            </div>
                            <div class="form-group">
                                <label for="status">Status Pembayaran</label>
                                <select class="form-control form-select-lg mb-3" aria-label="Default select example" id="status" name="status" value="{{ $order->status }}">
                                @foreach(["new" => "Baru", "process" => "Proses Pengemasan", "delivered" => "Proses Kirim", "cancel" => "Batal"] AS $status => $s)
                                <option value="{{ $status }}" {{ old("status", $order->status) == $status ? "selected" : "" }}>{{ $s }}</option>
                                    @endforeach
                                </select>
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