<?php
echo form_open('auth/login');
?>
<div class="wrapper">
	<div class="container">
		<div class="row">
			<div class="module module-login span4 offset4">
				<form class="form-vertical">
					<div class="module-head">
						<h3>Sign In</h3>
					</div>
					<div class="module-body">
						<div class="control-group">
							<div class="controls row-fluid">
								<input class="span12" type="text" name="username" placeholder="Username">
							</div>
						</div>
						<div class="control-group">
							<div class="controls row-fluid">
								<input class="span12" type="password" name="password" placeholder="Password">
							</div>
						</div>
					</div>
					<div class="module-foot">
						<div class="control-group">
							<div class="controls clearfix">
								<button type="submit" name="submit" class="btn btn-primary pull-right">Login</button>
								<?php echo anchor('auth/register','Register') ?>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>