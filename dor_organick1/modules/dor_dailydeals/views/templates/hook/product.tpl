{if isset($products) && $products}
  <div class="deal-module-title title-header-tab">
  	<h2><span class="font-vbs">{l s="Deal Of The Week" d='Modules.Dordailydeals.Shop'}</span></h2>
  	<p><span>{l s="Organic and freshly" d='Modules.Dordailydeals.Shop'}</span></p>
  </div>
  <div class="product_list grid row-item animatedParent animateOnce">
  {foreach from=$products item=product name=products}
    
  	{block name='product_miniature_item'}
	  <article class="ajax_block_product product-miniature js-product-miniature" data-id-product="{$product.id_product}" data-id-product-attribute="{$product.id_product_attribute}" itemscope itemtype="http://schema.org/Product">
	    <div class="product-container{if isset($dorShowQuantity) && $dorShowQuantity ==1} dor-show-qty{/if}">
	      <div class="left-block animated bounceIn">
	        <div class="deal-product-image-container">
	          {if isset($product.image_custom) && $product.image_custom != ""}
	          	<a href="{$product.url}" class="deail-thumbnail deail-product-thumbnail product_img_link">
				  <img
				    class = "deail-img-responsive"
				    src = "{$product.image_custom}"
				  >
				</a>
	          {else}
		          {block name='product_thumbnail'}
		            {hook h='dorFlipImages' product=$product}
		          {/block}
	          {/if}
	          {if (isset($product.new) && $product.new == 1) || (isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price) }
	          <div class="box-items">
	            {if isset($product.new) && $product.new == 1}
	              <a class="new-box box-status" href="{$product.link|escape:'html':'UTF-8'}">
	                <span class="new-label">{l s='New' d='Modules.Dordailydeals.Shop'}</span>
	              </a>
	            {/if}
	            {if isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price}
	              <a class="sale-box box-status" href="{$product.link|escape:'html':'UTF-8'}">
	                <span class="sale-label">{l s='Sale!' d='Modules.Dordailydeals.Shop'}</span>
	              </a>
	            {/if}
	          </div>
	          {/if}
	        </div>
	        
	      </div>
	      
	      <div class="right-block animated bounceIn">
	          <div class="product-cate"><span>{$product.category_name}</span></div>
	          {block name='product_name'}
	            <h5 class="product-title-item" itemprop="name"><a href="{$product.url}" class="product-name">{$product.name|truncate:150:'...'}</a></h5>
	          {/block}
	          <div class="review-price-product">
	          <div class="dor-show-value-product clearfix">
	            {block name='product_price_and_shipping'}
	              {if $product.show_price}
	                <div class="deal-content_price">
	                 {if isset($product.price_custom) && $product.price_custom != ""}
	                 <div class="product-price-custom">
	                 	<span class="price_custom_title font-vbs">{l s="Only" d='Modules.Dordailydeals.Shop'}:</span>
	                 	<span class="price_custom_value">{$product.price_custom}</span>
	                 </div>
	                 {else}
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
	                </div>
	              {/if}
	            {/block}
	            <div class="highlighted-informations{if !$product.main_variants} no-variants{/if} hidden-sm-down">
	              {block name='product_variants'}
	                {if $product.main_variants}
	                  {include file='catalog/_partials/variant-links.tpl' variants=$product.main_variants}
	                {/if}
	              {/block}
	            </div>
	          </div>
	        </div>
	        {block name='product_description_short'}
	          <div class="product-description-short" itemprop="description">{$product.description_short nofilter}</div>
	        {/block}
	        {if $product.special_finish_time|escape:'html':'UTF-8' != ""}
	        <div class="countdow-data-offer">
	            <div id="countdown-timer-{$product.id_product}" class="countdown-daily" data-id="{$product.id_product}" data-time="{$product.special_finish_time|escape:'html':'UTF-8'}"></div>
	        </div>
	        {/if}

	        <div class="dor-action-deals clearfix">
	        	<form action="{if isset($carturl)}{$carturl}{else}{$urls.pages.cart}{/if}" method="post" class="dor-addcart-button">
		          {if isset($dorShowQuantity) && $dorShowQuantity ==1}
		          <div class="dor-product-quantity">
		            <div class="qty">
		              <input
		                type="text"
		                name="qty"
		                id="quantity_wanted_{$product.id_product}"
		                value="1"
		                class="input-group dor_quantity_wanted"
		                data-min="{$product.minimal_quantity}"
		              >
		            </div>
		          </div>
		          {/if}
		          <div class="add">
		            <input type="hidden" name="token" value="{$static_token}">
		            <input name="id_product" value="{$product.id_product}" type="hidden">
		            <input type="hidden" name="id_customization" value="0">
		            <a href="{if isset($carturl)}{$carturl}{else}{$urls.pages.cart}{/if}" class="cart-button button ajax_add_to_cart_button btn btn-default add-to-cart" data-button-action="add-to-cart" data-toggle="tooltip" title="{l s='Add to cart' d='Modules.Dordailydeals.Shop'}" {if !$product.add_to_cart_url}disabled{/if}>
		              <span>{l s='Add to cart' d='Modules.Dordailydeals.Shop'}</span>
		            </a>
		          </div>
		        </form>
		        <div class="show-btn-products">        
		          {if isset($product.is_virtual) && !$product.is_virtual}{hook h="displayProductDeliveryTime" product=$product}{/if}
		          {hook h="displayProductPriceBlock" product=$product type="weight"}
		          <div class="control-action-buttons">
		            <div class="action-button">
		                <ul>
		                    <li class="icon-line-wishlist-fel">
		                      <div class="dor-wishlist">
								<a class="addToDorWishlist" href="#" onclick="WishlistCart('wishlist_block_list', 'add', jQuery(this).closest('.js-product-miniature').attr('data-id-product'), jQuery(this).closest('.js-product-miniature').attr('data-id-product-attribute'), 1, 0); return false;" data-toggle="tooltip" data-placement="top" data-original-title="{l s='Add to Wishlist' d='Modules.Dordailydeals.Shop'}">
									<i class="pe-7s-like"></i>
									<span class="wishlist-txt">{l s="Add to Wishlist" d='Modules.Dordailydeals.Shop'}</span>
								</a>
							</div>
		                    </li>
		                    <li class="icon-line-compare-fel">
		                    	{hook h='DorCompare' product=$product}
		                    </li>
		                    <li class="icon-line-quickview">
		                      <a href="#" class="quick-view countdown-view-detail" data-link-action="quickview" data-toggle="tooltip" title="{l s='View detail' d='Modules.Dordailydeals.Shop'}">
		                         <i class="pe-7s-search"></i>
		                      </a>
		                    </li>
		                </ul>
		            </div>
		          </div>
		        </div>
	        </div>

	    </div>
	  </div>
	  </article>
	{/block}

  {/foreach}
  </div>
{/if}
