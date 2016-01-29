<?php
namespace AppBundle\Services;

use AppBundle\Propel\SettingsQuery;

class PropelSettings {
    private $settings = array();
    
    public function __construct() {
        $this->initialize();
    }
    
    public function initialize() {
        $settings = SettingsQuery::create()
            ->select(array('key', 'value'))
            ->find();
        
        foreach ( $settings as $s ) {
            $this->settigns[$s['key']] = $s['value'];
        }
    }
    
    public function get($key, $default = null) {
        return isset($this->settings[$key]) ? $this->settings[$key] : $default;
    }
}