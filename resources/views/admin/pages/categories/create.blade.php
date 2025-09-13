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
                                                                            <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description"
                                                                                name="meta_description" rows="2">{{ old('meta_description') }}</textarea>
                                                                            @error('meta_description')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}</div>
                                                                            @enderror
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
                                                                            <div class="custom-file">
                                                                                <input type="file"
                                                                                    class="form-control @error('image') is-invalid @enderror"
                                                                                    id="image" name="image"
                                                                                    style="cursor: pointer;"
                                                                                    accept="image/*">
                                                                            </div>
                                                                            @error('image')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                            <div id="imagePreview" class="mt-2"
                                                                                style="display: none;">
                                                                                <img id="preview" class="img-thumbnail"
                                                                                    style="max-width: 200px;">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group p row">
                                                                        <label class="col-sm-4 col-form-label">Categoría
                                                                            Padre</label>
                                                                        <div class="colum-pass col-sm-8">
                                                                            <select
                                                                                class="form-control @error('parent_id') is-invalid @enderror"
                                                                                id="parent_id" name="parent_id">
                                                                                <option value="">Sin categoría padre
                                                                                </option>
                                                                                @foreach ($parentCategories as $parent)
                                                                                    <option value="{{ $parent->id }}"
                                                                                        {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                                                                                        {{ $parent->name }}
                                                                                    </option>
                                                                                    @foreach ($parent->children as $child)
                                                                                        <option value="{{ $child->id }}"
                                                                                            {{ old('parent_id') == $child->id ? 'selected' : '' }}>
                                                                                            — {{ $child->name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                @endforeach
                                                                            </select>
                                                                            @error('parent_id')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group p row">
                                                                        <label class="col-sm-4 col-form-label">Orden</label>
                                                                        <div class="colum-pass col-sm-8">
                                                                            <input type="number"
                                                                                class="form-control @error('sort_order') is-invalid @enderror"
                                                                                id="sort_order" name="sort_order"
                                                                                value="{{ old('sort_order', 0) }}"
                                                                                min="0">
                                                                            @error('sort_order')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group p row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label">Estado</label>
                                                                        <div class="colum-pass col-sm-8">
                                                                            <div class="form-check-inline form-check">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="is_active"
                                                                                    id="activo" value="1"
                                                                                    {{ old('is_active', 1) == 1 ? 'checked' : '' }}>
                                                                                <label
                                                                                    class="text-lbl-form form-check-label"
                                                                                    for="activo">Activo</label>
                                                                            </div>
                                                                            <div class="form-check-inline form-check fc">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="is_active"
                                                                                    id="no_activo" value="0"
                                                                                    {{ old('is_active', 1) == 0 ? 'checked' : '' }}>
                                                                                <label
                                                                                    class="text-lbl-form form-check-label"
                                                                                    for="no_activo">No activo</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="submit" class="mb-5 btn btn-primary btn-profile-dt">
                                                                    <i class="fas fa-save"></i> Guardar Categoría
                                                                </button>
                                                                <a href="{{ route('admin.categories.index') }}"
                                                                    class="btn btn-secondary">
                                                                    Cancelar
                                                                </a>
                                                            </div>
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
