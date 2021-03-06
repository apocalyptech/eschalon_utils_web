<?php // vim: set expandtab tabstop=4 shiftwidth=4:

require_once('../inc/apoc.php');
$page->set_base_title('Eschalon Savefile Editor');
$page->use_base_title_in_page_only = true;
$page->set_app_menu(new MenuItem('/eschalon/', 'Root', array(
    new MenuItem(NULL, 'Main'),
    new MenuItem('download.php', 'Download'),
    new MenuItem('installation.php', 'Installation'),
    new MenuItem('usage.php', 'Usage'),
    new MenuItem('map.php', 'Map/Script Information', array(
        new MenuItem('b1scripting.php', 'Book 1 Scripting'),
        new MenuItem('b2scripting.php', 'Book 2 Scripting'),
        new MenuItem('b3scripting.php', 'Book 3 Scripting'),
    )),
    new MenuItem('screenshots.php', 'Screenshots (character)'),
    new MenuItem('screenshots_map.php', 'Screenshots (maps)')
)));
$page->add_css('style.css');
$page->set_header_icon('dist/eschalon_utils-current/data/eb1_icon_64.png');

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
    if ($current)
    {
        printf("<p><b>%s</b> - released %s</p>\n", $ver, $date);
    }
    else
    {
        printf('<li>');
        printf("<p>v%s - released %s</p>\n", $ver, $date);
    }
    printf("<blockquote>\n");
    if (!is_null($exe_sums))
    {
        printf("Windows EXE: <a href=\"dist/eschalon_utils_%s_setup.exe\">eschalon_utils_%s_setup.exe</a> (<a href=\"https://apocalyptech.com/eschalon/dist/eschalon_utils_%s_setup.exe.asc\">sig</a>)<br>", $exe_ver, $exe_ver, $exe_ver);
        if ($current) { print_sums($exe_sums); }
    }
    if (!is_null($tgz_sums))
    {
        printf("Linux/Source (tgz): <a href=\"dist/eschalon_utils-%s.tar.gz\">eschalon_utils-%s.tar.gz</a> (<a href=\"https://apocalyptech.com/eschalon/dist/eschalon_utils-%s.tar.gz.asc\">sig</a>)<br>", $ver, $ver, $ver);
        if ($current) { print_sums($tgz_sums); }
    }
    if (!is_null($dmg_sums))
    {
        printf("OSX (dmg): <a href=\"dist/Eschalon%%20Utils%%20%s.dmg\">Eschalon Utils %s.dmg</a> (<a href=\"https://apocalyptech.com/eschalon/dist/Eschalon%%20Utils%%20%s.dmg.asc\">sig</a>)<br>", $ver, $ver, $ver);
        if ($current) { print_sums($dmg_sums); }
    }
    if (!is_null($zip_sums))
    {
        printf("Other (zipfile): <a href=\"dist/eschalon_utils-%s.zip\">eschalon_utils-%s.zip</a> (<a href=\"https://apocalyptech.com/eschalon/dist/eschalon_utils-%s.zip.asc\">sig</a>)<br>", $ver, $ver, $ver);
        if ($current) { print_sums($zip_sums); }
    }
    printf("Signed sha256 checksums: <a href=\"https://apocalyptech.com/eschalon/dist/eschalon_utils-%s-sha256sum.txt.asc\">eschalon_utils-%s-sha256sum.txt.asc</a><br>", $ver, $ver, $ver, $ver);
    if ($current)
    {
        ?>
        <span class="smalltext"><p><i>(Releases signed by
        <a href="http://pgp.mit.edu/pks/lookup?op=vindex&search=0x7737E0EBB4ABC956">B4ABC956</a>)</i></p>
        <p><strong>Note:</strong> The tgz and zip versions of the Book 2 Map Editor requires a couple extra packages to
        work, see the <a href="https://apocalyptech.com/eschalon/installation.php">Installation</a> page for more info.
        The Windows EXE is unaffected, as are the character editors, and Book 1 map editing.</p>
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
    printf("    <a href=\"dist/eschalon%s_utils-%s.tar.gz\">tgz</a>", $extratext, $ver);
    printf("/<a href=\"dist/eschalon%s_utils-%s.zip\">zip</a> ", $extratext, $ver);
    printf("<span class=\"smalltext\">(Unix/Mac/Source)</span> - \n");
    printf("    <a href=\"dist/eschalon%s_utils_%s_setup.exe\">exe</a> ", $extratext, $exe_ver);
    printf("<span class=\"smalltext\">(Win)</span> - %s<br>\n", $date);
    if ($warning)
    {
        ?>
        <span class="smalltext">
        <strong>Note:</strong> The tgz and zip versions of the Book 2 Map Editor requires a couple extra packages to
        work, see the <a href="https://apocalyptech.com/eschalon/installation.php">Installation</a> page for more info.
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
    printf("    <a href=\"dist/eschalon_b1_%s-%s.%s\">tgz</a> ", $progname, $ver, $ext);
    printf("<span class=\"smalltext\">(Unix/Mac)</span> - \n");
    printf("<a href=\"dist/eschalon_b1_%s-%s.zip\">zip</a> ", $progname, $ver);
    printf("<span class=\"smalltext\">(Win)</span> - \n");
    printf("%s\n", $date);
    printf("</li>\n");
}

function esch_show_current_release()
{
    esch_rel_2014('1.0.1', 'April 15, 2014',
        array('886d07e95d1ac42bb654542c9dbcb880e58d0fea',
          '25209e14b903699bdbdcfe7c66d823feaa861b0142a802d8ca9bd61018f9e090'),
        array('ef51fd9b487988d6739a6e4d7f86f975cc2616d4',
          'f6f0896c2a3824cd079f64fba37781c39f3afb845c723bf0a1ca00ebb00c8d73'),
        array('ddd3225b4ddcc5e601bb46cf1223ad2ab5c66c27',
          'fe5b2ce7cc191b87f0b637320c87eb3efaae9d8cd72efe7abac28002176869e8'),
        array('fd183f64835b9741ea69cf62b3cc1d035804044a',
          '66bbae2c526314e29704448e5ad97c730bd227572eedc97aeedf10f7d84decaf'),
        true);
}

function esch_show_previous_releases()
{
    print "<ul>\n";
    esch_rel_2014('1.0.0', 'April 2, 2014',
        array('0ead5d5e2157080f6b22e40477d3649dc6a1a836',
          'ef2708ae78ae8786bfc648b3b20234f97546bd3236749780a5622eff68e28105'),
        array('acd0861500b4b61131240063f8a9c327cb69064f',
          'edc759b9eebd3e6660d40e02abbab82152d95306c181047b9614547ae56b6c13'),
        array('ef5df32c1e891c11b8c223b60404b392e8cf9b16',
          'b4a361b360acc77992f5ceb0fdd39244a4573578a825de357d71410f64159f73'),
        array('187aabc5277e3472346fdc0bbfa34bb27e841627',
          '466658a73173f12f8e02d5ed67de04c37e639fc6527941b0d1787ed9f961a902'),
        false);
    esch_rel('0.8.1', 'February 6, 2012');
    esch_rel('0.8.0', 'February 6, 2012');
    esch_rel('0.7.5', 'August 24, 2010');
    esch_rel('0.7.4', 'August 23, 2010');
    esch_rel('0.7.3', 'August 23, 2010');
    esch_rel('0.7.2', 'August 20, 2010');
    esch_rel('0.7.1', 'August 17, 2010');
    esch_rel('0.7.0', 'August 16, 2010');
    esch_rel('0.6.3', 'July 9, 2010');
    esch_rel('0.6.2', 'July 1, 2010');
    esch_rel('0.6.1', 'June 14, 2010');
    esch_rel('0.6.0', 'June 12, 2010');
    esch_rel('0.5.0', 'May 31, 2010', false, true);
    esch_rel_old('0.4.2', 'April 3, 2009');
    esch_rel_old('0.4.1', 'April 3, 2009');
    esch_rel_old('0.4.0', 'March 21, 2009');
    esch_rel_old('0.3.1', 'February 19, 2009');
    esch_rel_old('0.3.0', 'October 29, 2008',  'char');
    ?>
    <li>v0.2.0 - <a href="dist/eschalon_b1_char-0.2.0.tgz">tgz</a> <span class="smalltext">(Unix/Mac/Win)</span> - August 21, 2008</li>
    <li>v0.1.0 - August 21, 2008</li>
    </ul>
    <?php
}

