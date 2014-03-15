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

<p>The apps were developed on Linux, and they use Python, GTK+, Cairo, and
PyGTK to do its stuff.  It works on Windows and Mac OS X as well.</p>

<p>
<strong>Project Page:</strong> <a href="https://sourceforge.net/projects/eschalonutils/">Sourceforge</a><br>
<strong>Sourcecode:</strong> <a href="https://github.com/apocalyptech/eschalon_utils">Github</a>
<span class="smalltext">(Full sourcecode is also included in the zip/tgz archives)</span>
</p>
</blockquote>

<h3>A Note about Book III Support</h3>

<blockquote>
<p>Thanks to Elliot Kendall/SpottedShroom, and of course the wonder that
is Github,
<a href="http://basiliskgames.com/forums/viewtopic.php?f=26&t=8963">Book
III support is available via some unofficial packages on the Basilisk Games
forums</a>.  I've been merging these changes into the project's 
<a href="https://github.com/apocalyptech/eschalon_utils">github repository</a>,
though it will probably be into March before I can get out an official release.
These changes do include some updated build instructions for OSX, so Mac
users might be particularly interested in it.  Anyway, look
for official support for Book III within the coming weeks, and for now enjoy
the unofficial packages!  <em>(Last update on this page: Feb 20, 2014)</em></p>
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
<p>If you end up creating new maps for Eschalon, please do the right
thing and respect
<a href="http://basiliskgames.com/forums/viewtopic.php?p=35684#p35684">Basilisk Games' wishes</a> in regards to custom content:</p>
<ol>
<li>You cannot sell what you make; it must be free.</li>
<li>If you put your content up for download anywhere other than
    <a href="http://basiliskgames.com/forums">the official Basilisk Games
    forums</a>, you need to have a link that jumps back to the
    <a href="http://basiliskgames.com/eschalon-book-i">Book I page</a> (or
    presumably the <a href="http://basiliskgames.com/eschalon-book-ii">
    Book II</a> or <a href="http://basiliskgames.com/eschalon-book-iii">Book
    III</a> pages for mods to those games).</li>
</ol>
</blockquote>

<h3>Download</h3>

<!--
Hm, I believe these should all be taken care of.
<span class="smalltext"><a href="usage.php#issues">Known Issues</a></span>
-->

<blockquote>
<p><a href="http://dx4.org/eschalon_utils/eschalon_utils_setup.exe">Unofficial pre-release (Windows)</a></p>

<p><a href="http://dx4.org/eschalon_utils/Eschalon%20Utils.dmg">Unofficial pre-release (Mac OS X)</a></p>

<p><a href="dist/eschalon_utils-0.8.1/ChangeLog.txt">ChangeLog</a></p>
<strong>Current:</strong>
<ul>
<? esch_rel('0.8.1', 'February 6, 2012', true); ?>
</ul>
<p>
<strong>Previous Versions:</strong>
<ul>
<? esch_rel('0.8.0', 'February 6, 2012'); ?>
<? esch_rel('0.7.5', 'August 24, 2010'); ?>
<? esch_rel('0.7.4', 'August 23, 2010'); ?>
<? esch_rel('0.7.3', 'August 23, 2010'); ?>
<? esch_rel('0.7.2', 'August 20, 2010'); ?>
<? esch_rel('0.7.1', 'August 17, 2010'); ?>
<? esch_rel('0.7.0', 'August 16, 2010'); ?>
<? esch_rel('0.6.3', 'July 9, 2010'); ?>
<? esch_rel('0.6.2', 'July 1, 2010'); ?>
<? esch_rel('0.6.1', 'June 14, 2010'); ?>
<? esch_rel('0.6.0', 'June 12, 2010'); ?>
<? esch_rel('0.5.0', 'May 31, 2010', false, true); ?>
<? esch_rel_old('0.4.2', 'April 3, 2009'); ?>
<? esch_rel_old('0.4.1', 'April 3, 2009'); ?>
<? esch_rel_old('0.4.0', 'March 21, 2009'); ?>
<? esch_rel_old('0.3.1', 'February 19, 2009'); ?>
<? esch_rel_old('0.3.0', 'October 29, 2008',  'char'); ?>
<li>v0.2.0 - <a href="http://sourceforge.net/projects/eschalonutils/files/eschalon_utils_0.2.0/eschalon_b1_char-0.2.0.tgz/download">tgz</a> <span class="smalltext">(Unix/Mac/Win)</span> - August 21, 2008</li>
<li>v0.1.0 - August 21, 2008</li>
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
<li><a href="http://www.basiliskgames.com/forums/viewtopic.php?f=26&t=9211">The Mystery of Rockhammer Mine</a>, by MyGameCompany</li>
<li><a href="http://www.basiliskgames.com/forums/viewtopic.php?f=26&t=9015">Alchemist's Tower in Moonrise</a>, by Weird Heather</li>
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
Alternatively, <a href="http://basiliskgames.com/forums/viewtopic.php?f=3&amp;t=1809">here's a thread at the Basilisk Forums</a> which I watch.
</p>
</blockquote>

<? esch_footer(); ?>
