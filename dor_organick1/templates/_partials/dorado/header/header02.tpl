{block name='header'}
	<div id="dor-header02" class="header-content-wrapper dorheader02">
		{block name='header_banner'}
		  <div class="header-banner">
		    {hook h='displayBanner'}
		  </div>
		{/block}
		
		{block name='header_top'}
		  <div class="header-top no-padding">
		    <div class="container">
		       <div class="row">
		       	{capture name='dorHeaderSearch'}{hook h='dorHeaderSearch'}{/capture}
				{if $smarty.capture.dorHeaderSearch}
				<div class="dor-search-header2 col-lg-3 col-md-3">
				  <div class="dorHeader2Search-Wapper">
				      {$smarty.capture.dorHeaderSearch nofilter}
				  </div>
				</div>
				{/if}
		       	<div class="dor-main-logo col-lg-6 col-sm-6">
		       		<div class="main-logo-inner">
			       		<div class="main-logo-wrapper">
					        <div class="item-logo" id="_desktop_logo">
					         {if $page.page_name == 'index'}
					          <h1 class="h1-logo no-margin">
					            <a href="{$urls.base_url}">
					              <img class="logo img-responsive" src="{$shop.logo}" alt="{$shop.name}">
					            </a>
					          </h1>
					          {else}
					          <div class="h1-logo no-margin">
					            <a href="{$urls.base_url}">
					              <img class="logo img-responsive" src="{$shop.logo}" alt="{$shop.name}">
					            </a>
					          </div>
					          {/if}
					        </div>
					        <div class="item-logo top-logo" id="_mobile_logo"></div>
				        </div>
			        </div>
		        </div>
		        <div class="dor-header-setting-inner  col-lg-3 col-sm-3 pull-right">
		        {hook h='headerDorado1'}
		          <div class="head-dorsetting pull-right">
		            {block name='header_nav'}
		              <nav class="header-nav">
		                <div class="hidden-sm-down-">
		                  <div class="right-nav">
		                      <div class="nav-search-button"><button type="button"><i class="pe-7s-search"></i></button></div>
		                      {hook h='displayNav1'}
		                      <div class="dor-block-selection">
		                      	<div class="nav-setting-button"><button type="button"><i class="pe-7s-config"></i></button></div>
		                      	<div class="dor-setting-lists">
		                      	{hook h='displayTopColumn'}
		                      	<div id="_mobile_language_selector"></div>
                          		<div id="_mobile_currency_selector"></div>
		                      	</div>
		                      </div>
		                      <div class="nav-cart">
		                      {hook h='displayNav2'}
		                      <div class="pull-xs-right" id="_mobile_cart"></div>
		                      </div>
		                  </div>
		                </div>
		                <div class="hidden-md-up text-xs-center mobile hidden">
		                  <div class="pull-xs-left" id="menu-icon">
		                    <i class="material-icons d-inline">&#xE5D2;</i>
		                  </div>
		                  <div class="pull-xs-right" id="_mobile_user_info"></div>
		                  
		                  <div class="clearfix"></div>
		                </div>
		              </nav>
		            {/block}
		          </div>
		        </div>
		      </div>
		      <div class="dor-mainmenu-inner clearfix">
			      	<div class="container">
				        <div class="head-dormenu">
				            {hook h='displayTop'}
				        </div>
			        </div>
		       </div>
		      <div id="mobile_top_menu_wrapper" class="row hidden-md-up" style="display:none;">
		        <div class="js-top-menu mobile" id="_mobile_top_menu"></div>
		        <div class="js-top-menu-bottom">
		          <div id="_mobile_contact_link"></div>
		        </div>
		      </div>
		    </div>
		  </div>
		  {hook h='displayNavFullWidth'}
		{/block}
	</div>
{/block}