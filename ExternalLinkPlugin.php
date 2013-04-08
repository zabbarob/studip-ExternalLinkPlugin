<?php
/**
 * ExternalLinkPlugin.php - Display and copy a link to the current course.
 *
 * Long description for file (if any)...
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
require 'Utils.php';

/**
 * Initializes and displays the ExternalLink plugin.
 **/
class ExternalLinkPlugin extends StudIPPlugin implements StandardPlugin {

    /**
     * Constructor of the class.
     * 
     * Configures the navigation link where the plugin can be reached in
     * Stud.IP and does some general plugin initialization stuff.
     */
    public function __construct() {
        parent::__construct();

        $navigation = new AutoNavigation(_('Externer Link'));
        $navigation->setURL(PluginEngine::GetLink($this, array(), 'show'));
        $navigation->setImage(Assets::image_path('blank.gif'));
        Navigation::addItem('/course/main/externallink', $navigation);

        $this->template_factory = new Flexi_TemplateFactory($this->getPluginPath() . '/templates');
    }

    /**
     * Loads stylesheets and scripts needed for executing the plugin.
     */
    public function initialize () {
        PageLayout::addStylesheet($this->getPluginURL() . '/assets/styles.css');
        PageLayout::addScript($this->getPluginURL() . '/assets/ZeroClipboard.js');
        PageLayout::addScript($this->getPluginURL() . '/assets/script.js');
    }

    /**
     * Implements abstract method of base class.
     */
    public function getIconNavigation($course_id, $last_visit) {
    }

    /**
     * Implements abstract method of base class.
     */
    public function getInfoTemplate($course_id) {
    }

    /**
     * Sets the fields in the plugin's show.php template to correct values.
     */
    public function show_action() {
        $template = $this->template_factory->open('show');
        $template->set_layout($GLOBALS['template_factory']->open('layouts/base'));

        $query = http_build_query(array('sem_id'=>Utils::getSeminarId(), 'again'=>'yes'));
        $template->external_link = Utils::getBaseUrl() . 'details.php?' . $query;

        echo $template->render();
    }
}

