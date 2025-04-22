@extends('layouts.front')

@section('content')
<section class="anime-details spad">
    <div class="container">
        <div class="anime__details__content">
            <div class="row">
                {{-- Gambar Film (Kolom Kiri) --}}
                <div class="col-lg-3">
                    <div class="anime__details__pic set-bg" data-setbg="{{ asset('images/films/' . $film->poster) }}">
                        <div class="comment"><i class="fa fa-comments"></i> {{ $film->reviews_count ?? 11 }}</div>
                        <div class="view"><i class="fa fa-eye"></i> {{ number_format($film->views ?? 0) }}</div>
                    </div>
                </div>

                {{-- Detail Film (Kolom Kanan) --}}
                <div class="col-lg-9">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <h3>{{ $film->title }}</h3>
                            <span>{{ $film->original_title ?? '' }}</span>
                        </div>
                        <div class="anime__details__rating">
                            <div class="rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($film->rating >= $i)
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    @elseif ($film->rating >= $i - 0.5)
                                        <a href="#"><i class="fa fa-star-half-o"></i></a>
                                    @else
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                    @endif
                                @endfor
                            </div>
                            <span>{{ $film->votes ?? 1029 }} Votes</span>
                        </div>

                        <p>{{ $film->description }}</p>

                        <div class="anime__details__widget">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Type:</span> {{ $film->type ?? 'Movie' }}</li>
                                        <li><span>Director:</span> {{ $film->director }}</li>
                                        <li><span>Release Year:</span> {{ $film->release_year }}</li>
                                        <li><span>Status:</span> {{ $film->status ?? 'Released' }}</li>
                                        <li><span>Genre:</span> {{ $film->genre->name ?? 'Unknown' }}</li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Scores:</span> {{ number_format($film->rating ?? 0, 2) }} / 5</li>
                                        <li><span>Votes:</span> {{ number_format($film->votes ?? 0) }}</li>
                                        <li><span>Duration:</span> {{ $film->duration ?? 'N/A' }}</li>
                                        <li><span>Quality:</span> HD</li>
                                        <li><span>Views:</span> {{ number_format($film->views ?? 0) }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="anime__details__btn">
                            <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</a>
                            <a href="#" class="watch-btn"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bagian Review & Sidebar --}}
            <div class="row mt-5">
                <div class="col-lg-8 col-md-8">
                    {{-- Ulasan Film --}}
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Reviews</h5>
                        </div>
                        @foreach($reviews as $review)
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="{{ asset('front/assets/img/anime/review-1.jpg') }}" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>{{ $review->user_name ?? 'Anonymous' }} - <span>{{ $review->created_at->diffForHumans() }}</span></h6>
                                <p>{{ $review->content }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- Form Komentar --}}
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <form action="{{ route('film.review.store', $film->id) }}" method="POST">
                            @csrf
                            <textarea name="content" placeholder="Your Comment" required></textarea>
                            <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                        </form>
                    </div>
                </div>

                {{-- Sidebar: Rekomendasi --}}
                <div class="col-lg-4 col-md-4">
                    <div class="anime__details__sidebar">
                        <div class="section-title">
                            <h5>You Might Like...</h5>
                        </div>
                        @foreach ($recommendations as $rec)
                        <div class="product__sidebar__view__item set-bg" data-setbg="{{ asset('images/films/' . $rec->poster) }}">
                            <div class="ep">{{ $rec->release_year }}</div>
                            <div class="view"><i class="fa fa-eye"></i> {{ $rec->views ?? 0 }}</div>
                            <h5><a href="{{ route('film.show', $rec->id) }}">{{ $rec->title }}</a></h5>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
