@extends('layouts.layout_auth')
@section('main')
    <!-- Section: Design Block -->
    <section class="text-center">
        <!-- Background image -->
        <div class="p-5 bg-image"
            style="
          background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
          height: 300px;
          ">
        </div>
        <!-- Background image -->

        <div class="card mx-4 mx-md-5 shadow-5-strong"
            style="margin-top: -100px;
            background: hsla(0, 0%, 100%, 0.8);
            backdrop-filter: blur(30px);">
            <div class="card-body py-5 px-md-5">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-5">Đăng ký</h2>
                        <form  action="{{ route('signup') }}" method="post">
                          @csrf
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="form-outline mb-4">
                                <label class="form-label custom-text-start" for="form3Example3">Username</label>
                                <input type="text" name="name" value="{{ old('name') }}" id="form3Example3" class="form-control" />
                            </div>
                            @error('name')
                            <p style="color: red">{{ $message }}</p>
                            @enderror

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label custom-text-start" for="form3Example3">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" id="form3Example3"
                                    class="form-control" />
                            </div>
                            @error('email')
                            <p style="color: red">{{ $message }}</p>
                        @enderror

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label custom-text-start" for="form3Example4">PassWord</label>
                                <input type="password" name="password" id="form3Example4" class="form-control" />
                            </div>
                            @error('password')
                            <p style="color: red">{{ $message }}</p>
                            @enderror

                            <div class="form-outline mb-4">
                                <label class="form-label custom-text-start" for="form3Example4"> Confirm Password</label>
                                <input type="password" name="password_confirmation" id="form3Example4"
                                    class="form-control" />
                            </div>
                            @error('password_confirmation')
                            <p style="color: red">{{ $message }}</p>
                            @enderror

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-dark btn-block mb-4">
                                Đăng Ký
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Section: Design Block -->
@endsection
