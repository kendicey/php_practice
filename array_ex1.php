<!-- 
    1. According to the US Census Bureau, the 10 largest American cities (by population) in 2010 were as follows:

    New York, NY (8,175,133 people)
    Los Angeles, CA (3,792,621)
    Chicago, IL (2,695,598)
    Houston, TX (2,100,263)
    Philadelphia, PA (1,526,006)
    Phoenix, AZ (1,445,632)
    San Antonio, TX (1,327,407)
    San Diego, CA (1,307,402)
    Dallas, TX (1,197,816)
    San Jose, CA (945,942)

    Define an array (or arrays) that holds this information about locations and populations. 
    Print a table of locations and population information that includes the total population in all 10 cities.
-->

<!-- $cities = [
    "NY" => ["New York", 8175133],
    "CA" => [
        ["Los Angeles", 3792621],
        ["San Diego", 1307402],
        ["San Jose", 945942]
    ],
    "IL" => ["Chicago", 2695598],
    "TX" => [
        ["Houston", 2100263],
        ["San Antonio", 1327407],
        ["Dallas", 1197816]
    ],
    "PA" => ["Philadelphia", 1526006],
    "AZ" => ["Phoenix", 1445632],
];

echo "<table>";

foreach ($cities as $state => $cityArray) {
    if ($state != "CA" && $state != "TX") {
        echo "<tr><td>{$cityArray[0]}</td><td>{$cityArray[1]}</td></tr>";
    } else {
        foreach ($cityArray as $info) {
            echo "<tr><td>{$info[0]}</td><td>{$info[1]}</td></tr>";
        }
    }
}

echo "</table>"; -->

<!--
    2. Modify your solution to the previous exercise so that the rows in the result table are ordered by population. 
       Then modify your solution so that the rows are ordered by city name.
-->

<!-- $cities = [
    "New York" => 8175133,
    "Los Angeles" => 3792621,
    "San Diego" => 1307402,
    "San Jose" => 945942,
    "Chicago" => 2695598,
    "Houston" => 2100263,
    "San Antonio" => 1327407,
    "Dallas" => 1197816,
    "Philadelphia" => 1526006,
    "Phoenix" => 1445632
];

echo "<table>";

ksort($cities);

foreach ($cities as $city => $population) {
    echo "<tr><td>{$city}</td><td>{$population}</td></tr>";
}

echo "</table>"; -->


<!--
    3. Modify your solution to the first exercise so that the table also contains rows that hold state population totals for each state represented in the list of cities.
 -->

<?php
$cities = [
    "NY" => ["New York", 8175133],
    "CA" => [
        ["Los Angeles", 3792621],
        ["San Diego", 1307402],
        ["San Jose", 945942]
    ],
    "IL" => ["Chicago", 2695598],
    "TX" => [
        ["Houston", 2100263],
        ["San Antonio", 1327407],
        ["Dallas", 1197816]
    ],
    "PA" => ["Philadelphia", 1526006],
    "AZ" => ["Phoenix", 1445632],
];

$sum = 0;

echo "<table>";

foreach ($cities as $state => $cityArray) {
    if ($state != "CA" && $state != "TX") {
        echo "<tr><td>{$cityArray[0]}</td><td>{$cityArray[1]}</td></tr>";
        echo "<tr><td></td><td></td><td>$cityArray[1]</td></tr>";
    } else {
        foreach ($cityArray as $info) {
            echo "<tr><td>{$info[0]}</td><td>{$info[1]}</td></tr>";
            $sum += $info[1];
        }
        echo "<tr><td></td><td></td><td>$sum</td></tr>";
    }
}

echo "</table>";
?>