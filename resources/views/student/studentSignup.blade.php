<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Signup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <h1 class="text-center">Student Sign Up</h1>
    <form action="{{url('/')}}/stusignup" method="POST" class="container border border-light bg-dark text-light col-md-6 rounded p-5">
      @csrf
      <div class="form-group">
        <label for="inputEmail4">Name</label>
        <input type="text" class="form-control" id="inputEmail4" placeholder="Name" name="stuname" value="{{old('stuname')}}">
      
      <span class="text-danger">
        @error("stuname")
            {{$message}}
        @enderror
    </span>
  </div>
      <div class="form-group">
        <label for="inputEmail4">Email</label>
        <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="stuemail" value="{{old('stuemail')}}">
      <span class="text-danger">
        @error("stuemail")
            {{$message}}
        @enderror
    </span>
  </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">password</label>
            <input type="password" class="form-control" id="inputEmail4" placeholder="Name@123" name="stupass">
          <span class="text-danger">
            @error("stupass")
                {{$message}}
            @enderror
        </span>
      </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Confirm Password</label>
            <input type="password" class="form-control" id="inputPassword4" placeholder="Name@123" name="stuconpass">
          <span class="text-danger">
            @error("stuconpass")
                {{$message}}
            @enderror
        </span>
      </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="stuadd" value="{{old('stuadd')}}">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Institute</label>
            <input type="text" class="form-control" id="inputCity" name="stuinstitute" placeholder="ABC school" value="{{old('stuinstitute')}}">
          </div>
          <div class="form-group col-md-6">
            <label for="inputZip">Institute Address</label>
            <input type="text" class="form-control" id="inputZip" name="stuInsAdd" placeholder="1234 main st" value="{{old('stuInsAdd')}}">
          </div>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck" name="stucheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
          <span class="text-danger">
            @error("stucheck")
                {{$message}}
            @enderror
        </span>
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
      </form>
</body>
</html>