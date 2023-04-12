<h2 class="title" style="text-align: center; padding-bottom: 0px">{{__('NHÀ ĐẦU TƯ TOP')}}</h2>
<section class="partnersWrap" section=".partners">
        @foreach($supplierTops as $supplierTop)
        <div class="container contentWrapPartners">
            <div class="flex">
                <div class="content-leader">
                    <img class="imageLeader" src="{{asset('assets/fe/images/man.png')}}">
                    <img class="lineSoft" src="{{asset('assets/fe/images/linesoft.png')}}">
                </div>
                <div class="content-list-partner">
                    <a style="color: inherit;" href="{{localized_route('cms.info.forCustomers', $supplierTop->slug->content)}}">
                        <h1 class="title-partner">{{$supplierTop->name}}</h1>
                    </a>
                    <hr>
                    <div class="description-partner line-clamp-4">
                        {{$supplierTop->description}}
                    </div>
                    <div class="list-partners pc">
                        @forelse(@$supplierTop->brands ?? [] as $brand)
                            <div class="item-partner">
                                <img src="{{$brand[0]}}" alt="{{$brand[1]}}">
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        @endforeach

</section>
