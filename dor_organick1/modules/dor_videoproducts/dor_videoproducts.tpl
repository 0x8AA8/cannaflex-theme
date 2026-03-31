<div class="tab-pane fade in " id="video-product">
{foreach from=$videos item=video name=videos}
{if isset($video.videoCode) && $video.videoCode != ""}
<video
    id="product-video-id{$video.videoCode}"
    class="video-js vjs-default-skin"
    controls
    width="{$video.width}" height="{$video.height}"
    data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "https://www.youtube.com/v/{$video.videoCode}"}] }'
  >
</video>

<script>
  setTimeout(function(){
  	videojs('product-video-id{$video.videoCode}').ready(function() {
	    var myPlayer = this;
	    myPlayer.src({ type: 'video/youtube', src: 'https://www.youtube.com/v/{$video.videoCode}' });
	  });
  },2000);
</script>
{/if}
{/foreach}
</div>