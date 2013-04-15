<?php defined('BASEPATH') or exit; ?>

<?php if ($this->session->flashdata('success')) : ?>
<div class="alert-box success" style="text-align: center;">
<h3><?php print $this->session->flashdata('success'); ?></h3>
</div>
<?php endif; ?>

<div class="panel">
<h2>Contact</h2>


<?php print form_open('content/contact'); ?>
    <fieldset class="form-wrapper">
        <legend>Send us an Email</legend>
        <div class="row">
            <div class="large-8 columns">        
            <?php print validation_errors('<div class="alert-box alert round">', '</div>'); ?>
            </div>
        </div>
        
        <div class="row collapse">
            <div class="large-4 columns">
                <span class="prefix"><label for="contact_name">Name: <span class="required">*</span></label></span>
            </div>
            <div class="large-8 columns">
                
                <input placeholder="Please type your name..." type="text" name="contact_name" id="contact_name" size="60" maxlength="255" value="<?php print isset($_POST['submit']) ? '' : set_value('contact_name'); ?>" />
            </div>
        </div>
        <div class="row collapse">
            <div class="large-4 columns">
                <span class="prefix"><label for="contact_email">Email Address: <span class="required">*</span></label></span>
            </div>
            <div class="large-8 columns">    
                <input placeholder="Please type your email..." type="text" name="contact_email" id="contact_email" size="60" maxlength="125" value="<?php print isset($_POST['submit']) ? '' : set_value('contact_email'); ?>" />
            </div>
        </div>
        
        <div class="row collapse">
            <div class="large-4 columns">
                <span class="prefix"><label for="contact_message">Message: <span class="required">*</span></label></span>
            </div>
            <div class="large-8 columns">         
                <textarea placeholder="Please type your message..." name="contact_message" id="contact_message" cols="45" rows="30"><?php print isset($_POST['submit']) ? '' : set_value('contact_message'); ?></textarea>
            </div>
        </div>
        
        <input class="button" type="submit" name="submit" value="Send" />
       
  
    </fieldset>
<?php print form_close(); ?>
</div>
