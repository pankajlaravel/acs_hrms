<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
	<link rel="stylesheet" href="https://gt-cougar-tp.cdn.greytip.com/v6.3.0-prod-4883/themes/hound/font-awesome/css/font-awesome.min.css">
    <style>
        * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

/* Login container */
.login-container {
  background-color: white;
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 20px 8px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 400px;
  text-align: center;
}

/* Title */
h2 {
  margin-bottom: 20px;
  font-size: 24px;
}

/* Input groups */
.input-group {
  margin-bottom: 20px;
  text-align: left;
}

.input-group label {
  font-size: 14px;
  color: #333;
}

.input-group input {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 14px;
}

/* Submit button */
.submit-group {
  margin-top: 20px;
}

.submit-btn {
  width: 100%;
  padding: 12px;
  background-color: #7d42e2;
  color: rgb(238, 238, 242);
  /* font-size: 10px; */
  border: none;
  border-radius: 5px;
  font-size: 20px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.submit-btn:hover {
  background-color: #5e9ce3;
}

/* Signup text */
.signup-text {
  margin-top: 15px;
  font-size: 14px;
}

.signup-text a {
  color: #007BFF;
  text-decoration: none;
}

.signup-text a:hover {
  text-decoration: underline;
}
.forget{
    /* margin-top:70px ; */
    margin-left: 200px;
    font-size: 14px;
}
.Hover:hover{
    border: 100% 4px solid  blue;
    /* background-color: #f86565; */
    /* color: red; */
    /* border-radius: 0.5%; */
}

/* input{
    border: 4px solid black;
    border: 5%;
} */


/* Slider Container */



    </style>
</head>
<body>
    <div class="login-container">
        <h2 style="color: rgb(94, 94, 198);">ACS</span></h2>
        <h3 style="color: rgb(96, 96, 215);">Hello there!</h3>
        <form method="POST" action="{{ route('login') }}" class="login-form">
			@csrf
          <div class="input-group">
            <label style="color: rgb(96, 96, 215);" for="username">Username</label>
            <input style="" class="Hover" type="email" name="email" :value="old('email')" id="username"  required>
			<x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>
          <div class="input-group">
            <label style="color: rgb(96, 96, 215);" for="password">Password</label>
            <input class="Hover"  type="password" id="password" name="password" required placeholder="Enter your password">
          </div>
          {{-- <div class="forget"><span style="color: blue;">Forgot password?</span></div> --}}
          <div class="submit-group">
            <button type="submit" class="submit-btn">Log-in</button>
          </div>
          <!-- <p class="signup-text">Don't have an account? <a href="#">Sign up</a></p> -->
        </form>
    
      </div>

  <!-- SLIDER -->

  <div class="slider-container">
    <div class="slider">
      <div class="slide" style=" margin-left:10px ;  box-shadow: 0 20px 8px rgba(0, 0, 0, 0.1);; "><img style="height: 373px; width: 390px;" src="https://www.instanceit.com/assets/images/services/hrms/hrms-overview.webp" alt="Image 1"></div>
    
    </div>
  </div>
     
    
</body>
</html>