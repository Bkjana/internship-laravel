<!DOCTYPE html>
<html>
<head>
  <title>Signup and Sign-in Page</title>
  <link href="{{ asset('css/home.css') }}" rel="stylesheet">
  <style>
    body {
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
  }
  
  .container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  
  .signup-section, .signin-section {
    width: 400px;
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 0 10px gray;
    margin: 0 20px;
  }
  
  h1 {
    text-align: center;
    margin-bottom: 20px;
  }
  
  form {
    display: flex;
    flex-direction: column;
  }
  
  label {
    font-weight: bold;
    margin-bottom: 10px;
  }
  
  input[type="text"], input[type="email"], input[type="password"] {
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
    border: none;
  }
  
  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
  }
  .error{
    color: red;
  }
  
  </style>
</head>
<body>
  @auth
    <h1>Welcome</h1>
  @else
    <div class="container">
      <div class="signup-section">
        <h1>Signup</h1>
        <form action="/user/signup" method="POST">
          @csrf
          <label for="username">Username:</label>
          <input type="text" id="username" name="name" required>
          <div class="error">
          @error('name')
            {{$message}}
          @enderror
          </div>
          <br>
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
          <div class="error">
          @error('email')
            {{$message}}
          @enderror
          </div>
          <br>
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
          <div class="error">
          @error('password')
            {{$message}}
          @enderror
          </div>
          <br>
          <input type="submit" value="Signup">
        </form>
      </div>
      <div class="signin-section">
        <h1>Signin</h1>
        <form action="/user/signin" method="POST">
          @csrf
          <label for="email">Email:</label>
          <input type="email" id="email" name="loginemail" required>
          <div class="error">
          @error('loginemail')
            {{$message}}
          @enderror
          </div>
          <br>
          <label for="password">Password:</label>
          <input type="password" id="password" name="loginpassword" required>
          <div class="error">
          @error('loginpassword')
            {{$message}}
          @enderror
          </div>
          <div class="error">
            @isset($invalidData)
              {{$invalidData}}
            @endisset
          </div>
          <br>
          <input type="submit" value="Signin">
        </form>
      </div>
    </div>
  @endauth
</body>
</html>
