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
                                                                            <input type="text" class="form-control" />
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-column col-lg-4">
                                    <div class="flex-grow row">
                                        <div class="grid-margin col-md-6 col-lg-12 stretch-card">
                                            <div class="bg-primary card-rounded card">
                                                <div class="d-flex flex-column align-items-center pb-0 card-body">
                                                    <img class="mb-4 user-profile-img"
                                                        src="{{ asset('assets/images/faces/face8.jpg') }}" alt="">
                                                    <form action="" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group text-center row">
                                                            <label for="profileImage" class="text-white">Change
                                                                Profile Image</label>
                                                            <div class="col-sm-12">
                                                                <input type="file" class="text-center form-control" id="avatar"
                                                                    name="avatar" accept="image/*" style="height: 40px; cursor: pointer;" required>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-secondary btn-profile-img"n>Update
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
@endsection
