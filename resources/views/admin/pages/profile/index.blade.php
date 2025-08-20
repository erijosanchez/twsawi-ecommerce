@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    </div>
                    <div class="tab-content-basic tab-content">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                            <div class="row">
                                <div class="d-flex flex-column col-lg-8">
                                    <div class="flex-grow row">
                                        <div class="grid-margin col-md-12 col-lg-12 stretch-card">
                                            <div class="card-rounded card">
                                                <div class="card-rounded card-body">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Mis Datos</h4>
                                                        <form class="form-sample"
                                                            action="{{ route('admin.profile.update') }}" method="POST">
                                                            @csrf
                                                            <p class="card-description">
                                                                Personal info
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group p row">
                                                                        <label class="col-sm-4 col-form-label">Nombre
                                                                            completo</label>
                                                                        <div class="colum-pass col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                value="{{ old('name', $user->name) }}"
                                                                                name="name" id="name" required />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group p row">
                                                                        <label class="col-sm-4 col-form-label">Número de
                                                                            Celular</label>
                                                                        <div class="col-sm-8 colum-pass">
                                                                            <input
                                                                                class="form-control  @error('phone') is-invalid @enderror"
                                                                                type="tel" name="phone" id="phone"
                                                                                value="{{ old('phone', $user->phone) }}" />
                                                                        </div>
                                                                        @error('phone')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
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
                                                                                value="{{ $user->birth_date ? $user->birth_date->format('Y-m-d') : '' }}"
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
                                                                                @php
                                                                                    $genders = [
                                                                                        'male' => 'Masculino',
                                                                                        'female' => 'Femenino',
                                                                                        'other' => 'Otro',
                                                                                    ];
                                                                                @endphp
                                                                                @foreach ($genders as $value => $label)
                                                                                    <option value="{{ $value }}"
                                                                                        {{ old('gender', $user->gender) == $value ? 'selected' : '' }}>
                                                                                        {{ $label }}
                                                                                    </option>
                                                                                @endforeach
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
                                                        <!-- Formulario de actualización de contraseña -->
                                                        <form class="form-sample" id="changePasswordForm"
                                                            action="{{ route('admin.profile.password') }}" method="POST">
                                                            @csrf
                                                            <p class="card-description">
                                                                Password update
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group p row">
                                                                        <label class="col-sm-4 col-form-label">Contraseña
                                                                            Actual</label>
                                                                        <div class="d-flex colum-pass col-sm-8">
                                                                            <input type="password"
                                                                                class="d-flex form-control @error('current_password') is-invalid @enderror"
                                                                                id="current_password"
                                                                                placeholder="Ingresa tu contraseña actual"
                                                                                name="current_password" required />
                                                                            <button class="btn-outline-primary btn btn-pass"
                                                                                type="button"
                                                                                onclick="togglePassword('current_password')">
                                                                                <i class="mdi mdi-eye"
                                                                                    id="current_password_icon"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group p row">
                                                                        <label class="col-sm-4 col-form-label">Nueva
                                                                            contraseña</label>
                                                                        <div class="col-sm-8 colum-pass">
                                                                            <input type="password"
                                                                                class="form-control @error('new_password') is-invalid @enderror"
                                                                                id="new_password" name="new_password"
                                                                                placeholder="Ingresa tu nueva contraseña"
                                                                                required />
                                                                            <button
                                                                                class="btn-outline-secondary btn btn-pass"
                                                                                type="button"
                                                                                onclick="togglePassword('new_password')">
                                                                                <i class="mdi mdi-eye"
                                                                                    id="new_password_icon"></i>
                                                                            </button>
                                                                        </div>
                                                                        <div class="form-text">
                                                                            <small>La contraseña debe tener al menos 8
                                                                                caracteres, incluir mayúsculas, minúsculas,
                                                                                números y símbolos.</small>
                                                                        </div>
                                                                        @error('new_password')
                                                                            <div class="invalid-feedback">
                                                                                <i class="fas fa-exclamation-circle"></i>
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group p row">
                                                                        <label class="col-sm-4 col-form-label">Confirmar
                                                                            contraseña</label>
                                                                        <div class="col-sm-8 colum-pass">
                                                                            <input type="password"
                                                                                class="form-control @error('new_password') is-invalid @enderror"
                                                                                id="new_password_confirmation"
                                                                                name="new_password_confirmation"
                                                                                placeholder="Confirma tu nueva contraseña"
                                                                                required />
                                                                            <button
                                                                                class="btn-outline-secondary btn btn-pass"
                                                                                type="button"
                                                                                onclick="togglePassword('new_password_confirmation')">
                                                                                <i class="mdi mdi-eye"
                                                                                    id="new_password_confirmation_icon"></i>
                                                                            </button>

                                                                        </div>
                                                                        <div id="password_match_error" class="text-danger"
                                                                            style="display: none;">
                                                                            <small><i
                                                                                    class="fas fa-exclamation-circle"></i>
                                                                                Las contraseñas no coinciden.</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- Indicador de fortaleza de contraseña --}}
                                                            <div class="mb-3">
                                                                <p class="card-description">Fortaleza de la
                                                                    contraseña:</p>
                                                                <div class="progress" style="height: 5px;">
                                                                    <div class="progress-bar" id="password_strength"
                                                                        role="progressbar" style="width: 0%"></div>
                                                                </div>
                                                                <small id="password_strength_text"
                                                                    class="form-text"></small>
                                                            </div>
                                                            <button type="submit" id="submit_btn"
                                                                class="btn btn-primary btn-profile-dt">
                                                                Actualizar contraseña
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- actualiza el avatar o foto de perfil !-->
                                <div class="flex-column col-lg-4">
                                    <div class="flex-grow row">
                                        <div class="grid-margin col-md-6 col-lg-12 stretch-card">
                                            <div class="bg-primary card-rounded card">
                                                <div class="d-flex flex-column align-items-center pb-0 card-body">
                                                    <img class="mb-4 user-profile-img" src="{{ $user->avatar_url }}"
                                                        alt="{{ $user->name }}'s Profile Image">

                                                    <div class="text-white">
                                                        <h5 class="mb-4 text-blue-100">{{ $user->name }}</h5>
                                                    </div>
                                                    <form action="{{ route('admin.profile.avatar') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group text-center row">
                                                            <div class="col-sm-12">
                                                                <input type="file" class="text-center form-control"
                                                                    id="avatar" name="avatar" accept="image/*"
                                                                    style="height: 40px; cursor: pointer;" required>
                                                            </div>
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-secondary btn-profile-img">Update
                                                            Profile</button>
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
    <script src="{{ asset('assets/js/validation.js') }}"></script>
@endsection
