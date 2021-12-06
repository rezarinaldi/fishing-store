@extends('layouts.app')

@section('title')
Categories | {{ config('settings.name') }}
@endsection

@section('content')
<!-- Page Content -->
<div class="page-content page-home">
    <section class="store-trend-categories">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>All Categories</h5>
                </div>
            </div>
            <div class="row">
                @php $incrementCategory = 0 @endphp
                @forelse ($categories as $category)
                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $incrementCategory+= 100 }}">
                    <a href="{{-- route('categories-detail', $category->slug) --}}"
                        class="component-categories d-block">
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

    <section class="store-new-products">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>All Products</h5>
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
                        <div class="products-price text text-center">
                            @php $total = 0 @endphp
                            @if($product->discount > 0)
                            @php $total += $product['price'] - $product['discount'] @endphp
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