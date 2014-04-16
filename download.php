<? // vim: set expandtab tabstop=4 shiftwidth=4: ?>
<?
require_once('common.php');
esch_header();
?>

<h3>Download</h3>

<blockquote>

<p><a href="dist/eschalon_utils-current/ChangeLog.txt">ChangeLog</a></p>
<strong>Current:</strong>
<ul>
<?php esch_show_current_release(); ?>
</ul>
<p>
<strong>Previous Versions:</strong>
<?php esch_show_previous_releases(); ?>
</blockquote>

<? esch_footer(); ?>
