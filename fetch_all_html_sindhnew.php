<?php include 'config.php';
ini_set('memory_limit', '256M');
ini_set('max_execution_time', -1);
date_default_timezone_set('Asia/Karachi');
$SelectType = (isset($_REQUEST['SelectType']) && $_REQUEST['SelectType'] != '' ? $_REQUEST['SelectType'] : '');
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


if (isset($_REQUEST['SelectProvince']) && $_REQUEST['SelectProvince'] == 'sindh' && $_REQUEST['FacilityIndexes'] == '') {
    if ($fetchdata_index == 'primary') {
        $FacilityIndexes = '211008,211012,211014,211015,211016,211017,211018,211019,211020,211021,211022,211023,211024,211025,211026,211028,211031,211032,211034,211038,211039,211040,211042,211043,211045,211046,211047,211048,211050,211051,211052,211055,211056,211057,211059,211066,211067,211071,211072,211073,211076,211078,211079,211083,211084,211085,211092,211094,211095,211105,211115,211121,212002,212004,212010,212012,212031,212037,212038,212040,212041,212043,212049,212050,212056,212057,212077,212078,212079,212092,212102,212103,212104,212119,212130,213003,213006,213007,213011,213012,213013,213014,213015,213017,213018,213020,213021,213022,213023,213024,213025,213026,213027,213028,213029,213030,213031,213032,213033,213034,213035,213036,213037,213038,213039,213040,213041,213042,213043,213044,213046,213048,213049,213050,213051,213052,213053,213054,213055,213056,213057,213058,213059,213061,213062,213064,213065,213067,213068,213075,213076,214006,214007,214008,214009,214010,214011,214017,214018,214019,214020,214021,214022,214023,214025,214037,214038,214039,214040,214041,214042,214043,214044,214045,214046,214047,214060,214061,214064,214065,214080,214088,214090,214091,214092,214093,214094,214096,214098,214102,214105,214107,214108,214109,214112,215002,215003,215004,215005,215006,215007,215008,215009,215010,215012,215013,215014,215015,215016,215017,215018,215019,215020,215021,215022,215024,215025,215026,215027,215028,215029,215030,215031,215032,215033,215035,215036,215037,215038,215039,215040,215041,215042,215043,215044,215045,215046,215047,215048,215049,215050,215051,215052,215054,215055,215065,216002,216003,216004,216005,216006,216007,216008,216009,216010,216011,216012,216013,216014,216015,216016,216017,216018,216019,216020,216021,216022,216023,216024,216025,216026,216027,216028,216029,216030,216031,216032,216033,216034,216035,216036,216037,216038,216039,216040,216041,216042,216043,216044,216045,216046,216047,216048,216049,216050,216051,217001,217002,217003,217005,217014,217015,217016,217027,217028,217029,217030,217031,217032,217033,217035,217050,217051,217052,217053,217054,217055,217057,217058,217062,217063,217066,217067,217079,217082,217084,217085,217086,217087,217095,217099,217100,217101,217102,217103,217104,218001,218002,218003,218004,218005,218006,218007,218008,218009,218011,218013,218014,218015,218022,218023,218043,218055,218056,218057,218060,218061,218065,218070,218071,218086,218087,218088,218089,218090,218091,218092,218095,218096,218101,218102,218105,218138,218139,218141,219002,219003,219004,219007,219008,219009,219010,219011,219012,219013,219014,219015,219016,219017,219018,219019,219020,219021,219022,219023,219024,219025,219026,219027,219028,219029,219030,219031,219032,219033,219034,219035,219036,219037,219038,219039,219040,251000,251001,251002,251003,251004,251005,251006,251007,251008,251009,251010,251011,251012,251013,251014,251015,251016,251017,251018,251019,251020,251021,251022,251023,251024,251025,251026,251027,251028,251029,251030,251031,251032,251033,251034,251035,251036,251037,251038,251040,251041,251042,251043,251044,251045,251046,251047,251048,251049,251050,251051,251052,251053,251054,251055,251056,251057,251058,251059,251060,251061,251062,251063,251064,251065,251067,251068,251069,251070,251072,251073,251074,251075,251076,251077,251078,251079,251080,251081,251082,251083,251085,251086,251087,251088,251089,251090,251091,251092,251093,251094,251095,251096,251097,251098,251099,251100,251101,251102,251103,251104,251105,251106,251107,251108,253001,253002,253003,253004,253005,253006,253007,253008,253009,253010,253011,253012,253013,253014,253015,253016,253017,253018,253019,253020,253021,253022,253023,253031,253032,253033,253035,253036,253037,253038,253039,253040,253041,253042,253043,253044,253045,253046,253048,253049,253050,253051,253052,253053,253054,253055,253056,253057,253058,253059,253060,253061,253062,253063,253064,253065,253066,253067,253068,253069,253070,253071,253072,253073,253074,253076,253077,253079,253080,253081,253082,253083,253084,253085,253086,253087,253088,253090,253091,253092,253093,253094,253095,253096,253097,253098,253099,253100,253101,253102,253104,253105,253106,253107,253108,253110,253111,253112,253113,253115,253116,253117,253119,253121,253122,253123,253124,253126,253127,253128,253129,253130,253131,253133,253134,253137,253138,253139,253141,253142,253144,253145,253146,253147,253149,253150,253153,253154,253157,253162,253163,253164,253166,253167,253169,253170,253174,253175,253178,253179,253180,253181,253183,253184,253185,253186,253187,253188,253189,253190,253191,253192,253193,253194,253195,253196,253197,253198,253199,253200,253201,253202,253203,253205,253206,253207,253208,253209,253220,253221,253222,253223,253224,253226,253227,253228,253229,253230,253231,253232,253233,254001,254002,254005,254006,254007,254009,254010,254011,254012,254014,254015,254016,254017,254030,254031,254032,254033,254034,254035,254036,254037,254038,254039,254040,254041,254042,254043,254044,254045,254046,254047,254048,254050,254051,254052,254053,254054,254055,254056,254057,254058,254059,254061,254062,254063,254074,254077,254078,254079,254081,254085,254086,254087,254088,254090,254091,254095,254096,231001,231002,231003,231004,231009,231010,231011,231012,231013,231014,231015,231016,231017,231018,231019,231020,231021,231022,231023,231024,231025,231026,231027,231028,231029,231030,231031,231032,231033,231034,231035,231036,231037,231038,231039,231040,231041,231042,231044,231046,231047,231048,231049,232004,232005,232006,232007,232008,232009,232010,232011,232012,232021,232022,232023,232024,232025,232027,232028,232036,232037,232038,232039,232040,232041,232055,232056,232066,232067,232068,232074,232080,232082,232086,232087,232088,232089,232090,232092,232093,232094,232096,232097,232098,232112,232123,232130,232131,232133,232134,232135,232139,232140,232147,232204,232636,232801,232802,232804,232805,232806,233002,233003,233004,233005,233006,233007,233008,233009,233010,233011,233012,233013,233014,233015,233016,233018,233020,233021,233022,233023,233024,233025,233026,233028,233029,233030,233031,233032,233033,233035,233036,233037,233038,233040,233041,233047,233049,233050,233051,233052,233053,233054,233055,233056,233057,233058,233059,233060,233061,233062,233063,233065,233067,233069,233070,233071,234001,234010,234012,234013,234014,234015,234016,234017,234018,234019,234020,234029,234030,234031,234032,234034,234042,234043,234045,234047,234048,234049,234050,234051,234052,234053,234070,234071,234072,234073,234078,234083,234085,234099,234101,234105,234106,234107,234108,234109,234111,234113,234114,234115,234116,234117,234121,234127,234128,234136,234137,234138,234141,234144,234301,234305,234307,234441,234777,234890,234908,234909,234910,234911,234912,234917,234923,234924,235003,235004,235005,235006,235007,235008,235009,235010,235011,235013,235014,235015,235016,235017,235018,235019,235020,235021,235022,235025,235026,235027,235028,235029,235030,235031,235032,235034,235036,235037,235039,235041,235042,235043,235044,235045,235046,235047,235049,235050,235051,235052,235054,235055,235056,235058,241002,241003,241004,241005,241006,241007,241008,241009,241011,241012,241013,241014,241015,241016,241017,241018,241019,241020,241021,241022,241023,241024,241025,241026,241027,241028,241029,241030,241031,241032,241033,241034,241035,241036,241037,241038,241039,241040,241041,241042,241043,241044,241045,241046,241047,241048,241049,241050,241051,241052,241053,241054,241055,241056,241057,241058,241059,241060,241061,241062,241063,241064,241068,241070,241074,241075,241076,241077,241078,241079,241080,241081,241082,241083,241084,241085,241087,241089,241090,241091,241092,241094,241095,241108,241109,241110,241111,241113,241114,241115,241116,241118,241120,241121,241122,241123,241124,241125,241126,241127,241128,241129,241131,241132,241133,241135,241136,241139,241140,241143,241145,241146,241148,241149,241150,241151,241152,241153,241154,241155,241157,241158,241159,241160,241161,241162,241163,241164,241165,241166,241167,241168,241169,241170,241175,241177,241178,241180,241181,241183,241185,241186,241187,241188,241189,241193,241194,241195,241199,241200,241201,241202,241204,241206,241207,241208,241210,241211,241212,241216,241217,244017,244018,244019,244020,244021,244022,244023,244024,244025,244026,244027,244028,244029,244030,244031,244032,244033,244034,244036,244037,244038,244039,244064,244065,244066,244067,244069,244097,244098,244099,244105,244106,244107,244108,244109,244110,244112,244114,244120,244121,244122,244123,244124,244126,244131,244133,244134,244135,244138,244139,244140,244141,244142,244143,244144,244145,245001,245003,245004,245005,245006,245007,245008,245009,245010,245011,245012,245013,245014,245015,245016,245017,245018,245019,245020,245040,245041,245060,245095,245096,245102,245108,245112,245113,245114,245115,245116,245117,245120,245121,245122,245123,245126,245127,245129,245142,245144,245150,245183,245200,245500,245501,245502,245503,245504,245507,245508,221008,221031,221036,221038,221044,221097,221098,221099,221101,221104,221105,221106,221110,221112,221113,221115,221116,221118,221231,221233,221237,221241,221245,221295,221312,221313,221314,221315,222032,222047,222050,222059,222065,222077,222079,222084,222086,222087,222088,222090,222092,223121,223123,223125,223126,223127,223130,223131,223134,223147,223148,223151,223153,223197,223281,223282,223284,223290,223291,224071,224072,224073,224074,224076,224158,224161,224162,224164,224171,224208,224210,225189,225255,225257,225259,225277,226001,226005,226011,226012,226013,226014,226015,226016,226017,226020,226022,226023,226024,226025,226027,226028,226029,226030,226033,226034,226035,226037,226039,226040,226041,226042,226043,226045,226046,226198,226203,242004,242005,242006,242007,242008,242009,242010,242011,242012,242013,242014,242015,242017,242018,242019,242023,242025,242029,242032,242033,242035,242038,242039,242041,242042,242043,242044,242048,242049,242050,242051,242052,242053,242055,242056,242061,242063,242064,242065,242066,242067,242068,242069,242070,242071,242072,242073,242074,242075,242076,242077,242078,242079,242080,242081,242083,242084,242085,242086,242087,242088,242089,242090,242091,242093,242094,242095,242096,242097,242098,242099,242100,242102,242104,242105,242106,242107,242108,242110,242111,242113,242114,243001,243002,243003,243004,243005,243006,243007,243008,243009,243010,243011,243012,243013,243014,243015,243016,243017,243018,243019,243020,243021,243022,243023,243024,243025,243026,243027,243028,243030,243031,243032,243033,243034,243035,243036,243037,243039,243040,243041,243042,243043,243044,243045,243046,243047,243048,243049,243050,243051,243052,243053,243054,243055,243056,243057,243058,243059,243060,243062,243063,243064,243065,243066,243067,243068,243069,243070,243071,243072,243073,243074,243075,243076,243077,243078,243079,243080,243081,243082,243083,243084,243085,243086,243087,243090,243092,243093,243094,243096,243097,243098,243099,243100,243101,243102,243103,243104,243105,243106,243107,243109,243110,243111,243112,243113,243114,243115,243116,243117,243118,243119,243120,243121,243122,243123,243125,243126,243127,243128,252002,252003,252004,252005,252006,252007,252008,252009,252010,252011,252012,252013,252014,252015,252016,252017,252018,252020,252021,252022,252023,252024,252025,252026,252027,252028,252029,252030,252031,252032,252033,252034,252035,252036,252037,252038,252040,252041,252042,252043,252044,252045,252046,252047,252048,252049,252050,252051,252052,252053,252054,252055,252056,252057,252058,252059,252061,252062,252063,252064,252065,252066,252067,252068,252069,252070,252071,252072,252073,252074,252076,252077,252078,252079,252080,252081,252082,252083,252084,252085,252086,252087,252088,252089,252090,252091,252092,252093,252094,252095,252096,252097,252098,252099,252100,252101,252102,252103';
    } elseif ($fetchdata_index == 'secondary') {
        $FacilityIndexes = '211033,211035,211036,211037,211044,211122,212001,212070,212071,212072,212075,213001,213002,213004,213005,213009,213010,213016,213019,213047,213060,213063,213074,214013,214026,214048,214111,215001,215011,215023,215034,216001,217036,217059,218010,218049,218062,218066,219001,219005,251039,251066,251084,253024,253025,253026,253030,254065,254066,254067,254075,254076,254080,231005,231006,231007,231045,232003,232057,232069,232655,232807,233001,233042,233044,233045,233046,234058,234061,234063,234064,235001,235002,235057,241086,241088,241215,244087,244088,244113,245085,245086,245100,245143,245506,224211,225262,226010,226026,226195,242002,242003,242092,243029,252001,252019,252039,252060,252075';
    }
} else {
    $FacilityIndexes = (isset($_REQUEST['FacilityIndexes']) && $_REQUEST['FacilityIndexes'] != '' ? trim($_REQUEST['FacilityIndexes']) : '');
}
$arrFacilityIndexes = explode(',', $FacilityIndexes);


$MonthTo = (isset($_REQUEST['MonthTo']) && $_REQUEST['MonthTo'] != '' ? $_REQUEST['MonthTo'] : date('m', strtotime("last month")));
$YearTo = (isset($_REQUEST['YearTo']) && $_REQUEST['YearTo'] != '' ? $_REQUEST['YearTo'] : date('Y', strtotime("last month")));
$startDate = new DateTime($YearTo . '-' . $MonthTo . '-01');
$MonthFrom = (isset($_REQUEST['MonthFrom']) && $_REQUEST['MonthFrom'] != '' ? $_REQUEST['MonthFrom'] : date('m', strtotime("last month")));
$YearFrom = (isset($_REQUEST['YearFrom']) && $_REQUEST['YearFrom'] != '' ? $_REQUEST['YearFrom'] : date('Y', strtotime("last month")));
$endDate = new DateTime($YearFrom . '-' . $MonthFrom . '-30');
$dateInterval = new DateInterval('P1M');
$datePeriod = new DatePeriod($startDate, $dateInterval, $endDate);

if (isset($_REQUEST['updateData']) && $_REQUEST['updateData'] == 'doupdate') {
    $doupdate = "Yes";
} else {
    $doupdate = "No";
}

if (isset($FacilityIndexes) && $FacilityIndexes != '') {
    if (strtotime('01-' . $MonthFrom . '-' . $YearFrom) < strtotime('01-' . $MonthTo . '-' . $YearTo)) {
        echo 'Selected "From Time Period" is greater than "To Time Period", Try again';
    } else {
        foreach ($datePeriod as $date) {
            $y = $date->format('Y');
            $m = $date->format('m');
            foreach ($arrFacilityIndexes as $value) {
                if (substr(trim($value), '0', 1) == 2) {
                    $foldername = 'sindh_new';
                    $table = 'sindh_new_' . $fetchdata_index;
                    $url = 'http://www.dhissindh.pk/reports/standard_reports/forms_report/formrep.php?r_type=x';
                    /*$url = 'http://www.dhissindh.pk/reports/standard_reports/forms_report/formrep_old.php?r_type=x';*/
                } else {
                    echo 'nothing';
                    $table = '';
                    $url = '';
                    $foldername = '';
                }
                downloadFile($form, trim($value), sprintf('%02d', $m), $y, $url, $foldername, $fetchdata_index, $conn, $table, $doupdate);
            }
        }
    }
} else {
    echo 'Invalid Facility ID, Try again';
}

function downloadFile($form, $fcode, $month, $year, $url, $foldername, $fetchdata_index, $conn, $table, $doupdate)
{

    $folder = 'fetch_data_' . $foldername;
    $fullurl = $url . '&fcode=' . $fcode . '&month=' . $month . '&year=' . $year . '&monthto=' . $month . '&yearto=' . $year . '&form=' . $form;
    $file_short_name = $year . $month . '_' . $fcode . '.html';
    $newfname = './fetch_alldata_html/' . $folder . '/' . $fetchdata_index . '/' . $year . '/' . $month . '/' . $file_short_name;
    $path = './fetch_alldata_html/' . $folder . '/' . $fetchdata_index . '/' . $year . '/' . $month . '/';
    $filename = $newfname;

    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }

    if (file_exists($newfname)) {
        $newfname = './fetch_alldata_html/' . $folder . '/' . $fetchdata_index . '/' . $year . '/' . $month . '/' . $year . $month . '_' . $fcode . '_' . date('H_i_s') . '.html';
    }
    $file = fopen($fullurl, 'rb');
    if ($file) {
        $newf = fopen($newfname, 'wb');
        if ($newf) {
            while (!feof($file)) {
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

    if ($fetchdata_index == 'primary') {
        insertPrimaryAllProvince($conn, $foldername, $filename, $file_short_name, $fetchdata_index, $table, $doupdate);
    } elseif ($fetchdata_index == 'secondary') {
        insertSecondaryAllProvince($conn, $foldername, $filename, $file_short_name, $fetchdata_index, $table, $doupdate);
    } else {
    }

}


function insertPrimaryAllProvince($conn, $province, $filepath, $filename, $form_type, $table, $doupdate)
{
    $report_created_date = date('Y-m-d H:i:s');

    $mykeyquery = '';
    $myvaluequery = '';
    $myupdatequery = '';

    $htmlContent = file_get_contents($filepath);
    $DOM = new DOMDocument();
    libxml_use_internal_errors(1);
    $DOM->loadHTML($htmlContent);
    $mainHeader = $DOM->getElementsByTagName('table');
    /*================================================Secton 1================================================*/
    $Section1b = $mainHeader->item(6)->getElementsByTagName('table');
    $secArr1b = getSectionsDetail2($Section1b);
    $secArr1a = array();
    $Section1a = $mainHeader->item(0)->getElementsByTagName('table');
    $HeaderSec1a = $Section1a->item(1)->getElementsByTagName('tr');
    $Detail1a = $HeaderSec1a->item(0)->getElementsByTagName('td');
    foreach ($Detail1a as $key => $sNodeDetail) {
        if ($key == 1) {
            $secArr1a[cleankey('month_year')] = cleanvalue($sNodeDetail->textContent);
        } elseif ($key == 3) {
            $secArr1a[cleankey('working_days')] = cleanvalue($sNodeDetail->textContent);
        } else {
        }
    }

    $mykeyquery .= 'file_no,form_type,province,file_name, month_year, working_days, 
facility_id, facility_name, tehsil, facility_incharge, designation, receiving_date';

    $myvaluequery .= " '" . $filename . "','" . $form_type . "','" . $province . "','PHC Facility Monthly Report','" . str_replace(' ', '-', $secArr1a['month_year']) . "','" . $secArr1a['working_days'] . "',
'" . $secArr1b['Facility_ID'] . "','" . $secArr1b['Facility_Name'] . "','" . $secArr1b['Tehsil'] . "','" . $secArr1b['Facility_Incharge'] . "',
'" . $secArr1b['Designation'] . "','" . $secArr1b['Receiving_Date'] . "'";

    $myupdatequery .= "form_type='" . $form_type . "',province='" . $province . "',file_name='PHC Facility Monthly Report',
 month_year='" . str_replace(' ', '-', $secArr1a['month_year']) . "', working_days='" . $secArr1a['working_days'] . "', 
facility_id='" . $secArr1b['Facility_ID'] . "', facility_name='" . $secArr1b['Facility_Name'] . "', tehsil='" . $secArr1b['Tehsil'] . "', 
facility_incharge='" . $secArr1b['Facility_Incharge'] . "',
 designation='" . $secArr1b['Designation'] . "', receiving_date='" . $secArr1b['Receiving_Date'] . "' ";


    /*================================================Secton 2================================================*/
    $Section2 = $mainHeader->item(9)->getElementsByTagName('table');
    $array = array('Target', 'Performance');
    $sec2Arr = getSectionsDetail($Section2, $array);
    $res2 = insertsqlQry($conn, $sec2Arr, 'section2', $filename, 1);
    $mykeyquery .= $res2['keys'];
    $myvaluequery .= $res2['values'];
    $myupdatequery .= $res2['update'];


    /*================================================Secton 3================================================*/
    $Section3 = $mainHeader->item(11)->getElementsByTagName('table');
    $array = array('<1yrs', '<1-11months', '1-4yrs', '5-14', '15-49', '50+', 'Total');
    $sec3Arr = getSectionsDetail($Section3, $array);
    $res3 = insertsqlQry($conn, $sec3Arr, 'section3', $filename, 1);
    $mykeyquery .= $res3['keys'];
    $myvaluequery .= $res3['values'];
    $myupdatequery .= $res3['update'];


    /*============Section 3 Table 2============*/
    $Section3B = $mainHeader->item(13)->getElementsByTagName('table');
    /*    $sec3BArr = array();
        for ($z = 0; $z < $Section3B->length; $z++) {
            $HeaderSec = $Section3B->item($z)->getElementsByTagName('tr');
            $cntHeaderSec = $Section3B->item($z)->getElementsByTagName('tr')->length;
            for ($l = 0; $l < $cntHeaderSec; $l++) {
                $Detail = $HeaderSec->item($l)->getElementsByTagName('td');
                foreach ($Detail as $key => $sNodeDetail) {
                    if ($key == 1) {
                        $sec3BArr[cleankey($Detail[1]->textContent)] = cleanvalue($Detail[2]->textContent);
                    }
                }
            }
        }*/
    $sec3BArr = getSectionsDetail2($Section3B);
    $res3b = insertsqlQry($conn, $sec3BArr, 'section3b', $filename, 2);
    $mykeyquery .= $res3b['keys'];
    $myvaluequery .= $res3b['values'];
    $myupdatequery .= $res3b['update'];


    /*================================================Secton 4================================================*/
    $Section4 = $mainHeader->item(16)->getElementsByTagName('table');

    $sec4Arr = array();
    for ($z = 0; $z < $Section4->length; $z++) {
        $HeaderSec = $Section4->item($z)->getElementsByTagName('tr');
        $cntHeaderSec = $Section4->item($z)->getElementsByTagName('tr')->length;
        for ($l = 0; $l < $cntHeaderSec; $l++) {
            $Detail = $HeaderSec->item($l)->getElementsByTagName('td');
            foreach ($Detail as $key => $sNodeDetail) {
                if ($key == 1) {
                    if (isset($sec4Arr[cleankey($Detail[1]->textContent)]) && $sec4Arr[cleankey($Detail[1]->textContent)] != '') {
                        if (cleankey($Detail[1]->textContent) == 'Birth_Asphyxia') {
                            $sec4Arr['Birth_Asphyxia_nd'] += cleanvalue($Detail[2]->textContent);
                        } elseif (cleankey($Detail[1]->textContent) == 'Neonatal_Sepsis') {
                            $sec4Arr['Neonatal_Sepsis_nd'] += cleanvalue($Detail[2]->textContent);
                        } else {
                            $sec4Arr[cleankey($Detail[1]->textContent)] = cleanvalue($Detail[2]->textContent);
                        }
                    } else {
                        if (cleankey($Detail[1]->textContent) == 'Birth_Asphyxia') {
                            $sec4Arr['Birth_Asphyxia_nd'] += cleanvalue($Detail[2]->textContent);
                        } elseif (cleankey($Detail[1]->textContent) == 'Neonatal_Sepsis') {
                            $sec4Arr['Neonatal_Sepsis_nd'] += cleanvalue($Detail[2]->textContent);
                        } else {
                            $sec4Arr[cleankey($Detail[1]->textContent)] = cleanvalue($Detail[2]->textContent);
                        }
                    }
                }
            }
        }
    }

//    $sec4Arr = getSectionsDetail2($Section4);
    $res4 = insertsqlQry($conn, $sec4Arr, 'section4', $filename, 2);
    $mykeyquery .= $res4['keys'];
    $myvaluequery .= $res4['values'];
    $myupdatequery .= $res4['update'];

    /*================================================Secton 5================================================*/
    $Section5 = $mainHeader->item(19)->getElementsByTagName('table');
    $sec5Arr = getSectionsDetail2($Section5);
    $res5 = insertsqlQry($conn, $sec5Arr, 'section5', $filename, 2);
    $mykeyquery .= $res5['keys'];
    $myvaluequery .= $res5['values'];
    $myupdatequery .= $res5['update'];


    /*================================================Secton 6================================================*/
    $Section6 = $mainHeader->item(22)->getElementsByTagName('table');
    $sec6Arr = getSectionsDetail2($Section6);
    $res6 = insertsqlQry($conn, $sec6Arr, 'section6', $filename, 2);
    $mykeyquery .= $res6['keys'];
    $myvaluequery .= $res6['values'];
    $myupdatequery .= $res6['update'];


    /*================================================Secton 7================================================*/
    $Section7 = $mainHeader->item(25)->getElementsByTagName('table');
    $sec7Arr = getSectionsDetail2($Section7);
    $res7 = insertsqlQry($conn, $sec7Arr, 'section7', $filename, 2);
    $mykeyquery .= $res7['keys'];
    $myvaluequery .= $res7['values'];
    $myupdatequery .= $res7['update'];


    /*================================================Secton  7b================================================*/
    $Section7b = $mainHeader->item(28)->getElementsByTagName('tr');
    $array = array('Opening', 'Received', 'Consumed', 'Closing');
    $sec7bArr = array();
    for ($l = 0; $l < $Section7b->length; $l++) {
        $Detail = $Section7b->item($l)->getElementsByTagName('td');
        foreach ($Detail as $key => $sNodeDetail) {
            if (cleankey($Detail[1]->textContent) == 'Contraceptive_CommoditiesFrom_Stock_Register') {

            } else {
                if ($key == 1 && $array[0] != '') {
                    $sec7bArr[cleankey($Detail[1]->textContent)][cleankey($array[0])] = cleanvalue($Detail[2]->textContent);
                } elseif ($key == 2 && $array[1] != '') {
                    $sec7bArr[cleankey($Detail[1]->textContent)][cleankey($array[1])] = cleanvalue($Detail[3]->textContent);
                } elseif ($key == 3 && isset($array[2]) && $array[2] != '') {
                    $sec7bArr[cleankey($Detail[1]->textContent)][cleankey($array[2])] = cleanvalue($Detail[4]->textContent);
                } elseif ($key == 4 && isset($array[3]) && $array[3] != '') {
                    $sec7bArr[cleankey($Detail[1]->textContent)][cleankey($array[3])] = cleanvalue($Detail[5]->textContent);
                } elseif ($key == 5 && isset($array[4]) && $array[4] != '') {
                    $sec7bArr[cleankey($Detail[1]->textContent)][cleankey($array[4])] = cleanvalue($Detail[6]->textContent);
                }
            }

        }
    }
    $res7b = insertsqlQry($conn, $sec7bArr, 'section7b', $filename, 1);
    $mykeyquery .= $res7b['keys'];
    $myvaluequery .= $res7b['values'];
    $myupdatequery .= $res7b['update'];


    /*================================================Secton  8================================================*/
    $Section8 = $mainHeader->item(29)->getElementsByTagName('table');
    $sec8Arr = getSectionsDetail2($Section8);
    $res8 = insertsqlQry($conn, $sec8Arr, 'section8', $filename, 2);
    $mykeyquery .= $res8['keys'];
    $myvaluequery .= $res8['values'];
    $myupdatequery .= $res8['update'];


    /*================================================Secton  9================================================*/
    $Section9 = $mainHeader->item(32)->getElementsByTagName('table');

    $array = array('value', 'Male', 'Female');
    $sec9Arr = getSectionsDetail($Section9, $array);
    $res9 = insertsqlQry($conn, $sec9Arr, 'section9', $filename, 1);

//    $sec9Arr = getSectionsDetail2($Section9);
//    $res9 = insertsqlQry($conn, $sec9Arr, 'section9', $filename, 2);
    $mykeyquery .= $res9['keys'];
    $myvaluequery .= $res9['values'];
    $myupdatequery .= $res9['update'];


    /*================================================Secton  10================================================*/
    $Section10 = $mainHeader->item(34)->getElementsByTagName('table');
    $array = array('OPD', 'Indoor');
    $sec10Arr = getSectionsDetail($Section10, $array);
    $res10 = insertsqlQry($conn, $sec10Arr, 'section10', $filename, 1);
    $mykeyquery .= $res10['keys'];
    $myvaluequery .= $res10['values'];
    $myupdatequery .= $res10['update'];


    /*================================================Secton  11================================================*/
    /*    $Section11 = $mainHeader->item(37)->getElementsByTagName('table');
        $array = array('OPD', 'Indoor');
        $sec11Arr = getSectionsDetail($Section11, $array);
        $res11 = insertsqlQry($conn, $sec11Arr, 'section11', $filename, 1);
        $mykeyquery .= $res11['keys'];
        $myvaluequery .= $res11['values'];
        $myupdatequery .= $res11['update'];*/


    /*================================================Secton  10B================================================*/
    $Section10b = $mainHeader->item(36)->getElementsByTagName('table');
    $sec10BArr = getSectionsDetail2($Section10b);
    $res10b = insertsqlQry($conn, $sec10BArr, 'section10b', $filename, 2);
    $mykeyquery .= $res10b['keys'];
    $myvaluequery .= $res10b['values'];
    $myupdatequery .= $res10b['update'];

    /*================================================Secton  11================================================*/
    $Section11 = $mainHeader->item(39)->getElementsByTagName('table');
    $sec11Arr = getSectionsDetail2($Section11);
    $res11 = insertsqlQry($conn, $sec11Arr, 'section11', $filename, 2);
    $mykeyquery .= $res11['keys'];
    $myvaluequery .= $res11['values'];
    $myupdatequery .= $res11['update'];


    /*================================================Secton  11B================================================*/
    $Section11B = $mainHeader->item(42)->getElementsByTagName('tr');
    $array = array('Available', 'NotAvailable');
    $sec11BArr = array();
    for ($l = 0; $l < $Section11B->length; $l++) {
        $Detail = $Section11B->item($l)->getElementsByTagName('td');
        foreach ($Detail as $key => $sNodeDetail) {
            if (cleankey($Detail[1]->textContent) == 'Status' || cleankey($Detail[1]->textContent) == 'Available' || cleankey($Detail[1]->textContent) == '') {
            } else {
                if ($key == 1 && $array[0] != '') {
                    $sec11BArr[cleankey($Detail[1]->textContent)][cleankey($array[0])] = cleanvalue($Detail[2]->textContent);
                } elseif ($key == 2 && $array[1] != '') {
                    $sec11BArr[cleankey($Detail[1]->textContent)][cleankey($array[1])] = cleanvalue($Detail[3]->textContent);
                } elseif ($key == 3 && isset($array[2]) && $array[2] != '') {
                    $sec11BArr[cleankey($Detail[1]->textContent)][cleankey($array[2])] = cleanvalue($Detail[4]->textContent);
                } elseif ($key == 4 && isset($array[3]) && $array[3] != '') {
                    $sec11BArr[cleankey($Detail[1]->textContent)][cleankey($array[3])] = cleanvalue($Detail[5]->textContent);
                } elseif ($key == 5 && isset($array[4]) && $array[4] != '') {
                    $sec11BArr[cleankey($Detail[1]->textContent)][cleankey($array[4])] = cleanvalue($Detail[6]->textContent);
                }
            }
        }
    }

    $res11b = insertsqlQry($conn, $sec11BArr, 'section11b', $filename, 1);
    $mykeyquery .= $res11b['keys'];
    $myvaluequery .= $res11b['values'];
    $myupdatequery .= $res11b['update'];


    /*================================================Secton  12A================================================*/
    $Section12A = $mainHeader->item(46)->getElementsByTagName('table');
    $array = array('Allocated Beds', 'Admissions', 'Discharged/DOR (not on same day)', 'Discharged/DOR (on the same day)', 'LAMA', 'Referred', 'Deaths', 'Total of Daily Patient Count', 'Bed Occupancy Rate', 'ALS');
    $sec12AArr = getSectionsDetailByItem($Section12A, $array, 1, 0);
    $res12 = insertsqlQry($conn, $sec12AArr, 'section12', $filename, 1);
    $mykeyquery .= $res12['keys'];
    $myvaluequery .= $res12['values'];
    $myupdatequery .= $res12['update'];


    /*================================================Secton  12B================================================*/
    $Section12B = $mainHeader->item(48)->getElementsByTagName('table');
    $array = array('Number of Admission', 'Number of Deaths');
    $sec12BArr = getSectionsDetail($Section12B, $array);
    $res12b = insertsqlQry($conn, $sec12BArr, 'section12b', $filename, 1);
    $mykeyquery .= $res12b['keys'];
    $myvaluequery .= $res12b['values'];
    $myupdatequery .= $res12b['update'];

    /*================================================Secton  13================================================*/
    $Section13 = $mainHeader->item(50)->getElementsByTagName('table');
    $sec13Arr = getSectionsDetail2($Section13);
    $res13 = insertsqlQry($conn, $sec13Arr, 'section13', $filename, 2);
    $mykeyquery .= $res13['keys'];
    $myvaluequery .= $res13['values'];
    $myupdatequery .= $res13['update'];


    /*================================================Secton  14================================================*/
    $Section14 = $mainHeader->item(53)->getElementsByTagName('table');
    $array = array('Sanctioned', 'Vacant', 'Contract');
    $sec14Arr = getSectionsDetail($Section14, $array);
    $res14 = insertsqlQry($conn, $sec14Arr, 'section14', $filename, 1);
    $mykeyquery .= $res14['keys'];
    $myvaluequery .= $res14['values'];
    $myupdatequery .= $res14['update'];


    /*================================================Secton  15A================================================*/
    $Section15A = $mainHeader->item(55)->getElementsByTagName('table');
    $array = array('Total Receipt', 'Deposited');
    $sec15AArr = getSectionsDetail($Section15A, $array);
    $res15 = insertsqlQry($conn, $sec15AArr, 'section15', $filename, 1);
    $mykeyquery .= $res15['keys'];
    $myvaluequery .= $res15['values'];
    $myupdatequery .= $res15['update'];

    /*================================================Secton  15B================================================*/
    $Section15B = $mainHeader->item(57)->getElementsByTagName('table');
    $array = array('Total Alc. Budget', 'Budget Rlsd to date', 'Expen. Prev. Month', 'Balance to Date');
    $sec15BArr = getSectionsDetail($Section15B, $array);
    $res15b = insertsqlQry($conn, $sec15BArr, 'section15b', $filename, 1);
    $mykeyquery .= $res15b['keys'];
    $myvaluequery .= $res15b['values'];
    $myupdatequery .= $res15b['update'];


    /*================================================Secton  16================================================*/
    $Section16 = $mainHeader->item(59)->getElementsByTagName('tr');
    $array = array('Total Number', 'On Road', 'Repairable', 'OffRoad Condemn');
    $sec16Arr = array();
    $Detail = $Section16->item(4)->getElementsByTagName('td');
    foreach ($Detail as $key => $sNodeDetail) {
        $sec16Arr[cleankey($array[$key])] = cleanvalue($Detail[$key]->textContent);
        $sec16Arr[cleankey($array[$key])] = cleanvalue($Detail[$key]->textContent);
        $sec16Arr[cleankey($array[$key])] = cleanvalue($Detail[$key]->textContent);
        $sec16Arr[cleankey($array[$key])] = cleanvalue($Detail[$key]->textContent);
    }
    $res16 = insertsqlQry($conn, $sec16Arr, 'section16', $filename, 1);
    $mykeyquery .= $res16['keys'];
    $myvaluequery .= $res16['values'];
    $myupdatequery .= $res16['update'];




    /*================================================Secton  17================================================*/
    $Section17 = $mainHeader->item(61)->getElementsByTagName('table');
    $array = array('Number', 'Functional', 'Non-Functional');
    $sec17Arr = array();
    for ($l = 0; $l < $Section17->length; $l++) {
        $Detail = $Section17->item($l)->getElementsByTagName('tr');
        foreach ($Detail as $key => $sNodeDetail) {
            if ($key == 8 || $key == 9) {
                $Details = $Detail->item(8)->getElementsByTagName('td');
                $sec17Arr['Incinerator'][cleankey($array[0])] = cleanvalue($Details[0]->textContent);
                $sec17Arr['Incinerator'][cleankey($array[1])] = cleanvalue($Details[1]->textContent);
                $sec17Arr['Incinerator'][cleankey($array[2])] = cleanvalue($Details[2]->textContent);
            } elseif ($key == 7) {

            } else {
                $Details = $Detail->item($key)->getElementsByTagName('td');
                if (!isset($Details[1]->textContent) || cleankey($Detail[1]->textContent) == 'Status' || cleankey($Detail[1]->textContent) == 'Available' || cleankey($Detail[1]->textContent) == '') {
                } else {
                    $sec17Arr[cleankey($Details[1]->textContent)] = cleanvalue($Details[2]->textContent);
                }
            }
        }
    }

//    $sec17Arr = getSectionsDetail2($Section17);
    $res17 = insertsqlQry($conn, $sec17Arr, 'section17', $filename, 2);
    $mykeyquery .= $res17['keys'];
    $myvaluequery .= $res17['values'];
    $myupdatequery .= $res17['update'];


    /*================================================Secton  17B================================================*/
    $Section17b = $mainHeader->item(63)->getElementsByTagName('table');
    $array = array('Total Number', 'Functional Number');
    $array2 = array('Yes', 'No');
    $sec17bArr = array();
    for ($l = 0; $l < $Section17b->length; $l++) {
        $Detail = $Section17b->item($l)->getElementsByTagName('tr');
        foreach ($Detail as $key => $sNodeDetail) {
            if ($key == 7) {
                $Details = $Detail->item(7)->getElementsByTagName('td');
                $sec17bArr['R.O Plant'][cleankey($array[0])] = cleanvalue($Details[0]->textContent);
                $sec17bArr['R.O Plant'][cleankey($array[1])] = cleanvalue($Details[1]->textContent);
            } elseif ($key == 9) {
                $Details = $Detail->item(9)->getElementsByTagName('td');
                $sec17bArr['Safe Drinking Water'][cleankey($array2[0])] = cleanvalue($Details[0]->textContent);
                $sec17bArr['Safe Drinking Water'][cleankey($array2[1])] = cleanvalue($Details[1]->textContent);
            } elseif ($key == 6 || $key == 8) {

            } else {
                $Details = $Detail->item($key)->getElementsByTagName('td');
                if (!isset($Details[1]->textContent) || cleankey($Detail[1]->textContent) == 'Status' || cleankey($Detail[1]->textContent) == 'Available' || cleankey($Detail[1]->textContent) == '') {
                } else {
                    $sec17bArr[cleankey($Details[1]->textContent)] = cleanvalue($Details[2]->textContent);
                }
            }
        }
    }

//    $sec17bArr = getSectionsDetail2($Section17b);
    $res17b = insertsqlQry($conn, $sec17bArr, 'section17b', $filename, 2);
    $mykeyquery .= $res17b['keys'];
    $myvaluequery .= $res17b['values'];
    $myupdatequery .= $res17b['update'];


    /*================================================Secton  18================================================*/
    $Section18 = $mainHeader->item(65)->getElementsByTagName('tr');
    $array = array('Functional', 'Non Functional', 'Not Applicable');

    $sec18Arr = array();
    for ($l = 0; $l < $Section18->length; $l++) {
        $Detail = $Section18->item($l)->getElementsByTagName('td');
        foreach ($Detail as $key => $sNodeDetail) {
            if (cleankey($Detail[1]->textContent) == 'Service_Type' || cleankey($Detail[1]->textContent) == 'Functional' || cleankey($Detail[1]->textContent) == '') {
            } else {
                if ($key == 1 && $array[0] != '') {
                    $sec18Arr[cleankey($Detail[1]->textContent)][cleankey($array[0])] = cleanvalue($Detail[2]->textContent);
                } elseif ($key == 2 && $array[1] != '') {
                    $sec18Arr[cleankey($Detail[1]->textContent)][cleankey($array[1])] = cleanvalue($Detail[3]->textContent);
                } elseif ($key == 3 && isset($array[2]) && $array[2] != '') {
                    $sec18Arr[cleankey($Detail[1]->textContent)][cleankey($array[2])] = cleanvalue($Detail[4]->textContent);
                } elseif ($key == 4 && isset($array[3]) && $array[3] != '') {
                    $sec18Arr[cleankey($Detail[1]->textContent)][cleankey($array[3])] = cleanvalue($Detail[5]->textContent);
                } elseif ($key == 5 && isset($array[4]) && $array[4] != '') {
                    $sec18Arr[cleankey($Detail[1]->textContent)][cleankey($array[4])] = cleanvalue($Detail[6]->textContent);
                }
            }
        }
    }
//    $sec18Arr = getSectionsDetailByItem($Section18, $array,2, 0);
    $res18 = insertsqlQry($conn, $sec18Arr, 'section18', $filename, 1);

    $mykeyquery .= $res18['keys'];
    $myvaluequery .= $res18['values'];
    $myupdatequery .= $res18['update'];

    /*$createTable = 'CREATE TABLE [dbo].[sindh_new_primary] (';
    $ex = explode(',', $mykeyquery);
    foreach ($ex as $keyss => $vlauess) {
        $createTable .= $vlauess . ' varchar(10) NULL, ';
    }


    $createTable .= ')';

    echo $createTable;
    exit();*/


    if (isset($doupdate) && $doupdate == 'Yes') {
        $update = "  ELSE UPDATE  " . $table . " SET " . $myupdatequery . " WHERE file_no = '" . $filename . "'";
    } else {
        $update = "";
    }
    $myquery = " IF NOT EXISTS  (SELECT * FROM " . $table . " WHERE file_no = '" . $filename . "')
         INSERT INTO " . $table . " ( report_created_date," . $mykeyquery . " ) VALUES ('" . $report_created_date . "'," . $myvaluequery . ")
       $update";
    if (sqlsrv_query($conn, $myquery)) {
        $result = "<p style='color: green'>Success</p><br>";
    } else {
        $result = "<p style='color: red'>Error on $myquery error</p><br>";
    }
    echo $result;


}

function insertSecondaryAllProvince($conn, $province, $filepath, $filename, $form_type, $table, $doupdate)
{
    $report_created_date = date('Y-m-d H:i:s');
    $mykeyquery = '';
    $myvaluequery = '';
    $myupdatequery = '';
    $htmlContent = file_get_contents($filepath);
    $DOM = new DOMDocument();
    libxml_use_internal_errors(1);
    $DOM->loadHTML($htmlContent);
    $mainHeader = $DOM->getElementsByTagName('table');
    /*================================================Secton 1================================================*/
    $Section1b = $mainHeader->item(5)->getElementsByTagName('table');
    $secArr1b = getSections1Detail($Section1b);
    $secArr1a = array();
    $Section1a = $mainHeader->item(0)->getElementsByTagName('table');
    $HeaderSec1a = $Section1a->item(1)->getElementsByTagName('tr');
    $Detail1a = $HeaderSec1a->item(0)->getElementsByTagName('td');
    foreach ($Detail1a as $key => $sNodeDetail) {
        if ($key == 1) {
            $secArr1a[cleankey('month_year')] = cleanvalue($sNodeDetail->textContent);
        } elseif ($key == 3) {
            $secArr1a[cleankey('working_days')] = cleanvalue($sNodeDetail->textContent);
        } else {
        }
    }

    $mykeyquery .= 'file_no,form_type,province,file_name, month_year, working_days, 
facility_id, facility_name, tehsil, facility_incharge, designation, receiving_date';

    $myvaluequery .= " '" . $filename . "','" . $form_type . "','" . $province . "','PHC Facility Monthly Report','" . str_replace(' ', '-', $secArr1a['month_year']) . "','" . $secArr1a['working_days'] . "',
'" . $secArr1b['Facility_ID'] . "','" . $secArr1b['Facility_Name'] . "','" . $secArr1b['Tehsil'] . "','" . $secArr1b['Facility_Incharge'] . "',
'" . $secArr1b['Designation'] . "','" . $secArr1b['Receiving_Date'] . "'";

    $myupdatequery .= "form_type='" . $form_type . "',province='" . $province . "',file_name='PHC Facility Monthly Report',
 month_year='" . str_replace(' ', '-', $secArr1a['month_year']) . "', working_days='" . $secArr1a['working_days'] . "', 
facility_id='" . $secArr1b['Facility_ID'] . "', facility_name='" . $secArr1b['Facility_Name'] . "', tehsil='" . $secArr1b['Tehsil'] . "', 
facility_incharge='" . $secArr1b['Facility_Incharge'] . "',
 designation='" . $secArr1b['Designation'] . "', receiving_date='" . $secArr1b['Receiving_Date'] . "' ";


    /*================================================Secton 2================================================*/
    $Section2 = $mainHeader->item(9)->getElementsByTagName('table');
    $array = array('Target', 'Performance');
    $sec2Arr = getSectionsDetail($Section2, $array);
    $res2 = insertsqlQry($conn, $sec2Arr, 'section2', $filename, 1);
    $mykeyquery .= $res2['keys'];
    $myvaluequery .= $res2['values'];
    $myupdatequery .= $res2['update'];

    /*================================================Secton 3================================================*/
    $Section3 = $mainHeader->item(12)->getElementsByTagName('table');
    $array = array('(M) <1 Year	', '(M)1-4', '(M)1-11 month', '(M)5-14', '(M) 15-49', '(M)50+',
        '(F) <1 year', '(F)1-11 month', '(F) 1-4', '(F) 5-14', '(F) 15-49', '(F) 50+', 'Total', 'Followup', 'Acute (Low Weight for Age)',
        'Acute (MUAC <12.5 cm)', 'Chronic (short Height for Age)', 'Referred Attended');
    $sec3Arr = getSectionsDetailByItem($Section3, $array, 3, 0);
    $res3 = insertsqlQry($conn, $sec3Arr, 'section3', $filename, 1);
    $mykeyquery .= $res3['keys'];
    $myvaluequery .= $res3['values'];
    $myupdatequery .= $res3['update'];


    /*================================================Secton 4================================================*/
    $Section4 = $mainHeader->item(14)->getElementsByTagName('table');
//    $sec4Arr = getSectionsDetail2($Section4);
    $sec4Arr = array();
    for ($z = 0; $z < $Section4->length; $z++) {
        $HeaderSec = $Section4->item($z)->getElementsByTagName('tr');
        $cntHeaderSec = $Section4->item($z)->getElementsByTagName('tr')->length;
        for ($l = 0; $l < $cntHeaderSec; $l++) {
            $Detail = $HeaderSec->item($l)->getElementsByTagName('td');
            foreach ($Detail as $key => $sNodeDetail) {
                if ($key == 1) {
                    if (isset($sec4Arr[cleankey($Detail[1]->textContent)]) && $sec4Arr[cleankey($Detail[1]->textContent)] != '') {
                        if (cleankey($Detail[1]->textContent) == 'Birth_Asphyxia') {
                            $sec4Arr['Birth_Asphyxia_nd'] += cleanvalue($Detail[2]->textContent);
                        } elseif (cleankey($Detail[1]->textContent) == 'Neonatal_Sepsis') {
                            $sec4Arr['Neonatal_Sepsis_nd'] += cleanvalue($Detail[2]->textContent);
                        } else {
                            $sec4Arr[cleankey($Detail[1]->textContent)] = cleanvalue($Detail[2]->textContent);
                        }
                    } else {
                        if (cleankey($Detail[1]->textContent) == 'Birth_Asphyxia') {
                            $sec4Arr['Birth_Asphyxia_nd'] += cleanvalue($Detail[2]->textContent);
                        } elseif (cleankey($Detail[1]->textContent) == 'Neonatal_Sepsis') {
                            $sec4Arr['Neonatal_Sepsis_nd'] += cleanvalue($Detail[2]->textContent);
                        } else {
                            $sec4Arr[cleankey($Detail[1]->textContent)] = cleanvalue($Detail[2]->textContent);
                        }
                    }
                }
            }
        }
    }
    $res4 = insertsqlQry($conn, $sec4Arr, 'section4', $filename, 2);
    if (isset($res4['keys']) && $res4['keys'] != '') {
        $mykeyquery .= $res4['keys'];
        $myvaluequery .= $res4['values'];
        $myupdatequery .= $res4['update'];
    }


    /*================================================Secton 5================================================*/
    $Section5 = $mainHeader->item(17)->getElementsByTagName('table');
    $sec5Arr = getSectionsDetail2($Section5);
    $res5 = insertsqlQry($conn, $sec5Arr, 'section5', $filename, 2);
    $mykeyquery .= $res5['keys'];
    $myvaluequery .= $res5['values'];
    $myupdatequery .= $res5['update'];


    /*================================================Secton 6================================================*/
    $Section6 = $mainHeader->item(20)->getElementsByTagName('table');
    $sec6Arr = getSectionsDetail2($Section6);
    $res6 = insertsqlQry($conn, $sec6Arr, 'section6', $filename, 2);
    $mykeyquery .= $res6['keys'];
    $myvaluequery .= $res6['values'];
    $myupdatequery .= $res6['update'];


    /*================================================Secton 7================================================*/
    $Section7 = $mainHeader->item(23)->getElementsByTagName('table');
//    $sec7Arr = getSectionsDetail2($Section7);
    $sec7Arr = array();
    for ($z = 0; $z < 2; $z++) {
        $HeaderSec = $Section7->item($z)->getElementsByTagName('tr');
        $cntHeaderSec = $Section7->item($z)->getElementsByTagName('tr')->length;
        for ($l = 0; $l < $cntHeaderSec; $l++) {
            $Detail = $HeaderSec->item($l)->getElementsByTagName('td');
            foreach ($Detail as $key => $sNodeDetail) {
                if ($key == 1) {
                    if (isset($sec7Arr[cleankey($Detail[1]->textContent)]) && $sec7Arr[cleankey($Detail[1]->textContent)] != '') {
                        $sec7Arr[cleankey($Detail[1]->textContent)] += cleanvalue($Detail[2]->textContent);
                    } else {
                        $sec7Arr[cleankey($Detail[1]->textContent)] = cleanvalue($Detail[2]->textContent);
                    }
                }
            }
        }
    }

    $res7 = insertsqlQry($conn, $sec7Arr, 'section7', $filename, 2);
    $mykeyquery .= $res7['keys'];
    $myvaluequery .= $res7['values'];
    $myupdatequery .= $res7['update'];


    /*================================================Secton  7b================================================*/
    $Section7b = $Section7->item(2)->getElementsByTagName('tr');
    $array = array('Opening', 'Received', 'Consumed', 'Closing');
    $sec7bArr = array();
    for ($l = 0; $l < $Section7b->length; $l++) {
        $Detail = $Section7b->item($l)->getElementsByTagName('td');
        foreach ($Detail as $key => $sNodeDetail) {
            if (cleankey($Detail[1]->textContent) == 'Contraceptive_CommoditiesFrom_Stock_Register') {

            } else {
                if ($key == 1 && $array[0] != '') {
                    $sec7bArr[cleankey($Detail[1]->textContent)][cleankey($array[0])] = cleanvalue($Detail[2]->textContent);
                } elseif ($key == 2 && $array[1] != '') {
                    $sec7bArr[cleankey($Detail[1]->textContent)][cleankey($array[1])] = cleanvalue($Detail[3]->textContent);
                } elseif ($key == 3 && isset($array[2]) && $array[2] != '') {
                    $sec7bArr[cleankey($Detail[1]->textContent)][cleankey($array[2])] = cleanvalue($Detail[4]->textContent);
                } elseif ($key == 4 && isset($array[3]) && $array[3] != '') {
                    $sec7bArr[cleankey($Detail[1]->textContent)][cleankey($array[3])] = cleanvalue($Detail[5]->textContent);
                }
            }

        }
    }
    $res7b = insertsqlQry($conn, $sec7bArr, 'section7b', $filename, 1);
    $mykeyquery .= $res7b['keys'];
    $myvaluequery .= $res7b['values'];
    $myupdatequery .= $res7b['update'];

    /*================================================Secton  8================================================*/
    $Section8 = $mainHeader->item(27)->getElementsByTagName('table');
    $sec8Arr = getSectionsDetail2($Section8);
    $res8 = insertsqlQry($conn, $sec8Arr, 'section8', $filename, 2);
    $mykeyquery .= $res8['keys'];
    $myvaluequery .= $res8['values'];
    $myupdatequery .= $res8['update'];

    /*================================================Secton  9================================================*/
    $Section9 = $mainHeader->item(30)->getElementsByTagName('table');
    $array = array('Male', 'Female');
    $sec9Arr = getSectionsDetailByItem($Section9, $array, 2, 0);
    $res9 = insertsqlQry($conn, $sec9Arr, 'section9', $filename, 1);
    $mykeyquery .= $res9['keys'];
    $myvaluequery .= $res9['values'];
    $myupdatequery .= $res9['update'];

    /*================================================Secton  10================================================*/
    /* $Section10 = $mainHeader->item(32)->getElementsByTagName('table');
     $sec10Arr = getSectionsDetail2($Section10);
     $res10 = insertsqlQry($conn, $sec10Arr, 'section10', $filename, 2);
     $mykeyquery .= $res10['keys'];
     $myvaluequery .= $res10['values'];
     $myupdatequery .= $res10['update'];*/

    /*================================================Secton  10================================================*/
    $Section10 = $mainHeader->item(32)->getElementsByTagName('table');
    $array = array('OPD', 'Indoor');
    $sec10Arr = getSectionsDetail($Section10, $array);
    $res10 = insertsqlQry($conn, $sec10Arr, 'section10', $filename, 1);
    $mykeyquery .= $res10['keys'];
    $myvaluequery .= $res10['values'];
    $myupdatequery .= $res10['update'];


    /*================================================Secton  10B================================================*/
    $Section10B = $mainHeader->item(34)->getElementsByTagName('table');
    $sec10BArr = getSectionsDetail2($Section10B);
    $res10B = insertsqlQry($conn, $sec10BArr, 'section10B', $filename, 2);
    $mykeyquery .= $res10B['keys'];
    $myvaluequery .= $res10B['values'];
    $myupdatequery .= $res10B['update'];


    /*================================================Secton  11================================================*/
    $Section11 = $mainHeader->item(36)->getElementsByTagName('table');
    $sec11Arr = getSectionsDetail2($Section11);
    $res11 = insertsqlQry($conn, $sec11Arr, 'section11', $filename, 2);
    $mykeyquery .= $res11['keys'];
    $myvaluequery .= $res11['values'];
    $myupdatequery .= $res11['update'];


    /*================================================Secton  11B================================================*/
    $Section11B = $mainHeader->item(39)->getElementsByTagName('table');
    $array = array('Available', 'Not Available');
    $sec11BArr = getSectionsDetailByItem($Section11B, $array, 2, 0);
    $res11b = insertsqlQry($conn, $sec11BArr, 'section11b', $filename, 1);
    $mykeyquery .= $res11b['keys'];
    $myvaluequery .= $res11b['values'];
    $myupdatequery .= $res11b['update'];

    /*================================================Secton  11B Part 2================================================*/
    $HeaderSec = $Section11B->item(1)->getElementsByTagName('tr');
    for ($l = 2; $l < $HeaderSec->length; $l++) {
        $Detail = $HeaderSec->item($l)->getElementsByTagName('td');
        foreach ($Detail as $key => $sNodeDetail) {
            if ($key == 1 && $array[0] != '') {
                $sec11B2Arr[cleankey($Detail[1]->textContent)][cleankey($array[0])] = cleanvalue($Detail[2]->textContent);
            } elseif ($key == 2 && $array[1] != '') {
                $sec11B2Arr[cleankey($Detail[1]->textContent)][cleankey($array[1])] = cleanvalue($Detail[3]->textContent);
            }
        }
    }
    $res11b2 = insertsqlQry($conn, $sec11B2Arr, 'section11b2', $filename, 1);
    $mykeyquery .= $res11b2['keys'];
    $myvaluequery .= $res11b2['values'];
    $myupdatequery .= $res11b2['update'];


    /*================================================Secton  12A================================================*/
    $Section12A = $mainHeader->item(42)->getElementsByTagName('table');
    $array = array('Allocated Beds', 'Admissions', 'Discharged/DOR (not on same day)', 'Discharged/DOR (on the same day)', 'LAMA', 'Referred', 'Deaths', 'Total of Daily Patient Count', 'Bed Occupancy Rate', 'ALS');
    $sec12AArr = getSectionsDetailByItem($Section12A, $array, 1, 0);
    $res12 = insertsqlQry($conn, $sec12AArr, 'section12', $filename, 1);
    $mykeyquery .= $res12['keys'];
    $myvaluequery .= $res12['values'];
    $myupdatequery .= $res12['update'];

    /*================================================Secton  12B================================================*/
    $Section12B = $mainHeader->item(44)->getElementsByTagName('table');
    $array = array('Number of Admission', 'Number of Deaths');
    $sec12BArr = getSectionsDetailByItem($Section12B, $array, 2, 81);
    $res12b = insertsqlQry($conn, $sec12BArr, 'section12b', $filename, 1);

    $mykeyquery .= $res12b['keys'];
    $myvaluequery .= $res12b['values'];
    $myupdatequery .= $res12b['update'];
    /*================================================Secton  13================================================*/
    $Section13 = $mainHeader->item(46)->getElementsByTagName('table');
    $sec13Arr = getSectionsDetail2($Section13);
    $res13 = insertsqlQry($conn, $sec13Arr, 'section13', $filename, 2);
    $mykeyquery .= $res13['keys'];
    $myvaluequery .= $res13['values'];
    $myupdatequery .= $res13['update'];


    /*================================================Secton  14================================================*/
    $Section14 = $mainHeader->item(49)->getElementsByTagName('table');
    $array = array('Sanctioned', 'Vacant', 'Contract');
    $sec14Arr = getSectionsDetailByItem($Section14, $array, 1, 0);
    $res14 = insertsqlQry($conn, $sec14Arr, 'section14', $filename, 1);
    $mykeyquery .= $res14['keys'];
    $myvaluequery .= $res14['values'];
    $myupdatequery .= $res14['update'];


    /*================================================Secton  15A================================================*/
    $Section15A = $mainHeader->item(51)->getElementsByTagName('table');
    $array = array('Total Receipt', 'Deposited');
    $sec15AArr = getSectionsDetailByItem($Section15A, $array, 1, 0);
    $res15 = insertsqlQry($conn, $sec15AArr, 'section15', $filename, 1);
    $mykeyquery .= $res15['keys'];
    $myvaluequery .= $res15['values'];
    $myupdatequery .= $res15['update'];

    /*================================================Secton  15B================================================*/
    $Section15B = $mainHeader->item(53)->getElementsByTagName('table');
    $array = array('Total Alc. Budget', 'Budget Rlsd to date', 'Expen. Prev. Month', 'Balance to Date');
    $sec15BArr = getSectionsDetailByItem($Section15B, $array, 1, 0);
    $res15b = insertsqlQry($conn, $sec15BArr, 'section15b', $filename, 1);
    $mykeyquery .= $res15b['keys'];
    $myvaluequery .= $res15b['values'];
    $myupdatequery .= $res15b['update'];


    if (isset($doupdate) && $doupdate == 'Yes') {
        $update = "  ELSE UPDATE  " . $table . " SET " . $myupdatequery . " WHERE file_no = '" . $filename . "'";
    } else {
        $update = "";
    }
    $myquery = " IF NOT EXISTS  (SELECT * FROM " . $table . " WHERE file_no = '" . $filename . "')
         INSERT INTO " . $table . " ( report_created_date," . $mykeyquery . " ) VALUES ('" . $report_created_date . "'," . $myvaluequery . ")
         $update ";

    if (sqlsrv_query($conn, $myquery)) {
        $result = "<p style='color: green'>Success</p><br>";
    } else {
        $result = "<p style='color: red'>Error on $myquery  error</p><br>";
    }
    echo $result;
}

?>