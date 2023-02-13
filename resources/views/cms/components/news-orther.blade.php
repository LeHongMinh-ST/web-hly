<section section=".newsHomeWrap" data="200" class="newsHomeWrap paralax">
    <div class="container">
        <h2 class="title">Tin t&#7913;c khác</h2>
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
                            <h4>Tin {{$post->categories[0]->name}}</h4>
                            <h3>{{$post->title}}</h3>
                            <p>{{date_format(date_create($post->created_at), 'd-m-Y')}}</p>
                        </div>
                        <a class="link" href="/tin-tuc-su-kien/bai-viet/{{$post->slug->content}}"></a>
                    </div>
                <!-- </div> -->
                    @endif
                    @php($i++)
                @endforeach
            </div>
    </div>
</section>
