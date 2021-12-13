@extends('layouts.app')

@section('title')
Detail Products | {{ config('settings.name') }}
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

    <section class="store-gallery mb-3" id="picture">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" data-aos="zoom-in">
                    @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div><br />
                    @endif
                    <transition name="slide-fade fade show active" mode="out-in">
                        <img src="{{ asset('images/items/'.$item->pictures[0]->value) }}" class="w-100 main-image"
                            alt="" />
                    </transition>
                </div>
                <div class="col-lg-2">
                    <div class="row">
                        @foreach($item->pictures as $picture)
                        <div class="col-3 col-lg-12 mt-2 mt-lg-0 tab-pane fade {{ $loop->first ? 'active' : '' }}"
                            data-aos="zoom-in" data-aos-delay="100">
                            <a href="#">
                                <img src="{{ asset('images/items/'.$picture->value) }}" class="w-100 thumbnail-image"
                                    :class="{ active: index == activePhoto }" alt="" />
                            </a>
                        </div>
                        @endforeach
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
                        <h1>{{ $item->nm_items }}</h1>
                        <div class="price">
                            @php $total = 0 @endphp
                            @if($item->discount > 0)
                            @php $total += $item['price'] - (($item['price'] * $item['discount']) / 100) @endphp
                            <s>@currency($item->price)</s>
                            @else($item->discount = 0)
                            @php $total += $item['price'] @endphp
                            @endif
                            <p><b>@currency($total)</p></b>
                        </div>
                    </div>
                    <div class="col-lg-2" data-aos="zoom-in">
                        @auth
                        @csrf
                        <a class="btn btn-success px-4 text-white btn-block mb-3"
                            href="{{url('add-to-cart/'.$item->id)}}">
                            <i class="fas fa-shopping-cart"></i> Add Cart
                        </a>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-success px-4 text-white btn-block mb-3">
                            Log In to Add
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
                        {!! html_entity_decode($item->description) !!}
                    </div>
                </div>
            </div>
        </section>
        <section class="store-review">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 mt-3 mb-3">
                        <h4>Customers Review</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        @forelse ($review as $rv)
                        <ul class="list-unstyled">
                            <li class="media">
                                <img src="/images/user.png" alt="" class="mr-3 rounded-circle" />
                                <div class="media-body">
                                    <h4 class="mt-2">{{$rv->user['name']}}</h4>
                                    <h5 class="mb-2">{{ $rv->created_at }}</h5>
                                    {!! html_entity_decode($rv->comment) !!}
                                </div>
                            </li>
                        </ul>
                        @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                            Empty Review
                        </div>
                        @endforelse
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
    var picture = new Vue({
        el: "#picture",
        mounted() {
            AOS.init();
        },
        data: {
            activePhoto: 3,
            photos: [
                @foreach ($item->pictures as $picture)
            {
              id: {{ $picture->id }},
              url: "{{ asset('images/items/'.$picture->value) }}",
            },
            @endforeach
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