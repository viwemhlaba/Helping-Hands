<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_ID'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: ../../signin.php?signin=you_are_not_signed_in");
    exit();
}

// Access the user information from the session
$user_ID = $_SESSION['user_ID'];
$email_address = $_SESSION['email_address'];

// Your HTML and other content for the Admin dashboard
include("../../database/db.php");
include("../../includes/header.php");
include("../../includes/sidebar.php");
include("../../includes/top_navigation.php");



$alertMessage = '';

if (isset($_GET['admin_dashboard']) && $_GET['admin_dashboard'] == 'city_empty') {
    $alertMessage = '
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> The City Name and Abbreviation can not be empty.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  ';
} else if (isset($_GET['admin_dashboard']) && $_GET['admin_dashboard'] == 'city_added') {
    $alertMessage = '
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congratulations!</strong> The City Name and Abbreviation have been added to database.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  ';
}


$query = "SELECT pp.last_name, pp.first_name, pp.status, pp.user_ID, user.email_address, user.contact_no, user.user_ID
FROM patient_profile pp
INNER JOIN user user ON pp.user_ID = user.user_ID
WHERE pp.status = 'A'";

$result = mysqli_query($conn, $query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!--modals here-->
<div id="add_cities" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add More Cities</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span class="fas fa-times fs--1"></span>
                </button>
            </div>
            <div class="modal-body">
                <form class="main_form" action="../../Global/functions.php" method="POST">
                    <div class="mb-3">
                        <label for="city_name" class="form-label form_label">Enter city name that you want to add.</label>
                        <input type="text" name="city_name" id="city_name" class="form-control error_input">
                        <span id="error_city_name" class="error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="city_abr" class="form-label form_label">Whats the City Abbreviation name?</label>
                        <input type="text" name="city_abr" id="city_abr" class="form-control error_input">
                        <span id="error_city_abr" class="error"></span>
                    </div>


                    <div><button type="submit" name="add_city_btn" id="add_city_btn" class="btn btn-primary w-100 mb-0">Save Changes</button></div>
                </form>
            </div>
        </div>

    </div>
</div>

<!--add subs modal-->
<div id="add_subs" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add More Subs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="main_form" action="../../Global/functions.php" method="POST">
                    <div class="mb-3">
                        <label for="city_ID" class="form-label form_label">Select Corresponding City</label>
                        <select type="number" name="city_ID" id="city_ID" class="form-control error_input">
                            <option selected>Open this select menu</option>
                            <?php

                            @include '../../database/db.php';

                            $results = mysqli_query($conn, "SELECT `city_ID`,`city_name` FROM `city`");

                            while ($data = mysqli_fetch_array($results)) {
                                echo "<option value='" . $data['city_ID'] . "'>" . $data['city_name'] . "</option>";
                            }

                            ?>
                        </select>
                        <span id="error_city_ID" class="error"></span>
                    </div>

                    <div class="mb-3">
                        <label for="suburb_name" class="form-label form_label">Enter suburb name that you want to add.</label>
                        <input type="text" name="suburb_name" id="suburb_name" class="form-control error_input">
                        <span id="error_suburb_name" class="error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="postal_code" class="form-label form_label">Add Postal Code</label>
                        <input type="number" name="postal_code" id="postal_code" class="form-control error_input">
                        <span id="error_postal_code" class="error"></span>
                    </div>


                    <div><button type="submit" name="add_sub_btn" id="add_sub_btn" class="btn btn-primary w-100 mb-0">Save Changes</button></div>
                </form>
            </div>
        </div>

    </div>
</div>
<!--modals here-->

<div class="content">
    <div class="row">
        <?php if (isset($alertMessage)) { ?>
            <div class="col">
                <?php echo $alertMessage ?>
            </div>
        <?php } ?>

    </div>

    <div class="row gy-3 mb-6 justify-content-between">
        <div class="col-md-8 col-auto">
            <h2 class="mb-2 text-1100">Patient Dashboard</h2>
            <h5 class="text-700 fw-semi-bold">This is a summary of the entire system</h5>
        </div>
       
    </div>
    <hr>
    <div class="row g-3 mb-5">
        <div class="col-md-6 col-xxl-3">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-1">Total orders<span class="badge badge-phoenix badge-phoenix-warning rounded-pill fs--1 ms-2"><span class="badge-label">-6.8%</span></span></h5>
                            <h6 class="text-700">Last 7 days</h6>
                        </div>

                    </div>
                    <div class="d-flex justify-content-center px-4 py-6">
                        <div class="echart-total-orders" style="height: 85px; width: 115px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;" _echarts_instance_="ec_1693841931602">
                            <div style="position: relative; width: 115px; height: 85px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="115" height="85" style="position: absolute; left: 0px; top: 0px; width: 115px; height: 85px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div>
                            <div class=""></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <h4>16,247 Active Contracts</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xxl-3">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-1">Total orders<span class="badge badge-phoenix badge-phoenix-warning rounded-pill fs--1 ms-2"><span class="badge-label">-6.8%</span></span></h5>
                            <h6 class="text-700">Last 7 days</h6>
                        </div>

                    </div>
                    <div class="d-flex justify-content-center px-4 py-6">
                        <div class="echart-total-orders" style="height: 85px; width: 115px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;" _echarts_instance_="ec_1693841931602">
                            <div style="position: relative; width: 115px; height: 85px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="115" height="85" style="position: absolute; left: 0px; top: 0px; width: 115px; height: 85px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div>
                            <div class=""></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <h4>16,247 Active Contracts</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-1">Total orders<span class="badge badge-phoenix badge-phoenix-warning rounded-pill fs--1 ms-2"><span class="badge-label">-6.8%</span></span></h5>
                            <h6 class="text-700">Last 7 days</h6>
                        </div>

                    </div>
                    <div class="d-flex justify-content-center px-4 py-6">
                        <div class="echart-total-orders" style="height: 85px; width: 115px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;" _echarts_instance_="ec_1693841931602">
                            <div style="position: relative; width: 115px; height: 85px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="115" height="85" style="position: absolute; left: 0px; top: 0px; width: 115px; height: 85px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div>
                            <div class=""></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <h4>16,247 Active Contracts</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-1">Total orders<span class="badge badge-phoenix badge-phoenix-warning rounded-pill fs--1 ms-2"><span class="badge-label">-6.8%</span></span></h5>
                            <h6 class="text-700">Last 7 days</h6>
                        </div>

                    </div>
                    <div class="d-flex justify-content-center px-4 py-6">
                        <div class="echart-total-orders" style="height: 85px; width: 115px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;" _echarts_instance_="ec_1693841931602">
                            <div style="position: relative; width: 115px; height: 85px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="115" height="85" style="position: absolute; left: 0px; top: 0px; width: 115px; height: 85px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div>
                            <div class=""></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <h4>16,247 Active Contracts</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-5 justify-content-between">
        <div class="col-md-6 col-auto">

            <div class="card p-3">
                <div class="card-body">
                    <h5 class="card-title">List of patients - <span class="fw-light">this will show a list of active patients</span></h5>
                    <hr>
                    <div class="table-responsive scrollbar">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Number</th>

                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <th scope="row">1</th>
                                    <td>Carlos</td>
                                    <td>Andrade</td>
                                    <td>carlosA@gmail.com</td>
                                    <td>0682581235</td>
                                </tr>

                                <tr>
                                    <th scope="row">1</th>
                                    <td>Kabelo</td>
                                    <td>Padi</td>
                                    <td>kabeloP@gmail.com</td>
                                    <td>0742458796</td>
                                </tr>

                                

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-6 col-auto">

            <div class="card p-3">
                <div class="card-body">
                    <h5 class="card-title">List of nurse - <span class="fw-light">this will show a list of active patients</span></h5>
                    <hr>
                    <div class="table-responsive scrollbar">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Number</th>

                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <th scope="row">1</th>
                                    <td>Dorothy</td>
                                    <td>Daniels</td>
                                    <td>Nurse_202322</td>
                                    <td>dorothy@gmail.com</td>
                                    <td>0849095263</td>
                                </tr>

                                <tr>
                                    <th scope="row">1</th>
                                    <td>Lesedi</td>
                                    <td>Moloi</td>
                                    <td>Nurse_202325</td>
                                    <td>Lesedi@gmail.com</td>
                                    <td>0798549874</td>
                                </tr>

                                

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Function to fetch and display the number of unread notifications
    function fetchUnreadNotifications() {
        $.ajax({
            url: 'check_notifications.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Display the number of unread notifications
                const unreadCount = data.length;
                const unreadNotificationsElement = document.getElementById('unread-notifications');
                unreadNotificationsElement.textContent = `${unreadCount}`;
            }
        });
    }

    // Fetch the number of unread notifications every 5 seconds (adjust as needed)
    setInterval(fetchUnreadNotifications, 5000);

    // Initial fetch
    fetchUnreadNotifications();
</script>

<!-- <script>
    $('#add_cities').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })
</script> -->

<?php
include("../../includes/footer.php");
?>