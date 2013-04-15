<?php defined('BASEPATH') or exit; ?>

<?php

$model = new TopicsModel();
$model->get();
        
foreach($model as $topic) {
    print '<p>' . 'Topic ID: ' . $topic->id . ' -> ' . 'TITLE: ' . $topic->title . ' -> ' .  'BODY: ' . $topic->body . '</p><br />';
}
?>


