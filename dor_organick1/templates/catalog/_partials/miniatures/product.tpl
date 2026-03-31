{**
 * 2007-2017 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2017 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
{block name='product_miniature_item'}
  <article class="ajax_block_product product-miniature js-product-miniature" data-id-product="{$product.id_product}" data-id-product-attribute="{$product.id_product_attribute}" itemscope itemtype="http://schema.org/Product">
    <div class="product-container{if isset($dorShowQuantity) && $dorShowQuantity ==1} dor-show-qty{/if}">
      <div class="left-block">
        <div class="product-image-container">
          {block name='product_thumbnail'}
            {hook h='dorFlipImages' product=$product}
          {/block}
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
          <div class="product-add-wishlist">
            {capture name='dorwishlist'}{hook h='dorwishlist'}{/capture}
            {if $smarty.capture.dorwishlist}
            {$smarty.capture.dorwishlist nofilter}
            {/if}
          </div>
        </div>
        
        <div class="show-btn-products">        
          {if isset($product.is_virtual) && !$product.is_virtual}{hook h="displayProductDeliveryTime" product=$product}{/if}
          {hook h="displayProductPriceBlock" product=$product type="weight"}
          <div class="control-action-buttons">
            <div class="action-button">
                <ul class="dor-product-act-button">
                    <li class="product-add-compare">
                    {hook h='DorCompare' product=$product}
                    </li>
                    <li class="product-addtocart">
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
                          <a href="{if isset($carturl)}{$carturl}{else}{$urls.pages.cart}{/if}" class="cart-button button ajax_add_to_cart_button add-to-cart" data-button-action="add-to-cart" data-toggle="tooltip" data-original-title="{l s='Add to cart' d='Shop.Theme.Actions'}" {if !$product.add_to_cart_url}disabled{/if}>
                            <i class="pe-7s-cart"></i>
                            <span class="hidden">{l s='Add to cart' d='Shop.Theme.Actions'}</span>
                          </a>
                        </div>
                      </form>
                    </li>
                    <li class="product-quickview">
                      <a href="#" class="quick-view countdown-view-detail" data-link-action="quickview" data-toggle="tooltip" data-original-title="{l s='View detail'}">
                         <i class="pe-7s-search"></i>
                      </a>
                    </li>
                </ul>
            </div>
          </div>
        </div>
      </div>
      
      <div class="right-block">
          <div class="product-cate"><span>{$product.category_name}</span></div>
          {block name='product_name'}
            <h5 class="product-title-item" itemprop="name"><a href="{$product.url}" class="product-name">{$product.name|truncate:30:'...'}</a></h5>
          {/block}
          <div class="review-price-product">
          {capture name='displayProductListReviews'}{hook h='displayProductListReviews' product=$product}{/capture}
          {if $smarty.capture.displayProductListReviews}
            <div class="hook-reviews">
            {hook h='displayProductListReviews' product=$product}
            </div>
          {/if}
          <div class="dor-show-value-product clearfix">
            {block name='product_price_and_shipping'}
              {if $product.show_price}
                <div class="content_price">
                  <div class="product-price-and-shipping">
                    {if $product.has_discount}
                      {hook h='displayProductPriceBlock' product=$product type="old_price"}

                      <span class="regular-price">{$product.regular_price}</span>
                      {if $product.discount_type === 'percentage'}
                        <span class="discount-percentage">{$product.discount_percentage}</span>
                      {/if}
                    {/if}

                    {hook h='displayProductPriceBlock' product=$product type="before_price"}
                    <span itemprop="price" class="price {if $product.has_discount}dor_price_discount{/if}">{$product.price}</span>
                    {hook h='displayProductPriceBlock' product=$product type='unit_price'}
                  {hook h='displayProductPriceBlock' product=$product type='weight'}
                  </div>
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
          <div class="product-description-short hidden" itemprop="description">{$product.description_short nofilter}</div>
        {/block}
    </div>
    {block name='product_flags'}
      <ul class="product-flags hidden">
        {foreach from=$product.flags item=flag}
          <li class="{$flag.type}">{$flag.label}</li>
        {/foreach}
      </ul>
    {/block}
    
  </div>
  </article>
{/block}
