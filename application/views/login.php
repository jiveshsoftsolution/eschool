<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>UDT eSchool | Login Page</title>
		<?php echo $this->load->view('common/scripts');?>
	</head>
	<body class="grdnt_a login_bg">
		<div style="background-color:rgba(255,255,255,0.5);position:fixed;top:0;left:0;right:0;bottom:0;width:100%;height:100%;"></div>
		<div class="container">
			<div class="row">
				<div class="eight columns centered"> </div>
			</div>
			<div class="row">
				<div class="six columns centered">
					<div class="login_box">
						<div class="lb_content">
							<div class="login_logo">
								<div style="float:left;"><img src="<?php echo base_url()?>assets/assets/img/L_15236.gif" alt="" /></div>
								<div class="login_logo_text">
									<h1>UDT eSchool</h1>
								</div>
							</div>
							<div class="cf">
								<h2 class="lb_ribbon lb_blue"><span>Login to School Portal</span><span style="display:none">New password</span></h2>
								<a href="#" class="right small sl_link"> <span>Forgot your password?</span> <span style="display:none">Back to login form</span> </a> 
							</div>
							<div class="row m_cont">
								<div class="eight columns centered">
									<div class="l_pane">
										<form action="<?php echo base_url()?>index.php/user" method="post" class="nice" id="l_form">
											<div class="sepH_c">
												<div class="elVal">
													<label for="username">Username</label>
													<input type="text" id="username" name="login_id" class="expand input-text" placeholder="Login ID" />
												</div>
												<div class="elVal">
													<label for="password">Password</label>
													<input type="password" id="password" name="password" class="expand input-text" placeholder="Password" />
												</div>
											</div>
											<div class="cf">
												<label for="remember" class="left">
												<input type="checkbox" id="remember">
												Remember me</label>
												<input type="submit" class="button small radius right black" value="Login" />
											</div>
										<?php if(!empty($errorInfo)) { ?><div class="cf" style="color: #fff;font-size: 14px !important; font-weight: 600; line-height: 20px !important; font-family: 'Open Sans',sans-serif;padding:5px 5px 5px 10px;background-color:#FFAB25"><?php echo $errorInfo." .";?></div> <?php }?>
										</form>
									</div>
									<div class="l_pane" style="display:none">
										<form action="dashboard.html" method="post" class="nice" id="rp_form">
											<div class="sepH_c">
												<p class="sepH_b">Please enter your email address. You will receive a link to create a new password via email.</p>
												<div class="elVal">
													<label for="upname">E-mail:</label>
													<input type="text" id="upname" name="upname" class="expand input-text" />
												</div>
											</div>
											<div class="cf">
												<input type="submit" class="button small radius right black" value="Get new password" />
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>