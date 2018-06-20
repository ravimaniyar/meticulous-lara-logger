# meticulous-lara-logger
The meticulous logger repository promises to log Laravel application info, notices, debugs, errors, warnings, critical, alert and emergency messages in detailed manner; by year, by month, by day and by type.

Step #1:
    Add custom index into config/logging.php file.
    
Step #2:
    Set LOG_CHANNEL in env file as custom.

Step #3: 
    Create app/logging directory and create MeticulousLogger.php and MeticulousLoggerHandler.php files as created in the source.
    
Step #4:
    Run command composer dump-autoload and you can use logging in your Laravel application use class Log as usual. Note that inside, storage/app/ a logs folder will be created and log files will be generated based on year, month, day and type.

Hop in, in case of any issues/enhancements!
