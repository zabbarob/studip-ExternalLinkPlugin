/**
 * script.js - JavaScript code for ExternalLink plugin.
 *
 * This code is needed for copying the link to the clipboard. It uses the
 * ZeroClipboard library, which depends on Flash.
 * https://github.com/jonrohan/ZeroClipboard
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
(function ($) {
    // Get URL path of the currently executed script.
    // This is needed for locating the flash file that ZeroClipboard needs.
    // taken from http://stackoverflow.com/a/2161748
    var scripts = document.getElementsByTagName('script');
    var path = scripts[scripts.length - 1].src.split('?')[0]; // remove ?query
    var dir = path.split('/').slice(0, -1).join('/') + '/'; // remove filename

    // code to execute after page has fully loaded
    $(function() {
        $('#external-link').select(); // select link text in text-field

        // initialize ZeroClipboard library
        var clip = new ZeroClipboard(document.getElementById("copy-button"), {
          moviePath: dir + "ZeroClipboard.swf"
        });

        clip.on('complete', function(client, args) {
            // display message to user after copying link to clipboard
            $('#copied').css('display', 'inline');
        });
    });
}(jQuery));

