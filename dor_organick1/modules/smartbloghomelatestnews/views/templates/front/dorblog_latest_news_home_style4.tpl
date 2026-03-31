<!-- Latest News -->
{if isset($view_data) AND !empty($view_data)}
    {assign var='i' value=1}
<div id="dor-blog-home-style4">
    <div class="blog-home-inner">
        <section class="gst-row row-latest-news ovh">
            <div class="theme-container">
                <div class="gst-column no-padding">
                    <div class="fancy-heading text-left title-header-tab">
                        <h3 class="head-tab-lists title-mod-news"><span>{l s='From Our Blog' d='Modules.Smartbloghomelatestnews.Shop'}</span></h3>
                        <p><span>{l s='Organic and freshly' d='Modules.Smartbloghomelatestnews.Shop'}</span></p>
                    </div>
                    <div class="row gst-post-list animatedParent animateOnce">
                        {foreach from=$view_data key=i item=post}
                        {assign var="catOptions" value=null}
                        {assign var="options" value=null}
                        {$options.id_post = $post.id}
                        {$options.slug = $post.link_rewrite}
                        {$catOptions.id_category = $post.category}
                        {$catOptions.slug = $post.category_link_rewrite}
                        <div class="item-blog-data animated bounceInUp">
                            <div class="col-item-blog">
                            	<div class="blog-home-items">
	                            	<div class="blog-home-items-inner">
		                                <div class="item-blog-media">
		                                    <a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}">
		                                        <img src="{$post.thumb_image}" alt="" />
		                                    </a>
		                                </div>
		                                <div class="item-content-blog">
		                                    <div class="media-body">
		                                    	<div class="entry-meta">
			                                        <div class="entry-time meta-date blog-line">
			                                            <time datetime="2015-12-09T21:10:20+00:00">
			                                                <i class="material-icons">&#xE192;</i>
			                                                <span class="entry-time-date dblock">{$post.date_added|date_format:"%e"}</span>
			                                                {$post.date_added|date_format:"%b"}
			                                            </time>
			                                        </div>
			                                        <div class="vcard author entry-author blog-line">
			                                            <a class="url fn n" rel="author" href="#">
			                                                <i class="material-icons">&#xE853;</i>&nbsp;{$post.firstname}<span class="hidden"> {$post.lastname}</span>
			                                            </a>
			                                        </div>
			                                        <div class="entry-reply blog-line">
			                                            <a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}#comments" class="comments-link">
			                                                <i class="fa fa-comment dblock"></i>
			                                                {$post.totalcomment} {l s='Comment' d='Modules.Smartbloghomelatestnews.Shop'}
			                                            </a>
			                                        </div>
			                                    </div>
		                                        <div class="entry-header">
		                                            <span class="entry-categories hidden">
		                                                <a href="{smartblog::GetSmartBlogLink('smartblog_category',$catOptions)}">{$post.category_name}</a>
		                                            </span>
		                                            <h3 class="entry-title">
		                                                <a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}">{$post.title|truncate:40:'...'|escape:'htmlall':'UTF-8'}</a>
		                                            </h3>
		                                            <p class="news-desc">{$post.short_description|truncate:130:'...'|escape:'htmlall':'UTF-8'}</p>
		                                            <a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}" class="read-more-link thm-clr hidden"><span class="dor-effect-hzt">{l s='Read More' d='Modules.Smartbloghomelatestnews.Shop'}</span> <i class="fa fa-long-arrow-right hidden"></i> </a>
		                                        </div>
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