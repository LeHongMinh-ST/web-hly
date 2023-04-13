@extends('cms.layout.main')
@section('title')
    Giới thiệu - Tập đoàn HLY
@endsection
@section('content')
    <section class="introWrap" style="padding-top: 40px;">
        <div class="container">
            <div class="breadcrumb" style="margin: 20px 0;">
                <a href="/"><i class="fas fa-home"></i></a>
                <i class="fas fa-chevron-right"></i>
                <p><a href="/nha-dau-tu">Nhà đầu tư</a></p>
                <i class="fas fa-chevron-right"></i>
                <p>Thông tin nhà đầu tư</p>
            </div>
            <div class="content stagger-up" style="padding-top: 0px;">
                <div class="content stagger-up" style="padding-top: 0px;">
                    <div class="banner">
                        <img src="{{asset('assets/fe/images/introduce.jpg')}}" style="filter: brightness(50%); height: 500px; object-fit: cover; width: 100%">
                        <span style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 40px; font-weight: bold; color: white;">Thông tin nhà đầu tư</span>
                    </div>
                </div>
                <h2 class="title">{{$supplier['name']}}</h2>
                <div class="content">
                    {!! $supplier['introduction'] !!}
                </div>
            </div>
        </div>
    </section>
    @if(count(@$supplier['brands'] ?? []))
        <section id="block1" class="partnerWrap bgGray">
            <div class="container">
                <div section="#block1" data="-200" class="copy paralax-hor">
                    <h2 class="title">CÁC THƯƠNG HIỆU</h2>
                    </div>
                <ul section="#block1" data="200" class="crsPartner paralax-hor" style="display: flex; justify-content: space-evenly;">
                    @foreach($supplier->brands as $brand)
                        <li style="width: 180px; cursor: pointer" alt="{{$brand[1]}}">
                            <img style="width: 80%;" src="{{$brand[0]}}" alt="{{$brand[1]}}">
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif

@endsection
