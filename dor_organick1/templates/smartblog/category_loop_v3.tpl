{assign var="options" value=null}
{$options.id_post = $post.id_post}
{$options.slug = $post.link_rewrite}
<div class="single-blog data-item-blog-v3">
    
    <div class="blog-image">
    	<span class="times-blog-date">
            <span class="times-date">
            	<span class="times-date-inner">
	            	<span class="times-date-wrapper">
		            	<span class="times-date-show">
			            	<span class="date-day">{$post.created|date_format:"%d"}</span>
			            	<span class="date-month">{$post.created|date_format:"%b"}</span>
		            	</span>
	            	</span>
            	</span>
            </span>
         </span>
        <a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}" title="{$post.meta_title}">
            <img src="{$post.thumb_image}" alt="Blog">
        </a>
    </div>
    <div class="blog-info dor-show-blog-info clearfix">
          {if $smartshowauthor ==1}
          <span class="author-name">
            <i class="fa fa-user-circle-o" aria-hidden="true"></i>{l s="by" d='Shop.Theme.Actions'} 
              <a rel="author" href="#">
                  {if $smartshowauthorstyle != 0}
                    {$post.firstname} {$post.lastname}
                  {else}
                    {$post.lastname} {$post.firstname}
                  {/if}
              </a>
          </span>
          {/if}
          
         <span class="comments-number">
              <i class="fa fa-comment"></i>{$post.totalcomment} {l s="Comment" d='Shop.Theme.Actions'}
          </span>
          {assign var="optionsCate" value=null}
          {$optionsCate.id_category = $post.id_category}
          {$optionsCate.slug = $post.cat_link_rewrite}
            <span class="post-cate">
             {l s="in" d='Shop.Theme.Actions'} <a href="{smartblog::GetSmartBlogLink('smartblog_category',$optionsCate)}">{$post.cat_name}</a>
            </span>
    </div>
    <div class="blog-content">

        <div class="title-desc">
            <a title="{$post.meta_title}" href='{smartblog::GetSmartBlogLink("smartblog_post",$options)}'><h4>{$post.meta_title}</h4></a>
            <p>{$post.short_description|strip_tags:'UTF-8'|truncate:550:'...'}</p>
        </div>
        <a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}" class="readmore">{l s="Read More" d='Shop.Theme.Actions'}</a>
        <div class="line-post-public">
          <span class="like-post"><i class="fa fa-heart-o" aria-hidden="true"></i><em>9</em></span>
          <span class="viewed-post"><i class="fa fa-eye" aria-hidden="true"></i><em>{$post.viewed}</em></span>
          <span class="facebook-post"><i class="fa fa-facebook" aria-hidden="true"></i><em>160</em></span>
          <span class="share-post"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
        </div>
    </div>
</div>