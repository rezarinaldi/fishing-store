@extends('layouts.app')

@section('title')
Home | DK Pancing
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
                            <h1 class="display-5 font-weight-bold lh-1 mb-3">Toko alat pancing terlengkap, semua yang
                                anda
                                butuhkan ada disini</h1>
                            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec sagittis
                                dolor. Maecenas quam nunc, tincidunt quis facilisis ut, faucibus eget lacus</p>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                <button type="button" class="btn btn-success nav-link px-4 text-white"><i
                                        class="fas fa-shopping-cart"></i> Buy Now</button>
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
                    </figure> <!-- iconbox // -->
                </div><!-- col // -->
                <div class="col-md-3">
                    <figure class="item-feature">
                        <span><i class="fa fa-2x fa-clock"></i></span>
                        <figcaption class="pt-3">
                            <h5 class="title">24 Hour Online</h5>
                            </p>
                        </figcaption>
                    </figure> <!-- iconbox // -->
                </div><!-- col // -->
                <div class="col-md-3">
                    <figure class="item-feature">
                        <span><i class="fa fa-2x fa-hand-holding-usd"></i></span>
                        <figcaption class="pt-3">
                            <h5 class="title">Money Return</h5>
                        </figcaption>
                    </figure> <!-- iconbox // -->
                </div> <!-- col // -->
                <div class="col-md-3">
                    <figure class="item-feature">
                        <span><i class="fa fa-2x fa-percent"></i></span>
                        <figcaption class="pt-3">
                            <h5 class="title">Order Discount</h5>
                        </figcaption>
                    </figure> <!-- iconbox // -->
                </div> <!-- col // -->
            </div>
        </article>
    </div> <!-- container .//  -->
</section>

<section class="store-trend-categories">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12" data-aos="fade-up">
                <h5>Our Categories</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="100">
                <a class="component-categories d-block" href="#">
                    <div class="categories-image">
                        <img src="/images/favicon.png" alt="Jaron Categories" class="w-100" />
                    </div>
                    <p class="categories-text">
                        Jaron
                    </p>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="200">
                <a class="component-categories d-block" href="#">
                    <div class="categories-image">
                        <img src="/images/favicon.png" alt="Reel Categories" class="w-100" />
                    </div>
                    <p class="categories-text">
                        Reel
                    </p>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="300">
                <a class="component-categories d-block" href="#">
                    <div class="categories-image">
                        <img src="/images/favicon.png" alt="Lure Categories" class="w-100" />
                    </div>
                    <p class="categories-text">
                        Lure
                    </p>
                </a>
            </div>
            {{-- @php $incrementCategory = 0 @endphp
            @forelse ($categories as $category)
            <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $incrementCategory+= 100 }}">
                <a href="{{ route('categories-detail', $category->slug) }}" class="component-categories d-block">
                    <div class="categories-image">
                        <img src="{{  Storage::url($category->photo) }}" alt="" class="w-100" />
                    </div>
                    <p class="categories-text">
                        {{ $category->name }}
                    </p>
                </a>
            </div> --}}
            {{-- @empty
            <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                No Categories Found
            </div>
            @endforelse --}}
        </div>
    </div>
</section>

<section class="store-new-products">
    <div class="container">
        <div class="row">
            <div class="col-12" data-aos="fade-up">
                <h5>New Products</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <a class="component-products d-block" href="/details.html">
                    <div class="products-thumbnail">
                        <div class="products-image" style="
                      background-image: url('/images/product-joran1.jpg');
                    "></div>
                    </div>
                    <div class="products-text">
                        Joran Pancing Black
                    </div>
                    <div class="products-price">
                        Rp149.300
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <a class="component-products d-block" href="/details.html">
                    <div class="products-thumbnail">
                        <div class="products-image" style="
                      background-image: url('/images/product-lure1.jpg');
                    "></div>
                    </div>
                    <div class="products-text">
                        Lure Minow Lure Trible
                    </div>
                    <div class="products-price">
                        Rp22.500
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <a class="component-products d-block" href="/details.html">
                    <div class="products-thumbnail">
                        <div class="products-image" style="
                      background-image: url('/images/product-reel1.jpg');
                    "></div>
                    </div>
                    <div class="products-text">
                        Yumoshi 3000 Series Reel
                    </div>
                    <div class="products-price">
                        Rp50.300
                    </div>
                </a>
            </div>
            {{-- @php $incrementProduct = 0 @endphp
            @forelse ($products as $product)
            <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{  $incrementProduct += 100 }}">
                <a href="{{ route('detail', $product->slug) }}" class="component-products d-block">
                    <div class="products-thumbnail">
                        <div class="products-image" style="
                                        @if($product->galleries)
                                            background-image: url('{{ Storage::url($product->galleries->first()->photos) }}');
                                        @else
                                            background-color: #eee;
                                        @endif
                                    "></div>
                    </div>
                    <div class="products-text">
                        {{ $product->name }}
                    </div>
                    <div class="products-price">
                        ${{ $product->price }}
                    </div>
                </a>
            </div> --}}
            {{-- @empty
            <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                No Products Found
            </div>
            @endforelse --}}
        </div>
    </div>
</section>
</div>
@endsection