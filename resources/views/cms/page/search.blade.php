@extends('cms.layout.main')
@section('title')
    {{ __('Tìm kiếm') }} - {{__('Tập đoàn HLY')}}
@endsection

@section('content')
    <section class="searchWrap" style="margin: 50px auto">
        <div class="container">
            <div class="topSearch">
                <h2 class="title">{{__('KẾT QUẢ TÌM KIẾM')}}</h2>
                <form method="get" action="/tim-kiem">
                    <div class="inputSearh">
                        <input name="__RequestVerificationToken" type="hidden" value="s5mTm0JelOT3Y0XlG9v4owINni2ici6wHu7wNTf07uGHWS7MpYloWIF8HBzxXrVmAWBn943lZzxruLM6VayEXrQdyIm4H8S2KxqKeX8E48Q1" />
                        <input type="text" name="keyword" placeholder="Tìm ki&#7871;m" value="vin">
                        <input type="submit" value="Tìm kiếm">
                    </div>
                </form>
                <p>Có 594 {{__('kết quả tìm kiếm')}}</p>
            </div>
            <ul class="listSearch" style="margin: 0 auto; margin-top:50px; max-width: 1200px;">
                <li>
                    <div class="item">
                        <div class="img">
                            <div style="background: url('https://ircdn.vingroup.net/storage/Uploads/0_Tintuchoatdong/2020/Dec/VMMOP_01.jpg') center"></div>
                            <img src="https://vingroup.net/assets/images/news-gif.png">
                        </div>
                        <div class="copy">
                            <h4>Tin Bán l&#7867;</h4>
                            <h3>VINCOM RETAIL KHAI TRƯƠNG TRUNG TÂM THƯƠNG M&#7840;I TH&#7912; 80 </h3>
                            <span>11-12-2020</span>
                            <p></p>
                        </div>
                        <a class="link" href="/tin-tuc-su-kien/bai-viet/2269/vincom-retail-khai-truong-trung-tam-thuong-mai-thu-80"></a>
                    </div>
                </li>
                <li>
                    <div class="item">
                        <div class="img">
                            <div style="background: url('https://ircdn.vingroup.net/storage/Uploads/0_Tintuchoatdong/2022/Nov/E-lab 5.jpg') center"></div>
                            <img src="https://vingroup.net/assets/images/news-gif.png">
                        </div>
                        <div class="copy">
                            <h4>Tin Giáo d&#7909;c</h4>
                            <h3>VINUNI THÀNH L&#7852;P TRUNG TÂM KH&#7902;I NGHI&#7878;P E-LAB</h3>
                            <span>07-11-2022</span>
                            <p></p>
                        </div>
                        <a class="link" href="/tin-tuc-su-kien/bai-viet/2666/vinuni-thanh-lap-trung-tam-khoi-nghiep-e-lab"></a>
                    </div>
                </li>
                <li>
                    <div class="item">
                        <div class="img">
                            <div style="background: url('https://ircdn.vingroup.net/storage/Uploads/0_Tintuchoatdong/2022/Nov/Anh 1.jpg') center"></div>
                            <img src="https://vingroup.net/assets/images/news-gif.png">
                        </div>
                        <div class="copy">
                            <h4>Tin Du l&#7883;ch - Vui chơi - Gi&#7843;i trí</h4>
                            <h3>VINPEARL, VINWONDERS, VINPEARL GOLF BÙNG N&#7892; CHU&#7894;I S&#7920; KI&#7878;N Đ&#7858;NG C&#7844;P TH&#7870; GI&#7898;I CHÀO ĐÓN MÙA L&#7876; H&#7896;I L&#7898;N NH&#7844;T TRONG NĂM</h3>
                            <span>17-11-2022</span>
                            <p></p>
                        </div>
                        <a class="link" href="/tin-tuc-su-kien/bai-viet/2673/vinpearl-vinwonders-vinpearl-golf-bung-no-chuoi-su-kien-dang-cap-the-gioi-chao-don-mua-le-hoi-lon-nhat-trong-nam"></a>
                    </div>
                </li>
                <li>
                    <div class="item">
                        <div class="img">
                            <div style="background: url('https://ircdn.vingroup.net/storage/Uploads/0_Tintuchoatdong/2022/Dec/VinBase 2.jpg') center"></div>
                            <img src="https://vingroup.net/assets/images/news-gif.png">
                        </div>
                        <div class="copy">
                            <h4>Tin Công ngh&#7879;</h4>
                            <h3>VINBIGDATA RA M&#7854;T N&#7872;N T&#7842;NG TRÍ TU&#7878; NHÂN T&#7840;O ĐA NH&#7852;N TH&#7912;C VINBASE</h3>
                            <span>26-12-2022</span>
                            <p></p>
                        </div>
                        <a class="link" href="/tin-tuc-su-kien/bai-viet/2704/vinbigdata-ra-mat-nen-tang-tri-tue-nhan-tao-da-nhan-thuc-vinbase"></a>
                    </div>
                </li>
                <li>
                    <div class="item">
                        <div class="img">
                            <div style="background: url('https://ircdn.vingroup.net/storage/Uploads/0_Tintuchoatdong/2023/Mar/ACC.JPG') center"></div>
                            <img src="https://vingroup.net/assets/images/news-gif.png">
                        </div>
                        <div class="copy">
                            <h4>Tin Y t&#7871;</h4>
                            <h3>VINMEC ĐƯ&#7906;C ACC CÔNG NH&#7852;N LÀ TRUNG TÂM XU&#7844;T S&#7854;C V&#7872; TIM M&#7840;CH Đ&#7846;U TIÊN T&#7840;I CHÂU Á</h3>
                            <span>22-03-2023</span>
                            <p></p>
                        </div>
                        <a class="link" href="/tin-tuc-su-kien/bai-viet/2747/vinmec-duoc-acc-cong-nhan-la-trung-tam-xuat-sac-ve-tim-mach-dau-tien-tai-chau-a"></a>
                    </div>
                </li>
            </ul>
            <div class="paging"><span>1</span><a  target="_self" href="/tim-kiem?keyword=vin&page=2" class="">2</a><a  target="_self" href="/tim-kiem?keyword=vin&page=3" class="">3</a><a  target="_self" href="/tim-kiem?keyword=vin&page=4" class="">4</a><a  target="_self" href="/tim-kiem?keyword=vin&page=5" class="">5</a><a  target="_self" href="/tim-kiem?keyword=vin&page=2" class="next "><i class="fas fa-chevron-right"></i></a><a  target="_self" href="/tim-kiem?keyword=vin&page=119" class="last "><i class="fas fa-angle-double-right"></i></a></div>    </div>
    </section>
@endsection
