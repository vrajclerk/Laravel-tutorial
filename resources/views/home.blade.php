<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        Welcome, {{$name ?? "Guest"}} ,{{date('d-m-y')}}
    </h1>
<!--    
    @if($name=="")
    {{"name is empty"}}

    @elseif($name=="vraj")
    
        {{"name is correct"}}
    @else
        {{"name is not correct"}}

    @endif -->

    @unless($name=="vraj")
    the name is not Vraj
    @endunless
    
</body>
</html>