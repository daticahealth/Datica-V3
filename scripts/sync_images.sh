#!/bin/bash
remote_user=forge
remote_server=64.225.37.167

echo "Imma grab the latest batch of images on production okay?"
rsync -avzh $remote_user@$remote_server:/home/forge/datica.ghijkdev.co.uk/public/assets/ public/assets/ --progress
echo
echo "Well, that was simple huh? You now have all the production images"
echo
