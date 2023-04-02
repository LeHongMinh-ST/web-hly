@extends('cms.layout.main')
@section('title')
    Trang chủ - Tập đoàn Abc
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('/assets/fe/js/libraries/canvasjs.stock.min.js') }}"></script>
<script>
  // data for the chart
  const data = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June'],
    datasets: [{
      label: 'Sales',
      backgroundColor: ['#0000ff7d', '#ff000070', '#00800078', '#80008078', '#ffa50070', '#ffff0075'],
      borderColor: 'black',
      borderWidth: 1,
      data: [12, 19, 3, 5, 2, 3]
    }]
  };

  // options for the chart
  const options = {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  };

  // create the chart
  const ctx = document.getElementById('myChart').getContext('2d');
  const myChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: options
  });
</script>
@endsection
@section('content')

    <section id="bannerHome">
        <script src="https://www.youtube.com/player_api"></script>
        <div class="bannerHome slider stagger-up">
            <div class="item" style="background: url('./assets/fe/images/hl2.jpg') center no-repeat; box-shadow: rgb(14 100 71 / 72%) 50vw 0 70vw 0 inset;">
                <div class="copy">
                    <h2>{!! __("Rừng xanh <br> hạnh phúc") !!} </h2>
                </div>
                <div class="slideBanner" style="background-color: white;">
                    @foreach($featuredPosts as $post)
                    <div class="" style="">
                        <div class="subSlide">
                            <div style="display: flex; flex-direction: column; gap: 10px;">
                            <div class="title-slide line-clamp-2" title="{{$post->title}}">
                                {{$post->title}}
                            </div>
                            <div class="desc-slide line-clamp-2" >
                                {{$post->description}}
                            </div>
                            <img class="img " src="{{$post->thumbnail}}" style="width: 100%; height: 200px; object-fit: cover; margin: 0 auto;" />
                            <div class="btn-show-more">Xem thêm</div>
                        </div>
                        </div>
                    </div>
                    @endforeach
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
                <h2 class="title">{{ __('Tin tức sự kiện') }}</h2>
            </a>
            <div class="newsHomeList" style="display: flex; gap: 20px">
                @php($i=0)
                @foreach($posts as $post)
                @if($i < 4)
                <!-- <div> -->
                    <div class="itemNews" style="width: 25%; padding: 0 10px">
                        <div class="img">
                            <div style="background: url('{{ $post->thumbnail }}') center; width: 100%; height: 250px; object-fit: cover"></div>
                            <img src="{{ $post->thumbnail }}" style="width: 100%; height: 250px;">
                        </div>
                        <div class="copy">
                            <h4>Tin {{@$post->categories->name ?? ""}}</h4>
                            <h3>{{$post->title}}</h3>
                            <p>{{date_format(date_create($post->created_at), 'd-m-Y')}}</p>
                        </div>
                        <a class="link" href="/tin-tuc-su-kien/bai-viet/{{$post->slug?->content}}"></a>
                    </div>
                <!-- </div> -->
                    @endif
                    @php($i++)
                @endforeach
            </div>
            <div class="btn-wrap">
                <a class="btn-2" href="/tin-tuc-su-kien.html">Xem t&#7845;t c&#7843;</a>
            </div>
        </div>
    </section>

    <section class="cateHomeWrap">
        <div class="container">
            <div class="contentwrap" >
                <div class="infoCate" style="top: 28%;">
                    <div section=".cateHomeWrap" data="-200" class="paralax-hor">
                        <h2>LĨNH VỰC<br/>TIÊN PHONG</h2>
                        <p>Với mong muốn đem đến cho thị trường những sản phẩm - dịch vụ theo tiêu chuẩn quốc tế và những trải nghiệm hoàn toàn mới về phong cách sống hiện đại,
                            ở bất cứ lĩnh vực nào HLYgroup cũng chứng tỏ vai trò tiên phong, dẫn dắt sự thay đổi xu hướng tiêu dùng.</p>
                        <div class="dragMouse">
                            <img src="./assets/fe/images/mouse.png">
                            <p><img src="./assets/fe/images/ar-drag-l.png"><span>Trư&#7907;t đ&#7875; khám phá</span><img
                                        src="./assets/fe/images/ar-drag-r.png"></p>
                        </div>
                    </div>
                </div>
                <ul section=".cateHomeWrap" data="200" class="listCateHome paralax-hor" >
                    <li>
                        <div class="item cate-1">
                            <div class="ico"><img src="./assets/fe/images/b.gif"></div>
                            <h2>CÔNG NGHỆ XANH</h2>
                            <div class="content">
                                <div class="img" style="background: url('./assets/fe/images/hl1.jpg') center">
                                    <img src="./assets/fe/images/thumb-cate.gif">
                                </div>
                                <div class="copy">
                                    <!-- <p>- Sản xuất thuốc</p> -->
                                    <a class="btn-2" href="/linh-vuc-hoat-dong">Xem thêm</a>
                                </div>
                            </div>
                            <a class="link" href="/linh-vuc-hoat-dong"></a>
                        </div>
                    </li>
                    <li>
                        <div class="item cate-3">
                            <div class="ico"><img src="./assets/fe/images/b.gif"></div>
                            <h2>THƯƠNG MẠI DỊCH VỤ</h2>
                            <div class="content">
                                <div class="img" style="background: url('./assets/fe/images/hl2.jpg') center">
                                    <img src="./assets/fe/images/thumb-cate.gif">
                                </div>
                                <div class="copy">
                                    <!-- <p>- Du lịch nghỉ dưỡng</p>
                                    <p>- Dưỡng sinh</p> -->
                                    <a class="btn-2" href="/linh-vuc-hoat-dong">Xem thêm</a>
                                </div>
                            </div>
                            <a class="link" href="/linh-vuc-hoat-dong"></a>
                        </div>
                    </li>
                    <li>
                        <div class="item cate-3">
                            <div class="ico"><img src="./assets/fe/images/b.gif"></div>
                            <h2>THỰC PHẨM XANH</h2>
                            <div class="content">
                                <div class="img" style="background: url('./assets/fe/images/hg1.jpg') center">
                                    <img src="./assets/fe/images/thumb-cate.gif">
                                </div>
                                <div class="copy text-white">
                                    <a class="btn-2" href="/linh-vuc-hoat-dong">Xem thêm</a>
                                </div>
                            </div>
                            <a class="link" href="/linh-vuc-hoat-dong"></a>
                        </div>
                    </li>
                    <li>
                        <div class="item cate-3">
                            <div class="ico"><img src="./assets/fe/images/b.gif"></div>
                            <h2>NAM Y VÀ CHĂM SÓC SỨC KHỎE</h2>
                            <div class="content">
                                <div class="img" style="background: url('./assets/fe/images/hg1.jpg') center">
                                    <img src="./assets/fe/images/thumb-cate.gif">
                                </div>
                                <div class="copy text-white">
                                    <a class="btn-2" href="/linh-vuc-hoat-dong">Xem thêm</a>
                                </div>
                            </div>
                            <a class="link" href="/linh-vuc-hoat-dong"></a>
                        </div>
                    </li>
                    <li></li>
                </ul>
            </div>
        </div>
    </section>
    @include('cms.components.ecosystem')

    @include('cms.components.stockChart')
@endsection
