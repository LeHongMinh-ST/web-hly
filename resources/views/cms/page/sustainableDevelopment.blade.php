@extends('cms.layout.main')
@section('title')
    {{__('Nhà đầu tư')}} - {{__('Tập đoàn HLY')}}
@endsection
@section('js')

@endsection
@section('content')
    <div style="max-width: 1700px; width: 100%; margin: 0 auto;">
        <div style="width: 100%; ">
        <div class="breadcrumb" style="margin: 20px 0 20px 0">
            <a href="/"><i class="fas fa-home"></i></a>
            <i class="fas fa-chevron-right"></i>
            <p>{{__("Phát triển bền vững")}}</p>
        </div>
            <div class="content stagger-up">
                <div class="banner">                  
                    <img src="{{asset('assets/fe/images/contact.jpg')}}" style="filter: brightness(50%); height: 500px; object-fit: cover; width: 100%">
                    <span style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 40px; font-weight: bold; color: white;">{{__("PHÁT TRIỂN BỀN VỮNG")}}</span>
                </div>
            </div>
        </div>
        </div>
        <div class="container-sustainable-development" >
            @for ($i = 0; $i < 3; $i++)
            <div class="wrap-info" style="">
                <div class="poster" style="">
                    <img src="{{asset('assets/fe/images/contact.jpg')}}" alt="" style="">
                    <p class="title" >{{__("DOANH NGHIỆP")}}</p>
                </div>
                <div class="content">
                {{trans('cms.about_brand_introduce')}}
                </div>
            </div>
            @endfor
        </div>
    </div>
@endsection
