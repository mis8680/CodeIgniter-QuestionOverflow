<?php defined('BASEPATH') or exit; ?>


<div class="panel">
    
<h2>Login</h2>

<?php print form_open('user/login'); ?>
    <fieldset class="form-wrapper">
        <legend>Please Login with your Email Address and Password.</legend>
        <div class="row">
            <div class="large-8 columns">        
            <?php print validation_errors('<div class="alert-box alert round">', '</div>'); ?>
            </div>
        </div>
        
        <div class="row collapse">
            <div class="large-4 columns">
                <span class="prefix"><label for="user_ud">Email Address: <span class="required">*</span></label></span>
            </div>
            <div class="large-8 columns">
                
                <input placeholder="Please type your Email..." type="text" name="user_email" id="user_email" size="60" maxlength="255" value="<?php print isset($_POST['submit']) ? '' : set_value('user_email'); ?>" />
            </div>
        </div>
        <div class="row collapse">
            <div class="large-4 columns">
                <span class="prefix"><label for="user_password">PASSWORD: <span class="required">*</span></label></span>
            </div>
            <div class="large-8 columns">    
                <input placeholder="Please type your password..." type="password" name="user_password" id="user_password" size="60" maxlength="125" value="<?php print isset($_POST['submit']) ? '' : set_value('user_password'); ?>" />
            </div>
        </div>
        
        
        <input class="button" type="submit" name="submit" value="Login" />
       
    </fieldset>
<?php print form_close(); ?>
</div>

