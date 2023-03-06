<?php

if ("POST" == $_SERVER['REQUEST_METHOD']) {
    list($errors, $inputs) = validate_form();
    if ($errors) {
        handle_error($errors);
    } else {
        process_form();
    }
} else {
    display_form();
}

function display_form()
{
    echo <<<FORM
        <form method="POST" action="$_SERVER[PHP_SELF]">
            <label>From:</label>
            <input type="text" name="from"></br>
            <label>State</label>
            <input type="text" name="fromState"></br>
            <label>Zip Code</label>
            <input type="text" name="fromZip"></br>
            <label>To:</label>
            <input type="text" name="to"></br>
            <label>State</label>
            <input type="text" name="toState"></br>
            <label>Zip Code</label>
            <input type="text" name="toZip"></br>
            <label>Length</label>
            <input type="number" name="length"></br>
            <label>Width</label>
            <input type="number" name="width"></br>
            <label>Height</label>
            <input type="number" name="height"></br>
            <label>Weight</label>
            <input type="number" name="weight"></br>
            <button type="submit">submit</button>
        </form>
    FORM;
}

function validate_form()
{
    $errors = [];
    $inputs = [];
    $_POST['toState'] != "" ? $inputs['toState'] = $_POST['toState'] : $errors[] = 'please enter state';
    $_POST['fromState'] != "" ? $inputs['fromState'] = $_POST['fromState'] : $errors[] = 'please enter state';
    $_POST['toZip'] != "" ? $inputs['toZip'] = $_POST['toZip'] : $errors[] = 'please enter zip';
    $_POST['fromZip'] != "" ? $inputs['fromZip'] = $_POST['fromZip'] : $errors[] = 'please enter zip';
    $_POST['weight'] <= 150 && $_POST['weight'] > 0 ? $inputs['weight'] = $_POST['weight'] : $errors[] = 'package should weight no more than 150 pounds';
    $_POST['length'] <= 36 && $_POST['length'] > 0 ? $inputs['length'] = $_POST['length'] : $errors[] = 'length should not be more than 36 inches';
    $_POST['width'] <= 36 && $_POST['width'] > 0 ? $inputs['width'] = $_POST['width'] : $errors[] = 'width should not be more than 36 inches';
    $_POST['height'] <= 36 && $_POST['height'] > 0 ? $inputs['height'] = $_POST['height'] : $errors[] = 'height should not be more than 36 inches';
    return [$errors, $inputs];
}

function handle_error($form_error)
{
    if ($form_error) {
        print 'Please correct the errors:';
        print '<ul><li>';
        print implode('</li><li>', $form_error);
        print '</li></ul>';
    }
}

function process_form()
{
    print 'From: ' . $_POST['from'] . "<br>";
    print 'State: ' . $_POST['fromState'] . "<br>";
    print 'Zip Code: ' . $_POST['fromZip'] . "<br>";
    print 'To: ' . $_POST['to'] . "<br>";
    print 'State: ' . $_POST['toState'] . "<br>";
    print 'Zip Code: ' . $_POST['toZip'] . "<br>";
    print 'Dimensions: ' . $_POST['length'] . "," . $_POST['width'] . "," . $_POST['height'] . "<br>";
    print 'Weight: ' . $_POST['weight'];
}

?>