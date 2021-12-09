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
			<form action="/register" method="POST">
				@csrf
				<h1>Create Account</h1>
				<!-- <div class="icon-container">
					<a href="https://www.facebook.com/" class="icon"><i class="fab fa-facebook-f"></i></a>
					<a href="https://www.facebook.com/" class="icon"><i class="fab fa-google-plus-g"></i></a>
					<a href="https://www.linkedin.com/" class="icon"><i class="fab fa-linkedin-in"></i></a>
				</div> -->
				<input type="text" name="name" placeholder="Name" required>
				<input type="email" name="email" placeholder="E-mail" required>
				<input type="password" name="password" id="password">
				<label for="Passimage">PassImage</label>
				<input type="file" name="passimg" placeholder="Upload a Password photo" required>				
				 <br><br>
				<button type="Sign Up" class="button button1">Sign Up</button>
			</form>
		</div>
		<div class="sign-in">
			<form action="/login">
				<h1>Sign in to Steg</h1>
				<!-- <div class="icon-container">
					<a href="https://www.facebook.com/" class="icon"><i class="fab fa-facebook-f"></i></a>
					<a href="https://www.facebook.com/" class="icon"><i class="fab fa-google-plus-g"></i></a>
					<a href="https://www.linkedin.com/" class="icon"><i class="fab fa-linkedin-in"></i></a>
				</div> -->
				<input type="file" name="pswd" placeholder="Password" required>
				<label class="forgot-password"><a >Forget Passimage?</a></label>
                <input type="checkbox"> <label class="form-remember">Remember me</label>
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
			main.classList.add("right-panel-active");
		});
		signInButton.addEventListener('click', () => {
			main.classList.remove("right-panel-active");
		});
// 		var owl = $('.owl-carousel');
// owl.owlCarousel({
//     items:1,
//     nav:true,
//     dots:true,
//     loop:true,
//     margin:10,
//     autoplay:true,
//     autoplayTimeout:3000,
//     autoplayHoverPause:true,
// });
// $('.play').on('click',function(){
//     owl.trigger('play.owl.autoplay',[3000])
// })
// $('.stop').on('click',function(){
//     owl.trigger('stop.owl.autoplay')
// })

</script>
</body>
</html>