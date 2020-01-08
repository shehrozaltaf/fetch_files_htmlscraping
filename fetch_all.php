<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 36000);
date_default_timezone_set('Asia/Karachi');
ini_set('max_execution_time', -1);
$FacilityIndexes = (isset($_REQUEST['FacilityIndexes']) && $_REQUEST['FacilityIndexes'] != '' ? trim($_REQUEST['FacilityIndexes']) : '');
$arrFacilityIndexes = explode(',', $FacilityIndexes);

$SelectType = (isset($_REQUEST['SelectType']) && $_REQUEST['SelectType'] != '' ? $_REQUEST['SelectType'] : '');
$MonthTo = (isset($_REQUEST['MonthTo']) && $_REQUEST['MonthTo'] != '' ? $_REQUEST['MonthTo'] : date('m', strtotime("last month")));
$YearTo = (isset($_REQUEST['YearTo']) && $_REQUEST['YearTo'] != '' ? $_REQUEST['YearTo'] : date('Y', strtotime("last month")));

$startDate = new DateTime($YearTo . '-' . $MonthTo . '-01');

$MonthFrom = (isset($_REQUEST['MonthFrom']) && $_REQUEST['MonthFrom'] != '' ? $_REQUEST['MonthFrom'] : date('m', strtotime("last month")));
$YearFrom = (isset($_REQUEST['YearFrom']) && $_REQUEST['YearFrom'] != '' ? $_REQUEST['YearFrom'] : date('Y', strtotime("last month")));

$endDate = new DateTime($YearFrom . '-' . $MonthFrom . '-30');

$dateInterval = new DateInterval('P1M');
$datePeriod = new DatePeriod($startDate, $dateInterval, $endDate);

if ($SelectType == 'primary') {
    $fetchdata_index = 'primary';
    $form = 'N-58659';
} elseif ($SelectType == 'secondary') {
    $fetchdata_index = 'secondary';
    $form = 'N-37841';
} else {
    echo 'Invalid Type. Selected Type (primary, secondary) and Try again';
    $form = '';
    $fetchdata_index = '';
}

if (isset($FacilityIndexes) && $FacilityIndexes != '') {
    echo "<Title>$form</title>";
    if (strtotime('01-' . $MonthFrom . '-' . $YearFrom) < strtotime('01-' . $MonthTo . '-' . $YearTo)) {
        echo 'Selected "From Time Period" is greater than "To Time Period", Try again';
    } else {
        foreach ($datePeriod as $date) {
            $y = $date->format('Y');
            $m = $date->format('m');
            foreach ($arrFacilityIndexes as $value) {
                if (substr(trim($value), '0', 1) == 1) {
                    $foldername = 'punjab';
                    $url = 'http://125.209.111.70:88/dhis/reports/standard_reports/forms_report/print_monthly_excel.php?r_type=x';
                } elseif (substr(trim($value), '0', 1) == 2) {
                    $foldername = 'sindh';
                    /*$url = 'http://www.dhissindh.pk/reports/standard_reports/forms_report/formrep.php?r_type=x';*/
                    $url = 'http://www.dhissindh.pk/reports/standard_reports/forms_report/formrep_old.php?r_type=x';
                } elseif (substr(trim($value), '0', 1) == 4) {
                    $foldername = 'balochistan';
                    $url = 'http://www.dhisbalochistan.pk/reports/standard_reports/forms_report/formrep.php?r_type=x';
                } elseif (substr(trim($value), '0', 1) == 5) {
                    $foldername = 'ajk';
                    $url = 'http://www.dhisajk.nhsrc.pk/reports/standard_reports/forms_report/formrep.php?r_type=x';
                } elseif (substr(trim($value), '0', 1) == 8) {
                    $foldername = 'fata';
                    $url = 'http://www.dhisfata.nhsrc.pk/reports/standard_reports/forms_report/formrep.php?r_type=x';
                } else {
                    echo 'nothing';
                }
                downloadFile($form, trim($value), sprintf('%02d', $m), $y, $url, $foldername, $fetchdata_index);
            }
        }
    }
} else {
    echo 'Invalid Facility ID, Try again';
}

function downloadFile($form, $fcode, $month, $year, $url, $foldername, $fetchdata_index)
{
    $folder = 'fetch_data_' . $foldername;
    $fullurl = $url . '&fcode=' . $fcode . '&month=' . $month . '&year=' . $year . '&monthto=' . $month . '&yearto=' . $year . '&form=' . $form;
    $newfname = './fetch_alldata/uen_dec/' . $folder . '/' . $fetchdata_index . '/' . $year . '/' . $month . '/' . $year . $month . '_' . $fcode . '.xls';
    $path = './fetch_alldata/uen_dec/' . $folder . '/' . $fetchdata_index . '/' . $year . '/' . $month . '/';
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }
    if (!file_exists($newfname)) {
        echo "Downloading File " . $newfname . "...<br>";
        $file = fopen($fullurl, 'rb');
        if ($file) {
            $newf = fopen($newfname, 'wb');
            if ($newf) {
                while (!feof($file)) {
                    //echo $count++.'<br>';
                    fwrite($newf, fread($file, 1024 * 8), 1024 * 8);
                }
            }
        }
        if ($file) {
            fclose($file);
        }
        if ($newf) {
            fclose($newf);
        }
    } else {
        echo "File...Exists! <br>";
    }
} ?>