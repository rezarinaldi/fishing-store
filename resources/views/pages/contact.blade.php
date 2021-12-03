@extends('layouts.app')

@section('title')
Contact | DK Pancing
@endsection

@section('content')
<div class="page-content page-home">
    <section class="contact" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12 my-3" data-aos="fade-up">
                    <h3>Contact Us</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 contact-form">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif"
                                id="name" name="name" placeholder="Name">
                            @if($errors->has('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Your E-mail</label>
                            <input type="email" class="form-control @if($errors->has('email')) is-invalid @endif"
                                id="email" name="name" placeholder="E-mail">
                            @if($errors->has('email'))
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Message</label>
                            <textarea rows="3" class="form-control @if($errors->has('message')) is-invalid @endif"
                                id="message" name="name" placeholder="Bismillah"></textarea>
                            @if($errors->has('message'))
                            <div class="invalid-feedback">{{ $errors->first('message') }}</div>
                            @endif
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success px-4">Sending</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d493.93623278612694!2d112.67831732429927!3d-7.948222779448086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6296f275712fb%3A0x9baee488eb06a718!2sDK%20Pancing!5e0!3m2!1sid!2sid!4v1638464513259!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection