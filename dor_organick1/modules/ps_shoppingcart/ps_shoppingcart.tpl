<div id="_desktop_cart">
  <div class="blockcart cart-preview" data-refresh-url="{$refresh_url}">
    <div class="header">
      <a rel="nofollow" href="{$cart_url}">
        <i class="pe-7s-cart"></i>
        <span class="hidden-sm-down hidden">{l s='Cart' d='Shop.Theme.Checkout'}</span>
        <span class="cart-products-count">{$cart.products_count}</span>
      </a>
    </div>
    <div class="body {if count($cart.products) == 0}none-minicart{/if}">
      <ul class="minicart-product-lists">
        {foreach from=$cart.products item=product}
          <li class="clearfix">{include 'module:ps_shoppingcart/ps_shoppingcart-product-line.tpl' product=$product}</li>
        {/foreach}
      </ul>
      <div class="mini-cart-footer">
        <div class="cart-subtotals">
          {foreach from=$cart.subtotals item="subtotal"}
            {if $subtotal.type != ""}
            <div class="{$subtotal.type}">
              <span class="label">{$subtotal.label}</span>
              <span class="value">{$subtotal.value}</span>
            </div>
            {/if}
          {/foreach}
        </div>
        <div class="cart-total">
          <span class="label">{$cart.totals.total.label}</span>
          <span class="value">{$cart.totals.total.value}</span>
        </div>
        <div class="button-act-minicart">
          <a rel="nofollow" href="{$cart_url}" class="mini-cart-view clearfix">{l s='View cart' d='Shop.Theme.Checkout'}</a>
          <a rel="nofollow" href="{if isset($urls)}{$urls.pages.order}{else}/order{/if}" class="mini-cart-checkout clearfix">{l s='Checkout' d='Shop.Theme.Checkout'}</a>
        </div>
      </div>
      {if count($cart.products) == 0}
      <div class="no-item-cart">
        <span class="no-items">{l s='There are no more items in your cart' d='Shop.Theme.Checkout'}</span>
      </div>
      {/if}
    </div>
  </div>
</div>
