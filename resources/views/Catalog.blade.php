<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<style>


    div.solid {
        border-style: solid;
    }




    div.scroll {
        margin: 4px, 4px;
        padding: 4px;
        background-color: #08c708;
        width: 2000px;
        height: 600px;

        overflow-y: auto;

        white-space: nowrap;
    }

    /* скрываем чекбоксы и блоки с содержанием */
    .hide,
    .hide + label ~ div {
        display: none;
    }

    /* вид текста label */
    .hide + label {
        cursor: pointer;
        display: inline-block;
    }

    .no-gutters {
        margin-right: 0;
        margin-left: 0;

    }

    /* когда чекбокс активен показываем блоки с содержанием  */
    .hide:checked + label + div {
        display: block;
    }



</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <title>Loader</title>
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


<div class="">
    <div class="row">
        @foreach ($files as $k=>$v)
            <div class="col">
                {{--                <a href="default.asp">--}}
                <img src="Categories/{{$k}}.png" alt="not found" width="128" height="64" style="vertical-align:middle">
                {{--                </a>--}}
                <div>
                    <input class="hide" id="{{$k}}2" type="checkbox" checked>
                    <label for="{{$k}}2">Games inside:</label>
                    <div>
                        @foreach ($files[$k] as $k2=>$v2)
                            <p><img src="{{ $k2 }} "  alt="not found" width="128" height="64" style="vertical-align:middle"><p>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


</body>


</body>
</html>

