#!/bin/sh
# index.html is the one file to edit. This copies it to the other two
# places it has to live and rebuilds the WordPress plugin zip.
set -e
cd "$(dirname "$0")"
cp index.html full-dashboard.html
cp index.html wordpress-plugin/city-budget-dashboard/full-dashboard.html
rm -f wordpress-plugin/city-budget-dashboard.zip
(cd wordpress-plugin && zip -qr city-budget-dashboard.zip city-budget-dashboard)
echo "Synced full-dashboard.html, plugin copy, and plugin zip from index.html"
