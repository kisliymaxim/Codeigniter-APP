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
			<a class="navbar-brand" href="{$base_url}">Тестовое задание</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li>
					<a href="{$base_url}">Главная</a>
				</li>
				<li>
					<a href="{$base_url}contacts">Контакты</a>
				</li>
				{if isset($uid)}
					<li>
						<a href="{$base_url}dashboard">Личный кабинет</a>
					</li>
					<li>
						<a href="{$base_url}main/logout" id="logout">Выйти</a>
					</li>
				{else}
					<li>
						<a href="#" id="auth">Войти</a>
					</li>
				{/if}
			</ul>
			<ul class="nav navbar-nav navbar-right">
				{if isset($uid)}
					<li>
						<div class="user_info">
							{if !empty($userdata['avatar'])}
								<img class="avatar" src="{$upl_url}{$userdata['avatar']}"/>
							{else}
								<img class="avatar" src="{$img_url}user_logo.svg"/>
							{/if}
							<span>{$user_initial}</span>
						</div>
					</li>
				{/if}
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav>