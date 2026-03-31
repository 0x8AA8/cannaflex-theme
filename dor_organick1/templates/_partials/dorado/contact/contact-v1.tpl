<section id="contact-form-v1" class="contact-form">
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
        
        <div class="clearfix row">
        <label class="hidden">
          <span>{l s='Subject Heading' d='Shop.Theme.Actions'}</span>
          <select name="id_contact">
            {foreach from=$contact.contacts item=contact_elt}
              <option value="{$contact_elt.id_contact}">{$contact_elt.name}</option>
            {/foreach}
          </select>
        </label>
          <div class="group-contact-form col-xs-12 col-sm-6 col-md-6">
            <div class="text-info-contact">
              <h3 class="page-subheading">{l s='Send Massage' d='Shop.Theme.Actions'}</h3>
            </div>
            <div class="form-info-contact">
              <p>{l s='If you have any questions, requests or suggestions? Please let us know using the form below. We will reply as soon as possible to you.' d='Shop.Theme.Actions'}</p>
              <div class="form-group-input">
                <div class="form-group">
                  <label for="contactname">{l s='Your name' d='Shop.Theme.Actions'}</label>
                  <input class="form-control grey" type="text" id="contactname" name="contactname" value="" placeholder=""/>
                </div>
                <div class="form-group">
                  <label class="form-control-label">{l s='Email address' d='Shop.Theme.Actions'}</label>
                  <input
                    class="form-control"
                    name="from"
                    type="email"
                    value="{$contact.email}"
                    placeholder=""
                  >
                </div>
                <div class="form-group">
                  <label for="contactweb">{l s='Website' d='Shop.Theme.Actions'}</label>
                  <input class="form-control grey" type="text" id="contactweb" name="contactweb" value="" placeholder=""/>
                </div>
              </div>
              <div class="form-group-area">
                <div class="form-group">
                  <label class="form-control-label">{l s='Message' d='Shop.Theme.Actions'}</label>
                    <textarea
                      id="message"
                      class="form-control"
                      name="message"
                      placeholder=""
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
          <div class="contact-map col-xs-12 col-sm-6 col-md-6">
                <div id="mapContact" style="width:100%; height:350px; margin: auto; margin-top: 20px;"></div>
                <ul class="list-contact-info">
                <li>
                  <i class="material-icons">&#xE55F;</i>
                  <div>
                    <h3>{l s='Address' d='Shop.Theme.Actions'}</h3>
                    <p>{l s='PO Box 16122 Collins Street West Victoria 8007 Australia' d='Shop.Theme.Actions'}</p>
                  </div>
                </li>
                <li>
                  <i class="material-icons">&#xE551;</i>
                  <div>
                    <h3>{l s='Phone' d='Shop.Theme.Actions'}</h3>
                    <p>{l s='Hotline:' d='Shop.Theme.Actions'} <strong>{l s='1900 585 888' d='Shop.Theme.Actions'}</strong></p>
                  </div>
                </li>
                <li>
                  <i class="material-icons">&#xE0E1;</i>
                  <div>
                    <h3>{l s='Email' d='Shop.Theme.Actions'}</h3>
                    <p><a href="#">{l s='sale@organick.com' d='Shop.Theme.Actions'}</a></p>
                  </div>
                </li>
                <li>
                  <i class="material-icons">&#xE192;</i>
                  <div>
                    <p>{l s='Monday to Friday: 8h00 am - 17h00 pm' d='Shop.Theme.Actions'}</p>
                    <p>{l s='Saturday to Sunday: 9h00 am - 15h30 pm' d='Shop.Theme.Actions'}</p>
                  </div>
                </li>
              </ul>
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</section>