<?
$href = htmlReady($external_link);
$button_text = _("Link in die Zwischenablage kopieren");
?>

<p>Unten sehen sie den externen Link auf die aktuelle Veranstaltung. Benutzer die nicht eingeloggt sind werden nach Aufruf des Links automatisch zum Login und danach auf die Veranstaltungsseite weitergeleitet. Um den externen Link auf die Veranstaltung in die Zwischenablage zu kopieren, klicken sie einfach auf den Knopf "<?=$button_text?>". Alternativ k&ouml;nnen sie auch den Text im Eingabefeld markieren und mit Ctrl-C (Windows), beziehungsweise CMD-C (OS X) kopieren.</p>

<p><label for="external-link">Externer Link:</label>
<input type="text" id="external-link" name="external-link" value="<?=$href?>" disabled="disabled" size="<?=strlen($href)?>" /><p>

<p><button id="copy-button" data-clipboard-text="<?=$href?>" title="Klicken zum kopieren."><?=$button_text?></button> <span id="copied" style="display:none; color:green;">Der Link wurde kopiert.</span></p>

<script src="/studip/plugins_packages/virtUOS/ExternalLinkPlugin/assets/ZeroClipboard.js"></script>

<script>
link = document.getElementById('external-link');
link.select();

// https://github.com/jonrohan/ZeroClipboard
var clip = new ZeroClipboard(document.getElementById("copy-button"), {
  moviePath: "/studip/plugins_packages/virtUOS/ExternalLinkPlugin/assets/ZeroClipboard.swf"
});

clip.on('complete', function(client, args) {
    copied = document.getElementById('copied');
    copied.style.display = 'inline';
});
</script>

