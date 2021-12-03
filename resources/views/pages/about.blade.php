@extends('layouts.app')

@section('title')
About | DK Pancing
@endsection

@section('content')
<div class="page-content page-home">
    <section class="about" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12 my-3" data-aos="fade-up">
                    <h3>About Us</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>{{ config('settings.name') }} adalah toko alat pancing yang ada di daerah Wendit *baca Mendit, alamat lengkapnya di
                    {{ config('settings.address') }} atau bisa
                        klik <a href="https://goo.gl/maps/tcMxZBw6xAKah3eQ7">di sini</a> untuk detailnya.</p>
                    <p>Toko ini masih bergerak dan melayani secara offline, untuk operasional toko secara offline, buka
                        pada jam 7 pagi - 9 malam. Nomor handphone yang ada di link google map ( {{ config('settings.telphone') }} ), kami tidak mengetahui
                        apakah masih menggunakan nomor tersebut atau sudah ganti. Karena owner dari toko alat pancing
                        tersebut sudah lama tidak mengupdate data-data di google map. Tau bisa menghubungi di E-mamil ini : <b>{{ config('settings.email') }}</b></p>
                    <p>Developed by:</p>
                    <ol type='1'>
                        <a href="https://github.com/b-bella99">
                            <li>Bella Setyowati - 1841720004</li>
                        </a>
                        <a href="https://github.com/rezarinaldi">
                            <li>Reza Rinaldi - 1841720078</li>
                        </a>
                    </ol>
                </div>
            </div>
    </section>
</div>
@endsection