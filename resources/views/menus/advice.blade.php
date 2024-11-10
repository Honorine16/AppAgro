<!DOCTYPE html>
<html lang="fr">

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
            overflow-x: hidden;
            display: flex;
        }

        /* Container pour le contenu principal */
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-left: 250px; /* Ajout du décalage pour laisser de la place à la sidebar */
            width: calc(100% - 250px); /* S'assure que le contenu occupe toute la largeur restante */
        }

        h1 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        /* Grille de disposition */
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 éléments par ligne */
            gap: 20px;
            margin-top: 20px;
        }

        .advice {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 15px;
            background-color: #fefefe;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            height: 250px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .advice:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        .advice h2 {
            margin: 0 0 10px;
            color: #4CAF50;
            font-size: 18px;
            font-weight: bold;
        }

        .advice .content {
            color: #555;
            line-height: 1.5;
            max-height: 50px;
            overflow: hidden;
            transition: max-height 0.3s;
        }

        .advice.expanded .content {
            max-height: 200px;
        }

        .advice .category {
            font-style: italic;
            color: #888;
            margin-top: 10px;
        }

        .see-more {
            display: block;
            margin-top: 10px;
            color: #4CAF50;
            cursor: pointer;
            font-weight: bold;
            text-decoration: underline;
            transition: color 0.3s;
        }

        .see-more:hover {
            color: #388e3c;
        }

        /* Responsivité */
        @media (max-width: 768px) {
            .grid {
                grid-template-columns: repeat(2, 1fr); /* 2 éléments par ligne sur les tablettes */
            }
        }

        @media (max-width: 480px) {
            .grid {
                grid-template-columns: 1fr; /* 1 élément par ligne sur les petits écrans */
            }
        }
    </style>
</head>

<body>
    @include('includes.sidebar')

    <div class="container">
        <h1>Page des Conseils</h1>
        <p style="text-align: center;">
            Soyez les bienvenu(e)s sur la page conseil. Voici les conseils disponibles pour vous.
        </p>

        <div class="grid">
            @foreach($advices as $advice)
            <div class="advice">
                <h2>{{ $advice->title }}</h2>
                <div class="content">
                    {{ $advice->content }}
                </div>
                <p class="category"><strong>Catégorie : </strong>{{ $advice->category }}</p>
                <span class="see-more" onclick="toggleContent(this)">Voir plus</span>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        function toggleContent(element) {
            const advice = element.closest('.advice');
            advice.classList.toggle('expanded');
            element.textContent = advice.classList.contains('expanded') ? "Voir moins" : "Voir plus";
        }
    </script>
</body>

</html>
