@extends('layouts.app')

@section('title')
Detail Products | DK Pancing
@endsection

@section('content')
<div class="page-content page-details">
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
                                Product Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="store-gallery mb-3" id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" data-aos="zoom-in">
                    <transition name="slide-fade" mode="out-in">
                        <img :src="photos[activePhoto].url" :key="photos[activePhoto].id" class="w-100 main-image"
                            alt="" />
                    </transition>
                </div>
                <div class="col-lg-2">
                    <div class="row">
                        <div class="col-3 col-lg-12 mt-2 mt-lg-0" v-for="(photo, index) in photos" :key="photo.id"
                            data-aos="zoom-in" data-aos-delay="100">
                            <a href="#" @click="changeActive(index)">
                                <img :src="photo.url" class="w-100 thumbnail-image"
                                    :class="{ active: index == activePhoto }" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="store-details-container" data-aos="fade-up">
        <section class="store-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h1>Yellow Fish Lure</h1>
                        <div class="price">Rp22.500</div>
                    </div>
                    <div class="col-lg-2" data-aos="zoom-in">
                        @auth
                        {{-- <form action="{{ route('detail-add', $product->id) }}" method="POST"
                            enctype="multipart/form-data"> --}}
                            @csrf
                            <button type="submit" class="btn btn-success px-4 text-white btn-block mb-3">
                                <i class="fas fa-shopping-cart"></i> Add Cart
                            </button>
                            {{--
                        </form> --}}
                        @else
                        <a href="{{ route('login') }}" class="btn btn-success px-4 text-white btn-block mb-3">
                            Sign in to Add
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
        </section>
        <section class="store-description">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis, accusantium ratione magnam ut
                        modi distinctio id nobis error alias atque doloremque,
                        est non mollitia dolores pariatur voluptatem dolor beatae eligendi?
                    </div>
                </div>
            </div>
        </section>
        <section class="store-review">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 mt-3 mb-3">
                        <h5>Customer Review (3)</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <ul class="list-unstyled">
                            <li class="media">
                                <img src="/images/user.png" alt="" class="mr-3 rounded-circle" />
                                <div class="media-body">
                                    <h5 class="mt-2 mb-1">Rein</h5>
                                    I thought it was not good for fishing. I really happy
                                    to decided buy this product last week now feels like
                                    homey.
                                </div>
                            </li>
                            <li class="media">
                                <img src="/images/user.png" alt="" class="mr-3 rounded-circle" />
                                <div class="media-body">
                                    <h5 class="mt-2 mb-1">April</h5>
                                    Color is great with the minimalist concept. I do really satisfied with
                                    this.
                                </div>
                            </li>
                            <li class="media">
                                <img src="/images/user.png" alt="" class="mr-3 rounded-circle" />
                                <div class="media-body">
                                    <h5 class="mt-2 mb-1">Shiny</h5>
                                    When I saw at first, it was really awesome to have with.
                                    Just let me know if there is another upcoming product like
                                    this.
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script>
    var gallery = new Vue({
          el: "#gallery",
          mounted() {
            AOS.init();
          },
          data: {
            activePhoto: 3,
            photos: [
              {
                id: 1,
                url: "/images/detail-lure1.jpg",
              },
              {
                id: 2,
                url: "/images/detail-lure2.jpg",
              },
              {
                id: 3,
                url: "/images/detail-lure3.jpg",
              },
              {
                id: 4,
                url: "/images/detail-lure4.jpg",
              },
            ],
          },
          methods: {
            changeActive(id) {
              this.activePhoto = id;
            },
          },
        });
</script>
@endpush