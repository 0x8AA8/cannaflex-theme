{*
* 2007-2015 PrestaShop
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
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{if (isset($products) && count($products) > 0 && $products !== false) || $ajaxLoad == 1}
<div class="clearfix blockproductscategory related-product-brand show-hover2">
	<div class="same-list-title">
		<h3 class="productscategory_h2">
			{if (isset($products) && $products|@count == 1) && $ajaxLoad == 0}
				<span>{l s='Related Product By Brand' d='Modules.Dorproductsamecategory.Shop'}</span>
			{else}
				<span>{l s='Related Products By Brand' d='Modules.Dorproductsamecategory.Shop'}</span>
			{/if}
		</h3>
	</div>
	<div id="productssamebrand">
		<div id="productssamebrand_list_data" class="productscategory_list arrowStyleDot1" {if $ajaxLoad == 1} data-ajaxurl="{if isset($urls.force_ssl) && $urls.force_ssl}{$urls.base_url_ssl}{else}{$urls.base_url}{/if}modules/dor_productsamecategory/ajax.php" data-product-id="{$options['id_product']}" data-brand-id="{$options['id_brand']}"{/if}>
		    <div class="productSameCategory-inner">
			    <div class="productSameCategory-wrapper">
			   	{if isset($ajaxLoad) && $ajaxLoad == 0 && isset($products) && count($products) > 0}
					<div class="product_list_related product_list grid">
					{foreach from=$products item="product"}
				      {include file="catalog/_partials/miniatures/product.tpl" product=$product}
				    {/foreach}
					</div>
				{/if}
				</div>
			</div>
		</div>
	</div>
</div>
{/if}
