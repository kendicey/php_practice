<?php

// check if there is any input in $_POST
$form_data = (!empty($_POST)) ? $_POST : null;
// check if the form is complete
$form_is_complete = (empty($_POST)) ? false : null;

// check if the input is empty after trim() --> alert
function check_required($value)
{
    global $form_is_complete;
    if (empty(trim($value))) {
        echo '<p class="alert">This is a required field.</p>';
        $form_is_complete = false;
    }
}

// check if the email is valid --> alert
function check_email($email)
{
    global $form_is_complete;
    if (!filter_var($email, FILTER_SANITIZE_EMAIL)) {
        echo '<p class="alert">You did not input a valid email address.</p>';
        $form_is_complete = false;
    }
}

function send_message($form_data)
{
    $name = filter_var(htmlentities(trim($form_data['name'])), FILTER_SANITIZE_ADD_SLASHES);
    $email = filter_var($form_data['email'], FILTER_SANITIZE_EMAIL);
    $to = "Kendice Yeung <kendiceyeungnm@gmail.com>";
    $from = "$name <$email>";
    $reason = ucfirst($form_data['reason']);
    $subject = "Contact Form. Reason: $reason";
    $message = filter_var(htmlentities(trim($form_data['message'])), FILTER_SANITIZE_ADD_SLASHES);
    $message = 'From: ' . $from . ', for ' . $reason . "\n\n" . $message;
    $headers = 'From: ' . $from . "\r\n" .
        'Reply-To: ' . $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    if (mail($to, $subject, $message, $headers)) {
        echo "<h3>Your message has been sent!</h3>";
    }
}

?>

<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
    <div>
        <?php
        if (isset($form_data['name'])) {
            check_required($form_data['name']);
        }
        ?>
        <label>Name: </label><input type="text" name="name" required>
    </div><br>
    <div>
        <?php
        if (isset($form_data['email'])) {
            check_required($form_data['email']);
            check_email($form_data['email']);
        }
        ?>
        <label>Email: </label><input type="email" name="email" required><br><br>
    </div>
    <div>
        <label>Reason for Contact: </label>
        <select name="reason" required>
            <option value="sayHi">Say Hi</option>
            <option value="sayBye">Say Bye</option>
            <option value="sayLove">Say Love</option>
        </select>
    </div><br>
    <div>
        <?php
        if (isset($form_data['message'])) {
            check_required($form_data['message']);
        }
        ?>
        <label>Message: </label><input type="textbox" name="message" required><br><br>
    </div>
    <div>
        <input type="submit" value="Submit">
    </div>
</form>

<?php
$form_is_complete = (!is_null($form_is_complete)) ? $form_is_complete : true;
if ($form_is_complete === true) {
    send_message($form_data);
}