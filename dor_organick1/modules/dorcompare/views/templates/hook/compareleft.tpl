<div class="dorCompareLeftSidebar">
	<div class="dorCompareLeftInner">
		<div class="section-title">
			<h2 class="title_block">{l s='Compare Products' d='Modules.Dorcompare.Shop'} <span class="counter qty hidden">0 {l s='items' d='Modules.Dorcompare.Shop'}</span></h2>
		</div>
		
		<div class="list-compare-left">
			<ul>
			{if $hasProduct}
			{foreach from=$compares item=product name=for_products}
				<li><a href="{$product.url}">{$product.name}</a><span class="compare_remove" href="#" title="{l s='Remove' d='Modules.Dorcompare.Shop'}" data-productid="{$product.id}"><i class="material-icons">&#xE872;</i></span></li>
			{/foreach}
			{else}
				<li class="empty">{l s='You have no items to compare.' d='Modules.Dorcompare.Shop'}</li>
			{/if}
			</ul>
		</div>
		<div class="actions-footer-sidebar {if !$hasProduct}compare-hide{/if}">
			<a href="{url entity='module' name='dorcompare' controller='compare' params=[]}" class="dor-sidebar-compare"><span>{l s='Compare' d='Modules.Dorcompare.Shop'}</span></a>
			<a href="#" onclick="return false" class="dor-sidebar-compare-clear"><span>{l s='Clear all' d='Modules.Dorcompare.Shop'}</span></a>
		</div>
	</div>
</div>