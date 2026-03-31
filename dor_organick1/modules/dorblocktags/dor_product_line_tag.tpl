{if $tags}
  <li class="line-product-tags">
	  <label>{l s='Tags' d='Modules.Dorblocktags.Shop'}:</label>
	  <div class="line-tags-lists">
	  {foreach from=$tags item=tag name=myLoop}
	    <a href="{$link->getPageLink('search', true, NULL, "tag={$tag.name|urlencode}")|escape:'html'}" title="{l s='More about' d='Modules.Dorblocktags.Shop'} {$tag.name|escape:html:'UTF-8'}" class="{$tag.class} {if $smarty.foreach.myLoop.last}last_item{elseif $smarty.foreach.myLoop.first}first_item{else}item{/if}">{$tag.name|escape:html:'UTF-8'}</a>
	  {/foreach}
	  </div>
  </li>
{/if}
