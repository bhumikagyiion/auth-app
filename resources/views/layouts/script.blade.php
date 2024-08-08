<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<script>
    $(document).ready(function() {

        $('#auth-form').submit(function(event) {
            event.preventDefault();

            var firstName = $('#name').val().trim(); // Corrected variable initialization

            var validationMessage = validateName(firstName);

            if (validationMessage === "Valid name.") {
                this.submit(); // Submit form if validation passes
            } else {
                $('#result').text(validationMessage);
            }
        });

        // Validate First Name
        function validateName(firstName) {
            // Check if first name is empty
            if (!firstName) {
                return "First name is required.";
            }

            // Check if first name contains only alphabets
            if (!/^[a-zA-Z]+$/.test(firstName)) {
                return "Invalid first name.";
            }

            // Validation passed
            return "Valid name.";
        }

        //password and confirm password validation
        // Clear previous errors
        $('#passwordError').text('');
        $('#passwordConfirmationError').text('');

        // Real-time validation for password length
        $('#password').on('input', function() {
            const password = $(this).val();

            if (password.length < 8) {
                $('#passwordError').text('Password must be at least 8 characters long.');
            } else {
                $('#passwordError').text('');
            }
        });

        // Real-time validation for password confirmation
        $('#password_confirmation').on('input', function() {

            // Get the password and confirmation password values
            const password = $('#password').val();
            const passwordConfirmation = $(this).val();

            if (password !== passwordConfirmation) {
                $('#passwordConfirmationError').text('Passwords do not match.');
            } else {
                $('#passwordConfirmationError').text('');
            }
        });

        //real time email validation
        $('#emailError').text('');
        $('#email').on('input', function() {

            var email = $(this).val();
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (emailPattern.test(email)) {
                $('#emailError').text('Email is valid!').removeClass('error').addClass('valid');
               
            } else {
                $('#emailError').text('Invalid email address').removeClass('valid').addClass('error');
            }
        })
    });
    <!-- AJAX Delete Script -->
      $(document).ready(function() {
          // Handle delete button click
          $('#company-table-body').on('click', '.delete-btn', function() {
              var id = $(this).data('id');
              var row = $(this).closest('tr');

              if (confirm('Are you sure you want to delete this record?')) {
                  $.ajax({
                      url: '/company/delete/' + id,
                      type: 'GET',
                      data: {
                          _token: '{{ csrf_token() }}' // CSRF token for security
                      },
                      success: function(response) {
                          if (response.success) {
                              row.remove(); // Remove the row from the table
                              alert('Record deleted successfully.');
                          } else {
                              alert('Failed to delete the record.');
                          }
                      },
                      error: function(xhr) {
                          alert('An error occurred while deleting the record.');
                      }
                  });
              }
          });
      });
</script>
