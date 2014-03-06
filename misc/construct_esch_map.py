#!/usr/bin/python

# Constructs a composite map from all *.opq files living in the
# current directory.  Works for Eschalon Books 1 and 2
#
# For example, with the utility somewhere in your $PATH:
# 
#   $ cd ~/.basilisk_games/book2_saved_games/slot2
#   $ construct_esch_map.py
#   Found 26 files, width: 9, height: 5
#   Wrote to whole_map.png, exiting

import os
import re
import sys
import cairo

outfile = 'whole_map.png';

max_x = 0
min_x = 99
max_y = 0
min_y = 99
files = {}
initfile = None

map1re = re.compile('^(\d)(\d)\.opq$', re.IGNORECASE)
map2re = re.compile('^(\d{2})(\d{2})\.opq$', re.IGNORECASE)
for file in os.listdir('.'):
    if (os.path.isfile(file)):
        matches = map2re.match(file)
        if matches:
            x = int(matches.groups()[0])
            y = int(matches.groups()[1])
        else:
            matches = map1re.match(file)
            if matches:
                x = int(matches.groups()[1])
                y = int(matches.groups()[0])
        if matches:
            if (x > max_x):
                max_x = x
            if (x < min_x):
                min_x = x
            if (y > max_y):
                max_y = y
            if (y < min_y):
                min_y = y
            files[file] = (x, y)
            initfile = file

if len(files) == 0:
    print "No valid files found!"
    sys.exit(0)

width = max_x - min_x + 1
height = max_y - min_y + 1

print 'Found %d files, width: %d, height: %d' % (len(files), width, height)

# Get our individual width/height
surf = cairo.ImageSurface.create_from_png(initfile)
ind_width = surf.get_width()
ind_height = surf.get_height()

# Create our output surf/ctx
mainsurf = cairo.ImageSurface(cairo.FORMAT_ARGB32, ind_width * width, ind_height * height)
mainctx = cairo.Context(mainsurf)
mainctx.set_source_rgba(1, 1, 1, 1)
mainctx.paint()

# Now loop through and put everything in place
for (file, (x, y)) in files.items():
    x -= min_x
    y -= min_y

    # Draw a border around the individual maps
    surf = cairo.ImageSurface.create_from_png(file)
    ctx = cairo.Context(surf)
    ctx.set_line_width(1)
    ctx.set_source_rgba(.7, .7, .7, 1)
    ctx.rectangle(0, 0, ind_width, ind_height)
    ctx.stroke()

    # ... and then put them in place
    mainctx.set_source_surface(surf, x*ind_width, y*ind_height)
    mainctx.rectangle(x*ind_width, y*ind_height, ind_width, ind_height)
    mainctx.fill()

mainsurf.write_to_png(outfile)
print 'Wrote to %s, exiting' % (outfile)
