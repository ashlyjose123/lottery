<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f7f7f7;
    }

    .container {
        max-width: 400px;
        margin: 5% auto;
        padding: 20px;
        background-color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    h2 {
        font-family: "calibri", sans-serif;
        text-transform: uppercase;
        color: blue;
        text-align: center;
        margin-bottom: 30px;
    }

    .form-horizontal .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
    }

    .input-container {
        position: relative;
    }

    input {
        width: 90%;
        padding: 10px;
        margin: 10px 0;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: #fff;
    }

    label {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        font-size: 16px;
        color: #888;
        pointer-events: none;
        transition: 0.3s ease all;
    }

    input:focus + label,
    input:not(:placeholder-shown) + label {
        top: -10px;
        left: 10px;
        font-size: 12px;
        color: blue;
    }

    button {
        width: 100%;
        padding: 12px;
        background: blue;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #0056b3;
    }

    .shutdown-switch {
        margin-top: 30px;
        text-align: center;
    }

    .checkbox-round {
        width: 1.5em;
        height: 1.5em;
        background-color: red;
        border-radius: 50%;
        border: 1px solid #ddd;
        appearance: none;
        cursor: pointer;
    }

    .checkbox-round:checked {
        background-color: green;
    }

    #status-text {
        display: block;
        margin-top: 10px;
    }

    p {
        text-align: start;
        color: red;
        position: relative;
        bottom: 30px;
        margin: 3%;
    }

    /* Eye Icon Style */
    .eye-icon {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 20px;
        color: #888;
    }
    .eye-icon:hover {
        color: blue;
    }
</style>
</head>
<body>

<center>
    <div class="container">
        <h2>Admin Login</h2>
        <?php echo form_open('admin/adminlogin', array('class' => 'form-horizontal', 'autocomplete' => 'off')); ?>
        <div class="form-group">
            <div class="input-container">
                <input type="text" id="name" name="name" placeholder=" " value="<?php echo set_value('name'); ?>" required>
                <label for="name">Name:</label>
            </div>
            <?php echo form_error('name'); ?>
        </div>

        <div class="form-group">
            <div class="input-container">
                <input type="password" id="password" name="password" placeholder=" " required>
                <label for="password">Password:</label>
                <span class="eye-icon" id="toggle-password" onclick="togglePassword()">👁️</span>
            </div>
            <?php echo form_error('password'); ?>
        </div>

        <button type="submit">Login</button>
        <?php echo form_close(); ?>
    </div>

    <?php 
    $current_shutdown = 0;
    ?>

    <?php echo form_open('admin/shutdown') ?>
    <div class="shutdown-switch">
        <input type="checkbox" name="shutdown" value="0" id="shutdown" class="checkbox-round" <?php echo ($current_shutdown == 1) ? 'checked' : ''; ?>>
        <span id="status-text"><?php echo ($current_shutdown == 1) ? 'On' : 'Off'; ?></span>    
    </div>
    <?php form_close(); ?>
</center>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
jQuery(document).ready(function($) {
  $('input[type="checkbox"]').click(function() {
    if ($(this).is(':checked')) {
      $(this).val(1);
      $('#status-text').text('On');
    } else {
      $(this).val(0);
      $('#status-text').text('Off');
    }
    $('form').submit();
  });
});
function togglePassword() {
    var passwordField = document.getElementById("password");
    var eyeIcon = document.getElementById("toggle-password");

    if (passwordField.type === "password") {
        passwordField.type = "text"; 
        eyeIcon.textContent = "👁️"; 
    } else {
        passwordField.type = "password";
        eyeIcon.textContent = "🙈"; 
    }
}
</script>

</body>
</html>
