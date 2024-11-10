<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>

    <style>
        body {
            background-color: #f9f9f9;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 800px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 16px;
            height: 100%;
        }

        .header {
            width: 100%;
            text-align: center;
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 16px;
        }

        .chat-container {
            flex-grow: 1;
            max-height: 70vh;
            overflow-y: auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 16px;
        }

        .message-item {
            background-color: #f1f1f1;
            border-radius: 8px;
            padding: 10px;
            margin: 5px 0;
        }

        .message-user {
            color: #4CAF50;
        }

        .message-text {
            display: inline-block;
        }

        .message-time {
            color: gray;
            font-style: italic;
        }

        .message-image {
            max-width: 200px;
            border-radius: 5px;
            margin-top: 5px;
        }

        .download-link {
            color: #007bff;
            text-decoration: underline;
        }

        .chat-form {
            width: 100%;
        }

        .name-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #4CAF50;
            border-radius: 5px;
            margin-bottom: 8px;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 16px;
        }

        .file-input {
            font-size: 14px;
            margin-right: 10px;
        }

        .message-input {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .send-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .send-button:hover {
            background-color: #45a049;
        }
    </style>

</head>

<body>
    @include('includes.sidebar')
    <div class="container">
        <h1 class="header">{{ $user->name }}</h1>

        <div class="chat-container">
            <ul>
                @foreach($messages as $message)
                <li class="message-item">
                    <strong class="message-user">{{ $message->user->name }}:</strong>
                    @if($message->message)
                    <span class="message-text">{{ $message->message }} <em class="message-time">{{ $message->created_at->diffForHumans() }}</em></span>
                    @endif
                    @if($message->file_path)
                    <br>
                    @if(in_array(pathinfo($message->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                    <img src="{{ asset('storage/' . $message->file_path) }}" alt="Image" class="message-image">
                    @else
                    <a href="{{ asset('storage/' . $message->file_path) }}" target="_blank" class="download-link">Télécharger le fichier</a>
                    @endif
                    @endif
                </li>
                @endforeach
            </ul>
        </div>

        <form action="{{ url('/chat') }}" method="POST" class="chat-form">
            @csrf
            <input type="text" name="name" value="{{ $user->name }}" readonly class="name-input">

            <div class="form-group">
                <input type="file" name="file" class="file-input">
                <textarea id="chat" name="message" rows="1" class="message-input" placeholder="Votre message..." required></textarea>
                <button type="submit" class="send-button">Envoyer</button>
            </div>
        </form>
    </div>
</body>

</html>