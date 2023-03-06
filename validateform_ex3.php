<?php
// function process_form()
// {
//     foreach ($_POST as $para => $value) {
//         echo $para . " " . $value;
//     }
// }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    list($form_errors, $input) = validate_input();
    if ($form_errors) {
        show_form($form_errors);
    } else {
        process_form();
    }
} else {
    displayForm();
}

function displayForm()
{
    echo <<<FORM
        <form method="POST" action="$_SERVER[PHP_SELF]">
            <input type="text" name="operand1"><br>
            <input type="text" name="operand2"><br>
            <label>Choose an operation</label>
            <select name="menu">
                <option>+</option>
                <option>-</option>
                <option>*</option>
                <option>/</option>
            </select><br>
            <button type="submit">Submit</button>
        </form>
    FORM;
}

function validate_input()
{
    $errors = [];
    $inputs = [];
    $inputs['operand1'] = filter_input(INPUT_POST, 'operand1', FILTER_VALIDATE_INT);
    $inputs['operand2'] = filter_input(INPUT_POST, 'operand2', FILTER_VALIDATE_INT);
    if ($inputs['operand1'] == null || $inputs['operand2'] == false) {
        $errors[] = 'please enter a valid integer';
    }
    return [$errors, $inputs];
}

function process_form()
{
    if ($_POST['menu'] == '+') {
        $result = $_POST['operand1'] + $_POST['operand2'];
        echo $_POST['operand1'] . $_POST['menu'] . $_POST['operand2'] . "=" . $result;
    } elseif ($_POST['menu'] == '-') {
        $result = $_POST['operand1'] - $_POST['operand2'];
        echo $_POST['operand1'] . $_POST['menu'] . $_POST['operand2'] . "=" . $result;
    } elseif ($_POST['menu'] == '*') {
        $result = $_POST['operand1'] * $_POST['operand2'];
        echo $_POST['operand1'] . $_POST['menu'] . $_POST['operand2'] . "=" . $result;
    } else {
        $result = $_POST['operand1'] / $_POST['operand2'];
        echo $_POST['operand1'] . $_POST['menu'] . $_POST['operand2'] . "=" . $result;
    }
}

function show_form($errors)
{
    if ($errors) {
        print 'please correct these errors: <ul><li>';
        print implode('</li><li>', $errors);
        print '</li></ul>';
    }
}
?>