<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<style>



</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <title>Loader alternative</title>
</head>
<body class="antialiased">

<div class="row">
@foreach ($files as $k=>$v)
        <div class="col">
            <button class="btn btn btn-light" type="button" data-toggle="collapse" data-target=".multi-collapse{{$k}}"
                    aria-controls="multi{{$k}}">
                <img src="Categories/{{$k}}.png" width="128" alt="Image not found"
                     onerror="this.onerror=null;this.src='default.png';"/>
            </button>
        </div>
    @endforeach

    @foreach ($files as $k=>$v)

        @foreach(array_shift($files) as $k2=>$v2)

        @endforeach
    @endforeach
{{--        @foreach(array_shift($files) as $k2=>$v2)--}}

{{--            <div class="row">--}}
{{--                <div class="collapse  multi-collapse{{$k}}" id="multi{{$k}}">--}}


{{--                    <div class="card-body" style="width: 130px;">--}}
{{--                        <img src="{{$k2}}" width="120" alt="Image not found"--}}
{{--                             onerror="this.onerror=null;this.src='default.png';"/>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}




</div>




</body>

</html>

