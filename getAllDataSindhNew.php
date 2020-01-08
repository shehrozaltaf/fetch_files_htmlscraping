<?php
include 'config.php';
ini_set('memory_limit', '256M');
ini_set('max_execution_time', -1);
date_default_timezone_set('Asia/Karachi');

$error = 0;
$select = ' * ';
$where = '';
$province = '';
$type = '';
$yearTo = '';
$yearFrom = '';
if (isset($_POST['SelectProvince']) && $_POST['SelectProvince'] != '0') {
    $province = $_POST['SelectProvince'];
} else {
    $error = 1;
    echo 'Please select province';
    exit();
}

if (isset($_POST['SelectType']) && $_POST['SelectType'] != '') {
    $type = $_POST['SelectType'];
    if ($type == 'primary') {
        $select = '	file_no,
	form_type,
	province,
	file_name,
	month_year,
	working_days,
	facility_id,
	facility_name,
	tehsil,
	facility_incharge,
	designation,
	receiving_date,
	Total_OPD_Attendance_Target,
	Total_OPD_Attendance_Performance,
	Children_Target,
	Children_Performance,
	Antenatal_Care_ANC_1coverage_Target,
	Antenatal_Care_ANC_1coverage_Performance,
	Total_FP_clientsNew_plus_Follow_up_Target,
	Total_FP_clientsNew_plus_Follow_up_Performance,
	Delivery_coverage_at_facility_Target,
	Delivery_coverage_at_facility_Performance,
	Monthly_report_data_accuracy_Target,
	Monthly_report_data_accuracy_Performance,
	Malenew_cases_lessthan_1yrs,
	Malenew_cases_lessthan_1_11months,
	Malenew_cases_1_4yrs,
	Malenew_cases_5_14,
	Malenew_cases_15_49,
	Malenew_cases_50plus,
	Malenew_cases_Total,
	Femalenew_cases_lessthan_1yrs,
	Femalenew_cases_lessthan_1_11months,
	Femalenew_cases_1_4yrs,
	Femalenew_cases_5_14,
	Femalenew_cases_15_49,
	Femalenew_cases_50plus,
	Femalenew_cases_Total,
	Grand_Total_lessthan_1yrs,
	Grand_Total_lessthan_1_11months,
	Grand_Total_1_4yrs,
	Grand_Total_5_14,
	Grand_Total_15_49,
	Grand_Total_50plus,
	Grand_Total_Total,
	Follow_up_cases,
	Referred_cases_attended,
	Noof_cases_of_Malnutrition,
	Total_Homeo_cases,
	Total_Tibb_Unani,
	AcuteupperRespiratory_infections,
	Pneumonia_lessthan_5_years,
	Pneumonia_greaterthan_5_years,
	TB_Suspects,
	Chronic_Obstructive_Pulmonary_Diseases,
	Asthma,
	Diarrhea,
	Dysentery,
	Diarrhea_Dysentery_in_greaterthan_5_yrs,
	Enteric_Typhoid_Fever,
	Worm_infestation,
	Peptic_Acid_Diseases,
	Biliary_Disorders,
	Urinary_Tract_Infections,
	Renal_Calculi,
	End_Stage_Renal_DiseaseESRD,
	Sexually_Transmitted_Infections_STIs,
	Benign_Enlargement_of_Prostate,
	Suspected_Malaria,
	Suspected_Dengue_Fever,
	Suspected_Chikungunya,
	Suspected_Cutaneous_Leishmaniasis,
	Suspected_Measles,
	Suspected_Viral_Hepatitis,
	Suspected_Neonatal_Tetanus,
	Ischemic_Heart_Disease,
	Hypertension,
	Scabies,
	Dermatitis,
	Fungal_Infection,
	Impetigo,
	Diabetes_Mellitus,
	Goiter,
	Hypo_Thyroidism,
	Hyper_Thyroidism,
	Depression,
	Drug_Dependence,
	Epilepsy,
	Children_adolescent_with_abnormal_behavior,
	Cataract,
	Trachoma,
	Glaucoma,
	Conjunctivitis,
	Otitis_media,
	Dental_Caries,
	Periodontitis,
	Sub_Mucosal_Fibrosis,
	Oral_Ulcers,
	Road_traffic_accidents,
	Fractures,
	Burns,
	Dog_bite,
	Snake_biteswith_signs_symptoms_of_poisoning,
	Birth_Asphyxia_nd,
	Neonatal_Sepsis_nd,
	Fever_due_to_other_causes,
	Suspected_Meningitis,
	Acute_Flaccid_Paralysis,
	Suspected_HIVAIDS,
	Children_lessthan_12_months_received_3rd_Pentavale,
	Children_lessthan_12_months_received_first_measles,
	Pregnant_women_received_TT_2_vaccine,
	Number_of_diagnosed_cases_AFBplusve_clinical_extra,
	Number_of_TB_cases_started_treatment_during_the_mo,
	Number_of_TB_cases_completed_treatment_during_the_,
	Total_FP_new_clients,
	Total_FP_follow_up_clients,
	COC_clients,
	POP_clients,
	DMPA_injclients,
	Net_En_Injclients,
	Condom_clients,
	IUCD_clients,
	PPIUCD_clients,
	Tubal_Ligation_clients,
	Vasectomy_clients,
	Implants_clients,
	PP_Implant_clients,
	Counseling_provided_on_FP,
	Condompieces_Opening,
	Condompieces_Received,
	Condompieces_Consumed,
	Condompieces_Closing,
	Oral_pill_COCcycles_Opening,
	Oral_pill_COCcycles_Received,
	Oral_pill_COCcycles_Consumed,
	Oral_pill_COCcycles_Closing,
	Oral_pill_POPcycles_Opening,
	Oral_pill_POPcycles_Received,
	Oral_pill_POPcycles_Consumed,
	Oral_pill_POPcycles_Closing,
	IUCDpieces_Opening,
	IUCDpieces_Received,
	IUCDpieces_Consumed,
	IUCDpieces_Closing,
	Injection_DMPAvials_Opening,
	Injection_DMPAvials_Received,
	Injection_DMPAvials_Consumed,
	Injection_DMPAvials_Closing,
	Injection_Net_En_Opening,
	Injection_Net_En_Received,
	Injection_Net_En_Consumed,
	Injection_Net_En_Closing,
	Implant_Opening,
	Implant_Received,
	Implant_Consumed,
	Implant_Closing,
	Any_otherSpecify_Opening,
	Any_otherSpecify_Received,
	Any_otherSpecify_Consumed,
	Any_otherSpecify_Closing,
	ANC_1,
	ANC_1_women_with_Hb,
	ANC_2,
	ANC_3,
	ANC_4_or_More,
	PNC_1,
	PNC_2,
	PNC_3,
	PNC_4,
	Malnourished_Pregnant_womenANC_1,
	Malnourished_Lactating_womenPNC_1,
	PW_given_Misoprostol_Tablet,
	Normal_vaginal_deliveries,
	Assisted_Deliveries,
	Cesarean_Sections,
	Total_live_births,
	Live_births_with_LBWlessthan_2_5kg,
	Preterm_Live_births,
	Birth_Asphyxia,
	Neonatal_sepsis,
	Stillbirths,
	Neonates_received_ChlorohexidineCHX,
	Neonatal_deaths_in_the_facility,
	Women_Referred_for_PPIUCD,
	Number_of_Participants_value,
	Female_value,
	Noof_community_meetings_value,
	Noof_community_meetings_Male,
	Noof_community_meetings_Female,
	Noof_Health_Education_Sessions_value,
	Noof_Health_Education_Sessions_Male,
	Noof_Health_Education_Sessions_Female,
	Total_Lab_Investigations_OPD,
	Total_Lab_Investigations_Indoor,
	Total_X_Rays_OPD,
	Total_X_Rays_Indoor,
	Total_Ultra_Sonographies_OPD,
	Total_Ultra_Sonographies_Indoor,
	Total_ECGs_OPD,
	Total_ECGs_Indoor,
	Slides_examined,
	Slides_MP_plusve,
	Slides_PFalciparum_plusve,
	Sides_of_PVivax_plusve,
	Rapid_Diagnostic_TestRDT,
	Slides_for_AFB_Diagnosis_New,
	Slides_Diagnosed_Cases_AFB_plusve,
	Patients_screened,
	Hepatitis_B_plusve,
	Hepatitis_C_plusve,
	CapAmoxicillin,
	Amoxicillin_Dispersible_Tablet,
	SypAmoxicillin,
	TabCotrimoxazole,
	SypCotrimoxazole,
	TabMetronidazole,
	SypMetronidazole,
	InjAmpicillin,
	TabDiclofenac,
	SypParacetamol,
	injDiclofenac,
	TabChloroquine,
	SypSalbutamol,
	Syp_Anthelmintic,
	I_V_Infusion,
	InjDexamethasone,
	TabIronFolic_Acid,
	ORSlow_Osmolarity,
	ChlorohexidineCHX,
	TabMisoprostol,
	InjMagnesium_Sulfate,
	SypZinc,
	Zinc_TabletDT,
	Anti_Snake_Venom,
	A_1_BCG_Vaccine_Available,
	A_1_BCG_Vaccine_NotAvailable,
	Pentavalent_Vaccine_Available,
	Pentavalent_Vaccine_NotAvailable,
	OPV_Available,
	OPV_NotAvailable,
	IPV_vaccine_Available,
	IPV_vaccine_NotAvailable,
	Hepatitis__B_Vaccine_Available,
	Hepatitis__B_Vaccine_NotAvailable,
	Measles_vaccine_Available,
	Measles_vaccine_NotAvailable,
	Tetanus_Toxoid_Available,
	Tetanus_Toxoid_NotAvailable,
	PCV_10_vaccine_Available,
	PCV_10_vaccine_NotAvailable,
	Rota_virus_vaccine_Available,
	Rota_virus_vaccine_NotAvailable,
	Anti_Rabies_Vaccine_Available,
	Anti_Rabies_Vaccine_NotAvailable,
	Vaccine_Syringes_Available,
	Vaccine_Syringes_NotAvailable,
	Male_Allocated_Beds,
	Male_Admissions,
	Male_Discharged_DORnot_on_same_day,
	Male_Discharged_DORon_the_same_day,
	Male_LAMA,
	Male_Referred,
	Male_Deaths,
	Male_Total_of_Daily_Patient_Count,
	Male_Bed_Occupancy_Rate,
	Male_ALS,
	Female_Allocated_Beds,
	Female_Admissions,
	Female_Discharged_DORnot_on_same_day,
	Female_Discharged_DORon_the_same_day,
	Female_LAMA,
	Female_Referred,
	Female_Deaths,
	Female_Total_of_Daily_Patient_Count,
	Female_Bed_Occupancy_Rate,
	Female_ALS,
	Diarrhea_lessthan_5_yrs_Number_of_Admission,
	Diarrhea_lessthan_5_yrs_Number_of_Deaths,
	Dysentery_lessthan_5_yrs_Number_of_Admission,
	Dysentery_lessthan_5_yrs_Number_of_Deaths,
	Pneumonia_in_lessthan_5_yrs_Number_of_Admission,
	Pneumonia_in_lessthan_5_yrs_Number_of_Deaths,
	Malaria_Number_of_Admission,
	Malaria_Number_of_Deaths,
	Pulmonary_Tuberculosis_Number_of_Admission,
	Pulmonary_Tuberculosis_Number_of_Deaths,
	Obstetric_Maternal_Complication_Number_of_Admission,
	Obstetric_Maternal_Complication_Number_of_Deaths,
	Other_Causes_Number_of_Admission,
	Other_Causes_Number_of_Deaths,
	Total_Number_of_Admission,
	Total_Number_of_Deaths,
	Operations_under_GA,
	Operations_under_spinal_Anesthesia,
	Operations_under_LA,
	Procedures_done_without_done_Anesthesia,
	Medical_Superintendent_Sanctioned,
	Medical_Superintendent_Vacant,
	Medical_Superintendent_Contract,
	Senior_Medical_Officer_Sanctioned,
	Senior_Medical_Officer_Vacant,
	Senior_Medical_Officer_Contract,
	Pediatrician_Sanctioned,
	Pediatrician_Vacant,
	Pediatrician_Contract,
	Gynecologist_Sanctioned,
	Gynecologist_Vacant,
	Gynecologist_Contract,
	Medical_Officer_Sanctioned,
	Medical_Officer_Vacant,
	Medical_Officer_Contract,
	Women_Lady_Medical_Officer_Sanctioned,
	Women_Lady_Medical_Officer_Vacant,
	Women_Lady_Medical_Officer_Contract,
	Dental_Surgeon_Sanctioned,
	Dental_Surgeon_Vacant,
	Dental_Surgeon_Contract,
	Staff_NurseFemale_Sanctioned,
	Staff_NurseFemale_Vacant,
	Staff_NurseFemale_Contract,
	Staff_NurseMale_Sanctioned,
	Staff_NurseMale_Vacant,
	Staff_NurseMale_Contract,
	Lab_Technician_Sanctioned,
	Lab_Technician_Vacant,
	Lab_Technician_Contract,
	Dental_Technician_Sanctioned,
	Dental_Technician_Vacant,
	Dental_Technician_Contract,
	X_Ray_Technician_Sanctioned,
	X_Ray_Technician_Vacant,
	X_Ray_Technician_Contract,
	Health_Technician_Sanctioned,
	Health_Technician_Vacant,
	Health_Technician_Contract,
	Lady_Health_Visitor_Sanctioned,
	Lady_Health_Visitor_Vacant,
	Lady_Health_Visitor_Contract,
	Dispenser_Sanctioned,
	Dispenser_Vacant,
	Dispenser_Contract,
	EPI_Vaccinator_Sanctioned,
	EPI_Vaccinator_Vacant,
	EPI_Vaccinator_Contract,
	Midwife_Sanctioned,
	Midwife_Vacant,
	Midwife_Contract,
	Others_Sanctioned,
	Others_Vacant,
	Others_Contract,
	Number_of_LHWs_reporting_at_HF_Sanctioned,
	Number_of_LHWs_reporting_at_HF_Vacant,
	Number_of_LHWs_reporting_at_HF_Contract,
	OPD_Total_Receipt,
	OPD_Deposited,
	Indoor_Total_Receipt,
	Indoor_Deposited,
	Laboratory_Total_Receipt,
	Laboratory_Deposited,
	ECG_Total_Receipt,
	ECG_Deposited,
	X_Ray_Total_Receipt,
	X_Ray_Deposited,
	Ultrasound_Total_Receipt,
	Ultrasound_Deposited,
	Dental_Procedures_Total_Receipt,
	Dental_Procedures_Deposited,
	Ambulance_Total_Receipt,
	Ambulance_Deposited,
	Others_Total_Receipt,
	Others_Deposited,
	Salary_AllowancesEstablishment_Charges_Total_AlcBudget,
	Salary_AllowancesEstablishment_Charges_Budget_Rlsd_to_date,
	Salary_AllowancesEstablishment_Charges_ExpenPrevMonth,
	Salary_AllowancesEstablishment_Charges_Balance_to_Date,
	Non_SalaryOperating_Expenses_Total_AlcBudget,
	Non_SalaryOperating_Expenses_Budget_Rlsd_to_date,
	Non_SalaryOperating_Expenses_ExpenPrevMonth,
	Non_SalaryOperating_Expenses_Balance_to_Date,
	Utilities_Total_AlcBudget,
	Utilities_Budget_Rlsd_to_date,
	Utilities_ExpenPrevMonth,
	Utilities_Balance_to_Date,
	Medicine_Total_AlcBudget,
	Medicine_Budget_Rlsd_to_date,
	Medicine_ExpenPrevMonth,
	Medicine_Balance_to_Date,
	General_Stores_Total_AlcBudget,
	General_Stores_Budget_Rlsd_to_date,
	General_Stores_ExpenPrevMonth,
	General_Stores_Balance_to_Date,
	M_R_Equip_Transport_Furniture_Total_AlcBudget,
	M_R_Equip_Transport_Furniture_Budget_Rlsd_to_date,
	M_R_Equip_Transport_Furniture_ExpenPrevMonth,
	M_R_Equip_Transport_Furniture_Balance_to_Date,
	M_R_Building_Dept_Total_AlcBudget,
	M_R_Building_Dept_Budget_Rlsd_to_date,
	M_R_Building_Dept_ExpenPrevMonth,
	M_R_Building_Dept_Balance_to_Date,
	Others_Total_AlcBudget,
	Others_Budget_Rlsd_to_date,
	Others_ExpenPrevMonth,
	Others_Balance_to_Date,
	Annual_Development_Plan_Total_AlcBudget,
	Annual_Development_Plan_Budget_Rlsd_to_date,
	Annual_Development_Plan_ExpenPrevMonth,
	Annual_Development_Plan_Balance_to_Date,
	Daily_Hospital_Wastekg,
	Pit_Hole,
	Disposal_Through_Municipality,
	Burnt,
	Incineration,
	Any_Other_Method,
	Incinerator,
	Municipality_water_Supply,
	Hand_Pump,
	Well,
	Filter_Plant,
	Electric_Water_Cooler_with_Filter,
	Mineral_Water,
	R_O_Plant,
	Safe_Drinking_Water,
	OPD_Functional,
	OPD_Non_Functional,
	OPD_Not_Applicable,
	EPI_Functional,
	EPI_Non_Functional,
	EPI_Not_Applicable,
	ANC_Functional,
	ANC_Non_Functional,
	ANC_Not_Applicable,
	PNC_Functional,
	PNC_Non_Functional,
	PNC_Not_Applicable,
	FP_Functional,
	FP_Non_Functional,
	FP_Not_Applicable,
	BEmONC_Functional,
	BEmONC_Non_Functional,
	BEmONC_Not_Applicable,
	CEmONC_Functional,
	CEmONC_Non_Functional,
	CEmONC_Not_Applicable,
	Health_education_Functional,
	Health_education_Non_Functional,
	Health_education_Not_Applicable,
	Indoor_Functional,
	Indoor_Non_Functional,
	Indoor_Not_Applicable,
	Labour_Room_Functional,
	Labour_Room_Non_Functional,
	Labour_Room_Not_Applicable,
	Minor_OT_Functional,
	Minor_OT_Non_Functional,
	Minor_OT_Not_Applicable,
	Major_OT_Functional,
	Major_OT_Non_Functional,
	Major_OT_Not_Applicable,
	Delivery_Functional,
	Delivery_Non_Functional,
	Delivery_Not_Applicable,
	C_Section_Functional,
	C_Section_Non_Functional,
	C_Section_Not_Applicable,
	Laboratory_Functional,
	Laboratory_Non_Functional,
	Laboratory_Not_Applicable,
	Ultrasound_Functional,
	Ultrasound_Non_Functional,
	Ultrasound_Not_Applicable,
	X_Ray_Functional,
	X_Ray_Non_Functional,
	X_Ray_Not_Applicable,
	Dental_X_Ray_Functional,
	Dental_X_Ray_Non_Functional,
	Dental_X_Ray_Not_Applicable,
	ECG_Functional,
	ECG_Non_Functional,
	ECG_Not_Applicable,
	Blood_screeningHepatitis_B_CHIV_Functional,
	Blood_screeningHepatitis_B_CHIV_Non_Functional,
	Blood_screeningHepatitis_B_CHIV_Not_Applicable,
	Hb_Measurement_Functional,
	Hb_Measurement_Non_Functional,
	Hb_Measurement_Not_Applicable,
	Sputum_AFB_Functional,
	Sputum_AFB_Non_Functional,
	Sputum_AFB_Not_Applicable,
	Dengue_RTD_Functional,
	Dengue_RTD_Non_Functional,
	Dengue_RTD_Not_Applicable,
	Malaria_Microscopy_Functional,
	Malaria_Microscopy_Non_Functional,
	Malaria_Microscopy_Not_Applicable,
	Malaria_RTD_Functional,
	Malaria_RTD_Non_Functional,
	Malaria_RTD_Not_Applicable,
	TB_Treatment_Functional,
	TB_Treatment_Non_Functional,
	TB_Treatment_Not_Applicable,
	Nutrition_Services_Functional,
	Nutrition_Services_Non_Functional,
	Nutrition_Services_Not_Applicable,
	Measurement_of_Nutrition_Status_of_Children_Functional,
	Measurement_of_Nutrition_Status_of_Children_Non_Functional,
	Measurement_of_Nutrition_Status_of_Children_Not_Applicable,
	Measurement_of_Nutrition_Status_of_Pregnant_Women_Functional,
	Measurement_of_Nutrition_Status_of_Pregnant_Women_Non_Functional,
	Measurement_of_Nutrition_Status_of_Pregnant_Women_Not_Applicable,
	Measurement_of_Nutrition_Status_of_Lactating_Women_Functional,
	Measurement_of_Nutrition_Status_of_Lactating_Women_Non_Functional,
	Measurement_of_Nutrition_Status_of_Lactating_Women_Not_Applicable,
	Blood_Transfusion_Functional,
	Blood_Transfusion_Non_Functional,
	Blood_Transfusion_Not_Applicable,
	Dental_Services_Functional,
	Dental_Services_Non_Functional,
	Dental_Services_Not_Applicable,
	Public_Toilets_Functional,
	Public_Toilets_Non_Functional,
	Public_Toilets_Not_Applicable,
	Water_Supply_Functional,
	Water_Supply_Non_Functional,
	Water_Supply_Not_Applicable,
	Safe_Drinking_Water_Functional,
	Safe_Drinking_Water_Non_Functional,
	Safe_Drinking_Water_Not_Applicable,
	Electricity_Transformer_Functional,
	Electricity_Transformer_Non_Functional,
	Electricity_Transformer_Not_Applicable,
	Generator_Functional,
	Generator_Non_Functional,
	Generator_Not_Applicable,
	Solar_System_Functional,
	Solar_System_Non_Functional,
	Solar_System_Not_Applicable,
	Waste_Management_Functional,
	Waste_Management_Non_Functional,
	Waste_Management_Not_Applicable,
	Ambulance_Functional,
	Ambulance_Non_Functional,
	Ambulance_Not_Applicable ';
    } elseif ($type == 'secondary') {
        $select = ' * ';
    }
} else {
    $error = 1;
    echo 'Please select type';
    exit();
}

if ($province != '' && $type != '') {
    $db = $province . '_new_' . $type;
} else {
    $error = 1;
    echo 'Please select province';
    exit();
}


$MonthTo = (isset($_REQUEST['MonthTo']) && $_REQUEST['MonthTo'] != '' ? $_REQUEST['MonthTo'] : date('m', strtotime("last month")));
$YearTo = (isset($_REQUEST['YearTo']) && $_REQUEST['YearTo'] != '' ? $_REQUEST['YearTo'] : date('Y', strtotime("last month")));
$startDate = new DateTime($YearTo . '-' . $MonthTo . '-01');
$MonthFrom = (isset($_REQUEST['MonthFrom']) && $_REQUEST['MonthFrom'] != '' ? $_REQUEST['MonthFrom'] : date('m', strtotime("last month")));
$YearFrom = (isset($_REQUEST['YearFrom']) && $_REQUEST['YearFrom'] != '' ? $_REQUEST['YearFrom'] : date('Y', strtotime("last month")));
$endDate = new DateTime($YearFrom . '-' . $MonthFrom . '-30');
$dateInterval = new DateInterval('P1M');
$datePeriod = new DatePeriod($startDate, $dateInterval, $endDate);
if (strtotime('01-' . $MonthFrom . '-' . $YearFrom) < strtotime('01-' . $MonthTo . '-' . $YearTo)) {
    echo 'Selected "From Time Period" is greater than "To Time Period", Try again';
} else {
    $arrayDate = array();
    foreach ($datePeriod as $date) {
        $y = $date->format('Y');
        $m = $date->format('m');
        if ($m == 1) {
            $monthto = 'January';
        } elseif ($m == 2) {
            $monthto = 'February';
        } elseif ($m == 3) {
            $monthto = 'March';
        } elseif ($m == 4) {
            $monthto = 'April';
        } elseif ($m == 5) {
            $monthto = 'May';
        } elseif ($m == 6) {
            $monthto = 'June';
        } elseif ($m == 7) {
            $monthto = 'July';
        } elseif ($m == 8) {
            $monthto = 'August';
        } elseif ($m == 9) {
            $monthto = 'September';
        } elseif ($m == 10) {
            $monthto = 'October';
        } elseif ($m == 11) {
            $monthto = 'November';
        } elseif ($m == 12) {
            $monthto = 'December';
        }
        $arrayDate[] = $monthto . '-' . $y;
    }
    $wheredate = '';
    foreach ($arrayDate as $keydate => $valDate) {
        if ($keydate == 0) {
            $wheredate .= " month_year= '" . trim($valDate) . "' ";
        } else {
            $wheredate .= " OR month_year= '" . trim($valDate) . "'  ";
        }
    }
    if ($wheredate != '') {
        $where .= ' AND (' . $wheredate . ')';
    }
}

if (isset($_REQUEST['FacilityIndexes']) && $_REQUEST['FacilityIndexes'] != '') {
    $arrFacilityIndexes = explode(',', $_REQUEST['FacilityIndexes']);
    $wherefacility = '';
    foreach ($arrFacilityIndexes as $keyfacility => $valfacility) {
        if ($keyfacility == 0) {
            $wherefacility .= " file_no like '%" . trim($valfacility) . "%' ";
        } else {
            $wherefacility .= " OR file_no like '%" . trim($valfacility) . "%'  ";
        }
    }
    if ($wherefacility != '') {
        $where .= ' AND (' . $wherefacility . ')';
    }
}


//$query = "SELECT * FROM sindh_new_secondary where form_type='$type' " . $where . " order by file_no asc";
$query = "SELECT " . $select . " FROM " . $db . " where form_type='$type' " . $where . " order by file_no asc";
//echo $query;exit();
$productResult = sqlsrv_query($conn, $query);
$isPrintHeader = false;
if (!empty($productResult)) {
    $filename = "Export_excel_" . $db . "_" . date('d_m_Y') . ".xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=$filename");
    while ($row = sqlsrv_fetch_array($productResult, SQLSRV_FETCH_ASSOC)) {

        if (!$isPrintHeader) {
            echo implode("\t", array_keys($row)) . "\n";
            $isPrintHeader = true;
        }
        echo implode("\t", array_values($row)) . "\n";
    }
}


/*$productResult = sqlsrv_query($conn, $query);
$isPrintHeader = false;
if (!empty($productResult)) {
    $filename = "Export_excel_" . $db . "_" . date('d_m_Y') . ".xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=$filename");
    while ($row = sqlsrv_fetch_array($productResult, SQLSRV_FETCH_ASSOC)) {
        if (!$isPrintHeader) {
            echo implode("\t", array_keys($row)) . "\n";
            $isPrintHeader = true;
        }
        echo implode("\t", array_values($row)) . "\n";
    }
}*/

?>