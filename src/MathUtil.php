<?php

class MathUtil{
	
static function doOperation($operation, $list){

    	switch ($operation) {
        case "min":
            return min($list);
            break;
        case "max":
            return max($list);
            break;
        case "avg":
            return self::avg($list);
            break;
        case "sum":
            return array_sum($list);
            break;
        case "p90":
            return self::p90($list);
            break;
        default:
            throw Exception("unknown operation: " . $operation);
        }
    }

    static function p90($list){
    	sort($list);
    	$index = ceil(0.9 * count($list));
    	return $list[$index - 1];
    }

    static function avg($list){
    	if(count($list)==0)
           return 0;
	    return array_sum($list)/count($list);
    }
}

?>