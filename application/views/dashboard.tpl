<div class="row">
	<h1 class="col-md-12 page-header">Личный кабинет</h1>

	<form id="update-form" method="post" class="form-horizontal" role="form">
		<!-- left column -->
		<div class="col-md-4">
			<div class="text-center">
				{if empty($userdata['avatar'])}
					<img src="{$img_url}user_logo.svg" class="avatar img-thumbnail" alt="avatar">
					<h6>Загрузите аватар...</h6>
				{else}
					<img src="{$upl_url}{$userdata['avatar']}" class="avatar img-thumbnail" alt="avatar">
					<input type="hidden" name="avatar_original" value="{$userdata['avatar']}">
					<h6>Обновить аватар...</h6>
				{/if}
				<input type="file" name="avatar" id="avatar" accept="image/jpeg,image/png,image/gif" class="form-control text-center center-block well well-sm">
			</div>
		</div>
		<!-- edit form column -->
		<div class="col-md-8 personal-info">
			<h3>Изменить данные о себе</h3>
			<div class="form-group">
				<label class="col-md-3 control-label">Фамилия:</label>
				<div class="col-md-8">
					<input type="text" name="lastname" id="lastname" value="{$userdata['lastname']}" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Имя:</label>
				<div class="col-md-8">
					<input type="text" name="firstname" id="firstname" value="{$userdata['firstname']}" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Email:</label>
				<div class="col-md-8">
					<input type="email" name="email" id="email" value="{$userdata['email']}" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Дата рождения:</label>
				<div class="col-md-8">
					<input type="text" name="birthday" id="birthday" value="{$userdata['birthday']}" class="form-control datepickerr">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Мобильный телефон:</label>
				<div class="col-md-8">
					<input type="text" name="phone" id="phone" value="{$userdata['phone']}" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label">Логин:</label>
				<div class="col-md-8">
					<input type="text" name="username" id="username" value="{$userdata['username']}" class="form-control">
					<input type="hidden" id="username_original" value="{$userdata['username']}">
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
</div>