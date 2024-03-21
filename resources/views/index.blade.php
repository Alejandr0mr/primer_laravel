<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>

<body>

    {{-- @if($message = Session::get('success'))
    <div style="padding: 15px; background-color: green; color:white;" class="text-center">
        <h2>{{$message}}</h2>
    </div>
    @endif

    @if($message = Session::get('danger'))
    <div style="padding: 15px; background-color: red; color:white;">
        <h2>{{$message}}</h2>
    </div>
    @endif --}}


    <script>
        @if(Session::has('success'))
    const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "success",
  title:  '{{ Session::get('success') }}'
});
    @endif

    @if(Session::has('danger'))
    const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "success",
  title:  '{{ Session::get('danger') }}'
});
    @endif

    // Función para mostrar el modal de confirmación al hacer clic en el enlace de eliminar
    function confirmDelete(url) {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "¡No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminarlo"
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma la eliminación, redirige a la URL de eliminación
                window.location.href = url;
            }
        });
    }
    </script>

    <div class="container">
        <div class="container d-flex justify-content-center">
            <a href="{{route('create')}}" class="btn btn-primary mt-3 mb-3">Crear nueva categoría</a>
        </div>
        <h1>Listado</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descripción</th>
                    <th scope="col" class="justify-content-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($notes as $note)
                <tr>
                    <td>{{$note->id}}</td>
                    <td>{{$note->title}}</td>
                    <td>{{$note->description}}</td>
                    <td><a href="{{route('show',$note->id)}}" class="btn btn-primary">Ver</a>
                        <a href="{{route('edit',$note->id)}}" class="btn btn-success">Editar</a>
                        <a href="javascript:void(0);" onclick="confirmDelete('{{route('delete',$note->id)}}')"
                            class="btn btn-danger">Eliminar</a>
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
