<!-- 
    For each of the following kinds of information, state how you would store it in an array
    and then give sample code that creates such an array with a few elements.
    For example, for the first item, you might say, 
    "An associative array whose key is the student's name and whose value is
    an associative array of grade and ID number", as in the following:

    $students = ['James D. McCawley' => ['grade' => 'A+', 'id' => 271231],
                 'Buwei Yang Chao' => ['grade' => 'A', 'id' => 818211]];
 -->

<!-- The grades and ID numbers of students in a class -->

<!-- How many of each item in a store inventory are in stock -->
<?php
$inventory = [
    'Item 1' => 10,
    'Item 2' => 15,
    'Item 3' => 20
];
?>

<!-- School lunches for a week: the different parts of each meal
     (entree, side dish, drink, etc.) and the cost for each day -->
<?php
$lunches = [
    "Monday" => [
        "entree" => "salad",
        "side dish" => "potato",
        "drink" => "cola"
    ],
    "Tuesday" => [
        "entree" => "tofu",
        "side dish" => "fries",
        "drink" => "juice"
    ]
];
?>

<!-- The names of people in your family -->
<?php
$familyMembers = [
    "father" => "Ken",
    "mother" => "Cathy",
    "brother" => "Leo"
];
?>

<!-- The names, ages, and relationship to you of people in your family -->
<?php
$familyMembers = [
    "Ken" => ["father", 50],
    "Cathy" => ["mother", 50],
    "Leo" => ["brother", 20]
];
?>