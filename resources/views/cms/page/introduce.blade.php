@extends('cms.layout.main')
@section('title')
    {{ __('Giới thiệu') }} - {{__('Tập đoàn HLY')}}
@endsection
@section('content')
    <section class="introWrap" style="padding-top: 40px;">
        <div class="container">
            <div class="breadcrumb" style="margin: 20px 0;">
                <a href="/"><i class="fas fa-home"></i></a>
                <i class="fas fa-chevron-right"></i>
                <p>{{ __('Giới thiệu công ty') }}</p>
            </div>
            <div class="content stagger-up" style="padding-top: 0;">
                <div class="content stagger-up" style="padding-top: 0;">
                    <div class="banner">
                        <img src="{{asset('assets/fe/images/introduce.jpg')}}"
                             style="filter: brightness(50%); height: 500px; object-fit: cover; width: 100%">
                        <span
                            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 40px; font-weight: bold; color: white;">{{ __('GIỚI THIỆU CÔNG TY') }}</span>
                    </div>
                </div>
                <h2 class="title">{{__("CÔNG TY CỔ PHẦN XÃ HỘI HLY")}}</h2>
                <p style="text-align: justify; font-size: 18px;">
                    {{trans('cms.about_note_1')}}
                </p>
                <p style="text-align: justify; font-size: 18px;">{{trans('cms.about_company_include')}}
                    :</p>
                <p style="text-align: justify; font-size: 18px;">- {{__("Công nghệ xanh")}}
                    <br/>- {{__("Thương mại Dịch vụ")}}
                    <br/>- {{__("Thực phẩm xanh")}}
                    <br/>- {{__("Nam y và Chăm sóc sức khỏe")}}</p>
                <p style="text-align: justify; font-size: 18px;">{{trans('cms.about_note_2')}}</p>
            </div>
        </div>
    </section>
    <section id="itemPageWrap" class="itemPageWrap">
        <div class="container">
            <ul>
                <li>
                    <div>
                        <h3>{!! trans('cms.about_title_1') !!}</h3>
                        <p>{{trans('cms.about_title_1_note')}}</p>
                        <a class="btn-2" href="/gioi-thieu/doi-ngu-nhan-su">
                            {{ __('Xem chi tiết') }}
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <h3>{!! trans('cms.about_title_2') !!}</h3>
                        <p>{{trans('cms.about_title_2_note')}}</p>
                        <a class="btn-2" href="/gioi-thieu/tam-nhin-su-menh-va-gia-tri-cot-loi">
                            {{ __('Xem chi tiết') }}
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <h3>{!! trans('cms.about_title_3') !!}</h3>
                        <p>{{trans('cms.about_title_3_note')}}</p>

                        <a class="btn-2" href="/gioi-thieu/doi-voi-khach-hang">
                            {{ __('Xem chi tiết') }}
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section id="block1" class="partnerWrap bgGray">

        <div class="container">
            <div section="#block1" data="-200" class="copy paralax-hor">
                <h2 class="title">{{ __('CÁC THƯƠNG HIỆU') }}</h2>
                <p>{{trans('cms.about_brand_note')}}</p>
            </div>
            <ul section="#block1" data="200" class="crsPartner paralax-hor"
                style="display: flex; justify-content: space-evenly;">
                <li style="width: 180px;">
                    <img style="width: 80%;" src="{{ asset('assets/fe/images/logo.png') }}" alt="logo">
                    <img style="width: 80%;" src="{{ asset('assets/fe/images/logo.png') }}" alt="logo">
                </li>
                <li style="width: 180px;">
                    <img style="width: 80%;" src="{{ asset('assets/fe/images/logo.png') }}" alt="logo">
                    <img style="width: 80%;" src="{{ asset('assets/fe/images/logo.png') }}" alt="logo">
                </li>
                <li style="width: 180px;">
                    <img style="width: 80%;" src="{{ asset('assets/fe/images/logo.png') }}" alt="logo">
                    <img style="width: 80%;" src="{{ asset('assets/fe/images/logo.png') }}" alt="logo">
                </li>
                <li style="width: 180px;">
                    <img style="width: 80%;" src="{{ asset('assets/fe/images/logo.png') }}" alt="logo">
                    <img style="width: 80%;" src="{{ asset('assets/fe/images/logo.png') }}" alt="logo">
                </li>
                </li>
            </ul>
        </div>
    </section>
@endsection
