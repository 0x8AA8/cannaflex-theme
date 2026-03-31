{if !$logged}

<div id="loginFormSmart" class="dor-formsmart">
	<span class="button b-close"><span>X</span></span>
	<form id="login-form" action="{if isset($urls.force_ssl) && $urls.force_ssl}{$urls.base_url_ssl}{else}{$urls.base_url}{/if}{if $iso_code_lang == 'es'}iniciar-sesion{else}login{/if}" method="post">
		<h2 class="title-heading"><img src="{if isset($urls.force_ssl) && $urls.force_ssl}{$urls.base_url_ssl}{else}{$urls.base_url}{/if}modules/dor_smartuser/img/logo.png" alt=""></h2>
		<h3>{l s='WELCOME TO OUR WONDERFUL WORLD' d='Modules.Dorsmartuser.Shop'}</h3>
		<p class="smart-sign-txt">{l s='Did you know that we ship to over' d='Modules.Dorsmartuser.Shop'} <span>{l s='24 different countries' d='Modules.Dorsmartuser.Shop'}</span></p>

		<section>
			<input name="back" value="my-account" type="hidden">
			<a href="#" class="smart-fb-btn btn"> <i class="fa fa-facebook btn-icon"></i>{l s='Login with Facebook' d='Modules.Dorsmartuser.Shop'}</a>
			<p class="line-smart signup"> {l s='OR SIGN IN' d='Modules.Dorsmartuser.Shop'} </p>
			<div class="form-group row ">
				<label class="col-md-3 form-control-label required hidden">
				{l s='Email' d='Modules.Dorsmartuser.Shop'}
				</label>
				<div class="col-md-12">
					<input class="form-control" name="email" value="" required="" type="email" placeholder="{l s='Email' d='Modules.Dorsmartuser.Shop'}">
				</div>
				<div class="col-md-3 form-control-comment"></div>
			</div>
			<div class="form-group row ">
				<label class="col-md-3 form-control-label required hidden">{l s='Password' d='Modules.Dorsmartuser.Shop'}</label>
				<div class="col-md-12">
					<div class="input-group js-parent-focus">
						<input class="form-control js-child-focus js-visible-password" name="password" value="" required="" type="password" placeholder="{l s='Password' d='Modules.Dorsmartuser.Shop'}">
					</div>
				</div>
				<div class="col-md-3 form-control-comment"></div>
			</div>
			<div class="smartdor-footer form-footer text-xs-center clearfix">
				<input name="submitLogin" value="1" type="hidden">
				<button class="btn btn-primary" data-link-action="sign-in" type="submit">
				<span class="fa fa-lightbulb-o"></span>{l s='Sign in' d='Modules.Dorsmartuser.Shop'}
				</button>
			</div>
			<div class="auth-dor-moreinfo clearfix hidden">
				<p>* {l s='Denotes mandatory field.' d='Modules.Dorsmartuser.Shop'}</p>
				<p>** {l s='At least one telephone number is required.' d='Modules.Dorsmartuser.Shop'}</p>
			</div>
			<div class="dor-button-connect">
				<a href="#" onclick="return false" class="smartRegister reActLogReg"><i aria-hidden="true" class="fa fa-user-plus"></i> {l s='Register' d='Modules.Dorsmartuser.Shop'}</a>
				<a rel="nofollow" title="Recover your forgotten password" class="lost_password_smart" onclick="return false" href="#"><i aria-hidden="true" class="fa fa-key"></i> {l s='Forgot your password?' d='Modules.Dorsmartuser.Shop'}</a>
			</div>
		</section>
		
	</form>
</div>

<div id="registerFormSmart" class="dor-formsmart">
	<span class="button b-close"><span>X</span></span>
	<form action="{if isset($urls.force_ssl) && $urls.force_ssl}{$urls.base_url_ssl}{else}{$urls.base_url}{/if}{if $iso_code_lang == 'es'}iniciar-sesion{else}login{/if}?create_account=1" id="customer-form" class="js-customer-form" method="post">
		<h2 class="title-heading"><img src="{if isset($urls.force_ssl) && $urls.force_ssl}{$urls.base_url_ssl}{else}{$urls.base_url}{/if}modules/dor_smartuser/img/logo.png" alt=""></h2>
		<h3>{l s='WELCOME TO OUR WONDERFUL WORLD' d='Modules.Dorsmartuser.Shop'}</h3>
		<p class="smart-sign-txt">{l s='Did you know that we ship to over' d='Modules.Dorsmartuser.Shop'} <span>{l s='24 different countries' d='Modules.Dorsmartuser.Shop'}</span></p>
		<section>
			<input name="id_customer" value="" type="hidden">
			<a href="#" class="smart-fb-btn btn"> <i class="fa fa-facebook btn-icon"></i>{l s='Register with Facebook' d='Modules.Dorsmartuser.Shop'}</a>
			<p class="line-smart signup"> {l s='OR SIGN UP' d='Modules.Dorsmartuser.Shop'} </p>
			<div class="form-group row hidden">
				<label class="col-md-3 form-control-label">{l s='Social title' d='Modules.Dorsmartuser.Shop'}</label>
				<div class="col-md-12 form-control-valign">
					<label class="radio-inline">
						<span class="custom-radio">
							<input name="id_gender" value="1" type="radio">
							<span></span>
						</span>
						{l s='Mr.' d='Modules.Dorsmartuser.Shop'}
					</label>
					<label class="radio-inline">
						<span class="custom-radio">
							<input name="id_gender" value="2" type="radio">
							<span></span>
						</span>
						{l s='Mrs.' d='Modules.Dorsmartuser.Shop'}
					</label>
				</div>
				<div class="col-md-3 form-control-comment"></div>
			</div>
			<div class="form-group form-group-smart row ">
				<div class="col-md-6">
					<div class="field-group-smart">
						<input class="form-control" placeholder="{l s='First name' d='Modules.Dorsmartuser.Shop'}" name="firstname" value="" required="" type="text">
					</div>
					<div class="col-md-3 form-control-comment"></div>
				</div>
				<div class="col-md-6">
					<div class="field-group-smart">
						<input class="form-control" placeholder="{l s='Last name' d='Modules.Dorsmartuser.Shop'}" name="lastname" value="" required="" type="text">
					</div>
					<div class="col-md-3 form-control-comment"></div>
				</div>
			</div>
			<div class="form-group row ">
				<label class="col-md-3 form-control-label required hidden">Email</label>
				<div class="col-md-12">
					<input class="form-control" placeholder="{l s='Email' d='Modules.Dorsmartuser.Shop'}" name="email" value="" required="" type="email">
				</div>
				<div class="col-md-3 form-control-comment"></div>
			</div>
			<div class="form-group row ">
				<label class="col-md-3 form-control-label required hidden">Password</label>
				<div class="col-md-12">
					<div class="input-group js-parent-focus">
						<input class="form-control js-child-focus js-visible-password" placeholder="{l s='Password' d='Modules.Dorsmartuser.Shop'}" name="password" value="" required="" type="password">
					</div>
				</div>
				<div class="col-md-3 form-control-comment"></div>
			</div>
			<div class="form-group row hidden">
				<label class="col-md-3 form-control-label">{l s='Birthdate' d='Modules.Dorsmartuser.Shop'}</label>
				<div class="col-md-12">
					<input class="form-control" name="birthday" value="" placeholder="MM/DD/YYYY" type="text">
					<span class="form-control-comment">
					(E.g.: 05/31/1970)
					</span>
				</div>
				<div class="col-md-3 form-control-comment">Optional</div>
			</div>
			<div class="form-group row hidden">
				<label class="col-md-3 form-control-label"></label>
				<div class="col-md-12 hidden">
					<span class="custom-checkbox">
						<input name="optin" value="1" type="checkbox">
						<span><i class="material-icons checkbox-checked"></i></span>
						<label>{l s='Receive offers from our partners' d='Modules.Dorsmartuser.Shop'}</label>
					</span>
				</div>
				<div class="col-md-3 form-control-comment"></div>
			</div>
			<div class="form-group row hidden">
				<label class="col-md-3 form-control-label">
				</label>
				<div class="col-md-12">
					<span class="custom-checkbox">
						<input name="newsletter" value="1" type="checkbox">
						<span><i class="material-icons checkbox-checked"></i></span>
						<label>{l s='Sign up for our newsletter' d='Modules.Dorsmartuser.Shop'}<br><em>{l s='You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.' d='Modules.Dorsmartuser.Shop'}</em></label>
					</span>
				</div>
				<div class="col-md-3 form-control-comment"></div>
			</div>
			<div class="smartdor-footer form-footer clearfix">
				<input name="submitCreate" value="1" type="hidden">
				<label class="col-md-3 form-control-label"></label>
				<button class="btn btn-primary form-control-submit pull-xs-left" data-link-action="save-customer" type="submit">
				<i class="fa fa-user-plus"></i>{l s='Sign up' d='Modules.Dorsmartuser.Shop'}
				</button>
			</div>
			<div class="dor-button-connect clearfix">
				<a href="#" onclick="return false" class="smartLogin reActLogReg"> <i class="fa fa-lightbulb-o"></i> {l s='Login' d='Modules.Dorsmartuser.Shop'}</a>
				<a rel="nofollow" title="Recover your forgotten password" class="lost_password_smart" onclick="return false" href="#"><i aria-hidden="true" class="fa fa-key"></i> {l s='Forgot your password?' d='Modules.Dorsmartuser.Shop'}' d='</a>
			</div>
		</section>
	</form>
</div>
<div id="smartForgotPass" class="dor-formsmart">
	<span class="button b-close"><span>X</span></span>
	<div class="center_column" id="center_column_smart">
		<div class="box">
			<form action="{if isset($urls.force_ssl) && $urls.force_ssl}{$urls.base_url_ssl}{else}{$urls.base_url}{/if}password-recovery" method="post">
			    <h2 class="title-heading"><img src="{if isset($urls.force_ssl) && $urls.force_ssl}{$urls.base_url_ssl}{else}{$urls.base_url}{/if}modules/dor_smartuser/img/logo.png" alt=""></h2>
				<h3>{l s='WELCOME TO OUR WONDERFUL WORLD' d='Modules.Dorsmartuser.Shop'}</h3>
				<p class="smart-sign-txt">{l s='Did you know that we ship to over' d='Modules.Dorsmartuser.Shop'} <span>{l s='24 different countries' d='Modules.Dorsmartuser.Shop'}</span></p>
			    <div class="smartdor-header">
			      	<p>{l s='Please enter the email address you used to register. You will receive a temporary link to reset your password.' d='Modules.Dorsmartuser.Shop'}</p>
			    </div>
			    <section class="form-fields">
			      	<div class="form-group row">
				        <label class="col-md-3 form-control-label required hidden">{l s='Email address' d='Modules.Dorsmartuser.Shop'}</label>
				        <div class="col-md-12">
				          	<input name="email" id="email" value="" placeholder="{l s='Email address' d='Modules.Dorsmartuser.Shop'}" class="form-control" required="" type="email">
				        </div>
			      	</div>
					<div class="smartdor-footer form-footer text-xs-center">
						<button class="form-control-submit btn btn-primary" name="submit" type="submit">
							<i class="fa fa-key" aria-hidden="true"></i> {l s='Retrieve Password' d='Modules.Dorsmartuser.Shop'}
						</button>
					</div>
			      	<div class="dor-button-connect clearfix">
						<a href="#" onclick="return false" class="smartLogin reActLogReg"> <i class="fa fa-lightbulb-o"></i> {l s='Login' d='Modules.Dorsmartuser.Shop'}</a>
						<a href="#" onclick="return false" class="smartRegister reActLogReg"><i aria-hidden="true" class="fa fa-user-plus"></i> {l s='Register' d='Modules.Dorsmartuser.Shop'}</a>
					</div>
			    </section>
		    
		  	</form>
		</div>
	</div>
</div>
{/if}