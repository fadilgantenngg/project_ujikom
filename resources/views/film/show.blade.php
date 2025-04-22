@extends('layouts.front')

@section('content')
<section class="anime-details spad">
    <div class="container">
        <div class="anime__details__content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="anime__details__pic set-bg" data-setbg="{{ asset('images/films/' . $film->poster) }}">
                        <div class="comment"><i class="fa fa-comments"></i> {{ rand(5, 30) }}</div>
                        <div class="view"><i class="fa fa-eye"></i> {{ rand(1000, 9999) }}</div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <h3>{{ $film->title }}</h3>
                            <span>{{ $film->original_title ?? 'N/A' }}</span>
                        </div>
                        <div class="anime__details__rating">
                            <div class="rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if($film->rating >= $i)
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    @elseif($film->rating >= ($i - 0.5))
                                        <a href="#"><i class="fa fa-star-half-o"></i></a>
                                    @else
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                    @endif
                                @endfor
                            </div>
                            <span>{{ number_format($film->rating_count ?? rand(100, 500)) }} Votes</span>
                        </div>
                        <p>{{ $film->description }}</p>
                        <div class="anime__details__widget">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Type:</span> {{ $film->type ?? 'Movie' }}</li>
                                        <li><span>Studios:</span> {{ $film->studio ?? 'Unknown Studio' }}</li>
                                        <li><span>Tahun Rilis:</span> {{ $film->release_year }}</li>
                                        <li><span>Status:</span> {{ $film->status ?? 'Released' }}</li>
                                        <li><span>Genre:</span> {{ $film->genre->name }}</li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Scores:</span> {{ $film->rating ?? 'N/A' }} / {{ $film->rating_count ?? rand(1000, 2000) }}</li>
                                        <li><span>Rating:</span> {{ $film->rating ?? 'N/A' }} / {{ rand(100, 300) }} times</li>
                                        <li><span>Duration:</span> {{ $film->duration ?? '24 min/ep' }}</li>
                                        <li><span>Quality:</span> HD</li>
                                        <li><span>Views:</span> {{ rand(10000, 100000) }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="anime__details__btn">
                            <a href="{{ url()->previous() }}" class="watch-btn"><span>Back</span> <i class="fa fa-angle-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
