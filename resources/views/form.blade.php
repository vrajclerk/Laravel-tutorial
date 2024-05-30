<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Registration Form</h1>
        <form action="{{ url('/') }}/register" method="post">
            @csrf
            @php
            $demo=1;
            @endphp
            <div class="container">
                <x-input type="text" name="name" label="please enter your name" :demo="$demo" />
                <x-input type="email" name="email" label="please enter your email" />
                <x-input type="password" name="password" label=" password" />
                <x-input type="password" name="password_confirmation" label="confirm password" />

            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
