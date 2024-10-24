<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Serie</th>
            <th scope="col">Tipo</th>
            <th scope="col">Prezzo</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($comics as $comic)
            <tr>
              <th scope="row">{{ $comic->id }}</th>
              <td>{{ $comic->title }}</td>
              <td>{{ $comic->series }}</td>
              <td>{{ $comic->type }}</td>
              <td>{{ number_format($comic->price, 2, ',', '.') }} euro</td>
            </tr>
          @endforeach
        </tbody>
      </table>
</body>
</html>