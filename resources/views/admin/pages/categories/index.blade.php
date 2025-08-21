@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="grid-margin col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Lista de categorías</h4>
                        <p class="card-description">
                            Todas las categorias</code>
                        </p>
                        <div class="table-responsive">

                            <table class="table">

                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Slug</th>
                                        <th>Descripcion</th>
                                        <th>Imagen</th>
                                        <th>parent</th>
                                        <th>Status</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td>53275531</td>
                                            <td>12 May 2017</td>
                                            <td><label class="badge badge-danger">Pending</label></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
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
