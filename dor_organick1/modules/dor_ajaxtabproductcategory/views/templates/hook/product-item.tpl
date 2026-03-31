{if isset($products) && $products}
  <div class="product_list grid row-item">
  {foreach from=$products item=product name=products}
    {include file="catalog/_partials/miniatures/product.tpl" product=$product}
  {/foreach}
  </div>
{/if}