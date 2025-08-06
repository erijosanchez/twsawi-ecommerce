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
                                                        <form class="form-sample">
                                                            <p class="card-description">
                                                                Personal info
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">First
                                                                            Name</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control"
                                                                                value="{{ old('name', $user->name) }}"
                                                                                required />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Last
                                                                            Name</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-3 col-form-label">Gender</label>
                                                                        <div class="col-sm-9">
                                                                            <select class="form-control">
                                                                                <option>Male</option>
                                                                                <option>Female</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Date of
                                                                            Birth</label>
                                                                        <div class="col-sm-9">
                                                                            <input class="form-control"
                                                                                placeholder="dd/mm/yyyy" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-3 col-form-label">Category</label>
                                                                        <div class="col-sm-9">
                                                                            <select class="form-control">
                                                                                <option>Category1</option>
                                                                                <option>Category2</option>
                                                                                <option>Category3</option>
                                                                                <option>Category4</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-3 col-form-label">Membership</label>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <input type="radio"
                                                                                        class="form-check-input"
                                                                                        name="membershipRadios"
                                                                                        id="membershipRadios1"
                                                                                        value="" checked>
                                                                                    Free
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-5">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <input type="radio"
                                                                                        class="form-check-input"
                                                                                        name="membershipRadios"
                                                                                        id="membershipRadios2"
                                                                                        value="option2">
                                                                                    Professional
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="card-description">
                                                                Address
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Address
                                                                            1</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">State</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Address
                                                                            2</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-3 col-form-label">Postcode</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">City</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-3 col-form-label">Country</label>
                                                                        <div class="col-sm-9">
                                                                            <select class="form-control">
                                                                                <option>America</option>
                                                                                <option>Italy</option>
                                                                                <option>Russia</option>
                                                                                <option>Britain</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                                                            <button
                                                                                class="btn-outline-primary btn btn-pass"
                                                                                type="button"
                                                                                onclick="togglePassword('current_password')">
                                                                                <i class="mdi mdi-eye"
                                                                                    id="current_password_icon"></i>
                                                                            </button>
                                                                        </div>
                                                                        @error('current_password')
                                                                            <div class="invalid-feedback">
                                                                                <i class="fas fa-exclamation-circle"></i>
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
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
                                                    @if ($user->avatar)
                                                        <img class="mb-4 user-profile-img"
                                                            src="{{ asset('storage/' . $user->avatar) }}"
                                                            alt="{{ $user->name }}'s Profile Image">
                                                    @else
                                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0D6EFD&color=fff&rounded=true&size=50"
                                                            alt="Avatar" class="rounded-circle">
                                                    @endif
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
