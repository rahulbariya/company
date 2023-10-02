$(document).ready(function (){

    //Alphabet validation method
    /*jQuery.validator.addMethod("lettersonly", function(value, element)
    {return this.optional(element) || /^[a-z]+$/i.test(value);
    }, "Letters only please");

    //10 Digit Mobile validation method
    jQuery.validator.addMethod("mobileNo", function(value, element)
    {return this.optional(element) || /^\d{10}$/.test(value);
    }, "Enter Valid Mobile No");*/


    $('#login_form').validate({ // initialize the plugin
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            email: {
                required: "Enter Email",
                email: "Enter Valid Email",
            },
            password: {
                required: "Enter Password",
                minlength: "Enter minimum 5 latter"
            }
        }
    });

    $('#register_form').validate({ // initialize the plugin
        rules: {
            firstname: {
                required: true,
                lettersonly: true,
                minlength:2
            },
            lastname: {
                required: true,
                lettersonly: true,
                minlength:2
            },
            mobile: {
                required: true,
                mobileNo: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5,
                maxlength:15
            },
            /*confirm_password: {
                equalTo: "#password"
            }*/
        },
        messages: {
            firstname: {
                required: "Enter Firstname",
                lettersonly: "Enter valid Firstname"
            },
            lastname: {
                required: "Enter Lastname",
                lettersonly: "Enter valid Lastname"
            },
            mobile: {
                required: "Enter Mobile",
                mobileNo: "Enter Valid Mobile No"
            },
            email: {
                required: "Enter Email",
                email: "Enter Valid Email",
            },
            password: {
                required: "Enter Password",
                minlength: "Enter minimum 5 latter"
            },
            /*confirm_password: {
                equalTo: "Confirm Password does not match with Password."
            }*/
        }
    });
        $('#add_order').validate({ // initialize the plugin
        rules: {
            challanDate: {
                required: true,
            },
            challanNo: {
                required: true,
            },
            /*billDate: {
                required: true,
            },
            billNo: {
                required: true,
            },*/
            nos: {
                required: true,
            },
            company: {
                required: true,
            },
            size: {
                required: true,
            },

        },
        messages: {
            challanDate: {
                required: "Enter Challan Date",
            },
            challanNo: {
                required: "Enter Challan No",
            },
            /*billDate: {
                required: "Enter Bill Date",
            },
            billNo: {
                required: "Enter Bill No",
            },*/
            nos: {
                required: "Enter Nos",
            },
            company: {
                required: "Select Company",
            },
            size: {
                required: "Select Size",
            },
        }
    });
    $('#add_company').validate({ // initialize the plugin
        rules: {
            companyName: {
                required: true,
            },
            ownerName: {
                required: true,
            },
            companyAdd: {
                required: true,
            },
        },
        messages: {
            companyName: {
                required: "Enter Company Name",
            },
            ownerName: {
                required: "Enter Owner Name",
            },
            companyAdd: {
                required: "Enter Company Address",
            },
        }
    });
    $('#add_payment').validate({ // initialize the plugin
        rules: {
            company: {
                required: true,
            },
            creditAmount: {
                required: true,
            },
            creditDate: {
                required: true,
            },
            creditBy: {
                required: true,
            }
        },
        messages: {
            company: {
                required: "Select Company",
            },
            creditAmount: {
                required: "Enter Amount",
            },
            creditDate: {
                required: "Enter Date",
            },
            creditBy: {
                required: "Select CreditBy",
            }
        }
    });

    $('#add_product').validate({ // initialize the plugin
        rules: {
            productName: {
                required: true,
            },
            productAmount: {
                required: true,
            },
        },
        messages: {
            productName: {
                required: "Enter Product Name",
            },
            productAmount: {
                required: "Enter Product Amount",
            },
        }
    });
    $('#edit_profile').validate({ // initialize the plugin
        rules: {
            firstname: {
                required: true,
            },
            lastname: {
                required: true,
            },
            email: {
                required: true,
            },
            mobile: {
                required: true,
            },
            password: {
                minlength: 5,
                maxlength:15
            }
        },
        messages: {
            firstname: {
                required: "Enter FirstName",
            },
            lastname: {
                required: "Enter LastName",
            },
            email: {
                required: "Enter Email",
            },
            mobile: {
                required: "Enter Mobile",
            },
            password: {
                minlength: "Enter Valid Password",
            }
        }
    });
});
