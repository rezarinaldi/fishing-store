@extends('layouts.admin')

@section('title')
Admin | Produk DK Pancing
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
                            <li class="breadcrumb-item active">Ubah Produk</li>
                        </ol>
                    </div>
                </div>
        </section>
        <form class="forms-sample" action="{{ route('ap.items.update',$item->id) }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Ubah Produk</h4>
                            @csrf
                            @method('PUT')
                            @if(session()->get('success'))
                            <div class="alert alert-success">
                                <span class="text text-sm">{{ session()->get('success') }}</span>
                            </div>
                            @endif
                            @if(session()->get('failed'))
                            <div class="alert alert-warning">
                                <span class="text text-sm">{{ session()->get('failed') }}</span>
                            </div>
                            @endif
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id" name="id" placeholder="id" value="{{ $item->id }}" hidden>
                            </div>
                            <div class="form-group">
                                <label for="nm_items">Nama Produk</label>
                                <input type="text" class="form-control @if($errors->has('nm_items')) is-invalid @endif" id="nm_items" name="nm_items" value="{{ $item->nm_items }}">
                                @if($errors->has('nm_items'))
                                <div class="invalid-feedback">{{ $errors->first('nm_items') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="category_id">Kategori Produk</label>
                                <select class="form-control form-select-lg mb-3" aria-label="Default select example" id="category_id" name="category_id" value="{{ $item->category_id }}">
                                    @foreach($category as $c)
                                    @if($c->id == $item->category_id)
                                    <option value={{ $c->id }} selected>{{ $c->nm_category }}</option>
                                    @else
                                    <option value={{ $c->id }}>{{ $c->nm_category }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                <div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi Produk</label>
                                <textarea class="ckeditor form-control @if($errors->has('description')) is-invalid @endif" id="description" name="description" rows="15" value="{{ old('description') }}">{{ $item->description }}</textarea>
                                @if($errors->has('description'))
                                <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="quantity">Jumlah Produk</label>
                                <input type="number" class="form-control @if($errors->has('quantity')) is-invalid @endif" id="quantity" name="quantity" value="{{ $item->quantity }}">
                                @if($errors->has('quantity'))
                                <div class="invalid-feedback">{{ $errors->first('quantity') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="price">Harga Produk</label>
                                <input type="number" class="form-control @if($errors->has('price')) is-invalid @endif" id="price" name="price" value="{{ $item->price }}">
                                @if($errors->has('price'))
                                <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="discount">Diskon Produk</label>
                                <input type="text" class="form-control @if($errors->has('discount')) is-invalid @endif" id="discount" name="discount" value="{{ $item->discount }}">
                                @if($errors->has('discount'))
                                <div class="invalid-feedback">{{ $errors->first('discount') }}</div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{ route('ap.items.index') }}" class="btn btn-light">
                                Batal
                            </a>

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
                                            <td><input type="file" name="images[]" class="form-control" value="{{ old('images[]') }}"></td>
                                            <td><button class="btn btn-success" type="button"><i class="fas fa-plus"></i></button></td>
                                        </tr>
                                    </table>
                                </div>
                                <span class="form-text text-danger text-sm">* Kosongkan jika tidak ingin mengubah gambar.</span>
                            </div>
                            <div class="col-auto">
                                @foreach($images as $data)
                                @if($data->item_id == $item->id)
                                <table class="table table-borderless align-items-center">
                                    <tr>
                                        <td>
                                            <img src="{{ asset('/images/items/'.$data->value) }}" style="height:150px; width:270px" class="rounded float-left" />
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-danger py-3 delete-{{ $data->id }}" type="button" onclick="deleteImage({{ $data->id }})"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </table>
                                @endif
                                @endforeach
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
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function deleteImage(id) {
        var done = confirm('Yakin mau hapus ini ?');
        if (done) {
            $.ajax({
                type: "DELETE",
                url: "{{ route('ap.delete-image') }}",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}",
                },
                success: function(result) {
                    if (result) {
                        $tr = $('.delete-' + id).closest("tr");
                        $tr.remove();
                        // var tableParent = $('.delete-' + id).closest('table');
                        // var trParent = $('.delete-' + id).closest('tr');
                        // trParent.remove();
                        alert('File terhapus !');
                    } else {
                        alert('Gagal menghapus file !');
                    }
                }
            });
        }
    }
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
    });
</script>
@endsection