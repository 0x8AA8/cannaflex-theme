{*
* 2007-2016 PrestaShop
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
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<!-- Block tags module -->
<div id="tags_block_footer" class="block tags_block footer-block">
	<h4 class="hidden-sm-down">{l s='Tag Products' d='Modules.Dorblocktags.Shop'}</h4>
	<div class="title clearfix hidden-md-up" data-target="#footer_block_tags" data-toggle="collapse"><span class="h3">{l s='Tags' d='Modules.Dorblocktags.Shop'}</span> <span class="pull-xs-right"> <span class="navbar-toggler collapse-icons"> <i class="material-icons add"></i> <i class="material-icons remove"></i> </span> </span></div>
	<div id="footer_block_tags" class="toggle-footer collapse">
		<p class="block_content">
		{if $tags}
			{foreach from=$tags item=tag name=myLoop}
				<a href="{$link->getPageLink('search', true, NULL, "tag={$tag.name|urlencode}")|escape:'html'}" title="{l s='More about' d='Modules.Dorblocktags.Shop'} {$tag.name|escape:html:'UTF-8'}" class="{$tag.class} {if $smarty.foreach.myLoop.last}last_item{elseif $smarty.foreach.myLoop.first}first_item{else}item{/if}">{$tag.name|escape:html:'UTF-8'}</a>
			{/foreach}
		{else}
			{l s='No tags have been specified yet.' d='Modules.Dorblocktags.Shop'}
		{/if}
		</p>
	</div>
</div>
<!-- /Block tags module -->
