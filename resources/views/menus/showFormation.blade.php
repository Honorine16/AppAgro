<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Formation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        p {
            margin: 15px 0;
            line-height: 1.5;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <form action="{{ route('showFormation') }}" method="post">

    @csrf
        <div class="container">
            <h1>{{ $formation->title }}</h1>
            <p><strong>Description:</strong> {{ $formation->description }}</p>
            <p><strong>Date:</strong> {{ $formation->date }}</p>
            <p><strong>Lieu:</strong> {{ $formation->location }}</p>
            <a href="{{ route('registerFormation', $formation) }}" class="btn">S'inscrire</a>
        </div>
    </form>
</body>

</html>