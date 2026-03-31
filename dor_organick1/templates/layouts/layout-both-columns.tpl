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
<!doctype html>
<html lang="{$language.iso_code}">

  <head>
    {block name='head'}
      {include file='_partials/head.tpl'}
    {/block}
  </head>
  {if isset($smarty.get.detail_col) && $smarty.get.detail_col != ''}
    {assign var="dorDetailCols" value="proDetailCol{$smarty.get.detail_col}"}
  {/if}
  {if isset($smarty.get.cate_type) && $smarty.get.cate_type != ''}
    {assign var="dorCategoryCols" value="proCateCol{$smarty.get.cate_type}"}
  {/if}
  {if isset($smarty.get.cate_type) && $smarty.get.cate_type != '' && $smarty.get.cate_type == 1}
    {assign var="proCateRowNumber" value="4"}
    {if isset($smarty.get.cate_row) && $smarty.get.cate_row != ''}
      {assign var="proCateRowNumber" value="{$smarty.get.cate_row}"}
    {/if}
    {if isset($smarty.get.cate_row) && $smarty.get.cate_row != '' && $smarty.get.cate_row gt 6}
      {assign var="proCateRowNumber" value="4"}
    {/if}
  {/if}

  {if isset($smarty.get.topbar) && $smarty.get.topbar != ''}
    {assign var="dorTopbarSkin" value="topbar{$smarty.get.topbar}"}
  {/if}
  {if isset($smarty.get.header) && $smarty.get.header != ''}
    {assign var="dorHeaderSkin" value="header{$smarty.get.header}"}
  {/if}
  <body id="{$page.page_name}" class="{if isset($dorthemebg) && $dorthemebg != ''}{$dorthemebg} {/if}{$page.body_classes|classnames}{if isset($dorCategoryCols) && $dorCategoryCols} {$dorCategoryCols}{/if}{if isset($dorDetailCols) && $dorDetailCols} {$dorDetailCols}{/if}{if isset($dorthemebg) && $dorthemebg} {$dorthemebg}{/if} {if $page.page_name == 'category' && isset($proCateRowNumber) && $proCateRowNumber != '' }proCateRowNumber{$proCateRowNumber}{/if} {if $page.page_name == 'category' && isset($proCateTypePage) && $proCateTypePage == 2 }showLoadmore{/if}">
    {block name='hook_after_body_opening_tag'}
      {hook h='displayAfterBodyOpeningTag'}
    {/block}
    <main{if isset($dorlayoutmode) && $dorlayoutmode != ""} class="{$dorlayoutmode}"{/if}>
      {block name='product_activation'}
        {include file='catalog/_partials/product-activation.tpl'}
      {/block}
      {if isset($dorTopbarSkin) && $dorTopbarSkin != "" && $page.page_name != 'pagenotfound'}
      <section id="topbar" class="dor-topbar-main">
        {assign var='urlTopbar' value="_partials/dorado/topbar/"|cat:$dorTopbarSkin|cat:".tpl"} 
        {include file=$urlTopbar}
      </section>
      {/if}
      <header id="header" class="header-absolute">
          {include file='_partials/header.tpl'}
      </header>
      
      {block name='notifications'}
        {include file='_partials/notifications.tpl'}
      {/block}
      {if $page.page_name == 'index'}
      <section id="dor-homeslider">
        {capture name='dorHomeSlider'}{hook h='dorHomeSlider'}{/capture}
        {if $smarty.capture.dorHomeSlider}
          {$smarty.capture.dorHomeSlider nofilter}
        {/if}
      </section>

      {capture name='blockDorado1'}{hook h='blockDorado1'}{/capture}
      {if $smarty.capture.blockDorado1}
        <div class="blockDorado1 blockPosition dor-bg-white">
          <div class="container">
            <div class="row">
            {$smarty.capture.blockDorado1 nofilter}
            </div>
          </div>
        </div>
      {/if}
      {capture name='blockDorado2'}{hook h='blockDorado2'}{/capture}
      {if $smarty.capture.blockDorado2}
        <div class="blockDorado2 blockPosition dor-bg-white">
            <div class="container">
              <div class="row">
              {$smarty.capture.blockDorado2 nofilter}
              </div>
            </div>
        </div>
      {/if}
      <div id="group-show-home" class="clearfix">
        <div class="container">
          <div class="row">
          {capture name='dorDailyDeal'}{hook h='dorDailyDeal'}{/capture}
          {if $smarty.capture.dorDailyDeal}
            <div class="dorDailyDeal">
                {$smarty.capture.dorDailyDeal nofilter}
            </div>
          {/if}
          </div>
        </div>
      </div>
      
      {capture name='DorTabProductCate01'}{hook h='DorTabProductCate01'}{/capture}
      {if $smarty.capture.DorTabProductCate01}
        <div class="DorTabProductCate01 blockPosition dor-bg-white">
          <div class="container">
            <div class="row">
            {$smarty.capture.DorTabProductCate01 nofilter}
            </div>
          </div>
        </div>
      {/if}
      
      {capture name='blockDorado3'}{hook h='blockDorado3'}{/capture}
      {if $smarty.capture.blockDorado3}
        <div class="blockDorado3 blockPosition dor-bg-white">
          <div class="container">
            <div class="row">
            {$smarty.capture.blockDorado3 nofilter}
            </div>
          </div>
        </div>
      {/if}
      {capture name='dorBizproduct'}{hook h='dorBizproduct'}{/capture}
      {if $smarty.capture.dorBizproduct}
        <div class="dorBizproduct blockPosition dor-bg-white">
          <div class="container">
            <div class="row">
            {$smarty.capture.dorBizproduct nofilter}
            </div>
          </div>
        </div>
      {/if}
      {capture name='DorTestimonial'}{hook h='DorTestimonial'}{/capture}
      {if $smarty.capture.DorTestimonial}
        <div class="DorTestimonial blockPosition dor-bg-white">
          <div class="container">
            <div class="row">
            {$smarty.capture.DorTestimonial nofilter}
            </div>
          </div>
        </div>
      {/if}
      {capture name='DorHomeLatestNews'}{hook h='DorHomeLatestNews'}{/capture}
      {if $smarty.capture.DorHomeLatestNews}
        <div class="DorHomeLatestNews blockPosition dor-bg-white">
          <div class="container">
            <div class="row">
            {$smarty.capture.DorHomeLatestNews nofilter}
            </div>
          </div>
        </div>
      {/if}

      {capture name='blockDorado10'}{hook h='blockDorado10'}{/capture}
      {if $smarty.capture.blockDorado10}
        <div class="blockDorado10 blockPosition dor-bg-white">
          <div class="container">
            <div class="row">
            {$smarty.capture.blockDorado10 nofilter}
            </div>
          </div>
        </div>
      {/if}

      {/if}
      {if $page.page_name != 'index'}
      {block name='breadcrumb'}
        {include file='_partials/breadcrumb.tpl'}
      {/block}
      {/if}
      <section id="wrapper">
        <div class="container">
          <div class="row">
          {block name="left_column"}
            <div id="left-column" class="col-xs-12 col-sm-4 col-md-3">
              {if $page.page_name == 'product'}
                {hook h='displayLeftColumnProduct'}
              {else}
                {hook h="displayLeftColumn"}
              {/if}
            </div>
          {/block}

          {block name="content_wrapper"}
            <div id="content-wrapper" class="left-column right-column col-sm-4 col-md-6">
              {block name="content"}
                <p>Hello world! This is HTML5 Boilerplate.</p>
              {/block}
            </div>
          {/block}

          {block name="right_column"}
            <div id="right-column" class="col-xs-12 col-sm-4 col-md-3">
              {if $page.page_name == 'product'}
                {hook h='displayRightColumnProduct'}
              {else}
                {hook h="displayRightColumn"}
              {/if}
            </div>
          {/block}
          </div>
        </div>
      </section>

      <footer id="footer">
        {include file="_partials/footer.tpl"}
      </footer>

    </main>
    {if isset($dorOptReload) && $dorOptReload == 1}
      <div class="dor-page-loading">
          <div id="loader"></div>
          <div class="loader-section section-left"></div>
          <div class="loader-section section-right"></div>
      </div>
    {/if}
    {hook h='dorSmartuser'}
    {block name='javascript_bottom'}
      {include file="_partials/javascript.tpl" javascript=$javascript.bottom}
    {/block}

    {block name='hook_before_body_closing_tag'}
      {hook h='displayBeforeBodyClosingTag'}
    {/block}
    {if isset($dorSubscribe) && $dorSubscribe == 1}
      {include file="_partials/dor-subscribe-popup.tpl"}
    {/if}
    <div id="to-top" class="to-top"> <i class="fa fa-angle-up"></i> </div>
    {hook h='dorthemeoptions'}
    {if $page.page_name|escape:'html':'UTF-8' == 'contact'}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMH_Sh8EdCWkG1OFhAih3FFhbkRYuo-0U"></script>
    <script src="{$urls.theme_assets}dorado/js/jquery.googlemap.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#mapContact").googleMap();
        $("#mapContact").addMarker({
            coords: [{if isset($DorLatitude)}{$DorLatitude}{/if}, {if isset($DorLongitude)}{$DorLongitude}{/if}],
            icon: prestashop.urls.base_url+'img/cms/dorado/icon/market-map.png',
            url: '{if isset($DorMapUrl)}{$DorMapUrl}{/if}'
          });
      });
    </script>
    {/if}
    {if $page.page_name == "product" || $page.page_name == 'module-dorgallery-gallery' || $page.page_name == 'module-dorgallery-gallery2'}
    <script src="{$urls.theme_assets}dorado/libs/photoswipe.js?v=4.1.1-1.0.4"></script>
    <script src="{$urls.theme_assets}dorado/libs/photoswipe-ui-default.min.js?v=4.1.1-1.0.4"></script>
    {/if}
  </body>

</html>
