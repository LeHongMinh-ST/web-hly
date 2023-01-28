@extends('frontend.layout.main')
@section('title')
    Trang chủ - Tập đoàn Abc
@endsection
@section('content')

    <section id="bannerHome">
        <script src="https://www.youtube.com/player_api"></script>
        <div class="bannerHome slider stagger-up">
            <div class="item" style="background: url('./assets/fe/images/hl2.jpg') center no-repeat; box-shadow: rgb(14 100 71 / 72%) 50vw 0 70vw 0 inset;">
{{--                                    <img class="img" src="https://ircdn.vingroup.net/storage/Uploads/Photos/Landmark81banner.jpg">--}}
                                    <div class="copy">
                                       <h2>Rừng xanh <br> hạnh phúc </h2>
                                   </div>
                <div class="slideBanner">
                    <div class="itemSlide">
                        <div class="subSlide">
                            <div class="title-slide">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, minima?
                            </div>
                            <div class="desc-slide">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid beatae debitis modi pariatur quas rerum similique unde voluptates? Culpa debitis impedit in, labore, maxime minus necessitatibus nesciunt nihil optio placeat quas qui sint tempora? A a
                            </div>
                            <div class="btn-show-more">Xem thêm</div>
                        </div>
                    </div>
                    <div class="itemSlide">
                        <div class="subSlide">
                            <div class="title-slide">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, minima?
                            </div>
                            <div class="desc-slide">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid beatae debitis modi pariatur quas rerum similique unde voluptates? Culpa debitis impedit in, labore, maxime minus necessitatibus nesciunt nihil optio placeat quas qui sint tempora? A a
                            </div>
                            <div class="btn-show-more">Xem thêm</div>
                        </div>
                    </div>
                    <div class="itemSlide">
                        <div class="subSlide">
                            <div class="title-slide">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, minima?
                            </div>
                            <div class="desc-slide">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid beatae debitis modi pariatur quas rerum similique unde voluptates? Culpa debitis impedit in, labore, maxime minus necessitatibus nesciunt nihil optio placeat quas qui sint tempora? A a
                            </div>
                            <div class="btn-show-more">Xem thêm</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <a class="scrolldown js-scrollCt" data='.newsHomeWrap' href="">
{{--                    &lt;!&ndash; <span>Scroll Down</span> &ndash;&gt;--}}
                    <span>Cuộn<br/>xuống</span>
                    <img class="ar" src="./assets/fe/images/scrolldown-icon.png">
                </a>
    </section>

    <section class="newsHomeWrap">
        <div section=".newsHomeWrap" data="200" class="container paralax">
            <a href="/tin-tuc-su-kien.html">
                <h2 class="title">Tin tức sự kiện</h2>
            </a>
            <ul class="newsHomeList">

                <li>
                    <div class="itemNews">
                        <div class="img">
                            <div style="background: url('./assets/fe/images/post1.jpg') center; width: 370px; height: 250px; object-fit: cover"></div>
                            <img src="./assets/fe/images/post1.jpg" style="width: 370px; height: 250px;">
                        </div>
                        <div class="copy">
                            <h4>Tin Abcgroup</h4>
                            <h3>Từ bỏ ngay những thói quen có thể âm thầm tàn phá xương khớp</h3>
                            <p>09-01-2023</p>
                        </div>
                        <a class="link"
                           href="post.html"></a>
                    </div>
                </li>

                <li>
                    <div class="itemNews">
                        <div class="img">
                            <div style="background: url('./assets/fe/images/post2.jpg') center; width: 370px; height: 250px; object-fit: cover" ></div>
                            <img src="./assets/fe/images/post2.jpg" style="width: 370px; height: 250px;">
                        </div>
                        <div class="copy">
                            <h4>Tin Abcgroup</h4>
                            <h3>Điều trị bệnh lý cơ xương khớp bằng
                                phương pháp y học cổ truyền </h3>
                            <p>09-01-2023</p>
                        </div>
                        <a class="link"
                           href="post2.html"></a>
                    </div>
                </li>

                <li>
                    <div class="itemNews">
                        <div class="img">
                            <div style="background: url('./assets/fe/images/post3.jpg') center;  width: 370px; height: 250px; object-fit: cover"></div>
                            <img src="./assets/fe/images/post3.jpg" style="width: 370px; height: 250px;">
                        </div>
                        <div class="copy">
                            <h4>Tin Abcgroup</h4>
                            <h3>Điều trị bệnh lý cơ xương khớp theo y học cổ truyền
                            </h3>
                            <p>09-01-2023</p>
                        </div>
                        <a class="link"
                           href="post3.html"></a>
                    </div>
                </li>
            </ul>
            <div class="btn-wrap">
                <a class="btn-2" href="/tin-tuc-su-kien.html">Xem t&#7845;t c&#7843;</a>
            </div>
        </div>
    </section>

    <section class="cateHomeWrap">
        <div class="container">
            <div class="contentwrap">
                <div class="infoCate">
                    <div section=".cateHomeWrap" data="-200" class="paralax-hor">
                        <h2>Lorem ipsum<br/>dolor sit amet</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad, aperiam asperiores
                            dolore, dolores ipsum iure magni nam nostrum obcaecati quam qui quo, saepe sit tenetur?
                            Aperiam doloribus odio qui.</p>
                        <div class="dragMouse">
                            <img src="./assets/fe/images/mouse.png">
                            <p><img src="./assets/fe/images/ar-drag-l.png"><span>Trư&#7907;t đ&#7875; khám phá</span><img
                                        src="./assets/fe/images/ar-drag-r.png"></p>
                        </div>
                    </div>
                </div>
                <ul section=".cateHomeWrap" data="200" class="listCateHome paralax-hor">

                    <li>
                        <div class="item cate-1">
                            <div class="ico"><img src="./assets/fe/images/b.gif"></div>
                            <h2>Lorem ipsum<br/>dolor sit amet</h2>
                            <div class="content">
                                <div class="img" style="background: url('./assets/fe/images/hl1.jpg') center">
                                    <img src="./assets/fe/images/thumb-cate.gif">
                                </div>
                                <div class="copy">
                                    <p></p>
                                    <a class="btn-2" href="/linh-vuc-hoat-dong.html">Xem thêm</a>
                                </div>
                            </div>
                            <a class="link" href="/linh-vuc-hoat-dong.html"></a>
                        </div>
                    </li>
                    <li>
                        <div class="item cate-1">
                            <div class="ico"><img src="./assets/fe/images/b.gif"></div>
                            <h2>Lorem ipsum<br/>dolor sit amet</h2>
                            <div class="content">
                                <div class="img" style="background: url('./assets/fe/images/hl2.jpg') center">
                                    <img src="./assets/fe/images/thumb-cate.gif">
                                </div>
                                <div class="copy">
                                    <p></p>
                                    <a class="btn-2" href="/linh-vuc-hoat-dong.html">Xem thêm</a>
                                </div>
                            </div>
                            <a class="link" href="/linh-vuc-hoat-dong.html"></a>
                        </div>
                    </li>
                    <li>
                        <div class="item cate-1">
                            <div class="ico"><img src="./assets/fe/images/b.gif"></div>
                            <h2>Lorem ipsum<br/>dolor sit amet</h2>
                            <div class="content">
                                <div class="img" style="background: url('./assets/fe/images/hg1.jpg') center">
                                    <img src="./assets/fe/images/thumb-cate.gif">
                                </div>
                                <div class="copy">
                                    <p></p>
                                    <a class="btn-2" href="/linh-vuc-hoat-dong.html">Xem thêm</a>
                                </div>
                            </div>
                            <a class="link" href="/linh-vuc-hoat-dong.html"></a>
                        </div>
                    </li>
                    <li></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="shareholdersHomeWrap">
        <div class="container">
            <a href="/quan-he-co-dong">
                <h2 class="title">Lorem ipsum dolor sit amet</h2>
            </a>
            <div class="row">
                <div section=".shareholdersHomeWrap" data="-200" class="left paralax-hor">
                    <h3>Lorem ipsum dolor sit amet</h3>
                    <img src="./assets/fe/images/hg1.jpg">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus facere minus necessitatibus nihil
                    placeat quis recusandae sint veniam! Aliquam cumque debitis deserunt ex, id ipsum labore maxime nam
                    quia quos.
                </div>
                <div section=".shareholdersHomeWrap" data="-200" class="left paralax-hor">
                    <h3>Lorem ipsum dolor sit amet</h3>
                    <img src="./assets/fe/images/hl1.jpg">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus facere minus necessitatibus nihil
                    placeat quis recusandae sint veniam! Aliquam cumque debitis deserunt ex, id ipsum labore maxime nam
                    quia quos.
                </div>

            </div>

        </div>
    </section>


    <section class="historyPd">
        <div class="container">
            <div section=".historyPd" data="-200" class="img paralax-hor">
                <img src="./assets/fe/images/hg1.jpg">
            </div>
            <div section=".historyPd" data="200" class="copy paralax-hor">
                <div>
                    <h2>2022</h2>
                    <h3>Công nghệ <br> - Công nghiệp</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad amet aspernatur cupiditate dolore ea
                        enim id illum optio. Culpa ea facilis in incidunt, iusto nisi omnis quisquam suscipit temporibus
                        voluptas?</p>

                </div>
                <div>
                    <a class="btn-2" href="/linh-vuc-hoat-dong/cong-nghe-br-cong-nghiep">Xem thêm</a>

                </div>
            </div>
        </div>
    </section>
@endsection
