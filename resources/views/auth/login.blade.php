<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link href=
"https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
          rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap"
    />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="{{ asset($constants['CSSFILEPATH'].'app.css') }}">

  </head>
  <body>
    <div class="login-screen w-full h-screen flex items-center justify-center gap-2 relative">

       @error('email')
                                    <!-- <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> -->
                                    <div id="toast-danger" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 absolute right-0 bottom-0" role="alert">
                                    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                                        </svg>
                                        <span class="sr-only">Error icon</span>
                                    </div>
                                    <div class="ms-3 text-sm font-normal">These credentials do not match our records.</div>
                                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
                                        <span class="sr-only">Close</span>
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                    </button>
                                </div>
        @enderror
        <div class="left-background w-1/2 h-full bg-no-repeat bg-cover bg-center">
            <div class="login-container w-10/12 h-max rounded-2xl lg:w-2/5 md:w-4/5">
              <div class="logo flex items-center justify-center p-4">
                <!--<img class="w-16 h-16" src="images/logo.png" alt="Logo">-->
                <img class="w-16 h-16" src="{{ asset($constants['IMAGEFILEPATH'].'logo.png') }}" alt="Logo">
              </div>
              <div class="login flex items-center justify-center mt-10">
                <div class="left-container w-1/2 flex items-center justify-center">
                  <img class="vector-img" src="{{ asset($constants['IMAGEFILEPATH'].'profileloginvector.png') }}" alt="background">
                  <img class="profile-img" src="{{ asset($constants['IMAGEFILEPATH'].'profile.png') }}" alt="profile">
                </div>
                <div class="right-container w-1/2 px-5 py-0">
                  <h1 class="mb-8 text-2xl font-normal">Welcome back...</h1>

                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                  <!--<input type="text" placeholder="Username">
                  <input type="password" placeholder="Password">-->

                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="Email" autofocus>

                
                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  <div class="flex items-center w-5 gap-1">
                    <!--<input class="mt-3" type="checkbox">-->
                    <input class="mt-3" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <p>Rememeber</p>
                    <p>me</p>
                  </div>
                  <!--<input id="login-btn" type="button" value="Login">-->
                  <input id="login-btn" type="submit" value="Login">
                                    {{ __('') }}
                 </input>

                  @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                 @endif
                  </form>
                </div>
              </div>
            </div>
        </div>
        <div class="right-background w-1/2 h-full bg-no-repeat bg-cover bg-center">

        </div>
     
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset($constants['JSFILEPATH'].'login.js') }}"></script>
    
<!--    <script>-->
<!--      var usernameText = document.getElementById("usernameText");-->
<!--      if (usernameText) {-->
<!--        usernameText.addEventListener("click", function (e) {-->
<!--        });-->
<!--      }-->
      
<!--      var passwordText = document.getElementById("passwordText");-->
<!--      if (passwordText) {-->
<!--        passwordText.addEventListener("click", function (e) {-->
<!--        });-->
<!--      }-->
      
<!--      var loginText = document.getElementById("loginText");-->
<!--      if (loginText) {-->
<!--        loginText.addEventListener("click", function (e) {-->
<!--        });-->
<!--      }-->


<!--      document.querySelectorAll('[data-dismiss-target]').forEach(function(button) {-->
<!--        button.addEventListener('click', function() {-->
<!--            var target = document.querySelector(button.getAttribute('data-dismiss-target'));-->
<!--            if (target) {-->
<!--                target.style.display = 'none';-->
<!--            }-->
<!--        });-->
<!--    });-->
<!--      </script>-->
  </body>
</html>
