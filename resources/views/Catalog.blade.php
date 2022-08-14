<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<style>
    body {
        background-color: powderblue;
    }

    h1 {
        color: blue;
    }

    p {
        color: red;
    }

    /* скрываем чекбоксы и блоки с содержанием */
    .hide,
    .hide + label ~ div {
        display: none;
    }

    /* вид текста label */
    .hide + label {
        margin: 0;
        padding: 0;
        color: green;
        cursor: pointer;
        display: inline-block;
    }

    /* вид текста label при активном переключателе */
    .hide:checked + label {
        color: red;
        border-bottom: 0;
    }

    /* когда чекбокс активен показываем блоки с содержанием  */
    .hide:checked + label + div {
        display: block;
        background: #efefef;
        -moz-box-shadow: inset 3px 3px 10px #7d8e8f;
        -webkit-box-shadow: inset 3px 3px 10px #7d8e8f;
        box-shadow: inset 3px 3px 10px #7d8e8f;
        margin-left: 1px;
        padding: 1px;
    }

    /* анимация при появлении скрытых блоков */


    .hide + label:before {
        background-color: #1e90ff;
        color: #fff;
        content: "\002B";
        display: block;
        float: left;
        font-size: 14px;
        font-weight: bold;
        height: 16px;
        line-height: 16px;
        margin: 1px 1px;
        text-align: center;
        width: 16px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
    }

    .hide:checked + label:before {
        content: "\2212";
    }

</style>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <title>Laravel</title>
</head>
<body class="antialiased">


{{--<div class="demo">--}}
{{--    <input class="hide" id="hd-1" type="checkbox" >--}}
{{--    <input class="hide" id="hd-1" type="checkbox" checked>--}}
{{--    <label for="hd-1">Action</label>--}}

{{--        <div>--}}
{{--            @foreach ($files as $k=>$v)--}}

{{--                <p><img src="Categories/{{$k}}.png"><p>--}}
{{--                    @foreach ($files[$k] as $k2=>$v2)--}}
{{--                        <img src="{{ $k2 }}">--}}

{{--            @endforeach--}}

{{--            @endforeach--}}
{{--        </div>--}}

{{--</div>--}}

{{--@foreach ($files as $k=>$v)--}}
{{--    <div class="demo">--}}
{{--        <input class="hide" id="{{$k}}" type="checkbox" >--}}
{{--        <label for="{{$k}}">Action</label>--}}
{{--            <div>--}}
{{--                    <p><img src="Categories/{{$k}}.png"><p>--}}
{{--                        @foreach ($files[$k] as $k2=>$v2)--}}
{{--                    <p> <img src="{{ $k2 }}"><p>--}}
{{--                @endforeach--}}

{{--            </div>--}}

{{--    </div>--}}
{{--@endforeach--}}



<div class="container">
    <div class="row">
        @foreach ($files as $k=>$v)
            <div class="col">
                <img src="Categories/{{$k}}.png" >
                <div class="demo">
                    <input class="hide" id="{{$k}}2" type="checkbox">
                    <label for="{{$k}}2">Action</label>
                    <div>
                        @foreach ($files[$k] as $k2=>$v2)
                            <p><img src="{{ $k2 }}"><p>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


{{--                <div class="demo">--}}
{{--                    <input class="hide" id="{{$k}}2" type="checkbox" checked >--}}
{{--                    <label for="{{$k}}2">Action</label>--}}
{{--                    <div>--}}
{{--                        <p><img src="Categories/{{$k}}.png"><p>--}}
{{--                        @foreach ($files[$k] as $k2=>$v2)--}}
{{--                            <p> <img src="{{ $k2 }}"><p>--}}
{{--                        @endforeach--}}

{{--                    </div>--}}

{{--                </div>--}}


</body>


</body>
</html>

