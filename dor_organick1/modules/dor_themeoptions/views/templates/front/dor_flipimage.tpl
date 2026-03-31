
{if isset($dorLazyLoad) && $dorLazyLoad == 1}
<a href="{$product.url}" class="thumbnail product-thumbnail product_img_link">
  <img
    class = "img-responsive thumbnail-image-1 dorlazy owl-lazy"
    data-src="{$product.cover.bySize.home_default.url}"
    data-original="{$product.cover.bySize.home_default.url}"
    alt = "{$product.cover.legend}"
    data-full-size-image-url = "{$product.cover.large.url}"
  >
  {if isset($product.flip) && $product.flip}
  <img
    class = "img-responsive thumbnail-image-2 dorlazy owl-lazy"
    data-src="{$product.flip.bySize.home_default.url}"
    data-original="{$product.flip.bySize.home_default.url}"
    alt = "{$product.flip.legend}"
    data-full-size-image-url = "{$product.flip.large.url}"
  >
  {/if}
</a>


{else}

<a href="{$product.url}" class="thumbnail product-thumbnail product_img_link">
  <img
    class = "img-responsive thumbnail-image-1"
    src="{$product.cover.bySize.home_default.url}"
    alt = "{$product.cover.legend}"
    data-full-size-image-url = "{$product.cover.large.url}"
  >
  {if isset($product.flip) && $product.flip}
  <img
    class = "img-responsive thumbnail-image-2"
    src="{$product.flip.bySize.home_default.url}"
    alt = "{$product.flip.legend}"
    data-full-size-image-url = "{$product.flip.large.url}"
  >
  {/if}
</a>

{/if}