<div class="tab-pane fade in " id="tags-product">
  <div class="product-tabs-content">
  {if $tags}
  {foreach from=$tags item=tag name=myLoop}
    <a href="{$link->getPageLink('search', true, NULL, "tag={$tag.name|urlencode}")|escape:'html'}" title="{l s='More about' d='Modules.Dorblocktags.Shop'} {$tag.name|escape:html:'UTF-8'}" class="{$tag.class} {if $smarty.foreach.myLoop.last}last_item{elseif $smarty.foreach.myLoop.first}first_item{else}item{/if}">{$tag.name|escape:html:'UTF-8'}</a>
  {/foreach}
{else}
  {l s='No tags have been specified yet.' d='Modules.Dorblocktags.Shop'}
{/if}
  </div>
</div>