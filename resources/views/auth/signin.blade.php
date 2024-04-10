@extends('layouts.client.layout_auth')
@section('main')
    <!-- Section: Design Block -->
    <section class="text-center">
      <!-- Background image -->
      <div class="p-5 bg-image"
          style="background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg'); height: 300px;">
      </div>
      <!-- Background image -->

      <div class="card mx-4 mx-md-5 shadow-5-strong"
          style="margin-top: -100px; background: hsla(0, 0%, 100%, 0.8); backdrop-filter: blur(30px);">
          <div class="card-body py-5 px-md-5">

              <div class="row d-flex justify-content-center">
                  <div class="col-lg-8">
                      <h2 class="fw-bold mb-5">Đăng nhập</h2>
                      <form id="loginForm" method="POST" action="{{ route('login') }}">
                          @csrf
                        
                          <!-- Email input -->
                          <div class="form-outline mb-4">
                              <label class="form-label custom-text-start" for="form3Example3">Email</label>
                              <input type="email" id="form3Example3" class="form-control" name="email" />
                          </div>
                          @error('email')
                              <p style="color: red">{{ $message }}</p>
                          @enderror
                          <!-- Password input -->
                          <div class="form-outline mb-4">
                              <label class="form-label custom-text-start" for="form3Example4">Mật Khẩu</label>
                              <input type="password" id="form3Example4" class="form-control" name="password" />
                          </div>
                          @error('password')
                              <p style="color: red">{{ $message }}</p>
                          @enderror
                          <!-- Checkbox -->
                          <div class="form-check d-flex align-items-center mb-4">
                              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33"
                                  checked />
                              <label class="form-check-label" for="form2Example33">
                                  Lưu thông tin đăng nhập
                              </label>
                              <a  class="ml-3" href="">Quên mật khẩu</a>
                          </div>

                          <!-- Submit button -->
                          <button type="submit" class="btn btn-dark btn-block mb-4">
                              Đăng Nhập
                          </button>

                      </form>
                  </div>
              </div>
          </div>
      </div>

  </section>
     {{-- <script src="{{ asset('js/login.js') }}"></script> --}}
@endsection
