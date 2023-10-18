<div class="login-header box-shadow">
	<div class="container-fluid d-flex justify-content-between align-items-center">
		<div class="brand-logo">
			<div class="header-left">
				<div class="menu-icon dw dw-menu"></div>
				<?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); ?>
				<h4>
					<?= $uriSegments[2] ?>
				</h4>
			</div>
		</div>
		<div class="login-menu">
		<div class="header-right">
		<div class="dashboard-setting user-notification">
			<div class="dropdown">
				<a class="dropdown-toggle no-arrow" href="<?= base_url() . 'home' ?>" title="Home">
					<i class="icon-copy dw dw-home"></i>
				</a>
			</div>
			<div class="user-notification">
			</div>
		</div>
		</div>
		</div>
	</div>
</div>
