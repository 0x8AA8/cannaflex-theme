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
<link rel='dns-prefetch' href='//fonts.googleapis.com' />
<link rel='dns-prefetch' href='//s.w.org' />
{foreach $stylesheets.external as $stylesheet}
  <link rel="stylesheet" href="{$stylesheet.uri}" type="text/css" media="{$stylesheet.media}">
{/foreach}
<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">

{if $page.page_name == "product" || $page.page_name == 'module-dorgallery-gallery' || $page.page_name == 'module-dorgallery-gallery2'}
<link href="{$urls.theme_assets}dorado/libs/photoswipe.css?v=4.1.1-1.0.4" rel="stylesheet" />
<link href="{$urls.theme_assets}dorado/libs/default-skin/default-skin.css?v=4.1.1-1.0.4" rel="stylesheet" />
{/if}

{if $page.page_name != ""}
<link href="{$urls.theme_assets}dorado/css/topbar.css" rel="stylesheet" type="text/css"/>
<link href="{$urls.theme_assets}dorado/css/header.css" rel="stylesheet" type="text/css"/>
<link href="{$urls.theme_assets}dorado/css/organick.css" rel="stylesheet" type="text/css"/>
<link href="{$urls.theme_assets}dorado/css/aboutus.css" rel="stylesheet" type="text/css"/>
{/if}
{if $page.page_name == 'contact'}
<link href="{$urls.theme_assets}dorado/css/contact-form.css" rel="stylesheet" type="text/css"/>
{/if}
{if $page.page_name == 'module-smartblog-category' || $page.page_name == 'module-smartblog-details' || $page.page_name == 'module-smartblog-search' || $page.page_name == 'module-smartblog-tagpost'}
<link href="{$urls.theme_assets}dorado/css/blog.css" rel="stylesheet" type="text/css"/>
{/if}
{if $page.page_name != ""}
<link href="{$urls.theme_assets}dorado/css/theme.css" rel="stylesheet" type="text/css"/>
<link href="{$urls.theme_assets}dorado/css/responsive.css" rel="stylesheet" type="text/css"/>
{/if}
{if isset($dorthemecolor) && $dorthemecolor != "" && isset($dorEnableThemeColor) && $dorEnableThemeColor == 1}
	{if $pathTmpColor == 1}
	<link href="{$urls.theme_assets}dorado/css/color/{$dorthemecolor}.css" rel="stylesheet" type="text/css"/>
	{else}
	<link href="{$urls.base_url}modules/dor_themeoptions/css/color/{$dorthemecolor}.css" rel="stylesheet" type="text/css"/>
	{/if}
{/if}
{foreach $stylesheets.inline as $stylesheet}
  <style>
    {$stylesheet.content}
  </style>
{/foreach}
