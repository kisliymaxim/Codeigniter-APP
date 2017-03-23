<?php
/* Smarty version 3.1.30, created on 2017-03-23 03:09:09
  from "C:\OpenServer\domains\codeonward\application\views\contacts.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58d312250f5258_44308697',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9aaac557e81e7d942987a1395f56e71dc7c74b8b' => 
    array (
      0 => 'C:\\OpenServer\\domains\\codeonward\\application\\views\\contacts.tpl',
      1 => 1490227740,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58d312250f5258_44308697 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
	<div class="container">
		<div class="col-md-6 col-md-offset-3">
			<div class="contact_page">
				<form id="callback-form" method="post" class="form-horizontal" role="form">
					<h3 class="text-center">Форма обратной связи</h3>
					<div class="form-group">
						<input type="text" class="form-control" id="name" name="name" placeholder="Имя">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="email" name="email" placeholder="Email">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="phone" name="phone" placeholder="Номер телефона">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="subject" name="subject" placeholder="Суть вопроса">
					</div>
					<div class="form-group">
						<textarea class="form-control" id="message" name="message" placeholder="Текст вопроса" rows="7"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Отправить</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div><?php }
}
