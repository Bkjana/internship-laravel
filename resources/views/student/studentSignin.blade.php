<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Signin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <h1 class="text-center">Student Sign In</h1>
    <form action="{{url('/')}}/stusignin" method="POST" class="container border border-light bg-dark text-light col-md-6 rounded p-5">
      @csrf
      <div class="form-group">
        <label for="inputEmail4">Email</label>
        <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="stuemail">
        <span class="text-danger">
          @error("stuemail")
              {{$message}}
          @enderror
      </span>
      </div>
        <div class="form-group">
          <label for="inputEmail4">password</label>
          <input type="password" class="form-control" id="inputEmail4" placeholder="Name@123" name="stupass">
          <span class="text-danger">
            @error("stupass")
                {{$message}}
            @enderror
        </span>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
            <span class="text-danger">
              @error("stucheck")
                  {{$message}}
              @enderror
          </span>
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <button type="submit" class="btn btn-primary">Sign In</button>
          <a href="/stusignup"><div class="text-primary">Create Account</div></a>
        </div>
        <div>
          <h3 class="text-danger text-center">
            @isset($message)
              {{$message}}
            @endisset
            {{-- @php
              if(isset($message)){
                echo $message;
              }
            @endphp --}}
          </h3>
        </div>
      </form>
</body>
</html>