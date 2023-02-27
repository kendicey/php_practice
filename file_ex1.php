<?php
// "Fish Ball with Vegetables",4.25,0
// "Spicy Salt Baked Prawns",5.50,1
// "Steamed Rock Cod",11.95,0
// "Sauteed String Beans",3.15,1
// "Confucius Chicken",4.75,0
$page = file_get_contents('dishes.csv');
echo $page;
file_put_contents('dishesRevised.csv', '"Hainanese Chicken on Rice", 8.5, 1');
$revisedPage = file_get_contents('dishesRevised.csv');
echo $revisedPage;
?>