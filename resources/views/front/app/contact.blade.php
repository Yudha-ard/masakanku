@extends('front.layouts.layout')

@section('title', 'Contact')

@section('content')
<section class="contact section bd-container" id="contact">
    <div class="contact__container bd-grid">
        <div id="input">
            <div class="text1">
                Saran untuk kami
            </div>
            <div class="text2">
                Saran anda sangat berguna bagi kami
            </div>
            <form action="{{ route('front.form.store') }}" class="whatsapp-form" method="POST">
                @csrf
                <div class="datainput">
                    <input class="validate" id="name" name="name" required type="text" value="{{ old('name') }}" />
                    <div id="text-info">
                        @if ($errors->has('name'))
                        <span class="no">{{ $errors->first('name') }}</span>
                        @else
                        <span class="highlight"></span><span class="bar"></span>
                        @endif
                    </div>
                    <label>Nama</label>
                </div>
                <div class="datainput">
                    <input class="validate" id="email" name="email" required type="text" value="{{ old('email') }}" />
                    <div id="text-info">
                        @if ($errors->has('email'))
                        <span class="no">{{ $errors->first('email') }}</span>
                        @else
                        <span class="highlight"></span><span class="bar"></span>
                        @endif
                    </div>
                    <label>Email</label>
                </div>
                <div class="datainput">
                    <input class="validate" id="no_telp" name="no_telp" required type="text" value="{{ old('no_telp') }}" />
                    <div id="text-info">
                        @if ($errors->has('no_telp'))
                        <span class="no">{{ $errors->first('no_telp') }}</span>
                        @else
                        <span class="highlight"></span><span class="bar"></span>
                        @endif
                    </div>
                    <label>No.Telp</label>
                </div>
                <div class="datainput">
                    <input class="validate" id="text" name="judul" required type="text" value="{{ old('judul') }}" />
                    <div id="text-info">
                        @if ($errors->has('judul'))
                        <span class="no">{{ $errors->first('judul') }}</span>
                        @else
                        <span class="highlight"></span><span class="bar"></span>
                        @endif
                    </div>
                    <label>Subject</label>
                </div>
                <div class="datainput">
                    <textarea style="height: 200px; width: 100%;" class="validate" id="pesan" name="pesan"
                        type="text" required>{{ old('pesan') }}</textarea>
                    <div id="text-info">
                        @if ($errors->has('pesan'))
                        <span class="no">{{ $errors->first('pesan') }}</span>
                        @else
                        <span class="highlight"></span><span class="bar"></span>
                        @endif
                    </div>
                    <label>Deskripsi</label>
                </div>
                <input class="send_form" type="submit" name="submit" value="Kirim">
                <div id="text-info"></div>
            </form>
        </div>
    </div>
</section>
@stop