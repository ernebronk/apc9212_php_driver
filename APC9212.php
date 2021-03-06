<?php

class APC9212 {

    public $host;
    public $community;
    private $string1 =".1.3.6.1.4.1.318.1.1.4.4.2.1.3.";
    private $string2 =".1.3.6.1.4.1.318.1.1.4.5.2.1.3.";

    function __construct($address, $community) {
        $this->host = $address;
        $this->community = $community;
        return;
    }

    function getSystemName() {
        return snmpget($this->host, $this->community,"system.sysName.0");
    }

    function getSystemLocation() {
        return snmpget($host, $community,"system.sysLocation.0");
    }

    function getSystemDescription() {
        return snmpget($host, $community,"system.sysDescr.0");
    }

    function getSystemUptime() {
        return snmpget($host, $community,"system.sysUpTime.0");
    }

    function getOutletName($outlet) {
        return trim(strtr(explode(":", snmpget($this->host, $this->community, $this->string2.$outlet))[1],"\""," "));
    }

    public function getOutletStatus($outlet) {
        $state = explode(":", snmpget($this->host, $this->community, $this->string1.$outlet))[1];
        switch ($state) {
            case 2:
                return "Off";
            case 1:
                return "On";
            case 3:
                return "Power cycling";
        }
        return "Error";
    }

    public function setOutlet($outlet, $state) {
        switch($state) {
            case "on":
                return $this->set($outlet, 1);
            case "off":
                return $this->set($outlet, 2);
            }
        return 0;
    }

    public function allOff() {
        for($i = 1; $i <= 8; $i++) {
            $this->set($i, 2);
        }
        return 1;
    }

    public function allOn() {
        for($i = 1; $i <= 8; $i++) {
            $this->set($i, 1);
        }
        return 1;
    }

    public function cycleOutlet($outlet) {
        return $this->set($outlet,3);
    }

    private function set($outlet, $status) {
        return snmpset($this->host, $this->community, $this->string1.$outlet,"i",$status);
    }

}


?>
