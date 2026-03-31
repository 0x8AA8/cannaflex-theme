{if isset($products) && $products}
  {foreach from=$products item=product name=products}
    {include file="catalog/_partials/miniatures/product.tpl" product=$product}
  {/foreach}
{/if}