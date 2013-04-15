<?php defined('BASEPATH') or exit; ?>

<div class="panel">
<h2>Post new topic</h2>

<?php print form_open('topics/post'); ?>
    <fieldset class="form-wrapper">
        <legend>Add new topic</legend>
        <div class="row">
            <div class="large-4 columns">        
                <?php print validation_errors('<div class="alert-box alert round">', '</div>'); ?>
            </div>
        </div>
        
        <div class="row collapse">
            <div class="large-4 columns">
                <span class="prefix"><label for="topic_title">Title: <span class="required">*</span></label></span>
            </div>
            <div class="large-8 columns">             
                <input placeholder="Please type your title..." type="text" name="topic_title" id="topic_title" size="60" maxlength="255" value="<?php print isset($_POST['submit']) ? '' : set_value('topic_title'); ?>" />
            </div>
        </div>
        <div class="row collapse">
            <div class="large-4 columns">
                <span class="prefix"><label for="contact_message">Body: <span class="required">*</span></label></span>
            </div>
            <div class="large-8 columns">         
                <textarea placeholder="Please type your body..." name="topic_body" id="topic_body" cols="45" rows="30" <?php print isset($_POST['submit']) ? '' : set_value('topic_body'); ?>></textarea>
            </div>
        </div>
         
        <input class="button" type="submit" name="submit" value="Send" />
       
    </fieldset>
    
<?php print form_close(); ?>
</div>