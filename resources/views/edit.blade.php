<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="container d-flex justify-content-center">
            <a href="{{route('index')}}" class="btn btn-danger mt-3 mb-3">Back</a>
        </div>
        <form id="editForm" action="{{route('update', $note->id)}}" method="POST" class="d-flex flex-column align-items-center">
            @method('put')
            @csrf
            <div class="form-group w-50">
                <label for="title">Título:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$note->title}}">
            </div>
            <div class="form-group w-50">
                <label for="description">Descripción:</label>
                <input type="text" class="form-control" id="description" name="description" value="{{$note->description}}">
            </div>
            <button type="button" id="updateButton" class="btn btn-primary mt-2">Actualizar</button>
        </form>
    </div>

    <script>
        document.getElementById('updateButton').addEventListener('click', function() {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¿Quieres actualizar esta nota?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#28a745", // verde
                cancelButtonColor: "#dc3545", // rojo
                confirmButtonText: "Sí, ¡actualízala!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('editForm').submit();
                }
            });
        });
    </script>
</body>
</html>
