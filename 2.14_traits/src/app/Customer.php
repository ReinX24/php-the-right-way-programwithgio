<?php

namespace App;

class Customer
{
    use Mail;

    public function updateProfile()
    {
        echo "Profile Updated <br>";

        $this->sendEmail();
    }
}
