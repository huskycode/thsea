## setting deployment folder permission for Yii framework
##  writable "runtime&assets" folder
chmod -R 777 ./protected/runtime
chmod -R 777 ./assets

## run testdb migration
cd protected
php yiic migrate up --connectionID=testdb --interactive=0

##  run phpunit
cd tests
phpunit unit