<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>{$page_title}</title>

	<script>
		var base_url = "{$base_url}";
		{if isset($uid)}var uid = "{$uid}"{/if};
	</script>

	<!-- Bootstrap Core CSS -->
	<link href="{$css_url}bootstrap.min.css" rel="stylesheet">
	<link href="{$css_url}bootstrap-datepicker.css" rel="stylesheet">
	<link href="{$css_url}bootstrapValidator.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="{$css_url}site.css" rel="stylesheet">

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<div class="wrapper">
	<!-- Navigation -->
	{$navbar}

	<!-- Page Content -->
	<div class="container">{$content}</div>

	<!-- Footer -->
	<div class="fix_footer"></div>
	<div class="footer">
		<hr>
		<footer>
			<div class="container">
				<div class="col-lg-12">
					<p>Copyright &copy; Тестовое задание 2017</p>
				</div>
			</div>
		</footer>
	</div>

	<div class="modal fade" id="auth_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="gridSystemModalLabel">Авторизация</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-login">
								<div class="panel-heading text-center">
									<div class="row">
										<div class="col-md-6">
											<a href="#" class="active" id="login-form-link">Войти</a>
										</div>
										<div class="col-md-6">
											<a href="#" id="register-form-link">Зарегистрироваться</a>
										</div>
									</div>
									<hr>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-12">
											<form id="login-form" action="" method="post" role="form" style="display: block;">
												<div class="alert alert-danger" style="display: none">
													<a href="#" class="close">&times;</a>
													<strong></strong> <span></span>
												</div>
												<div class="form-group">
													<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Логин" value="">
												</div>
												<div class="form-group">
													<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Пароль">
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-12 text-center">
															<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="btn btn-primary" value="Войти">
														</div>
													</div>
												</div>
											</form>
											<form id="register-form" method="post" role="form" style="display: none;">
												<div class="form-group">
													<input type="text" name="lastname" id="lastname" class="form-control" placeholder="Фамилия">
												</div>
												<div class="form-group">
													<input type="text" name="firstname" id="firstname" class="form-control" placeholder="Имя">
												</div>
												<div class="form-group">
													<input type="text" name="username" id="username" class="form-control" placeholder="Логин">
												</div>
												<div class="form-group">
													<input type="email" name="email" id="email" class="form-control" placeholder="Email">
												</div>
												<div class="form-group">
													<input type="text" name="birthday" id="birthday" class="form-control datepickerr" placeholder="Дата рождения">
												</div>
												<div class="form-group">
													<input type="text" name="phone" id="phone" class="form-control" placeholder="Мобильный телефон">
												</div>
												<div class="form-group">
													<input type="password" name="password" id="password" class="form-control" placeholder="Пароль">
												</div>
												<div class="form-group">
													<input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Повторите пароль">
												</div>
												<div class="form-group">
													<div id="recaptcha"></div>
													<input type="hidden" name="recaptcha_valid">
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-12 text-center">
															<input type="submit" name="register-submit" id="register-submit" class="btn btn-primary" value="Зарегистрироваться">
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<div class="modal fade" id="message_modal" tabindex="-1" role="dialog">
		<div class="vertical-alignment-helper">
			<div class="modal-dialog vertical-align-center" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<p></p>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
	</div><!-- /.modal -->

	<!-- jQuery -->
	<script src="{$js_url}jquery.js"></script>
	<script src="{$js_url}jquery.mask.min.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="{$js_url}bootstrap.min.js"></script>
	<script src="{$js_url}bootstrapValidator.min.js"></script>
	<script src="{$js_url}datepicker/bootstrap-datepicker.js"></script>
	<!-- reCAPTCHA -->
	<script src="https://www.google.com/recaptcha/api.js?onload=recaptchaCallback&render=explicit" async defer></script>
	<script src="{$js_url}site.js"></script>
</div>
</body>
</html>
