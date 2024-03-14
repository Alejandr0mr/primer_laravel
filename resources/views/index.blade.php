<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="container d-flex justify-content-center">
            <a href="{{route('create')}}" class="btn btn-primary mt-3 mb-3">Crear nueva categoría</a>
        </div>
        <h1>Listado</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Descripción</th>
                    <th scope="col" class="justify-content-center" >Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($notes as $note)
                <tr>
                    <td>{{$note->title}}</td>
                    <td>{{$note->description}}</td>
                    <td><a href="{{route('show',$note->id)}}" class="btn btn-primary">Ver</a>
                        <a href="{{route('edit',$note->id)}}" class="btn btn-success">Editar</a>
                        <a href="{{route('delete',$note->id)}}" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="2">Lista vacía</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
