@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="grid-margin col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Crear nuevo usuario +</h4>
                        <form action="{{ route('admin.users.store') }}" method="POST" id="userForm">
                            @csrf

                            <div class="row">
                                {{-- Información Personal --}}
                                <div class="col-md-6">
                                    <h5 class="mb-3 text-primary">
                                        <i class="me-2 fas fa-user"></i>
                                        Información Personal
                                    </h5>

                                    {{-- Nombre --}}
                                    <div class="mb-3">
                                        <label for="name" class="form-label">
                                            Nombre Completo <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name') }}"
                                            placeholder="Ingresa el nombre completo" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Email --}}
                                    <div class="mb-3">
                                        <label for="email" class="form-label">
                                            Correo Electrónico <span class="text-danger">*</span>
                                        </label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}"
                                            placeholder="ejemplo@correo.com" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Teléfono --}}
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Teléfono</label>
                                        <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" value="{{ old('phone') }}"
                                            placeholder="+51 999 999 999">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Fecha de Nacimiento --}}
                                    <div class="mb-3">
                                        <label for="birth_date" class="form-label">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control @error('birth_date') is-invalid @enderror"
                                            id="birth_date" name="birth_date" value="{{ old('birth_date') }}"
                                            max="{{ date('Y-m-d', strtotime('-1 day')) }}">
                                        @error('birth_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Género --}}
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Género</label>
                                        <select class="form-select @error('gender') is-invalid @enderror" id="gender"
                                            name="gender">
                                            <option value="">Seleccionar género</option>
                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>
                                                Masculino
                                            </option>
                                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>
                                                Femenino
                                            </option>
                                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>
                                                Otro
                                            </option>
                                        </select>
                                        @error('gender')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Información de Acceso --}}
                                <div class="col-md-6">
                                    <h5 class="mb-3 text-primary">
                                        <i class="me-2 fas fa-lock"></i>
                                        Información de Acceso
                                    </h5>

                                    {{-- Contraseña --}}
                                    <div class="mb-3">
                                        <label for="password" class="form-label">
                                            Contraseña <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" id="password"
                                                name="password" placeholder="Mínimo 8 caracteres" required>
                                            <button class="btn-outline-secondary btn" type="button" id="togglePassword">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>

                                        {{-- Indicador de fortaleza --}}
                                        <div class="mt-2">
                                            <div class="progress" style="height: 5px;">
                                                <div class="progress-bar" id="strengthBar" role="progressbar"
                                                    style="width: 0%">
                                                </div>
                                            </div>
                                            <small class="text-muted form-text">
                                                Fortaleza: <span id="strengthText">Muy débil</span>
                                            </small>
                                        </div>

                                        <div class="form-text">
                                            La contraseña debe contener al menos: 8 caracteres, mayúsculas, minúsculas,
                                            números y símbolos.
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Confirmar Contraseña --}}
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">
                                            Confirmar Contraseña <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password_confirmation"
                                                name="password_confirmation" placeholder="Repite la contraseña" required>
                                            <button class="btn-outline-secondary btn" type="button"
                                                id="togglePasswordConfirm">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>

                                        {{-- Error de coincidencia --}}
                                        <div class="invalid-feedback" id="passwordError" style="display: none;">
                                            Las contraseñas no coinciden
                                        </div>
                                    </div>

                                    {{-- Rol --}}
                                    <div class="mb-3">
                                        <label for="role" class="form-label">
                                            Rol <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select @error('role') is-invalid @enderror" id="role"
                                            name="role" required>
                                            <option value="">Seleccionar rol</option>
                                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                                                <i class="fas fa-user-cog"></i> Administrador
                                            </option>
                                            <option value="super_admin"
                                                {{ old('role') == 'super_admin' ? 'selected' : '' }}>
                                                <i class="fas fa-user-shield"></i> Super Administrador
                                            </option>
                                            <option value="customer" {{ old('role') == 'customer' ? 'selected' : '' }}>
                                                <i class="fas fa-user"></i> Cliente
                                            </option>
                                        </select>
                                        @error('role')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Información del Rol --}}
                                    <div class="alert alert-info" id="roleInfo" style="display: none;">
                                        <h6><i class="me-2 fas fa-info-circle"></i>Información del Rol</h6>
                                        <p class="mb-0" id="roleDescription"></p>
                                    </div>
                                </div>
                            </div>

                            {{-- Botones --}}
                            <div class="mt-4 row">
                                <div class="col-12">
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('admin.users.view') }}" class="btn btn-secondary">
                                            <i class="fa-arrow-left me-2 fas"></i>
                                            Cancelar
                                        </a>

                                        <button type="submit" class="btn btn-primary" id="submitBtn">
                                            <i class="me-2 fas fa-save"></i>
                                            Crear Usuario
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/createuser.js') }}"></script>
@endsection
