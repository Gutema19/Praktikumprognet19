<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/register1.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="/js/admin/register_admin.js" type="text/javascript"></script>
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
  <div class="register-content">
    <div class="login-pic2" data-aos="fade-in" data-aos-delay="600">
      <img src="/component/Group 9.svg" alt="gambar1">
    </div>
    <div class="login-pic3" data-aos="fade-in" data-aos-delay="625">
      <img src="/component/Line 2.svg" alt="gambar2">
    </div>
    <div class="login-container1">
      <h1 data-aos="fade-up" data-aos-delay="600">Register</h1>
      <div class="proses" data-aos="fade-up" data-aos-delay="600">
        <img src="/component/Group 14.svg" alt="progresspic">
      </div>
      <span data-aos="fade-up" data-aos-delay="625">In this part you must fill the data for your account. Please fill the data require below. Only admin can access.</span>
      <form class="form-login admin" enctype="multipart/form-data">
        @csrf
        <div class="mb-3" data-aos="fade-up" data-aos-delay="625">
          <label for="exampleInputName1" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="exampleInputName1" autofocus required value="{{ old ('name') }}">
          <div class="invalid-feedback name"></div>
        </div>
        <div class="mb-3" data-aos="fade-up" data-aos-delay="650">
          <label for="exampleInputUsername1" class="form-label">Username</label>
          <input type="text" name="username" class="form-control" id="exampleInputUsername1" autofocus required value="{{ old ('emali') }}">
          <div class="invalid-feedback username"></div>
        </div>
        <div class="mb-3" data-aos="fade-up" data-aos-delay="675">
          <label for="exampleInputPhone1" class="form-label">Phone</label>
          <input type="tel" name="phone" class="form-control" id="exampleInputPhone1" autofocus required value="{{ old ('phone') }}">
          <div class="invalid-feedback phone"></div>
        </div>
        <div class="mb-3" data-aos="fade-up" data-aos-delay="700">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" required value="{{ old ('password') }}">
          <div class="invalid-feedback password"></div>
        </div>
        <div class="mb-3" data-aos="fade-up" data-aos-delay="725">
          <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
          <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword2" required value="{{ old ('confirm_password') }}">
          <div class="invalid-feedback confirm_password"></div>
        </div>
        <div class="mb-3 form-check" data-aos="fade-up" data-aos-delay="750">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="showpass1()">
          <label class="form-check-label" for="exampleCheck1">Show Password</label>
        </div>
        <button type="submit" class="btn btn-secondary log" data-aos="fade-up" data-aos-delay="775">Next</button>
      </form>
      <div class="footer" data-aos="fade-up" data-aos-delay="800">
        <div class="login-pic1">
          <img src="/component/Line 1.svg">
        </div>
        <span>Have any account ?<a href="/admin">click here</a></span>
      </div>
    </div>
  </div>
</body>
</html>