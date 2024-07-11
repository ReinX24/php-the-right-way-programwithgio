<?php

require_once __DIR__ . "/../vendor/autoload.php";

use App\Field;
use App\Text;
use App\Boolean;
use App\Checkbox;
use App\Radio;

$fields = [
    // new Field("baseField"),
    new Text("textField"),
    // new Boolean("booleanField"),
    new Checkbox("checkboxField"),
    new Radio("radioField"),
];

foreach ($fields as $field) {
    echo $field->render() . "<br>";
}
