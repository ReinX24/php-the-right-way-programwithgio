<?php

namespace App;

class Invoice
{
    use Mail;

    public function process()
    {
        echo "Processed invoice <br>";

        $this->sendEmail();
    }
}
