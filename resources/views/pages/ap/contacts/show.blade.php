@extends('layouts.admin')

@section('title')
Admin | Pesan {{ config('settings.name') }}
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
                        <h2><i class="nav-icon fas fa-inbox"></i> Kotak Pesan</h2>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('ap.contacts.index') }}">Kotak Pesan</a></li>
                            <li class="breadcrumb-item active">Detail Pesan</li>
                        </ol>
                    </div>
                </div>
        </section>
        <section class="content">
            <div class="card card-solid">
                <div class="card-header bg-primary">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title text-white">
                                Pesan
                            </h3>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row card-info">
                        <div class="col-5 text-center ">
                            <i class="fas fa-user-tie fa-9x"></i>
                        </div>
                        <div class="col-7">
                            <h2 class="lead"><b>{{ $contact->name }}</b></h2><br>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="medium"><span class="fa-li"><i class="fas fa-envelope"></i>
                                    </span><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></li>
                                <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-phone"></i>
                                    </span><a href="tel:+62{{ $contact->phone }}">{{ $contact->phone }}</a></li>
                            </ul><br>
                            <p class=""><b>Pesan: </b><br>{!! html_entity_decode($contact->message) !!} </p>
                        </div>
                    </div><br><br>
                    <a href="{{ route('ap.contacts.index') }}" class="btn btn-outline-primary">
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