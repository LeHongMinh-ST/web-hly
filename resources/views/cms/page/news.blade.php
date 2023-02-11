@extends('cms.layout.main')
@section('title')
    Tin tức sự kiện - Công ty cổ phần xã hội HLY
@endsection
@section('content')
    <section class="newsWrap" style="padding-top: 40px;">
        <div class="container">
            <h2 class="title stagger-up">Tin t&#7913;c s&#7921; ki&#7879;n</h2>
            <ul class="tabNews stagger-up">
                <li><a
                            @if(!isset($_GET['category_id']))
                            class="active"
                            @endif
                            href="/tin-tuc-su-kien">T&#7845;t c&#7843;</a></li>
                @foreach($categories as $category)
                <li><a
                            @if(isset($_GET['category_id']) && $_GET['category_id'] == $category->id)
                                    class="active"
                                    @endif
                            href="{{route('cms.news',['category_id'=>$category->id])}}">{{$category->name}} </a></li>
                @endforeach
            </ul>
            <select class="slNews js-select-redirect">
                <option selected=selected value="/tin-tuc-su-kien">T&#7845;t c&#7843;</option>
                <option value="/tin-tuc-su-kien">HLY Group</option>
                <option value="/tin-tuc-su-kien">Công ngh&#7879;</option>
                <option value="/tin-tuc-su-kien">Công nghi&#7879;p</option>
                <option value="/tin-tuc-su-kien">B&#7845;t đ&#7897;ng s&#7843;n</option>
                <option value="/tin-tuc-su-kien">Du l&#7883;ch - Vui chơi - Gi&#7843;i trí</option>
                <option value="/tin-tuc-su-kien">Y t&#7871;</option>
                <option value="/tin-tuc-su-kien">Giáo d&#7909;c</option>
                <option value="/tin-tuc-su-kien">Bán l&#7867;</option>
            </select>

            <ul class="newsList stagger-up">
                @foreach($posts as $post)
                <li>
                    <div class="itemNews">
                        <div class="img">
                            <div style="background: url({{ $post->thumbnail }}) center"></div>
{{--                            <img src="{{ $post->thumbnail }}" >--}}
                            <img src="./assets/fe/images/news-gif.png">
                        </div>
                        <div class="copy">
                            <h4>
                                @if(count($post->categories) > 0)
                                    @foreach($post->categories as $cate)
                                        {{$cate->name}}
                                        @if($cate->id != $post->categories[count($post->categories) - 1]->id)
                                            ,
                                        @endif
                                    @endforeach
                                @else
                                    Tất cả danh mục
                                @endif
                            </h4>
                            <h3>
                            {{$post->title}}
                            </h3>
                            <p>{{date_format(date_create($post->created_at), 'd-m-Y')}}</p>
                        </div>
                        <a class="link" href="/tin-tuc-su-kien/bai-viet/{{$post->slug->content}}"></a>
                    </div>
                </li>
                @endforeach
            </ul>
            {{ $posts->render('vendor.pagination.name') }}

        </div>
    </section>

@endsection
