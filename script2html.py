#!/usr/bin/python
# vim: set expandtab tabstop=4 shiftwidth=4:

df = open('eschalon2-scripting.txt', 'r')
first = True
print '<dl>'
for line in df.readlines():
    line = line.strip().replace('<', '&lt;').replace('>', '&gt;')
    line = line.replace('&lt;', '<i>&lt;').replace('&gt;', '&gt;</i>')
    if first:
        first = False
        tokens = line.split(' ')
        tokens[0] = '<b>%s</b>' % (tokens[0])
        line = "<dt>%s</dt>\n<dd>" % (' '.join(tokens))
    if line == '':
        first = True
        line = "</dd>\n"
    print line
print '</dd>'
print '</dl>'
