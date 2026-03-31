<div class="product-biz list-products arrowStyleDot1 animatedParent animateOnce">
	<div class="row-biz">
		<div class="dor-biz-product">
			<div class="biz-header">
				<h2>
					<span class="biz-title"><span class="dor-title-fix">{l s='Popular Products' d='Modules.Dorbizproduct.Shop'}</span></span>
					<span class="sug-line-title">{l s='Share your single post here. You can choose the latest posts or best articles to show on your homepage' d='Modules.Dorbizproduct.Shop'}</span>
				</h2>
			</div>
			<div class="biz-contents animated bounceInUp" data-ajaxurl="{if isset($urls.force_ssl) && $urls.force_ssl}{$urls.base_url_ssl}{else}{$urls.base_url}{/if}modules/dor_bizproduct/bizproduct-ajax.php">
					<ul class="tab-biz-control hidden-lg hidden-sm hidden-md col-sm-12 col-sx-12">
						{$i=1}
						{foreach from=$productTabslider item=bizTab name=posTabProduct}
						<li><a href="#bizData-{$bizTab.id}" class="biz-tabtitle dor-underline-from-center {if $i==1}active{/if}"><span>{$bizTab.name}</span></a></li>
						{$i= $i+1}
						{/foreach}
					</ul>
					{$count=1}
					{foreach from=$productTabslider item=productTab name=posTabProduct}
					<div id="bizData-{$productTab.id}" class="biz-group col-lg-4 col-sm-4 col-sx-4 col-md-4">
						<div>
							<h3 class="biz-tabtitle"><span>{$productTab.name}</span></h3>
							<div id="bizTab-{$productTab.id}" class="biz-group-content">
								
							</div>
							<div class="view-more-cat-link clearfix"><a href="{$link->getPageLink({$productTab.link})|escape:'html'}">{l s='View more' d='Modules.Dorbizproduct.Shop'}<i class="fa fa-long-arrow-right"></i></a></div>
						</div>
					</div>
					{$count= $count+1}
					{/foreach}	
			</div>
		</div>	
	</div>
</div>