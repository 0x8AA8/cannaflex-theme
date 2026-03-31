<div id="dor-tab-featured-category" class="dor-tab-featured-category clearfix dorButtonArrow">
	<div class="col-lg-12 col-sm-12-col-xs-12">
		<div class="dor-tab-featured-category-wrapper">
			<div class="feature-title-module text-center">
				<h3 class="insight-title-subtitle">{l s=$moduleTitle d='Modules.Dortabfeatured.Shop'}</h3>
				<div class="line-organie">{l s='You can choose the other catalogs to show on your homepage' d='Modules.Dortabfeatured.Shop'}</div>
			</div>
			
			<div class="featured-contents">
				<div class="tab-content tablist-content-data" id="dorTabFeaturedCategoryContent">
				{$key=0}
				{foreach from=$listTabs item=cate name=tabCate}
				<div data-aria-labelledby="cate-tab-featured-{$cate.id}-tab" id="cate-tab-featured-{$cate.id}" data-cate-id="{$cate.id}" class="tab-pane fade {if $cate.id==$tabID.id} active {/if} in featured-tab-content">
					<div class="productFeaturedTabContent_{$cate.id} dor-content-items dorButtonArrow">
						<div class="row-tablist">
						{if $cate.id==$tabID.id} {include file="$productItemPath"} {/if}
						</div>
					</div>
					<a href="#" class="load-more-tab dor-icon-float-away tablists hidden" data-page="2" data-ajax="{if isset($urls.force_ssl) && $urls.force_ssl}{$urls.base_url_ssl}{else}{$urls.base_url}{/if}modules/dor_tabfeatured/productcategory-ajax.php" data-limit="{$optionsConfig.listLimit}" onclick="return false">
						<span class="clt-left"></span><span class="load-center"><i class="fa fa-plus"></i></span><span class="clt-right"></span>
					</a>
				</div>
				{$key= $key+1}
				{/foreach}	
				</div>
			</div>
		</div>
	</div>
</div>