@extends('cms.layout.main')
@section('title')
    {{ $post->title }}
@endsection
@section('content')
    <section class="newsWrap stagger-up">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}"><i class="fas fa-home"></i></a> <i class="fas fa-chevron-right"></i>
                <p>Tin tức sự kiện</p>
            </div>
            <div class="infoNews">
                <h2>{{ $post->title  }}</h2>
                <p><i class="far fa-clock"></i>12-01-2023</p>
            </div>
            <div class="content">
                {!! $post->content !!}
            </div>
        </div>
    </section>

    @include('cms.components.news-orther')
@endsection
