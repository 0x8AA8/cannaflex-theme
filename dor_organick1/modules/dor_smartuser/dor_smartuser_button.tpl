
<!-- Block user information module NAV  -->
{if $logged}
<div class="header_user_info smart-user-act">
	<a href="{$link->getPageLink('my-account', true)|escape:'html'}" title="{l s='View my customer account' d='Modules.Dorsmartuser.Shop'}" class="account" rel="nofollow"><span>{$cookie->customer_firstname} {$cookie->customer_lastname}</span></a>
	&nbsp;&nbsp;
</div>
{/if}

<div class="header_user_info smart-user-act">
	{if $logged}
		<a class="logout" href="{$link->getPageLink('index', true, NULL, "mylogout")|escape:'html'}" rel="nofollow" title="{l s='Log me out' d='Modules.Dorsmartuser.Shop'}">{l s='Sign out' d='Modules.Dorsmartuser.Shop'}</a>&nbsp;&nbsp;
	{else}
		<a href="#" onclick="return false" class="smartLogin">{l s='Sign in' d='Modules.Dorsmartuser.Shop'}</a>&nbsp;-&nbsp;{l s='Or' d='Modules.Dorsmartuser.Shop'}&nbsp;-
		<a href="#" onclick="return false" class="smartRegister">{l s='Sign up' d='Modules.Dorsmartuser.Shop'}</a>
	{/if}
	&nbsp;&nbsp;
</div>