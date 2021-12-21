@extends('layouts.settings')

@section('title')
Transactions | {{ config('settings.name') }}
@endsection

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Transactions</h2>
            <p class="dashboard-subtitle">
                Riwayat pembelian alat-alat pancing Anda
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12 mt-2">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <h3 class="dashboard-title">History buy products 🛒</h3>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            @foreach ($sellTransactions as $transaction)
                            @if($transaction->user_id == Auth::user()->id)
                            <a href="{{ route('transaction-detail', $transaction->id) }}" class="card card-list d-block">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- <div class="col-md-1">
                                            <img src="{{-- asset('images/items/'.$transaction->details->item->pictures[0]->value) --}}" class="w-50" />
                                        </div> -->
                                        <div class="col-md-3">
                                            {{Auth::user()->name}}
                                        </div>
                                        <div class="col-md-3">
                                            {{$transaction->shipping_method}}
                                        </div>
                                        <div class="col-md-2">
                                            @if($transaction->status == 'unpaid')
                                            <span class="badge badge-warning badge-pill p-3">Belum
                                                Dibayar</span>
                                            @elseif($transaction->status == 'process')
                                            <span class="badge badge-info badge-pill p-3">Proses</span>
                                            @elseif($transaction->status == 'delivered')
                                            <span class="badge badge-primary badge-pill p-3">Mengirim</span>
                                            @elseif($transaction->status == 'success')
                                            <span class="badge badge-success badge-pill p-3">Sukses</span>
                                            @elseif($transaction->status == 'cancel')
                                            <span class="badge badge-danger badge-pill p-3">Batal</span>
                                            @endif
                                        </div>
                                        <div class="col-md-3">
                                            {{$transaction->created_at->format('d-m-Y') }}
                                        </div>
                                        <div class="col-md-1 d-none d-md-block">
                                            <img src="/images/setting-arrow-right.svg" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection