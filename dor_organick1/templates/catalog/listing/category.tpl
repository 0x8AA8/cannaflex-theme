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
{extends file='catalog/listing/product-list.tpl'}

{block name='product_list_header'}
    <div class="block-category card card-block hidden hidden-sm-down">
      {if $category.description}
        <div id="category-description" class="text-muted">{$category.description nofilter}</div>
        <div class="category-cover">
          <img src="{$category.image.large.url}" alt="{$category.image.legend}">
        </div>
      {/if}
    </div>
    <div class="text-xs-center hidden-md-up">
      <h1 class="h1">{$category.name}</h1>
    </div>
    {if isset($subcategories) && $subcategories}
    <!-- Subcategories -->
    <div id="subcategories">
      <ul class="clearfix list-sub-cate">
      {foreach from=$subcategories item=subcategory key=i}
        <li>
          <div class="subcategory-image subcate-{$i}">
            <a href="{$link->getCategoryLink($subcategory.id_category, $subcategory.link_rewrite)|escape:'html':'UTF-8'}" title="{$subcategory.name|escape:'html':'UTF-8'}" class="img">
            {if $subcategory.image != null}
              <img class="replace-2x" src="{$subcategory.image.medium.url}" alt="{$subcategory.name|escape:'html':'UTF-8'}" width="{$subcategory.image.medium.width}" height="{$subcategory.image.medium.height}" />
            {/if}
                <h3>{$subcategory.name|truncate:25:'...'|escape:'html':'UTF-8' nofilter}</h3>
            </a>
          </div>
          {if $subcategory.description}
          <div class="cat_desc hidden">{$subcategory.description nofilter}</div>
          {/if}
        </li>
      {/foreach}
      </ul>
    </div>
    {/if}
{/block}
