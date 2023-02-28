<?php
display_form();

if ('POST' == $_SERVER['REQUEST_METHOD']) {
    if (file_exists($_POST['fileName'])) {
        if (is_readable($_POST['fileName'])) {
            if (dirname($_POST['fileName']) == dirname('ex.php')) {
                if (str_contains($_POST['fileName'], 'html')) {
                    $file = file_get_contents($_POST['fileName']);
                    echo $file;
                }
            }
        }
    }
}

function display_form()
{
    echo <<<FORM
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form method="POST" action="$_SERVER[PHP_SELF]">
            Enter the file name:
            <input type="text" name="fileName">
            <button type="submit">submit</button>
        </form>
    </body>
    </html>
    FORM;
}
?>