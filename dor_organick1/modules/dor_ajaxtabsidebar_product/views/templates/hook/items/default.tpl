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
{if isset($products) && $products}
	<!-- Products list -->
	{foreach from=$products item=product name=products}
		<li class="ajax_block_product_sidebar">
			<div class="product-container-sidebar" itemscope itemtype="https://schema.org/Product">
				<div class="left-block col-xs-3 col-sm-4 col-md-4">
					<div class="product-image-container-sidebar">
						<a class="product_img_link" href="{$product.url|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}" itemprop="url">
							<img class="replace-2x img-responsive" src="{$product.imageThumb}" alt="" title="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" itemprop="image" />
						</a>
						
						{if (isset($product.new) && $product.new == 1) || (isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price) }
				          <div class="box-items">
				            {if isset($product.new) && $product.new == 1}
				              <a class="new-box box-status" href="{$product.link|escape:'html':'UTF-8'}">
				                <span class="new-label">{l s='New'}</span>
				              </a>
				            {/if}
				            {if isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price}
				              <a class="sale-box box-status" href="{$product.link|escape:'html':'UTF-8'}">
				                <span class="sale-label">{l s='Sale!'}</span>
				              </a>
				            {/if}
				          </div>
				          {/if}
					</div>
					{if isset($product.is_virtual) && !$product.is_virtual}{hook h="displayProductDeliveryTime" product=$product}{/if}
					{hook h="displayProductPriceBlock" product=$product type="weight"}
				</div>
				<div class="right-block col-xs-9 col-sm-8 col-md-8">
					<h5 itemprop="name">
						{if isset($product.pack_quantity) && $product.pack_quantity}{$product.pack_quantity|intval|cat:' x '}{/if}
						<a class="product-name" href="{$product.url|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}" itemprop="url" >
							{$product.name|truncate:45:'...'|escape:'html':'UTF-8'}
						</a>
					</h5>
					{if (((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
					<div class="review-price-product">
						{capture name='displayProductListReviews'}{hook h='displayProductListReviews' product=$product}{/capture}
				          {if $smarty.capture.displayProductListReviews}
				            <div class="hook-reviews">
				            {hook h='displayProductListReviews' product=$product}
				            </div>
				          {/if}
						{block name='product_price_and_shipping'}
			              {if $product.show_price}
			                <div class="product-price-and-shipping">
			                  {if $product.has_discount}
			                    {hook h='displayProductPriceBlock' product=$product type="old_price"}

			                    <span class="regular-price">{$product.regular_price}</span>
			                    {if $product.discount_type === 'percentage'}
			                      <span class="discount-percentage">{$product.discount_percentage}</span>
			                    {/if}
			                  {/if}

			                  {hook h='displayProductPriceBlock' product=$product type="before_price"}

			                  <span itemprop="price" class="price">{$product.price}</span>

			                  {hook h='displayProductPriceBlock' product=$product type='unit_price'}

			                  {hook h='displayProductPriceBlock' product=$product type='weight'}
			                </div>
			              {/if}
			            {/block}
					</div>
					{/if}
					<div class="sidebar-line-cart">
                      <form action="{$cartUrl}" method="post" id="add-to-cart-or-refresh-{$product.id_product}">
                            <div class="add">
                            <input type="hidden" name="token" value="{$static_token}">
                            <input name="id_product" value="{$product.id_product}" type="hidden">
                            <input type="hidden" name="id_customization" value="0">
                            <a href="{$cartUrl}" class="cart-button button ajax_add_to_cart_button btn btn-default add-to-cart" data-button-action="add-to-cart" data-toggle="tooltip" title="{l s='Add to cart' d='Shop.Theme.Actions'}" {if !$product.add_to_cart_url}disabled{/if}>
                            <i class="material-icons shopping-cart">&#xE547;</i>
                            <span class="hidden">{l s='Add to cart' d='Shop.Theme.Actions'}</span>
                          </a>
                      </div>
                      </form>
                    </div>
					<div class="action-container-sidebar">
						<div class="button-container">
							<a class="button lnk_view btn btn-default" href="{$product.link|escape:'html':'UTF-8'}" title="{l s='View'}">
								<span>{if (isset($product.customization_required) && $product.customization_required)}{l s='Customize'}{else}{l s='More'}{/if}</span>
							</a>
						</div>
						{if isset($product.color_list)}
							<div class="color-list-container">{$product.color_list}</div>
						{/if}
						<div class="product-flags">
							{if (((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
								{if isset($product.online_only) && $product.online_only}
									<span class="online_only">{l s='Online only'}</span>
								{/if}
							{/if}
							{if isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price}
								{elseif isset($product.reduction) && $product.reduction && isset($product.show_price) && $product.show_price}
									<span class="discount">{l s='Reduced price!'}</span>
								{/if}
						</div>
						{if (((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
							{if isset($product.available_for_order) && $product.available_for_order && !isset($restricted_country_mode)}
								<span class="availability">
									{if ($product.allow_oosp || $product.quantity > 0)}
										<span class="{if $product.quantity <= 0 && isset($product.allow_oosp) && !$product.allow_oosp} label-danger{elseif $product.quantity <= 0} label-warning{else} label-success{/if}">
											{if $product.quantity <= 0}{if $product.allow_oosp}{if isset($product.available_later) && $product.available_later}{$product.available_later}{else}{l s='In Stock'}{/if}{else}{l s='Out of stock'}{/if}{else}{if isset($product.available_now) && $product.available_now}{$product.available_now}{else}{l s='In Stock'}{/if}{/if}
										</span>
									{elseif (isset($product.quantity_all_versions) && $product.quantity_all_versions > 0)}
										<span class="label-warning">
											{l s='Product available with different options'}
										</span>
									{else}
										<span class="label-danger">
											{l s='Out of stock'}
										</span>
									{/if}
								</span>
							{/if}
						{/if}
						<div class="functional-buttons clearfix">
							{hook h='displayProductListFunctionalButtons' product=$product}
							{if isset($comparator_max_item) && $comparator_max_item}
								<div class="compare">
									<a class="add_to_compare" href="{$product.link|escape:'html':'UTF-8'}" data-id-product="{$product.id_product}" title="{l s='Add to Compare'}"><span>{l s='Add to Compare'}</span></a>
								</div>
							{/if}
						</div>
					</div>
				</div>
				
			</div><!-- .product-container> -->
		</li>
	{/foreach}
{/if}