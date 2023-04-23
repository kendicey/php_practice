<?php

error_reporting(E_ALL);
class Person
{
    var $first_name;
    var $last_name;

    function __construct($fn, $ln)
    {
        $this->first_name = $fn;
        $this->last_name = $ln;
    }

    public function get_first_name()
    {
        return $this->first_name;
    }

    public function get_last_name()
    {
        return $this->last_name;
    }
}

$rob = new Person('Rob', 'Casabona');
$joe = new Person('Joe', 'Casabona');
$erin = new Person('Erin', 'Casabona');
$steven = new Person('Steven', 'Wozniack');
$bill = new Person('Bill', 'Gates');
$walt = new Person('Walt', 'Disney');
$bob = new Person('Bob', 'Iger');

$people = [$rob, $joe, $erin, $steven, $bill, $walt, $bob];

// usort to define the sorting criteria
usort($people, function ($a, $b) {
    // use array to compare two criteria
    return [$a->get_last_name(), $a->get_first_name()] <=> [$b->get_last_name(), $b->get_first_name()];
});

echo "<pre>";
print_r($people);
echo "</pre>";

?>