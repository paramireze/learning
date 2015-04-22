<?php
// assume common.php is already included

/*
name: do_pdo_query()
description:
	run the specified query, binding query parameters if provided
parameters:
	$db 					- pdo object
	$query        - static sql query string || query 		string with named parameter markers(e.g. ":variable")
	$query_params - [optional] required if $query contains any parameter markers. Associative array with keys that match the parameter markers in $query (of the form [':variable'])
return:
	PDOStatement containing the executed query, die() and log error on failure
*/
if (!function_exists('do_pdo_query')) {
	function do_pdo_query($db, $query, $query_params = NULL) {
		// no query parameters
		if (empty($query_params)) {
		  $stmt = $db->query($query);
			if (!$stmt) {
				$log_msg = 'problem executing query "' . $query . '".';
			  r_error($log_msg, $log_msg);
			}
		}
		// parameterized query
		else {
			try {
			  $stmt = $db->prepare($query);
        if ($stmt == NULL) {
          r_error('couldn\'t prepare query: ' . $query,'');
        }
        foreach ($query_params as $key => $value) {
          // $stmt->bindValue($key, $value);
		  $stmt->bindValue($key, isset($value) ? $value : null);
        }
        
				$result = $stmt->execute();
			}
			catch (Exception $e) {
			  $log_msg = 'problem executing query "' . $query . '": ' . $e->getMessage();
				r_error($log_msg, 'database error!');
			}
			if (!$result) {
			  $log_msg = 'problem executing query "' . $query . '" with paramater set: ' . print_r($query_params, TRUE);
				r_error($log_msg, 'database error.');
			}
		}

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
		return $stmt;
	}
}
/*
added by: per245 3/15/2013
purpose: this is almost identical to the above function except it will allow custom errors, allowing the user to identify which records were not deleted. As of now, this file is only used by     
    
    protected/intranet/controlCenter/COW/deleteCase.php
    



*/

if (!function_exists('do_modified_pdo_query')) {
	function do_modified_pdo_query($db, $query, $query_params = NULL, $errorMessage) {
		// no query parameters
		if (empty($query_params)) {
		  $stmt = $db->query($query);
			if (!$stmt) {
				$log_msg = 'problem executing query "' . $query . '".';
			  r_error($log_msg, $errorMessage);
			}
		}
		// parameterized query
		else {
			try {
			  $stmt = $db->prepare($query);
                if ($stmt == NULL) {
                  r_error('couldn\'t prepare query: ' . $query, $errorMessage);
                }
                foreach ($query_params as $key => $value) {
                  $stmt->bindValue($key, $value);
                }
        
				$result = $stmt->execute();
			}
			catch (Exception $e) {
			  $log_msg = 'problem executing query "' . $query . '": ' . $e->getMessage();
				r_error($log_msg, $errorMessage);
			}
			if (!$result) {
			  $log_msg = 'problem executing query "' . $query . '" with paramater set: ' . print_r($query_params, TRUE);
				r_error($log_msg, $errorMessage);
			}
		}

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
		return $stmt;
	}
}

/*
added: per245 3/15/2013
purpose: had to modify current execution statement to mimick previous logic. This function is almost identical to do_pdo_query except this will not stop code execution if an error occurs. 

*/
if (!function_exists('no_stop_code_execution_on_error')) {

    function no_stop_code_execution_on_error($db, $query, $query_params = NULL, $errorMessage) {
        // no query parameters
        if (empty($query_params)) {
          $stmt = $db->query($query);
            if (!$stmt) {
                echo $errorMessage;
            }
        }
        // parameterized query
        else {
            try {
              $stmt = $db->prepare($query);
                if ($stmt == NULL) {
                  r_error('couldn\'t prepare query: ' . $query, $errorMessage);
                }
                foreach ($query_params as $key => $value) {
                  $stmt->bindValue($key, $value);
                }
        
                $result = $stmt->execute();
            }
            catch (Exception $e) {
              $log_msg = 'problem executing query "' . $query . '": ' . $e->getMessage();
                echo $errorMessage;
            }
            if (!$result) {
              $log_msg = 'problem executing query "' . $query . '" with paramater set: ' . print_r($query_params, TRUE);
                echo $errorMessage;
            }
        }

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt;
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////

?>
