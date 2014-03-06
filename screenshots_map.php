<? // vim: set expandtab tabstop=4 shiftwidth=4: ?>
<?
require_once('common.php');
esch_header('Map Editor Screenshots');
$vers = '0.7.0';
?>

<h3>Screenshots, version <?=$vers?></h3>

<h4>Initial View</h4>
<p>
<img src="screens/<?=$vers?>/map_initial.png" alt="Initial View">
</p>

<h4>... with Barrier Highlighting</h4>
<p>
<img src="screens/<?=$vers?>/map_barrierhighlight.png" alt="Barrier Highlighting">
</p>

<h4>... Barrier Highlighting with Walls and Trees turned off</h4>
<p>
<img src="screens/<?=$vers?>/map_barrierhighlight_bare.png" alt="Barrier Highlighting, no walls or trees">
</p>

<h4>... with Object and Entity highlighting</h4>
<p>
<img src="screens/<?=$vers?>/map_script_ent_1.png" alt="Object and Entity Highlighting">
</p>

<h4>Fully Zoomed In</h4>
<p>
<img src="screens/<?=$vers?>/map_zoom_in.png" alt="Zoomed In">
</p>

<h4>... and mostly Zoomed Out</h4>
<p>
<img src="screens/<?=$vers?>/map_zoom_out.png" alt="Zoomed Out">
</p>

<h4>Tile Editing - Main Attributes</h4>
<p>
<img src="screens/<?=$vers?>/map_square_main.png" alt="Tile Atrributes">
</p>

<h4>Tile Editing - Graphic Lookup</h4>
<p>
<img src="screens/<?=$vers?>/map_square_gfxlookup.png" alt="Tile Graphic Lookup">
</p>

<h4>Tile Editing - Entity Attributes</h4>
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

<h4><a name="scripts"></a>Tile Editing - Object Info</h4>
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

<h4>Global Map Properties</h4>
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

<h4>Map Preferences</h4>
<p>
<img src="screens/<?=$vers?>/prefs_2.png" alt="Preferences">
</p>

<? esch_footer(); ?>
