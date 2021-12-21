@extends('layouts.app')

@section('title')
Cart | {{ config('settings.name') }}
@endsection

@section('content')
<!-- Page Content -->
<div class="page-content page-cart">
    <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Cart
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="store-cart">
        <div class="container">
            @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
            @endif
            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-12 table-responsive">
                        <table class="table table-borderless table-cart">
                            <thead>
                                <tr>
                                    <td>Image</td>
                                    <td>Product Name</td>
                                    <td>Qty</td>
                                    <td>Price</td>
                                    <td>Menu</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @php $disc = 0 @endphp
                                @if(session('cart'))
                                @forelse(session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                                <tr>
                                    <td style="width: 25%;">
                                        <input type="number" id="item_id" name="item_id" value="{{ $details['id'] }}" hidden>
                                        <input type="date" id="date" name="date" value="{{date('Y-m-d')}}" hidden>
                                        <input type="number" id="user_id" name="user_id" value="{{Auth::user()->id}}" hidden>
                                        <img src="{{ asset('images/items/'.$details['image']) }}" alt="" class="cart-image" />
                                    </td>
                                    <td style="width: 25%;">
                                        <div class="product-title">
                                            {{ $details['name'] }}
                                        </div>
                                    </td>
                                    <td style="width: 25%;">
                                        <div class="col">
                                            <div class="input-group input-spinner">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-light" type="button" id="button-plus"> <i class="fa fa-minus"></i> </button>
                                                </div>
                                                <input type="text" name="quantity" id="quantity" class="form-control" value="{{ $details['quantity'] }}">
                                                <div class="input-group-append">
                                                    <button class="btn btn-light" type="button" id="button-minus"> <i class="fa fa-plus"></i> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width: 25%;">
                                        <div class="product-title">@currency($details['price'])
                                        </div>
                                    </td>
                                    <td style="width: 20%;">
                                        <a href="#" class="btn btn-remove-cart">
                                            Remove
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                                    Empty Basket
                                </div>
                                @endforelse
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12">
                        <h2 class="mb-4">Shipping Details</h2>
                    </div>
                </div>
                @csrf
                <input type="hidden" name="total_price">
                <div class="row mb-2" data-aos="fade-up" data-aos-delay="200" id="locations">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address }}" readonly />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="regency">Regency</label>
                            <input type="text" class="form-control" id="regency" name="regency" value="{{ Auth::user()->regency }}" readonly />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="province">Province</label>
                            <input type="text" class="form-control" id="province" name="province" value="{{ Auth::user()->province }}" readonly />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="postal_code">Postal Code</label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ Auth::user()->postal_code }}" readonly />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country" name="country" value="{{ Auth::user()->country }}" readonly />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phone_number">Mobile</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ Auth::user()->phone_number }}" readonly />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="shipping_method">Shipping Method</label>
                            <select class="form-control" name="shipping_method" id="shipping_method">
                                <option value="">-- Pilih metode pengiriman --</option>
                                <option value="pick-up">Pick-up</option>
                                <option value="delivery">Delivery</option>
                            </select>
                            @if($errors->has('shipping_method'))
                            <div class="invalid-feedback">{{ $errors->first('shipping_method') }}</div>
                            @endif
                            <input type="text" id="transfers_slip" name="transfers_slip" value="NULL" hidden>
                        </div>
                    </div>
                </div>

                @if(session('cart'))
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12 text-right">
                        <h2 class="mb-1">Payment Informations</h2>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-4 col-md-2">
                        <div class="product-title"></div>
                        <div class="product-subtitle"></div>
                    </div>
                    <div class="col-4 col-md-3">
                        <div class="product-title"></div>
                        <div class="product-subtitle"></div>
                    </div>
                    <div class="col-4 col-md-2">
                        <div class="product-title"></div>
                        <div class="product-subtitle"></div>
                    </div>
                    <div class="col-4 col-md-2">
                        <div class="product-title text-success">
                            <h3>
                                @currency($total)</h3>
                        </div>
                        <input type="number" id="total_price" name="total_price" value="{{ $total }}" hidden>
                        <div class="product-subtitle">
                            <h2>Total Payment</h2>
                        </div>
                    </div>
                    <div class="col-8 col-md-3">
                        <button type="submit" class="btn btn-success mt-4 px-4 btn-block">
                            Checkout Now
                        </button>
                    </div>
                    @endif
            </form>
        </div>
    </section>
</div>
@endsection