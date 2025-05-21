<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Livros</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f5f5f5; }
    </style>
</head>
<body>
    <h1>Relatório de Livros com Autores e Assuntos</h1>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autores</th>
            <th>Assuntos</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author_names }}</td>
                <td>{{ $book->subject_names }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
