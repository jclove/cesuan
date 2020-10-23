@extends('web.layout.body')

@section('title')
    我的测算
@endsection

@section('css')
    <style>
        body{
            background: #ebebeb;
        }
    </style>
@endsection

@section('body')
    <div class="budgetMain">
        <div class="list">
            <ul>
                @foreach($list as $item)
                    <li>
                        <div class="left">
                            <p class="body">{{ $item->product->name }}</p>
                            <p class="date">{{ date('Y-m-d H:i:s', strtotime($item->pay_time)) }}</p>
                        </div>
                        <a href="{{ route('web.product.show', ['order_id' => $item->id]) }}" class="right" style="font-size: 0.28rem;">查看</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
