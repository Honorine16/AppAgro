<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formations Disponibles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .btn-container {
            display: flex; /* Utilisation de Flexbox pour aligner les boutons sur la même ligne */
            gap: 10px; /* Espacement entre les boutons */
        }
        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            color: white;
            cursor: pointer;
        }
        .btn-details {
            background-color: #007BFF; /* Bleu */
        }
        .btn-details:hover {
            background-color: #0056b3; /* Bleu foncé */
        }
        .btn-register {
            background-color: #28a745; /* Vert */
        }
        .btn-register:hover {
            background-color: #218838; /* Vert foncé */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Formations Disponibles</h1>
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Lieu</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($formations as $formation)
                <tr>
                    <td>{{ $formation->title }}</td>
                    <td>{{ $formation->description }}</td>
                    <td>{{ $formation->date }}</td>
                    <td>{{ $formation->location }}</td>
                    <td>
                        <div class="btn-container">
                            <a href="{{ route('showFormation', $formation) }}" class="btn btn-details">Voir Détails</a>
                            <a href="{{ route('registerFormation', $formation) }}" class="btn btn-register">S'inscrire</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
