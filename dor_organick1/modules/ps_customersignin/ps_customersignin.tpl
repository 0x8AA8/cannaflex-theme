<div class="user-info selection-options-wrapper">
  <label class="hidden">{l s='Account' d='Modules.Pscustomersignin.Shop'}</label>
  <span class="line-selected hidden"><i class="pe-7s-user"></i> <span class="select-hidden hidden">{l s='Account' d='Modules.Pscustomersignin.Shop'}</span></span>
  <ul class="toogle_content">
    <li><a class="link-myaccount" href="{$my_account_url}" title="{l s='View my customer account' d='Modules.Pscustomersignin.Shop'}"><i class="pe-7s-users"></i>{l s='My account' d='Modules.Pscustomersignin.Shop'}</a></li>
    <li><a class="link-wishlist wishlist_block" href="{$link->getModuleLink('dorblockwishlist', 'dorwishlist', array(), true)|escape:'html':'UTF-8'}" title="{l s='My wishlist' d='Modules.Pscustomersignin.Shop'}"><i class="pe-7s-like"></i>{l s='My wishlist' d='Modules.Pscustomersignin.Shop'}</a></li>
    <li><a class="link-mycart" href="{$urls.pages.cart}?action=show" title="{l s='My cart' d='Shop.Theme.CustomerAccount'}">
    <i class="pe-7s-cart"></i>{l s='My cart' d='Modules.Pscustomersignin.Shop'}</a></li>
    {if $logged}
    <a href="{$logout_url}" class="btn btn-default signout-button" title="{l s='Log out to your customer account' d='Modules.Pscustomersignin.Shop'}"><span><i class="material-icons">&#xE0DA;</i>{l s='Sign out' d='Modules.Pscustomersignin.Shop'}</span></a>
    {else}
    <li><a href="#" onclick="return false" class="smartLogin"><i class="pe-7s-key"></i>{l s='Sign in popup' d='Modules.Pscustomersignin.Shop'}</a></li>
    <li><a href="#" onclick="return false" class="smartRegister"><i class="pe-7s-add-user"></i>{l s='Sign up popup' d='Modules.Pscustomersignin.Shop'}</a></li>
    {/if}
  </ul>
</div>
