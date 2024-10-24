<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la Formation</title>
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
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Modifier la Formation</h1>
        <form action="{{ route('formations.update', $formation) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" value="{{ $formation->title }}" required>
            
            <label for="description">Description</label>
            <textarea name="description" id="description" required rows="4">{{ $formation->description }}</textarea>
            
            <label for="date">Date</label>
            <input type="date" name="date" id="date" value="{{ $formation->date }}" required>
            
            <label for="location">Lieu</label>
            <input type="text" name="location" id="location" value="{{ $formation->location }}" required>
            
            <button type="submit">Mettre à jour</button>
        </form>
    </div>
</body>
</html>
