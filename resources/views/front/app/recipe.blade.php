@extends('front.layouts.layout')

@section('title', 'Product')

@section('content')
<section class="menu section bd-container" id="menu">
    <span class="section-subtitle">Special</span>
    <h2 class="section-title">Menu of the week</h2>

    <div class="menu__container bd-grid">
        @foreach($reseps as $resep)
        <div class="menu__content">
            <img src="{{ URL::asset('storage/images/resep/'.$resep->img_resep) }}" alt="" class="menu__img">
            <h3 class="menu__name">{{ $resep->judul }}</h3>
            <span class="badge badge-light-warning fs-7 fw-bold menu__preci">{{ $resep->kategori->nama }}</span>
            <a href="{{ route('front.recipe.detail', $resep->id) }}" class="button menu__button">
                <i class='bx bx-right-arrow-alt'></i>
            </a>
        </div>
        @endforeach
    </div>
</section>
@stop