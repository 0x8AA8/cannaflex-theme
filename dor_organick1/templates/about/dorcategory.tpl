{extends file='page.tpl'}
{block name='page_header_container'}{/block}
{block name='page_content'}
{capture name=path}{l s='Shop'}{/capture}
<h1 class="h1 hidden">{l s="Shop"}</h1>
<div id="dor-about-content">
	<div class="row">
		<div id="dorpagecategories">
	      <ul class="dorpagecategories-list row list1 clearfix">
	      {foreach from=$categories item=subcategory key=i}
	        <li class="col-lg-3 col-sm-4 col-xs-6">
	        	<div class="dorpagecategories-content">
		            <div class="dorpagecategories-image subcate-{$i}">
		            	<a href="{$link->getCategoryLink($subcategory.id_category, $subcategory.link_rewrite)|escape:'html':'UTF-8'}" title="{$subcategory.name|escape:'html':'UTF-8'}" class="img">
			            {if $subcategory.image != null || $subcategory.thumb_image != ""}
			              <img class="replace-2x" src="{$subcategory.thumb_image}" alt="{$subcategory.name|escape:'html':'UTF-8'}" />
			            {/if}
		               	</a>
		               	<div class="title-captions-cate">
	                        <h3><a href="{$link->getCategoryLink($subcategory.id_category, $subcategory.link_rewrite)|escape:'html':'UTF-8'}" title="{$subcategory.name|escape:'html':'UTF-8'}" class="cate-title-link">{$subcategory.name|truncate:25:'...'|escape:'html':'UTF-8' nofilter}</a></h3>
	                        <span>{$subcategory.description|truncate:95:'...'|escape:'html':'UTF-8' nofilter}</span>
	                    </div>
		            </div>
		            {if $subcategory.description}
		            <div class="cat_desc hidden">{$subcategory.description nofilter}</div>
		            {/if}
		        </div>
	        </li>
	      {/foreach}
	      </ul>
	    </div>
	</div>
</div>
{/block}