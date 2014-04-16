#!/usr/bin/perl -w
# vim: set expandtab tabstop=4 shiftwidth=4:

#lrwxrwxrwx  1 pez users     23 Apr  3 15:43 eschalon_b1_utils-current -> eschalon_b1_utils-0.4.1/
#lrwxrwxrwx  1 pez users     30 Apr  3 15:42 eschalon_b1_utils-current.tar.gz -> eschalon_b1_utils-0.4.1.tar.gz
#lrwxrwxrwx  1 pez users     27 Apr  3 15:42 eschalon_b1_utils-current.zip -> eschalon_b1_utils-0.4.1.zip


use strict;
my $ver = shift;
if (!$ver or $ver eq '')
{
    die "need a version";
}
my $winver = $ver;
$winver =~ s/\./_/g;

chdir 'dist';
system('rm', 'eschalon_utils-current');
#system('rm', 'eschalon_utils-current.tar.gz');
#system('rm', 'eschalon_utils-current.zip');
#system('rm', 'eschalon_utils_current_setup.exe');
system('ln', '-s', 'eschalon_utils-' . $ver, 'eschalon_utils-current');
#system('ln', '-s', 'eschalon_utils-' . $ver . '.tar.gz', 'eschalon_utils-current.tar.gz');
#system('ln', '-s', 'eschalon_utils-' . $ver . '.zip', 'eschalon_utils-current.zip');
#system('ln', '-s', 'eschalon_utils_' . $winver . '_setup.exe', 'eschalon_utils_current_setup.exe');
