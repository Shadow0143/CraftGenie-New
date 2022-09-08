<!doctype html>
<html lang="en">
  <head>
    <title>Craftgenie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <h1> {{ $details['title']}}</h1>
      <p> <strong> {{$details['username']}} </strong> wants to contact you. <br> Please call him/her on : {{$details['contact']}} or mail on : {{$details['useremail']}}</p>
      <p>Thank You</p>

      @if (!empty($details['files']))
        {{$details['files']}}
      @endif
  </body>
</html>