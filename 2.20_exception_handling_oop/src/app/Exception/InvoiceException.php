<?php

namespace App\Exception;

class InvoiceException extends \Exception
{
    public static function missingBillingInfo()
    {
        return new static("Missing billing info"); // return current class object
    }

    public static function invalidAmount()
    {
        return new static("Invalid Invoice Amount");
    }
}
