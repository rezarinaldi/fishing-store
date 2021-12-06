@extends('layouts.app')

@section('title')
Contact | {{ config('settings.name') }}
@endsection

@section('content')
<div class="page-content page-home">
    <section class="contact" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-6 my-3" data-aos="fade-up">
                    <h3>Contact Us</h3>
                    <p>Nice to meet you 😊. Have a question or just want to get in touch? Let's message.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 contact-form" data-aos="zoom-in">
                @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br />
                @endif
                    <form action="{{ route('contact.create') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif"
                                id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                            @if($errors->has('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Your E-mail</label>
                            <input type="email" class="form-control @if($errors->has('email')) is-invalid @endif"
                                id="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
                            @if($errors->has('email'))
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control @if($errors->has('phone')) is-invalid @endif"
                                id="phone" name="phone" placeholder="088409051234" pattern="[0]{1}[8]{1}[0-9]{10}" maxlength="12" value="{{ old('phone') }}">
                            @if($errors->has('phone'))
                            <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea rows="3" class="form-control @if($errors->has('message')) is-invalid @endif"
                                id="message" name="message" placeholder="Bismillah">{{ old('message') }}</textarea>
                            @if($errors->has('message'))
                            <div class="invalid-feedback">{{ $errors->first('message') }}</div>
                            @endif
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success px-4"><i class="fas fa-comment-dots"></i> Send
                                Message</button>
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