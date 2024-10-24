<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <ul>
                <li>Prezzo: </li>
                <li>Serie:</li>
                <li>Data vendita:</li>
                <li>Tipo:</li>
                <li>Artisti:
                    <ul>
                        @foreach (json_decode($comic->artists, true) as $artist)
                            <li>{{ $artist }}</li>
                        @endforeach
                    </ul>
                </li>
                <li>Scrittori:
                    <ul>
                        @foreach (json_decode($comic->writers, true) as $writer)
                            <li>{{ $writer }}</li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>