@extends('layouts.admin')

@section('title')
Admin | Detail Pesanan {{ config('settings.name') }}
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
                            <li class="breadcrumb-item active">Detail Pesanan</li>
                        </ol>
                    </div>
                </div>
        </section>
        <section class="content">
            <div class="card card-solid">
                <div class="card-header bg-primary">
                    <div class="row">
                        <div class="col-10">
                            <h3 class="card-title text-white">
                                Pesanan:
                                {{ $order->user['name'] }} |
                                @if($order->status == 'unpaid')
                                <span class="badge badge-outline-light badge-pill p-3">Belum
                                    Dibayar</span>
                                @elseif($order->status == 'process')
                                <span class="badge badge-outline-info badge-pill p-3">Proses</span>
                                @elseif($order->status == 'delivered')
                                <span class="badge badge-outline-primary badge-pill p-3">Mengirim</span>
                                @elseif($order->status == 'success')
                                <span class="badge badge-outline-success badge-pill p-3">Sukses</span>
                                @elseif($order->status == 'cancel')
                                <span class="badge badge-outline-danger badge-pill p-3">Batal</span>
                                @endif
                            </h3>
                        </div>
                        <div class="col-2">
                            <a href="{{ route('ap.orders.edit', $order->id) }}"
                                class="btn btn-outline-light btn-sm float-right" type="button" style="color: #fff;"
                                onmouseover="this.style.color='#404040'" onMouseOut="this.style.color='#fff'">
                                <i class="fas fa-pencil-alt"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row card-info">
                        <div class="col-12 col-sm-6">
                            <h5 class="my-3 text-bold">Nama Pemesan: </h5>
                            <p>{{ $order->user['name'] }}</p>
                            <hr>
                            <h5 class="my-3 text-bold">No telepon</h5>
                            <p>{{ $order->user['phone_number'] }}</p>
                            <hr>
                            <h5 class="my-3 text-bold">Alamat Pembeli</h5>
                            <p>{{ $order->user['address'] }}</p>
                            <hr>
                            <h5 class="my-3 text-bold">Kode Pos</h5>
                            <p>{{ $order->user['postal_code'] }}</p>
                            <hr>
                            <h5 class="my-3 text-bold">Barang yang dipesan</h5>
                            <ol>
                                @foreach($order->details as $detail)
                                <li>{{ $detail->item->nm_items }}</li>
                                @endforeach
                            </ol>
                            <hr>
                        </div>
                        <div class="col-12 col-sm-6">
                            @foreach($order->details as $detail)
                            <h5 class="text text-bold">Produk yang dibeli</h5>
                            <p>{{ $detail->item->nm_items }}</p>
                            <img src="{{ asset('images/items/'.$detail->item->pictures[0]->value) }}"
                                class="img-fluid rounded mx-auto d-block" width="30%" height="30%">
                            <hr>
                            <h5 class="text text-bold">Harga</h5>
                            <p>
                                @php $total = 0 @endphp
                                @if($detail->item->discount > 0)
                                @php $total += $detail->item->price - ($detail->item->price * $detail->item->discount /
                                100) @endphp
                                @else($detail->item->discount = 0)
                                @php $total += $detail->item->price @endphp
                                @endif
                                @currency($total)
                            </p>
                            <hr>
                            <p name="diskon" id="diskon">Jumlah : {{ $detail->quantity }}
                            </p>
                            <hr><br><br><br>
                            @endforeach
                            <div class="bg-gray ">
                                <h2 class="mb-0" name="jumlah">
                                    @currency($detail->total_price)
                                </h2>
                            </div>
                            <hr>
                        </div>
                    </div><br><br>
                    <a href="{{ route('ap.orders.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <br>
                    <!-- /.row -->
                </div>
            </div>
        </section>
    </div>
</div>
@endsection