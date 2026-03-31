{extends file='page.tpl'}
{block name='page_header_container'}{/block}
{block name='page_content'}

{capture name=path}{l s='Gallery' d='Shop.Theme.Actions'}{/capture}
<h1 class="h1 hidden">{l s="Gallery" d='Shop.Theme.Actions'}</h1>
<input type="hidden" id="galleryMainLink" value="{$link->getModuleLink('dorgallery', 'gallery', array(), true)|addslashes}">
<div id="dor-gallery-base" class="dorgallery-base-2" data-style="2">
	<div class="dor-gallery-wrapper">
		<div class="dor-gallery-content">
			<div class="dor-gallery-inner">
				<ul class="header-tab-gallery nav nav-tabs" role="tablist">
				    <li role="presentation" class="filter active" data-filter=".cate0"><a href="#gallery-0" aria-controls="gallery-0" role="tab" data-toggle="tab">{l s="All gallery" d='Shop.Theme.Actions'}</a></li>
				    {foreach from=$categories item=category key=i}
				    <li role="presentation" class="filter" data-filter=".cate{$category.id_dorgallery_category}"><a href="#gallery-{$category.id_dorgallery_category}" aria-controls="gallery-{$category.id_dorgallery_category}" role="tab" data-toggle="tab">{$category.name}</a></li>
				    {/foreach}
				</ul>
				<div id="list-gallery-show-items" class="tab-content clearfix">
			    	<div class="data-gallery">
				    	<div class="dor-gallery-show portfoliolist" id="portfoliolist0">
				    		{if $tabdefaultID == 0}
				    			{assign var="cateId" value=0}
					    		{include file='gallery/_item/v2/lists.tpl'}
				    		{/if}
				    	</div>
				    	<div class="load-more-gallery hidden"><a href="#" onClick="return false" data-page="1"><span>{l s="Load more" d='Shop.Theme.Actions'}</span></a></div>
					</div>

					{foreach from=$categories item=category key=j}
			    	<div class="data-gallery hidden">
				    	<div class="dor-gallery-show portfoliolist" id="portfoliolist{$category.id_dorgallery_category}">
				    		{if $tabdefaultID == $category.id_dorgallery_category}
				    			{assign var="cateId" value=$category.id_dorgallery_category}
					    		{include file='gallery/_item/v2/lists.tpl'}
				    		{/if}
				    	</div>
				    	<div class="load-more-gallery hidden"><a href="#" onClick="return false" data-page="1"><span>{l s="Load more" d='Shop.Theme.Actions'}</span></a></div>
					</div>
				    {/foreach}
					
				</div>
				<input type="hidden" id="versionGallery" value="gallery">
			</div>
		</div>
	</div>
</div>
<div id="gallery" class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>

        <div class="pswp__scroll-wrap">

          <div class="pswp__container">
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
          </div>

          <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

				<div class="pswp__counter"></div>

				<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

				<button class="pswp__button pswp__button--share" title="Share"></button>

				<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

				<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

				<div class="pswp__preloader">
					<div class="pswp__preloader__icn">
					  <div class="pswp__preloader__cut">
					    <div class="pswp__preloader__donut"></div>
					  </div>
					</div>
				</div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
	            <div class="pswp__share-tooltip">
	            </div>
	        </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
            <div class="pswp__caption">
              <div class="pswp__caption__center">
              </div>
            </div>
          </div>
        </div>
    </div>

{/block}