@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="grid-margin col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Crear nuevo usuario +</h4>
                        <form class="form-sample" action="{{ route('admin.users.store') }}" method="POST">
                            @csrf
                            <p class="card-description">
                                Información personal
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nombre completo</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name" value="name"
                                                id="name" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Correo</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" required name="email"
                                                value="email" id="email" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Teléfono</label>
                                        <div class="col-sm-9">
                                            <input type="tel" class="form-control" value="phone" name="phone" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Fecha de nacimiento</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" placeholder="dd/mm/yyyy" type="date" name="birth_date" value="birth_date" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Genero</label>
                                        <div class="col-sm-9">
                                            <select class="form-control">
                                                <option>Seleccione género</option>
                                                <option>Masculino</option>
                                                <option>Femenino</option>
                                                <option>Otro</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Rol</label>
                                        <div class="col-sm-9">
                                            <select class="form-control">
                                                <option>Seleccione un rol</option>
                                                <option>Super Admin</option>
                                                <option>Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="card-description">
                                Contraseña
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Address 1</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
