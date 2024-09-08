<!doctype html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        div{margin-left: 2rem;}
        p {
            font-family: sans-serif;
            font-size: 14px;
        }

        .signature {
            font-style: italic;
        }
    </style>
</head>
<body>

    <div>        
        <p>Dear {{$name}}</p>
        <p>You just had a visitor to TwoShakes.review who was unable to create a review for {{$company}} because your account is currently <strong>{{$status}}</strong>.</p>
        <p>(What to do)</p>
    </div>
    
</body>
</html>