<form action="" method="post">
    <input type="hidden" name="product_id" value="{{$product_id}}">
    <ul>
        <li>
            <span class="text">姓名</span>
            <span>
                <input id="username" name="realname" class="input" type="text" placeholder="请输入姓名">
            </span>
        </li>
        <li>
            <span class="text">性别</span>
            <span>
                <label class="radio">
                    <input name="sex" type="radio" value="1" checked="checked"/>
                    <span class="radio-button">男</span>
                </label>
                <label class="radio">
                    <input name="sex" type="radio" value="2"/>
                    <span class="radio-button">女</span>
                </label>
            </span>
        </li>
        <li>
            <span class="text">出生日期</span>
            <span>
                <input type="text" class="Js_date animated input" id="birthday" data-input-id="b_input"
                       data-type="0" data-date="1990-01-01" placeholder="请选择(必填)">
                <input type="hidden" name="birthday" id="b_input" value="" data-date="1990-01-01">
            </span>
        </li>
        <li>
            <span class="text">出生时辰</span>
            <span>
                <select class="select" name="birthtime">
                    <option value="00">早子时(00:00-00:59)</option>
                    <option value="01">丑时(01:00-02:59)</option>
                    <option value="03">寅时(03:00-04:59)</option>
                    <option value="05">卯时(05:00-06:59)</option>
                    <option value="07">辰时(07:00-08:59)</option>
                    <option value="09">巳时(09:00-10:59)</option>
                    <option value="11">午时(11:00-12:59)</option>
                    <option value="13">未时(13:00-14:59)</option>
                    <option value="15">申时(15:00-16:59)</option>
                    <option value="17">酉时(17:00-18:59)</option>
                    <option value="19">戌时(19:00-20:59)</option>
                    <option value="21">亥时(21:00-22:59)</option>
                    <option value="23">晚子时(23:00-23:59)</option>
                </select>
            </span>
        </li>
    </ul>
    @if(isset($is) && $is == 'other')
        @include('web.layout.other_form')
    @endif
</form>