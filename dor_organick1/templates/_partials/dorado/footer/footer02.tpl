<div id="dor-footer-02">
  <div class="container">
    <div class="row">
      {block name='hook_footer_before'}
        {hook h='displayFooterBefore'}
      {/block}
      {hook h='doradoFooterTop'}
    </div>
  </div>
  <div class="doradoFooterAdv clearfix">
    <div class="container">
      <div class="row">
      {block name='hook_doradoFooterAdv'}
        {hook h='doradoFooterAdv'}
      {/block}
      </div>
    </div>
  </div>
</div>