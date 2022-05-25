$(function () {
    /* ajax begin  */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.select2').select2();




    /* $("#save-job-comment").on("click", function () {
        alert();
        $action = $(this).attr('data-action');
        if ($action == 'new') {
            //formElem = $("#add-job-comment");
            //let form_data = new FormData(formElem[0]);
            let form_data = new FormData();
            let message = $("#message").val();
            let parent_id = $("#parent_id").val();
            let job_id = $("#job_id").val();
            //let attachments = $("#attachments");
            var files = $('#attachments')[0].files
            //let file = $('input[type=file]')[0].files[0];
            console.log('attachments:', files);
            if (message == '') {
                $("#errors").append('<div class="alert alert-danger">Message can not be empty.</div>');
                return false;
            }

            form_data.append('message', message);
            form_data.append('parent_id', parent_id);
            form_data.append('job_id', job_id);
            form_data.append('attachments[]', files);


            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: user_ajax_url + "/tr/admin/job/comment-save",
                data: form_data,
                cache: false,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    if (response.status == 'success') {
                        $("#errors").append('<div class="alert alert-success">' + response.message + '.</div>');
                    } else {
                        $("#errors").append('<div class="alert alert-danger">' + response.message + '.</div>');
                    }

                }
            }).then(function () {
                console.log('on completion for ajax... we are here to work...')
            });
        }

    }); */



    //$('#upload-image-form').submit(function (e) {
    $('#add-job-comment').on('submit', function (e) {
        e.preventDefault();
        let form_data = new FormData(this);
        $('#erros').html('');
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: user_ajax_url + "/job/comment-save",
            data: form_data,
            cache: false,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                if (response.status == 'success') {
                    $("#errors").append('<div class="alert alert-success">' + response.message + '.</div>');
                } else {
                    $("#errors").append('<div class="alert alert-danger">' + response.message + '.</div>');
                }

            }
        }).then(function () {
            console.log('on completion for ajax... we are here to work...')
        });
    });

    $('#status-update').on('submit', function (e) {
        let elem = $(this);
        e.preventDefault();
        let form_data = new FormData(this);
        $('#erros').html('');
        let job_id = $("#job_id").val();
        form_data.append('job_id', job_id);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: user_ajax_url + "/job/update",
            data: form_data,
            cache: false,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                if (response.status == 'success') {
                    elem.append('<div class="alert alert-success">' + response.message + '.</div>');
                } else {
                    elem.append('<div class="alert alert-danger">' + response.message + '.</div>');
                }

            }
        }).then(function () {
            console.log('on completion for ajax... we are here to work...')
        });
    });

    $('#assign-to-update').on('submit', function (e) {
        let elem = $(this);
        e.preventDefault();
        let form_data = new FormData(this);
        $('#erros').html('');
        let job_id = $("#job_id").val();
        form_data.append('job_id', job_id);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: user_ajax_url + "/job/update",
            data: form_data,
            cache: false,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                if (response.status == 'success') {
                    elem.append('<div class="alert alert-success">' + response.message + '.</div>');
                } else {
                    elem.append('<div class="alert alert-danger">' + response.message + '.</div>');
                }

            }
        }).then(function () {
            console.log('on completion for ajax... we are here to work...')
        });
    });

    $('#gstr1-update').on('submit', function (e) {
        let elem = $(this);
        e.preventDefault();
        let form_data = new FormData(this);
        $('#erros').html('');
        let job_id = $("#job_id").val();
        form_data.append('job_id', job_id);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: user_ajax_url + "/job/update",
            data: form_data,
            cache: false,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status == 'success') {
                    elem.append('<div class="alert alert-success">' + response.message + '.</div>');
                } else {
                    elem.append('<div class="alert alert-danger">' + response.message + '.</div>');
                }

            }
        }).then(function () {
            console.log('on completion for ajax... we are here to work...')
        });
    });

    $('#gstr3b-update').on('submit', function (e) {
        let elem = $(this);
        e.preventDefault();
        let form_data = new FormData(this);
        $('#erros').html('');
        let job_id = $("#job_id").val();
        form_data.append('job_id', job_id);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: user_ajax_url + "/job/update",
            data: form_data,
            cache: false,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status == 'success') {
                    elem.append('<div class="alert alert-success">' + response.message + '.</div>');
                } else {
                    elem.append('<div class="alert alert-danger">' + response.message + '.</div>');
                }

            }
        }).then(function () {
            console.log('on completion for ajax... we are here to work...')
        });
    });

    $('#tax_computation-update').on('submit', function (e) {
        let elem = $(this);
        e.preventDefault();
        let form_data = new FormData(this);
        $('#erros').html('');
        let job_id = $("#job_id").val();
        form_data.append('job_id', job_id);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: user_ajax_url + "/job/update",
            data: form_data,
            cache: false,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status == 'success') {
                    elem.append('<div class="alert alert-success">' + response.message + '.</div>');
                } else {
                    elem.append('<div class="alert alert-danger">' + response.message + '.</div>');
                }

            }
        }).then(function () {
            console.log('on completion for ajax... we are here to work...')
        });
    });

    $('#gst_challan-update').on('submit', function (e) {
        let elem = $(this);
        e.preventDefault();
        let form_data = new FormData(this);
        $('#erros').html('');
        let job_id = $("#job_id").val();
        form_data.append('job_id', job_id);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: user_ajax_url + "/job/update",
            data: form_data,
            cache: false,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status == 'success') {
                    elem.append('<div class="alert alert-success">' + response.message + '.</div>');
                } else {
                    elem.append('<div class="alert alert-danger">' + response.message + '.</div>');
                }

            }
        });
    });

    $("#assign_to").on('change', function () {
        let user_role = 'freelancer';
        let user_id = $(this).val();
        //let elem = $(this).parent().parent();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: user_ajax_url + "/user/details",
            data: {
                user_role,
                user_id
            },
            //cache: false,
            //processData: true,
            //contentType: false,
            success: function (response) {
                $("#freelancer-info").html('');
                if (response.status == 'success') {
                    let html_res = '<table class="table table-striped table-sm">';
                    html_res += '<tr>';
                    html_res += '<td>Availble</td>';
                    html_res += `<td>${response.data.availablity.availability}</td>`;
                    html_res += '</tr>';
                    html_res += '<tr>';
                    html_res += '<td>Mon</td>';
                    html_res += `<td>${response.data.availablity.mon_hours} Hours</td>`;
                    html_res += '</tr>';
                    html_res += '<tr>';
                    html_res += '<td>Tue</td>';
                    html_res += `<td>${response.data.availablity.tue_hours} Hours</td>`;
                    html_res += '</tr>';
                    html_res += '<tr>';
                    html_res += '<td>Wed</td>';
                    html_res += `<td>${response.data.availablity.wed_hours} Hours</td>`;
                    html_res += '</tr>';
                    html_res += '<tr>';
                    html_res += '<td>Thu</td>';
                    html_res += `<td>${response.data.availablity.thu_hours} Hours</td>`;
                    html_res += '</tr>';
                    html_res += '<tr>';
                    html_res += '<td>Fri</td>';
                    html_res += `<td>${response.data.availablity.fri_hours} Hours</td>`;
                    html_res += '</tr>';
                    html_res += '<tr>';
                    html_res += '<td>Sat</td>';
                    html_res += `<td>${response.data.availablity.sat_hours} Hours</td>`;
                    html_res += '</tr>';
                    html_res += '<tr>';
                    html_res += '<td>Sun</td>';
                    html_res += `<td>${response.data.availablity.sun_hours} Hours</td>`;
                    html_res += '<tr>';
                    html_res += '<td>Notes</td>';
                    html_res += `<td>${response.data.availablity.notes}</td>`;
                    html_res += '</tr>';
                    html_res += '</tr>';
                    html_res += '</table>';
                    $("#freelancer-info").html(html_res);
                    //$("#freelancer-info").html('<div class="alert alert-success">' + JSON.stringify(response.data) + '.</div>');
                    //elem.append('<div class="alert alert-success">' + response.data + '.</div>');
                } else {
                    $("#freelancer-info").html('<div class="alert alert-danger">' + response.message + '.</div>');
                    //elem.append('<div class="alert alert-danger">' + response.message + '.</div>');
                }

            }
        });
    });





    //console.log('fdhjdkf:', ajax_url);
    $("#brand_id").on('change', function () {
        let brand_id = $(this).val();
        let product_select = document.getElementById("product_id");
        /*remove existing options*/
        let length = product_select.options.length;
        for (i = length - 1; i >= 0; i--) {
            product_select.options[i] = null;
        }

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: user_ajax_url + "/product/product-by-brand-id",
            data: {
                brand_id,
            },
            success: function (response) {
                if (response.data) {
                    let default_option = document.createElement("option");
                    default_option.text = '--Select--';
                    default_option.value = '';
                    product_select.add(default_option);

                    response.data.forEach(function (item, index) {
                        let option = document.createElement("option");
                        option.text = item.title;
                        option.value = item.id;
                        product_select.add(option);
                    });
                }
            }
        }).then(function () {
            $("#product_id").on('change', function () {
                let product_id = $(this).val();
                get_product_quantity(product_id);

            })
        });
    });

    $("#product_id").on('change', function () {
        let product_id = $(this).val();
        get_product_quantity(product_id);

    });

    function get_product_quantity(product_id) {
        if (product_id > 0) {

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: ajax_url + "/admin/product/product-by-id",
                data: {
                    product_id,
                },
                success: function (response) {
                    if (response.data) {
                        let msg = 'Available quantity: ' + response.data.available_quantity;
                        $("#available_qty").html('');
                        $("#available_qty").html(msg);
                        $('#quantity').attr('max', response.data.available_quantity);
                    }
                }
            });
        } else {
            $("#available_qty").html('Please select a product');
        }

    }


    $("#reviewer_id").on('change', function () {
        let reviewer_id = $(this).val();
        let mediator_id = $("#mediator_id").val();
        console.log(reviewer_id, ':', mediator_id);
        check_already_assigned_reviewer(reviewer_id, mediator_id);
    });

    function check_already_assigned_reviewer(reviewer_id, mediator_id) {
        if ((reviewer_id > 0) && (mediator_id > 0)) {

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: ajax_url + "/admin/user/check-already-assigned-reviewer",
                data: {
                    reviewer_id,
                    mediator_id
                },
                beforeSend: function () {
                    $("#already-exist-msg").html('');
                    $('#save-reviewer-mediator').removeAttr('disabled');
                },
                success: function (response) {
                    if (response.status == true) {
                        let msg = 'This pair of reviewer and mediator already exist.<a href="' + response.link + '"> See</a>';
                        $("#already-exist-msg").html('');
                        $("#already-exist-msg").html(msg);
                        $('#save-reviewer-mediator').attr('disabled', true);
                    }
                }
            });
        } else {
            $("#available_qty").html('Please select a product');
        }

    }

    $("#mediator_id").on('change', function () {
        let mediator_id = $(this).val();
        get_platforms_of_mediator(mediator_id);
    });

    $("#platform_id").on('change', function () {
        let platform_id = $(this).val();
        get_products_on_platform(platform_id);
        let platform_name = $(this).find('option:selected').text();
        platform_name = platform_name.replaceAll(/\s/g, '')
        console.log(platform_name);
        $("#platform_order_id").attr('data-validation', platform_name);
    });

    $("#platform_order_id").on('blur', function () {
        console.log('leaving..');
        let data_validation = $(this).attr('data-validation');
        let order_id = $(this).val();
        order_id = order_id.replace(/-|\s+/g, "");
        switch (data_validation) {
            case 'Amazon':
                order_id_length = order_id.length;
                if (order_id_length == 17) {

                    order_id = insert_at(order_id, 3, '-');
                    order_id = insert_at(order_id, 11, '-');
                    $(this).val(order_id);
                    $(this).removeClass('border-bottom-danger');
                } else {
                    $(this).addClass('border-bottom-danger');
                    $(this).focus();
                }

                break;
            case 'Flipkart':
                order_id_length = order_id.length;
                start_with = order_id.startsWith("OD");
                end_with = order_id.endsWith("000");
                if ((order_id_length == 20) && (start_with) && (end_with)) {
                    $(this).removeClass('border-bottom-danger');
                    return true;
                } else {
                    $(this).addClass('border-bottom-danger');
                    $(this).focus();
                }
                break;

            default:

                break;
        }
    });

    function get_platforms_of_mediator(mediator_id) {
        platform_select_box = document.getElementById("platform_id");
        reviewer_id = (document.getElementById("reviewer_id")) ? document.getElementById("reviewer_id").value : 0;
        if (mediator_id > 0) {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: user_ajax_url + "/order/get-mediator-platforms",
                data: {
                    mediator_id,
                    reviewer_id
                },
                beforeSend: function () {
                    // remove all optoins from product selects
                    let length_one = platform_select_box.options.length;
                    for (i = length_one - 1; i >= 0; i--) {
                        platform_select_box.options[i] = null;
                    }

                },
                success: function (response) {
                    if (response.data) {
                        let default_option_one = document.createElement("option");
                        default_option_one.text = '--Select--';
                        default_option_one.value = '';
                        platform_select_box.add(default_option_one);

                        response.data.forEach(function (item, index) {
                            let option1 = document.createElement("option");
                            option1.text = item.title;
                            option1.value = item.id;
                            platform_select_box.add(option1);

                        });
                    }
                }
            });
        }
    }

    function insert_at(str, index, value) {
        return str.substr(0, index) + value + str.substr(index);
    }



    function get_products_on_platform(platform_id) {
        product_select_one = document.getElementById("product_one_id");
        product_select_two = document.getElementById("product_two_id");
        product_select_three = document.getElementById("product_three_id");
        reviewer_id = document.getElementById("reviewer_id") ? document.getElementById("reviewer_id").value : 0;
        if (platform_id > 0) {

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: user_ajax_url + "/order/get-platform-products",
                data: {
                    platform_id,
                    reviewer_id
                },
                beforeSend: function () {
                    $("#platform-msg").html('');
                    // remove all optoins from product selects
                    let length_one = product_select_one.options.length;
                    for (i = length_one - 1; i >= 0; i--) {
                        product_select_one.options[i] = null;
                    }
                    let length_two = product_select_two.options.length;
                    for (i = length_two - 1; i >= 0; i--) {
                        product_select_two.options[i] = null;
                    }
                    let length_three = product_select_three.options.length;
                    for (i = length_three - 1; i >= 0; i--) {
                        product_select_three.options[i] = null;
                    }


                },
                success: function (response) {
                    if (response.data) {
                        let default_option_one = document.createElement("option");
                        default_option_one.text = '--Select--';
                        default_option_one.value = '';
                        product_select_one.add(default_option_one);

                        let default_option_two = document.createElement("option");
                        default_option_two.text = '--Select--';
                        default_option_two.value = '';
                        product_select_two.add(default_option_two);


                        let default_option_three = document.createElement("option");
                        default_option_three.text = '--Select--';
                        default_option_three.value = '';
                        product_select_three.add(default_option_three);

                        response.data.forEach(function (item, index) {
                            let option1 = document.createElement("option");
                            let option2 = document.createElement("option");
                            let option3 = document.createElement("option");
                            option1.text = item.title;
                            option2.text = item.title;
                            option3.text = item.title;
                            option1.value = item.id;
                            option2.value = item.id;
                            option3.value = item.id;
                            product_select_one.add(option1);
                            product_select_two.add(option2);
                            product_select_three.add(option3);
                        });
                    }
                }
            });
        } else {
            $("#platform-msg").html('Please select a valid platform');
        }

    }

    $("#export-to-google").on('click', function () {
        let elem = $(this);
        let action = 'google-sheet';
        let brand = $("#brand").val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: user_ajax_url + "/order/create-sheet",
            data: {
                action,
                brand
            },
            beforeSend: function () {
                // do code
                $('#laoding-msg').html('<p class="loading">Generating Google Sheet...</p>');
                elem.attr('disabled', true);
            },
            success: function (response) {
                if (response.data) {
                    // do code
                    $('#laoding-msg').html('<p class="loaded">Google Sheet generated successfully.</p>');
                    elem.removeAttr('disabled');
                }
            }
        });
    });


    ///product-price
    ///order_total

    $(".product-price").on('keyup', function () {
        let order_total = 0;
        $(".product-price").each(function (index) {
            let current_val = 0;
            //console.log('val: ', index, typeof $(this).val());
            if ($(this).val()) {
                current_val = $(this).val();
            }
            if ((current_val != null) || (current_val != undefined) || (current_val != NaN)) {
                order_total = (parseFloat(order_total) + parseFloat(current_val));
            }
        });
        $(".order_total").val(order_total);
    });

    $("#product_one_id").on('change', function () {
        $(".product-two-block").attr('style', 'display:flex;');
    });

    $("#product_two_id").on('change', function () {
        $(".product-three-block").attr('style', 'display:flex;');
    });

    $("#reviewer_id_select").on('change', function () {
        let reviewer_id = $(this).val();
        let reviewer_name = $("#reviewer_id_select option:selected").text();
        $("#reviewer_id").val(reviewer_id);
        $("#reviewer_name").val(reviewer_name);
        let action = 'get_reviewer_mediators';
        let elem = $(this);
        mediator_select_box = document.getElementById("mediator_id");
        // fetch reviewer's mediators
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: user_ajax_url + "/order/get-reviewer-mediators",
            data: {
                action,
                reviewer_id
            },
            beforeSend: function () {
                // do code
                $('#laoding-msg').html('<p class="loading">Fetching medaitors...</p>');
                elem.attr('disabled', true);
                // remove old options                
                for (i = mediator_select_box.options.length - 1; i >= 0; i--) {
                    mediator_select_box.options[i] = null;
                }
            },
            success: function (response) {
                if (response.data) {
                    // do code
                    $('#laoding-msg').html('');
                    elem.removeAttr('disabled');
                    /// add select default option
                    let default_option = document.createElement("option");
                    default_option.text = '--Select--';
                    default_option.value = '';
                    mediator_select_box.add(default_option);
                    /// add more options
                    if (response.data.length > 0) {
                        response.data.forEach(function (item, index) {
                            let option1 = document.createElement("option");
                            option1.text = item.name;
                            option1.value = item.id;
                            mediator_select_box.add(option1);

                        });
                    }
                }
            }
        });

    });

    $("#reviewer_id_selectbox").on('change', function () {
        let reviewer_id = $(this).val();
        let reviewer_name = $("#reviewer_id_selectbox option:selected").text();
        $("#reviewer_id").val(reviewer_id);
        $("#reviewer_name").val(reviewer_name);
    });

    $("#rmsCheckAll").on('click', function () {
        $(".checkBoxClass").prop('checked', $(this).prop('checked'));
        if ($(this).prop('checked')) {
            $("#bulk_order_status").removeAttr('readonly');
            $("#bulk_refund_status").removeAttr('readonly');
            $("#apply-bulk-action").removeAttr('disabled');
        } else {
            $("#bulk_order_status").attr('readonly', true);
            $("#bulk_refund_status").attr('readonly', true);
            $("#apply-bulk-action").attr('disabled', true);
        }
    });

    $("input[name^='rms_order_row_check']").on('click', function () {
        if ($(this).prop('checked')) {
            $("#bulk_order_status").removeAttr('readonly');
            $("#bulk_refund_status").removeAttr('readonly');
            $("#apply-bulk-action").removeAttr('disabled');
        } else {
            $("#bulk_order_status").attr('readonly', true);
            $("#bulk_refund_status").attr('readonly', true);
            $("#apply-bulk-action").attr('disabled', true);
        }
    });

});