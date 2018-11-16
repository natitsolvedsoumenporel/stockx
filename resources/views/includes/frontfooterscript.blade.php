<style>
    .help-block{
        color:red;
    }
</style>
<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>-->
	
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!--<script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>-->
    <script src="{{ asset('assets/frontend/js/jquery.bxslider.js')}}"></script> 
    <!--<script src="{{ asset('js/formValidation.js')}}"></script>-->
    <script>
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $(".fixed-top").addClass("fixed-me");
                } else {
                    $(".fixed-top").removeClass("fixed-me");
                }
            });
    </script>
    <script>
        $(document).ready(function () {
           // alert(12);return false;
        $("#login_form").formValidation({ 
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                'email': {
                    /* Initially, the validators of this field are disabled */

                    validators: {
                        notEmpty: {
                            message: 'The email address is required and cannot be empty'
                        },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'The value is not a valid email address'
                        }
                    }
                },
                'password': {
                    validators: {
                        notEmpty: {
                            message: 'The password is required and cannot be empty'
                        }
                    }
                }
            }
        });
        
        $('#forgetpass_form').formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                email: {
                    validators: {
                        notEmpty: {
                            message: 'The email is required and cannot be empty'
                        },
                        emailAddress: {
                            message: 'Please enter valid email'
                        }
                    }
                }
            }
        });
        
        $('#resetpassword').formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {

                password: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required and cannot be empty'
                        },
                        regexp: {
                            regexp: "^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$",
                            message: 'Password must contain 1 uppercase,1 lowercase,1 number and 1 symbol and atleast 8 characters long'
                        }
                    }
                },
                confpassword: {
                    validators: {
                      notEmpty: {
                                message: 'The Confirm Password is required and cannot be empty'
                            },
                        identical: {
                            field: 'password',
                            message: 'The password and its confirm are not the same'
                        }
                    }
                }


            }
        });
        
        $('#signup_form').formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'The user name is required and cannot be empty'
                        }
                    }
                },
    //                       'last_name': {
    //                            validators: {
    //                                notEmpty: {
    //                                    message: 'The last name is required and cannot be empty'
    //                                }
    //                            }
    //                        },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'The email is required and cannot be empty'
                        },
                        emailAddress: {
                            message: 'Please enter valid email'
                        }
                    }
                },

                password: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required and cannot be empty'
                        },

                        regexp: {
                            regexp: "^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$",
                            message: 'Password must contain 1 uppercase,1 lowercase,1 number and 1 symbol and atleast 8 characters long'
                        }
                    }
                },
                agree: {
                    validators: {
                        notEmpty: {
                            message: 'You must agree with the terms and conditions'
                        }
                    }
                }

            }
        });
        
        $('#editpass').formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {

                currentpassword: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required and cannot be empty'
                        },
                        regexp: {
                            regexp: "^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$",
                            message: 'Password must contain 1 uppercase,1 lowercase,1 number and 1 symbol and atleast 8 characters long'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required and cannot be empty'
                        },
                        regexp: {
                            regexp: "^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$",
                            message: 'Password must contain 1 uppercase,1 lowercase,1 number and 1 symbol and atleast 8 characters long'
                        }
                    }
                },
                confpassword: {
                    validators: {
                      notEmpty: {
                                message: 'The Confirm Password is required and cannot be empty'
                            },
                        identical: {
                            field: 'password',
                            message: 'The password and its confirm are not the same'
                        }
                    }
                }


            }
        });
        
        setTimeout(function(){ $(".alert-info").hide(); }, 5000);
        
    });
    
    


    
    </script>