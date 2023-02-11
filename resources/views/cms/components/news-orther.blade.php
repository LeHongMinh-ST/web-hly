<section section=".newsHomeWrap" data="200" class="newsHomeWrap paralax">
    <div class="container">
        <h2 class="title">Tin t&#7913;c khác</h2>
        <ul class="newsHomeList">
        @foreach($posts as $post)
                <li>
                    <div class="itemNews">
                        <div class="img">
                            <div style="background: url({{ $post->thumbnail }}) center; width: 370px; height: 250px; object-fit: cover"></div>
                            <img src="./assets/images/post1.jpg" style="width: 370px; height: 250px;">
                        </div>
                        <div class="copy">
                            <h4>{{$post->categories[0]->name}}</h4>
                            <h3>{{$post->title}}</h3>
                            <p>{{date_format(date_create($post->created_at), 'd-m-Y')}}</p>
                        </div>
                        <a class="link" href="/tin-tuc-su-kien/bai-viet/{{$post->slug->content}}"></a>
                    </div>
                </li>
{{--            <li>--}}
{{--                <div class="itemNews">--}}
{{--                    <div class="img">--}}
{{--                        <div style="background: url({{ $post->thumbnail }}) center"></div>--}}
{{--                        --}}{{--                            <img src="{{ $post->thumbnail }}" >--}}
{{--                        <img src="./assets/fe/images/news-gif.png">--}}
{{--                    </div>--}}
{{--                    <div class="copy">--}}
{{--                        <h4>--}}
{{--                            @if(count($post->categories) > 0)--}}
{{--                                @foreach($post->categories as $cate)--}}
{{--                                    {{$cate->name}}--}}
{{--                                    @if($cate->id != $post->categories[count($post->categories) - 1]->id)--}}
{{--                                        ,--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            @else--}}
{{--                                Tất cả danh mục--}}
{{--                            @endif--}}
{{--                        </h4>--}}
{{--                        <h3>--}}
{{--                            {{$post->title}}--}}
{{--                        </h3>--}}
{{--                        <p>{{date_format(date_create($post->created_at), 'd-m-Y')}}</p>--}}
{{--                    </div>--}}
{{--                    <a class="link" href="/tin-tuc-su-kien/bai-viet/{{$post->slug->content}}"></a>--}}
{{--                </div>--}}
{{--            </li>--}}
        @endforeach
        </ul>
{{--        <ul class="newsHomeList">--}}

{{--            <li>--}}
{{--                <div class="itemNews">--}}
{{--                    <div class="img">--}}
{{--                        <div style="background: url('./assets/images/post1.jpg') center; width: 370px; height: 250px; object-fit: cover"></div>--}}
{{--                        <img src="./assets/images/post1.jpg" style="width: 370px; height: 250px;">--}}
{{--                    </div>--}}
{{--                    <div class="copy">--}}
{{--                        <h4>Tin Abcgroup</h4>--}}
{{--                        <h3>Từ bỏ ngay những thói quen có thể âm thầm tàn phá xương khớp</h3>--}}
{{--                        <p>09-01-2023</p>--}}
{{--                    </div>--}}
{{--                    <a class="link"--}}
{{--                       href="post.html"></a>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--            <li>--}}
{{--                <div class="itemNews">--}}
{{--                    <div class="img">--}}
{{--                        <div style="background: url('./assets/images/post2.jpg') center; width: 370px; height: 250px; object-fit: cover" ></div>--}}
{{--                        <img src="./assets/images/post2.jpg" style="width: 370px; height: 250px;">--}}
{{--                    </div>--}}
{{--                    <div class="copy">--}}
{{--                        <h4>Tin Abcgroup</h4>--}}
{{--                        <h3>Điều trị bệnh lý cơ xương khớp bằng--}}
{{--                            phương pháp y học cổ truyền </h3>--}}
{{--                        <p>09-01-2023</p>--}}
{{--                    </div>--}}
{{--                    <a class="link"--}}
{{--                       href="post2.html"></a>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--            <li>--}}
{{--                <div class="itemNews">--}}
{{--                    <div class="img">--}}
{{--                        <div style="background: url('./assets/images/post3.jpg') center;  width: 370px; height: 250px; object-fit: cover"></div>--}}
{{--                        <img src="./assets/images/post3.jpg" style="width: 370px; height: 250px;">--}}
{{--                    </div>--}}
{{--                    <div class="copy">--}}
{{--                        <h4>Tin Abcgroup</h4>--}}
{{--                        <h3>Điều trị bệnh lý cơ xương khớp theo y học cổ truyền--}}
{{--                        </h3>--}}
{{--                        <p>09-01-2023</p>--}}
{{--                    </div>--}}
{{--                    <a class="link"--}}
{{--                       href="post3.html"></a>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--        </ul>--}}
    </div>
</section>
