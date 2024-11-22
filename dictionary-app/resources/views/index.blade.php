<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Words List</title>
</head>

<body>
    <h1>Words List</h1>

    <form method="POST" action="/api/words">
        @csrf
        <input type="text" name="word" placeholder="Search a word">
        <button type="submit">Search</button>
    </form>

    <ul id="words-list"></ul>

    <script>
    async function fetchWords() {
        const response = await fetch('/api/words');
        const words = await response.json();

        const list = document.getElementById('words-list');
        list.innerHTML = '';

        words.forEach(word => {
            const item = document.createElement('li');
            item.textContent =
                `${word.word}: ${JSON.parse(word.meaning)[0].meanings[0].definitions[0].definition}`;
            list.appendChild(item);
        });
    }

    fetchWords();
    </script>
</body>

</html>