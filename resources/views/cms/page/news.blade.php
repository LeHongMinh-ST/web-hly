@extends('cms.layout.main')
@section('title')
    Tin tức sự kiện - Công ty cổ phần xã hội HLY
@endsection
@section('content')
    <section class="newsWrap">
        <div class="container">
            <h2 class="title stagger-up">Tin t&#7913;c s&#7921; ki&#7879;n</h2>
            <ul class="tabNews stagger-up">
                <li><a class=active href="/tin-tuc-su-kien">T&#7845;t c&#7843;</a></li>
                <li><a href="/tin-tuc-su-kien">Sức khỏe/Chăm sóc sức khỏe </a></li>
                <li><a href="/tin-tuc-su-kien">Thực phẩm-Phân phối</a></li>
                <li><a href="/tin-tuc-su-kien">Bất động sản</a></li>
                <li><a href="/tin-tuc-su-kien">Du lịch-Dưỡng sinh-Dưỡng lão</a></li>
                <li><a href="/tin-tuc-su-kien">Công nghệ</a></li>
                <li><a href="/tin-tuc-su-kien">Đầu tư</a></li>
                <li><a href="/tin-tuc-su-kien">Vĩnh hằng</a></li>
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
                            <div style="background: url('./assets/fe/images/hl1.jpg') center"></div>
                            <img src="./assets/fe/images/news-gif.png">
                        </div>
                        <div class="copy">
                            <h4>Tin Công nghi&#7879;p</h4>
                            <h3>
                            {{$post->title}}
                            </h3>
                            <p>{{date_format(date_create($post->created_at), 'd-m-Y')}}</p>
                        </div>
                        <a class="link" href="post.html"></a>
                    </div>
                </li>
                @endforeach
            </ul>
            {{ $posts->render('vendor.pagination.name') }}

        </div>
    </section>

@endsection
