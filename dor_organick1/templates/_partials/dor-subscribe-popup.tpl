<!-- Subscribe Popup 1 -->
<section class="subscribe-me">
    <a href="#close" onclick="return false" class="sb-close-btn close popup-cls b-close"><i class="fa-times fa"></i></a>      
    <div class="modal-content {if $dorSubsPop == 1}subscribe-1 wht-clr{else}subscribe-2 blk-clr{/if}">   
        <div class="login-wrap text-center">
            <h2><i class="fa fa-send-o" aria-hidden="true"></i>{l s='Join Our Newsletter' d='Shop.Theme.Actions'}</h2>
            <p>{l s='sign up for our newsletter and get' d='Shop.Theme.Actions'} <span>25%</span> {l s='off your next order. Pretty sweet, we know' d='Shop.Theme.Actions'}</p>
            <div class="login-form spctop-30"> 
                <form class="subscribe" action="{$link->getPageLink('index', null, null, null, false, null, true)|escape:'html':'UTF-8'}" method="post">
                    <div class="form-group{if isset($msg) && $msg } {if $nw_error}form-error{else}form-ok{/if}{/if}" >
                        <input class="inputNew form-control grey newsletter-input" id="dorNewsletter-input" type="text" name="email" size="18" value=""  placeholder="{l s='Your email address' d='Shop.Theme.Actions'}"/>
                    </div>
                    <div class="form-group">
                        <button class="alt fancy-button" type="submit" name="submitNewsletter"> <span class="fa fa-envelope"></span> {l s='Subscribe' d='Shop.Theme.Actions'} </button>
                        <input type="hidden" name="action" value="0" />
                    </div>
                    <div class="form-group checkAgainSubs"><input type="checkbox" name="notShowSubs"> <span>{l s="Don't show this popup again" d='Shop.Theme.Actions'}</span></div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- / Subscribe Popup 1 -->