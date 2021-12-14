@extends('layouts.settings')

@section('title')
Reviews | {{ config('settings.name') }}
@endsection

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Reviews</h2>
            <p class="dashboard-subtitle">
                Review item/product yang ada di toko kami, hehe 😊
            </p>
            @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div><br />
            @endif
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('review-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Nama Product</label>
                                            <select name="item_id" class="form-control">
                                                <option value="">-- Pilih Nama Product --</option>
                                                @foreach ($items as $item)
                                                <option value="{{ $item->id }}">{{ $item->nm_items }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Review</label>
                                            <textarea name="comment" id="editor"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-success px-5">
                                            Add New Review
                                        </button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    @forelse ($reviews as $rv)
                    @if($rv->user_id == Auth::user()->id)
                    <a href="{{ route('review-details', $rv->id) }}" class="card card-list d-block">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    {{$rv->item->nm_items}}
                                </div>
                                <div class="col-md-4">
                                    {!! html_entity_decode($rv->comment) !!}
                                </div>
                                <div class="col-md-3">
                                    {{$rv->created_at}}
                                </div>
                                <div class="col-md-1 d-none d-md-block">
                                    <img src="/images/setting-arrow-right.svg" alt="" />
                                </div>
                            </div>
                        </div>
                    </a>
                    @endif
                    @empty
                    <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                        No Reviews Found
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace("editor");
</script>
@endpush