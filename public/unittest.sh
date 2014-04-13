## setting deployment folder permission for Yii framework
##  writable "runtime&assets" folder
chmod -R 777 ./protected/runtime
chmod -R 777 ./assets
cd /protected/tests
##  run phpunit
phpunit unit/SiteControllerTest.php