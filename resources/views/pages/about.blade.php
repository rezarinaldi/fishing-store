@extends('layouts.app')

@section('title')
About | {{ config('settings.name') }}
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
            <div class="row" data-aos="zoom-in">
                <div class="col-md-12">
                    <p>{{ config('settings.name') }} adalah toko alat pancing yang berlokasi di Wendit *baca Mendit,
                        Kabupaten Malang. Alamat lengkapnya di <i>{{ config('settings.address') }}</i> atau bisa klik
                        <b><a href="https://goo.gl/maps/tcMxZBw6xAKah3eQ7" target="__blank">di sini</a></b> untuk
                        detailnya.
                    </p>
                    <p>Toko ini masih bergerak dan melayani secara offline, untuk operasional toko secara offline, buka
                        pada jam 7 pagi - 9 malam. Nomor handphone yang ada di link google map (<b><a href="tel:+{{
                            config('settings.telephone') }}">{{ config('settings.telephone') }}</a></b>), kami tidak
                        mengetahui apakah masih menggunakan nomor tersebut atau sudah ganti. Karena owner dari toko alat
                        pancing tersebut, sudah lama tidak mengelola dan meng-update data-data di google map. Untuk cara
                        lain, mungkin bisa menghubungi melalui e-mail disamping: <b><a
                                href="mailto:{{ config('settings.email') }}">{{ config('settings.email') }}</a></b>.</p>

                    <p>Developed by:</p>
                    <ol type='1'>
                        <a href="https://github.com/b-bella99" target="__blank">
                            <li>Bella Setyowati - 1841720004</li>
                        </a>
                        <a href="https://github.com/rezarinaldi" target="__blank">
                            <li>Reza Rinaldi - 1841720078</li>
                        </a>
                    </ol>
                </div>
            </div>
    </section>
</div>
@endsection