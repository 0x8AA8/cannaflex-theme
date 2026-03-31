{if isset($productlists) && $productlists != ""}
<div id="data_biz_{$tabId}" class="tab_content">
	<div class="productTabContent productTabContent_{$tabId} product_list productContent">
	<!-- Products list -->
	{foreach from=$productlists item=products name=productlists}
	<div class="biz-item-group">
		{foreach from=$products item=product name=products}
	    	{include file="catalog/_partials/miniatures/product.tpl" product=$product}
	  	{/foreach}
	</div>
	{/foreach}
	</div>
</div>
{/if}