@extends('web.layout.body')

@section('title', $system_config['base']['title'] ?? '')

@section('body')
    <div class="measureIndex" style="margin-bottom: 0.3rem;">
        <div class="nav">
            <ul>
                @if($product_class_list)
                    @foreach($product_class_list as $item)
                    <li>
                        <a href="{{ route('web.index', ['pid' => $item->id]) }}" class="{{ $pid == $item->id ? 'on' : '' }}">{{$item->name}}</a>
                    </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="list">
            <ul>
                @if($product_list)
                    @foreach($product_list as $value)
                        <li>
                            <a href="{{ route('web.product.index', ['product_id' => $value->id]) }}">
                                <h3>
                                    <img src="/images/measure/{{$value->identity}}Icon.png">{{$value->name}}
                                </h3>
                                <img  class="listimg" src="/images/measure/{{$value->identity}}.png?imageslim">
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
            <div style="clear: both;"></div>
        </div>
    </div>
@endsection