<section id="contact-form-v5" class="contact-form">

<h1 class="h1">{l s="Contact Us" d='Shop.Theme.Actions'}</h1>
<div id="contact-form-style5">
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
        <div class="container">
          <div class="row">
            <div class="media-info-contact col-xs-12 col-sm-6 col-md-6">
              <div class="media-contact-inner">
                <img src="{$urls.img_ps_url}cms/doo/contact/contact-image.png" alt=""/>
              </div>
            </div>
            <div class="text-info-contact col-xs-12 col-sm-6 col-md-6">
              <h3>{l s="Get in touch" d='Shop.Theme.Actions'}</h3>
              <p class="txt-info">{l s="Vestibulum quis posuere ligula. Fusce in odio ac diam finibus tempus. Suspen disse potenti. Etiam accu msan purus magna, ever ara mus consequat, felis at aliquam consect etur." d='Shop.Theme.Actions'}</p>     
              <ul class="list-contact-info">
                <li>
                  <h3>{l s='Address' d='Shop.Theme.Actions'}</h3>
                  <p>{l s='1800 Abbot Kinney Blvd. Unit D&E' d='Shop.Theme.Actions'}</p>
                  <p>{l s='Venice, CA 90291' d='Shop.Theme.Actions'</p>
                </li>
                <li>
                  <h3>{l s='Phone' d='Shop.Theme.Actions'}</h3>
                  <p>{l s='Mobile: (+88)-1990-6886' d='Shop.Theme.Actions'} </p>
                  <p>{l s='Hotline: 1800-1102' d='Shop.Theme.Actions'} </p>
                </li>
                <li>
                  <h3>{l s='Email' d='Shop.Theme.Actions'}</h3>
                  <p>{l s='support@organick.com' d='Shop.Theme.Actions'}</p>
                  <p>{l s='contact@organick.com' d='Shop.Theme.Actions'}</p>
                </li>
                <li class="contact-social">
                  <h3>{l s='Social' d='Shop.Theme.Actions'}</h3>
                  <div class="list-icon-social-contact">
                    <div class="social-connect-icon"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a> <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a> <a href="#" data-toggle="tooltip" data-placement="top" title="Vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
          <div class="contact-map clearfix">
                <div id="mapContact" style="width:100%; height:500px; margin: auto; margin-top: 20px;"></div>
          </div>

        <div class="container">
          <div class="row">
              <div class="group-contact-form col-xs-12 col-sm-8 col-md-8 text-center">
              <div class="txt-head-contact">
                <h2>{l s='Leave us a message' d='Shop.Theme.Actions'}</h2>
                <span>- {l s='Good for nature, good for you' d='Shop.Theme.Actions'} -</span>
              </div>
              <div class="form-info-contact">
                <p class="hidden">{l s='If you have any questions, requests or suggestions? Please let us know using the form below. We will reply as soon as possible to you.' d='Shop.Theme.Actions'}</p>
                <div class="form-group-input row">
                  <div class="form-group col-lg-4 col-sm-4 col-xs-12">
                    <label for="contactname" class="hidden">{l s='Your name' d='Shop.Theme.Actions'}</label>
                    <input class="form-control grey" type="text" id="contactname" name="contactname" value="" placeholder="{l s='Your name' d='Shop.Theme.Actions'}"/>
                  </div>
                  <div class="form-group col-lg-4 col-sm-4 col-xs-12">
                    <label class="form-control-label hidden">{l s='Email address' d='Shop.Theme.Actions'}</label>
                    <input
                      class="form-control"
                      name="from"
                      type="email"
                      value="{$contact.email}"
                      placeholder="{l s='Email' d='Shop.Theme.Actions'}"
                    >
                  </div>
                  <div class="form-group col-lg-4 col-sm-4 col-xs-12">
                    <label for="contactweb" class="hidden">{l s='Website' d='Shop.Theme.Actions'}</label>
                    <input class="form-control grey" type="text" id="contactweb" name="contactweb" value="" placeholder="{l s='Website'}"/>
                  </div>
                  <div class="form-group hidden">
                    <label for="contactPhone" class="hidden">{l s='Phone Number' d='Shop.Theme.Actions'}</label>
                    <input class="form-control grey" type="text" id="contactPhone" name="contactPhone" value="" placeholder=""/>
                  </div>
                </div>
                <div class="form-group-area clearfix">
                  <div class="form-group">
                    <label class="form-control-label hidden">{l s='Message' d='Shop.Theme.Actions'}</label>
                      <textarea
                        id="message"
                        class="form-control"
                        name="message"
                        placeholder="{l s='Message' d='Shop.Theme.Actions'}"
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
          </div>
        </div>

        </div>
      </fieldset>
    </form>
  </div>
</section>

<script type="text/javascript">
  var d = document.getElementById("contact");
  d.className += " dorContactStyle5";
</script>