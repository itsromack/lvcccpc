<?

function formatTime($timestamp) { 
    if ($timestamp) { 
        return date('jS M Y g:i a', $timestamp); 
    } else { 
        return '-'; 
    } 
} 

function formatDbTime($timestamp) {
    if ($timestamp) {
        return date('Y-m-j H:i:s', $timestamp);
    } else {
        return null;
    }
}
 
function arrayGetVars($array, $params = false) {
    if (!$array) { 
        return array(); 
    } 
    if (!is_array($array)) { 
        throw new InvalidArgumentException('Cannot itterate an object (' . get_class($array) . ') as an array: ' . $array); 
    } 
    $rtn = array(); 
    foreach ($array as $elem) {
        if (!method_exists($elem, 'getVars')) { 
            throw new InvalidArgumentException('Cannot call getVars() on a ' . get_class($elem) . ' instance as the method does not exist'); 
        }
        if (is_array($params)) {
            $rtn[] = call_user_func_array(array($elem, 'getVars'), $params);
        } else {
            $rtn[] = $elem->getVars(); 
        }
    } 
    return $rtn; 
} 
 
function currentURL($includeParams = true) { 
    global $ABS_BASE_URL, $SSL_BASE_URL; 
    if ($_SERVER['HTTPS'] == "on") { 
        $pageURL = $SSL_BASE_URL; 
    } else { 
        $pageURL = $ABS_BASE_URL; 
    } 
    if ($includeParams) { 
        $pageURL .= $_SERVER['REQUEST_URI']; 
    } else { 
        $pageURL .= $_SERVER['DOCUMENT_URI']; 
    } 
    return $pageURL; 
} 

function sanitize($str) {
    return mysql_real_escape_string($str);
}