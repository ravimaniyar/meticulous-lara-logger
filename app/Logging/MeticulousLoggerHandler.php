<?php
namespace App\Logging;

use GuzzleHttp\Client;
use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;
use Log;
use Storage;
use Carbon\Carbon;

class MeticulousLoggerHandler extends AbstractProcessingHandler
{

    public function __construct($level = Logger::DEBUG, $bubble = true, $client = null)
    {
        parent::__construct($level, $bubble);
    }

    public function write(array $record)
    {
        $logDatetime = Carbon :: instance($record['datetime']);
        $directoryPath = "logs/" . $logDatetime -> year . "/" . $logDatetime -> month . "/" . $logDatetime -> day;
        
        if(!Storage :: exists($directoryPath)) {
            Storage :: makeDirectory($directoryPath, 0775, true);
        }
        
        $fileName = $directoryPath . "/" . strtolower($record['level_name']) . ".log";
        $context = collect($record['context']) -> toJson();
        
        $log = $logDatetime -> format("H:i:s") . "\n" . $record['message'] . "\n" . $context . "\n" . str_repeat("-", 75) . "\n";
        
        Storage :: append($fileName, $log);

    }
}
