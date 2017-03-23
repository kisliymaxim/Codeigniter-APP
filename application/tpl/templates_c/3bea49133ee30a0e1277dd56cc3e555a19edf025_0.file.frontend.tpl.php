<?php
/* Smarty version 3.1.30, created on 2017-03-23 02:35:18
  from "C:\OpenServer\domains\codeonward\application\views\frontend.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58d30a36a3cbf7_29136404',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3bea49133ee30a0e1277dd56cc3e555a19edf025' => 
    array (
      0 => 'C:\\OpenServer\\domains\\codeonward\\application\\views\\frontend.tpl',
      1 => 1490225714,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58d30a36a3cbf7_29136404 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</title>

	<?php echo '<script'; ?>
>
		var base_url = "<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
";
		<?php if (isset($_smarty_tpl->tpl_vars['uid']->value)) {?>var uid = "<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
"<?php }?>;
	<?php echo '</script'; ?>
>

	<!-- Bootstrap Core CSS -->
	<link href="<?php echo $_smarty_tpl->tpl_vars['css_url']->value;?>
bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $_smarty_tpl->tpl_vars['css_url']->value;?>
bootstrap-datepicker.css" rel="stylesheet">
	<link href="<?php echo $_smarty_tpl->tpl_vars['css_url']->value;?>
bootstrapValidator.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="<?php echo $_smarty_tpl->tpl_vars['css_url']->value;?>
site.css" rel="stylesheet">

	<!--[if lt IE 9]>
	<?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
	<![endif]-->
</head>
<body>
<div class="wrapper">
	<!-- Navigation -->
	<?php echo $_smarty_tpl->tpl_vars['navbar']->value;?>


	<!-- Page Content -->
	<div class="container"><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</div>

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
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.mask.min.js"><?php echo '</script'; ?>
>
	<!-- Bootstrap JavaScript -->
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
bootstrap.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
bootstrapValidator.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
datepicker/bootstrap-datepicker.js"><?php echo '</script'; ?>
>
	<!-- reCAPTCHA -->
	<?php echo '<script'; ?>
 src="https://www.google.com/recaptcha/api.js?onload=recaptchaCallback&render=explicit" async defer><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
site.js"><?php echo '</script'; ?>
>
</div>
</body>
</html>
<?php }
}
