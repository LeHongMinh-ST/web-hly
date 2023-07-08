@extends('cms.layout.main')
@section('title')
    {{ $post->title }}
@endsection
@section('content')
    <section class="newsWrap stagger-up" style="padding-top: 40px;">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ localized_route('home') }}"><i class="fas fa-home"></i></a> <i class="fas fa-chevron-right"></i>
                <p>Tin tức {{@$post->categories->name ?? ""}}</p>
            </div>
            <div class="infoNews">
                <h2>{{ $post->title }}</h2>
                <p><i class="far fa-clock"></i>{{ \Illuminate\Support\Carbon::createFromTimeString($post->created_at)->format('H:m d/m/Y') }}</p>
            </div>
            <div class="content">
                {!! $post->content !!}
            </div>
        </div>
    </section>

    @include('cms.components.news-orther', ['posts' => $posts])
@endsection
