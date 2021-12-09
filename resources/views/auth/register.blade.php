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
		@if($errors->any())
		<ul>
			@foreach ($errors->all() as $error)
			<li class="danger">{{$error}}</li>
			@endforeach	
		
				
			
		</ul>
		@endif
		<div class="sign-up">
			<form action="#">
				<h1>Create Account</h1>
				<!-- <div class="icon-container">
					<a href="https://www.facebook.com/" class="icon"><i class="fab fa-facebook-f"></i></a>
					<a href="https://www.facebook.com/" class="icon"><i class="fab fa-google-plus-g"></i></a>
					<a href="https://www.linkedin.com/" class="icon"><i class="fab fa-linkedin-in"></i></a>
				</div> -->
				
				<input type="text" name="txt" placeholder="Username" required>
				<input type="email" name="email" placeholder="E-mail" required>

				<label for="Passimage">PassImage</label>
				<input type="file" name="pswd" placeholder="Password" required>

				
				 <br><br>
				<button type="Sign Up" class="button button1">Sign Up</button>
			</form>