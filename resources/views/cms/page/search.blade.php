@extends('cms.layout.main')
@section('title')
    {{ __('Tìm kiếm') }} - {{__('Tập đoàn HLY')}}
@endsection

@section('content')
    <section class="searchWrap" style="margin: 50px auto">
        <div class="container">
            <div class="topSearch">
                <h2 class="title">{{__('KẾT QUẢ TÌM KIẾM')}}</h2>
                <form method="get" action="/tim-kiem">
                    <div class="inputSearh">
{{--                        <input name="__RequestVerificationToken"--}}
{{--                               type="hidden"--}}
{{--                               value="s5mTm0JelOT3Y0XlG9v4owINni2ici6wHu7wNTf07uGHWS7MpYloWIF8HBzxXrVmAWBn943lZzxruLM6VayEXrQdyIm4H8S2KxqKeX8E48Q1" />--}}
                        <label>
                            <input type="text"
                                   name="q"
                                   class="form-control"
                                   placeholder="Tìm kiếm..."
                                   value="{{ request()->query('q') }}">
                        </label>
                        <input type="submit" value>
                    </div>
                </form>
                <p>Có {{ count($result) }} {{__('kết quả tìm kiếm')}}</p>
            </div>
            <ul class="listSearch" style="margin: 0 auto; margin-top:50px; max-width: 1200px;">
                @foreach($result as $post)
                    <li style="float: none">
                        <div class="item">
                            <div class="img">
                                <div style="background: url({{ $post->thumbnail }}) center"></div>
                                <img src="{{ asset('assets/fe/images/news-gif.png') }}" alt="{{$post->title}}">
                            </div>
                            <div class="copy">
                                <h4>
                                    Tin {{ @$post->categories->name ?? "" }}
                                </h4>
                                <h3>
                                    {{ $post->title }}
                                </h3>
                                <span>
                                    {{date_format(date_create($post->created_at), 'd-m-Y')}}
                                </span>
                            </div>
                            <a class="link" href="{{localized_route('cms.news.post', $post->slug->content)}}"></a>
                        </div>
                    </li>
                @endforeach
            </ul>
{{--            <div class="paging">--}}
{{--                <span>1</span>--}}
{{--                <a  target="_self" href="/tim-kiem?keyword=vin&page=2" class="">2</a>--}}
{{--                <a  target="_self" href="/tim-kiem?keyword=vin&page=3" class="">3</a>--}}
{{--                <a  target="_self" href="/tim-kiem?keyword=vin&page=4" class="">4</a>--}}
{{--                <a  target="_self" href="/tim-kiem?keyword=vin&page=5" class="">5</a>--}}
{{--                <a  target="_self" href="/tim-kiem?keyword=vin&page=2" class="next ">--}}
{{--                    <i class="fas fa-chevron-right"></i>--}}
{{--                </a>--}}
{{--                <a  target="_self" href="/tim-kiem?keyword=vin&page=119" class="last ">--}}
{{--                    <i class="fas fa-angle-double-right"></i>--}}
{{--                </a>--}}
{{--            </div>--}}

            <div style="margin-bottom: 10px">
                {{ $result->render('vendor.pagination.name') }}
            </div>
        </div>
    </section>
@endsection
