<?php defined('BASEPATH') or exit; ?>

<div class="panel">
  <h2>Welcome Back, <?php print $this->session->userdata('user_name'); ?>!</h2>
  <p>This section represents the area that only logged in members can access.</p>
  <h4>Do you really want to logout? the click >> <?php print anchor('topics', 'Logout'); ?></h4>
</div>

