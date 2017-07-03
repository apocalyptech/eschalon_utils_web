<? // vim: set expandtab tabstop=4 shiftwidth=4: ?>
<?
require_once('common.php');
$page->set_title('Character Editor Screenshots');
$page->apoc_header();
$vers = '0.7.0';
?>

<h2>Screenshots, version <?=$vers?></h2>
<p><em>Note: the "Unknowns" tab is currently unimplemented.</em></p>
<p>
The utility also provides text output, if you so desire.
Here's some <a href="screens/<?=$vers?>/text-output.txt">sample output</a>
<a href="screens/<?=$vers?>/text-output-b2.txt">(also book 2)</a>
of that view.
</p>

<h3>Character Info</h3>
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

<h3>Effects</h3>
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

<h3>Spells</h3>
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

<h3>Inventory</h3>
<p>
<img src="screens/<?=$vers?>/char_inventory.png" alt="Character Inventory (1)">
<img src="screens/<?=$vers?>/char_inventory2.png" alt="Character Inventory (2)">
</p>

<h3>Equipped Items</h3>
<p>
<img src="screens/<?=$vers?>/char_equip.png" alt="Character Equipment">
</p>

<h3>Readied Items</h3>
<p>
<img src="screens/<?=$vers?>/char_ready.png" alt="Readied Items">
</p>

<h3>Misc Items</h3>
<p>
<em>(Keyring only active for Book II characters)</em><br>
<img src="screens/<?=$vers?>/char_b2_miscitems.png" alt="Miscellaneous Items">
</p>

<h3>Item Screen - Basic Information</h3>
<p>
<img src="screens/<?=$vers?>/item_basic.png" alt="Basic Item Information">
</p>

<h3>Item Screen - Image Selection Popup</h3>
<p>
<img src="screens/<?=$vers?>/item_imgselect.png" alt="Item Image Selection Dialog">
</p>

<h3>Item Screen - Modifiers</h3>
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

<h3>Item Screen - Misc Attributes</h3>
<p>
<img src="screens/<?=$vers?>/item_misc.png" alt="Miscellaneous Item Attributes">
</p>

<h3>Preferences</h3>
<p>
<img src="screens/<?=$vers?>/prefs.png" alt="Preferences Dialog">
</p>

<? $page->apoc_footer(); ?>
