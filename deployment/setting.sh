## intial destination
if [ "$1" = "uat" ]
then 
     DESTINATION="varokas_thsea-uat@ssh.phx.nearlyfreespeech.net"   
elif [ "$1" = "prod" ] 
then 
     DESTINATION="varokas_thsea@ssh.phx.nearlyfreespeech.net"
else
     echo "wrong command"
fi

## setting deployment folder permission for Yii framework
##  writable "runtime&assets" folder
ssh -i /home/thsea/.ssh/id_rsa $DESTINATION "chmod -R 777 ./protected/runtime"
ssh -i /home/thsea/.ssh/id_rsa $DESTINATION "chmod -R 777 ./assets"
##  Change group for WEB user
ssh -i /home/thsea/.ssh/id_rsa $DESTINATION "chgrp -R web *"