<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/front-style.css')}}">
    <title>ACD Performance Evaluation</title>
    <link rel="icon" href="{{asset('image/acdseal.png')}}" type="image/x-icon"> 
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body >
  <div class="container">
    <div class="avatar">
      <a href="#">
        <img src="{{asset('image/acdseal.png')}}" />
      </a>
    </div>
    <div class="content pt-1">
      <h1 class="mb-4">Performance Evaluation System</h1>
      <div class="front-buttons">
        <a href="#" class="btn btn-warning btn-login font-weight-bold rounded-pill" id="hr-login">Sign In as HR</a>
        <button class="btn dropdown-toggle m-3 font-weight-bold rounded-pill" style="background: #ffff; width: 30%;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Evaluator
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li> <a href="{{route('access-student-dashboard')}}" class="btn btn-light btn-login font-weight-bold" id="student-login">Student</a></li>
          <li><a href="{{route('access-dashboard')}}" class="btn btn-light btn-login font-weight-bold" id="student-login">Employee</a></li>
        </ul>
        <!-- {{-- <a href="#" class="btn btn-login font-weight-bold" style="background: #329ef8" id="teacher-login">Sign In as Teacher</a> --}} -->
      </div>
    </div>

    <div class="card hrlogin bg-warning shadow-lg" style="display: none">
      <div class="card-body">
      <h5 class="login-header"><b>Sign In as HR</b></h5>
      <form action="{{route('authenticatehr')}}" method="post">
          @method('post')
          @csrf
          <div class="form-group">
            <label >Username</label>
            <input type="text" name="username" class="form-control" required>
          </div>
          <div class="form-group">
              <label >Password</label>
              <input type="password" name="password" class="form-control" required>
          </div>
          <div class="form-group">
              <a href="#" class="btn btn-secondary hr-loginback">Back</a>
              <input type="submit" value="Login" class="btn btn-primary">
          </div>
      </form>
      </div>
    </div>

    <div class="card teachlogin shadow-lg" style="display: none; background:#329ef8">
        <div class="card-body">
        <h5 class="text-blue login-header"><b>Sign In as a teacher</b></h5>
        <form action="{{route('authTeacher')}}" method="post">
            @method('post')
            @csrf
            <div class="form-group">
              <label >Username</label>
              <input type="text" name="uname" class="form-control border-primary" required>
            </div>
            <div class="form-group">
              <label class="text-blue">Password</label>
              <input type="password" name="pword" class="form-control border-primary" required>
            </div>
            <div class="form-group">
                <a href="#" class="btn btn-secondary teach-loginback">Back</a>
                <input type="submit" value="Login" class="btn btn-primary">
            </div>
        </form>
        </div>
      </div>
      {{-- {{Hash::make("acdhr2020")}} --}}
    <div class="error-div">
      @if($errors->any())
        <div class="alert errorAlert" style="background:#ff9396; display:none; border-radius: 10px">
          <span class="text-danger"><b>Error!</b> {{$errors->first()}}</span>
        </div>
      @endif
    </div>  

  </div>
  <div class="footnote">
      <p class="text-center text-primary" style="opacity: 50%">Developed by <b>Ryan Arcel Galendez</b> <br>2019</p>
  </div>

    <script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script>window.jQuery || document.write("<script src='{{asset('js/jquery-3.3.1.slim.min.js')}}'><\/script>")</script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <script src="{{asset('js/feather.min.js')}}"></script>
    <script src="{{asset('js/front.js')}}"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>