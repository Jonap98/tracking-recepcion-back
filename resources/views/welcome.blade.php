<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Send email</title>
</head>
<body class="container">
    @if (session('success'))
        <div class="alert alert-success">
            Alerta Success
        </div>
    @endif
    <h1>Send Email</h1>
    <form action="{{ route('send-mail') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

</body>
</html>
