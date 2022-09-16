<!doctype html>
<html lang="en">

<head>
    <title>Craftgenie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h1> {{ $userdetails['body']}}</h1>
    <p> <strong> {{$userdetails['name']}} </strong> wants to buy <strong>{{$userdetails['package_name'] }}</strong>
        package. </p>
    <p>Please assign the required amount for this package.So that payment will done</p>
    <p>Thank You</p>
</body>

</html>