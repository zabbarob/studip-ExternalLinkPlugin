<?
$href = htmlReady($external_link);
?>

Der externe Link zur Veranstaltung ist:<br>
<a href="<?=$href?>" target="_blank"><?=$href?></a>

<br>

<button id="copy-button" data-clipboard-text="<?=$href?>" title="Click to copy me.">Link in die Zwischenablage kopieren</button>

<script src="/studip/plugins_packages/virtUOS/ExternalLinkPlugin/assets/ZeroClipboard.js"></script>

<script>
// http://jonrohan.github.io/ZeroClipboard/
// https://github.com/jonrohan/ZeroClipboard
var clip = new ZeroClipboard( document.getElementById("copy-button"), {
  moviePath: "/studip/plugins_packages/virtUOS/ExternalLinkPlugin/assets/ZeroClipboard.swf"
} );

clip.on( 'load', function(client) {
  // alert( "movie is loaded" );
} );

clip.on( 'complete', function(client, args) {
  this.style.display = 'none'; // "this" is the element that was clicked
  alert("Copied text to clipboard: " + args.text );
} );

clip.on( 'mouseover', function(client) {
  // alert("mouse over");
} );

clip.on( 'mouseout', function(client) {
  // alert("mouse out");
} );

clip.on( 'mousedown', function(client) {

  // alert("mouse down");
} );

clip.on( 'mouseup', function(client) {
  // alert("mouse up");
} );
</script>

