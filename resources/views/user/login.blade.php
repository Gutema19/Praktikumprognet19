<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/login.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/user/login_user.js" type="text/javascript"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Montserrat&display=swap" rel="stylesheet">
    <title>{{ $title }}</title>
</head>
<body>
    <script>
        AOS.init({
          delay: 0, 
          duration: 600, 
          easing: 'ease-out',
        });
      </script>
    <div class="login-logo" data-aos="zoom-in" data-aos-delay="600">
        <div class="login-logo">
            <img src="/component/Logo.svg" alt="logo">
        </div>
    </div>
    <div class="login-pic2" data-aos="fade-in" data-aos-delay="600">
        <img src="component/Group 1.svg" alt="gambar1">
    </div>
    <div class="login-container1">
        <h1 data-aos-delay="600">Login</h1>
        <span data-aos-delay="625">Welcome to Hilton, the center of trendy fashion in the world please enter your email and password below.</span>
        <form class="form-login" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 surel" data-aos="fade-up" data-aos-delay="600">
                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                <input type="text" name="login" class="form-control surel" id="exampleInputEmail1" autofocus required value="{{ old ('surel') }}">
                <div class="invalid-feedback email"></div>
            </div>
            <div class="mb-3" data-aos="fade-up" data-aos-delay="625">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control ktsd" id="exampleInputPassword1" required>
                <div class="invalid-feedback password"></div>
            </div>
            <div class="mb-3 form-check" data-aos="fade-up" data-aos-delay="650">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="showpass1()">
                <label class="form-check-label" for="exampleCheck1">Show Password</label>
            </div>
            <button type="submit" class="btn btn-secondary log" data-aos="fade-up" data-aos-delay="600">Login</button>
        </form>
        <button type="submit" class="btn btn-secondary reg" data-aos="fade-up" data-aos-delay="600">Register</button>
        <div class="footer" data-aos="fade-up" data-aos-delay="600">
            <div class="login-pic1">
                <img src="/component/Line 1.svg">
            </div>
            <span>Forgot Password ?<a href="/fpassview">click here</a></span>
        </div>
    </div>
    <div class="login-pic3" data-aos="fade-in" data-aos-delay="600">
        <img src="component/Group 2.svg" alt="gambar2">
    </div>
</body>

</html>