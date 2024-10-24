<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conseils Agronomiques</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #4CAF50;;
            margin-bottom: 20px;
        }

        .advice {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #fefefe;
            transition: box-shadow 0.3s;
        }

        .advice:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .advice h2 {
            margin: 0 0 10px;
            color: #4CAF50;
        }

        .advice p {
            color: #555;
            line-height: 1.5;
        }

        .category {
            font-style: italic;
            color: #888;
        }
    </style>

</head>

<body>
    <div class="container">
        <h1>Page des Conseils</h1>
        <p style="text-align: center;">
            Soyez les bienvenu(e)s sur la page conseil.
            Voici les conseils disponibles pour vous
        </p>
        @foreach($advices as $advice)
        <div class="advice">
            <h2>{{ $advice->title }}</h2>
            <p>{{ $advice->content }}</p>
            <p class="category"><strong>Catégorie : </strong>{{ $advice->category }}</p>
        </div>
        @endforeach

</body>

</html>