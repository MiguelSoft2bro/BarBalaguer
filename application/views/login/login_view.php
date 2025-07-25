<div class="login app-pages app-section">
		<div class="container">
			<div class="pages-title">
				<h3>Login</h3>
			</div>
			<form action="#">
				<input type="email" placeholder="Email">
				<input type="password" placeholder="password">
				<div><a href="" class="forgot">Forgot Password?</a></div>
				<div class="chebox">
					<input type="checkbox" id="checkbox">
  					<label for="checkbox">Remember me</label>
				</div>
				<button class="button">Login</button>
				<div class="create-account">Not Registered? <a href="">Create an account</a></div>
			</form>
			<div class="or">
				<h5>OR</h5>
				<button class="button facebook">Login with Facebook</button>
				<button class="button twitter">Login with Twitter</button>
				<button class="button google">Login with Google+</button>
			</div>
		</div>
	</div>
	




	

	<div class="container" style="margin-top: 5%;">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1  col-sm-8-login col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-body">
						<div class="panel-heading">
						<i class="fa fa-sign-in"></i> <?= lang('login') ?>
					</div>
						<?php if (isset($message)): ?>
							<div class="alert bg-<?= $msg_style ?>" role="alert">
								<em style="color: #FFF" class="fa fa-lg fa-<?= $msg_icon ?>">&nbsp;</em>
								<span style="color: #FFF"> <?= $message ?></span>
								<a href="#" class="pull-right">
									<em class="fa fa-lg fa-close"></em>
								</a>
							</div>
						<?php endif ?>
						<?= form_open('login') ?>
						<div class="form-group">
						<!-- 	<?= form_label(lang('username').': ', 'username') ?> -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user-circle"></i>
								</div>
								<?= form_input(
									'username',
									!isset($username) ? set_value('username') : $username,
									array('id' => 'username', 'class' => 'form-control','placeholder' => lang('username'))

								) ?>
							</div>
							<?= form_error('username'); ?>
						</div>
						<div class="form-group">
							<!-- <?= form_label(lang('password').': ', 'password') ?> -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-keyboard-o"></i>
								</div>
								<?= form_password(
									'password',
									!isset($password) ? set_value('password') : $password,
									array('id' => 'password', 'class' => 'form-control','placeholder' => lang('password'))
								) ?>
							</div>
							<?= form_error('password'); ?>
						</div>
						<?= form_button(array(
								'type' => 'submit',
								'content' => '<i class="fa fa-sign-in"></i> '.lang('login_enter'),
								'name' => 'enviar',
								'value' => 'true',
								'class' => 'btn btn-lg btn-primary',

							)
						) ?>
						<?= form_close() ?>


					</div>

				</div>
			
			</div>
		</div>
	</div>
