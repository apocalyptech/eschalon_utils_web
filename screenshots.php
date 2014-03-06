<? // vim: set expandtab tabstop=4 shiftwidth=4: ?>
<?
require_once('common.php');
esch_header('Character Editor Screenshots');
$vers = '0.7.0';
?>

<h3>Screenshots, version <?=$vers?></h3>
<p><em>Note: the "Unknowns" tab is currently unimplemented.</em></p>
<p>
The utility also provides text output, if you so desire.
Here's some <a href="screens/<?=$vers?>/text-output.txt">sample output</a>
<a href="screens/<?=$vers?>/text-output-b2.txt">(also book 2)</a>
of that view.
</p>

<h4>Character Info</h4>
<table>
<tr>
<td align="center" valign="top">
Book I<br>
<img src="screens/<?=$vers?>/char_charinfo.png" alt="Base Information, Book 1">
</td>
<td align="center" valign="top">
Book II<br>
<img src="screens/<?=$vers?>/char_b2_charinfo.png" alt="Base Information, Book 2">
</td>
</tr>
</table>

<h4>Effects</h4>
<table>
<tr>
<td align="center" valign="top">
Book I<br>
<img src="screens/<?=$vers?>/char_effects.png" alt="Character Effects, Book 1">
</td>
<td align="center" valign="top">
Book II<br>
<img src="screens/<?=$vers?>/char_b2_effects.png" alt="Character Effects, Book 2">
</td>
</tr>
</table>

<h4>Spells</h4>
<table>
<tr>
<td align="center" valign="top">
Book I<br>
<img src="screens/<?=$vers?>/char_spells.png" alt="Character Spells, Book 1">
</td>
<td align="center" valign="top">
Book II <em>(with bound portal locations)</em><br>
<img src="screens/<?=$vers?>/char_b2_bound_portal.png" alt="Character Spells, Book 2">
</td>
</tr>
</table>

<h4>Inventory</h4>
<p>
<img src="screens/<?=$vers?>/char_inventory.png" alt="Character Inventory (1)">
<img src="screens/<?=$vers?>/char_inventory2.png" alt="Character Inventory (2)">
</p>

<h4>Equipped Items</h4>
<p>
<img src="screens/<?=$vers?>/char_equip.png" alt="Character Equipment">
</p>

<h4>Readied Items</h4>
<p>
<img src="screens/<?=$vers?>/char_ready.png" alt="Readied Items">
</p>

<h4>Misc Items</h4>
<p>
<em>(Keyring only active for Book II characters)</em><br>
<img src="screens/<?=$vers?>/char_b2_miscitems.png" alt="Miscellaneous Items">
</p>

<h4>Item Screen - Basic Information</h4>
<p>
<img src="screens/<?=$vers?>/item_basic.png" alt="Basic Item Information">
</p>

<h4>Item Screen - Image Selection Popup</h4>
<p>
<img src="screens/<?=$vers?>/item_imgselect.png" alt="Item Image Selection Dialog">
</p>

<h4>Item Screen - Modifiers</h4>
<table>
<tr>
<td align="center" valign="top">
Book I<br>
<img src="screens/<?=$vers?>/item_modifiers.png" alt="Item Modifiers, Book 1">
</td>
<td align="center" valign="top">
Book II<br>
<img src="screens/<?=$vers?>/item_b2_modifiers.png" alt="Item Modifiers, Book 2">
</td>
</tr>
</table>

<h4>Item Screen - Misc Attributes</h4>
<p>
<img src="screens/<?=$vers?>/item_misc.png" alt="Miscellaneous Item Attributes">
</p>

<h4>Preferences</h4>
<p>
<img src="screens/<?=$vers?>/prefs.png" alt="Preferences Dialog">
</p>

<? esch_footer(); ?>
