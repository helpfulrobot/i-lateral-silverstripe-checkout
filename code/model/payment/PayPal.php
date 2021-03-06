<?php

class PayPal extends PaymentMethod {

    public static $handler = "PayPalHandler";

    public $Title = 'PayPal';

    public $Icon = 'checkout/images/paypal-small.png';

    private static $db = array(
        'BusinessID' => 'Varchar(99)'
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        if($this->ID) {
            $fields->addFieldToTab(
                "Root.Main",
                TextField::create('BusinessID', 'Business ID'),
                "Summary"
            );
        }

        return $fields;
    }

    public function onBeforeWrite() {
        parent::onBeforeWrite();

        $this->CallBackSlug = (!$this->CallBackSlug) ? 'paypal' : $this->CallBackSlug;

        $this->Summary = (!$this->Summary) ? "Pay with PayPal" : $this->Summary;
    }
}
