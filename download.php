<? // vim: set expandtab tabstop=4 shiftwidth=4: ?>
<?
require_once('common.php');
$page->set_title('Download');
$page->apoc_header();
?>

<h2>Download</h2>

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

<? $page->apoc_footer(); ?>
