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
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            {{-- @foreach ($sellTransactions as $transaction) --}}
                            <a href="{{ route('transaction-detail') }}" {{-- <a
                                href="{{ route('transaction-detail', $transaction->id) }}" --}}
                                class="card card-list d-block">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img src="/images/detail-lure4.jpg" class="w-50" />
                                        </div>
                                        <div class="col-md-4">
                                            Yellow Fish Lure
                                        </div>
                                        <div class="col-md-3">
                                            Delivered
                                        </div>
                                        <div class="col-md-3">
                                            12 Desember, 2021
                                        </div>
                                        <div class="col-md-1 d-none d-md-block">
                                            <img src="/images/setting-arrow-right.svg" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </a>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection