<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        textarea {
            width: 100%;
            max-width: 100%; /* Ajouté pour éviter le débordement */
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s;
            box-sizing: border-box; /* Ajouté pour inclure la bordure et le padding dans la largeur */
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        .mb-4 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Éditer le Conseil</h1>
        
        <form action="{{ route('advices.update', $advice) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" value="{{ $advice->title }}" required>
            </div>
            <div class="mb-4">
                <label for="content">Contenu</label>
                <textarea name="content" id="content" required rows="4">{{ $advice->content }}</textarea>
            </div>
            <div class="mb-4">
                <label for="category">Catégorie</label>
                <input type="text" name="category" id="category" value="{{ $advice->category }}" required>
            </div>
            <button type="submit">Mettre à jour</button>
        </form>
    </div>
</body>
</html>
