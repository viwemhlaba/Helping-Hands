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


/* $call_city_query = "SELECT city_ID, city_name FROM city";
$call_city_query_results = mysqli_query($conn, $call_city_query);
$call_city_query_results_data = mysqli_fetch_all($call_city_query_results, MYSQLI_ASSOC); */


$query = "SELECT * FROM patient_profile WHERE user_ID = '$user_ID'";
$results =  mysqli_query($conn, $query);
$data = mysqli_fetch_all($results, MYSQLI_ASSOC);

$patientIDs = [];

foreach ($data as $row) {
    // Access the patient_ID for each row and add it to the $patientIDs array
    $patientID = $row['patient_ID'];
    $patientIDs[] = $patientID;

    // You can also do something with $patientID here if needed

}

$contractData = []; // Initialize an empty array to store contract data

// Assuming you already have the $patientIDs array from the previous code
foreach ($patientIDs as $patientID) {
    // Perform a new SQL query to select data from the contact table for each patient_ID
    $contactQuery = "SELECT * FROM care_contract WHERE patient_ID = '$patientID'";
    $contactResults = mysqli_query($conn, $contactQuery);
    $contactData = mysqli_fetch_all($contactResults, MYSQLI_ASSOC);

    // Now you have the contact data for the current patient_ID in the $contactData array
    // You can process and use this data as needed
    /* foreach ($contactData as $contactRow) {
        // Access contact information for each row, e.g., $contactRow['contact_field']
    } */

    foreach ($contactData as $contactRow) {
        $nurse_ID = $contactRow['nurse_ID'];

        // Now you can use $nurse_ID to perform queries related to the nurse_profile table
        $nurseQuery = "SELECT * FROM nurse_profile WHERE nurse_ID = '$nurse_ID'";
        $nurseResults = mysqli_query($conn, $nurseQuery);
        $nurseData = mysqli_fetch_assoc($nurseResults);

        // You can process and use $nurseData as needed for each contact record
    }
}
$today = date("Ymd");
$rand = strtoupper(substr(uniqid(sha1(time())),0,4));
//echo $unique = $today . $rand;
?>


<div class="content">
    <div class="row">
        <?php if (isset($alertMessage)) { ?>
            <div class="col">
                <?php echo $alertMessage ?>
            </div>
        <?php } ?>

    </div>


    <div class="row align-items-center justify-content-between g-3 mb-4">

        <div class="col-auto">
            <h2 class="mb-0">Care Contract</h2>
        </div>
        <div class="col-auto">
            <div class="row g-3">
                <form class="col-auto">
                    <div class="col-auto">
                        <button class="btn btn-phoenix-primary">
                            <span class="fa-solid fa-trash-can me-2"></span> Create a care Contract <?php /* echo $unique = $today . $rand; */ ?>
                        </button>

                    </div>
                </form>

            </div>
        </div>

    </div>
    <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
        <div class="table-responsive scrollbar mx-n1 px-1">
            <table class="table table-sm fs--1 mb-0">
                <thead>
                    <tr>
                        <th class="sort align-middle">Contract No</th>
                        <th class="sort align-middle">Assigned Nurse</th>
                        <th class="sort align-middle">Nurse Code</th>
                        <th class="sort align-middle">Status</th>
                        <th class="sort align-middle">Wound Description</th>
                        <th class="sort align-middle">Start Date</th>
                        <th class="sort align-middle">End Date</th>
                        <th class="sort align-middle">Action</th>
                    </tr>
                </thead>
                <tbody class="list" id="order-table-body">
                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="sort align-middle"><?php echo $contactRow['contract_number']; ?></td>
                        <td class="sort align-middle fw-bold"><?php echo !empty($nurseData) ? $nurseData['first_name'] . ' ' . $nurseData['last_name'] : 'N/A'; ?></td>
                        <td class="sort align-middle"><?php echo $nurseData['nurse_code']; ?></td>
                        <td class="sort align-middle">
                            <?php
                            $final = false;
                            if ($contactRow['care_contract_status'] === 'C') {
                                echo '<span class="badge badge-phoenix fs--2 badge-phoenix-danger"><span class="badge-label">Closed</span><span class="ms-1" data-feather="x" style="height:12.8px;width:12.8px;"></span></span>
                                    ';
                                $final = true;
                            } else if (($contactRow['care_contract_status'] === 'A')) {
                                echo '<span class="badge badge-phoenix fs--2 badge-phoenix-success"><span class="badge-label">Active</span><span class="ms-1" data-feather="x" style="height:12.8px;width:12.8px;"></span></span>
                                    ';
                                $final = false;
                            }
                            ?>
                        </td>
                        <td class="sort align-middle"><?php echo $contactRow['wound_description']; ?></td>

                        <td class="sort align-middle"><?php echo $contactRow['care_start_date']; ?></td>
                        <td class="sort align-middle"><?php echo $contactRow['care_end_date']; ?></td>




                        <td class="sort align-middle">
                            <?php
                            if ($final) {
                                echo '<button type="submit" class="btn btn-phoenix-danger disabled" name="delete_care_contract">
                                    <span class="fa-solid fa-trash-can me-2"></span> Delete Contract
                                </button>';
                            } else {
                                echo '<button type="submit" class="btn btn-phoenix-danger" name="delete_care_contract">
                                    <span class="fa-solid fa-trash-can me-2"></span> Delete Contract
                                </button>';
                            }
                            ?>

                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
            <div class="col-auto d-flex">
                <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info">1 to 10 <span class="text-600"> Items of </span>15</p><a class="fw-semi-bold" href="#!" data-list-view="*">View all<svg class="svg-inline--fa fa-angle-right ms-1" data-fa-transform="down-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="" style="transform-origin: 0.25em 0.5625em;">
                        <g transform="translate(128 256)">
                            <g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)">
                                <path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z" transform="translate(-128 -256)"></path>
                            </g>
                        </g>
                    </svg><!-- <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span> Font Awesome fontawesome.com --></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<svg class="svg-inline--fa fa-angle-right ms-1" data-fa-transform="down-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="" style="transform-origin: 0.25em 0.5625em;">
                        <g transform="translate(128 256)">
                            <g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)">
                                <path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z" transform="translate(-128 -256)"></path>
                            </g>
                        </g>
                    </svg><!-- <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span> Font Awesome fontawesome.com --></a>
            </div>
            <div class="col-auto d-flex"><button class="page-link disabled" data-list-pagination="prev" disabled=""><svg class="svg-inline--fa fa-chevron-left" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M224 480c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l169.4 169.4c12.5 12.5 12.5 32.75 0 45.25C240.4 476.9 232.2 480 224 480z"></path>
                    </svg><!-- <span class="fas fa-chevron-left"></span> Font Awesome fontawesome.com --></button>
                <ul class="mb-0 pagination">
                    <li class="active"><button class="page" type="button" data-i="1" data-page="10">1</button></li>
                    <li><button class="page" type="button" data-i="2" data-page="10">2</button></li>
                </ul><button class="page-link pe-0" data-list-pagination="next"><svg class="svg-inline--fa fa-chevron-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path>
                    </svg><!-- <span class="fas fa-chevron-right"></span> Font Awesome fontawesome.com --></button>
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
<script type="text/javascript">
    // Get a reference to the input element and the character count span
    const inputElement = document.getElementById("about_patient");
    const countElement = document.getElementById("count_car");

    // Add an input event listener to the input element
    inputElement.addEventListener("input", function() {
        // Get the current value and length of the input
        const inputValue = inputElement.value;
        const currentLength = inputValue.length;
        const maxLength = 100;


        // Set the character count in the span

        //countElement.textContent = `(${100 - currentLength})`;

        // You can add additional logic here, such as disabling the input when it reaches the maximum length.
        if (currentLength > maxLength) {
            inputElement.value = inputValue.slice(0, maxLength);
        }

        // Set the character count in the span
        countElement.textContent = `(${maxLength - currentLength})`;
    });
</script>
<script>
    // Add an event listener to the "City" dropdown
    $('#city_name').change(function() {
        var selectedCity = $(this).val();

        // Hide all options in the "Suburb" dropdown
        $('#suburb_ID option').hide();

        // Show only the options that belong to the selected city
        $('#suburb_ID option[data-city="' + selectedCity + '"]').show();

        // Select the default option
        $('#suburb_ID').val('');
    });
</script>

<!-- <script>
    $('#add_cities').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })
</script> -->

<?php
include("../../includes/footer.php");
?>