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

$user_ID_NEW = $user_ID;
$query = "CALL read_into_patient_profile($user_ID_NEW)";

$query_results = mysqli_query($conn, $query); 
if (!$query_results) {
    die("Error: " . mysqli_error($conn));
    exit();
}
//$user_ID_NEW = $user_ID;
//$query_results_data = mysqli_fetch_all($query_results, MYSQLI_ASSOC);

?>


<div class="content">
    <div class="row">
        <?php if (isset($alertMessage)) { ?>
            <div class="col">
                <?php echo $alertMessage ?>
            </div>
        <?php } ?>

    </div>

    <div class="mb-9">
        <div class="row align-items-center justify-content-between g-3 mb-4">

            <div class="col-auto">
                <h2 class="mb-0">Patient details</h2>
            </div>

            <div class="col-auto">
                <div class="row g-3">
                    <div class="col-auto">
                        <button class="btn btn-phoenix-danger">
                            <span class="fa-solid fa-trash-can me-2"></span>Delete patient
                        </button>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-phoenix-secondary">
                            <span class="fas fa-key me-2"></span>Reset password
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <div class="row g-5">
            <div class="col-12 col-xxl-4">
            <?php while ($row = mysqli_fetch_assoc($query_results)) : ?>
                <div class="row g-3 g-xxl-0 h-100">
                    <div class="col-12 col-md-7 col-xxl-12 mb-xxl-3">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column justify-content-between pb-3">
                                <div class="row align-items-center g-5 mb-3 text-center text-sm-start">
                                    <div class="col-12 col-sm-auto mb-sm-2">
                                        <div class="avatar avatar-5xl"><img class="rounded-circle" src="../../assets/img/blank_profile.png" alt=""></div>
                                    </div>
                                    <div class="col-12 col-sm-auto flex-1">
                                    <h3><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></h3>
                                        <p class="text-800"><?php echo $row['about_patient'] ; ?></p>
                                        <div>
                                            <a class="me-2" href="#!">
                                                <span class="fab fa-linkedin-in text-400 hover-primary"></span>
                                            </a>
                                            <a class="me-2" href="#!">
                                                <span class="fab fa-facebook text-400 hover-primary"></span>
                                            </a>
                                            <a href="#!">
                                                <span class="fab fa-twitter text-400 hover-primary"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-xxl-12 mb-xxl-3">
                        <div class="card h-100">
                            <div class="card-body pb-3">
                                <div class="d-flex align-items-center mb-3">
                                    <h3 class="me-1">Default Address</h3>
                                </div>
                                <h5 class="text-800">Address</h5>
                                <p class="text-800"><?php echo $row['street_name_add'] ; ?><br>City Name, Suburb Name<br>South Africa</p>
                                <div class="mb-3">
                                    <h5 class="text-800">Email</h5><a href="mailto:useremailaddress@gmail.com">useremailaddress@gmail.com</a>
                                </div>
                                <h5 class="text-800 mb-3">Phone</h5><a class="text-800" href="tel:+1234567890">067 123 4569</a>
                                <hr>
                                <h5 class="text-800 mb-1">Emergency Contact Person</h5><a class="text-800 mb-3">Their Name Here</a>
                                <h5 class="text-800 mb-1">Emergency Contact Person Number</h5><a class="text-800 mb-3" href="tel:067 123 4569">067 123 4569</a>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endwhile; ?>
            </div>
            <div class="col-12 col-xxl-8">
                <div class="card h-100">
                    <div class="card-body">
                        <form id="patient_profile_form">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
                                    <div class="alert alert-danger hide" id="alert_error" role="alert">One or more fields are empty</div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
                                    <h6 class="mb-2 text-primary">Personal Details</h6>
                                </div>

                                <input type="hidden" class="form-control" id="user_ID" name="user_ID" value="<?php echo $user_ID; ?>">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name">
                                    </div>
                                </div>

                                <!--these will need to update the user table-->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="email_address">Email</label>
                                        <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Enter email ID">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="contact_no">Phone</label>
                                        <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Enter phone number">
                                    </div>
                                </div>
                                <!--these will need to update the user table-->

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="id_number">ID Number</label>
                                        <input type="number" class="form-control" id="id_number" name="id_number" placeholder="Enter ID number" onchange="autofillDOB()">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="dob">DOB</label>
                                        <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter phone number" value="" disabled>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="form-select" aria-label="Default select example" name="gender" id="gender">
                                            <option selected="">Select Gender</option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>

                                        </select>


                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="profile_picture">Profile Picture</label>
                                        <input type="file" class="form-control" id="profile_picture" name="profile_picture" placeholder="Enter phone number" value="">
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="about_patient">Short Bio <span id="count_car">(100)</span></label>
                                        <input type="text" class="form-control" id="about_patient" name="about_patient" placeholder="Maximum of 100 Characters" value="">
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
                                    <h6 class="mb-2 text-primary">Address Details</h6>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="street_name_add">Street Address</label>
                                        <input type="text" class="form-control" id="street_name_add" name="street_name_add" placeholder="Enter street name & house no" value="">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="city_ID">City</label>

                                        <select class="form-select" aria-label="Default select example" name="city_name" id="city_name">
                                            <option selected="">Select your city</option>
                                            <?php
                                            $results = mysqli_query($conn, "SELECT `city_ID`,`city_name` FROM `city`");
                                            while ($kind = mysqli_fetch_array($results)) {
                                                echo "<option value='" . $kind['city_ID'] . "'>" . $kind['city_name'] . "</option>";
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="suburb_ID">Suburb</label>

                                        <select class="form-select" aria-label="Default select example" name="suburb_ID" id="suburb_ID">
                                            <option selected="">Select your suburb</option>
                                            <?php
                                            $results = mysqli_query($conn, "SELECT `suburb_ID`,`suburb_name`, `city_ID` FROM `suburb`");
                                            while ($data = mysqli_fetch_array($results)) {
                                                echo "<option value='" . $data['suburb_ID'] . "' data-city='" . $data['city_ID'] . "'>" . $data['suburb_name'] . "</option>";
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>



                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
                                    <h6 class="mb-2 text-primary">Emergency And Socials</h6>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="ec_person">Emergency Person</label>
                                        <input type="text" class="form-control" id="ec_person" name="ec_person" placeholder="Enter their name" value="">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="ecp_number">Emergency Person Number</label>
                                        <input type="number" class="form-control" id="ecp_number" name="ecp_number" placeholder="Enter their number" value="">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="fb_link">Facebook Link</label>
                                        <input type="text" class="form-control" id="fb_link" name="fb_link" placeholder="Your facebook profile url" value="">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="insta_link">Instagram Link</label>
                                        <input type="text" class="form-control" id="insta_link" name="insta_link" placeholder="Your Instagram profile url" value="">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="twitter_link">Twitter Link</label>
                                        <input type="text" class="form-control" id="twitter_link" name="twitter_link" placeholder="Your twitter profile url" value="">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">Address</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="street_name_add">Street Name</label>
                                        <input type="text" class="form-control" id="street_name_add" name="street_name_add" placeholder="Enter house no & street name">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="city_name">City</label>
                                        <select class="form-select" aria-label="Default select example" name="city_name" id="city_name">
                                            <option selected="">Select City</option>
                                            <option value="M">Durban</option>
                                            <option value="F">Port Elizabeth</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="street_name_add">Street</label>
                                        <input type="text" class="form-control" id="street_name_add" name="street_name_add" placeholder="Enter Street">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="ciTy">City</label>
                                        <select class="form-select" aria-label="Default select example" name="gender" id="gender">
                                            <option selected="">Select City</option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>

                                        </select>
                                    </div>
                                </div>

                            </div> -->

                        </form>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <button type="submit" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
                                    <button type="submit" id="update_patient_profile" name="update_patient_profile" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
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