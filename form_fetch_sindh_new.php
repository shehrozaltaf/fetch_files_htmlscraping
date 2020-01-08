<?php
include 'includes/header.php';
include 'includes/sidebar.php'; ?>

<div id="page_content">
    <div id="page_content_inner">
        <div class="md-card">
            <div class="md-card-content">
                <h3 class="heading_a">Fetch File Form</h3>
                <br>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <label for="SelectProvince"> Select Province: </label>
                        <br>
                        <select name="SelectProvince" id="SelectProvince">
                            <option value="sindh">Sindh NEW</option>
                        </select>
                    </div>
                    <br>
                    <div class="uk-width-medium-1-1">
                        <label for="SelectType">Select Type:</label><br>
                        <select name="SelectType" id="SelectType">
                            <option value="primary">primary</option>
                            <option value="secondary">secondary</option>
                        </select>
                    </div>
                    <br>
                    <div class="uk-width-medium-1-1">
                        <label for="MonthTo">Month to:</label>
                        <select name="MonthTo" id="MonthTo">
                            <?php for ($i = 1; $i <= 12; $i++) {
                                echo '<option value="' . $i . '" ' . ($i == date('m', strtotime("last month")) ? 'selected' : '') . '>' . $i . '</option>';
                            } ?>
                        </select>
                        <label for="YearTo">Year to: </label>
                        <select name="YearTo" id="YearTo">
                            <?php for ($i = date('Y'); $i >= 2011; $i--) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            } ?>
                        </select>
                    </div>
                    <br>
                    <div class="uk-width-medium-1-1">
                        <label for="MonthFrom">Month From: </label>
                        <select name="MonthFrom" id="MonthFrom">
                            <?php for ($i = 1; $i <= 12; $i++) {
                                echo '<option value="' . $i . '" ' . ($i == date('m', strtotime("last month")) ? 'selected' : '') . '>' . $i . '</option>';
                            } ?>
                        </select>
                        <label for="YearFrom"> Year From: </label>
                        <select name="YearFrom" id="YearFrom">
                            <?php for ($i = date('Y'); $i >= 2011; $i--) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            } ?>
                        </select>
                    </div>
                    <br>
                    <div>
                        <label for="FacilityIndexes">Facility Indexes (211033, 511002, 411001, 211035,
                            211036)</label><br>
                        <textarea name="FacilityIndexes" id="FacilityIndexes" cols="60" rows="10"></textarea>
                    </div>
                    <br>
                    <div class="uk-width-medium-1-1">
                        <div class="uk-input-group">
                            <span class="uk-input-group-addon">
                                <input type="checkbox" value="1" data-md-icheck id="updateData" name="updateData"/>
                            </span>
                            <label for="updateData">Click here, to do not update existing data.</label>
                        </div>
                    </div>
                    <br>
                    <div class="uk-width-medium-1-1">
                        <button type="button" onclick="fetchData()" id="submitBtn"
                                class="uk-form-file md-btn md-btn-primary">Submit
                        </button>
                    </div>
                    <br>
                    <div id="msg" style="display: none;"
                         class="uk-alert uk-width-medium-1-1   uk-grid-margin uk-row-first" data-uk-alert>
                        <a href="javascript:void(0)" class="uk-alert-close uk-close"></a>
                        <p id="msgText"></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include 'includes/footer.php'; ?>
<script>
    function fetchData() {

        var errorFlag = 0;
        var data = {};
        data['SelectProvince'] = $('#SelectProvince').val();
        data['SelectType'] = $('#SelectType').val();
        data['MonthTo'] = $('#MonthTo').val();
        data['YearTo'] = $('#YearTo').val();
        data['MonthFrom'] = $('#MonthFrom').val();
        data['YearFrom'] = $('#YearFrom').val();
        data['FacilityIndexes'] = $('#FacilityIndexes').val();
        if ($("#updateData").prop('checked') == true) {
            data['updateData'] = 'donotupdate';
        } else {
            data['updateData'] = 'doupdate';
        }

        if (data['SelectType'] == '' || data['SelectType'] == undefined) {
            /* $('#SelectType').addClass('error');*/
            errorFlag = 1;
            returnMsg('msgText', 'Invalid Type', 'uk-alert-danger', 'msg');
            return false;
        }
        if (data['MonthTo'] == '' || data['MonthTo'] == undefined) {
            errorFlag = 1;
            returnMsg('msgText', 'Invalid Month To', 'uk-alert-danger', 'msg');
            return false;
        }
        if (data['YearTo'] == '' || data['YearTo'] == undefined) {
            errorFlag = 1;
            returnMsg('msgText', 'Invalid Year To', 'uk-alert-danger', 'msg');
            return false;
        }
        if (data['MonthFrom'] == '' || data['MonthFrom'] == undefined) {
            errorFlag = 1;
            returnMsg('msgText', 'Invalid Month From', 'uk-alert-danger', 'msg');
            return false;
        }
        if (data['YearFrom'] == '' || data['YearFrom'] == undefined) {
            errorFlag = 1;
            returnMsg('msgText', 'Invalid Year From', 'uk-alert-danger', 'msg');
            return false;
        }

        if (errorFlag == 0) {
            altair_helpers.content_preloader_show('md');
            $('#submitBtn').attr('readonly', 'readonly').attr('disabled', 'disabled');
            var url = "fetch_all_html_sindhnew.php";
            CallAjax(url, data, 'POST', function (result) {
                returnMsg('msgText', result, 'uk-alert-success', 'msg');
                setTimeout(function () {
                    altair_helpers.content_preloader_hide('md');
                    $('#submitBtn').removeAttr('readonly', 'readonly').removeAttr('disabled', 'disabled');
                }, 1000)
            });
        } else {
            returnMsg('msgText', 'Something wrong in fields', 'uk-alert-danger', 'msg');
        }
    }
</script>