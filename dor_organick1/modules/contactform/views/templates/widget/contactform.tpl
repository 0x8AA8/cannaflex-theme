{if (isset($dorContactStyle) && $dorContactStyle == 1 && !isset($smarty.get.v)) || (isset($smarty.get.v) && $smarty.get.v == 1)}
{include file="_partials/dorado/contact/contact-v1.tpl"}
{elseif (isset($dorContactStyle) && $dorContactStyle == 2 && !isset($smarty.get.v)) || (isset($smarty.get.v) && $smarty.get.v == 2)}
{include file="_partials/dorado/contact/contact-v2.tpl"}
{elseif (isset($dorContactStyle) && $dorContactStyle == 3 && !isset($smarty.get.v)) || (isset($smarty.get.v) && $smarty.get.v == 3)}
{include file="_partials/dorado/contact/contact-v3.tpl"}
{elseif (isset($dorContactStyle) && $dorContactStyle == 5 && !isset($smarty.get.v)) || (isset($smarty.get.v) && $smarty.get.v == 5)}
{include file="_partials/dorado/contact/contact-v5.tpl"}
{else}
<section class="contact-form">
<h1 class="h1">{l s="Contact Us" d='Shop.Theme.Actions'}</h1>
<div id="contact-form-style1">
    <form action="{$urls.pages.contact}" method="post" {if $contact.allow_file_upload}enctype="multipart/form-data"{/if}>
      <fieldset>
        {if $notifications}
          <div class="col-xs-12 alert {if $notifications.nw_error}alert-danger{else}alert-success{/if}">
            <ul>
              {foreach $notifications.messages as $notif}
                <li>{$notif}</li>
              {/foreach}
            </ul>
          </div>
        {/if}
        <h3 class="page-subheading hidden">{l s='send a message' d='Shop.Theme.Actions'}</h3>
        <div class="clearfix">

        <label class="hidden">
          <span>{l s='Subject Heading' d='Shop.Theme.Actions'}</span>
          <select name="id_contact">
            {foreach from=$contact.contacts item=contact_elt}
              <option value="{$contact_elt.id_contact}">{$contact_elt.name}</option>
            {/foreach}
          </select>
        </label>
          <div class="group-contact-form">
            <div class="text-info-contact col-xs-12 col-sm-4 col-md-4">
              <ul class="list-contact-info">
                <li>
                  <h3>{l s='Address' d='Shop.Theme.Actions'}</h3>
                  <p>1800 Abbot Kinney Blvd. Unit D&E</p>
                  <p>Venice, CA 90291</p>
                </li>
                <li>
                  <h3>{l s='Phone' d='Shop.Theme.Actions'}</h3>
                  <p>{l s='Mobile:'} (+88)-1990-6886</p>
                  <p>{l s='Hotline:'} 1800-1102</p>
                </li>
                <li>
                  <h3>{l s='Email' d='Shop.Theme.Actions'}</h3>
                  <p>support@organick.com</p>
                  <p>contact@organick.com</p>
                </li>
                <li class="contact-social">
                  <h3>{l s='Social' d='Shop.Theme.Actions'}</h3>
                  <div class="list-icon-social-contact">
                    <div class="social-connect-icon"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a> <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a> <a href="#" data-toggle="tooltip" data-placement="top" title="Vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="form-info-contact col-xs-12 col-sm-8 col-md-8">
              <h2>{l s='Get in touch' d='Shop.Theme.Actions'}</h2>
              <div class="form-group-input row">
                <div class="form-group col-lg-4 col-sm-4 col-xs-12">
                  <label for="contactname" class="hidden">{l s='Your name' d='Shop.Theme.Actions'}</label>
                  <input class="form-control grey" type="text" id="contactname" name="contactname" value="" placeholder="{l s='Your name' d='Shop.Theme.Actions'}"/>
                </div>
                <div class="form-group col-lg-4 col-sm-4 col-xs-12">
                  <label class="col-md-3 form-control-label hidden">{l s='Email address' d='Shop.Forms.Labels' d='Shop.Theme.Actions'}</label>
                  <input
                    class="form-control"
                    name="from"
                    type="email"
                    value="{$contact.email}"
                    placeholder="{l s='your@email.com' d='Shop.Theme.Actions'}"
                  >
                </div>
                <div class="form-group col-lg-4 col-sm-4 col-xs-12">
                  <label for="contactweb" class="hidden">{l s='Website' d='Shop.Theme.Actions'}</label>
                  <input class="form-control grey" type="text" id="contactweb" name="contactweb" value="" placeholder="{l s='Website' d='Shop.Theme.Actions'}"/>
                </div>
              </div>
              <div class="form-group-area">
                <div class="form-group">
                  <label class="col-md-3 form-control-label hidden">{l s='Message' d='Shop.Theme.Actions'}</label>
                    <textarea
                      id="message"
                      class="form-control"
                      name="message"
                      placeholder="{l s='How can we help?' d='Shop.Theme.Actions'}"
                      rows="7"
                    >{if $contact.message}{$contact.message}{/if}</textarea>
                </div>
              </div>
              <input type="text" name="url" value="" style="display: none !important;" />
              <input type="hidden" name="token" value="{$token}" />
              <div class="submit">
                <button type="submit" name="submitMessage" id="submitMessage" class="button btn btn-default button-medium"><span>{l s='Post Comment' d='Shop.Theme.Actions'}<i class="icon-chevron-right right hidden"></i></span></button>
              </div>
            </div>
          </div>
          <div class="contact-map clearfix">
                <div id="mapContact" style="width:100%; height:500px; margin: auto; margin-top: 20px;"></div>
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</section>
{/if}