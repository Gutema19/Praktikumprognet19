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
  <script src="/js/user/register_user.js" type="text/javascript"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lora&family=Montserrat&display=swap" rel="stylesheet">
  <title>Register</title>
</head>

<body>
  <script>
    AOS.init({
      delay: 0, 
      duration: 600, 
      easing: 'ease-out',
    });
  </script>
  <div class="login-logo">
    <div class="login-logo" data-aos="zoom-in" data-aos-delay="600">
      <img src="/component/Logo.svg" alt="logo">
    </div>
  </div>
  <div class="register-content">
    <div class="login-pic2" data-aos="fade-in" data-aos-delay="600">
      <img src="component/Group 4.svg" alt="gambar1">
    </div>
    <div class="login-pic3" data-aos="fade-in" data-aos-delay="625">
      <img src="component/Line 2.svg" alt="gambar2">
    </div>
    <div class="login-container1">
      <h1 data-aos="fade-up" data-aos-delay="600">Register</h1>
      <div class="proses" data-aos="fade-up" data-aos-delay="625">
        <img src="/component/Group 3.svg" alt="progresspic">
      </div>
      <span data-aos="fade-up" data-aos-delay="630">In this part you must fill the data for your account. Please fill the data require below.</span>
      <form class="form-login" enctype="multipart/form-data">
        @csrf
        <div class="mb-3" data-aos="fade-up" data-aos-delay="635">
          <label for="exampleInputName1" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="exampleInputName1" autofocus required value="{{ old ('name') }}">
          <div class="invalid-feedback name"></div>
        </div>
        <div class="mb-3" data-aos="fade-up" data-aos-delay="640">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autofocus required value="{{ old ('emali') }}">
          <div class="invalid-feedback email"></div>
        </div>
        <div class="mb-3" data-aos="fade-up" data-aos-delay="645">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
          <div class="invalid-feedback password"></div>
        </div>
        <div class="mb-3" data-aos="fade-up" data-aos-delay="650">
          <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
          <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword2" required>
          <div class="invalid-feedback confirm_password"></div>
        </div>
        <div class="mb-3 form-check" data-aos="fade-up" data-aos-delay="655">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="showpass1()">
          <label class="form-check-label" for="exampleCheck1">Show Password</label>
        </div>
        <button type="submit" class="btn btn-secondary log">Next</button>
      </form>
      <div class="footer" data-aos="fade-up" data-aos-delay="665">
        <div class="login-pic1">
          <img src="/component/Line 1.svg">
        </div>
        <span>Have any account ?<a href="/user">click here</a></span>
      </div>
    </div>
  </div>
</body>

</html>