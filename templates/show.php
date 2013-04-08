<?
$href = htmlReady($external_link);
?>

Der externe Link zur Veranstaltung ist:<br>
<a href="<?=$href?>" target="_blank"><?=$href?></a><br>
<button id="copy-button" data-clipboard-text="<?=$href?>" title="Klicken zum kopieren.">Link in die Zwischenablage kopieren</button>

<script src="/studip/plugins_packages/virtUOS/ExternalLinkPlugin/assets/ZeroClipboard.js"></script>

<script>
// http://jonrohan.github.io/ZeroClipboard/
// https://github.com/jonrohan/ZeroClipboard
var clip = new ZeroClipboard( document.getElementById("copy-button"), {
  moviePath: "/studip/plugins_packages/virtUOS/ExternalLinkPlugin/assets/ZeroClipboard.swf"
} );

clip.on( 'complete', function(client, args) {
    // this = object that has been clicked (copy-button)
    // args.text = value that has been copied to clipboard
  alert("Der Link wurde in die Zwischenablage kopiert.");
} );
</script>

