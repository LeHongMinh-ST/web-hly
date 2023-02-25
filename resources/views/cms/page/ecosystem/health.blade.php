@extends('cms.layout.main')
@section('title')
    Công nghệ - Công nghiệp - Công ty cổ phần xã hội HLY
@endsection
@section('content')
<section class="introWrap" style="padding-top: 40px;">
<div class="container">
    <div class="breadcrumb">
        <a href="/"><i class="fas fa-home"></i></a>
        <i class="fas fa-chevron-right"></i>
        <p>Hệ sinh thái</p>
        <i class="fas fa-chevron-right"></i>
        <p>Sức khỏe</p>
    </div>
        <div class="content stagger-up">
            <div class="banner">
                <img src="../assets/fe/images/hg1.jpg" style="height: 500px; object-fit: cover;">
            </div>
        </div>
    </div>
    @include('cms.components.ecosystem-info')
</section>
@endsection
