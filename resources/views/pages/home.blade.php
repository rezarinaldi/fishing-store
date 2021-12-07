@extends('layouts.app')

@section('title')
Home | {{ config('settings.name') }}
@endsection

@section('content')
<div class="page-content page-home">
    <section class="store-carousel">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 px-4 py-5" data-aos="zoom-in">
                    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                        <div class="col-10 col-sm-8 col-lg-6">
                            <img src="/images/banner.jpg" class="d-block mx-lg-auto img-fluid rounded" alt="banner"
                                width="700" height="500" loading="lazy">
                        </div>
                        <div class="col-lg-6">
                            <h1 class="display-5 font-weight-bold mb-3">{{ config('settings.name') }}, toko alat
                                pancing terlengkap, semua yang dibutuhkan ada disini</h1>
                            <p class="lead">{{ config('settings.description') }}</p>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                <a href="#buy-now" class="btn btn-success nav-link px-4 text-white"><i
                                        class="fas fa-shopping-cart"></i> Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="section-content padding-y-sm" data-aos="fade-up">
    <div class="container">
        <article class="card card-body">
            <div class="row">
                <div class="col-md-3">
                    <figure class="item-feature">
                        <span><i class="fa fa-2x fa-truck"></i></span>
                        <figcaption class="pt-3">
                            <h5 class="title">Free Shipping</h5>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-3">
                    <figure class="item-feature">
                        <span><i class="fa fa-2x fa-clock"></i></span>
                        <figcaption class="pt-3">
                            <h5 class="title">24 Hour Online</h5>
                            </p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-3">
                    <figure class="item-feature">
                        <span><i class="fa fa-2x fa-hand-holding-usd"></i></span>
                        <figcaption class="pt-3">
                            <h5 class="title">Money Return</h5>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-3">
                    <figure class="item-feature">
                        <span><i class="fa fa-2x fa-percent"></i></span>
                        <figcaption class="pt-3">
                            <h5 class="title">Order Discount</h5>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </article>
    </div>
</section>

<section class="store-trend-categories">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12" data-aos="fade-up">
                <h5>Our Categories</h5>
            </div>
        </div>
        <div class="row">
            @php $incrementCategory = 0 @endphp
            @forelse ($categories as $category)
            <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $incrementCategory+= 100 }}">
                <a href="{{-- route('categories-detail', $category->slug) --}}" class="component-categories d-block">
                    <p class="categories-text">
                        {{ $category->nm_category }}
                    </p>
                </a>
            </div>
            @empty
            <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                No Categories Found
            </div>
            @endforelse
        </div>
    </div>
</section>

<section class="store-new-products" id="buy-now">
    <div class="container">
        <div class="row">
            <div class="col-12" data-aos="fade-up">
                <h5>New Products</h5>
            </div>
        </div>
        <div class="row">
            @php $incrementProduct = 0 @endphp
            @forelse ($items as $product)
            <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up"
                data-aos-delay="{{--  $incrementProduct += 100 --}}">
                <a href="/detail/{{ $product->slug }}" class="component-products d-block">
                    <div class="products-thumbnail">
                        <div class="products-image" style="
                                        /* @if($product->galleries)
                                            background-image: url('{{-- Storage::url($product->galleries->first()->photos) --}}');
                                        @else
                                            background-color: #eee;
                                        @endif */
                                        background-image: url('{{ isset($product->pictures[0]) ? asset('images/items/'.$product->pictures[0]->value) : '' }}');
                                    "></div>
                    </div>
                    <div class="products-text text-center">
                        {{ $product->nm_items }}
                    </div>
                    <div class="products-price text-center">
                        @php $total = 0 @endphp
                        @if($product->discount > 0)
                        @php $total += $product['price'] - (($product['price'] * $product['discount']) / 100) @endphp
                        @else($product->discount = 0)
                        @php $total += $product['price'] @endphp
                        @endif
                        <p><b>@currency($total)</p></b>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                No Products Found
            </div>
            @endforelse
        </div>
    </div>
</section>
</div>
@endsection