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
                                                        <form class="form-sample" action="" method="POST">
                                                            @csrf
                                                            <p class="card-description">
                                                                Informacion de la categoría
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group p row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label">Nombre</label>
                                                                        <div class="colum-pass col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                value="" name="name" id="name"
                                                                                required />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group p row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label">Descripción</label>
                                                                        <div class="colum-pass col-sm-8">
                                                                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                                                                rows="3">{{ old('description') }}</textarea>
                                                                            @error('description')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="card-description">
                                                                SEO
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group p row">
                                                                        <label class="col-sm-4 col-form-label">Meta
                                                                            Titulo</label>
                                                                        <div class="col-sm-8 colum-pass">
                                                                            <input type="text"
                                                                                class="form-control @error('meta_title') is-invalid @enderror"
                                                                                id="meta_title" name="meta_title"
                                                                                value="{{ old('meta_title') }}">
                                                                            @error('meta_title')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group p row">
                                                                        <label class="col-sm-4 col-form-label">Meta
                                                                            Descripción</label>
                                                                        <div class="colum-pass col-sm-8">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group p row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label">Imagen</label>
                                                                        <div class="colum-pass col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                value="" name="name" id="name"
                                                                                required />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group p row">
                                                                        <label class="col-sm-4 col-form-label">Categoría
                                                                            Padre</label>
                                                                        <div class="colum-pass col-sm-8">
                                                                            <textarea class="form-control" name="" id="" cols="30" rows="10"
                                                                                placeholder="Escribe la descripción..."></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group p row">
                                                                        <label class="col-sm-4 col-form-label">Orden</label>
                                                                        <div class="colum-pass col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                value="" name="name" id="name"
                                                                                required />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group p row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label">Estado</label>
                                                                        <div class="colum-pass col-sm-8">
                                                                            <textarea class="form-control" name="" id="" cols="30" rows="10"
                                                                                placeholder="Escribe la descripción..."></textarea>
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
