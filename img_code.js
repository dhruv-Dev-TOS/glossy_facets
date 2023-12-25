   <script>
        $(document).ready(function() {
            let profile_final_name;
            $("button#submit").on("click", function(e) {

                e.preventDefault();
                var lic_image = $("input[name='lic_image']").val();
                var aadhar_image = $("input[name='aadhar_image']").val();
                var profile_image = $("input[name='profile_image']").val();

                if (lic_image == '') {
                    $('#lic_image').addClass("is-invalid");
                    isValid = false;
                    $('#lic_error').text('*This field is required.');
                } else {
                    $('#lic_image').removeClass("is-invalid");
                    $('#lic_error').text('');

                }

                if (aadhar_image == '') {
                    $('#aadhar_image').addClass("is-invalid");
                    isValid = false;
                    // $('#aadhar_error').html('Error');
                    $('#aadhar_error').text('*This field is required.');
                } else {
                    $('#aadhar_image').removeClass("is-invalid");
                    $('#aadhar_error').text('');
                }

                if (profile_image == '') {
                    $('#profile_image').addClass("is-invalid");
                    isValid = false;
                    $('#profile_error').text('*This field is required.');
                } else {
                    $('#profile_image').removeClass("is-invalid");
                    $('#profile_error').text('');
                }

                // console.log("profile" + profile_image + aadhar_image + lic_image);

                if (validateForm()) {
                    // Extract form values

                    var fileInput1 = $('#profile_image')[0];
                    var file1 = fileInput1.files[0];
                    var fileInput2 = $('#aadhar_image')[0];
                    var file2 = fileInput2.files[0];
                    var fileInput3 = $('#lic_image')[0];
                    var file3 = fileInput3.files[0];

                    console.log('this is 1' + file1);
                    console.log('this is 2' + file2);
                    console.log('this is 3' + file3);
                    if (file1 && file2 && file3) {
                        if (file1.size <= 200  1024 && file2.size <= 200  1024 && file3.size <= 200 * 1024) {
                            var formData = new FormData();
                            formData.append('file1', file1);
                            formData.append('file2', file2);
                            formData.append('file3', file3);
                            $.ajax({
                                type: 'POST',
                                url: 'apis/upload_img.php', // Your server-side script to handle file upload
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                    let res = JSON.parse(response);
                                    if (res.error_flag == 0) {
                                        console.log('this is res1' + res.file_name_1);
                                        console.log('this is res2' + res.file_name_2);
                                        console.log('this is res3' + res.file_name_3);
                                        profile_final_name = res.file_name_1;
                                        aadhar_final_name = res.file_name_2;
                                        lic_final_name = res.file_name_3;
                                        call_user();
                                    }
                                },
                                error: function(error) {
                                    console.error('Error uploading file:', error);
                                }
                            });
                        } else {
                            console.error('File size exceeds 200 KB');
                            swal.fire({
                                title: 'Error',
                                text: 'One or more of the selected images exceeds 200 KB. Please choose smaller images.',
                                type: 'error',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK',
                            });
                        }

                    } else {
                        console.error('One or more files not selected');
                        swal.fire({
                            title: 'Error',
                            text: 'Please select all three images.',
                            type: 'error',
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK',
                        });
                    }

                    function call_user() {
                        var full_name = $("input[name='full_name']").val();
                        var contact = $("input[name='contact']").val();
                        var user_password = $("input[name='user_password']").val();
                        var alternative_contact = $("input[name='alternative_contact']").val();
                        var email = $("input[name='email']").val();
                        var lic_number = $("input[name='lic_number']").val();
                        var aadhar_num = $("input[name='aadhar_num']").val();
                        var bank_account_number = $("input[name='bank_account_number']").val();
                        var bank_ifsc_code = $("input[name='bank_ifsc_code']").val();
                        var bank_name = $("input[name='bank_name']").val();
                        var bank_branch = $("input[name='bank_branch']").val();
                        var account_holder_name = $("input[name='account_holder_name']").val();
                        var bank_account_type = $("#bank_account_type").val();
                        var user_type = $("#user_type").val();
                        var dob = $("input[name='dob']").val();
                        var user_address = $("input[name='user_address']").val();
                        var reference_name = $("input[name='reference_name']").val();

                        // var fileInput = $('#profile_image')[0];
                        // var file = fileInput.files[0];
                        // console.log(file);
                        console.log('this is name' + profile_final_name);
                        // Perform AJAX request
                        $.ajax({
                            type: "POST",
                            url: "apis/add_user.php",
                            data: {
                                full_name: full_name,
                                contact: contact,
                                user_password: user_password,
                                alternative_contact: alternative_contact,
                                email: email,
                                lic_number: lic_number,
                                lic_image: lic_final_name,
                                aadhar_num: aadhar_num,
                                aadhar_image: aadhar_final_name,
                                bank_account_number: bank_account_number,
                                bank_ifsc_code: bank_ifsc_code,
                                bank_name: bank_name,
                                bank_branch: bank_branch,
                                bank_account_type: bank_account_type,
                                account_holder_name: account_holder_name,
                                dob: dob,
                                user_address: user_address,
                                reference_name: reference_name,
                                profile_image: profile_final_name,
                                user_type: user_type
                            },
                            success: function(data) {
                                console.log(data);
                                var res = JSON.parse(data);
                                if (res['error_flag'] == 0) {
                                    swal.fire({
                                        title: 'User Details Added Successfully!',
                                        text: '',
                                        type: 'success',
                                        showCancelButton: false,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'OK',
                                    }).then(function(isConfirm) {
                                        if (isConfirm.value) {
                                            window.location.href = 'users.php';
                                        } else {
                                            // Handle other cases if needed
                                        }
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error("AJAX Request Failed:", status, error);
                                // You can add additional error handling logic here
                                swal.fire({
                                    title: 'Error',
                                    text: 'Failed to add user details. Please try again.',
                                    type: 'error',
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'OK',
                                });
                            }
                        });
                    }
                }
            });

            function validateForm() {
                // Validate required fields
                var isValid = true;
                $('input[required]').each(function() {
                    if ($(this).val().trim() === "") {
                        $(this).addClass("is-invalid");
                        isValid = false;
                        $(this).next('.error-message').text('*This field is required.');
                    } else {
                        $(this).removeClass("is-invalid");
                        $(this).next('.error-message').text('');
                    }
                });

                // Validate password
                var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
                var user_password = $("input[name='user_password']").val();
                if (!passwordRegex.test(user_password)) {
                    $("input[name='user_password']").addClass("is-invalid");
                    isValid = false;
                    $("input[name='user_password']").next('.error-message').text('* Password must be 8 characters long and include at least one lowercase letter, one uppercase letter, one number, and one special character.');
                } else {
                    $("input[name='user_password']").removeClass("is-invalid");
                    $("input[name='user_password']").next('.error-message').text('');
                }

                // Validate dropdowns
                $('select').each(function() {
                    if ($(this).val() === null) {
                        $(this).addClass('is-invalid');
                        isValid = false;
                        $(this).next('.error-message').text('*Please select an option.');
                    } else {
                        $(this).removeClass('is-invalid');
                        $(this).next('.error-message').text('');
                    }
                });

                return isValid;
            }
        });
    </script>