<?php require_once 'header.php' ?>
<title>Login</title>
<div class="ui middle aligned center aligned grid container">
	<div class="row">
		<div class="column">
			<h2 class="ui teal image header">
				<!-- <img src="assets/images/logo.png" class="image"> -->
				<div class="content">
					Log-in to your account
				</div>
			</h2>
			<div class="ui grid login">
				<div class="five wide column"></div>
				<div class="six wide column">
					<form class="ui large form">
						<div class="ui stacked segment">
							<div class="field">
								<div class="ui left icon input">
									<i class="user icon"></i>
									<input type="text" name="email" placeholder="E-mail address">
								</div>
							</div>
							<div class="field">
								<div class="ui left icon input">
									<i class="lock icon"></i>
									<input type="password" name="password" placeholder="Password">
								</div>
							</div>
							<div class="ui fluid large teal submit button">Login</div>
						</div>
						<div class="ui error message"></div>
					</form>
				</div>
			</div>
			<div class="ui grid login">
				<div class="five wide column"></div>
				<div class="six wide column">
					<div class="ui message">
						New to us? <a href="#">Sign Up</a>
					</div>
				</div>	
			</div>
		</div>
	</div>
</div>
<?php require_once 'footer.php' ?>