<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('registerFormation', $formation) }}" method="POST">
        @csrf
        <button type="submit">S'inscrire à la formation</button>
    </form>
</body>

</html>