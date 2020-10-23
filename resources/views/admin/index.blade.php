@extends('admin.layout.body')

@section('body')
    <div class="box-header with-border">
        <h3 class="box-title">数据统计</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th>总单数</th>
                <th>已支付(单)</th>
                <th>已支付金额</th>
                <th>未支付(单)</th>
                <th>未支付金额</th>
            </tr>
            <tr>
                <td>{{ $group_pay_stauts['total'] ?? 0 }}</td>
                <td>{{ $group_pay_stauts['yes'] ?? 0 }}</td>
                <td>{{ $group_pay_stauts['total_yes'] ?? 0 }}</td>
                <td>{{ $group_pay_stauts['no'] ?? 0 }}</td>
                <td>{{ $group_pay_stauts['total_no'] ?? 0 }}</td>
            </tr>
        </table>

        <table class="table table-bordered" style="margin-top: 30px;">
            <tr>
                <th>支付类型</th>
                <th>已支付</th>
                <th>未支付</th>
            </tr>
            @if($group_pay_type)
                @foreach($group_pay_type as $type => $item)
                    <tr>
                        <th>{{ $pay_type_array[$type] }}</th>
                        <td>
                            {{ $item['yes'] ?? 0 }}
                        </td>
                        <td>
                            {{ $item['no'] ?? 0 }}
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>

        <table class="table table-bordered" style="margin-top: 30px;">
            <tr>
                <th>时间</th>
                <th>总单数</th>
                <th>已支付(单)</th>
                <th>已支付金额</th>
                <th>未支付(单)</th>
                <th>未支付金额</th>
            </tr>
            @if($group_day)
                @foreach($group_day as $day => $item)
                    <tr>
                        <td>{{ date('Y-m-d', strtotime($day)) }}</td>
                        <td>{{ $item['day_total'] ?? 0 }}</td>
                        <td>{{ $item['yes'] ?? 0 }}</td>
                        <td>{{ $item['total_yes'] ?? 0 }}</td>
                        <td>{{ $item['no'] ?? 0 }}</td>
                        <td>{{ $item['total_no'] ?? 0 }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
@endsection