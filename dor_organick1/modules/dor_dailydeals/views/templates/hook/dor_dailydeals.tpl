<div id="countdown-data" class="gst-row row-carbon-fiber ovh" {if $ajaxload == 1} data-ajaxurl="{if isset($urls.force_ssl) && $urls.force_ssl}{$urls.base_url_ssl}{else}{$urls.base_url}{/if}modules/dor_dailydeals/dailydeals-ajax.php"{/if}>
	
	<div class="dailydeal-content">
	{if isset($ajaxload) && $ajaxload == 0 && isset($products) && $products}
        {include file="{$product_path}"}
	{/if}
	</div>
</div>
