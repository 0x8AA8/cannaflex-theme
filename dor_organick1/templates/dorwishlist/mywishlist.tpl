{*
* 2007-2016 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{extends file='page.tpl'}
{block name='page_header_container'}{/block}
{block name='page_content'}
<div id="content-wrapper" class="right-column col-xs-12 col-sm-8 col-md-9 pull-right">
	<div id="mywishlist">
		<section id="products">
		<h1 class="h1 hidden">{l s='My wishlists' d='Shop.Theme.Actions'}</h1>
		<header>
			<h2>{l s='Wishlists' d='Shop.Theme.Actions'}</h2>
			<p>{l s='Keep track of your favorite products, add them to your cart or schedule an appointment in store...' d='Shop.Theme.Actions'}</p>
			<p>{l s='The wishlist makes your life easy' d='Shop.Theme.Actions'}</p>
			<h3>{l s='You have' d='Shop.Theme.Actions'}<span>{$total}</span>{l s='saved items' d='Shop.Theme.Actions'}</h3>
		</header>
		{if $id_customer|intval neq 0}
			{if isset($wishlists) && $wishlists}
			<div id="block-order-detail">
				<div class="products row">
			    {foreach from=$products item="product"}
			      {include file="catalog/_partials/miniatures/product.tpl" product=$product}
			    {/foreach}
			  </div>
			</div>
			{/if}
		{/if}
		</section>
		<script type="text/javascript">
		window.addEventListener('load', function (){
			$(document).ready(function(){
				var removeHtml = '<span class="remove-wishlist-item" title="Delete"><i class="material-icons">highlight_off</i><span class="remove-wishlist-txt">Delete</span></span>';
				$("#mywishlist article").each(function(item){
					$(this).append(removeHtml);
				});
				DeleteWishlistItem();

			});
		});
		</script>
	</div>
</div>
<div id="dor-left-column" class="col-xs-12 col-sm-4 col-md-3 pull-left">
	{capture name='displayDorLeftColumn'}{hook h='displayDorLeftColumn'}{/capture}
    {if $smarty.capture.displayDorLeftColumn}
      <div class="dorLeftColumn clearfix">
            {$smarty.capture.displayDorLeftColumn nofilter}
      </div>
    {/if}                     
</div>
{/block}