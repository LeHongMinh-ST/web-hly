@extends('cms.layout.main')
@section('title')
    {{__('Nhà đầu tư')}} - {{__('Tập đoàn HLY')}}

@endsection

@section('content')
    <div class="inventorsWrap" style="padding: 0px;">
        <div class="container" style="margin-top: 30px;">
            <div class="breadcrumb" style="margin: 20px 0;">
                        <a href="/"><i class="fas fa-home"></i></a>
                        <i class="fas fa-chevron-right"></i>
                        <p>Nhà đầu tư</p>
                    </div>
                    <div class="content stagger-up" style="padding-top: 0px;">
                        <div class="content stagger-up" style="padding-top: 0px;">
                        <div class="banner">
                            <img src="{{asset('assets/fe/images/investor.jpg')}}" style="filter: brightness(50%); height: 500px; object-fit: cover; width: 100%">
                            <span style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 40px; font-weight: bold; color: white;">NHÀ ĐẦU TƯ</span>
                        </div>
                    </div>
            <ul class="listCateInvestor" >
                <div class="item cate-1">
                    <h2>ĐẠI HỘI CỔ ĐÔNG</h2>
                    <div class="content-top">
                        <p>
                            <img src="{{asset('assets/fe/images/ar-g.png')}}" alt="">
                            Nghị quyết và biên bản đại hội cổ đông 2022
                        </p>
                        <p>
                            <img src="{{asset('assets/fe/images/ar-g.png')}}" alt="">
                            Thông báo thay đổi nhân sự Hội đồng quản trị
                        </p>
                    </div>
                    <div class="content">
                        <div class="img" style="background: url({{asset('assets/fe/images/introduce.jpg')}}) center">
                            <img src="{{asset('assets/fe/images/thumb-cate.gif')}}">
                        </div>
                        <div class="copy">
                            <!-- <p>- Sản xuất thuốc</p> -->
                            <a class="btn-2" href="{{localized_route('cms.fieldOperation')}}">{{ __('Xem thêm') }}</a>
                        </div>
                    </div>
                    <a class="link" href="{{localized_route('cms.fieldOperation')}}"></a>
                </div>
                <div class="item cate-3">
                    <h2>CÔNG BỐ THÔNG TIN</h2>
                    <div class="content-top">
                        <p>
                            <img src="{{asset('assets/fe/images/ar-g.png')}}" alt="">
                            Báo cáo tài chính hợp nhất quý 3 năm 2022
                        </p>
                        <p>
                            <img src="{{asset(assets/fe/images/ar-g.png')}}" alt="">
                           Báo cáo kết quả kinh doanh quý 3 năm 2022
                        </p>
                    </div>
                    <div class="content">
                    <div class="img" style="background: url({{asset('assets/fe/images/hl1.jpg')}}) center">
                            <img src="{{asset('assets/fe/images/thumb-cate.gif')}}">
                        </div>
                        <div class="copy">
                            <!-- <p>- Du lịch nghỉ dưỡng</p>
                            <p>- Dưỡng sinh</p> -->
                            <a class="btn-2" href="{{localized_route('cms.fieldOperation')}}">{{ __('Xem thêm') }}</a>
                        </div>
                    </div>
                    <a class="link" href="{{localized_route('cms.fieldOperation')}}"></a>
                </div>
                <div class="item cate-3">
                        <h2>QUẢN TRỊ CÔNG TY</h2>
                    <div class="content-top">
                        <p>
                            <img src="{{asset('assets/fe/images/ar-g.png')}}" alt="">
                            Quy chế công bố thông tin tại công ty FPT
                        </p>
                        <p>
                            <img src="{{asset('assets/fe/images/ar-g.png')}}" alt="">
                            Điều lệ công ty
                        </p>
                        <p>
                            <img src="{{asset('assets/fe/images/ar-g.png')}}" alt="">
                            Quy chế quản trị
                        </p>
                    </div>
                        <div class="content">
                            <div class="img" style="background: url({{asset('assets/fe/images/hg1.jpg')}}) center">
                                <img src="{{asset('assets/fe/images/thumb-cate.gif')}}">
                            </div>
                            <div class="copy text-white">
                                <a class="btn-2" href="{{localized_route('cms.fieldOperation')}}">{{ __('Xem thêm') }}</a>
                            </div>
                        </div>
                        <a class="link" href="{{localized_route('cms.fieldOperation')}}"></a>
                    </div>
            </ul>
        </div>
        <section class="shareholdersHomeWrap">
        <div class="container">
            <a href="/quan-he-co-dong">
                <h2 class="title">NHÀ ĐẦU TƯ</h2>
            </a>
            <div class="row">
                <div class="relationshipShareholder">
                    @forelse (@$suppliers ?? [] as $supplier)
                        <div section=".shareholdersHomeWrap" data="-200" class="left paralax-hor" style="width: 33%;">
                            <a href="{{localized_route('cms.info.forCustomers', $supplier->slug->content)}}">
                                <h3>{{$supplier->name}}</h3>
                                <img style="aspect-ratio: 16 / 9; width: 100%; object-fit: cover" src="{{ $supplier->thumbnail }}" alt="{{$supplier->name}}">
                                <p class="line-clamp-3">
                                    {{ $supplier->description }}
                                </p>
                            </a>
                        </div>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
    </section>
    @include('cms.components.investorNews', ['posts' => $posts])

    </div>
    @if(count(@$supplierTops ?? []))
        @include('cms.components.partners')
    @endif
@endsection
@section('js')
            <script>
              $('.partnersWrap').slick({
                dots: true
              })

              $('.relationshipShareholder').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3,
                autoplay: true,
                dots: true,
                responsive: [
                  {
                    breakpoint: 800,
                    settings: {
                      slidesToShow: 2,
                      slidesToScroll: 2,
                    }
                  },
                  {
                    breakpoint: 500,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                    }
                  }
                ]
              });
            </script>
@endsection
