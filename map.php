<? // vim: set expandtab tabstop=4 shiftwidth=4: ?>
<?
require_once('common.php');
esch_header('Map/Script Information');
?>

<p>Some of how Eschalon's map files are used may not be immediately
obvious, so I figure I'll enumerate some points here.</p>

<h3>General Information</h3>

<blockquote>
<p>Eschalon keeps all its global maps in the "data" directory of the
folder where it was installed, in Book 1, or in the main "datapak" for
Book 2/3.  Once your character enters a new map,
the game engine loads in that global map file and from that point on
only uses that new copy of the map, which is the version that's saved
in your savegame folder when you save the game.  The format of the
global map files and the savegame map files is slightly different, in
the following two ways:</p>

<ol>
<li><p>For entities, the global map files only specify 
the type of creature, its facing direction, and a script to execute when
the entity is killed.  Savegame maps add in a number of other values
such as  entity friendliness (NPCs are set to "1", monsters to "0"),
health level, and a few other values.</p></li>
<li><p>For containers like chests and bags, the global map files
only specify a single string for the item contents.  The savegame map
files specify a full item structure for each slot.</p></li>
</ol>

<p>Because of these differences, our utility won't let you save a global
map file as a savegame map file, and vice-versa.  If you load in a global
map file, it will remain one when you save it.  You can see what kind of
map you've loaded from inside the "Map Properties" dialog (also the
path shown in the bottom status bar will probably be informative enough).</p>

<p><strong>Important note for editing Book 1 maps:</strong> In the Map
Properties screen there's a "Map ID" field which wasn't editable until
version 0.7.2 of the editor.  If you're making a "new" map by starting with
an existing one and saving with a new name, note that this value <em>must</em>
be the same as the filename of the map (minus the ".map" extension), otherwise
Eschalon won't save the state of the map properly in savegames, and might
actually overwrite the state of the map that you copied from, which could
certainly be undesirable.  So be careful about that.  Book 2/3 doesn't have
the Map ID embedded, so it's not an issue there.</p>

<p>The map names for the main "outside" area of Eschalon are named with
a two-digit number for Book 1, and a four-digit number for Book 2/3,
which correspond to where the map is placed.  In Book 1, the first
digit is the y-coordinate (or row), and the second is the x-coordinate (or
column).  In Book 2/3, the first two digits are the x-coordinate, and the second
two are the y-coordinate.  The first map your character starts out in is
<tt>35.map</tt> in Book 1, and <tt>5050.map</tt> in Book 2/3.  The various dungeon level
names are, for the most part, pretty obvious.  For reference, here are the outside
map names:
<table>
<tr>
<th>Book 1</th>
<th>Book 2</th>
<th>Book 3</th>
</tr>
<tr>
<td valign="top">
<ul>
<li><strong>14</strong> - Barrier Range Region</li>
<li><strong>15</strong> - Northeast Thaermore</li>
<li><strong>22</strong> - Vela</li>
<li><strong>23</strong> - Baron's Thicket</li>
<li><strong>24</strong> - Northern Tangletree Forest</li>
<li><strong>25</strong> - North Parish</li>
<li><strong>32</strong> - Blackwater Region</li>
<li><strong>33</strong> - Western Tanglewood</li>
<li><strong>34</strong> - Central Tangletree Forest</li>
<li><strong>35</strong> - South Parish</li>
<li><strong>41</strong> - Rotwood</li>
<li><strong>42</strong> - Northern Crakamir</li>
<li><strong>43</strong> - Northeastern Crakamir</li>
<li><strong>44</strong> - Western Salted Coast</li>
<li><strong>45</strong> - Eastern Salted Coast</li>
<li><strong>51</strong> - Western Crakamir</li>
<li><strong>52</strong> - Eastern Crakamir</li>
<li><strong>53</strong> - The Gulf of Madria</li>
</ul>
</td>
<td valign="top">
<ul>
<li><strong>4447</strong> - Hammerlorne Mountain</li>
<li><strong>4547</strong> - Durnore Region</li>
<li><strong>4647</strong> - Northern Hellice Lake</li>
<li><strong>4648</strong> - Western Hellice Lake</li>
<li><strong>4747</strong> - Northeastern Hellice Lake</li>
<li><strong>4748</strong> - Raven's Gate West Entrance</li>
<li><strong>4848</strong> - Raven's Gate, East Entrance</li>
<li><strong>4849</strong> - Yoma River Headwater</li>
<li><strong>4850</strong> - Eastern Sylphwood Forest</li>
<li><strong>4851</strong> - Northern Harpoon Bay</li>
<li><strong>4858</strong> - Picaroon Isle</li>
<li><strong>4947</strong> - Cape Sorrow</li>
<li><strong>4948</strong> - Fellpine Forest</li>
<li><strong>4949</strong> - Western Kessian Basin</li>
<li><strong>4950</strong> - Greenriven Lake</li>
<li><strong>4957</strong> - Hallows of Abigor</li>
<li><strong>4958</strong> - Brimstone Lava Fields</li>
<li><strong>4959</strong> - Thundersun Grazelands</li>
<li><strong>4960</strong> - Southern Thundersun Grazeland</li>
<li><strong>5047</strong> - Broken Blade</li>
<li><strong>5048</strong> - Eastern Fellpine Forest</li>
<li><strong>5049</strong> - Wolfenwood</li>
<li><strong>5050</strong> - Yoma River Valley</li>
<li><strong>5051</strong> - Yoma Narrows</li>
<li><strong>5059</strong> - Ghar-gha River</li>
<li><strong>5060</strong> - Talushorn</li>
<li><strong>5147</strong> - Mistfell Northen Coast</li>
<li><strong>5148</strong> - Northwest Kessian Basin</li>
<li><strong>5149</strong> - Central Farrock Range</li>
<li><strong>5150</strong> - Southern Kessian Basin</li>
<li><strong>5247</strong> - The Forsaken Coast</li>
<li><strong>5248</strong> - Port Kuudad</li>
<li><strong>5249</strong> - Northern Farrock Range</li>
</ul>
</td>
<td valign="top">
<ul>
<li><strong>4849</strong> - Moonrise</li>
<li><strong>4850</strong> - Baasilt Dunes</li>
<li><strong>4948</strong> - Western Astral Range</li>
<li><strong>4949</strong> - Elderoak Forest</li>
<li><strong>4950</strong> - Southern Boglands</li>
<li><strong>5047</strong> - Alundar's Domain</li>
<li><strong>5048</strong> - Warlord's Pass</li>
<li><strong>5049</strong> - Valley of the Wanderer</li>
<li><strong>5050</strong> - Rockhammer</li>
<li><strong>5051</strong> - Deadman's Strand</li>
<li><strong>5052</strong> - Mirkland</li>
<li><strong>5148</strong> - Eastern Astral Range</li>
<li><strong>5149</strong> - Macross Point</li>
<li><strong>5150</strong> - Oceana Lowlands</li>
<li><strong>5151</strong> - Castle by the Sea</li>
<li><strong>5152</strong> - East Mirkland Delta</li>
</ul>
</td>
</tr>
</table>
</blockquote>

<h3>Tile Info</h3>

<blockquote>
<p>There's not much to say about the basic tile attributes, actually.
There's one unknown value in the "Main Attributes"
tab, but I believe it's always been zero for every tile I've ever loaded
in.</p>
<p>In Book 1, there are two kinds of walls: ones that you can see through
(gravestones, for instance), and ones you can't.  Book 2 added another
kind of wall which restricts player movement around the wall.  For instance,
the player at this position in Eastwillow can't move directly North:</p>
<div style="text-align: center;"><img src="barrier_restrict_1.png" alt="North Movement Restricted"></div>
<p>If the player attempts to move North, he'll be shifted off Northeast, instead,
like so:</p>
<div style="text-align: center;"><img src="barrier_restrict_2.png" alt="North Movement Restricted"></div>
<p>The wall graphic shown there is the most common one to feature this type
of restricted-movement wall.</p>
</blockquote>

<h3>Entity Info</h3>

<blockquote>
<p>As mentioned above, if you're editing a global map file, you'll
only be able to edit entity type, orientation, and a post-death script.
Savegame files will have extra information like friendliness and health,
and a few other values.  For the most part, I recommend leaving those other
values alone.  Two of them I've never seen set to anything other than zero,
one appears to get set automatically by the game engine regardless of what
you had in there, and the other seems to be either 1 or 0, but I've yet to
find any pattern for it.</p>
<p>One value found in a savegame file is the initial starting location of
the entity, which I believe entities will gravitate towards if they're not
attacking you.  The map
editor will populate this automatically when you add a new entity.</p>
<p>The "Friendly?" flag is zero for enemies, 1 for NPCs, and 2 for NPCs who
are attacking you (having witnessed you commit a crime, for instance).</p>
<p>As I mention on the Entity tab itself, there are a few NPCs who can ONLY
face North.  If you add one of these facing any other direction, or something
in the game causes them to turn, Eschalon will crash.  So be careful about
that.</p>
<p>Entities added with zero health are "stuck" on the board and can't
be attacked, so make sure to give new entities at least 1 health, if you're
adding to savegame files.</p>
</blockquote>

<h3>Object Info</h3>

<blockquote>
<p>I used to call these "scripts," and internally my code still refers to
them as such, but "object" makes much more sense as a name.</p>
<p>There are actually two related values here: an Object Type and
an actual Object.  Most object types require an associated object to be
defined, and some don't.</p>
<p><strong>Book 1 Object Type List</strong></p>
<blockquote>
<p>Here's a list of the types which do require an object:</p>
<ul>
<li><strong>1</strong> - Containers with no open/close difference <em>(open barrels, hives, spider egg sacs, coffins, etc)</em></li>
<li><strong>2</strong> - Corpse Containers <em>(chance of disease when examining)</em></li>
<li><strong>3</strong> - Containers with open/close differences <em>(chests, dressers, etc)</em></li>
<li><strong>4</strong> - There's just one single cabinet in the entire game which uses this, in <tt>25_crypt</tt>.  It'd be best to not use this value</li>
<li><strong>5</strong> - Doors</li>
<li><strong>6</strong> - Map Links <em>(for cave exits, etc)</em></li>
<li><strong>7</strong> - Wells, Levers, and other misc items</li>
<li><strong>9</strong> - Signs which highlight wall decals <em>(plaques, bookcases, etc)</em></li>
<li><strong>10</strong> - Signs which highlight walls <em>(signs, gravestones, etc)</em></li>
<li><strong>11</strong> - Sealed Barrels</li>
<li><strong>12</strong> - Miscellaneous Scripts</li>
<li><strong>13</strong> - Sconces</li>
<li><strong>14</strong> - Traps / Teleporters / Other Tile-triggered scripts</li>
<li><strong>15</strong> - Blackpowder Kegs</li>
</ul>
<p>And then there are some object types which do <strong>not</strong>
require an associated object:</p>
<ul>
<li><strong>25</strong> - Light Source <em>(note that the light produced is actually quite weak)</em></li>
<li><strong>30</strong> - Inn Sound Generator</li>
<li><strong>31</strong> - Church Sound Generator <em>(chanting)</em></li>
<li><strong>32</strong> - Windy Rift Sound Generator</li>
<li><strong>33</strong> - Running Water Sound Generator</li>
<li><strong>34</strong> - Magic Shop Sound Generator</li>
<li><strong>35</strong> - Blacksmith Sound Generator</li>
<li><strong>36</strong> - Woodland Sound Generator</li>
<li><strong>37</strong> - Crowd Sound Generator</li>
<li><strong>38</strong> - Waterfall Sound Generator</li>
</ul>
</blockquote>
<p><strong>Book 2 Object Type List</strong></p>
<blockquote>
<p>In nearly every case, Book 2 Object Types will <strong>always</strong> have
an associated object, even for the sound and light generators.  The one exception
seems to be that sometimes a "Zapper" (electric field) won't have an object, though
sometimes they do.
<ul>
<li><strong>1</strong> - Containers with no open/close difference <em>(open barrels, etc)</em></li>
<li><strong>2</strong> - Containers with open/close differences <em>(chests, dressers, etc)</em></li>
<li><strong>3</strong> - <em>(broken container type, don't use this one)</em></li>
<li><strong>4</strong> - Bag Containers</li>
<li><strong>5</strong> - Doors</li>
<li><strong>6</strong> - Map Links <em>(for cave exits, etc)</em></li>
<li><strong>7</strong> - Clickable Actions (Levers, and other misc items)</li>
<li><strong>8</strong> - Entrance to Thieves' Arcadia <em>(Only used that once)</em></li>
<li><strong>9</strong> - Signs which highlight wall decals <em>(plaques, bookcases, etc)</em></li>
<li><strong>10</strong> - Signs which highlight walls <em>(signs, gravestones, etc)</em></li>
<li><strong>11</strong> - Sealed Barrels</li>
<li><strong>12</strong> - Sconces</li>
<li><strong>13</strong> - Area Event <em>(triggered by proximity)</em></li>
<li><strong>14</strong> - Traps / Teleporters / Other Tile-triggered scripts</li>
<li><strong>15</strong> - Powder Kegs</li>
<li><strong>16</strong> - Well</li>
<li><strong>17</strong> - Archery Target</li>
<li><strong>18</strong> - Nests / Computer Terminals</li>
<li><strong>19</strong> - Zapper <em>(electric field)</em></li>
<li><strong>21</strong> - "Huge" Graphics <em>(Hammerlorne Entrance, Docked Ships, etc)</em></li>
<li><strong>25</strong> - Light Source <em>(white)</em></li>
<li><strong>26</strong> - Light Source <em>(red)</em></li>
<li><strong>27</strong> - Light Source <em>(green)</em></li>
<li><strong>28</strong> - Light Source <em>(blue)</em></li>
<li><strong>29</strong> - Light Source <em>(yellow)</em></li>
<li><strong>30</strong> - Sound Generator <em>(Inn)</em></li>
<li><strong>31</strong> - Sound Generator <em>(Church)</em></li>
<li><strong>32</strong> - Sound Generator <em>(Cold Wind)</em></li>
<li><strong>33</strong> - Sound Generator <em>(Dripping Water)</em></li>
<li><strong>34</strong> - Sound Generator <em>(Bubbling Water)</em></li>
<li><strong>35</strong> - Sound Generator <em>(River)</em></li>
<li><strong>36</strong> - Sound Generator <em>(Magic Shop)</em></li>
<li><strong>37</strong> - Sound Generator <em>(Blacksmith)</em></li>
<li><strong>38</strong> - Sound Generator <em>(Swamp Insects)</em></li>
<li><strong>39</strong> - Sound Generator <em>(Busy Street)</em></li>
<li><strong>40</strong> - Sound Generator <em>(Waterfall)</em></li>
<li><strong>41</strong> - Sound Generator <em>(Wind, with Tapping)</em></li>
<li><strong>42</strong> - Sound Generator <em>(Wind)</em></li>
<li><strong>43</strong> - Sound Generator <em>(Swimming Water)</em></li>
<li><strong>44</strong> - Sound Generator <em>(Electric Field)</em></li>
<li><strong>45</strong> - Sound Generator <em>(Electric Throbbing)</em></li>
<li><strong>50</strong> - Breakable Wall</li>
</ul>
</blockquote>
<p>It's worth noting that there is <strong>no</strong> instance within the
game of a tile having an object but no Object Type defined, so bear that in
mind.</p>
<p>It's also worth noting that there are three times (over the span of every single
map in Eschalon) where a tile has two objects defined.  In each case, it
looks like the game engine is only recognizing one of the two, so I'm
guessing that their presence is just a mistake.</p>
<p>For Object Type 6 <em>(Map Links)</em> in Book 1, the main "Description" field
on the Object will be the name of the map to link to, and the "Extra Text"
field is the coordinate within the map that the player will be sent to.  In Book 2,
the linking is handled just within the script, usually as
"<tt>map_port (mapname) coords ; areacheck</tt>".</p>
<p>I mention coordinates there, and you'll also see coordinates mentioned
occasionally in various objects' script text.  The game has
a somewhat odd notation - the coordinate pair (56, 129) would become "12956".
The coordinate pair (3, 40) would become "4003".  It's a bit counterintuitive
but it does work well since the x coordinate can be at most 99.</p>
<p>In Book 2, an object type of 21 is a "Huge" graphic, such as the main
(impassable) Hammerlorne Entrance, and the docked ships.  It's also used for
a couple smaller images like wagons.  Note that on these tiles, the wall type
<strong>must</strong> be set to 1000, and the "Extra Text" section in the
Object will be the filename of the graphic to load (which must reside inside
the datapak).</p>
<p>If the "Lock Level" on a container or door is set to zero, then the
container isn't locked.  Lock levels work a little differently between books
1 and 2.  In Book 1, a Lock Level of 1 is the weakest lock, and a Lock
Level of 60 is the highest encountered in the game (the door behind Gramuk
at the end of the game), though very few locks in the game get above 30.  The
special lock value of "99" denotes that it's a slider lock.  The next field
after "Lock Level" on the GUI will store the slider lock combination, and
otherwise will be a value from zero to three.  I still haven't figured out
what that value means when the lock isn't a slider lock.  In Book 2, locks
have a difficulty from 1 to 10, and if the lock level is set to 12, then
it will be a slider lock.</p>
<p>In Book 1, the "Destructible" flag will determine whether or not the player can
destroy the object, which is typically only used on chests, doors, and barrels.  The
"sturdiness" field determines how strong the object is, and seems to just be
the starting percentage of "health" that the object starts out with.  Almost
all objects in the game start with a sturdiness of 89.  In Book 2, there's
a much more sensible Current and Max "HP" for the object, if it's destructible.</p>
<p>Book 2 has two extra properties in Objects: Loot Level and "On-Empty."  Loot
Level runs from zero to ten, and notes how good the loot inside the container is,
for randomly-generated contents.  This is the field which gets used for the slider
lock combination.  "On-Empty" defines what happens when the container is emptied
of its contents.  For most containers this is zero, but bags tend to have 1 in here,
which denotes that they will disappear once empty.  A few other containers have
other values, such as the Dragonel nest, Brimstone Spider nest, and computer
terminals.</p>
<p>The "contents" section is actually somewhat interesting.  As mentioned
above, global maps just specify a string.  When the map is saved out in
a savegame, the file includes a whole Item structure (including things like
weight, cost, special abilities, etc).  Until a container is actually opened,
though, the only field which is populated in that whole structure is the
name.  Once the user opens the container for the first time, the game
engine populates the rest of the item attributes based on the name.  That's
why you'll see buttons like the one seen in the "Tile Editing - Scripts"
section of the <a href="screenshots_map.php#scripts">map screenshots page</a>.
Note that the special name "Random" is used to randomly fill up a container.
The "Random" keyword will possibly fill up more than one item, as well,
so containers which specify Random shouldn't have anything but the one 
"Random" item.  A similar "Empty" keyword is defined for Book 2, as well.</p>
</blockquote>

<? esch_footer(); ?>
