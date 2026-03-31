{*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2015 PrestaShop SA
*  @version  Release: $Revision$
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{if $dorslider.slides}
  <div id="dorSlideShow" class="homeslider-container animatedParent animateOnce" data-interval="{$dorslider.speed}" data-wrap="{$dorslider.wrap}" data-pause="{$dorslider.pause}" data-arrow={$dorslider.arrow} data-nav={$dorslider.nav}>
    <div id="Dor_Full_Slider" style="width: {$dorslider.thumbWidth}px; height: {$dorslider.thumbHeight}px;">
        <!-- Loading Screen -->
        <div class="slider-loading" data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div class="slider-loading-img"></div>
        </div>
        <div class="slider-content-wrapper" data-u="slides" style="width: {$dorslider.thumbWidth}px; height: {$dorslider.thumbHeight}px;">
        {foreach from=$dorslider.slides item=slide key=i}
          {if $slide.active}
             <div class="slider-content effectSlider{$slide.effect} slide-item-{$i+1}" data-p="225.00" style="display:none;">
                  <img data-u="image" src="{$slide.image_url}" alt="{$slide.legend|escape}" />
                  {if isset($slide.imageproduct) && $slide.imageproduct != ""}
                  <div class="product-item-image animated dor-growIn">
                      {if isset($slide.imageproduct) && $slide.imageproduct != ""}
                      <img src="{$slide.imageproduct}" alt="" />
                      {/if}
                      {if isset($slide.price) && $slide.price != ""}
                      <div data-u="caption" data-t="16" class="dor-slider-price">
                        <div class="price-slider button--sacnite button--round-l">
                          <span>-{l s="Only" d='Modules.Dorimageslider.Shop'}-</span>
                          <span>{$slide.price}</span>
                        </div>
                      </div>
                      {/if}
                  </div>
                  {/if}
                  <div class="dor-info-perslider">
                    <div class="dor-info-perslider-inner">
                      <div class="dor-info-perslider-wrapper">
                        <div class="container">
                          {if isset($slide.title_image) && $slide.title_image != ""}
                          <div class="dor-slider-title-image animated dor-growIn" data-u="caption">
                            <img src="{$slide.title_image|escape:'html':'UTF-8'}" alt=""/>
                          </div>
                          {/if}
                          {if isset($slide.title) && $slide.title != ""}
                          <div class="dor-slider-title" data-u="caption">{$slide.title|escape:'html':'UTF-8'}</div>
                          {/if}
                          {if isset($slide.legend) && $slide.legend != ""}
                          <div class="dor-slider-caption animated dor-fadeInRight" data-u="caption">{$slide.legend|escape:'html':'UTF-8'}</div>
                          {/if}
                          {if $slide.description}
                          <div class="dor-slider-desc" data-u="caption"><div class="dor-slider-desc-inner animated dor-fadeInUp">{$slide.description nofilter}</div></div>
                          {/if}
                          {if $slide.txtReadmore1 || $slide.txtReadmore2}
                          <div class="slider-read-more" data-u="caption">
                            {if $slide.txtReadmore1}<a href="{$slide.UrlReadmore1}" class="dor-effect-hzt button--winona" data-text="{$slide.txtReadmore1}"><span>{$slide.txtReadmore1}</span></a>{/if}
                            {if $slide.txtReadmore2}<a href="{$slide.UrlReadmore2}" class="dor-effect-hzt button--winona" data-text="{$slide.txtReadmore2}"><span>{$slide.txtReadmore2}</span></a>{/if}
                          </div>
                          {/if}
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            {/if}
        {/foreach}
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="dorNavSlider" style="bottom:70px;right:16px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype"><div data-u="numbertemplate"></div></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="dorArrowLeft" style="" data-autocenter="2"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>
        <span data-u="arrowright" class="dorArrowRight" style="" data-autocenter="2"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
    </div>
  </div>
{/if}
