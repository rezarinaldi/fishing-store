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
                            @if(session()->get('success'))
                            <div class="alert alert-success">
                                <span class="text text-sm">{{ session()->get('success') }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <img src="{{ asset('images/'.config('settings.favicon')) }}" class="w-100 mb-3" alt="" />
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Customer Name</div>
                                            <div class="product-subtitle">{{Auth::user()->name}}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Product Name</div>
                                            <div class="product-subtitle">
                                                @foreach($transaction->details as $detail)
                                                <li>{{ $detail->item->nm_items }}</li>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">
                                                Date of Transaction
                                            </div>
                                            <div class="product-subtitle">
                                                {{ $transaction->created_at->toDateString() }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Status</div>
                                            <div class="product-subtitle">
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
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">
                                                Total Amount
                                            </div>
                                            <div class="product-subtitle">
                                                @foreach($transaction->details as $detail)
                                                @currency($detail->total_price)
                                                @endforeach

                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">
                                                Mobile
                                            </div>
                                            <div class="product-subtitle">
                                                0{{Auth::user()->phone_number}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <form action="{{ route('dashboard-transaction-update', $transaction->id) }}"
                                method="POST" enctype="multipart/form-data">
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
                                                    {{Auth::user()->address}}
                                                    <input type="number" id="user_id" name="user_id" value="{{Auth::user()->id}}" hidden>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="product-title">Regency</div>
                                                <div class="product-subtitle">
                                                    {{Auth::user()->regency}}
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="product-title">Province</div>
                                                <div class="product-subtitle">
                                                    {{Auth::user()->province}}
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="product-title">Postal Code</div>
                                                <div class="product-subtitle">
                                                    {{Auth::user()->postal_code}}
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="product-title">Country</div>
                                                <div class="product-subtitle">
                                                    {{Auth::user()->country}}
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="product-title">Shipping Method</div>
                                                <div class="product-subtitle">
                                                    {{ $transaction->shipping_method }}
                                                </div>
                                                <input type="text" class="form-control" name="shipping_method" id="transfer_slip" value="{{ $transaction->shipping_method }}" hidden />
                                            </div>
                                            {{-- <template v-if="status == 'SHIPPING'"> --}}
                                            <div class="col-md-3">
                                                <div class="product-title">Transfer Slip</div>
                                                <input type="file" class="form-control" name="transfer_slip" v-model="transfer_slip" />
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