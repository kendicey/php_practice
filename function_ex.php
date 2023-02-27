<!-- Write a function to return an HTML <img /> tag.
     The function should accept a mandatory argument of the image URL
     and optional arguments for alt text, height and width -->
<?php
// function returnHTML($imageURL, $altText = "picture", $height = "100px", $width = "200px")
// {
//     return "<img src={$imageURL} alt={$altText} height={$height} width={$width}>";
// }
?>

<!-- Modify the function in the previous exercise so that only the filename is passed
     to the function in the URL argument. Inside the function, prepend a global variable
     to the filename to make the full URL. For example, if you pass photo.png to the function
     and the global variable contains /images/, the the src attribute of the returned <img>
     tag would be /images/photo.png -->
<?php
$path = "/images/";
function returnHTML($image, $altText = "picture", $height = "100px", $width = "200px")
{
    return "<img src={$GLOBALS['path']}{$image} alt={$altText} height={$height} width={$width}>";
}

// echo returnHTML("photo.png");
?>

<!-- Put your function from the previous exercise in one file. 
     Then make another file that loads the first file and uses it to print out some <img /> tags -->