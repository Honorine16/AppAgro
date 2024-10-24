<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        /* body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }
        h1 {
            color: #4CAF50; 
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin: 10px 0;
        }
        a {
            text-decoration: none;
            color: #4CAF50; 
            padding: 10px;
            border: 1px solid #4CAF50;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #4CAF50; 
            color: white; 
        } */

        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }
        .user-list {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h1 {
            text-align: center;
            color: #27ae60;
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin: 10px 0;
        }
        a {
            text-decoration: none;
            color: #27ae60;
            padding: 10px;
            border: 1px solid #27ae60;
            border-radius: 5px;
            display: block;
            transition: background-color 0.3s, color 0.3s;
        }
        a:hover {
            background-color: #27ae60;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <h1>Liste des utilisateurs</h1>

    <ul>
        @foreach($users as $user)
        <li>
            <a href="{{ url('/chat/' . $user->id) }}">{{ $user->name }} </a>
        </li><br>
        @endforeach
    </ul>
</body>

</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }
        .user-list {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h1 {
            text-align: center;
            color: #27ae60;
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin: 10px 0;
        }
        a {
            text-decoration: none;
            color: #27ae60;
            padding: 10px;
            border: 1px solid #27ae60;
            border-radius: 5px;
            display: block;
            transition: background-color 0.3s, color 0.3s;
        }
        a:hover {
            background-color: #27ae60;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="user-list">
        <h1>Liste des utilisateurs</h1>
        <ul>
            @foreach($users as $user)
            <li>
                <a href="{{ url('/chat/' . $user->id) }}">{{ $user->name }}</a>
            </li>
            @endforeach
        </ul>
    </div>
</body>

</html>
