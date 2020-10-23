@extends('web.layout.body')

@section('title')
   佣金提现记录
@endsection

@section('css')
    <style>
        body{
            background: #ebebeb;
        }
    </style>
@endsection

@section('body')
    <div class="budgetMain rankingMain">
        <div class="top">
            <div class="title text-align-center">可提现金额(元)</div>
            <div class="balance text-align-center">{{ $user_info->commission }}</div>
            <a href="{{ route('web.user.cash') }}">
                <div class="buy">我要提现</div>
            </a>
        </div>
        <div class="list">
            <div class="title">
                <p class="left">提现明细</p>
            </div>
            <ul>
                @foreach($list as $item)
                    <li>
                        <div class="left">
                            <p class="body" style="font-size: 0.28rem;color: #666666;">{{ date('Y-m-d H:i:s', strtotime($item->pay_time)) }}</p>
                        </div>
                        <div class="right" style="color: #fe5200;">-{{ $item->total_fee }}元</div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
