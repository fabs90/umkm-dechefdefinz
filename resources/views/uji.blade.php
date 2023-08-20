@extends('layouts.landing')
@section('testimoni-section')
    @foreach ($testimoni as $item)
        <div class="swiper-slide">
            <img src="{{ asset("storage/testimoni/$item->image") }}" alt="Testimoni">
            <p>Nama : {{ $item->name }}</p>
        </div>
    @endforeach
@endsection
@section('review-section')
    @foreach ($datas as $item)
        <div class="swiper-slide box">
            <div class="client-review">
                <p>{{ $item->comments }}</p>
            </div>
            <div class="client-info">
                <div class="img">
                        <img src="{{ asset('umkm-baru') }}/images/user-circle.png" class="user">
                </div>
                <div class="clientDetailed">
                    <h3>{{ $item->name }}</h3>
                    <div class="stars">
                        <div class="look-at-the-star">
                            @if ($item->star_rating == '5')
                                <i class="fas fa-star" style="color: #ffdd00;"></i>
                                <i class="fas fa-star" style="color: #ffdd00;"></i>
                                <i class="fas fa-star" style="color: #ffdd00;"></i>
                                <i class="fas fa-star" style="color: #ffdd00;"></i>
                                <i class="fas fa-star" style="color: #ffdd00;"></i>
                            @elseif ($item->star_rating == '4')
                                <i class="fas fa-star" style="color: #ffdd00;"></i>
                                <i class="fas fa-star" style="color: #ffdd00;"></i>
                                <i class="fas fa-star" style="color: #ffdd00;"></i>
                                <i class="fas fa-star" style="color: #ffdd00;"></i>
                                <i class="fas fa-star" style="color: #ffdd00;"></i>
                            @elseif ($item->star_rating == '3')
                                <i class="fas fa-star" style="color: #ffdd00;"></i>
                                <i class="fas fa-star" style="color: #ffdd00;"></i>
                                <i class="fas fa-star" style="color: #ffdd00;"></i>
                                <i class="far fa-star" style="color: #fbff00;"></i>
                                <i class="far fa-star" style="color: #fbff00;"></i>
                            @elseif ($item->star_rating == '2')
                                <i class="fas fa-star" style="color: #ffdd00;"></i>
                                <i class="fas fa-star" style="color: #ffdd00;"></i>
                                <i class="far fa-star" style="color: #fbff00;"></i>
                                <i class="far fa-star" style="color: #fbff00;"></i>
                                <i class="far fa-star" style="color: #fbff00;"></i>
                            @else
                                <i class="fas fa-star" style="color: #ffdd00;"></i>
                                <i class="far fa-star" style="color: #fbff00;"></i>
                                <i class="far fa-star" style="color: #fbff00;"></i>
                                <i class="far fa-star" style="color: #fbff00;"></i>
                                <i class="far fa-star" style="color: #fbff00;"></i>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
