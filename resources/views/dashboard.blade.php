<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentification</title>
</head>
<body>
    <table>
        <tbody>
            <tr>
                <td>
                    <h1>Tableau de bord</h1>
                </td>
                <td>
                    <a href="{{ route('login') }}">
                        Se déconnecter
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
    <h3>Bienvenue {{ Auth::user()->name }}</h3>
</body>
</html>