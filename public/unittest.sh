## setting deployment folder permission for Yii framework
##  writable "runtime&assets" folder
chmod -R 777 ./protected/runtime
chmod -R 777 ./assets
##  run phpunit
./protected/tests phpunit unit/SiteControllerTest.php