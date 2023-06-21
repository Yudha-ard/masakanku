@extends('front.layouts.layout')

@section('title', 'Not Found')
            
@section('content')
<section class="about section bd-container" id="about">
  <div class="about__container  bd-grid">
    <div class="about__data">
        <h1 class="home__title">404</h1>
        <h2 class="section-title about__initial">Not Found</h2>
          <a href="{{ route('frontend.app.index') }}" class="button">Back</a>
    </div>

    <img src="{{ URL::asset('assets/frontend/img/home.png') }}" alt="" class="about__img">


  </div>
</section>
@stop