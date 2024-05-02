<?php echo validation_errors(); ?>
<?php echo form_open('auth/proses_register'); ?>
<div class="wrapper">
    <div class="container">
        <div class="row">
        <div class="module module-login span4 offset4">
				<form class="form-vertical">
					<div class="module-head">
						<h3>Register</h3>
					</div>
					<div class="module-body">
						<div class="control-group">
							<div class="controls row-fluid">
                            <label>Nama Lengkap</label>
                            <input class="span12" type="text" name="nama_user" placeholder="Masukan Nama Lengkap" 
                            value="<?php echo set_value('username'); ?>" required>
							</div>
						</div>
                        <div class="control-group">
							<div class="controls row-fluid">
                                <label>No Handphone</label>
                                <input class="span12" type="text" name="no_hp" placeholder="Masukan No Handphone" 
                                value="<?php echo set_value('username'); ?>" required>
							</div>
						</div>
                        <div class="control-group">
							<div class="controls row-fluid">
                                <label>Alamat Lengkap</label>
                                <input class="span12" type="text" name="alamat" placeholder="Masukan Alamat Lengkap"
                                value="<?php echo set_value('username'); ?>" required>
							</div>
						</div>
                        <div class="control-group">
							<div class="controls row-fluid">
                                <label>Username</label>
                                <input class="span12" type="text" name="username" placeholder="Masukan Username"
                                value="<?php echo set_value('username'); ?>" required>
							</div>
						</div>
						<div class="control-group">
							<div class="controls row-fluid">
                                <label for="password">Password</label>
                                <input class="span12" type="password" name="password" placeholder="Masukan Password" required><br>
							</div>
						</div>
					</div>
					<div class="module-foot">
						<div class="control-group">
							<div class="controls clearfix">
                            <?php echo anchor('auth/login','Kembali',array('class'=>'btn btn-danger'))?>
                                <input type="submit" name="submit" value="Register" class="btn btn-primary pull-right">
                                <?php echo form_close(); ?>
							</div>
						</div>
					</div>
				</form>
			</div>
									

                                    

                                    

                                    
                                    
                                    

                                    

</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>