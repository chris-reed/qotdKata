<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quote of the Day</title>
{{--Styles--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        .main {
            margin-top: 2rem;
        }
    </style>
</head>
<body>
<div class="main container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Quote of the Day
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p class="qotd-body">{{$quote['text']}}</p>
                        <footer class="blockquote-footer qotd-author">{{$quote['author']}}</footer>
                    </blockquote>
                </div>
                <div class="card-footer">
                    <a class="btn btn-outline-primary qotd" href="#" role="button">Quote of the Day</a>
                    <a class="btn btn-outline-info float-right random" href="#" role="button">Random</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{--Scripts--}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script SRC="{{asset('js/qotd.js')}}"></script>
</body>
</html>
