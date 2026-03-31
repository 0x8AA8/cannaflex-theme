{*
* 2007-2017 PrestaShop
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
*  @copyright  2007-2017 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<div class="block_newsletter footer-block-wap">
      <div class="block_newsletter_data">
        <div class="title-block text-center">
        <h4 class="hidden-sm-down">{l s='Join our newsletter' d='Shop.Theme'}</h4>
        </div>
        <div class="title clearfix hidden-md-up" data-target="#footer_newsletter_apse" data-toggle="collapse"><span class="h3">{l s='Join our newsletter' d='Shop.Theme'}</span> <span class="pull-xs-right"> <span class="navbar-toggler collapse-icons"> <i class="material-icons add"></i> <i class="material-icons remove"></i> </span> </span></div>
        <div id="footer_newsletter_apse" class="toggle-footer collapse">
          <form id="main-newsletter-footer" action="{$urls.pages.index}#footer" method="post">
            <div class="row-newsletter">
              <div class="col-newsletter-data">
                <button
                  class="btn btn-primary pull-xs-right hidden-xs-down btnSubmitNewsletter"
                  name="submitNewsletter"
                  type="submit"
                  value="{l s='Subscribe' d='Shop.Theme.Actions'}">
                  <i class="fa fa-send-o" aria-hidden="true"></i>
                </button>
                <button
                  class="btn btn-primary pull-xs-right hidden hidden-sm-up btnSubmitNewsletter"
                  name="submitNewsletter"
                  type="submit"
                  value="{l s='OK' d='Shop.Theme.Actions'}"
                >
                </button>

                <div class="input-wrapper">
                  <input
                    name="email"
                    type="text"
                    value="{$value}"
                    placeholder="{l s='Type your email here' d='Shop.Forms.Labels'}"
                  >
                </div>
                <input type="hidden" name="action" value="0">
                <div class="clearfix"></div>
              </div>
              <div class="col-xs-12">
                  {if $conditions}
                    <p class="hidden">{$conditions}</p>
                  {/if}
                  {if $msg}
                    <p class="alert {if $nw_error}alert-danger{else}alert-success{/if}">
                      {$msg}
                    </p>
                  {/if}
              </div>
            </div>
          </form>
          <div class="newsletter-info"><p>{l s='Sign up for our newsletter and get' d='Shop.Theme'}&nbsp;<span>50% {l s='off' d='Shop.Theme'}</span>&nbsp;{l s='your next order. Pretty sweet, we know.' d='Shop.Theme'}</p></div>
          <ul class="footer-newsletter-social no-padding">
            <li><a href="#" data-toggle="tooltip" data-original-title="{l s='Facebook' d='Shop.Theme.Actions'}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="#" data-toggle="tooltip" data-original-title="{l s='Twitter' d='Shop.Theme.Actions'}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="#" data-toggle="tooltip" data-original-title="{l s='Pinterest' d='Shop.Theme.Actions'}"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
            <li><a href="#" data-toggle="tooltip" data-original-title="{l s='Instagram' d='Shop.Theme.Actions'}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
</div>
