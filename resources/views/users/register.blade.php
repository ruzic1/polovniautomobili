<x-html-base>
      <x-hero-section>

      </x-hero-section>
      <section class="vh-100 bg-image">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
              <div class="card" style="border-radius: 15px;">
                <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form method="POST" action="/createUser">
                @csrf
                <div class="form-outline mb-4">
                  <input type="text" id="firstName" class="form-control form-control-lg" name='firstName' value="{{old('firstName')}}"/>
                  <label class="form-label" for="firstName">First Name</label>
                  
                  @error('firstName')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                  @enderror
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="lastName" class="form-control form-control-lg" name='lastName' value="{{old('lastName')}}"/>
                  <label class="form-label" for="lastName">Last Name</label>

                  @error('lastName')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                  @enderror
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="email" class="form-control form-control-lg" name='email' value="{{old('email')}}"/>
                  <label class="form-label" for="email">Email</label>

                  @error('email')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                  @enderror
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="password" class="form-control form-control-lg" name='password1' value="{{old('password1')}}"/>
                  <label class="form-label" for="password">Password</label>

                  @error('password1')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                  @enderror
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="username" class="form-control form-control-lg" name='username' value="{{old('username')}}"/>
                  <label class="form-label" for="username">Username</label>

                  @error('username')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                  @enderror
                </div>
                <div class="d-flex justify-content-center">
                  <button class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" style='background-color:#ed563b'>Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</x-html-base>