<section class="newsHomeWrap">
    <div class="container paralax">
        <a href="/tin-tuc-su-kien.html">
            <h2 class="title" style="text-align: center">Tin tức nhà đầu tư</h2>
        </a>
        <div class="newsHomeList" style="display: flex; gap: 20px">
            @php($i=0)
            @foreach($posts as $post)
                @if($i < 4)
                    <!-- <div> -->
                    <div class="itemNews">
                        <div class="img">
                            <div class="thumb" style="background: url('{{ $post->thumbnail }}') center"></div>
                            <img src="{{ $post->thumbnail }}" >
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
    </div>
</section>

