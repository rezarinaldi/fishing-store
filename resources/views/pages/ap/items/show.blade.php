@extends('layouts.admin')

@section('title')
Admin | Item DK Pancing
@endsection

@section('sidebar')
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2><i class="nav-icon fab fa-product-hunt"></i> Produk</h2>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('ap.items.index') }}">Produk</a></li>
                            <li class="breadcrumb-item active">Detail Produk</li>
                        </ol>
                    </div>
                </div>
        </section>
        <section class="content">
            <div class="card card-solid">
                <div class="card-header bg-primary">
                    <div class="row">
                        <div class="col-10">
                            <h3 class="card-title text-white">
                            {{ $item->nm_items }}
                            </h3>
                        </div>
                        <div class="col-2">
                            <a href="{{ route('ap.items.edit', $item->id) }}" class="btn btn-outline-light btn-sm float-right" type="button" style="color: #fff;" onmouseover="this.style.color='#404040'" onMouseOut="this.style.color='#fff'">
                                <i class="fas fa-pencil-alt"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row card-info">
                        <div class="col-12 col-sm-6">
                            <h3 class="d-inline-block d-sm-none">{{ $item->nm_items }}</h3>
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <!-- <div class="col-12">
                                <img src="{{-- asset('images/items/'.$item->pictures[0]->value) --}}" width="70%" height="70%" class="item-image" alt="Product Image">
                            </div> -->
                                <!-- <div class="col-12 product-image-thumbs">
                                @foreach($item->pictures as $picture)
                                <div class="product-image-thumb {{-- $loop->first ? 'active' : '' --}}"><img src="{{-- asset('images/items/'.$picture->value) --}}" width="70%" height="70%" alt="Product Image"></div>
                                @endforeach
                            </div> -->
                                <div class="carousel-inner">
                                    
                                    @foreach($item->pictures as $picture)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src="{{ asset('images/items/'.$picture->value) }}" class="d-block w-100" width="300px" height="300px" alt="Product Image">
                                    </div>
                                    @endforeach
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h5 class="my-3 text-bold">{{ $item->nm_items }}</h5>
                            <hr>
                            <h5 class="text text-bold">Kategori Produk</h5>
                            <p>{{ $item->category['nm_category']}}</p>
                            <hr>
                            <h5 class="text text-bold">Harga Asli</h5>
                            <p>@currency($item->price)</p>
                            <hr>
                            <p name="diskon" id="diskon">Besar diskon: @currency($item->discount)
                            </p>
                            <hr>
                            <div class="bg-gray ">
                                <h2 class="mb-0" name="jumlah">
                                    @php $total = 0 @endphp
                                    @if($item->discount > 0)
                                    @php $total += $item['price'] - $item['discount'] @endphp
                                    @else($item->discount = 0)
                                    @php $total += $item['price'] @endphp
                                    @endif
                                    @currency($total)
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Deskripsi</a>
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                                {!! html_entity_decode($item->description) !!}
                            </div>
                        </div>
                    </div><br><br>

                    <a href="{{ route('ap.items.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <br>
                    <!-- /.row -->
                </div>
            </div>
        </section>
    </div>
</div>
@endsection