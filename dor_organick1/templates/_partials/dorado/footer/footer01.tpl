
<div class="dorFooterMain">
  <div class="container">
    <div class="row">
      {hook h='doradoFooterTop'}
    </div>
  </div>
  <div class="footer-container dorFooterInner">
    <div class="container">
    	<div class="row">
        {block name='hook_doradoFooter1'}
          {hook h='doradoFooter1'}
        {/block}
        {block name='hook_footer_before'}
          {hook h='displayFooterBefore'}
        {/block}
      </div>
      <div class="row">
        {block name='hook_footer_after'}
          {hook h='displayFooterAfter'}
        {/block}
      </div>
    </div>
  </div>
  <div class="doradoFooterAdv animatedParent animateOnce clearfix">
    <div class="container">
      <div class="row animated growIn">
      {block name='hook_doradoFooterAdv'}
        {hook h='doradoFooterAdv'}
      {/block}
      </div>
    </div>
  </div>
</div>