<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Styles -->

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">

                <div class="card border-0 shadow">
                    <div class="card-body">
                        <!-- validacion de datos requeridos form-->
                        @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                            - {{$error}} <br>
                            @endforeach
                        </div>
                        @endif

                        <form action="{{ route('users.store') }}" method="post">
                            <div class="form-row">
                                <div class="col-sm-3">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name') }}">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                </div>
                                <div class="col-sm-3">
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Contraseña">
                                </div>
                                <div class="col-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <!--la acction del form se le asigna la ruta del archivo web.php -->
                                <form action="{{ route('users.destroy', $user)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <!-- genera un token de propiedad hacia el credor de este proyecto-->
                                    <input type="submit" value="Eliminar" class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿desea eliminar...?')">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

</html>
