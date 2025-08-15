@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="grid-margin col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Lista de usuarios</h4>
                        <p class="card-description">
                            Aquí puedes ver y administrar todos los usuarios registrados en el sistema.Puedes editar o eliminar a los usuarios que no sean administradores.
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            User
                                        </th>
                                        <th>
                                            Nombres
                                        </th>
                                        <th>
                                            Correo
                                        </th>
                                        <th>
                                            Telefono
                                        </th>
                                        <th>
                                            Fecha de Nacimiento
                                        </th>
                                        <th>
                                            Genero
                                        </th>
                                        <th>
                                            Rol 
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td class="py-1">
                                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="image" />
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->phone }}
                                        </td>
                                        <td>
                                            {{ $user->birth_date }}
                                        </td>
                                        <td>
                                            {{ $user->gender }}
                                        </td>
                                        <td>
                                            {{ $user->role }}
                                        </td>
                                        <td>
                                            <a href="" class="btn btn btn-primary btn-sm">Editar</a>
                                            <form action="" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
