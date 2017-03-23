<?php
/* Smarty version 3.1.30, created on 2017-03-23 02:11:08
  from "C:\OpenServer\domains\codeonward\application\views\dashboard.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58d3048c9b88f7_75996408',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5686551bc23c1ca22c4cb64d723df2c09973ddde' => 
    array (
      0 => 'C:\\OpenServer\\domains\\codeonward\\application\\views\\dashboard.tpl',
      1 => 1490223578,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58d3048c9b88f7_75996408 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
	<h1 class="col-md-12 page-header">Личный кабинет</h1>

	<form id="update-form" method="post" class="form-horizontal" role="form">
		<!-- left column -->
		<div class="col-md-4">
			<div class="text-center">
				<?php if (empty($_smarty_tpl->tpl_vars['userdata']->value['avatar'])) {?>
					<img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
user_logo.svg" class="avatar img-thumbnail" alt="avatar">
					<h6>Загрузите аватар...</h6>
				<?php } else { ?>
					<img src="<?php echo $_smarty_tpl->tpl_vars['upl_url']->value;
echo $_smarty_tpl->tpl_vars['userdata']->value['avatar'];?>
" class="avatar img-thumbnail" alt="avatar">
					<input type="hidden" name="avatar_original" value="<?php echo $_smarty_tpl->tpl_vars['userdata']->value['avatar'];?>
">
					<h6>Обновить аватар...</h6>
				<?php }?>
				<input type="file" name="avatar" id="avatar" accept="image/jpeg,image/png,image/gif" class="form-control text-center center-block well well-sm">
			</div>
		</div>
		<!-- edit form column -->
		<div class="col-md-8 personal-info">
			<h3>Изменить данные о себе</h3>
			<div class="form-group">
				<label class="col-md-3 control-label">Фамилия:</label>
				<div class="col-md-8">
					<input type="text" name="lastname" id="lastname" value="<?php echo $_smarty_tpl->tpl_vars['userdata']->value['lastname'];?>
" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Имя:</label>
				<div class="col-md-8">
					<input type="text" name="firstname" id="firstname" value="<?php echo $_smarty_tpl->tpl_vars['userdata']->value['firstname'];?>
" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Email:</label>
				<div class="col-md-8">
					<input type="email" name="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['userdata']->value['email'];?>
" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Дата рождения:</label>
				<div class="col-md-8">
					<input type="text" name="birthday" id="birthday" value="<?php echo $_smarty_tpl->tpl_vars['userdata']->value['birthday'];?>
" class="form-control datepickerr">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Мобильный телефон:</label>
				<div class="col-md-8">
					<input type="text" name="phone" id="phone" value="<?php echo $_smarty_tpl->tpl_vars['userdata']->value['phone'];?>
" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label">Логин:</label>
				<div class="col-md-8">
					<input type="text" name="username" id="username" value="<?php echo $_smarty_tpl->tpl_vars['userdata']->value['username'];?>
" class="form-control">
					<input type="hidden" id="username_original" value="<?php echo $_smarty_tpl->tpl_vars['userdata']->value['username'];?>
">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Пароль:</label>
				<div class="col-md-8">
					<input type="password" name="password" id="password" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Повторите пароль:</label>
				<div class="col-md-8">
					<input type="password" name="confirm_password" id="confirm_password" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"></label>
				<div class="col-md-8">
					<input class="btn btn-primary" value="Сохранить изменения" type="submit">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmModal">Удалить свой аккаунт</button>
				</div>
			</div>
		</div>
	</form>
	<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="vertical-alignment-helper">
			<div class="modal-dialog vertical-align-center" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Подтверждение</h4>
					</div>
					<div class="modal-body">
						Вы действительно хотите удалить свой аккаунт ?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
						<button type="button" class="btn btn-primary" id="delete_account">Да</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><?php }
}
