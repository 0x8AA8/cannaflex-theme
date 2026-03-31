{foreach from=$galleries item=gallery key=i}
	<a
		href="{$gallery.image}" 
		class="portfolio img-wrap main-item-gallery cate{$cateId}"
		data-med="{$gallery.image}" 
        data-size="{$gallery.image_width}x{$gallery.image_height}"
        data-med-size="{$gallery.image_width}x{$gallery.image_height}"
        data-author="{$gallery.cate_name}"
        data-cat="cate{$cateId}"
	>
		<span class="gallery-item-media"><img src="{$gallery.thumb_image}" alt="{$gallery.name}"></span>
		<span class="item-gallery-info">
			<span class="item-gallery-info-inner">
				<span class="item-gallery-info-wrapper">
					<figure>{$gallery.name}</figure>
					<em>{$gallery.cate_name}</em>
				</span>
			</span>
		</span>
	</a>
{/foreach}
