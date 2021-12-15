@extends('layouts.admin')

@section('title')
Admin | Tambah Produk {{ config('settings.name') }}
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
                            <li class="breadcrumb-item active">Tambah Produk</li>
                        </ol>
                    </div>
                </div>
        </section>

        <form class="forms-sample" action="{{ route('ap.items.store') }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    @if(session()->get('failed'))
                    <div class="alert alert-warning">
                        {{ session()->get('failed') }}
                    </div>
                    @endif
                </div>
                @csrf
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Produk</h4>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id" name="id" placeholder="id" hidden>
                            </div>
                            <div class="form-group">
                                <label for="nm_category">Nama Produk</label>
                                <input type="text" class="form-control @if($errors->has('nm_items')) is-invalid @endif"
                                    id="nm_items" name="nm_items" placeholder="Nama Produk"
                                    value="{{ old('nm_items') }}">
                                @if($errors->has('nm_items'))
                                <div class="invalid-feedback">{{ $errors->first('nm_items') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nm_category">Kategori Produk</label>
                                <select class="form-control form-select-lg mb-3" aria-label="Default select example"
                                    id="category_id" name="category_id" value="{{ old('category_id') }}">
                                    @foreach($category as $c)
                                    <option value={{ $c->id }}>{{ $c->nm_category }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                <div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi Produk</label>
                                <textarea
                                    class="ckeditor form-control @if($errors->has('description')) is-invalid @endif"
                                    id="description" name="description" placeholder="Produk ini ..."
                                    rows="15">{{ old('description') }}</textarea>
                                @if($errors->has('description'))
                                <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="quantity">Jumlah Produk</label>
                                <input type="number"
                                    class="form-control @if($errors->has('quantity')) is-invalid @endif" id="quantity"
                                    name="quantity" placeholder="0" value="{{ old('quantity') }}">
                                @if($errors->has('quantity'))
                                <div class="invalid-feedback">{{ $errors->first('quantity') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="price">Harga Produk</label>
                                <input type="number" class="form-control @if($errors->has('price')) is-invalid @endif"
                                    id="price" name="price" placeholder="120000" value="{{ old('price') }}">
                                @if($errors->has('price'))
                                <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="discount">Diskon Produk</label>
                                <input type="text" class="form-control @if($errors->has('discount')) is-invalid @endif"
                                    id="discount" name="discount" placeholder="0" value="{{ old('discount') }}">
                                @if($errors->has('discount'))
                                <div class="invalid-feedback">{{ $errors->first('discount') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Gambar Produk</h4>
                            <div class="col-auto">
                                <div class="table-responsive">
                                    <table class="table table-borderless" id="field">
                                        <tr>
                                            <td><input type="file" name="images[]" class="form-control"></td>
                                            <td><button class="btn btn-success" type="button"><i
                                                        class="fas fa-plus"></i></button></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{ route('ap.items.index') }}" class="btn btn-light">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{ route('ap.image.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        height: '250px',
        width: '100%'
    });
</script>
<script type="text/javascript">
    var i = 1;

    $(document).ready(function() {
        $('.btn-success').click(function() {
            i++;
            $('#field').append('<tr id="row' + i + '" class="dynamic-added"><td><input type="file" name="images[]" class="form-control"></td><td><button class="btn btn-danger" type="button" name="remove" id="' + i + '"><i class="fas fa-trash"></i></button></td></tr>');
        });

        $(document).on('click', '.btn-danger', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
        // $(".btn-success").click(function() {
        //   var html = $(".clone").html();
        //   $(".increment").after(html);
        // });
        // $("body").on("click", ".btn-danger", function() {
        //   $(this).parents(".control-group").remove();
        // });
    });
</script>
@endsection