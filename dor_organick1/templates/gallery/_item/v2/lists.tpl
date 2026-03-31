<div class="grid">
	{foreach from=$galleries item=gallery key=i}
	<div class="grid__item" data-size="{$gallery.image_width}x{$gallery.image_height}">
		<a href="{$gallery.image}" data-size="{$gallery.image_width}x{$gallery.image_height}" data-med="{$gallery.image}" data-med-size="{$gallery.image_width}x{$gallery.image_height}" data-author="{$gallery.cate_name}" data-cat="cate{$cateId}" class="img-wrap main-item-gallery"><img src="{$gallery.thumb_image}" alt="{$gallery.name}" />
			<span class="item-gallery-info">
				<span class="item-gallery-info-inner">
					<span class="item-gallery-info-wrapper">
						<figure>{$gallery.name}</figure>
						<em>{$gallery.cate_name}</em>
					</span>
				</span>
			</span>
		</a>
	</div>
	{/foreach}
</div>