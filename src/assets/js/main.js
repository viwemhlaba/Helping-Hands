function validateLoginForm() {
  const email_address = document.getElementById('email_address').value.trim();
  const password = document.getElementById('password').value.trim();
  const alert_error = document.getElementById('alert_error');

  if (email_address === '' || password === '') {
    alert_error.classList.remove("hide");
    return false;
  } else {
    return true;
  }
}

function validateSignUpForm() {
  const username = document.getElementById('username').value.trim();
  const email_address = document.getElementById('email_address').value.trim();
  const email_address_confirm = document.getElementById('email_address_confirm').value.trim();
  const contact_number = document.getElementById('contact_number').value.trim();
  const password = document.getElementById('password').value.trim();
  const password_confirm = document.getElementById('password_confirm').value.trim();
  const remember_me_check = document.getElementById('remember_me_check').checked;
  const user_type = document.getElementById('user_type');

  const error_username = document.getElementById('error_username');
  const error_email = document.getElementById('error_email');
  const error_number = document.getElementById('error_number');
  const error_password = document.getElementById('error_password');
  const alert_error = document.getElementById('alert_error');
  const error_check = document.getElementById('error_check');
  const error_userType = document.getElementById('error_userType');

  error_username.textContent = '';
  error_email.textContent = '';
  error_number.textContent = '';
  error_password.textContent = '';
  error_check.textContent = '';
  error_userType.textContent = '';

  var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

  if (email_address === '' || email_address_confirm === '' || contact_number === '' || password === '' || password_confirm === '' || remember_me_check === '' || username === '') {
    alert_error.classList.remove("hide");
    return false;
  } else if (!email_address.match(validRegex)) {
    error_email.textContent = "Email address is not valid";
    return false;
  } else if (email_address !== email_address_confirm) {
    error_email.textContent = "Email addresses do not match";
    return false;
  } else if (!password.match(passw)) {
    error_password.textContent = "Password is not valid";
    return false;
  } else if (password !== password_confirm) {
    error_password.textContent = "Passwords do not match";
    return false;
  } else if (!remember_me_check) {
    error_check.textContent = "Please Agree to our terms";
  } else if (user_type.value === '') {
    error_userType.textContent = "Please Select User Type";
  } else {
    //document.querySelector('.main_form').submit();
    return true;
  }

}

function validateForgetPassForm() {
  const email_address = document.getElementById('email_address').value.trim();
  //const forget_pass_btn = document.getElementById('forget_pass_btn');
  const alert_error = document.getElementById('alert_error');

  alert_error.textContent = '';

  if (email_address == '') {
    alert_error.textContent = "Please enter your email address";
    alert_error.classList.remove("hide");
    return false;
  } else {
    return true;
  }
}

function validateRestPassForm() {
  const password = document.getElementById('password');
  const confirm_password = document.getElementById('confirm_password');
  const alert_error = document.getElementById('alert_error');

  alert_error.textContent = '';

  if (password === '' || confirm_password === '') {
    alert_error.textContent = "One or more fields are empty";
    alert_error.classList.remove("hide");
    return false;
  } else if (password !== confirm_password) {
    alert_error.textContent = "Passwords provided do not match!";
    alert_error.classList.remove("hide");
    return false;
  } else {
    return true;
  }


}

function validatePatientProfile() {
  const first_name = document.getElementById('first_name').value.trim();
  const last_name = document.getElementById('last_name').value.trim();
  const email_address = document.getElementById('email_address').value.trim();
  const contact_no = document.getElementById('contact_no').value.trim();
  const id_number = document.getElementById('id_number').value.trim();
  const dob = document.getElementById('dob').value.trim();
  const gender = document.getElementById('gender').value.trim();
  const profile_picture = document.getElementById('profile_picture').value.trim();
  const alert_error = document.getElementById('alert_error');

  //check if all fields are empty
  alert_error.textContent = '';

  if (first_name === '' || last_name === '' || email_address === '' || contact_no === '' || id_number === ''
    || dob === '' || gender === '' || profile_picture === '') {
    alert_error.textContent = "One or more fields are empty";
    alert_error.classList.remove("hide");
    return false;
  } else {
    alert_error.textContent = "all is good";
    alert_error.classList.remove("hide");
    return true;
  }
}



if (document.getElementById('login_btn')) {
  const login_btn = document.getElementById('login_btn');
  login_btn.addEventListener('click', function (e) {
    e.preventDefault(); // Prevent form submission
    const formIsValid = validateLoginForm();
    if (formIsValid) {
      document.querySelector('.main_form').submit();
    }
  });
}

// Wrap the JavaScript code for signup.html inside this check
if (document.getElementById('signup_btn')) {
  const signup_btn = document.getElementById('signup_btn');
  signup_btn.addEventListener('click', function (e) {
    e.preventDefault(); // Prevent form submission
    const formIsValid_signup = validateSignUpForm();
    if (formIsValid_signup) {
      // You can submit the form here or perform other actions.
      // For example, uncomment the line below to submit the form:
      document.querySelector('.main_form_signup').submit();
    }
  });
}


if (document.getElementById('forget_pass_btn')) {
  const forget_pass_btn = document.getElementById('forget_pass_btn');
  forget_pass_btn.addEventListener('click', function (e) {
    e.preventDefault(); // Prevent form submission
    const formIsValid_forget = validateForgetPassForm();
    if (formIsValid_forget) {
      // You can submit the form here or perform other actions.
      // For example, uncomment the line below to submit the form:
      document.querySelector('.main_form_forgot_password').submit();
    }
  });
}

if (document.getElementById('reset_password_btn')) {
  const reset_password_btn = document.getElementById('reset_password_btn');
  reset_password_btn.addEventListener('click', function (e) {
    e.preventDefault(); // Prevent form submission
    const formIsValid_reset = validateRestPassForm();
    if (formIsValid_reset) {
      // You can submit the form here or perform other actions.
      // For example, uncomment the line below to submit the form:
      document.querySelector('.main_form_reset_password').submit();
    }
  });
}

if (document.getElementById('update_patient_profile')) {
  const update_patient_profile = document.getElementById('update_patient_profile');
  update_patient_profile.addEventListener('click', function (e) {
    e.preventDefault(); // Prevent form submission
    const formIsValid_pp = validatePatientProfile();
    if (formIsValid_pp) {
      // You can submit the form here or perform other actions.
      // For example, uncomment the line below to submit the form:
      document.querySelector('.patient_profile_form').submit();
    }
  });
}