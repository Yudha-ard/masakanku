@extends('front.layouts.layout')

@section('title', 'Deatil Resep')
            
@section('content')
<section class="about section bd-container" id="about">
  <div class="about__container  bd-grid">
    @if(is_null($reseps->img_resep))
      <img src="{{ URL::asset('storage/images/resep/resep.png') }}" alt="" class="about__img">
    @else
      <img src="{{ URL::asset('storage/images/resep/'.$reseps->img_resep) }}" />
    @endif   
    <div class="about__data">
        <h3 class="home__title">{{ $reseps->judul }}</h3>
        <span class="badge badge-light-warning fs-7 fw-bold">Kategori : {{ $reseps->kategori->nama }}</span>
        <br>
        <br>
        <p class="about__initial">{!! $reseps->deskripsi !!}</p>
        <br>
        <br>
        <a href="{{ route('front.index') }}" class="button">Back</a>
    </div>

  </div>
</section>
@stop