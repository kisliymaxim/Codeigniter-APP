<?php
/* Smarty version 3.1.30, created on 2017-03-22 14:17:39
  from "C:\OpenServer\domains\codeonward\application\views\navbar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58d25d53b93384_89280588',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c769794dda1287ef2b438cc4918792f1fa4d7f4' => 
    array (
      0 => 'C:\\OpenServer\\domains\\codeonward\\application\\views\\navbar.tpl',
      1 => 1490181458,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58d25d53b93384_89280588 (Smarty_Internal_Template $_smarty_tpl) {
?>
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">Тестовое задание</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li>
					<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">Главная</a>
				</li>
				<li>
					<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
contacts">Контакты</a>
				</li>
				<?php if (isset($_smarty_tpl->tpl_vars['uid']->value)) {?>
					<li>
						<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
dashboard">Личный кабинет</a>
					</li>
					<li>
						<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
main/logout" id="logout">Выйти</a>
					</li>
				<?php } else { ?>
					<li>
						<a href="#" id="auth">Войти</a>
					</li>
				<?php }?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_smarty_tpl->tpl_vars['uid']->value)) {?>
					<li>
						<div class="user_info">
							<?php if (!empty($_smarty_tpl->tpl_vars['userdata']->value['avatar'])) {?>
								<img class="avatar" src="<?php echo $_smarty_tpl->tpl_vars['upl_url']->value;
echo $_smarty_tpl->tpl_vars['userdata']->value['avatar'];?>
"/>
							<?php } else { ?>
								<img class="avatar" src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
user_logo.svg"/>
							<?php }?>
							<span><?php echo $_smarty_tpl->tpl_vars['user_initial']->value;?>
</span>
						</div>
					</li>
				<?php }?>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav><?php }
}
