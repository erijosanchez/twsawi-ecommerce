@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="tab-content-basic tab-content">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                            <div class="row">
                                <div class="d-flex flex-column col-lg-12">
                                    <div class="flex-grow row">
                                        <div class="grid-margin col-md-12 col-lg-12 stretch-card">
                                            <div class="card-rounded card">
                                                <div class="card-rounded card-body">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Crear Nueva Categoría</h4>
                                                        <form class="form-sample"
                                                            action="" method="POST">
                                                            @csrf
                                                            <p class="card-description">
                                                                Informacion de la categoría
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group p row">
                                                                        <label class="col-sm-4 col-form-label">Nombre</label>
                                                                        <div class="colum-pass col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                value=""
                                                                                name="name" id="name" required />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group p row">
                                                                        <label class="col-sm-4 col-form-label">Descripción</label>
                                                                        <div class="colum-pass col-sm-8">
                                                                            <textarea class="form-control" name="" id="" cols="30" rows="10" placeholder="Escribe la descripción..."></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group p row">
                                                                        <label class="col-sm-4 col-form-label">Fecha de
                                                                            Nacimiento</label>
                                                                        <div class="col-sm-8 colum-pass">
                                                                            <input type="date" name="birth_date"
                                                                                id="birth_date"
                                                                                value=""
                                                                                class="form-control @error('birth_date') is-invalid @enderror">
                                                                        </div>
                                                                        @error('birth_date')
                                                                            <div class="invalid-feedback">
                                                                                <i class="fas fa-exclamation-circle"></i>
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group p row">
                                                                        <label class="col-sm-4 col-form-label">Genero
                                                                        </label>
                                                                        <div class="col-sm-8 colum-pass">
                                                                            <select name="gender" id="gender"
                                                                                class="form-control">
                                                                                <option value="">Seleccionar género
                                                                                </option>
                                                                                
                                                                                    <option value="">
                                                                                        f
                                                                                    </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="submit" id="submit_btn"
                                                                class="mb-5 btn btn-primary btn-profile-dt">
                                                                Actualizar datos
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection