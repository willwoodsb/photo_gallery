@props(['title'])

<!doctype html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{$title}} | Marko Shapiro Photos</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/cbfcb73618.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/owl-carousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/application.css') }}">
    </head>
        


    <body class="bg-gray-100 font-medium" style="font-family: 'Montserrat', sans-serif">

    {{$slot}}

        <script
            src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
            crossorigin="anonymous">
        </script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script> 
        <script src="{{ asset('js/application.js') }}"></script> 
        
        
    </body>
</html>