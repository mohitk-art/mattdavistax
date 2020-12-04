<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="{{ url('assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
	</head>

	<body>

<div class="app">
		<div class="bg"></div>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

            <form method="POST" action="{{ route('login') }}" class="form">
                @csrf

			<header>
				<img src="https://assets.codepen.io/3931482/internal/avatars/users/default.png?format=auto&height=80&version=1592223909&width=80">
			</header>

			<div class="inputs">
				<input type="email" name="email" placeholder="Enter Email" :value="old('email')" required autofocus>
				<input type="password" name="password" placeholder="Enter Password" required autocomplete="current-password">

				<p class="light"><a href="#">Forgot password?</a></p>
			</div>
            <br><br><br>
            <button type="submit" name="Login" value="Submit">Login</button>
		</form>

		<footer>


			<p>Don't have an account? <a href="sign-up.html">Sign Up</a></p>
		</footer>


	</div>
</body>
</html>
