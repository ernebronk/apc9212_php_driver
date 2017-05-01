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
        return trim(strtr(snmpget($this->host, $this->community, $this->string2.$outlet),"\""," "));
    }

    function getOutletStatus($outlet) {
        return snmpget($this->host, $this->community, $this->string1.$outlet);
    }

    public function setOutlet($outlet, $state) {
        switch($state) {
            case "on":
                $this->set($outlet, 1);
                return 1;
            case "off":
                $this->set($outlet, 2);
                return 1;
            }
        return 0;
    }

    private function set($outlet, $status) {
        return snmpset($this->host, $this->community, $this->string1.$outlet,"i",$status);
    }

}


?>
