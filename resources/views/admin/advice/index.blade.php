<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conseils Agronomiques</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
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

        a {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
            margin-bottom: 20px;
        }

        a:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        thead {
            background-color: #4CAF50;
            color: white;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        .action-link {
            color: #2196F3;
            text-decoration: none;
            margin-right: 10px;
        }

        .action-link:hover {
            text-decoration: underline;
        }

        .delete-button {
            color: #F44336;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            text-decoration: underline;
        }

        .delete-button:hover {
            color: #D32F2F;
        }
    </style>
</head>

<body>
    @include('includes.sidebarAdmin')
    <div class="container">
        <h1>Liste des Conseils</h1>
        <a href="{{ route('admin.advice.create') }}">Ajouter un Conseil</a>

        <div class="overflow-x-auto">
            <table>
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Catégorie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($advices as $advice)
                    <tr>
                        <td>{{ $advice->title }}</td>
                        <td>{{ $advice->category }}</td>
                        <td>
                            <a href="{{ route('admin.advice.edit', $advice) }}" class="action-link">Modifier</a>
                            <form action="{{ route('admin.advice.destroy', $advice) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>