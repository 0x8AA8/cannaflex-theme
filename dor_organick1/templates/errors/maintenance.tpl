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




{extends file='layouts/layout-error.tpl'}

{block name='content'}
  <section id="main" class="dor-under-construction">
  <div class="under-construction-inner">
  <div class="under-construction-wrapper">
  <div class="under-construction-grop">
  <div class="under-construction-item">
    {block name='page_header_container'}
      <header class="page-header" style="display: none;">
        {block name='page_header_logo'}
        <div class="logo"><img src="{$shop.logo}" alt="logo"></div>
        {/block}

        {block name='hook_maintenance'}
          {$HOOK_MAINTENANCE nofilter}
        {/block}

        {block name='page_header'}
          <h1 class="hidden" style="display: none;">{block name='page_title'}{l s='We\'ll be back soon.' d='Shop.Theme'}{/block}</h1>
        {/block}
      </header>
    {/block}

    {block name='page_content_container'}
      <section id="content" class="page-content page-maintenance">
        {block name='page_content'}
          {$maintenance_text nofilter}
        {/block}
      </section>
    {/block}

    {block name='page_footer_container'}

    {/block}
    </div>
    </div>
    </div>
    </div>
  </section>
  <footer id="under-construction-footer">
    <div class="footer-construction">
      <div class="footer-constr-inner">
        <span>Copyright @ 2017 </span><a href="/">Organick</a>.<span> All rights reserved</span>
      </div>
    </div>
  </footer>
  <script type="text/javascript">
    $("#countdown-timer-under").countdown("06/30/2019", function (event) {
                                  var $this = $(this).html(event.strftime(''
                                          + '<div class="item-time"><span class="dw-time">%D</span> <span class="dw-txt">{l s="days"}</span></div>'
                                          + '<div class="item-time"><span class="dw-time">%H</span> <span class="dw-txt">{l s="hours"}</span></div>'
                                          + '<div class="item-time"><span class="dw-time">%M</span> <span class="dw-txt">{l s="mins"}</span></div>'
                                          + '<div class="item-time"><span class="dw-time">%S</span> <span class="dw-txt">{l s="secs"}</span></div>'));
                              });
</script>
{/block}
