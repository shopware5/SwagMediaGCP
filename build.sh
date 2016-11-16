#!/bin/bash

lastTag=$(git tag | tail -n 1)
customTag=$1

if [ "$customTag" != "" ]; then lastTag=$customTag; fi
if [ "$lastTag" = "" ]; then lastTag="master"; fi

rm -f SwagMediaGCP-${lastTag}.zip
rm -rf SwagMediaGCP
mkdir -p SwagMediaGCP
git archive $lastTag | tar -x -C SwagMediaGCP

cd SwagMediaGCP
composer install --no-dev -n -o
cd ../
zip -r SwagMediaGCP-${lastTag}.zip SwagMediaGCP
rm -r SwagMediaGCP
