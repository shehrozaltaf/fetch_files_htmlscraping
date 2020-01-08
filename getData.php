<?php
include 'includes/header.php';
include 'includes/sidebar.php'; ?>

<div id="page_content">
    <div id="page_content_inner">
        <div class="md-card">
            <div class="md-card-content">
                <h3 class="heading_a">Export File Form</h3>
                <br>
                <form action="getAllData.php" method="post">
                    <div class="uk-width-medium-1-1">
                        <label for="SelectProvince"> Select Province: </label>
                        <br>
                        <select name="SelectProvince" id="SelectProvince">
                            <option value="0">All</option>
                            <option value="ajk">AJK</option>
                            <option value="balochistan">Balochistan</option>
                            <option value="fata">Fata</option>
                            <option value="punjab">Punjab</option>
                            <option value="sindh">Sindh</option>
                            <option value="gilgit">Gilgit Baltistan</option>
                            <option value="kpk">KPK</option>
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
                    <div>
                        <button type="submit" class="uk-form-file md-btn md-btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

<?php include 'includes/footer.php'; ?>
