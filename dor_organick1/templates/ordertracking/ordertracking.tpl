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
<div id="orderTracking-content-wrapper" class="right-column col-xs-12 col-sm-12 col-md-12">
	<div id="dorOrdertracking">
		<section id="products">
			<h1 class="h1 hidden">{l s='Order Tracking' d='Shop.Theme.Actions'}</h1>
			<h2 class="hidden">{l s='Order Tracking' d='Shop.Theme.Actions'}</h2>
			<h2 class="title-order-tracking text-center">{l s='Track your Order' d='Shop.Theme.Actions'}</h2>
			{if (!isset($smarty.get.reference) || $smarty.get.reference == '') || (!isset($smarty.get.email) || $smarty.get.email == '')}
			<div id="order-tracking-form">
				<form action="{$link->getModuleLink('dor_ordertracking', 'ordertracking', array(), true)|addslashes}" method="get" class="track_order" id="track_order_form">
					<p class="line-order-tracking text-center">{l s='To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.' d='Shop.Theme.Actions'}</p>
					<div class="tracking-form">
						<div class="form-row form-row-first col-lg-6 col-sm-6 col-xs-6">
							<label for="orderid">{l s='Order ID' d='Shop.Theme.Actions'}</label> 
							<input class="input-text form-control" name="reference" id="orderid" placeholder="{l s='Found in your order confirmation email.' d='Shop.Theme.Actions'}" type="text">
						</div>
						<div class="form-row form-row-last col-lg-6 col-sm-6 col-xs-6">
							<label for="order_email">{l s='Billing email' d='Shop.Theme.Actions'}</label> 
							<input class="input-text form-control" name="email" id="order_email" placeholder="{l s='Email you used during checkout.' d='Shop.Theme.Actions'}" type="text">
						</div>
						<div class="clearfix"></div>
						<div class="form-row clearfix col-lg-12 col-sm-12 col-xs-12">
							<button class="button" id="ordertrack" name="track" value="Track" type="button">{l s='Track' d='Shop.Theme.Actions'}</button>
						</div> 
					</div>
				</form>
			</div>
			{/if}
			{if $hasOrder == 1}
			<div id="result-order-tracking">
				<div class="result-order-header">
					
					{if $ordersDetail}
					<div class="order-detail-info">
						{foreach from=$ordersDetail item=detail name=ordersDetail}
						<p>{l s='Order' d='Shop.Theme.Actions'} #<strong>{$detail['reference']}</strong> {l s='was placed on' d='Shop.Theme.Actions'} <strong>{$detail['order_date']|date_format:"%B %e, %Y"}</strong> {l s=' and is currently' d='Shop.Theme.Actions'} <strong>{$detail['status']}</strong></p>
						{/foreach}
					</div>
					{/if}
				</div>
				{foreach from=$orders item=order name=orders}
				<div class="result-order-details clearfix">
					<h3><span>{l s='Order Details' d='Shop.Theme.Actions'}</span></h3>
					<div class="table-responsive">
						<table class="table" id="orderProducts">
							<thead>
								<tr>
									<th></th>
									<th><span class="title_box ">{l s="Product" d='Shop.Theme.Actions'}</span></th>
									<th>
										<span class="title_box ">{l s="Base price" d='Shop.Theme.Actions'}</span>
										<small class="text-muted">{l s="Tax excluded" d='Shop.Theme.Actions'}</small>
									</th>
									<th class="text-center"><span class="title_box ">{l s="Qty" d='Shop.Theme.Actions'}</span></th>
									<th class="text-center"><span class="title_box ">{l s="Available quantity" d='Shop.Theme.Actions'}</span></th>                  <th>
										<span class="title_box ">{l s="Total" d='Shop.Theme.Actions'}</span>
										<small class="text-muted"> {l s="Tax excluded" d='Shop.Theme.Actions'}</small>
									</th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$order['products'] item=product name=order}
								<tr class="product-line-row">
									<td>
										<a href="{$product['url']}" class="dor-order-thumbnail">
										  <img
										    class = "imgm img-thumbnail"
										    src = "{$product.cover.bySize.small_default.url}"
										    alt = "{$product.cover.legend}"
										    data-full-size-image-url = "{$product.cover.large.url}"
										  >
										</a>
									</td>
									<td>
										<a href="{$product['url']}">
											<span class="productName">
												{$product['name']}
											</span>
										</a>
										<span class="clearfix reference">{l s="Reference" d='Shop.Theme.Actions'}: <i>{$product['reference']}</i></span>
									</td>
									<td>
										<span class="product_price_show">{$product['price']}</span>
									</td>
									<td class="productQuantity text-center">
										<span class="product_quantity_show">{$product['cart_quantity']}</span>
									</td>
									<td class="productQuantity product_stock text-center">{$product['current_stock']}</td>	
									<td class="total_product">{$product['total']}</td>
								</tr>
								{/foreach}
							</tbody>
						</table>
					</div>
					<div class="result-order-count clearfix">
						<div class="result-count-info col-lg-6 col-sx-6 col-xs-12 pull-right">
							<div class="panel panel-total">
								<div class="table-responsive">
									<table class="table">
										<tbody>
											<tr id="total_products">
												<td class="text-right">{l s="Subtotal" d='Shop.Theme.Actions'}:</td>
												<td class="amount text-right nowrap">
												{$order['subtotals']['products']['value']}
												</td>
											</tr>
											<tr id="total_shipping">
												<td class="text-right">{l s="Shipping" d='Shop.Theme.Actions'}:</td>
												<td class="amount text-right nowrap">
												{$order['subtotals']['shipping']['value']}
												</td>
											</tr>
											{if $order['subtotals']['tax']['value'] != ""}
											<tr id="total_taxes">
												<td class="text-right">{l s="Taxes" d='Shop.Theme.Actions'}:</td>
												<td class="amount text-right nowrap">$order['subtotals']['tax']['value']</td>
											</tr>
											{/if}
											<tr id="total_order">
												<td class="text-right"><strong>{l s="Total" d='Shop.Theme.Actions'}:</strong></td>
												<td class="amount text-right nowrap">
												<strong>{$order['totals']['total']['value']}</strong>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				{/foreach}
			</div>
			{else if $hasOrder == 2}
			<div class="order-track-noresult">
				<div class="alert alert-danger" role="alert"><span>{l s="Sorry, we could not find that Order ID and Email in our database." d='Shop.Theme.Actions'}</span>&nbsp;<a href="{$link->getModuleLink('dor_ordertracking', 'ordertracking', array(), true)|addslashes}">{l s="Try again" d='Shop.Theme.Actions'}</a></div>
			</div>
			{/if}
		</section>
	</div>
</div>
{/block}