<? // vim: set expandtab tabstop=4 shiftwidth=4: ?>
<?
require_once('common.php');
esch_header();
?>

<p>
<a href="screenshots.php"><img src="smallscreen.png" alt="Character Editor Screenshots"></a>
&nbsp; &nbsp;
<a href="screenshots_map.php"><img src="smallmap.jpg" alt="Map Editor Screenshots"></a>
</p>

<h3>About</h3>
<blockquote>
<p>This package is a collection of applications which let you edit your
character and maps in savegames of
<a href="http://basiliskgames.com/eschalon-book-i">Eschalon Book I</a>,
<a href="http://basiliskgames.com/eschalon-book-ii">Eschalon Book II</a>,
and <a href="http://basiliskgames.com/eschalon-book-iii">Eschalon Book III</a>
by <a href="http://basiliskgames.com/">Basilisk Games</a>.</p>
<p>Right now it supports the editing of just about everything you'd want to edit, though
there's still plenty of values in the file of whose purpose I'm unaware.
See the <a href="dist/eschalon_utils-current/TODO.txt">TODO file</a> for
information on what needs to be done with the app
still, which is quite a bit.  The
<a href="dist/eschalon_utils-current/README.txt">README file</a> should be
pretty informative as well.  The app is released under the
<a href="http://www.gnu.org/licenses/gpl-2.0.txt">GNU GPL 2.0</a>.</p>

<p>The apps were developed on Linux, and they use Python 2, GTK+, Cairo, and
PyGTK to do its stuff.  It works on Windows and Mac OS X as well.</p>

<p>
<strong>Sourcecode, Bug Tracker:</strong> <a href="https://github.com/apocalyptech/eschalon_utils">Github</a><br>
<span class="smalltext">(Full sourcecode is also included in the zip/tgz archives)</span>
</p>

<p>The Eschalon Savefile Editor used to utilize a
<a href="https://sourceforge.net/projects/eschalonutils/">project page on
Sourceforge.net</a> as its primary file distribution endpoint, but that
page has been effectively shut down now.</p>

</blockquote>

<h3>Disclaimer</h3>

<blockquote>
<p>The app seems stable enough for me, but use your head and keep a backup of
any files that you use this on.  Note that most map files have an associated
file with a ".ent" extension which would need to be backed up as well.
Let me know if anything ends up
eating your files, because I'd like to fix any bugs which may exist.
Just don't get upset
if it does.  :)  This application should be considered beta software still.</p>

<p>Also, and this should go without saying, this app will certainly allow
you to construct character files and maps which Eschalon never intended to
have in-place.  Be aware that if you go crazy with the settings, you
could very well end up with a file that Eschalon can't deal with, or
which has subtle effects on the gameplay which may not be immediately
apparent.</p>
</blockquote>

<h3>Content</h3>

<blockquote>
<p>This editor is on track to become "officially endorsed" by Basilisk
Games as the tool to use for mod creation in Eschalon Book III.
<a href="http://basiliskgames.com/forums/viewtopic.php?f=34&t=9243">This
forum post</a> details the current state of mod support in Book III version
1.02.  Right now all the released mods for Books II and III are distributed
in a "savegame" format, where you start a new game and then copy the mod
files into your save slot.  The officially-supported modding mechanism will
involve using "global" map files put into a "mods" directory - see the forum
post for more information about that.</p>
<p>If you end up creating new maps for Eschalon, please do the right
thing and respect
<a href="http://basiliskgames.com/forums/viewtopic.php?p=35684#p35684">Basilisk Games' wishes</a> in regards to custom content:</p>
<ol>
<li>You cannot sell what you make; it must be free.</li>
<li>If you put your content up for download anywhere other than
    <a href="http://basiliskgames.com/forums">the official Basilisk Games
    forums</a>, you need to have a link that jumps back to the
    <a href="http://basiliskgames.com/eschalon-book-i">Book I</a>,
    <a href="http://basiliskgames.com/eschalon-book-ii">Book II</a>,
    or <a href="http://basiliskgames.com/eschalon-book-iii">Book III</a>
    pages, as appropriate.</li>
</ol>
</blockquote>

<h3>Download</h3>

<blockquote>
<p><a href="dist/eschalon_utils-current/ChangeLog.txt">ChangeLog</a></p>
<ul>
<?php esch_show_current_release(); ?>
</ul>
</blockquote>

<h3>Known Eschalon Mods</h3>

<blockquote>
<p><strong>Book I</strong></p>
<ul>
<li><a href="http://basiliskgames.com/forums/viewtopic.php?f=3&t=4461">Thaermore Revisited</a>, by Jedi_Learner</li>
<li><a href="http://basiliskgames.com/forums/viewtopic.php?f=3&t=4439">Elderhollow Rebuilt</a>, by King_ov_Death <em>(unfortunately there are no actual
downloads available for this mod, though there are some nice-looking
screenshots)</em></li>
<li><a href="http://basiliskgames.com/forums/viewtopic.php?f=3&t=5434">Raver Dave's Book I Mod</a>, by raverdave2k</li>
</ul>
<p><strong>Book II</strong></p>
<ul>
<li><a href="http://basiliskgames.com/forums/viewtopic.php?f=12&t=5449">Port Kuudad Tower</a>, by raverdave2k</li>
<li><a href="http://basiliskgames.com/forums/viewtopic.php?f=12&t=5470">Treasure of the Orakur</a>, by raverdave2k</li>
</ul>
<p><strong>Book III</strong></p>
<ul>
<li><a href="http://www.basiliskgames.com/forums/viewtopic.php?f=34&t=9211">The Mystery of Rockhammer Mine</a>, by MyGameCompany</li>
<li><a href="http://www.basiliskgames.com/forums/viewtopic.php?f=34&t=9015">Alchemist's Tower in Moonrise</a>, by Weird Heather</li>
<li><a href="http://www.basiliskgames.com/forums/viewtopic.php?f=34&t=9263">Small Dungeons - Rockhammer</a>, by Weird Heather</li>
<li><a href="http://www.basiliskgames.com/forums/viewtopic.php?f=34&t=9289">Expedition into West Mirkland</a>, by MyGameCompany</li>
<li><a href="http://www.basiliskgames.com/forums/viewtopic.php?f=34&t=9333">The Sanctum</a>, by SpottedShroom</li>
</ul>
</blockquote>

<h3>Related</h3>

<blockquote>
<p>
<a href="http://www.oriontransfer.co.nz/">Orion Transfer</a> (specifically
Samuel Williams and Hermann Gundel) created a Book 1 character editor for OSX called
<a href="http://www.oriontransfer.co.nz/software/goblin-hacker/index">Goblin Hacker</a>,
which looks real nice, and from a visual perspective, at least, puts my
app to shame.  &lt;smile&gt;
</p>
</blockquote>

<h3>Contact</h3>

<blockquote>
<p>
Feel free to email me at <a href="mailto:pez@apocalyptech.com?subject=Eschalon Book 1 Utilities">pez@apocalyptech.com</a>
 if you've got questions or concerns.  I'm also logged in to
<a href="http://freenode.net/irc_servers.shtml">irc.freenode.net</a>
as the user "sekhmet" if you'd prefer that.
Alternatively, <a href="http://basiliskgames.com/forums/viewtopic.php?f=34&amp;t=9276">here's a thread at the Basilisk Forums</a> which I watch.
</p>
</blockquote>

<? esch_footer(); ?>
