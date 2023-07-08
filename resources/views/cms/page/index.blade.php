@extends('cms.layout.main')
@section('title')
    Trang chủ - Tập đoàn HLY
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
            <div class="item"
                 style="background: url({{asset('assets/fe/images/hl2.jpg')}}) center no-repeat; box-shadow: rgb(14 100 71 / 72%) 50vw 0 70vw 0 inset;">
                <div class="copy">
                    <h2>{!! __("Rừng xanh <br> hạnh phúc") !!} </h2>
                </div>
                <div class="slideBanner" style="background-color: white;">
                    @forelse($featuredPosts as $post)
                        <div class="" style="">
                            <div class="subSlide">
                                <div style="display: flex; flex-direction: column; gap: 10px;">
                                    <div class="title-slide line-clamp-2" title="{{$post->title}}">
                                        {{$post->title}}
                                    </div>
                                    <div class="desc-slide line-clamp-2">
                                        {{$post->description}}
                                    </div>
                                    <img class="img " src="{{$post->thumbnail}}"
                                         style="width: 100%; height: 200px; object-fit: cover; margin: 0 auto;"/>
                                    @if(@$post->slug)
                                        <a href="{{ localized_route('cms.news.post', ['slug' => @$post->slug?->content]) }}"
                                           class="btn-show-more">{{ __('Xem thêm') }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div></div>
                    @endforelse
                </div>
            </div>
        </div>
        <a class="scrolldown js-scrollCt" data='.newsHomeWrap' href="">
            {{--                    &lt;!&ndash; <span>Scroll Down</span> &ndash;&gt;--}}
            <span>{{ __('Cuộn') }}<br/>{{ __('xuống') }}</span>
            <img class="ar" src=" {{ asset('assets/fe/images/scrolldown-icon.png') }}">
        </a>
    </section>

    <section class="newsHomeWrap">
        <div section=".newsHomeWrap" data="200" class="container paralax">
            <a href="{{ localized_route('cms.news') }}">
                <h2 class="title">{{ __('Tin tức sự kiện') }}</h2>
            </a>
            <div class="newsHomeList" style="display: flex; gap: 20px">
            @forelse($posts as $post)
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
                        @if(@$post->slug)
                            <a class="link"
                               href="{{ localized_route('cms.news.post', ['slug' => @$post->slug?->content]) }}"></a>
                        @endif
                    </div>
                    <!-- </div> -->
                @empty
                    <div></div>
                @endforelse
            </div>
            <div class="btn-wrap">
                <a class="btn-2" href="{{ localized_route('cms.news') }}">{{ __('Xem thêm') }}</a>
            </div>
        </div>
    </section>

    <section class="cateHomeWrap">
        <div class="container">
            <div class="contentwrap">
                <div class="infoCate" style="top: 28%;">
                    <div section=".cateHomeWrap" data="-200" class="paralax-hor">
                        <h2>{!! trans('cms.home_title_1') !!}</h2>
                        <p>{{ trans('cms.home_note_1') }}</p>
                        <div class="dragMouse">
                            <img src="{{ asset('assets/fe/images/mouse.png') }}">
                            <p>
                                <img src="{{ asset('assets/fe/images/ar-drag-l.png') }}"><span>{{ __('Trượt để khám phá') }}</span><img
                                        src="{{ asset('assets/fe/images/ar-drag-r.png') }}"></p>
                        </div>
                    </div>
                </div>
                <ul section=".cateHomeWrap" data="200" class="listCateHome paralax-hor">
                    <li>
                        <div class="item cate-1">
                            <div class="ico"><img src="{{ asset('assets/fe/images/b.gif') }}"></div>
                            <h2>{{ __('CÔNG NGHỆ XANH') }}</h2>
                            <div class="content">
                                <div class="img" style="background: url({{asset('assets/fe/images/hl1.jpg')}}) center">
                                    <img src="{{asset('assets/fe/images/thumb-cate.gif')}}">
                                </div>
                                <div class="copy">
                                    <!-- <p>- Sản xuất thuốc</p> -->
                                    <a class="btn-2"
                                       href="{{localized_route('cms.fieldOperation') }}">{{ __('Xem thêm') }}</a>
                                </div>
                            </div>
                            <a class="link" href="{{localized_route('cms.fieldOperation') }}"></a>
                        </div>
                    </li>
                    <li>
                        <div class="item cate-3">
                            <div class="ico"><img src="{{ asset('assets/fe/images/b.gif') }}"></div>
                            <h2>{{ __('THƯƠNG MẠI DỊCH VỤ') }}</h2>
                            <div class="content">
                                <div class="img"
                                     style="background: url({{ asset('assets/fe/images/hl2.jpg') }}) center">
                                    <img src="{{ asset('assets/fe/images/thumb-cate.gif') }}">
                                </div>
                                <div class="copy">
                                    <!-- <p>- Du lịch nghỉ dưỡng</p>
                                    <p>- Dưỡng sinh</p> -->
                                    <a class="btn-2"
                                       href="{{localized_route('cms.fieldOperation.serviceCommerce')}}">{{ __('Xem thêm') }}</a>
                                </div>
                            </div>
                            <a class="link" href="{{localized_route('cms.fieldOperation.serviceCommerce')}}"></a>
                        </div>
                    </li>
                    <li>
                        <div class="item cate-3">
                            <div class="ico"><img src="{{asset('assets/fe/images/b.gif')}}"></div>
                            <h2>{{ __('THỰC PHẨM XANH') }}</h2>
                            <div class="content">
                                <div class="img" style="background: url({{ asset('assets/fe/images/hg1.jpg') }}) center">
                                    <img src="{{asset('assets/fe/images/thumb-cate.gif')}}">
                                </div>
                                <div class="copy text-white">
                                    <a class="btn-2"
                                       href="{{localized_route('cms.fieldOperation.greenFood')}}">{{ __('Xem thêm') }}</a>
                                </div>
                            </div>
                            <a class="link" href="{{localized_route('cms.fieldOperation.greenFood')}}"></a>
                        </div>
                    </li>
                    <li>
                        <div class="item cate-3">
                            <div class="ico"><img src="{{asset('assets/fe/images/b.gif')}}"></div>
                            <h2>{{ __('NAM Y VÀ CHĂM SÓC SỨC KHỎE') }}</h2>
                            <div class="content">
                                <div class="img" style="background: url({{asset('assets/fe/images/hg1.jpg')}} center">
                                    <img src="{{asset('assets/fe/images/thumb-cate.gif')}}">
                                </div>
                                <div class="copy text-white">
                                    <a class="btn-2"
                                       href="{{localized_route('cms.fieldOperation.medicineHealthcare')}}">{{ __('Xem thêm') }}</a>
                                </div>
                            </div>
                            <a class="link" href="{{ localized_route('cms.fieldOperation.medicineHealthcare') }}"></a>
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
