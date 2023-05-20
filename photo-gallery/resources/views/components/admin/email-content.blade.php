<!doctype html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>email layout</title>
    </head>
        


    <body>

        <p style="color: gray;">First Name: {{$dataReceived['fname']}}</p>
        <p style="color: gray;">Last Name: {{$dataReceived['lname']}}</p>
        <p style="color: gray; margin-bottom: 15px; border-bottom: 1px solid gray; padding-bottom: 15px;">Email: {{$dataReceived['email']}}</p>
        <h2>{{$dataReceived['subject']}}</h2>
        <p>{{$dataReceived['message']}}</p>

    </body>
</html>