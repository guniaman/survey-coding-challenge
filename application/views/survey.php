<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Survey</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/js/jquery-ui-1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>application/views/css/survey.css">
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.4.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>application/views/js/survey.js"></script>
</head>
<body>
    <div class="info-block">
        <span class="success">Data successfully saved!</span>
        <span class="error">Error! Data was not saved</span>
    </div>
    <form>
        <div class="row-input">
            <div class="title">Name*</div>
            <div class="input">
                <input type="text" name="name" minlength="2" placeholder="Name"/>
            </div>
        </div>
        <div class="row-input">
            <div class="title">Date of Birth</div>
            <div class="input">
                <input id="birth_date" type="text" name="birth_date" placeholder="Date of Birth" />
            </div>
        </div>
        <div class="row-input">
            <div class="title">Email*</div>
            <div class="input">
                <input type="email" name="email" placeholder="Email"/>
            </div>
        </div>
        <div class="row-input">
            <div class="title">Favorite Color*</div>
            <div class="input">
                <input type="text" name="favorite_color" placeholder="Favorite Color"/>
            </div>
        </div>
        <button type="submit" id="btn-submit">Submit</button>
        <input id="csrf_params" type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
    </form>
</body>
</html>