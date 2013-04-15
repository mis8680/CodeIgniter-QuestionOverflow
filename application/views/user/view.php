<?php defined('BASEPATH') or exit; ?>

<div class="panel">
  <h2>Hello, <?php print $this->session->userdata('user_name'); ?>!</h2>
  <h2>Your user id is <?php print $this->session->userdata('user_id'); ?>!</h2>
  <h2>Your email address is <?php print $this->session->userdata('user_email'); ?>!</h2>
  <p><em>This section represents the area that only logged in members can access.</em></p>
</div>