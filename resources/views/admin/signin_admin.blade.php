<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
</head>
<body>
    
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" action="{{ route('admin.login') }}" method="POST">
                @csrf
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="email" name="email" class="login__input" placeholder="Email">
				</div>
                @error('email')
                    <p style="color: red">{{ $message }}</p>
                @enderror
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input name="password" type="password" class="login__input" placeholder="Password">
				</div>
                @error('password')
                    <p style="color: red">{{ $message }}</p>
                @enderror
				<button class="button login__submit" type="submit">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
		
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
</body>
</html>