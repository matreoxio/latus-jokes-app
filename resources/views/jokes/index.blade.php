<!DOCTYPE html>
<html>
<head>
    <title>Random Jokes</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>3 Random Programming Jokes</h1>
    
    <div id="jokes-container">
        @foreach ($jokes as $joke)
            <p><strong>{{ $joke['setup'] }}</strong><br>{{ $joke['punchline'] }}</p>
        @endforeach
    </div>
    
    <button id="refresh-jokes">Refresh Jokes</button>

    <script>
        document.getElementById('refresh-jokes').addEventListener('click', function() {
            fetch('{{ route('api.jokes') }}', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer 123'
                }
            })
            .then(response => response.json())
            .then(data => {
                const container = document.getElementById('jokes-container');
                container.innerHTML = '';
                data.forEach(joke => {
                    container.innerHTML += `<p><strong>${joke.setup}</strong><br>${joke.punchline}</p>`;
                });
            });
        });
    </script>
</body>
</html>