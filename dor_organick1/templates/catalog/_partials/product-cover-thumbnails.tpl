{**
 * 2007-2017 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2017 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
{if isset($smarty.get.thumb_type) && $smarty.get.thumb_type != ''}
  {assign var="dorDetailCols" value="proDetailCol1"}
  {assign var="dorDetailMainImage" value=$smarty.get.thumb_type}
{/if}
{if isset($smarty.get.detail_col) && $smarty.get.detail_col != ''}
    {assign var="dorDetailCols" value="proDetailCol{$smarty.get.detail_col}"}
{/if}
<div class="images-container {if (isset($dorDetailMainImage) && $dorDetailMainImage != '') && (isset($dorDetailCols) && $dorDetailCols == 'proDetailCol1')}dorDetailMainImage_{$dorDetailMainImage}{/if}">
  {block name='product_cover'}
    <div class="product-cover">
      {block name='product_flags'}
        <ul class="product-flags">
          {foreach from=$product.flags item=flag}
            <li class="product-flag {$flag.type}">{$flag.label}</li>
          {/foreach}
        </ul>
      {/block}
      <div class="dor-cover-image demo-gallery">
        {foreach from=$product.images item=image}
        <a 
          id="dorCover{$image.id_image}" 
          class="dor-thumb-container {if $image.id_image != $product.cover.id_image}hidden{/if}"
          href="{$image.bySize.large_default.url}" 
          data-med="{$image.bySize.large_default.url}" 
          data-size="{$image.bySize.large_default.width}x{$image.bySize.large_default.height}"
          data-med-size="{$image.bySize.medium_default.width}x{$image.bySize.medium_default.height}"
        >
          {if $image.id_image == $product.cover.id_image}
          <img class="js-qv-product-cover" src="{$product.cover.bySize.large_default.url}" alt="{$product.cover.legend}" title="{$product.cover.legend}" style="width:100%;" itemprop="image">
          {else}
          <img class="js-qv-product-cover" src="#" alt="{$product.cover.legend}" title="{$product.cover.legend}" style="width:100%;" itemprop="image">
          {/if}
        </a>
        {/foreach}
      </div>
      <div class="layer hidden-sm-down hidden" data-toggle="modal" data-target="#product-modal">
        <i class="material-icons zoom-in">&#xE8FF;</i>
      </div>
    </div>
  {/block}
  {block name='product_images'}
    <div class="js-qv-mask mask dorMaskCustom">
      <ul class="product-images js-qv-product-images">
        {foreach from=$product.images item=image}
          <li class="thumb-container">
            <img
              class="thumb js-thumb {if $image.id_image == $product.cover.id_image} selected {/if}"
              data-image-medium-src="{$image.bySize.medium_default.url}"
              data-image-large-src="{$image.bySize.large_default.url}"
              src="{$image.bySize.home_default.url}"
              alt="{$image.legend}"
              title="{$image.legend}"
              width="100"
              itemprop="image"
              data-thumb-id="dorCover{$image.id_image}"
            >
          </li>
        {/foreach}
      </ul>
    </div>
    {if (isset($dorDetailMainImage) && $dorDetailMainImage != 'bottom' && (isset($dorDetailCols) && $dorDetailCols == "proDetailCol1"))}
      <div class="dor-scroll-box-arrows">
        <i class="material-icons top">&#xE316;</i>
        <i class="material-icons bottom">&#xE313;</i>
      </div>
    {/if}
  {/block}

  <div id="gallery" class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>

        <div class="pswp__scroll-wrap">

          <div class="pswp__container">
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
          </div>

          <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

        <div class="pswp__counter"></div>

        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

        <button class="pswp__button pswp__button--share" title="Share"></button>

        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

        <div class="pswp__preloader">
          <div class="pswp__preloader__icn">
            <div class="pswp__preloader__cut">
              <div class="pswp__preloader__donut"></div>
            </div>
          </div>
        </div>
            </div>


      <!-- <div class="pswp__loading-indicator"><div class="pswp__loading-indicator__line"></div></div> -->

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
              <div class="pswp__share-tooltip">
          <!-- <a href="#" class="pswp__share--facebook"></a>
          <a href="#" class="pswp__share--twitter"></a>
          <a href="#" class="pswp__share--pinterest"></a>
          <a href="#" download class="pswp__share--download"></a> -->
              </div>
          </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
            <div class="pswp__caption">
              <div class="pswp__caption__center">
              </div>
            </div>
          </div>
        </div>
    </div>


</div>
{hook h='displayAfterProductThumbs'}