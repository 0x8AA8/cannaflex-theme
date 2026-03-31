<!-- Latest News -->
{if isset($view_data) AND !empty($view_data)}
    {assign var='i' value=1}
<div id="dor-blog-home-style2" class="home-style-button1">
    <div class="blog-home-inner">
        <section class="gst-row row-latest-news ovh">
            <div class="container theme-container">
                <div class="gst-column no-padding">
                    <div class="fancy-heading text-center">
                        <h3 class="head-tab-lists title-mod-news"><span>{l s='Latest News' d='Modules.Smartbloghomelatestnews.Shop'}</span></h3>
                    </div>
                    <div class="row gst-post-list">
                        {foreach from=$view_data item=post}
                        {assign var="catOptions" value=null}
                        {assign var="options" value=null}
                        {$options.id_post = $post.id}
                        {$options.slug = $post.link_rewrite}
                        {$catOptions.id_category = $post.category}
                        {$catOptions.slug = $post.category_link_rewrite}
                        <div class="item-blog-data row">
                        	<div class="post-item-info">
	                            <div class="col-md-6 col-sm-6 col-xs-6 col-item-blog">
	                                <div class="item-blog-media-style2">
	                                    <a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}">
	                                        <img src="{$post.thumb_image}" alt="" />
	                                    </a>
	                                </div>
	                            </div>
	                            <div class="col-md-6 col-sm-6 col-xs-6 col-item-blog">
	                                <div class="item-content-blog-style2">
	                                    <div class="entry-meta">
	                                        <div class="time">
	                                            <i class="material-icons hidden">&#xE192;</i>
	                                            <span>{$post.date_added|date_format:"%e"}</span>/
	                                            {$post.date_added|date_format:"%B"}
	                                        </div>
	                                    </div>
	                                    <div class="media-body">
	                                        <div class="entry-header">
	                                            <span class="entry-categories hidden">
	                                                <a href="{smartblog::GetSmartBlogLink('smartblog_category',$catOptions)}">{$post.category_name}</a>
	                                            </span>
	                                            <h3 class="entry-title">
	                                                <a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}">{$post.title|truncate:35:'...'|escape:'htmlall':'UTF-8'}</a>
	                                            </h3>
	                                            <p class="news-desc hidden">{$post.short_description|truncate:60:'...'|escape:'htmlall':'UTF-8'}</p>
	                                            <a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}" class="read-more-link thm-clr"><span class="dor-effect-hzt">{l s='Read More' d='Modules.Smartbloghomelatestnews.Shop'}</span> <i class="fa fa-long-arrow-right hidden"></i> </a>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
                            </div>
                        </div>
                        {$i=$i+1}
                    {/foreach}
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
{/if}
<!-- Latest News -->