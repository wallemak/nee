<?php 




$e_data = ['old'=>reset($old),'new'=>$data];
$e_det = ['old'=>$old_det,'new'=>$det];
$user = \App::make(\App\Http\Controllers\API\BasicController::class);
$user_name = \App::call([$user,'getAdmin'])->username;
$e_data['username'] = $user_name;


$user = \App::make(\App\Http\Controllers\API\BasicController::class);
$user_name = \App::call([$user,'getAdmin'])->username;

$e_det = ['old'=>$old_det,'new'=>$det];
event(new Stock_LogEvent($e_data,$e_det));

implements ShouldQueue


php artisan make:model Models/User


php artisan queue:table 
php artisan queue:work
php artisan queue:work --queue=emails

D:\php\PHPTutorial\WWW

'queue' => env('REDIS_QUEUE', 'default'),
'block_for' => null,

redis-server.exe redis.conf
redis-server.exe redis.windows.conf 
redis-server --service-install redis.windows-service.conf --loglevel verbose
redis-server --service-start
redis-server --service-stop
redis-server --service-uninstall
redis-cli.exe -h 127.0.0.1 -p 6379

composer update maatwebsite/excel
composer dumpautoload

php artisan queue:work --queue:

php artisan make:migration create_admin_table

php artisan make:auth

php artisan make:middleware AdminLogin

composer create-project topthink/think tp5
composer create-project laravel/laravel laravelapp --prefer-dist
composer create-project --prefer-dist yiisoft/yii2-app-advanced yii


php artisan make:controller PhotoController --resource



PHP think make:Controller admin/index


php think version //版本号 



.\bin\emqttd console


mqtt:

mosquitto -c mosquitto.conf //运行
mosquitto_passwd -c pwfile.example testuser //设置用户名



bin>mysqld install mysql2 --default-file="D:\php\PHPTutorial\WWW\mysql2\my.ini"

mycat:
startup_nowrap.bat //启动

 GRANT REPLICATION SLAVE ON *.* to 'back'@'%' identified by '123123';
 FLUSH PRIVILEGES;

 CHANGE MASTER TO MASTER_HOST='127.0.0.1',MASTER_PORT=3306,MASTER_USER='back',MASTER_PASSWORD='123123',MASTER_LOG_FILE='mysql-bin.000001',MASTER_LOG_POS=324;







 

