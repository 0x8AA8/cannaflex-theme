<section id="contact-form-v2" class="contact-form">
<h1 class="h1">{l s="Contact Us"}</h1>
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
        <h3 class="page-subheading hidden">{l s='send a message'}</h3>
        <div class="clearfix">

        <label class="hidden">
          <span>{l s='Subject Heading'}</span>
          <select name="id_contact">
            {foreach from=$contact.contacts item=contact_elt}
              <option value="{$contact_elt.id_contact}">{$contact_elt.name}</option>
            {/foreach}
          </select>
        </label>
          <div class="group-contact-form col-xs-12 col-sm-12 col-md-12">
            <div class="text-info-contact">
              <h3 class="page-subheading">{l s='Send Massage'}</h3>
            </div>
            <div class="form-info-contact">
              <p>{l s='If you have any questions, requests or suggestions? Please let us know using the form below. We will reply as soon as possible to you.'}</p>
              <div class="form-group-input">
                <div class="form-group">
                  <label for="contactname">{l s='Your name'}</label>
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
                <div class="form-group">
                  <label for="contactPhone">{l s='Phone Number' d='Shop.Theme.Actions'}</label>
                  <input class="form-control grey" type="text" id="contactPhone" name="contactPhone" value="" placeholder=""/>
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
          <div class="contact-map clearfix">
                <div id="mapContact" style="width:100%; height:500px; margin: auto; margin-top: 20px;"></div>
                <ul class="list-contact-info">
                <li class="col-lg-4 col-sm-6 col-xs-12">
                  <div>
                    <h3>{l s='Head Office' d='Shop.Theme.Actions'}</h3>
                    <p>PO Box 16122 Collins Street West Victoria 8007 Australia - <a href="#">{l s='View Map'}</a></p>
                    <p>{l s='Tel:' d='Shop.Theme.Actions'} <strong>1900 585 989</strong></p>
                    <p>{l s='Email:' d='Shop.Theme.Actions'} <a href="#">sale@organick.com</a></p>
                  </div>
                </li>
                <li class="col-lg-4 col-sm-6 col-xs-12">
                  <div>
                    <h3>{l s='Showroom 01' d='Shop.Theme.Actions'}</h3>
                    <p>PO Box 16122 Collins Street West Victoria 8007 Australia - <a href="#">{l s='View Map' d='Shop.Theme.Actions'}</a></p>
                    <p>{l s='Tel:' d='Shop.Theme.Actions'} <strong>1900 585 989</strong></p>
                    <p>{l s='Email:' d='Shop.Theme.Actions'} <a href="#">sale@organick.com</a></p>
                  </div>
                </li>
                <li class="col-lg-4 col-sm-6 col-xs-12">
                  <div>
                    <h3>{l s='Showroom 02' d='Shop.Theme.Actions'}</h3>
                    <p>PO Box 16122 Collins Street West Victoria 8007 Australia - <a href="#">{l s='View Map' d='Shop.Theme.Actions'}</a></p>
                    <p>{l s='Tel:' d='Shop.Theme.Actions'} <strong>1900 585 989</strong></p>
                    <p>{l s='Email:' d='Shop.Theme.Actions'} <a href="#">sale@organick.com</a></p>
                  </div>
                </li>
                <li class="col-lg-4 col-sm-6 col-xs-12">
                  <div>
                    <h3>{l s='Showroom 03'}</h3>
                    <p>PO Box 16122 Collins Street West Victoria 8007 Australia - <a href="#">{l s='View Map' d='Shop.Theme.Actions'}</a></p>
                    <p>{l s='Tel:' d='Shop.Theme.Actions'} <strong>1900 585 989</strong></p>
                    <p>{l s='Email:' d='Shop.Theme.Actions'} <a href="#">sale@organick.com</a></p>
                  </div>
                </li>
                <li class="col-lg-4 col-sm-6 col-xs-12">
                  <div>
                    <h3>{l s='Showroom 04' d='Shop.Theme.Actions'}</h3>
                    <p>PO Box 16122 Collins Street West Victoria 8007 Australia - <a href="#">{l s='View Map' d='Shop.Theme.Actions'}</a></p>
                    <p>{l s='Tel:' d='Shop.Theme.Actions'} <strong>1900 585 989</strong></p>
                    <p>{l s='Email:' d='Shop.Theme.Actions'} <a href="#">sale@organick.com</a></p>
                  </div>
                </li>
                <li class="col-lg-4 col-sm-6 col-xs-12">
                  <div>
                    <h3>{l s='Showroom 05' d='Shop.Theme.Actions'}</h3>
                    <p>PO Box 16122 Collins Street West Victoria 8007 Australia - <a href="#">{l s='View Map' d='Shop.Theme.Actions'}</a></p>
                    <p>{l s='Tel:' d='Shop.Theme.Actions'} <strong>1900 585 989</strong></p>
                    <p>{l s='Email:' d='Shop.Theme.Actions'} <a href="#">sale@organick.com</a></p>
                  </div>
                </li>
              </ul>
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</section>