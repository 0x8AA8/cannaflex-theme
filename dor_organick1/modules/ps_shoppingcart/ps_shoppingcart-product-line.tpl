<div class="mini-cart-media">
    <a href="{$product.url}" class="thumbnail product-thumbnail product_img_link">
      <img
        class = "img-responsive"
        src = "{$product.cover.bySize.home_default.url}"
        alt = "{$product.cover.legend}"
        data-full-size-image-url = "{$product.cover.large.url}"
      >
    </a>
</div>
<div class="mini-cart-info">
<span class="product-name">{$product.name}</span>
<span class="product-price">{$product.price}</span>
<span class="product-quantity"><span class="mini-cart-label">{l s='Qty' d='Shop.Theme.Actions'}:</span>{$product.quantity}</span>
<a  class="remove-from-cart"
    rel="nofollow"
    href="{$product.remove_from_cart_url}"
    data-link-action="remove-from-cart"
    title="{l s='remove from cart' d='Shop.Theme.Actions'}"
>
    <span class="hidden">{l s='Remove' d='Shop.Theme.Actions'}</span>
    <i class="material-icons">&#xE5CD;</i>
</a>
{if $product.customizations|count}
    <div class="customizations">
        <ul>
            {foreach from=$product.customizations item='customization'}
                <li>
                    <a href="{$customization.url}" class="thumbnail product-thumbnail product_img_link">
                      <img
                        class = "img-responsive"
                        src = "{$customization.cover.bySize.home_default.url}"
                        alt = "{$customization.cover.legend}"
                        data-full-size-image-url = "{$customization.cover.large.url}"
                      >
                    </a>
                    <span class="product-quantity">{$customization.quantity}</span>
                    <a href="{$customization.remove_from_cart_url}" title="{l s='remove from cart' d='Shop.Theme.Actions'}" class="remove-from-cart" rel="nofollow">{l s='Remove' d='Shop.Theme.Actions'}</a>
                    <ul>
                        {foreach from=$customization.fields item='field'}
                            <li>
                                <span>{$field.label}</span>
                                {if $field.type == 'text'}
                                    <span>{$field.text nofilter}</span>
                                {else if $field.type == 'image'}
                                    <img src="{$field.image.small.url}">
                                {/if}
                            </li>
                        {/foreach}
                    </ul>
                </li>
            {/foreach}
        </ul>
    </div>
{/if}
</div>