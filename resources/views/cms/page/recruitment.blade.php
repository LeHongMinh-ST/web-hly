@extends('cms.layout.main')
@section('title')
    {{ __('Tuyển dụng') }} - {{__('Tập đoàn HLY')}}
@endsection

@section('js')
    <script>
        function setContentDetail({title, content, createdAt}) {
            $('#detail-title').html(title)
            $('#detail-content').html(content)
            $('#detail-created-at').html(createdAt)
        }

        $(document).ready(function () {
            const contentSubs = $('.content-sub');
            contentSubs.click(function () {
                $('.content-sub.active').removeClass('active');
                $(this).addClass('active')
                setContentDetail({
                    title: $(this).attr('data-title'),
                    content: $(this).attr('data-content'),
                    createdAt: $(this).attr('data-created-at'),
                })
            })

            if (contentSubs.length > 0) {
                const firstContentSub = $('.content-sub:first-child');
                firstContentSub.addClass('active');
                setContentDetail({
                    title: firstContentSub.attr('data-title'),
                    content: firstContentSub.attr('data-content'),
                    createdAt: firstContentSub.attr('data-created-at'),
                })
            }

        })
    </script>
@endsection

@section('content')
    <div class="recuitment-block">
        <section class="introWrap">
            <div class="container">
                <div class="breadcrumb" style="    margin: 20px 0px;">
                    <a href="/"><i class="fas fa-home"></i></a>
                    <i class="fas fa-chevron-right"></i>
                    <p>Tuyển dụng</p>
                </div>
                <div class="content stagger-up" style="padding-top: 0px;">
                    <div class="content stagger-up" style="padding-top: 0px;"></div>
                    <div class="banner">
                        <img src="{{asset('assets/fe/images/recruiment.png')}}" style="filter: brightness(50%); height: 500px; object-fit: cover; width: 100%">
                        <span style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 40px; font-weight: bold; color: white;">TUYỂN DỤNG</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-recuitment" >
            <div style="" class="wrapp-info">
                <div style="" class="context">
                    <h2 style="">Thông tin tuyển dụng</h2>
                    <p>Chúng tôi tin rằng trung thực là khởi đầu cần thiết cho mọi mối quan hệ tốt đẹp.</p>
                </div>
                <div style="" class="filter">
                    <form method="get" action="{{localized_route('cms.recruitment')}}" class="filter">
                        <select name="danh_muc" style="width: 30%;" id="recruitment-area-select">
                            <option value="tat-ca">Tất cả lĩnh vực</option>
                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->slug->content }}"
                                    @selected($category->slug->content == $categorySlug)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit">
                            Tìm kiếm
                        </button>
                    </form>
                </div>
            </div>

            <div class="wrapp-content">
                <div class="list-content-sub">
                @foreach ($recruitmentPosts as $recruitmentPost)
                    <div class="content-sub"
                         data-title="{{ $recruitmentPost->title }}"
                         data-created-at="{{ $recruitmentPost->created_at  }}"
                         data-content="{{ $recruitmentPost->content }}">
                        <div style="width: 30%; position: relative; ">
                            <img src="{{ $recruitmentPost->thumbnail }}" alt="" style="width: 100%; aspect-ratio: 8/6; object-fit: cover; "/>
                        </div>
                        <div style="width: 70%">
                            <h3 style="margin-bottom: 10px; font-weight: 600">{{ $recruitmentPost->title }}</h3>
                            <p class="line-clamp-2">
                                {!! Str::limit($recruitmentPost->content, $length = 50, $end = '...') !!}
                            </p>
                        </div>
                    </div>
                @endforeach
                </div>

                <div class="contentDetail" style="width: 60%; padding-left: 30px;">
                    <h3 style="margin-bottom: 20px;" id="detail-title"></h3>
                    <p style="margin-bottom: 20px;">{{count($recruitmentPosts) ? 'Ngày đăng' : ''}}
                        <span id="detail-created-at"></span>
                    </p>
                    <div id="detail-content"></div>
                </div>
            </div>
        </section>
    </div>

@endsection
