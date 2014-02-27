if [ "$1" = "uat" ]
then 
     DESTINATION="http://uat.seacademy.in.th/"   
elif [ "$1" = "prod" ] 
then 
     DESTINATION="http://www.seacademy.in.th/"
else
     echo "wrong command"
fi

xvfb-run ./gradlew clean test -PbaseUrl=$DESTINATION
