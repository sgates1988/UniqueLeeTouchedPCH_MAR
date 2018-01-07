<?php
include('config.php');
$time_slot = ($_GET['time_slot']);
$med = ($_GET['med']);
$res = ($_GET['res']);
$emp = ($_GET['emp']);
$sql = "SELECT * FROM med_records WHERE time_slot = '$time_slot' AND med_name = '$med' AND res_name = '$res' AND emp_name = '$emp'";
$sql2 = "SELECT * FROM med_records WHERE time_slot = '$time_slot' AND med_name = '$med' AND res_name = '$res' AND emp_name = '$emp'";
echo "<h3 style='text-align:center'> Time Entry for $res $med for $time_slot</h3>";

$Dates = mysqli_query($con, $sql2);
$row = mysqli_fetch_array($Dates);

/*
 * Function requested by Ajax
 */
if (isset($_POST['func']) && !empty($_POST['func'])) {
    switch ($_POST['func']) {
        case 'getCalender':
            getCalender($_POST['year'], $_POST['month']);
            break;
        case 'getEvents':
            getEvents($_POST['date']);
            break;
        default:
            break;
    }
}

/*
 * Get calendar full HTML
 */

function getCalender($year = '', $month = '') {
    $dateYear = ($year != '') ? $year : date("Y");
    $dateMonth = ($month != '') ? $month : date("m");
    $date = $dateYear . '-' . $dateMonth . '-01';
    $currentMonthFirstDay = date("N", strtotime($date));
    $totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN, $dateMonth, $dateYear);
    $totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7) ? ($totalDaysOfMonth) : ($totalDaysOfMonth + $currentMonthFirstDay);
    $boxDisplay = ($totalDaysOfMonthDisplay <= 35) ? 35 : 42;
    ?>
    <div id='calendar_section'>
        <div id="calender_section" class="month">
            <table>
                <ul>
                    <a href="javascript:void(0);" class="prev" alt='Previous' onclick="getCalendar('calendar_div', '<?php echo date("Y", strtotime($date . ' - 1 Month')); ?>', '<?php echo date("m", strtotime($date . ' - 1 Month')); ?>');">  < < Previous</a>
                    <button class="button" name="month_dropdown" disabled="" class="month_dropdown dropdown" value='<?php echo getAllMonths($dateMonth); ?>'><?php echo ($dateMonth); ?></button>
                    <button class="button" name="year_dropdown" disabled="" class="year_dropdown dropdown"> <?php echo ($dateYear); ?></button>
                    <a href="javascript:void(0);" class="next" alt='Next' onclick="getCalendar('calendar_div', '<?php echo date("Y", strtotime($date . ' + 1 Month')); ?>', '<?php echo date("m", strtotime($date . ' + 1 Month')); ?>');">Next > > </a>
                </ul>
            </table>

            <div id="calender_section_top">
                <ul>
                    <li>Sun</li>
                    <li>Mon</li>
                    <li>Tue</li>
                    <li>Wed</li>
                    <li>Thu</li>
                    <li>Fri</li>
                    <li>Sat</li>
                </ul>
            </div>
            <div id="calender_section_bot">
                <ul>
                    <?php
                    $dayCount = 1;


                    $time_slot = ($_GET['time_slot']);
                    $med = ($_GET['med']);
                    $res = ($_GET['res']);
                    $emp = ($_GET['emp']);
                    for ($cb = 1; $cb <= $boxDisplay; $cb++) {
                        if (($cb >= $currentMonthFirstDay + 1 || $currentMonthFirstDay == 7) && $cb <= ($totalDaysOfMonthDisplay)) {
                            //Current date
                            if ($dayCount <= 9) {
                                $currentDate = $dateYear . '-' . $dateMonth . '-' . '0' . $dayCount;
                                ;
                            } else {
                                $currentDate = $dateYear . '-' . $dateMonth . '-' . $dayCount;
                            }

                            $eventNum = 0;
                            //Include con configuration file
                            include 'config.php';
                            //Get number of events based on the current date
                            $result = $con->query("SELECT * FROM med_records WHERE entry_date = '" . $currentDate . "' AND time_slot = '" . $time_slot . "'");
                            $eventNum = $result->num_rows;
                            //Define date cell color
                            if (strtotime($currentDate) == strtotime(date("Y-m-d"))) {
                                echo '<li date="' . $currentDate . '" class="grey date_cell" >';
                            } elseif ($eventNum > 0) {
                                echo '<li date="' . $currentDate . '" class="light_sky date_cell" >';
                            } else {
                                echo '<li date="' . $currentDate . '" class="date_cell" >';
                            }
                            //Date cell
                            echo '<span>';
                            if ($eventNum > 0) {
                                echo '<input class="calendar_button" type="button"  id=' . $currentDate . ' name="date[]" value=' . $dayCount . ' ">';
                                echo '<a class="existRecord" >Done</a>';
                            } else {
                                echo '<input class="calendar_button" type="button"  id=' . $currentDate . ' name="date[]" value=' . $dayCount . ' onclick="MedRecordEntryModalOpen(this.id)">';
                            }
                            echo '</span>';


                            echo '</li>';
                            $dayCount++;
                            ?>
                        <?php } else { ?>
                            <li><span></span></li>
                            <?php
                        }
                    }
                    ?>
                </ul></div>
        </div>
    </div>
    <?php
}

/*
 * Get months options list.
 */

function getAllMonths($selected = '') {
    $options = '';
    for ($i = 1; $i <= 12; $i++) {
        $value = ($i < 10) ? '0' . $i : $i;
        $selectedOpt = ($value == $selected) ? 'selected' : '';
        $options .= '<option value="' . $value . '" ' . $selectedOpt . ' >' . date("F", mktime(0, 0, 0, $i + 1, 0, 0)) . '</option>';
    }
    return $options;
}

/*
 * Get years options list.
 */

function getYearList($selected = '') {
    $options = '';
    for ($i = 2015; $i <= 2025; $i++) {
        $selectedOpt = ($i == $selected) ? 'selected' : '';
        $options .= '<option value="' . $i . '" ' . $selectedOpt . ' >' . $i . '</option>';
    }
    return $options;
}

function getEvents($date = '') {
    //Include con configuration file
    include 'config.php';
    $eventListHTML = '';
    $date = $date ? $date : date("Y-m-d");
    //Get events based on the current date
    $result = $con->query("SELECT * FROM med_records WHERE entry_date = '" . $date . "' ");
    if ($result->num_rows > 0) {
        $eventListHTML = '<h2>Events on ' . date("l, d M Y", strtotime($date)) . '</h2>';
        $eventListHTML .= '<td>';
        while ($row = $result->fetch_assoc()) {
            $eventListHTML .= '<td>' . $row['emp_name'] . '</td>';
        }
        $eventListHTML .= '</td>';
    }
    echo $eventListHTML;
}
?>