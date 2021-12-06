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
                            {{-- @php $totalPrice = 0 @endphp
                            @forelse ($carts as $cart) --}}
                            <tr>
                                <td style="width: 25%;">
                                    {{-- @if($cart->product->galleries) --}}
                                    <img src="/images/detail-lure4.jpg" alt="" class="cart-image" />
                                    {{-- @endif --}}
                                </td>
                                <td style="width: 25%;">
                                    <div class="product-title">Yellow Fish Lure</div>
                                </td>
                                <td style="width: 25%;">
                                    <div class="col">
                                        <div class="input-group input-spinner">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-light" type="button" id="button-plus"> <i
                                                        class="fa fa-minus"></i> </button>
                                            </div>
                                            <input type="text" class="form-control" value="1">
                                            <div class="input-group-append">
                                                <button class="btn btn-light" type="button" id="button-minus"> <i
                                                        class="fa fa-plus"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div class="product-title">Rp110.000</div>
                                </td>
                                <td style="width: 20%;">
                                    <form action="#" method="POST">
                                        {{-- <form action="{{ route('cart-delete', $cart->products_id) }}"
                                            method="POST"> --}}
                                            {{-- @method('DELETE')
                                            @csrf --}}
                                            <button class="btn btn-remove-cart" type="submit">
                                                Remove
                                            </button>
                                        </form>
                                </td>
                            </tr>
                            {{-- @php $totalPrice += $cart->product->price @endphp --}}
                            {{-- @empty
                            <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                                Empty Basket
                            </div> --}}
                            {{-- @endforelse --}}
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
            <form action="#" method="POST" enctype="multipart/form-data">
                {{-- <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data"> --}}
                    @csrf
                    <input type="hidden" name="total_price">
                    {{-- <input type="hidden" name="total_price" value="{{ $totalPrice }}"> --}}
                    <div class="row mb-2" data-aos="fade-up" data-aos-delay="200" id="locations">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="Jl. Wendit Utara, No. 15" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="regency">Regency</label>
                                <input type="text" class="form-control" id="regency" name="regency"
                                    value="Kabupaten Malang" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="province">Province</label>
                                <input type="text" class="form-control" id="province" name="province" value="Jawa Timur"
                                    readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="postal_code">Postal Code</label>
                                <input type="text" class="form-control" id="postal_code" name="postal_code"
                                    value="65154" readonly />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country" value="Indonesia"
                                    readonly />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone_number">Mobile</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    value="085312345678" readonly />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="shipping_method">Shipping Method</label>
                                <select class="form-control" name="shipping_method" id="shipping_method">
                                    <option value="pick-up">Pick-up</option>
                                    <option value="delivery">Delivery</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="150">
                        <div class="col-12">
                            <hr />
                        </div>
                        <div class="col-12">
                            <h2 class="mb-1">Payment Informations</h2>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-4 col-md-2">
                            <div class="product-title text-warning">15%</div>
                            <div class="product-subtitle">Discount</div>
                        </div>
                        <div class="col-4 col-md-2">
                            <div class="product-title text-success">Rp110.000</div>
                            <div class="product-subtitle">Total</div>
                        </div>
                        <div class="col-6 col-md-3">
                            <button type="submit" class="btn btn-success mt-4 px-4 btn-block">
                                Checkout Now
                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </section>
</div>
@endsection