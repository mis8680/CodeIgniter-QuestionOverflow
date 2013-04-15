<?php defined('BASEPATH') or exit; ?>

<div class="panel">
<h2>Register New User</h2>

<?php print form_open('user/register'); ?>
    <fieldset class="form-wrapper">
        <legend>Please type your information...</legend>
        <div class="row">
            <div class="large-8 columns">        
            <?php print validation_errors('<div class="alert-box alert round">', '</div>'); ?>
            </div>
        </div>
        
        <div class="row collapse">
            <div class="large-4 columns">
                <span class="prefix"><label for="user_name">Name: <span class="required">*</span></label></span>
            </div>
            <div class="large-8 columns">
                
                <input placeholder="Please type your name..." type="text" name="user_name" id="user_name" size="60" maxlength="255" value="<?php print isset($_POST['submit']) ? '' : set_value('user_name'); ?>" />
            </div>
        </div>
        <div class="row collapse">
            <div class="large-4 columns">
                <span class="prefix"><label for="contact_email">Email Address: <span class="required">*</span></label></span>
            </div>
            <div class="large-8 columns">    
                <input placeholder="Please type your email..." type="text" name="user_email" id="user_email" size="60" maxlength="125" value="<?php print isset($_POST['submit']) ? '' : set_value('user_email'); ?>" />
            </div>
        </div>
        <div class="row collapse">
            <div class="large-4 columns">
                <span class="prefix"><label for="contact_email">Password: <span class="required">*</span></label></span>
            </div>
            <div class="large-8 columns">    
                <input placeholder="Please type your password..." type="password" name="user_password" id="user_password" size="60" maxlength="125" value="<?php print isset($_POST['submit']) ? '' : set_value('user_password'); ?>" />
            </div>
        </div>
  
        <input class="button" type="submit" name="submit" value="Register" />
       
  
    </fieldset>
<?php print form_close(); ?>
</div>
