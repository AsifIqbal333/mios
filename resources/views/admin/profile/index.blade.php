@extends('admin.layouts.master')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Profile</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Hi, {{ Auth::user()->name }} !</h2>
      <p class="section-lead">
        Change information about yourself on this page.
      </p>
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <form method="POST" class="needs-validation" novalidate="" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
              @csrf
              <div class="card-header">
                <h4>Edit Profile</h4>
              </div>
              <div class="card-body">
                <div class="row">                               
                  <div class="form-group col-md-6 col-12">
                    <div class="mb-3">
                      <img width="150px" src="{{ Auth::user()->image }}">
                    </div>
                    <label>Image</label>
                    <input name="profileImage" type="file" class="form-control">
                    @if($errors->has('profileImage'))
                      <code>
                        {{ $errors->first('profileImage') }}
                      </code>
                    @endif
                  </div>
                </div>
                <div class="row">                               
                  <div class="form-group col-md-6 col-12">
                    <label>Name</label>
                    <input name="name" type="text" class="form-control" value="{{ Auth::user()->name }}" required="">
                    @if($errors->has('name'))
                      <code>
                        {{ $errors->first('name') }}
                      </code>
                    @endif
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>User Name</label>
                    <input name="username" type="text" class="form-control" value="{{ Auth::user()->username }}" required="">
                      @if($errors->has('username'))
                        <code>
                          {{ $errors->first('username') }}
                        </code>
                      @endif
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6 col-12">
                    <label>Email</label>
                    <input name="email" type="email" class="form-control" value="{{ Auth::user()->email }}" required="">
                    @if($errors->has('email'))
                      <code>
                        {{ $errors->first('email') }}
                      </code>
                    @endif
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>Phone</label>
                    <input name="phone" type="tel" class="form-control" value="{{ Auth::user()->phone }}">
                    @if($errors->has('phone'))
                      <code>
                        {{ $errors->first('phone') }}
                      </code>
                    @endif
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      {{-- Update Password Form --}}
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
          @if($errors->any())
            @foreach ($errors->all() as $error)
              <span class="alert alert-danger">{{ $error }}</span>
            @endforeach
          @endif
            <form method="POST"  novalidate="" action="{{ route('admin.profile.updatePassword') }}">
              @csrf
              <div class="card-header">
                <h4>Update Password</h4>
              </div>
              <div class="card-body">
               
                <div class="row">                               
                  <div class="form-group col-md-8 col-12">
                    <label>Current Password</label>
                    <input name="current_password" type="password" class="form-control" required="">
                  </div>
                  <div class="form-group col-md-8 col-12">
                    <label>New Password</label>
                    <input name="password" type="password" class="form-control" required="">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-8 col-12">
                    <label>Confirm Password</label>
                    <input name="password_confirmation" type="password" class="form-control">
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection




