<? // vim: set expandtab tabstop=4 shiftwidth=4: ?>
<?
require_once('common.php');
esch_header('Book 3 Scripting Notes');
?>

<p>
Scripts in Book 3 are found in one of four places: embedded in map tiles,
associated with a map itself, inside items (whenever you can "Use" an item
in your inventory), and a script that an entity runs when it dies.  In
general, most of the script commands that I've found can be run in any of
those places, though some commands only make sense in one context.
</p>

<p>
Commands can be separated with a semicolon, most often with whitespace around
them, so to show a message to the player and play a sound effect, you'd do
something like "<tt>msg (You hear a noise!) ; sound (sfx_portal)</tt>".
Note that if you want to get pedantic about this, the semicolon itself isn't
even necessary; the parser seems to just ignore them.  The semicolons make
things much more readable for humans, though, so I recommend you continue
to use them.
</p>

<p>An example command definition here will be given like so:</p>
<blockquote><p><tt><b>asfx</b> (<i>&lt;soundname&gt;</i>) <i>&lt;coords&gt;</i></tt></p></blockquote>
<p>The parentheses there are part of the actual command; they should be included
if you're using the command.  Anything in italics and angle brackets is data that you, as a map
editor, should replace with the correct values.  Whenever you see <i>&lt;coords&gt;</i>
in a command, you'll be using a simple number of the form "YYYXX", though you
don't need to zero-pad the number.  For instance, the coordinate <i>(34, 125)</i>
becomes <tt>12534</tt>.  The coordinate <i>(5, 28)</i> becomes <tt>2805</tt>.
Note that the coordinate <tt>0</tt> is considered special, and will cause the
effect to happen on the same tile where the script was executed from.
</p>

<p>
The Book 2 script parser appears to have a fifty-token limit (still the case
in Book 3?.  A "token" in this case is simply one component of the command. 
The above <tt>asfx</tt> example would be three tokens: one for
"<tt>asfx</tt>," one for the sound name, and one for the coordinates.  When
parentheses are used, it appears that everything inside the parens counts as
a single token.  So if you're using the <tt>msg</tt> command to do something
like "<tt>msg (The gate opens behind you, letting forth a torrent of
rats!)</tt>", that would only count as two tokens.  There is probably a
limit to how long a single token can be, and there's also probably a limit
to how long a whole script can be, characterwise, but I don't know what
those are.  Regardless, if you go over fifty tokens in a single script, the
game will crash once it tries to execute that script.
</p>

<p>Commands which are new in Book 3 will be <span
class="scriptonly">highlighted in blue</span>.  Commands which exist in Book
2 but with a different name or parameters will be <span
class="scriptdiff">highlighted in yellow</span>.  Commands which are present
in the engine but don't seem to be used by any of the Book 3 scripts will be
<span class="scriptdeprec">highlighted in gray</span>.  It might be safe to
use those commands, but it's possible that they're considered deprecated or
something.</p>

<p>Note that even though many of these commands are valid in
Books 1, 2, and/or 3, they might behave slightly differently, or have
different arguments.</p>

<h3>General-Purpose Commands</h3>
<blockquote>

<p>These are commands which should theoretically be valid anywhere.</p>

<h4>Quest-Related</h4>
<blockquote>
<p>Each quest has a number in Book 3 - the main quests are numbered 1 through 30, and
there are other internal flags the game uses which are technically numbered as
quests 100 through 124.  Each quest has a "state" number associated with it.  To put
a quest into the player's Quest book, you'd set the state to 1.  It looks like a
successfully-completed quest will have a state of 9.  Also, quests that
haven't started yet might have a state of -1.</p>
<p>I've been told that it is
possible to use quests higher than 124 (up to at least 20,000, actually) as
state variables of your own
(for more complex custom mapping, for instance).  Use caution when doing so,
though, since it's unknown what's happening in the program's memory area
when that's being done.</p>

<dl>

<dt><b>quest</b> <i>&lt;questnum&gt;</i> <i>&lt;state&gt;</i></dt>
<dd>
Set the specified quest to the specified state.  State can be given as a
negative number with parens, like "<tt>(-2)</tt>", which is often used when the
player abandons quests.  (I have also seen where the -2 is <i>not</i> in
parens.)
</dd>

<dt><b>quest_step</b> <i>&lt;questnum&gt;</i></dt>
<dd>
Increments the quest status by one.  Used in the Boreheads quest, and for
the spiders infesting the Port Kuudad storehouse.
Note that you can't use
this on "real" quests, only on the "counter" type quests.  You can't complete
a quest using <tt>quest_step</tt>.
</dd>

<dt><b class="scriptdeprec">all_quests</b></dt>
<dd>
Adds all quests to the player's Quest Journal.  Note that in Book II, this
will cause Eschalon to crash when the player opens his journal; it hasn't
yet been tested in Book III. In any case, it's likely a debugging tool.
</dd>

<dt><b class="scriptdeprec">quest_info</b></dt>
<dd>
Unknown; not used
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

<dt><b>cond_not_item</b> (<i>&lt;itemname&gt;</i>)</dt>
<dd>
Script will terminate if you DO have the named item
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
Special condition, will only continue if some internal criteria is met.  Probably
not very useful to custom map makers.  The special conditions seen in the game:
<ol>
<li>Unknown; not used</li>
<li>5 pounds puzzle in Baizel's house</li>
<li>Check for 10 pearls for Arima's quest</li>
<li>Check for gems in clamshells in Akadai Underworld</li>
<li>Unknown - used before Erubor's mental conversation when leaving Akadai Underworld</li>
<li>Check for glass gem in chest in Omentor</li>
<li>Unknown - used during Karamiklan interaction</li>
</ol>
</dd>

<dt><b>cond_spot</b></dt>
<dd>
Script will only continue if the player passes a Spot Hidden check (typically this
is triggered by a type 13 object, triggered by proximity).
</dd>

<dt><b>cond_touch</b></dt>
<dd>
Script will continue if the script was triggered through a player click.
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

<dt><b class="scriptdeprec">cond_gold</b> <i>&lt;goldamount&gt;</i></dt>
<dd>
Script will only continue if the user has at least the specified gold.
</dd>

<dt><b class="scriptdeprec">cond_detected</b></dt>
<dd>
Unknown.
</dd>

<dt><b class="scriptdeprec">cond_state</b> <i>&lt;coords&gt;</i> <i>&lt;state&gt;</i></dt>
<dd>
Script will only continue if the object at the given coordinates is in
the state given.  This is typically used to check toggle states.  Valid
states in the game, used by doors, chests, other containers, and toggle
switches (not updated for Book III, may be inaccurate):
<ol>
<li>Closed</li>
<li>Open</li>
<li>Broken</li>
<li>Toggle 1 (upright)</li>
<li>Toggle 2 (toggled)</li>
</ol>
</dd>

<dt><b class="scriptonly">cond_input</b> <i>&lt;password&gt;</i> <i>&lt;fail event&gt;</i> </dt>
<dd>
Used with user_input to check the word or phrase the user entered. Used for
the Snows of May and Master Warren's Crypt puzzles.  The only fail event
seen in the game is <tt>zap</tt>.
</dd>

</dl>
</blockquote>

<h4>Interactions with the Player</h4>
<blockquote>
<dl>

<dt><b class="scriptonly">user_input</b> (<i>&lt;text&gt;</i>)</dt>
<dd>
Displays the given text and prompts the user to enter a word or phrase.
Only used with cond_input.
</dd>

<dt><b class="scriptonly">player_face</b> <i>&lt;direction number&gt;</i></dt>
<dd>
Makes the player face in a given direction. The only direction used in the
game is 4.
</dd>

<dt><b class="scriptonly">player_bonus</b> <i>&lt;bonus type&gt;</i> <i>&lt;points&gt;</i></dt>
<dd>
Gives the player more skill (type=1) or attribute (type=2) points to spend at next level up.
</dd>

<dt><b class="scriptonly">bonus_att</b> (<i>&lt;attribute&gt;</i>) <i>&lt;points&gt;</i></dt>
<dd>
Increases the named attribute by the given number of points.
</dd>

<dt><b>give_item</b> (<i>&lt;itemname&gt;</i>)</dt>
<dd>
Place the named item in the player's inventory
</dd>

<dt><b>remove_item</b> (<i>&lt;itemname&gt;</i>)</dt>
<dd>
Remove the named item from the player's inventory.  You may want to
call a <tt>cond_item</tt> first, to be safe.
</dd>

<dt><b class="scriptdeprec">strip_items</b></dt>
<dd>
Removes all items from the player's inventory, including torches but
excluding gold.
</dd>

<dt><b>move_player</b> <i>&lt;coords&gt;</i></dt>
<dd>
Send the player to the given coordinates, within this map.
</dd>

<dt><b class="scriptdeprec">portfx</b></dt>
<dd>
Generate some portal effects, centered on the player square.
This is sort of an analogue of "<tt>sound (sfx_portal) ; gfx (Port) 0 0</tt>"
except that it's centered on the player, so you don't need to
specify the actual coordinates.
</dd>

<dt><b>port_to</b> <i>&lt;coords&gt;</i></dt>
<dd>
Send the player to the given coordinates, within this map, with
some portal effects.  Analagous to "<tt>move_player <i>&lt;coords&gt;</i> ; portfx</tt>"
</dd>

<dt><b>map_port</b> (<i>&lt;mapname&gt;</i>) <i>&lt;coords&gt;</i></dt>
<dd>
Send the player to the given coordantes inside 'mapname'
Sometimes the parens around mapname are omitted; though it's probably best to
use them.  When they're omitted, it seems to always be a
'numbered' (outside) map.  Note that this doesn't do an implicit <tt>portfx</tt>,
so if you want the portal effects, you should do so explicitly.
</dd>

<dt><b>add_gold</b> <i>&lt;n&gt;</i></dt>
<dd>
Adds the specified amount of gold directly to the player's inventory
</dd>

<dt><b>remove_gold</b> <i>&lt;n&gt;</i></dt>
<dd>
Removes the specified amount of gold from the player's inventory
</dd>

<dt><b>learn_recipe</b> <i>&lt;recipenum&gt;</i></dt>
<dd>
Player learns the given alchemy recipe.  Occasionally the recipenum will
have parens.  <tt>recipenum</tt> of "99" will give the user all recipes
(still true in Book III?)
</dd>

<dt><b>gain_xp</b> <i>&lt;xp&gt;</i></dt>
<dd>
Give the specified XP.  Can include parens around the XP
</dd>

<dt><b class="scriptdeprec">visit_well</b></dt>
<dd>
Quenches your thirst and fills your waterskins.  Note that if you have
an object of type 16 (well), you don't need this script.
</dd>

<dt><b>Eat</b> <i>&lt;foodval&gt;</i> <i>&lt;drinkval&gt;</i></dt>
<dd>
Used on edible food items, but works via other scripts, too.  Could implement
a cafeteria or something with this.
</dd>

<dt><b>Heal</b> <i>&lt;hp&gt;</i> <i>&lt;hidden&gt;</i></dt>
<dd>
Heal the given amount of HP; if "hidden" is greater than
zero, no message will be shown in the message pane, and
the graphical flourishes will be supressed
</dd>

<dt><b>Restore</b> <i>&lt;mp&gt;</i></dt>
<dd>
Restores the given amount of MP
</dd>

<dt><b>cure_ailment</b></dt>
<dd>
Cures ailments.  Usually this is associated with a potion, but it doesn't have to be.
</dd>

<dt><b>cure_poison</b> <i>&lt;val&gt;</i></dt>
<dd>
Cures poison.  The value I've always seen is 4, I'm not sure what exactly it means.
Usually this is associated with a potion, but it doesn't have to be.
</dd>

<dt><b>poison</b> <i>&lt;num&gt;</i></dt>
<dd>
Poisons the character for a total of <tt>num</tt> times, spread out over
a number of turns.
</dd>

<dt><b class="scriptdeprec">trauma</b> <i>&lt;hp&gt;</i></dt>
<dd>
Injures the player by the given HP.
</dd>

<dt><b class="scriptdeprec">disease</b> <i>&lt;diseasenum&gt;</i></dt>
<dd>
Give the player the given disease (they have a chance to save versus disease resistance,
though).  Diseases in the game (not updated for Book III yet):
<ol style="counter-reset: 8">
<li>Tapeworms</li>
<li>Troll Fever</li>
<li>Eye Rot</li>
<li>Fleshblight</li>
</ol>
</dd>

<dt><b class="scriptdiff">player_effect</b> <i>&lt;effect&gt;</i> <i>&lt;levelnum&gt;</i> <i>&lt;duraitionnum&gt;</i></dt>
<dd>
Used in potions to grant various effects, though it doesn't have to be tied to an item.
The <tt>levelnum</tt> probably refers to an equivalent spell-casting level, though I
don't know that for sure.  The effects are as follows, though it seems that not all of
these actually work with <tt>player_effect</tt>:
<ul>
<li>EFFECT_CHAMELEON</li>
<li>EFFECT_CHARMED</li>
<li>EFFECT_ENTANGLED</li>
<li>EFFECT_PARALYZED</li>
<li>EFFECT_POISONED</li>
<li>EFFECT_SCARED</li>
<li>EFFECT_STUNNED</li>
<li>EFFECT_TRIPPED</li>
<li>EFFECT_DENSENIM</li>
<li>EFFECT_ENCHANT</li>
<li>EFFECT_CATEYES</li>
<li>EFFECT_GRAVEFLAME</li>
<li>EFFECT_BLESS</li>
<li>EFFECT_HASTE</li>
<li>EFFECT_OGRE</li>
<li>EFFECT_INVISIBLE</li>
<li>EFFECT_LEATHERSKIN</li>
<li>EFFECT_NIMBLE</li>
<li>EFFECT_REVEAL_MAP</li>
<li>EFFECT_STONESKIN</li>
<li>EFFECT_KEENSIGHT</li>
<li>EFFECT_ENKINDLE</li>
<li>EFFECT_EARMOR</li>
<li>EFFECT_PREDATOR</li>
<li>EFFECT_FORT_MANA</li>
<li>EFFECT_GREAT_PROT</li>
</ul>
<p>Some potions that I've noted down:</p>
<ul>
<li>Cat's Eyes Brew: <tt>EFFECT_CATEYES 3 120</tt></li>
<li>Haste I: <tt>EFFECT_HASTE 3 10</tt></li>
<li>Haste II: <tt>EFFECT_HASTE 3 20</tt></li>
<li>Haste III: <tt>EFFECT_HASTE 3 20</tt></li>
<li>Ogre Strength: <tt>EFFECT_OGRE 3 120</tt></li>
<li>Invisibility I: <tt>EFFECT_INVISIBLE 1 10</tt></li>
<li>Invisibility II: <tt>EFFECT_INVISIBLE 3 20</tt></li>
<li>Invisibility III: <tt>EFFECT_INVISIBLE 6 30</tt></li>
<li>Keensight: <tt>EFFECT_KEENSIGHT 3 120</tt></li>
<li>Predator Sight: <tt>EFFECT_PREDATOR 3 40</tt></li>
<li>Greater Protection: <tt>EFFECT_GREAT_PROT 3 40</tt></li>
<li>Leatherskin: <tt>EFFECT_LEATHERSKIN 3 60</tt></li>
<li>Nimbleness: <tt>EFFECT_NIMBLE 3 120</tt></li>
<li>Stoneskin: <tt>EFFECT_STONESKIN 3 60</tt></li>
<li>Fortify Mana: <tt>EFFECT_FORT_MANA 3 20</tt></li>
</ul>
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

<dt><b class="scriptdeprec">curse</b></dt>
<dd>
This did nothing in Book II. It's unused in Book III and untested as yet.
</dd>

<dt><b class="scriptdeprec">full_restore</b></dt>
<dd>
Cures all poison, and will attempt to cure diseases.  In my limited testing,
though, it's possible this isn't actually able to cure disease.  Will
leave curses untouched.
</dd>

<dt><b class="scriptdeprec">rename_item</b> <i>&lt;old name&gt;</i> <i>&lt;new name&gt;</i></dt>
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
to pay the usual fee, and be restricted to the usual Book I training
limits.  The <tt>name</tt> argument will just be used to display the name
in the initial dialog, and does not have to match any existing NPC.
</dd>

</dl>
</blockquote>

<h4>Interactions with the Map</h4>

<blockquote>

<dl>

<dt><b class="scriptonly">npc_interact</b> (<i>&lt;name&gt;</i>)
<dd>
Starts a conversation with the named NPC, who must be on the map.
</dd>

<dt><b class="scriptonly">npc_alignment</b> <i>&lt;entity number&gt;</i> <i>&lt;alignment&gt;</i>
<dd>
Changes the alignment of an npc by their entity number. For alignment, 0 is
enemy, 1 is friendly, and 2 is friendly-turned-hostile.  The 0 vs.  2
distinction is important for the True Healer challenge.
</dd>

<dt><b class="scriptonly">find_secret</b> <i>&lt;secret number&gt;</i>
<dd>
Shows the "you found a secret" message, awards XP, and displays a
shower of sparks. Secrets present in the game are 1-30, but you may
be able to add more.
</dd>

<dt><b class="scriptonly">convert_object</b> <i>&lt;coords&gt;</i> <i>&lt;graphic number&gt;</i></dt>
<dd>
Replaces the graphic for the object at given coordinates with a new one.
</dd>

<dt><b class="scriptonly">blast</b> <i>&lt;coords&gt;</i> <i>&lt;damage&gt;</i></dt>
<dd>
Sets off an explosion at the given coordinates.
</dd>

<dt><b class="scriptonly">alter_light</b> <i>&lt;coords&gt;</i> <i>&lt;level&gt;</i></dt>
<dd>
Changes the amount of light at a certain location.
</dd>

<dt><b class="scriptdeprec">close_door</b> <i>&lt;coords&gt;</i></dt>
<dd>
Closes the given door.  Note that there doesn't appear to be an <tt>open_door</tt>.
</dd>

<dt><b>open_port</b> <i>&lt;coords&gt;</i></dt>
<dd>
Open the portcullis at the given coordinates
</dd>

<dt><b>close_port</b> <i>&lt;coords&gt;</i></dt>
<dd>
Closes the given portcullis
</dd>

<dt><b class="scriptonly">toggle_basedecal</b> <i>&lt;coords&gt;</i></dt>
<dd>
Toggle the decal graphic at the given coordinates.
</dd>

<dt><b>toggle_port</b> <i>&lt;coords&gt;</i></dt>
<dd>
Toggle the given portcullis
</dd>

<dt><b>toggle_obj</b> <i>&lt;coords&gt;</i></dt>
<dd>
Toggle the existance of a given wall - This will work for basically
any graphic.  Used, for instance, on the entrance to Lorewitch.
</dd>

<dt><b class="scriptdeprec">toggle_zapper</b> <i>&lt;coords&gt;</i></dt>
<dd>
Toggles a zapper (electric field) at the given coords
</dd>

<dt><b>destroy_obj</b> <i>&lt;coords&gt;</i></dt>
<dd>
Completely destroys the given wall - This will work for basically
any graphic.
</dd>

<dt><b>drop_keg</b></dt>
<dd>
Spawns a keg in front of the player.
</dd>

<dt><b>drop_fusedkeg</b> <i>&lt;coords&gt;</i></dt>
<dd>
Spawns a lit keg at the specified coordinates.
</dd>

<dt><b>drop_ent</b> <i>&lt;entnum&gt;</i> <i>&lt;coords&gt;</i></dt>
<dd>
Drops the given entity at the given coordinates.
<span class="smalltext">
<a href="b3entities.html" onClick="window.open('b3entities.html', 'entitypopup', 'height=800,width=300,scrollbars=1'); return false;">(Entity Number Lookup)</a>
</span>
</dd>

<dt><b>remove_npc</b> <i>&lt;entnum&gt;</i></dt>
<dd>
Removes all entities with the given ID from the current map.
<span class="smalltext">
<a href="b3entities.html" onClick="window.open('b3entities.html', 'entitypopup', 'height=800,width=300,scrollbars=1'); return false;">(Entity Number Lookup)</a>
</span>
</dd>

<dt><b>npc_die</b> <i>&lt;entnum&gt;</i></dt>
<dd>
Kills the given entity.
<span class="smalltext">
<a href="b3entities.html" onClick="window.open('b3entities.html', 'entitypopup', 'height=800,width=300,scrollbars=1'); return false;">(Entity Number Lookup)</a>
</span>
</dd>

<dt><b>convert_tile</b> <i>&lt;coords&gt;</i> <i>&lt;typenum&gt;</i></dt>
<dd>
Converts the given tile to the given object type.  Typically this is
"<tt>0 1</tt>", to make hidden cave treasure clickable, after a <tt>cond_spot</tt>.
Note that you can technically change to any type, but make sure that
a valid object is in place already for the type you're switching to.
The <strong>only</strong> thing that this changes is the Object Type itself.
</dd>

<dt><b>areacheck</b></dt>
<dd>
Unknown; is often called immediately after a <tt>map_port</tt>, but not always.
I assume it has something to do with checking for something on the map around
where the player just ported to.
</dd>

<dt><b class="scriptdeprec">det_keg</b> <i>&lt;coords&gt;</i></dt>
<dd>
Detonates the powder keg at the given coordinates.  If there's no powder keg
there, this has no effect.
</dd>

<dt><b class="scriptdiff">init_trade</b> <i>&lt;entity name&gt;</i></dt>
<dd>
Initiates a trade window with the specified NPC.  Note that Book III expects
the entity's name here, like "Arima".  The NPC must be present on the map,
and be an actual merchant, otherwise Eschalon will freeze.
</dd>

<dt><b class="scriptdeprec">remove_barrier</b> <i>&lt;coords&gt;</i></dt>
<dd>
Allow the player to walk through the given coordinates.
</dd>

<dt><b class="scriptdeprec">trap</b> <i>&lt;param&gt;</i></dt>
<dd>
Plays a sound effect and displays some graphical effects, as if a trap
had been sprung, but has no actual effect on the player or environment.
</dd>

<dt><b class="scriptdeprec">spell</b> (<i>&lt;spell name&gt;</i>) <i>&lt;level&gt;</i></dt>
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

<dt><b class="scriptdeprec">dev_map</b></dt>
<dd>
Unknown.
</dd>

<dt><b class="scriptdeprec">rank</b></dt>
<dd>
Unknown.
</dd>

<dt><b class="scriptdeprec">reload</b></dt>
<dd>
Unknown.
</dd>

<dt><b class="scriptdeprec">reset</b></dt>
<dd>
Unknown.
</dd>

<dt><b class="scriptdeprec">roll</b></dt>
<dd>
Unknown.
</dd>

<dt><b class="scriptdeprec">weather_report</b></dt>
<dd>
Unknown.
</dd>

<dt><b>special_event</b> <i>&lt;num&gt;</i></dt>
<dd>
Triggers the given special event.  These probably aren't really useful to
custom map editors, but this is what they are regardless. Events marked
with <b>*</b> have hard-coded coordinates, making them difficult to use
outside the map where they originally appear.
<ol>
<li><b>*</b> Baptism in fire effect</li>
<li><b>*</b> Opens the passage through the trees to Baizel's dungeon</li>
<li>Unused. Makes mouse cursor disappear</li>
<li>Unused. Sleep in your own bed from Book II</li>
<li>Destroys the clam container after taking Crux of Terra. Not sure how it's called, though.</li>
<li>Runs after talking to Erubor when leaving Akadai underground, unknown effect</li>
<li>Ulgolek gives you a branch</li>
<li><b>*</b>Undead spawn when you take the crystal in Omentor</li>
<li><b>*</b>Creates/removes path through the lava in Omentor</li>
<li>Drink sparkling divinity</li>
<li><b>*</b>Explosion when you kill Baelgar in Moonrise Underground</li>
<li><b>*</b>Sets the random combination for the Wizardtorium the first time you enter the Oceana Lowlands map</li>
<li>Shows Karamiklan animation</li>
<li>Lucky's gambling mini-game</li>
<li>Daedrotha death trap - 100 damage explosion</li>
<li><b>*</b>Karamiklan breathes fire</li>
<li><b>*</b>Lets you pick a side in the final battle. Depending on your choice, teleports you to a location and spawns final battle NPCs</li>
<li>Xaphus killed, show Malkur win graphic if you sided with him</li>
<li>Malgaelor killed, show Erubor win graphic if you sided with him</li>
<li>Show dialog between Karamiklan, Malkur, and Erubor. Afterward, main display goes blank.</li>
</ol>
</dd>

<dt><b>gfx</b> (<i>&lt;gfx effect&gt;</i>) <i>&lt;coords&gt;</i> <i>&lt;colornum&gt;</i></dt>
<dd>
Launches a fancy graphical effect at the given coordinates.
Coords are usually "0" when used in an entity death script, to denote
the "current tile."  Effects that I've noted in the game, and the associated
<tt>colornum</tt> values for each (not updated for Book III):
<ul class="gfxexample">
<li><tt>Becon</tt><br>
    <img src="b2_gfx_becon.png" alt="Becon Example">
    <div>
    0. Yellow <em>(no discernable change on other numbers)</em>
    </div>
</li>
<li><tt>Colored Smoke</tt><br>
    <img src="b2_gfx_colored_smoke.png" alt="Colored Smoke Example">
    <div>
    0. white<br>
    1. green<br>
    2. yellow/orange<br>
    3. blue<br>
    4. grey<br>
    5. black<br>
    6. white <em>(again)</em><br>
    7. pink
    </div>
</li>
<li><tt>Divine Light</tt><br>
    <img src="b2_gfx_divine_light.png" alt="Divine Light Example">
    <div>
    2. White <em>(the default; other numbers don't seem to change the effect)</em>
    </div>
</li>
<li><tt>Flare</tt><br>
    <img src="b2_gfx_flare.png" alt="Flare Example">
    <div>
    0. <em>(invalid)</em><br>
    1. red<br>
    2. Green<br>
    3. Purplish-White<br>
    4. white
    </div>
</li>
<li><tt>Flare Burst</tt> <em>(very much like <tt>Flare</tt> but rotates more)</em><br>
    <img src="b2_gfx_flare.png" alt="Flare Burst Example">
    <div>
    0. <em>(invalid)</em><br>
    1. red<br>
    2. Green<br>
    3. Purplish-White<br>
    4. white
    </div>
</li>
<li><tt>Gibs</tt><br>
    <img src="b2_gfx_gibs.png" alt="Gibs Example">
    <div>
    0. white<br>
    1. red<br>
    2. green<br>
    3. black
    </div>
</li>
<li><tt>Port</tt><br>
    <img src="b2_gfx_port.png" alt="Port Example">
    <div>
    0. Multicolored <em>(no discernable change on other numbers)</em>
    </div>
</li>
<li><tt>Sparkles</tt><br>
    <img src="b2_gfx_sparkles.png" alt="Sparkles Example">
    <div>
    0. <em>(invalid)</em><br>
    1. Red<br>
    2. Green<br>
    3. Purple<br>
    4. White<br>
    5. Green and Purple<br>
    6. White and Purple<br>
    7. Multicolored
    </div>
</li>
<li><tt>Sparks</tt><br>
    <img src="b2_gfx_sparks.png" alt="Sparks Example">
    <div>
    0. Yellow <em>(no discernable change on other numbers)</em>
    </div>
</li>
</ul>
</dd>

<dt style="clear: left;"><b>msg</b> (<i>&lt;message text&gt;</i>)</dt>
<dd>
Displays the given text in the message pane
</dd>

<dt><b>narrative</b> <i>&lt;narrativenum&gt;</i></dt>
<dd>
Displays the given narrative.  This is accompanied by a little graphical flourish in
the message pane, and a sound effect.
</dd>

<dt><b class="scriptdeprec">kill_narrative</b> <i>&lt;narrativenum&gt;</i></dt>
<dd>
Tells the game engine not to display the given narrative anymore.  Used when a
narrative text would no longer be accurate if triggered.
</dd>

<dt><b>activate_qt</b> <i>&lt;quicktravel num&gt;</i></dt>
<dd>
The player "discovers" the given quicktravel point (this doesn't actually
send the player <em>to</em> the quicktravel point, it just makes that point
clickable).
</dd>

<dt><b>book</b> <i>&lt;booknum&gt;</i></dt>
<dd>
Shows book text (just the text, I don't believe it'll actually teach you
skills, etc)
</dd>

<dt><b>note</b> <i>&lt;booknum&gt;</i></dt>
<dd>
Shows note text - like book, above, but with a different graphic. The
two commands share the same text numbers.
</dd>

<dt><b>destroy_script</b></dt>
<dd>
Destroys this script (one-time use).  Note that if you try to create a one-time
use portal, you'll have to call <tt>destroy_script</tt> <b>before</b> the portal
actually takes place, because otherwise the engine will try to destroy a script
on the <em>new</em> map, not the old one, and will likely crash.
</dd>

<dt><b>commit_crime</b></dt>
<dd>
Area NPCs may notice you committing a crime
</dd>

<dt><b>no_crime</b></dt>
<dd>
Allows access to something which would otherwise be considered a crime.
</dd>

<dt><b class="scriptonly">no_disease</b></dt>
<dd>
Used on a corpse-type container, prevents a random chance of getting a
disease.
</dd>

<dt><b class="scriptdeprec">drama</b></dt>
<dd>
Unknown.  This isn't used at all in Book 2/3, and only once in Book 1 (and
I can't figure out what it does in Book 1 either).  Probably best not to
use it.  The command <em>does</em> still exist in the engine, though.
</dd>

<dt><b class="scriptdeprec">alert_npcs</b></dt>
<dd>
Unknown.  This isn't used at all in Book 2/3, and only once in Book 1 (and
I can't figure out what it does in Book 1 either).  Probably best not to
use it.  The command <em>does</em> still exist in the engine, though.
</dd>

<dt><b>sound</b> (<i>&lt;soundname&gt;</i>)</dt>
<dd>
Plays the specified sound.  The soundfile name might be case-insensitive.
I have seen, for instance, both "<tt>SFX_Quaff</tt>" and "<tt>SFX_quaff</tt>".
Note that the engine will change the pitch somewhat, so consecutive executions
may sound slightly different.  Note that the soundfiles in question live inside
the datapak, so you can't add your own sounds.
The soundfiles that I've seen referenced by the game (not updated for Book III):
<ul>
<li>2_swallow</li>
<li>eat</li>
<li>energy</li>
<li>f_laughter</li>
<li>ghorr</li>
<li>lava_step</li>
<li>mag_door</li>
<li>sfx_energize</li>
<li>sfx_port_up</li>
<li>sfx_positive</li>
<li>SFX_Quaff</li>
<li>SFX_Restore</li>
<li>sfx_weapon_eqp_swd</li>
<li>spirit_awaken</li>
<li>stairs</li>
<li>stone_slide</li>
<li>war_horn</li>
</ul>
</dd>

<dt><b>asfx</b> (<i>&lt;soundname&gt;</i>) <i>&lt;coords&gt;</i></dt>
<dd>
Trigger a sound effect at another location on the map, used to make sounds
which appear to happen in the distance.
</dd>

<dt><b>display</b> (<i>&lt;graphicfile&gt;</i>)</dt>
<dd>
Displays the given graphic file (used primarily for roadsigns).  Note that the
graphic file referenced lives inside the datapak, so you can't add your own graphics.
</dd>

<dt><b>time</b></dt>
<dd>
Display the in-game time (used in chronometers)
</dd>

<dt><b class="scriptonly">fade_in<br>fade_out</b></dt>
<dd>
These do what you'd expect.  Note that the screen will <b>not</b> fade back
in unless you explicitly call <tt>screen_fade_in</tt>, so be careful.
These seem to replace screen_fade_in/screen_fade_out below, although
all four commands are still present in the code.
</dd>

<dt><b class="scriptdeprec">screen_fade_in<br>screen_fade_out</b></dt>
<dd>
These do what you'd expect.  Note that the screen will <b>not</b> fade back
in unless you explicitly call <tt>screen_fade_in</tt>, so be careful.
</dd>

<dt><b class="scriptdeprec">updatezones</b></dt>
<dd>
Unknown.
</dd>

<dt><b class="scriptdeprec">delay</b> <i>&lt;turns&gt;</i></dt>
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

<dt><b class="scriptdeprec">drop_gold</b> <i>&lt;n&gt;</i></dt>
<dd>
Drops a bag with the specified quantity of gold
</dd>

<dt><b>drop_item</b> (<i>&lt;Item Name&gt;</i>) <i>&lt;percent chance&gt;</i></dt>
<dd>
Drops the named item with the specified percent chance.  Percentage
*might* be optional?  Set 100 to have it always happen.
</dd>

<dt><b>drop_loot</b> <i>&lt;lootlevel&gt;</i></dt>
<dd>
Drops loot at the given level.  0 is cheap, 11 is great. Dwarves drop 3,
marauders 4, and skeletons 11.
</dd>

</dl>

</blockquote>

<h3>Only Used in Item Scripts</h3>

<blockquote>

<p>These commands are only found in Item scripts, for when you "Use" them,
and will typically not work outside of that context.</p>

<dl>

<dt><b>convert_item</b> (<i>&lt;new name&gt;</i>)</dt>
<dd>
Renames the item
</dd>

<dt><b class="scriptdiff">learn_skill</b> <i>&lt;skill&gt;</i></dt>
<dd>
Teaches the player the given skill, used in books.  This doesn't seem to
work properly when used outside of a book - a message will display saying that
the player has learned the skill, but the skill value doesn't actually go up,
and shows up in red in the character status screen.  If anyone can find a way
to make it work outside of books, let me know. The skills are:
<ul>
<li>SKILL_ALCHEMY</li>
<li>SKILL_ARCANE_DIVINATION</li>
<li>SKILL_ARCANE_ELEMENTAL</li>
<li>SKILL_ARMOR_LIGHT</li>
<li>SKILL_ARMOR_HEAVY</li>
<li>SKILL_ARMOR_SHIELDS</li>
<li>SKILL_CARTOGRAPHY</li>
<li>SKILL_DODGE</li>
<li>SKILL_FORAGING</li>
<li>SKILL_HIDE_SHADOWS</li>
<li>SKILL_LORE</li>
<li>SKILL_MEDITATION</li>
<li>SKILL_MERCANTILE</li>
<li>SKILL_MOVE_SILENT</li>
<li>SKILL_PICK_LOCKS</li>
<li>SKILL_REPAIR</li>
<li>SKILL_SKULLDUGGERY</li>
<li>SKILL_SPOT_HIDDEN</li>
<li>SKILL_MEDICINE</li>
<li>SKILL_UNARMED_COMBAT</li>
<li>SKILL_WEAPON_BLUDGEONING</li>
<li>SKILL_WEAPON_BOW</li>
<li>SKILL_WEAPON_CLEAVING</li>
<li>SKILL_WEAPON_PIERCING</li>
<li>SKILL_WEAPON_SWORD</li>
<li>SKILL_WEAPON_THROWN</li>
</ul>
</dd>
<dt><b class="scriptdiff">learn_spell</b></dt>
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

<dt><b>drink</b></dt>
<dd>
Used on waterskins
</dd>

</dl>
</blockquote>

<h3>Only Used in Tiles/Squares</h3>

<blockquote>

<p>These commands are found in square/tile scripts,
and don't make much sense outside of that context.</p>

<dl>

<dt><b>toggle_switch</b></dt>
<dd>
Toggle this switch's position.  (Should only be used when there's
a toggle switch.)
</dd>

</dl>
</blockquote>

<? esch_footer(); ?>
