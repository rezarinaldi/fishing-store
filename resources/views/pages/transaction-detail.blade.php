@extends('layouts.settings')

@section('title')
Transaction Details | {{ config('settings.name') }}
@endsection

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Transactions Details</h2>
            <p class="dashboard-subtitle">
                Detail transaksi pembelian Anda
            </p>
        </div>
        <div class="dashboard-content" id="transactionDetails">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <img src="/images/detail-lure4.jpg" class="w-100 mb-3" alt="" />
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Customer Name</div>
                                            <div class="product-subtitle">Reza Rinaldi
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Product Name</div>
                                            <div class="product-subtitle">
                                                Yellow Fish Lure
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">
                                                Date of Transaction
                                            </div>
                                            <div class="product-subtitle">
                                                12 Desember, 2021
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Status</div>
                                            <div class="product-subtitle text-danger">
                                                Delivered
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">
                                                Total Amount
                                            </div>
                                            <div class="product-subtitle">
                                                Rp128.000
                                                {{-- Rp{{ number_format($transaction->transaction->total_price) }} --}}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">
                                                Mobile
                                            </div>
                                            <div class="product-subtitle">
                                                085312345678
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="#" method="POST" enctype="multipart/form-data">
                                {{-- <form action="{{ route('dashboard-transaction-update', $transaction->id) }}"
                                    method="POST" enctype="multipart/form-data"> --}}
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 mt-4">
                                            <h5>Shipping Information</h5>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">Address</div>
                                                    <div class="product-subtitle">
                                                        Jl. Wendit Utara, No. 15
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">Regency</div>
                                                    <div class="product-subtitle">
                                                        Kabupaten Malang
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">Province</div>
                                                    <div class="product-subtitle">
                                                        East Java
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">Postal Code</div>
                                                    <div class="product-subtitle">
                                                        65154
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">Country</div>
                                                    <div class="product-subtitle">
                                                        Indonesia
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">Shipping Method</div>
                                                    <div class="product-subtitle">
                                                        Delivery
                                                    </div>
                                                </div>
                                                {{-- <template v-if="status == 'SHIPPING'"> --}}
                                                    <div class="col-md-3">
                                                        <div class="product-title">Transfer Slip</div>
                                                        <input type="file" class="form-control" name="transfer-slip"
                                                            v-model="transfer-slip" />
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="submit" class="btn btn-success btn-block mt-4">
                                                            Upload
                                                        </button>
                                                    </div>
                                                    {{--
                                                </template> --}}
                                                <div class="col-12 col-md-3">
                                                    <img src="/images/transfer-slip.jpg" class="w-100 mb-3" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success btn-lg">
                                                Save Now
                                            </button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection