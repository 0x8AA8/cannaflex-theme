{block name='topbar'}
	<div id="dor-topbar03" class="dor-topbar-wrapper">
		<div class="dor-topbar-inner">
			<div class="container-fluid">
				<div class="row">
					<div class="dor-setting-topbar-selector">
                  	{hook h='displayTopColumn'}
                  	<div id="_mobile_language_selector"></div>
              		<div id="_mobile_currency_selector"></div>
                  	</div>
                  	{hook h='topbarDorado3'}
					<a href="#" rel="nofollow" class="select-setting hidden pull-right"><i class="material-icons">&#xE8B8;</i></a>
                  	{hook h='dorwishlisttotal'}
				</div>
			</div>
		</div>
	</div>
{/block}