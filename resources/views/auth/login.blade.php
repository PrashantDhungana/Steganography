<!DOCTYPE html>
<html>
<head>
	<title>Steganography</title>
	<link rel="stylesheet" type="text/css" href="/css/form.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>
<body>
<div class="container" id="main">

	@if(Session::has('success'))

	<div class="alert alert-success">

		{{ Session::get('success') }}

		@php

			Session::forget('success');

		@endphp

	</div>

	@endif
		<div class="sign-up">
			<form action="/register" method="POST" enctype="multipart/form-data">
				@csrf
				<h1>Create Account</h1>
				<!-- <div class="icon-container">
					<a href="https://www.facebook.com/" class="icon"><i class="fab fa-facebook-f"></i></a>
					<a href="https://www.facebook.com/" class="icon"><i class="fab fa-google-plus-g"></i></a>
					<a href="https://www.linkedin.com/" class="icon"><i class="fab fa-linkedin-in"></i></a>
				</div> -->
				<input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
				@error('name')
					<span>{{ $message}}</span>	
				@enderror
				<input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
				@error('email')
					<span>{{ $message}}</span>	
				@enderror
				
				<label for="Passimage">PassImage</label>
				<input type="file" name="passimg" placeholder="Upload a Password photo" required>
				@error('passimg')
					<span>{{ $message}}</span>	
				@enderror
				 <br><br>
				<button type="Sign Up" class="button button1">Sign Up</button>
			</form>
		</div>
		<div class="sign-in">

			<form method="POST" action="/login" enctype="multipart/form-data">

				@csrf

				<h1>Sign in to Steg</h1>
				<!-- <div class="icon-container">
					<a href="https://www.facebook.com/" class="icon"><i class="fab fa-facebook-f"></i></a>
					<a href="https://www.facebook.com/" class="icon"><i class="fab fa-google-plus-g"></i></a>
					<a href="https://www.linkedin.com/" class="icon"><i class="fab fa-linkedin-in"></i></a>
				</div> -->
				Email
				<input type="email" name="loginemail" id="email" placeholder="ex.test@test.com">
				@error('loginemail')
					<div class="alert alert-danger">
						{{$message}}
					</div>
				@enderror

				ImagePass:
				<input type="file" name="loginpassimg" required>
				@error('loginpassimg')
					<div class="alert alert-danger">
						{{$message}}
					</div>
				@enderror

				<label class="forgot-password"><a >Forget Passimage?</a></label>
                <input type="checkbox" name="remember"> <label class="form-remember">Remember me</label>
				<br><br><br>
				<button type="Sign in" class="button button2">Sign in</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-left">
					<button id="signIn">Sign In</button>
					<div class="owl-carousel owl-theme " style="display: block;">
						<img src="img/im (1).png" style="width:90%;margin: 80px  0px -20px 20px;">
						<!-- <img src="img/Le 2.png" style="width:90%;margin: 80px  0px -20px 20px;">
						<img src="img/Le 3.png" style="width:90%;margin: 60px  0px -20px 20px;"> -->
				</div>
				</div>
				<div class="overlay-right">
					<button id="signUp">Sign Up</button>
					<div class="owl-carousel owl-theme " style="display: block;">
						<img src="img/im (5).png" style="width:95%;margin: 103px 0px -20px 30px;">
						<!-- <img src="img/Le 2.png" style="width:90%;margin: 80px 0px -20px 30px;">
						<img src="img/Le 3.png" style="width:90%;margin: 60px 0px -20px 15px;"> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"> </script>
	<script type="text/javascript">
		const signUpButton = document.getElementById('signUp');
		const signInButton = document.getElementById('signIn');
		const main = document.getElementById('main');

		signUpButton.addEventListener('click', () => {
			localStorage.setItem('loginActiveTab', 'login');
			main.classList.add("right-panel-active");
		});
		signInButton.addEventListener('click', () => {
			localStorage.setItem('loginActiveTab', 'signup');
			main.classList.remove("right-panel-active");
		});

		var activeTab = localStorage.getItem('loginActiveTab');

		if(activeTab == "login")
		{
			main.classList.add("right-panel-active");
		}
		else
			main.classList.remove("right-panel-active");

</script>
</body>
</html>