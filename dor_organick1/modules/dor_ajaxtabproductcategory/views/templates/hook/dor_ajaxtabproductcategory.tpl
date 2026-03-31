<div id="dor-tab-product-category" class="show-hover2">
	<div class="title-header-tab">
		<h3><span>{l s="Our Products" d="Modules.Dorajaxtabproductcategory.Shop"}</span></h3>
		<p><span>{l s="Organic and freshly" d="Modules.Dorajaxtabproductcategory.Shop"}</span></p>
	</div>
	<div class="dor-tab-product-category-wrapper">
		<ul role="tablist" class="nav nav-tabs" id="dorTabAjax" {if $firstAjax == 1}data-defaulttab = "{$tabID.id}"{/if} data-ajaxurl="{if isset($urls.force_ssl) && $urls.force_ssl}{$urls.base_url_ssl}{else}{$urls.base_url}{/if}modules/dor_ajaxtabproductcategory/productcategory-ajax.php">
			{$j=0}
			{foreach from=$listTabsProduct item=productTab name=tabCatePro}
			<li class="{if $smarty.foreach.tabCatePro.first}first_item{elseif $smarty.foreach.tabCatePro.last}last_item{else}{/if} {if $productTab.id==$tabID.id} active {/if}" data-rel="tab_{$productTab.id}"  >
			<a aria-expanded="false" data-toggle="tab" id="cate-tab-data-{$productTab.id}-tab" href="#cate-tab-data-{$productTab.id}">{$productTab.name}</a>
			</li>
				{$j= $j+1}
			{/foreach}

			{$i=0}
			{foreach from=$listTabs item=cate name=tabCate}
			<li class="{if $smarty.foreach.tabCate.first}first_item{elseif $smarty.foreach.tabCate.last}last_item{else}{/if} {if $cate.id==$tabID.id} active {/if}"><a aria-expanded="false" data-toggle="tab" id="cate-tab-data-{$cate.id}-tab" href="#cate-tab-data-{$cate.id}">{$cate.name}</a></li>
			{$i= $i+1}
			{/foreach}	
		</ul>
		<div class="tab-content" id="dorTabProductCategoryContent">
		{if $listTabsProduct}
			{$k=0}
			{foreach from=$listTabsProduct item=productTab name=tabCatePro}
			<div aria-labelledby="cate-tab-data-{$productTab.id}-tab" id="cate-tab-data-{$productTab.id}" class="tab-pane fade {if $productTab.id==$tabID.id} active {/if} in">
				<div class="productTabContent_{$productTab.id} dor-content-items">
					<div class="row">
					{if $productTab.id==$tabID.id} {include file="$self/product-item.tpl"} {/if}
					</div>
				</div>
				<div class="loadmore-showdata text-center clearfix">
					<a href="#" class="dor-load-more-tab" data-page="2" data-limit="{$optionsConfig.number_per_page}" data-ajax="{if isset($urls.force_ssl) && $urls.force_ssl}{$urls.base_url_ssl}{else}{$urls.base_url}{/if}modules/dor_ajaxtabproductcategory/productcategory-ajax.php" onclick="return false">
						<span>{l s="Load more" d="Modules.Dorajaxtabproductcategory.Shop"}</span>
					</a>
				</div>
			</div>
			{$k= $k+1}
			{/foreach}
		{/if}
			{$key=0}
			{foreach from=$listTabs item=cate name=tabCate}
			<div aria-labelledby="cate-tab-data-{$cate.id}-tab" id="cate-tab-data-{$cate.id}" class="tab-pane fade {if $cate.id==$tabID.id} active {/if} in">
				<div class="productTabContent_{$cate.id} dor-content-items">
					<div class="row">
					{if $cate.id==$tabID.id} {include file="$productItemPath"} {/if}
					</div>
				</div>
				<div class="loadmore-showdata text-center clearfix">
					<a href="#" class="dor-load-more-tab" data-page="2" data-ajax="{if isset($urls.force_ssl) && $urls.force_ssl}{$urls.base_url_ssl}{else}{$urls.base_url}{/if}modules/dor_ajaxtabproductcategory/productcategory-ajax.php" data-limit="{$optionsConfig.number_per_page}" onclick="return false">
						<span>{l s="Load more" d="Modules.Dorajaxtabproductcategory.Shop"}</span>
					</a>
				</div>
			</div>
			{$key= $key+1}
			{/foreach}	
		</div>
	</div>
</div>