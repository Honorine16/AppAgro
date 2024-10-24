<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnostic des plantes</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        h1 {
            color: #27ae60;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="file"] {
            margin-bottom: 15px;
            width: 100%;
        }

        button {
            background-color: #27ae60;
            color: #ffffff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #218838;
        }

        .plant-info {
            margin-top: 20px;
            background-color: #e9f7ef;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #c3e6cb;
        }

        .plant-info h2 {
            margin: 0 0 10px;
            color: #155724;
        }

        .plant-info p,
        .plant-info ul {
            margin: 5px 0;
        }

        .plant-info img {
            margin: 5px;
            border-radius: 5px;
            max-width: 150px;
        }
    </style>
</head>

<body>

    <!-- <h2>Bienvenu(e) sur la page de Diagnostic</h2>
    <p>Pour ne plus perdre de temps, sélectionner l'image de la plante que vous voulez diagnostiquer!</p> -->


    <!-- <form method="POST" action="{{ route('upload.plant.image') }}" enctype="multipart/form-data">
        @csrf
        <label for="plant_image">Choisissez une image :</label>
        <input type="file" name="plant_image" required>
        <button type="submit">Analyser l'Image</button>
    </form>

    @if(isset($plantData))
        <h2>Informations sur la Plante :</h2>
        <p><strong>Nom commun :</strong> {{ $plantData['common_name'] }}</p>
        <p><strong>Nom scientifique :</strong> {{ $plantData['scientific_name'] }}</p>
        <p><strong>Famille :</strong> {{ $plantData['family'] }}</p>
        <p><strong>Conseils d'entretien :</strong></p>
        <ul>
            <li><strong>Arrosage :</strong> {{ $plantData['care']['water'] }}</li>
            <li><strong>Lumière :</strong> {{ $plantData['care']['light'] }}</li>
            <li><strong>Température :</strong> {{ $plantData['care']['temperature'] }}</li>
        </ul>
        <h3>Images :</h3>
        @foreach($plantData['images'] as $image)
            <img src="{{ $image }}" alt="{{ $plantData['common_name'] }}" style="width:150px; height:auto;">
        @endforeach
    @endif -->

    <div class="form-container">
        <h1>Télécharger une Image de Plante</h1>

        <form method="GET" action="{{ route('upload.plant.image') }}" enctype="multipart/form-data">
            @csrf
            <label for="plant_image">Choisissez une image :</label>
            <input type="file" name="plant_image" required>
            <button type="submit">Analyser l'Image</button>
        </form>

        @if(isset($plantData))
        <div class="plant-info">
            <h2>Informations sur la Plante :</h2>
            <p><strong>Nom commun :</strong> {{ $plantData['common_name'] }}</p>
            <p><strong>Nom scientifique :</strong> {{ $plantData['scientific_name'] }}</p>
            <p><strong>Famille :</strong> {{ $plantData['family'] }}</p>
            <p><strong>Conseils d'entretien :</strong></p>
            <ul>
                <li><strong>Arrosage :</strong> {{ $plantData['care']['water'] }}</li>
                <li><strong>Lumière :</strong> {{ $plantData['care']['light'] }}</li>
                <li><strong>Température :</strong> {{ $plantData['care']['temperature'] }}</li>
            </ul>
            <h3>Images :</h3>
            @foreach($plantData['images'] as $image)
            <img src="{{ $image }}" alt="{{ $plantData['common_name'] }}">
            @endforeach
        </div>
        @endif

        @if($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>


</body>

</html>