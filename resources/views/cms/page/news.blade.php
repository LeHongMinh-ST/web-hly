@extends('cms.layout.main')
@section('title')
     {{__('Tin tức sự kiện')}} - {{__('Tập đoàn HLY')}}
@endsection
@section('content')
    <section class="newsWrap" style="padding-top: 40px;">
        <div class="container">
            <h2 class="title stagger-up">{{ __('Tin tức sự kiện') }}</h2>
            <ul class="tabNews stagger-up">
                <li><a @if(!request()->has('danh-muc'))
                           class="active"
                       @endif href="{{ localized_route('cms.news') }}">{{ __('Tin tức sự kiện') }}</a></li>
                @foreach($categories as $category)
                    <li><a
                            @if(request('danh-muc') == $category->slug->content)
                                class="active"
                            @endif
                            href="{{localized_route('cms.news',['danh-muc'=>$category->slug->content])}}">{{ $category->name}} </a>
                    </li>
                @endforeach
            </ul>
            <select class="slNews js-select-redirect">
                <option
                    @if(!request()->has('danh-muc'))
                        selected=selected
                    @endif
                     value="{{ localized_route('cms.news') }}">Tin tức</option>
                @foreach($categories as $category)

                    <option
                        @if(request('danh-muc') == $category->slug->content)
                            selected=selected
                        @endif
                        value="{{localized_route('cms.news',['danh-muc'=>$category->slug->content])}}">{{ $category->name}}</option>

                @endforeach
            </select>

            <ul class="newsList stagger-up">
                @foreach($posts as $post)
                    <li>
                        <div class="itemNews">
                            <div class="img">
                                <div style="background: url({{ $post->thumbnail }}) center"></div>
                                <img class="img-news" src="{{ asset('assets/fe/images/news-gif.png') }}" alt="{{$post->title}}">
                            </div>
                            <div class="copy">
                                <h4>
                                    Tin {{@$post->categories->name ?? ""}}
                                </h4>
                                <h3>
                                    {{$post->title}}
                                </h3>
                                <p>{{date_format(date_create($post->created_at), 'd-m-Y')}}</p>
                            </div>
                            <a class="link" href="{{localized_route('cms.news.post',$post->slug->content)}}"></a>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div style="margin-bottom: 10px">
                {{ $posts->render('vendor.pagination.name') }}

            </div>
        </div>
    </section>

@endsection
