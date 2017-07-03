<? // vim: set expandtab tabstop=4 shiftwidth=4: ?>
<?
require_once('common.php');
$page->set_title('Map Editor Screenshots');
$page->apoc_header();
$vers = '0.7.0';
?>

<h2>Screenshots, version <?=$vers?></h2>

<h3>Initial View</h3>
<p>
<img src="screens/<?=$vers?>/map_initial.png" alt="Initial View">
</p>

<h3>... with Barrier Highlighting</h3>
<p>
<img src="screens/<?=$vers?>/map_barrierhighlight.png" alt="Barrier Highlighting">
</p>

<h3>... Barrier Highlighting with Walls and Trees turned off</h3>
<p>
<img src="screens/<?=$vers?>/map_barrierhighlight_bare.png" alt="Barrier Highlighting, no walls or trees">
</p>

<h3>... with Object and Entity highlighting</h3>
<p>
<img src="screens/<?=$vers?>/map_script_ent_1.png" alt="Object and Entity Highlighting">
</p>

<h3>Fully Zoomed In</h3>
<p>
<img src="screens/<?=$vers?>/map_zoom_in.png" alt="Zoomed In">
</p>

<h3>... and mostly Zoomed Out</h3>
<p>
<img src="screens/<?=$vers?>/map_zoom_out.png" alt="Zoomed Out">
</p>

<h3>Tile Editing - Main Attributes</h3>
<p>
<img src="screens/<?=$vers?>/map_square_main.png" alt="Tile Atrributes">
</p>

<h3>Tile Editing - Graphic Lookup</h3>
<p>
<img src="screens/<?=$vers?>/map_square_gfxlookup.png" alt="Tile Graphic Lookup">
</p>

<h3>Tile Editing - Entity Attributes</h3>
<table>
<tr>
<td align="center" valign="top">
Book I<br>
<img src="screens/<?=$vers?>/map_square_entity.png" alt="Entity Info, Book 1">
</td>
<td align="center" valign="top">
Book II<br>
<img src="screens/<?=$vers?>/map_square_entity_b2.png" alt="Entity Info, Book 2">
</td>
</tr>
</table>

<h3><a name="scripts"></a>Tile Editing - Object Info</h3>
<table>
<tr>
<td align="center" valign="top">
Book I<br>
<img src="screens/<?=$vers?>/map_square_script.png" alt="Object Info, Book 1">
</td>
<td align="center" valign="top">
Book II<br>
<img src="screens/<?=$vers?>/map_square_script_b2.png" alt="Object Info, Book 2">
</td>
</tr>
</table>

<h3>Global Map Properties</h3>
<table>
<tr>
<td align="center" valign="top">
Book I<br>
<img src="screens/<?=$vers?>/map_properties.png" alt="Global Properties, Book 1">
</td>
<td align="center" valign="top">
Book II<br>
<img src="screens/<?=$vers?>/map_properties_b2.png" alt="Global Properties, Book 2">
</td>
</tr>
</table>

<h3>Map Preferences</h3>
<p>
<img src="screens/<?=$vers?>/prefs_2.png" alt="Preferences">
</p>

<? $page->apoc_footer(); ?>
