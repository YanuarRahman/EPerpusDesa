
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | Eperpus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('/loginVendor') }}/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('/loginVendor') }}/css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Register</h2>
                        <form method="POST" class="register-form" id="register-form">
                            @if (session('status'))
                            <div class="alert alert-success alert-dismissible">
                                <strong>{{ session('message') }}</strong>
                            </div>
                            @endif
                            @csrf
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-username"></i></label>
                                <input type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}" required/>
                            </div>
                            @error('username')
                             {{ $message }}
                            @enderror
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required/>
                            </div>
                            @error('password')
                            {{ $message }}
                            @enderror
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-account-box"></i></label>
                                <input type="text" name="phone" id="phone" placeholder="Phone Number" {{ old('password') }} required/>
                            </div>
                            @error('phone')
                            {{ $message }}
                           @enderror
                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-home"></i></label>
                                <input type="text" name="address" id="address" placeholder="Address" {{ old('address') }} required/>
                            </div>
                            @error('address')
                            {{ $message }}
                           @enderror
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit arrow" value="Register" />
                            </div>
                            <a href="loginn" class="signup-image-link">I am already member</a>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{ asset('/loginvendor') }}/images/signup-image.jpg" alt="sing up image"></figure>
                       
                    </div>
                </div>
            </div>
        </section>

    

    </div>
    <script>
        // menghilangkan alert
        window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
          });
        }, 4000);
      </script>
    <!-- JS -->
    <script src="{{ asset('/loginVendor') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('/loginVendor') }}/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>