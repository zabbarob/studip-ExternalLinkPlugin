<?
/**
 * show.php - Template for displaying the ExternalLink plugin.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as
 * published by the Free Software Foundation; either version 2 of
 * the License, or (at your option) any later version.
 *
 * @author      Robert Costa <rcosta@uos.de>
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GPL version 2
 * @category    Stud.IP
 */
$href = htmlReady($external_link);
$button_text = _("Link in die Zwischenablage kopieren");
?>

<p>Unten sehen sie den externen Link auf die aktuelle Veranstaltung. Benutzer die nicht eingeloggt sind werden nach Aufruf des Links automatisch zum Login und danach auf die Veranstaltungsseite weitergeleitet. Um den externen Link auf die Veranstaltung in die Zwischenablage zu kopieren, klicken sie einfach auf den Knopf "<?=$button_text?>". Alternativ k&ouml;nnen sie auch den Text im Eingabefeld markieren und mit Ctrl-C (Windows), beziehungsweise CMD-C (OS X) kopieren.</p>

<p><label for="external-link">Externer Link:</label>
<input type="text" id="external-link" name="external-link" value="<?=$href?>" disabled="disabled" size="<?=strlen($href)?>" /><p>

<p><button id="copy-button" data-clipboard-text="<?=$href?>" title="Klicken zum kopieren."><?=$button_text?></button>
<span id="copied">Der Link wurde kopiert.</span></p>

