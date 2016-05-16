<?php
 
class Logger {
 
protected $fh;
 
public function __construct() {
$this->fh = fopen('xuylog.txt', 'a+');
}
 
public function log($msg) {
if(!$this->fh) {
throw new Exception('Unable to open log file for writing');
}
if(fwrite($this->fh, $msg . "\n") === false) {
throw new Exception('Unable to write to log file.');
}
}
 
public function __destruct() {
fclose($this->fh);
}
}
 
$logger = new Logger();
$logger->log(date('m-d-Y H:i:s') . ' ' . $_SERVER['REMOTE_ADDR']);
$logger->log('$_POST: ' . print_r($_POST, true));
$logger->log('$_GET: ' . print_r($_GET, true));
$logger->log('$_FILES: ' . print_r($_FILES, true));
?>
751431f0