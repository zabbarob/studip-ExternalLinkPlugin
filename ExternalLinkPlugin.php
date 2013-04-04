<?php

/**
 * ExternalLinkPlugin.class.php
 *
 * ...
 *
 * @author  rcosta@uos.de
 * @version 0.1a
 **/

class ExternalLinkPlugin extends StudIPPlugin implements StandardPlugin
{

    public function __construct()
    {
        parent::__construct();

        $navigation = new AutoNavigation(_('Externer Link'));
        $navigation->setURL(PluginEngine::GetLink($this, array(), 'show'));
        $navigation->setImage(Assets::image_path('blank.gif'));
        Navigation::addItem('/course/main/externallink', $navigation);

        $this->template_factory = new Flexi_TemplateFactory($this->getPluginPath() . '/templates');
    }

    public function initialize ()
    {
        PageLayout::addStylesheet($this->getPluginURL() . '/assets/styles.css');
        PageLayout::addScript($this->getPluginURL() . '/assets/script.js');
    }

    public function getIconNavigation($course_id, $last_visit)
    {
    }

    public function getInfoTemplate($course_id)
    {
        // ...
    }

    // current URL - taken from http://stackoverflow.com/a/2820771
    function url() {
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        return $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        // TODO $_SERVER["SERVER_NAME"] ???
        // also see: http://www.cleverlogic.net/tutorials/how-dynamically-get-your-sites-main-or-base-url
    }

    // file name of current PHP script
    function basename() {
        return basename($_SERVER['PHP_SELF']);
    }

    function baseurl() {
        $base_url = $this->url();
        $pos = strpos($base_url, $this->basename());
        // remove current script name, query, etc.
        // only keep host URL and subdirectory/path
        return substr($base_url, 0, $pos);
    }

    /**
     * Return id of currently selected seminar.
     * Return false, if no seminar is selected.
     *
     * @return mixed  seminar_id or false
     */
    static function getSeminarId()
    {
        if (!Request::option('cid')) {
            if ($GLOBALS['SessionSeminar']) {
                URLHelper::bindLinkParam('cid', $GLOBALS['SessionSeminar']);
                return $GLOBALS['SessionSeminar'];
            }
            return false;
        }
        return Request::option('cid');
    }

    public function show_action()
    {
        $template = $this->template_factory->open('show');
        $template->set_layout($GLOBALS['template_factory']->open('layouts/base'));

        $query = array("sem_id"=>$this->getSeminarId(), "again"=>"yes");
        $template->external_link
            = $this->baseurl() . 'details.php?' . http_build_query($query);

        echo $template->render();
    }
}
