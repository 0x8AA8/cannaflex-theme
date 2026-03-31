{extends file='page.tpl'}
{block name='page_header_container'}{/block}
{block name='page_content'}
<div id="dor-blog-tags" class="center_column dor-two-cols col-xs-12 col-sm-9">
{capture name=path}<a href="{smartblog::GetSmartBlogLink('smartblog')}">{l s='Blog list' d='Shop.Theme.Actions'}</a>
     {if $title_category != ''}
    <span class="navigation-pipe"></span>{$title_category}{/if}{/capture}
 
    {if $postcategory == ''}
             <p class="error">{l s='No Post in This Tag' d='Shop.Theme.Actions'}</p>
    {else}
    <h1 class="h1">{l s='Tags results' d='Shop.Theme.Actions'}</h1>
    <div id="smartblogcat" class="block row {$dorBlogsStyleCss}">
      <div class="blog-post-content-area blog-right col-lg-12 col-sm-12 col-xs-12">
        {if isset($dorBlogsStyle) && ($dorBlogsStyle == 3 || $dorBlogsStyle == 4 || $dorBlogsStyle == 5)}
            {include file="./category_masonry.tpl" postcategory=$postcategory}
        {elseif isset($dorBlogsStyle) && $dorBlogsStyle == 2}
            {foreach from=$postcategory item=post key=i}
                {include file="./category_loop_v2.tpl" postcategory=$postcategory}
            {/foreach}
        {else}
            {foreach from=$postcategory item=post}
                {include file="./category_loop.tpl" postcategory=$postcategory}
            {/foreach}
        {/if}
        </div>
    </div>
{/if}
{if isset($smartcustomcss)}
    <style>
        {$smartcustomcss}
    </style>
{/if}
</div>
<div id="dor-smart-blog-right-sidebar" class="col-xs-12 col-sm-3 column">
    {capture name='displaySmartBlogRight'}{hook h='displaySmartBlogRight'}{/capture}
      {if $smarty.capture.displaySmartBlogRight}
        <div class="displaySmartBlogRight">
          {$smarty.capture.displaySmartBlogRight nofilter}
        </div>
    {/if}
</div>
{/block}