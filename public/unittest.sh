## setting deployment folder permission for Yii framework
##  writable "runtime&assets" folder
chmod -R 777 ./protected/runtime
chmod -R 777 ./assets
chmod -R 777 ./protected/tests
##  run phpunit
./protected/tests phpunit unit/SiteControllerTest.php