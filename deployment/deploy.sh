## intial destination
if [ "$1" = "uat" ]
then
     DESTINATION="varokas_thsea-uat@ssh.phx.nearlyfreespeech.net:/home/public/"
elif [ "$1" = "prod" ]
then
     DESTINATION="varokas_thsea@ssh.phx.nearlyfreespeech.net:/home/public/"
else
     echo "wrong command"
fi

## intial CI tool build path
BUILDPATH="$2""/public/*"

## deploy by rsync
rsync -e "ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no -i /home/thsea/.ssh/id_rsa" -vramlHP --exclude '*.log' --exclude 'protected/config/db.php' --exclude 'protected/config/test.php' --numeric-ids --delete --delete-after --delay-updates $BUILDPATH $DESTINATION
scp -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no -i /home/thsea/.ssh/id_rsa "$2""/public/.htaccess" $DESTINATION
