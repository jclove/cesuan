<div class="hot marginT30">
    <div class="top">热门测算</div>
    <ul>
        @if($hot_list)
            @foreach($hot_list as $key => $item)
                <li>
                    <a href="{{ route('web.product.index', ['product_id' => $item->product_id]) }}">
                        <img class="img_ad" src="/images/measure/hot/{{$item->product->identity}}.png">
                        <h3>{{ $item->product->alias }}</h3>
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
    <div class="clear"></div>
</div>
<script>