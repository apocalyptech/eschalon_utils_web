<? // vim: set expandtab tabstop=4 shiftwidth=4: ?>
<?
require_once('common.php');
esch_header('Book 1 Scripting Notes');
?>

<p>
Scripts in Book 1 are found in one of three places: embedded in map tiles,
inside items (whenever you can "Use" an item in your inventory), and a script
that an entity runs when it dies.  In general, most of the script commands
that I've found can be run in any of those places, though some commands only
make sense in one context.
</p>

<p>
Commands can be separated with a semicolon, most often with whitespace around
them, so to show a message to the player and play a sound effect, you'd do
something like "<tt>message (You hear a noise!) ; sound (sfx_energize)</tt>".  There
may be some upper limit to how many commands you can run at once, but I don't
know that for sure.  I suspect that the Book 1 parser has a token limit
similar to Book 2, but I have yet to verify that.  See the Book 2 scripting
notes for more information on tokens.
</p>

<p>An example command definition here will be given like so:</p>
<blockquote><p><tt><b>gfx</b> (<i>&lt;effect&gt;</i>) <i>&lt;coords&gt;</i> <i>&lt;color&gt;</i></tt></p></blockquote>
<p>The parentheses there are part of the actual command; they should be included
if you're using the command.  Anything in italics and angle brackets is data that you, as a map
editor, should replace with the correct values.  Whenever you see <i>&lt;coords&gt;</i>
in a command, you'll be using a simple number of the form "YYYXX", though you
don't need to zero-pad the number.  For instance, the coordinate <i>(34, 125)</i>
becomes <tt>12534</tt>.  The coordinate <i>(5, 28)</i> becomes <tt>2805</tt>.
Note that unlike in Book 2 scripts, there's no way to say "the current square;"
you have to know the actual coordinates.
</p>

<p>Commands which seem to be only present in Book 1 will be
<span class="scriptonly">highlighted in blue</span>.  Commands which
exist in Book 2 but with a different name will be <span class="scriptdiff">highlighted
in yellow</span>.</p>

<p>Note that even though many of these commands are valid in
both Book 1 and Book 2, they might behave slightly differently, or have
different arguments.</p>

<h3>General-Purpose Commands</h3>
<blockquote>

<p>These are commands which should theoretically be valid anywhere.</p>

<h4>Quest-Related</h4>
<blockquote>
<p>Each quest has a number in Book 1, which I haven't mapped out yet.
In addition to the main quests, there appear to be some internal flags
which the game stores in "quests" which don't show up in your quest
book (for instance, for keeping track of the number of Salamanders
killed in Leurik's basement).
Each quest has a "state" number associated with it.  To put
a quest into the player's Quest book, you'd set the state to 1.
It looks like a successfully-completed quest will have a state of 9.  Also,
quests that haven't started yet might have a state of -1.</p>
<p>I've been told that it is
possible to use quest numbers up to at least 20,000 as state variables of
your own (for more complex custom mapping, for instance), though use
caution, since it's unknown what's happening in the program's memory
area when that's being done.</p>

<dl>

<dt><b>quest</b> <i>&lt;questnum&gt;</i> <i>&lt;state&gt;</i></dt>
<dd>
Set the specified quest to the specified state.
</dd>

<dt><b>kill_quest</b> <i>&lt;questnum&gt;</i></dt>
<dd>
Mark the quest as uncompletable (quest must be currently active).  Used in
a few entity death scripts.
</dd>

<dt><b>quest_step</b> <i>&lt;questnum&gt;</i></dt>
<dd>
Increments the quest status by one.  Used for the Salamanders in Leurik's
basement, the Fungal Slimes for Phillip's quest, and Noximander/Raptor
ambush in Shadowmirk Level 2.
Note that you can't use
this on "real" quests, only on the "counter" type quests.  You can't complete
a quest using <tt>quest_step</tt>.
</dd>

<dt><b>all_quests</b></dt>
<dd>
Adds all quests to the player's Quest Journal.
</dd>

</dl>
</blockquote>

<h4>Conditional Statements</h4>

<blockquote>
<p>These are used to conditionally execute scripts.  All of these will abort
the execution of the script unless the condition is met.  There doesn't appear
to be any "else" clause or the like - if the condition isn't met, the script
execution will simply stop.</p>

<dl>

<dt><b>condition</b> (<i>&lt;text&gt;</i>) (<i>&lt;yes text&gt;</i>) (<i>&lt;no text&gt;</i>)</dt>
<dd>
Displays a message (on parchment) to the player, with the two given options,
and the script will only continue if the user hits "Yes."  The last two arguments
are usually "Yes" and "No," but it seems they can be just about anything.
</dd>

<dt><b>cond_item</b> (<i>&lt;itemname&gt;</i>)</dt>
<dd>
Script will terminate unless you have the named item
</dd>

<dt><b>cond_quest</b> <i>&lt;questnum&gt;</i> <i>&lt;state&gt;</i></dt>
<dd>
Script will only continue if the specified quest is at the specified
state
</dd>

<dt><b>cond_not_quest</b> <i>&lt;questnum&gt;</i> <i>&lt;state&gt;</i></dt>
<dd>
Script will only continue if the given quest is NOT at the specified
state
</dd>

<dt><b>cond_special</b> <i>&lt;num&gt;</i></dt>
<dd>
Special condition, which in Book 1 sometimes triggers actions as well.
Probably not very useful to custom map makers.  The special conditions seen in the game:
<ol>
<li>Teleporter puzzle in Shadowmirk Level 1 (chests)</li>
<li>Vidar the Knife takes 75 gold pieces (if possible), or attacks you</li>
<li>Chest puzzle in Tangletree Ossuary</li>
<li>Monolith in Goblin Citadel, level 1 (opens doors)</li>
<li>Torch puzzle in Mysterious Cavern</li>
<li>Called after accepting Gramuk's offer</li>
<li>called after Crux placed on pedestal, probably wakes up Chancellor</li>
<li>Rolls "good" end cinematics</li>
<li>Chancellor killed, Spire Guards spawn and attack</li>
<li>Egg Display rack in Shadowmirk</li>
<li>"Destroyer" rank awarded, "bad" ending cinematic starts</li>
<li>Drink Pure Water, gain +2 Skill Points to use at next levelup</li>
<li>Demonic Statue, Goblin Citadel, Level 1 (fire trap)</li>
<li>Switch at the top of Lighthouse</li>
<li>Give 10 Hive Larvae to Hesham</li>
<li>Bottom of Lighthouse stairs, probably what generates goblins</li>
<li>Non-useable boat outside of the lighthouse</li>
</ol>
</dd>

<dt><b>cond_spot</b></dt>
<dd>
Script will only continue if the player passes a Spot Hidden check (typically this
is triggered by a type 12 object, triggered by proximity).
</dd>

<dt><b>cond_health</b></dt>
<dd>
Script will only continue if the user isn't at full health (used in
healing elixirs).
</dd>

<dt><b>cond_mana</b></dt>
<dd>
Script will only continue if the user isn't at full mana (used in mana
potions).
</dd>

<dt><b>cond_gold</b> <i>&lt;goldamount&gt;</i></dt>
<dd>
Script will only continue if the user has at least the specified gold.
</dd>

<dt><b>cond_state</b> <i>&lt;coords&gt;</i> <i>&lt;state&gt;</i></dt>
<dd>
Script will only continue if the object at the given coordinates is in
the state given.  This is typically used to check toggle states.  Valid
states in the game, used by doors, chests, other containers, and toggle
switches:
<ol>
<li>Closed</li>
<li>Open</li>
<li>Broken</li>
<li>Toggle 1 (upright)</li>
<li>Toggle 2 (toggled)</li>
</ol>
</dd>

<dt><b>cond_detected</b></dt>
<dd>
Unknown - has always returned "true" for me.
</dd>

</dl>
</blockquote>

<h4>Interactions with the Player</h4>
<blockquote>
<dl>

<dt><b>give_item</b> (<i>&lt;itemname&gt;</i>)</dt>
<dd>
Place the named item in the player's inventory
</dd>

<dt><b>remove_item</b> (<i>&lt;itemname&gt;</i>)</dt>
<dd>
Remove the named item from the player's inventory.  You may want to
call a <tt>cond_item</tt> first, to be safe.
</dd>

<dt><b>strip_items</b></dt>
<dd>
Removes all items from the player's inventory, including torches but
excluding gold.
</dd>

<dt><b>move_player</b> <i>&lt;coords&gt;</i></dt>
<dd>
Send the player to the given coordinates, within this map.
</dd>

<dt><b>port_to</b> <i>&lt;coords&gt;</i></dt>
<dd>
Send the player to the given coordinates, within this map, with
some portal effects.
</dd>

<dt><b>map_port</b> <i>&lt;mapname&gt;</i> / <b class="scriptdiff">map</b> (<i>&lt;mapname&gt;</i>)</dt>
<dd>
Send the player to the given map name, to the "last visited" coordinates
stored with the map.  The two forms seem to be basically identical, except
that I've only seen <tt>map_port</tt> used <i>without</i> parens, whereas
<tt>map</tt> I've only seen used <i>with</i> them.  Use of map_port is
typically followed by a <tt>port_to</tt>, to move the player to the correct
spot.
</dd>

<dt><b>add_gold</b> <i>&lt;n&gt;</i></dt>
<dd>
Adds the specified amount of gold directly to the player's inventory
</dd>

<dt><b>remove_gold</b> <i>&lt;n&gt;</i></dt>
<dd>
Removes the specified amount of gold from the player's inventory
</dd>

<dt><b>heal</b> <i>&lt;hp&gt;</i> <i>&lt;hidden&gt;</i></dt>
<dd>
Heal the given amount of HP; if "hidden" is greater than
zero, no message will be shown in the message pane, and
the graphical flourishes will be supressed
</dd>

<dt><b>restore</b> <i>&lt;mp&gt;</i></dt>
<dd>
Restores the given amount of MP
</dd>

<dt><b class="scriptdiff">cure_disease</b> <i>&lt;effectiveness&gt;</i></dt>
<dd>
Cures diseases.  Usually this is associated with a potion, but it doesn't have to be.
The effectiveness tends to be either 3 or 6, probably associated with the Cure Disease
casting level.  Higher numbers are required to cure the higher diseases.
</dd>

<dt><b>cure_poison</b> <i>&lt;val&gt;</i></dt>
<dd>
Cures poison.  The value I've always seen is 4, I'm not sure what exactly it means.
Usually this is associated with a potion, but it doesn't have to be.
</dd>

<dt><b>poison</b> <i>&lt;hp&gt;</i></dt>
<dd>
Poisons the character for a total of <tt>hp</tt> hitpoints, spread out over
a number of turns, taking one point of damage at a time.
</dd>

<dt><b>trauma</b> <i>&lt;hp&gt;</i></dt>
<dd>
Injures the player by the given HP.
</dd>

<dt><b>disease</b> <i>&lt;diseasenum&gt;</i></dt>
<dd>
Give the player the given disease (they have a chance to save versus disease resistance,
though).  Diseases in the game:
<ol>
<li>Dungeon Fever</li>
<li>Rusty Knuckles</li>
<li>Eye Fungus</li>
<li>Blister Pox</li>
<li>Insanity Fever</li>
<li>Fleshrot</li>
<li>Curse</li>
</ol>
</dd>

<dt><b class="scriptdiff">effect</b> (<i>&lt;effect&gt;</i>) <i>&lt;levelnum&gt;</i></dt>
<dd>
Used in potions to grant various effects, though it doesn't have to be tied to an item.
The <tt>levelnum</tt> probably refers to an equivalent spell-casting level, though I
don't know that for sure.  The effects are in english, not numbers.  Some of the effects
and associated levels (from potions) that I've seen are:
<ol>
<li>Cat's Eyes: 2</li>
<li>Haste: 2, 4</li>
<li>Invisible: 2, 4, 6</li>
<li>Keensight: 3</li>
<li>Leatherskin: 2, 4, 6</li>
<li>Mana Fortified: 3</li>
<li>Ogre Strength: 3</li>
<li>Predator Sight: 3</li>
<li>Poisoned: 3</li>
</ol>
<p>I've also gotten reports of the following working fine:</p>
<ol>
<li>Air Shielded</li>
<li>Blessed</li>
<li>Chameleon</li>
<li>Charmed</li>
<li>Elemental Armor</li>
<li>Enchanted Weapon</li>
<li>Enkindled Weapon</li>
<li>Entangled</li>
<li>Gravedigger's Flame</li>
<li>Greater Protection: 3</li>
<li>Nimbleness: 3</li>
<li>Off-Balance <i>(This only displays a message, though)</i></li>
<li>Paralyzed <i>(This only displays a message, though)</i></li>
<li>Reveal Map</li>
<li>Scared</li>
<li>Stoneskin</li>
<li>Stunned</li>
</ol>
<p>These lists may not be exhaustive, of course.</p>
</dd>

<dt><b>cleric_heal</b></dt>
<dd>
Opens a dialog to allow the player to pay for divine healing.  This will
deduct gold if they player agrees.
</dd>

<dt><b>cleric_dehex</b></dt>
<dd>
Opens a dialog to allow the player to pay for divine de-hexing.  This will
deduct gold if they player agrees.
</dd>

<dt><b>curse</b></dt>
<dd>
Will curse the player, if the player fails a Wisdom check.
</dd>

<dt><b>full_restore</b></dt>
<dd>
Cures all diseases and poison.  Will leave Curse intact, though.
</dd>

<dt><b>rename_item</b> <i>&lt;old name&gt;</i> <i>&lt;new name&gt;</i></dt>
<dd>
Renames the given item in the player's inventory.
</dd>

<dt><b>rent_room</b> <i>&lt;cost&gt;</i> <i>&lt;coords&gt;</i></dt>
<dd>
Used for Inn scripting.  Will launch a dialog offering a room for the
specified cost.  If accepted, the player will wake up at <tt>coords</tt>.
</dd>

<dt><b>teach_skill</b> (<i>&lt;name&gt;</i>) <i>&lt;skillnum&gt;</i></dt>
<dd>
Offer to train the player in the specified skill.  The player will have
to pay the usual fee, and be restricted to the usual Book II training
limits.  The <tt>name</tt> argument will just be used to display the name
in the initial dialog, and does not have to match any existing NPC.
</dd>

</dl>
</blockquote>

<h4>Interactions with the Map</h4>

<blockquote>

<dl>

<dt><b>close_door</b> <i>&lt;coords&gt;</i></dt>
<dd>
Closes the given door.  Note that there doesn't appear to be an <tt>open_door</tt>.
</dd>

<dt><b>close_port</b> <i>&lt;coords&gt;</i></dt>
<dd>
Closes the given portcullis.  Note that there doesn't appear to be an <tt>open_port</tt> in Book 1.
</dd>

<dt><b>toggle_port</b> <i>&lt;coords&gt;</i></dt>
<dd>
Toggle the given portcullis
</dd>

<dt><b>toggle_obj</b> <i>&lt;coords&gt;</i></dt>
<dd>
Toggle the existance of a given wall - This will work for basically
any graphic.  Note that objects currently toggled-off when you save
the game don't get saved properly in the Book 1 savegame file; on the
next load, the wall will be visible but your character will be able to
walk through it.
</dd>

<dt><b>destroy_obj</b> <i>&lt;coords&gt;</i></dt>
<dd>
Completely destroys the given wall - This will work for basically
any graphic.
</dd>

<dt><b>drop_ent</b> <i>&lt;entnum&gt;</i> <i>&lt;coords&gt;</i></dt>
<dd>
Drops the given entity at the given coordinates.
<span class="smalltext">
<a href="b1entities.html" onClick="window.open('b1entities.html', 'entitypopup', 'height=800,width=300,scrollbars=1'); return false;">(Entity Number Lookup)</a>
</span>
</dd>

<dt><b>remove_npc</b> <i>&lt;entnum&gt;</i></dt>
<dd>
Removes all entities with the given ID from the current map.
<span class="smalltext">
<a href="b1entities.html" onClick="window.open('b1entities.html', 'entitypopup', 'height=800,width=300,scrollbars=1'); return false;">(Entity Number Lookup)</a>
</span>
</dd>

<dt><b>npc_die</b> <i>&lt;entnum&gt;</i></dt>
<dd>
Sets the hitpoints for the given entity to zero.  Note that in Book 1, this
command does <b>not</b> actually kill the entity.  They will remain on the
map, and not attackable.
<span class="smalltext">
<a href="b1entities.html" onClick="window.open('b1entities.html', 'entitypopup', 'height=800,width=300,scrollbars=1'); return false;">(Entity Number Lookup)</a>
</span>
</dd>

<dt><b>npc_disp_change</b> <i>&lt;entnum&gt;</i> <i>&lt;disposition&gt;</i></dt>
<dd>
Changes the disposition of the given NPC entity.  Note that this does not
appear to work for monsters.  Disposition IDs:
<ol style="counter-reset: 0;">
<li>Hostile <em>(This is typically used for monsters)</em></li>
<li>Friendly</li>
<li>Hostile <em>(This is used for NPCs you've attacked, or who have otherwise
become hostile.  They should theoretically be Charmable back to Friendly)</em></li>
</ol>
</dd>

<dt><b>trigger_talk</b> <i>&lt;entnum&gt;</i></dt>
<dd>
Triggers a conversation with the given entity ID.  The entity must be present
somewhere on the map for this to work.
</dd>

<dt><b>convert_tile</b> <i>&lt;typenum&gt;</i></dt>
<dd>
Converts the current tile to the given object type.  Typically this is
"<tt>1</tt>", to make hidden cave treasure clickable, after a <tt>cond_spot</tt>.
Note that you can technically change to any type, but make sure that
a valid object is in place already for the type you're switching to.
The <strong>only</strong> thing that this changes is the Object Type itself.
</dd>

<dt><b>areacheck</b></dt>
<dd>
Unknown.
</dd>

<dt><b>det_keg</b> <i>&lt;coords&gt;</i></dt>
<dd>
Detonates the powder keg at the given coordinates.  If there's no powder keg
there, this has no effect.
</dd>

<dt><b>init_trade</b> <i>&lt;name&gt;</i></dt>
<dd>
Initiates a trade window with the specified NPC.  Note that Book I expects
the NPC <i>name</i> here, not an entity ID.  The NPC does not need to be
present on the map for this to work.  If an invalid name is specified, a
trade window will be opened with a blank name and zero gold reserves.
</dd>

<dt><b>remove_barrier</b> <i>&lt;coords&gt;</i></dt>
<dd>
Allow the player to walk through the given coordinates.
</dd>

<dt><b>trap</b> <i>&lt;param&gt;</i></dt>
<dd>
Plays a sound effect as if a trap had been sprung, but has no actual
effect on the player or environment.
</dd>

<dt><b>spell</b> (<i>&lt;spell name&gt;</i>) <i>&lt;level&gt;</i></dt>
<dd>
Casts the named spell, at the given <tt>level</tt>.  Unknown spell names
will crash Eschalon.  I haven't found a way to provide target information
for this, so it looks like this command can probably only cast spells which
don't require targeting, such as defensive spells.  This will deduct the
appropriate amount of mana from the player's pool, and can cause the player's
MP to go below zero.
</dd>

</dl>
</blockquote>

<h4>Other Commands</h4>

<blockquote>
<dl>

<dt><b>gfx</b> (<i>&lt;gfx effect&gt;</i>) <i>&lt;coords&gt;</i> <i>&lt;colornum&gt;</i></dt>
<dd>
Launches a fancy graphical effect at the given coordinates.
Effects that I've noted in the game, and the associated
<tt>colornum</tt> values for each:
<ul class="gfxexample">
<li><tt>Colored Smoke</tt><br>
    <img src="b1_gfx_colored_smoke.png" alt="Colored Smoke Example">
    <div>
    0. white<br>
    1. green<br>
    2. yellow/orange<br>
    3. blue<br>
    4. grey<br>
    5. black
    </div>
</li>
<li><tt>Divine Light</tt><br>
    <img src="b1_gfx_divine_light.png" alt="Divine Light Example">
    <div>
    0. White <em>(other numbers don't seem to change the effect)</em>
    </div>
</li>
<li><tt>Flare</tt><br>
    <img src="b1_gfx_flare.png" alt="Flare Example">
    <div>
    0. <em>(invalid)</em><br>
    1. Red<br>
    2. Green<br>
    3. Blue<br>
    4. White
    </div>
</li>
<li><tt>Flare Burst</tt> <em>(very much like <tt>Flare</tt> but bigger, and rotates more)</em><br>
    <img src="b1_gfx_flare_burst.png" alt="Flare Burst Example">
    <div>
    0. <em>(invalid)</em><br>
    1. Red<br>
    2. Green<br>
    3. Blue<br>
    4. White
    </div>
</li>
<li><tt>Gibs</tt><br>
    <img src="b1_gfx_gibs.png" alt="Gibs Example">
    <div>
    0. Red<br>
    1. Green
    </div>
</li>
<li><tt>Port</tt><br>
    <img src="b1_gfx_port.png" alt="Port Example">
    <div>
    0. Multicolored <em>(no discernable change on other numbers)</em>
    </div>
</li>
<li><tt>Sparks</tt><br>
    <img src="b1_gfx_sparks.png" alt="Sparks Example">
    <div>
    0. Yellow <em>(no discernable change on other numbers)</em>
    </div>
</li>
</ul>
</dd>

<dt style="clear: left;"><b class="scriptdiff">message</b> (<i>&lt;message text&gt;</i>)</dt>
<dd>
Displays the given text in the message pane
</dd>

<dt><b>narrative</b> <i>&lt;narrativenum&gt;</i></dt>
<dd>
Displays the given narrative.  This is accompanied by a little graphical flourish in
the message pane, and a sound effect.
</dd>

<dt><b>kill_narrative</b> <i>&lt;narrativenum&gt;</i></dt>
<dd>
Tells the game engine not to display the given narrative anymore.  Used when a
narrative text would no longer be accurate if triggered.
</dd>

<dt><b class="scriptonly">notebox</b> <i>&lt;number&gt;</i></dt>
<dd>
Displays a piece of parchment with some information.  Used for alchemy recipes
and the posted notice in the Underground Repository.
</dd>

<dt><b>activate_qt</b> <i>&lt;quicktravel num&gt;</i></dt>
<dd>
The player "discovers" the given quicktravel point (this doesn't actually
send the player <em>to</em> the quicktravel point, it just makes that point
clickable).
</dd>

<dt><b>book</b> <i>&lt;booknum&gt;</i></dt>
<dd>
Shows book text.  This will sometimes have effects other than just showing the
book text.
</dd>

<dt><b>destroy_script</b></dt>
<dd>
Destroys this script (one-time use).
</dd>

<dt><b>commit_crime</b></dt>
<dd>
Area NPCs may notice you committing a crime
</dd>

<dt><b>no_crime</b></dt>
<dd>
Allows access to something which would otherwise be considered a crime.
</dd>

<dt><b>drama</b></dt>
<dd>
Unknown - used once in the Vidar the Knife ambush in Northeast Thaermore,
but doesn't seem to have any discernable effect when I try it elsewhere.
</dd>

<dt><b>alert_npcs</b></dt>
<dd>
Unknown - used once in the Vidar the Knife ambush in Northeast Thaermore,
but doesn't seem to have any discernable effect when I try it elsewhere.
</dd>

<dt><b>sound</b> (<i>&lt;soundname&gt;</i>)</dt>
<dd>
Plays the specified sound.  The soundfile name might be case-insensitive.
I have seen, for instance, both "<tt>SFX_Quaff</tt>" and "<tt>SFX_quaff</tt>".
Note that the engine will change the pitch somewhat, so consecutive executions
may sound slightly different.
The soundfiles that I've seen referenced by the game:
<ul>
<li>eat</li>
<li>ghost_laugh</li>
<li>mo2_move</li>
<li>sfx_bell</li>
<li>sfx_energize</li>
<li>sfx_heal</li>
<li>sfx_port_down</li>
<li>sfx_quaff</li>
<li>sfx_quaff</li>
<li>sfx_stash</li>
<li>sfx_stats_Open</li>
<li>stairs</li>
<li>stone_collapse</li>
<li>stone_slide</li>
<li>thunder</li>
<li>war_horn</li>
<li>water_rush</li>
</ul>
</dd>

<dt><b>display</b> (<i>&lt;graphicfile&gt;</i>)</dt>
<dd>
Displays the given graphic file (used primarily for the inventory map).  Note that the
graphic file referenced lives inside the graphics pak, so you can't add your own graphics.
</dd>

<dt><b>time</b></dt>
<dd>
Display the in-game time (used in chronometers)
</dd>

<dt><b>screen_fade_in<br>screen_fade_out</b></dt>
<dd>
These do what you'd expect.  Note that the screen will <b>not</b> fade back
in unless you explicitly call <tt>screen_fade_in</tt>, so be careful.
</dd>

<dt><b>updatezones</b></dt>
<dd>
Unknown.
</dd>

<dt><b class="scriptonly">convert</b> <i>&lt;param&gt;</i></dt>
<dd>
Unknown.
</dd>

<dt><b>delay</b> <i>&lt;turns&gt;</i></dt>
<dd>
Advances the game time by the specified number of turns.  Timed effects will
expire, etc.
</dd>

</dl>
</blockquote>

</blockquote>

<h3>Usually Only Used in Entity Scripts</h3>

<blockquote>

<p>These commands are typically found in Entity Death scripts, and often
don't make much sense in other contexts.  Note that you <i>can</i> call
these elsewhere if you want, though.</p>

<dl>

<dt><b>drop_item</b> (<i>&lt;Item Name&gt;</i>) <i>&lt;percent chance&gt;</i></dt>
<dd>
Drops the named item with the specified percent chance.  Percentage
*might* be optional?  Set 100 to have it always happen.
</dd>

<dt><b>drop_loot</b></dt>
<dd>
Drops a bag of loot.  This doesn't seem to actually be used in any of the
entities I've seen, but the command does work.
</dd>

</dl>

</blockquote>

<h3>Only Used in Item Scripts</h3>

<blockquote>

<p>These commands are only found in Item scripts, for when you "Use" them,
and will typically not work outside of that context.</p>

<dl>

<dt><b class="scriptdiff">learn_book</b> <i>&lt;booknum&gt;</i></dt>
<dd>
Teaches the player the given skill, used in books.  This doesn't seem to
work properly when used outside of a book - a message will display saying that
the player has learned the skill, but the skill value doesn't actually go up,
and shows up in red in the character status screen.  If anyone can find a way
to make it work outside of books, let me know.
</dd>

<dt><b class="scriptdiff">learn</b></dt>
<dd>
Teaches the player the appropriate spell, based on the name of the Item.
The item needs to be named "Scroll of <i>Spell Name</i>", or else the game will
crash.
</dd>

<dt><b>remove</b></dt>
<dd>
Removes the used item from inventory
</dd>

<dt><b>to_flask</b></dt>
<dd>
Used on potions to turn the potion into an empty flask
</dd>

</dl>
</blockquote>

<h3>Only Used in Tiles/Squares</h3>

<blockquote>

<p>These commands are found in square/tile scripts,
and don't make much sense outside of that context.</p>

<dl>

<dt><b>unlocked_with</b> (<i>&lt;key name&gt;</i>)</dt>
<dd>
Used on locked doors and containers, specifying the key to use.
</dd>

<dt><b>toggle_switch</b></dt>
<dd>
Toggle this switch's position.  (Should only be used when there's
a toggle switch.)
</dd>

</dl>
</blockquote>

<? esch_footer(); ?>
