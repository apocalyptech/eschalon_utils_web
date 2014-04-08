<? // vim: set expandtab tabstop=4 shiftwidth=4: ?>
<?

$links = array(
    array('index.php', 'Main'),
    array('download.php', 'Download'),
    array('installation.php', 'Installation'),
    array('usage.php', 'Usage'),
    array('map.php', 'Map/Script Information'),
    array('screenshots.php', 'Screenshots (character)'),
    array('screenshots_map.php', 'Screenshots (maps)')
);

$sublinks = array(
    'map.php' => array(
        array('b1scripting.php', 'Book 1 Scripting'),
        array('b2scripting.php', 'Book 2 Scripting'),
        array('b3scripting.php', 'Book 3 Scripting')
    )
);

// Construct a somewhat-reversed array so we know if we're a subpage of something
$revsublinks = array();
foreach ($sublinks as $mainlink => $sublinkitems)
{
    foreach ($sublinkitems as $sublinkitem)
    {
        $revsublinks[$sublinkitem[0]] = $mainlink;
    }
}

function pagelinks(&$drawingsubs)
{
    global $links;
    global $sublinks;
    global $revsublinks;
    $drawingsubs = false;
    $dirs = explode('/', $_SERVER['SCRIPT_NAME']);
    $curfile = $dirs[count($dirs)-1];
    $linkarr = array();
    foreach ($links as $link)
    {
        $file = $link[0];
        $title = $link[1];

        $subhtml = array();
        $subhtml[] = '<span style="position: relative">';
        if ($curfile == $file)
        {
            $subhtml[] = $title;
        }
        else
        {
            $subhtml[] = '<a href="' . $file . '">' . $title . '</a>';
        }

        // TOOD: Should we just show the subcategories all the time?
        $linkref = '';
        if ($curfile == $file and array_key_exists($curfile, $sublinks))
        {
            $linkref = $curfile;
        }
        elseif (array_key_exists($curfile, $revsublinks) and ($revsublinks[$curfile] == $file))
        {
            $linkref = $file;
        }

        if ($linkref != '')
        {
            $drawingsubs = true;
            $subhtml[] = '<span class="sublinks">';
            foreach ($sublinks[$linkref] as $sublink)
            {
                if ($curfile == $sublink[0])
                {
                    $subhtml[] = $sublink[1] . '<br>';
                }
                else
                {
                    $subhtml[] = '<a href="' . $sublink[0] . '">' . $sublink[1] . '</a><br>';
                }
            }
            $subhtml[] = '</span>';
        }

        $subhtml[] = '</span>';

        $linkarr[] = implode("\n", $subhtml);
    }
    return implode(" |\n", $linkarr);
}

function esch_header($title='', $extrahead='', $extrabody='')
{
    $drawingsubs = false;
    $shorttitle = 'Eschalon Savefile Editor';
    $fulltitle = $shorttitle;
    if ($title != '')
    {
        $fulltitle .= ' - ' . $title;
    }
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
 <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<title><?=$fulltitle?></title>
<link rel="stylesheet" type="text/css" media="all" href="style.css">
<?=$extrahead?>
</head>
<body>
<table border="0" cellpadding=".3em">
<tr>
<td><img src="dist/eschalon_utils-current/data/eb1_icon_64.png" alt=""></td>
<td>
<h2><?=$shorttitle?></h2>
<span class="linkblock"><?= pagelinks($drawingsubs) ?></span>
</td>
</tr>
</table>
    <?
    if ($drawingsubs)
    {
        print '<p class="spacer">&nbsp;</p>';
    }
    else
    {
        print '<p></p>';
    }
    if ($title != '')
    {
        print '<h2>' . $title . '</h2>';
    }
}

function esch_footer()
{
	print '</body></html>';
}

function print_sums($sums)
{
    printf("<blockquote class=\"checksums\">\n");
    printf("sha1sum: <tt>%s</tt><br>\n", $sums[0]);
    printf("sha256sum: <tt>%s</tt><br>\n", $sums[1]);
    printf("</blockquote>\n");
}

function esch_rel_2014($ver, $date,
    $tgz_sums=null,
    $zip_sums=null,
    $exe_sums=null,
    $dmg_sums=null,
    $current=false)
{
    $exe_ver = str_replace('.', '_', $ver);
    if (!$current)
    {
        printf('<li>');
    }
    printf("<p><b>%s</b> - released %s</p>\n", $ver, $date);
    printf("<blockquote>\n");
    if (!is_null($exe_sums))
    {
        printf("Windows EXE: <a href=\"http://sourceforge.net/projects/eschalonutils/files/eschalon_utils_%s/eschalon_utils_%s_setup.exe/download\">eschalon_utils_%s_setup.exe</a><br>", $ver, $exe_ver, $exe_ver);
        print_sums($exe_sums);
    }
    if (!is_null($tgz_sums))
    {
        printf("Unix/Mac/Source (tgz): <a href=\"http://sourceforge.net/projects/eschalonutils/files/eschalon_utils_%s/eschalon_utils-%s.tar.gz/download\">eschalon_utils-%s.tar.gz</a>", $ver, $ver, $ver);
        print_sums($tgz_sums);
    }
    if (!is_null($dmg_sums))
    {
        printf("OSX (dmg): <a href=\"http://sourceforge.net/projects/eschalonutils/files/eschalon_utils_%s/Eschalon%%20Utils%%20%s.dmg/download\">Eschalon Utils %s.dmg</a>", $ver, $ver, $ver);
        print_sums($dmg_sums);
    }
    if (!is_null($zip_sums))
    {
        printf("Other (zipfile): <a href=\"http://sourceforge.net/projects/eschalonutils/files/eschalon_utils_%s/eschalon_utils-%s.zip/download\">eschalon_utils-%s.zip</a> ", $ver, $ver, $ver);
        print_sums($zip_sums);
    }
    if ($current)
    {
        ?>
        <span class="smalltext">
        <strong>Note:</strong> The tgz and zip versions of the Book 2 Map Editor requires a couple extra packages to
        work, see the <a href="http://apocalyptech.com/eschalon/installation.php">Installation</a> page for more info.
        The Windows EXE is unaffected, as are the character editors, and Book 1 map editing.
        </span>
        <?
    }
    printf("</blockquote>\n");
    if (!$current)
    {
        printf("</li>\n");
    }
}

function esch_rel($ver, $date, $warning=false, $b1_only=false)
{
    if ($b1_only)
    {
        $extratext = "_b1";
    }
    else
    {
        $extratext = "";
    }
    $exe_ver = str_replace('.', '_', $ver);
    printf("<li>v%s - \n", $ver);
    printf("    <a href=\"http://sourceforge.net/projects/eschalonutils/files/eschalon_utils_%s/eschalon%s_utils-%s.tar.gz/download\">tgz</a>", $ver, $extratext, $ver);
    printf("/<a href=\"http://sourceforge.net/projects/eschalonutils/files/eschalon_utils_%s/eschalon%s_utils-%s.zip/download\">zip</a> ", $ver, $extratext, $ver);
    printf("<span class=\"smalltext\">(Unix/Mac/Source)</span> - \n");
    printf("    <a href=\"http://sourceforge.net/projects/eschalonutils/files/eschalon_utils_%s/eschalon%s_utils_%s_setup.exe/download\">exe</a> ", $ver, $extratext, $exe_ver);
    printf("<span class=\"smalltext\">(Win)</span> - %s<br>\n", $date);
    if ($warning)
    {
        ?>
        <span class="smalltext">
        <strong>Note:</strong> The tgz and zip versions of the Book 2 Map Editor requires a couple extra packages to
        work, see the <a href="http://apocalyptech.com/eschalon/installation.php">Installation</a> page for more info.
        The Windows EXE is unaffected, as are the character editors, and Book 1 map editing.
        </span>
        <?
    }
    printf("</li>\n");
}

function esch_rel_old($ver, $date, $progname='utils')
{
    if ($progname == 'utils')
    {
        $ext = 'tar.gz';
    }
    else
    {
        $ext = 'tgz';
    }
    printf("<li>v%s - \n", $ver);
    printf("    <a href=\"http://sourceforge.net/projects/eschalonutils/files/eschalon_utils_%s/eschalon_b1_%s-%s.%s/download\">tgz</a> ", $ver, $progname, $ver, $ext);
    printf("<span class=\"smalltext\">(Unix/Mac)</span> - \n");
    printf("<a href=\"http://sourceforge.net/projects/eschalonutils/files/eschalon_utils_%s/eschalon_b1_%s-%s.zip/download\">zip</a> ", $ver, $progname, $ver);
    printf("<span class=\"smalltext\">(Win)</span> - \n");
    printf("%s\n", $date);
    printf("</li>\n");
}

?>
