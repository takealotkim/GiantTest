<?php
include ('Result.php');  
include ('ResultDao.php'); 
include ('MathUtil.php'); 


class GiantTest{

    private $file;
    private $out;
    private $_resultsDao;
    function __construct($file, $out){
        $this->file = $file;
        $this->out = $out;
        $this->_resultsDao = new ResultDao();
    }

    function go(){
    	
    	$input = fopen( $this->file, "r" );
    	$output = fopen( $this->out, "w" );
        
    	while(!feof($input)) {
            $line = fgets($input);
            try{
                $parts = explode ( ":" , $line , PHP_INT_MAX );
                $operation = $parts[0];
                $operands = $parts[1];
                $list = explode ( "," , $operands, PHP_INT_MAX );
                $result = MathUtil::doOperation($operation, $list);
                date_default_timezone_set('Africa/Johannesburg');
                $date = date("Y-m-d H:i:s");     
                $obj = new Result($operation, $result, $date);
                // save to DB:
                $this->_resultsDao->create($obj);
                // write to file:
                $txt = $operation . ',' . $result . ',' . $date . "\n";
                fwrite($output, $txt);

            }catch(Exception $e){
                echo("An error occurred during processing line: " . $line . ". " . $e->getMessage() . "\n");
            }  	   
        }
    }
}
