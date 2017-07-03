<? // vim: set expandtab tabstop=4 shiftwidth=4: ?>
<?
require_once('common.php');
$page->set_title('Installation');
$page->apoc_header();
?>

<h2>General Installation Notes</h2>

<blockquote>
<p>First off, if you're on Windows or Mac OS X, just go ahead and download
the EXE or DMG version.  That's all that you need to download, and you can
safely ignore the rest of this page.</p>
<p>For other systems, or if you want to run the
source directly in Windows/OS X, you'll need: <a href="http://www.gtk.org/">gtk+</a>,
<a href="http://python.org/">Python 2</a>,
<a href="http://cairographics.org/">Cairo</a>/<a href="http://cairographics.org/pycairo/">PyCairo</a>, and
<a href="http://www.pygtk.org/">PyGTK</a>.
For Linux users, these are certainly available from your distribution, and
may already be installed.  Use your distro's package manager to install
these, if they're not already.  OS X users can get these from <a
href="http://brew.sh/">homebrew or <a
href="http://www.macports.org/">MacPorts</a>, and/or install them with <a
href="http://www.pip-installer.org">pip</a> or <a
href="http://peak.telecommunity.com/DevCenter/EasyInstall">easy_install</a>.
</p>

<p><strong>A note on the Book 2/3 Map Editors:</strong> The Book 2/3 map editors
require two additional packages: <a href="http://www.dlitz.net/software/pycrypto/">PyCrypto</a>
and <a href="http://pypi.python.org/pypi/czipfile">czipfile</a>.  PyCrypto
may be installed by default (its package name tends to be <tt>python-crypto</tt>
on most distributions, though Gentoo packages it as <tt>pycrypto</tt>).
czipfile is probably <b>not</b> installed by default.  The quickest way to
get that installed is either through <tt>easy_install</tt> or <tt>pip</tt>,
like so:</p>
<pre>$ sudo easy_install czipfile</pre>
<p>or</p>
<pre>$ sudo pip install czipfile</pre>
<p>
Once again, if you're using the Windows or Mac packages, none of this should
concern you.
</p>

<p>A stand-alone package is provided (as of 0.5.0) for Windows and (as of
1.0) for OS X, but for other platforms there are no installers.  On UNIX
(and any other system you can convince it to run on) the app is meant to be
basically just run from wherever you unzipped it or untarred it, or by
setting up a symlink somewhere, or creating a shortcut in your desktop
environment of choice.</p>

<p>The map editor component of this package requires that an Eschalon install
directory be present on your system.  The application will try to locate it
on its own, but if the installation directory isn't found, you'll be
prompted to provide the location.  The character editor can also use the
Eschalon game directory to do image lookups of its own, but it doesn't
actually require the directory to be present.</p>

<p>Both the map editor and the character editor have a preferences screen (the
preferences are shared between programs)
where the game directory can be set, in addition to your savefile
directory (which the program will also try to auto-detect).  The savefile
directory is just used as the directory the "Open" dialog will
default to.</p>

</blockquote>

<h2>Linux Specifics</h2>

<blockquote>
<p>What I'd recommend is just leaving it untarred wherever you untarred it, and make
a symlink to the utilities into somewhere in
your <tt>$PATH</tt> (<tt>~/bin</tt> is probably the best location).  For example:</p>

<pre>$ cd ~/bin
$ ln -s /path/to/eschalon_b1_char.py .
$ ln -s /path/to/eschalon_b1_map.py .
$ ln -s /path/to/eschalon_b2_char.py .
$ ln -s /path/to/eschalon_b2_map.py .
$ ln -s /path/to/eschalon_b3_char.py .
$ ln -s /path/to/eschalon_b3_map.py .</pre>

<p>At that point you should be able to just run "<tt>eschalon_b1_char.py</tt>" from the
command prompt, for instance.  Setting up shortcuts through your window
manager of choice should work fine, as well.  Failing that, just run them
from the directory you untarred them into.</p>

<p>As of 0.5.0, the minimum gtk+ required MIGHT be 2.18.0, though you may have
success with earlier versions.  If there are problems with older versions,
please let me know so I can take a look and possibly get a workaround
in place.  The app will show a warning if your gtk+ doesn't meet this
requirement, but allow you to continue regardless.</p>

</blockquote>

<h2>Windows Specifics</h2>

<blockquote>

<p>Starting with 0.5.0, I've provided an EXE which should install the
application with a standard installer, which will leave you with a shortcut
to both applications in your start menu.  This is the recommended way
to run the application on Windows.</p>

<p>If you're using the EXE version and receive the error <b>"This application
has failed to start because the application configuration is incorrect.
Reinstalling the application may fix this problem,"</b> and you're running
Windows XP, then you'll probably need to do one of two things.  That error appears
to only happen on XP Service Pack 2, so upgrading to SP3 will probably take care of
it.  Alternatively, you'll need to install the Visual C++ Redistributable from
Microsoft.  There's various versions of that software; I'm not sure whether you'd
want to install the 2008 version or the 2010 version (there's also a 2005 version,
though I assume that might be too old).  If anyone wants to let me know
if it matters at all, I'd appreciate it.  The relevant links are here:</p>

<ul>
<li><a href="http://www.microsoft.com/downloads/en/details.aspx?FamilyID=a5c84275-3b97-4ab7-a40d-3802b2af5fc2">32-bit 2008 SP1</a></li>
<li><a href="http://www.microsoft.com/downloads/en/details.aspx?FamilyID=ba9257ca-337f-4b40-8c14-157cfdffee4e">64-bit 2008 SP 1</a></li>
<li><a href="http://www.microsoft.com/downloads/en/details.aspx?FamilyID=a7b7a05e-6de6-4d3a-a423-37bf0912db84">32-bit 2010</a></li>
<li><a href="http://www.microsoft.com/downloads/en/details.aspx?FamilyID=bd512d9e-43c8-4655-81bf-9350143d5867">64-bit 2010</a></li>
</ul>

<p>If you prefer, you can continue
to run the Python source directly, which will require the following support packages
to be installed:</p>

<ul>
<li><strong><a href="http://python.org/download/">Python</a></strong> <span class="smalltext">Recommended as of 2012.02.05: <a href="http://python.org/ftp/python/2.7.2/python-2.7.2.msi">2.7.2</a></span><br>
<p></li>
<li><strong><a href="http://www.pygtk.org/downloads.html">PyGTK</a></strong>
<span class="smalltext">Recommended as of 2012.02.05: <a href="http://ftp.gnome.org/pub/GNOME/binaries/win32/pygtk/2.24/pygtk-all-in-one-2.24.1.win32-py2.7.msi">2.24.1 All-In-One Installer</a> - note that the all-in-one installers remove the previous need to manually install gtk+ and the three main PyGTK components.
<p>And, for the Book 2/3 Map Editors:</p>
</li>
<li><strong><a href="http://www.dlitz.net/software/pycrypto/">PyCrypto</a></strong> <span class="smalltext">Recommended as of 2012.02.05: <a href="http://www.voidspace.org.uk/downloads/pycrypto-2.3.win32-py2.7.zip">2.3, from voidspace.org.uk</a></span></li>
<li><strong><a href="http://pypi.python.org/pypi/czipfile">czipfile</a></strong> <span class="smalltext">Recommended as of 2012.02.05: <a href="http://pypi.python.org/packages/2.7/c/czipfile/czipfile-1.0.0.win32-py2.7.exe">1.0.0</a></span></li>
</ul>
<p>Once those dependencies are installed, you should be able to just
double-click on <tt>eschalon_b1_char.py</tt> or <tt>eschalon_b1_map.py</tt> (or their
Book 2 equivalents, from wherever you unzipped the archive),
and it'll open up an "Open" dialog.</p>
</blockquote>

<h2>OS X Specifics</h2>

<blockquote>
<a name="osx"></a>
<p>Starting with 1.0, I've provided an DMG disk image with a bundled
stand-alone application. This is the recommended way
to run the application on Mac OS X.</p>
<p>
Here is how I set up the current OS X testing/build environment:
</p>
<ol class="spacedol">
<li>Install <a href="http://brew.sh/">Homebrew</a>. (This requires <a href="http://developer.apple.com/tools/xcode/">XCode</a>,
which might not be installed by default, and apparently might cost you $5,
if you're not part of Apple's developer program.)<br></li>
<li>Run the following commands in the "Terminal" application:<br>
<pre>$ brew install pygtk
$ sudo easy_install czipfile
$ sudo easy_install pycrypto</pre>
</li>
<li>Go to the directory where you put the program source, and run the
editor of your choice like any other command line application.
<pre>$ ./eschalon_b3_map.py</pre>
</li>
</ol>
<p>
Here is an older set of instructions that also worked for some people:
</p>
<ol class="spacedol">
<li>Install <a href="http://www.macports.org/install.php">MacPorts</a>.
(This requires <a href="http://developer.apple.com/tools/xcode/">XCode</a>,
which might not be installed by default, and apparently might cost you $5,
if you're not part of Apple's developer program.) <br></li>
<li>Run the following commands in the "Terminal" application:<br>
<pre>$ sudo port -v selfupdate
$ sudo port install py26-gtk
$ sudo port install py26-crypto
$ sudo port install python_select
$ sudo port select python python26</pre>
<!--$ sudo python_select python26</pre>-->
Apparently the <tt>py26-gtk</tt> install may take a very long time, on
the order of 30-45 minutes.  So be patient!  You might get more progress
information if you launch them as "<tt>sudo port -v install</tt>" instead
of without the <tt>-v</tt>.
</li>
<li>If you want to edit Book 2 Map files, you'll probably want to try installing
czipfile; see the General Installation Notes section at the top of this page for
a couple of commands you could try to accomplish that.</li>
<li>Then, to run the app, you can probably just browse to wherever you unpacked
the archive and double-click on the program you want, or just launch it from
Terminal as if it were any other CLI application.</li>
</ol>

<p>If you run into an error during the py26-gtk installation like
"<tt>Error: Failed to install xorg-renderproto</tt>", apparently you may need
to run this command:
<pre>$ sudo port -f uninstall render</pre></p>

</blockquote>

<? $page->apoc_footer(); ?>
