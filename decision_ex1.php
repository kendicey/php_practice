<!-- 
    Without using a PHP program to evaluate them,
    determine whether each of these expressions is true/false.

    a. 100.00 - 100 ==> false
    b. "zero" ==> true
    c. "false" ==> true
    d. 0 + "true" ==> true
    e. 0.000 ==> false
    f. "0.0" ==> false
    g. strcmp("false", "False") ==> true
    h. 0 <=> "0" ==> false
 -->

<!-- 
    Figure out what this program prints:

    $age = 12;
    $shoe_size = 13;
    if ($age > $shoe_size) {
        print "Msg 1";
    } elseif (($shoe_size++) && ($age > 20)) {
        print "Msg 2";
    } else {
        print "Msg 3";
    }
    print "Age: $age. Shoe size: $shoe_size";

    Msg 3 Age: 12. Shoe size: 14
-->

<?php
$age = 12;
$shoe_size = 13;
if ($age > $shoe_size) {
    print "Msg 1";
} elseif (($shoe_size++) && ($age > 20)) {
    print "Msg 2";
} else {
    print "Msg 3";
}
print "Age: $age. Shoe size: $shoe_size";
?>