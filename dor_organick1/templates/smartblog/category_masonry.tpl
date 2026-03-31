<div class="grid">
{foreach from=$postcategory item=post key=i}
{assign var="options" value=null}
{$options.id_post = $post.id_post}
{$options.slug = $post.link_rewrite}
	<div class="grid__item" data-size="{$post.image_width}x{$post.image_height}">
		<div class="img-wrap">
			<a href='{smartblog::GetSmartBlogLink("smartblog_post",$options)}'>
				<img src="{$post.thumb_image}" alt="img01" />
			</a>
			<div class="description description--grid">
				<h3><a href='{smartblog::GetSmartBlogLink("smartblog_post",$options)}' title="{$post.meta_title}">{$post.meta_title}</a></h3>
				<div class="short-desc">
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
	</div>
{/foreach}
</div>