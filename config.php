<?php session_start();
error_reporting(0);
ini_set('memory_limit', '-1');
ini_set('max_execution_time', -1);
date_default_timezone_set('Asia/Karachi');

$serverName = "f38158";
//$connectionInfo = array("Database" => "phcreports", "UID" => "shahroz.khan", "PWD" => "Abcd1234");
//$connectionInfo = array("Database" => "phcreports", "UID" => "admin1", "PWD" => "Abcd1234");
$connectionInfo = array("Database" => "phcreports", "UID" => "sa", "PWD" => "sa");
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}


function cleankey($string)
{
    $string = str_replace('1st', 'first', $string);
    $string = str_replace('<', 'lessthan_', $string);
    $string = str_replace('>', 'greaterthan_', $string);
    $string = str_replace('+', 'plus', $string);
    $string = preg_replace(['(\s+)u', '(^\s|\s$)u'], [' ', ''], $string);
    $string = preg_replace('/[^A-Za-z0-9-+_\-]/', '_', $string);
    $string = ltrim($string, "_");
    $string = rtrim($string, "_");
    $string = str_replace('__', '', $string);
    return preg_replace('/-+/', '_', $string);
}

function cleanvalue($string)
{
    $string = str_replace(',', '', $string);
    $string = preg_replace(['(\s+)u', '(^\s|\s$)u'], [' ', ''], $string);
    $string = preg_replace('/[^A-Za-z0-9-+_\-]/', ' ', $string);
    $string = ltrim($string, " ");
    $string = rtrim($string, " ");
    $string = str_replace('__', ' ', $string);
    return preg_replace('/-+/', ' ', $string);
}

function getSectionsDetailByItem($Section, $array, $item, $itemlimit = 0)
{

    $secArr = array();
    $HeaderSec = $Section->item(0)->getElementsByTagName('tr');
    if ($itemlimit == 0 || $itemlimit == '') {
        $itemlimit = $HeaderSec->length;
    }
    for ($l = $item; $l < $itemlimit; $l++) {
        $Detail = $HeaderSec->item($l)->getElementsByTagName('td');
        foreach ($Detail as $key => $sNodeDetail) {
            if ($key == 1 && $array[0] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[0])] = cleanvalue($Detail[2]->textContent);
            } elseif ($key == 2 && $array[1] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[1])] = cleanvalue($Detail[3]->textContent);
            } elseif ($key == 3 && isset($array[2]) && $array[2] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[2])] = cleanvalue($Detail[4]->textContent);
            } elseif ($key == 4 && isset($array[3]) && $array[3] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[3])] = cleanvalue($Detail[5]->textContent);
            } elseif ($key == 5 && isset($array[4]) && $array[4] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[4])] = cleanvalue($Detail[6]->textContent);
            } elseif ($key == 6 && isset($array[5]) && $array[5] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[5])] = cleanvalue($Detail[7]->textContent);
            } elseif ($key == 7 && isset($array[6]) && $array[6] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[6])] = cleanvalue($Detail[8]->textContent);
            } elseif ($key == 8 && isset($array[7]) && $array[7] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[7])] = cleanvalue($Detail[9]->textContent);
            } elseif ($key == 9 && isset($array[8]) && $array[8] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[8])] = cleanvalue($Detail[10]->textContent);
            } elseif ($key == 10 && isset($array[9]) && $array[9] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[9])] = cleanvalue($Detail[11]->textContent);
            } elseif ($key == 11 && isset($array[10]) && $array[10] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[10])] = cleanvalue($Detail[12]->textContent);
            } elseif ($key == 12 && isset($array[11]) && $array[11] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[11])] = cleanvalue($Detail[13]->textContent);
            } elseif ($key == 13 && isset($array[12]) && $array[12] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[12])] = cleanvalue($Detail[14]->textContent);
            } elseif ($key == 14 && isset($array[13]) && $array[13] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[13])] = cleanvalue($Detail[15]->textContent);
            } elseif ($key == 15 && isset($array[14]) && $array[14] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[14])] = cleanvalue($Detail[16]->textContent);
            } elseif ($key == 16 && isset($array[15]) && $array[15] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[15])] = cleanvalue($Detail[17]->textContent);
            }
        }
    }
    return $secArr;
}

function getSectionsDetail($Section, $array)
{
    $secArr = array();
    $HeaderSec = $Section->item(0)->getElementsByTagName('tr');
    for ($l = 0; $l < $HeaderSec->length; $l++) {
        $Detail = $HeaderSec->item($l)->getElementsByTagName('td');
        foreach ($Detail as $key => $sNodeDetail) {
            if ($key == 1 && $array[0] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[0])] = cleanvalue($Detail[2]->textContent);
            } elseif ($key == 2 && $array[1] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[1])] = cleanvalue($Detail[3]->textContent);
            } elseif ($key == 3 && isset($array[2]) && $array[2] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[2])] = cleanvalue($Detail[4]->textContent);
            } elseif ($key == 4 && isset($array[3]) && $array[3] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[3])] = cleanvalue($Detail[5]->textContent);
            } elseif ($key == 5 && isset($array[4]) && $array[4] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[4])] = cleanvalue($Detail[6]->textContent);
            } elseif ($key == 6 && isset($array[5]) && $array[5] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[5])] = cleanvalue($Detail[7]->textContent);
            } elseif ($key == 7 && isset($array[6]) && $array[6] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[6])] = cleanvalue($Detail[8]->textContent);
            } elseif ($key == 8 && isset($array[7]) && $array[7] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[7])] = cleanvalue($Detail[9]->textContent);
            } elseif ($key == 9 && isset($array[8]) && $array[8] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[8])] = cleanvalue($Detail[10]->textContent);
            } elseif ($key == 10 && isset($array[9]) && $array[9] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[9])] = cleanvalue($Detail[11]->textContent);
            } elseif ($key == 11 && isset($array[10]) && $array[10] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[10])] = cleanvalue($Detail[12]->textContent);
            } elseif ($key == 12 && isset($array[11]) && $array[11] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[11])] = cleanvalue($Detail[13]->textContent);
            } elseif ($key == 13 && isset($array[12]) && $array[12] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[12])] = cleanvalue($Detail[14]->textContent);
            } elseif ($key == 14 && isset($array[13]) && $array[13] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[13])] = cleanvalue($Detail[15]->textContent);
            } elseif ($key == 15 && isset($array[14]) && $array[14] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[14])] = cleanvalue($Detail[16]->textContent);
            } elseif ($key == 16 && isset($array[15]) && $array[15] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[15])] = cleanvalue($Detail[17]->textContent);
            }
        }
    }
    return $secArr;
}

function getSectionsDetail2($Section)
{
    $secArr = array();
    for ($z = 0; $z < $Section->length; $z++) {
        $HeaderSec = $Section->item($z)->getElementsByTagName('tr');
        $cntHeaderSec = $Section->item($z)->getElementsByTagName('tr')->length;
        for ($l = 0; $l < $cntHeaderSec; $l++) {
            $Detail = $HeaderSec->item($l)->getElementsByTagName('td');
            foreach ($Detail as $key => $sNodeDetail) {
                if ($key == 1) {
                    if (isset($secArr[cleankey($Detail[1]->textContent)]) && $secArr[cleankey($Detail[1]->textContent)] != '') {
                        $secArr[cleankey($Detail[1]->textContent)] += cleanvalue($Detail[2]->textContent);
                    } else {
                        $secArr[cleankey($Detail[1]->textContent)] = cleanvalue($Detail[2]->textContent);
                    }
                }
            }
        }
    }
    return $secArr;
}

function getSectionsDetail3($Section, $array)
{
    $secArr = array();
    $HeaderSec = $Section;
    for ($l = 0; $l < $HeaderSec->length; $l++) {
        $Detail = $HeaderSec->item($l)->getElementsByTagName('td');
        foreach ($Detail as $key => $sNodeDetail) {
            if ($key == 1 && $array[0] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[0])] = cleanvalue($Detail[2]->textContent);
            } elseif ($key == 2 && $array[1] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[1])] = cleanvalue($Detail[3]->textContent);
            } elseif ($key == 3 && isset($array[2]) && $array[2] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[2])] = cleanvalue($Detail[4]->textContent);
            } elseif ($key == 4 && isset($array[3]) && $array[3] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[3])] = cleanvalue($Detail[5]->textContent);
            } elseif ($key == 5 && isset($array[4]) && $array[4] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[4])] = cleanvalue($Detail[6]->textContent);
            } elseif ($key == 6 && isset($array[5]) && $array[5] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[5])] = cleanvalue($Detail[7]->textContent);
            } elseif ($key == 7 && isset($array[6]) && $array[6] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[6])] = cleanvalue($Detail[8]->textContent);
            } elseif ($key == 8 && isset($array[7]) && $array[7] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[7])] = cleanvalue($Detail[9]->textContent);
            } elseif ($key == 9 && isset($array[8]) && $array[8] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[8])] = cleanvalue($Detail[10]->textContent);
            } elseif ($key == 10 && isset($array[9]) && $array[9] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[9])] = cleanvalue($Detail[11]->textContent);
            } elseif ($key == 11 && isset($array[10]) && $array[10] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[10])] = cleanvalue($Detail[12]->textContent);
            } elseif ($key == 12 && isset($array[11]) && $array[11] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[11])] = cleanvalue($Detail[13]->textContent);
            } elseif ($key == 13 && isset($array[12]) && $array[12] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[12])] = cleanvalue($Detail[14]->textContent);
            } elseif ($key == 14 && isset($array[13]) && $array[13] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[13])] = cleanvalue($Detail[15]->textContent);
            } elseif ($key == 15 && isset($array[14]) && $array[14] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[14])] = cleanvalue($Detail[16]->textContent);
            } elseif ($key == 16 && isset($array[15]) && $array[15] != '') {
                $secArr[cleankey($Detail[1]->textContent)][cleankey($array[15])] = cleanvalue($Detail[17]->textContent);
            }
        }
    }
    return $secArr;
}

function getSections1Detail($Section)
{
    $secArr = array();
    for ($z = 0; $z < $Section->length; $z++) {
        $HeaderSec = $Section->item($z)->getElementsByTagName('tr');
        $cntHeaderSec = $Section->item($z)->getElementsByTagName('tr')->length;
        for ($l = 0; $l < $cntHeaderSec; $l++) {
            $Detail = $HeaderSec->item($l)->getElementsByTagName('td');
            foreach ($Detail as $key => $sNodeDetail) {
                if ($key == 1) {
                    $secArr[cleankey($Detail[1]->textContent)] = cleanvalue($Detail[2]->textContent);
                }
            }
        }
    }
    return $secArr;
}

function insertsqlQry($conn, $secArr, $table, $filename, $functiontype)
{

    $insrtclausesKey = '';
    $insrtclausesValue = '';
    $updateclausesValue = '';
    $i = 0;
    $insrtQuery = " ";
    if ($functiontype == 1) {
        foreach ($secArr as $key => $data) {
            $i++;
            if (isset($key) && $key != '') {
                if ($key == 'Facode' || $key == 'Facility') {

                } else {
                    foreach ($data as $keyvalue => $value) {
                        $insrtclausesKey .= ", " . $key . '_' . $keyvalue;
                        $insrtclausesValue .= ", " . "'$value'";
                        $updateclausesValue .= ", " . $key . '_' . $keyvalue . '=' . "'$value'";
                    }
                }

            }
        }
    } elseif ($functiontype == 2) {
        foreach ($secArr as $key => $data) {
            if (isset($key) && $key != '') {
                $insrtclausesKey .= ", " . substr(cleankey($key), 0, 50);
                $insrtclausesValue .= ", " . "'$data'";
                $updateclausesValue .= ", " . substr(cleankey($key), 0, 50) . '=' . "'$data'";
            }
        }
    }
    $result = array('keys' => $insrtclausesKey, "values" => $insrtclausesValue, "update" => $updateclausesValue);
    return $result;
}

function insertQry($conn, $secArr, $table, $filename)
{

    $insrtclausesKey = '';
    $insrtclausesValue = '';
    $updateclausesValue = 'file_no="' . $filename . '"';
    $i = 0;
    $insrtQuery = "INSERT INTO `$table` ( `file_no`";
    foreach ($secArr as $key => $data) {
        $i++;
        if (isset($key) && $key != '') {
            if ($key == 'Facode' || $key == 'Facility') {

            } else {
                foreach ($data as $keyvalue => $value) {
                    $insrtclausesKey .= ", " . $key . '_' . $keyvalue;
                    $insrtclausesValue .= ", " . "'$value'";
                    $updateclausesValue .= ", " . $key . '_' . $keyvalue . '=' . "'$value'";
                }
            }

        }
    }
    $insrtQuery .= " $insrtclausesKey) VALUES ('" . $filename . "' $insrtclausesValue)   ON DUPLICATE KEY UPDATE $updateclausesValue";
    return $insrtQuery;
}

function insertQry2($conn, $secArr, $table, $filename)
{
    $insrtclausesKey = '';
    $insrtclausesValue = '';
    $updateclausesValue = 'file_no="' . $filename . '"';
    $insrtQuery = "INSERT INTO `$table` ( `file_no`";
    foreach ($secArr as $key => $data) {
        if (isset($key) && $key != '') {
            $insrtclausesKey .= ", " . substr(cleankey($key), 0, 50);
            $insrtclausesValue .= ", " . "'$data'";
            $updateclausesValue .= ", " . substr(cleankey($key), 0, 50) . '=' . "'$data'";
        }
    }
    $insrtQuery .= " $insrtclausesKey) VALUES ('" . $filename . "' $insrtclausesValue) ON DUPLICATE KEY UPDATE $updateclausesValue";

}


