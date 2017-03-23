var status_recaptcha = false;//Check reCAPTCHA status

function recaptchaCallback () {
    grecaptcha.render("recaptcha", {
        sitekey: '6LdL9BkUAAAAAM9RC5X-orWYSPzODjeRBoZQvtaa',
        callback: function () {
            $('#register-form input[name="recaptcha_valid"]').val('valid');
            status_recaptcha = true;
            $('#register-form').bootstrapValidator('revalidateField', 'recaptcha_valid');
        }
    });
}

$(document).ready(function(){
    $('.alert .close').click(function(e) {
        e.preventDefault();
        $(this).parent().fadeOut('300');
    });
    $.fn.datepicker.dates['ru'] = {
        days: ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресенье"],
        daysShort: ["Вск", "Пнд", "Втр", "Срд", "Чтв", "Птн", "Суб", "Вск"],
        daysMin: ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"],
        months: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
        monthsShort: ["Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек"],
        today: "Сегодня"
    };
    $('.datepickerr').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        language: 'ru'
    });
    $('input[name="birthday"]').on('changeDate show', function(e) {
        $('#register-form').bootstrapValidator('revalidateField', 'birthday');
    });
    $('#delete_account').click(function(e){
        $.ajax({
            type: 'post',
            dataType: "json",
            url: base_url+'dashboard/delete_account/'+uid,
            success: function(response) {
                if(!response.status) {
                    $('#message_modal .modal-title').html(response.message_title);
                    $('#message_modal .modal-body p').html(response.message_body);
                    $('#confirmModal').modal('hide');
                    $('#message_modal').modal('show');
                }
                else{
                    window.location = base_url;
                }
            }
        });
    });

    /*--Authorization and Registration form--*/
    $('#auth').click(function(e) {
        e.preventDefault();
        $("#login-form").fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $('#login-form-link').addClass('active');
        $('#auth_modal').modal('show');
    });
    $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#register-form').bootstrapValidator({
        fields: {
            lastname: {
                validators: {
                    notEmpty: {
                        message: 'Пожалуйста укажите фамилию'
                    }
                }
            },
            firstname: {
                validators: {
                    notEmpty: {
                        message: 'Пожалуйста укажите имя'
                    }
                }
            },
            username: {
                validators: {
                    notEmpty: {
                        message: 'Пожалуйста укажите логин'
                    },
                    remote: {
                        url: base_url+'main/check_login',
                        type: 'post',
                        data: function(validator) {
                            return {
                                username: validator.getFieldElements('username').val()
                            };
                        },
                        message: 'Такой логин уже существует'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Пожалуйста укажите E-mail'
                    },
                    emailAddress: {
                        message: 'Пожалуйста укажите верный E-mail'
                    }
                }
            },
            birthday: {
                validators: {
                    notEmpty: {
                        message: 'Пожалуйста укажите дату рождения'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Пожалуйста укажите номер телефона'
                    },
                    phone: {
                        country: 'US',
                        message: 'Пожалуйста укажите верный номер телефона'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Пожалуйста укажите пароль'
                    },
                    stringLength: {
                        min: 6,
                        max: 16,
                        message:'Пожалуйста, введите по крайней мере 6 символов но не более 16'
                    },
                    identical: {
                        field: 'confirm_password',
                        message: 'Пароли не совпадают'
                    }
                }
            },
            confirm_password: {
                validators: {
                    notEmpty: {
                        message: 'Пожалуйста укажите пароль еще раз'
                    },
                    identical: {
                        field: 'password',
                        message: 'Пароли не совпадают'
                    }
                }
            },
            recaptcha_valid: {
                excluded: false,
                validators: {
                    callback: {
                        message: 'Пожалуйста подтвердите,что Вы не робот',
                        callback: function(value) {
                            if(value == 'valid' && status_recaptcha){
                                return true;
                            }
                            else {
                                return false;
                            }
                        }
                    }
                }
            }
        },
        onSuccess: function(e) {
            e.preventDefault();
            var data = $('#register-form').serialize();
            $.ajax({
                type: 'post',
                dataType: "json",
                url: base_url+'main/registr',
                data: data,
                success: function(response) {
                    if(response.status) {
                        $('#auth_modal').modal('hide');
                        $('#register-form').trigger("reset");
                        $('#register-form .form-group').removeClass('has-success has-error');
                        grecaptcha.reset();
                        $('#register-form #phone').val('');
                        $('#message_modal .modal-title').html(response.message_title);
                        $('#message_modal .modal-body p').html(response.message_body);
                        $('#message_modal').modal('show');
                    }
                    else{
                        $('#message_modal .modal-title').html(response.message_title);
                        $('#message_modal .modal-body p').html(response.message_body);
                        $('#message_modal').modal('show');
                    }
                }
            });
        }
    }).find('[name="phone"]').mask('000-0000000');
    $('#login-form').bootstrapValidator({
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'Пожалуйста укажите логин'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Пожалуйста укажите пароль'
                    }
                }
            }
        },
        onSuccess: function(e) {
            e.preventDefault();
            var data = $('#login-form').serialize();
            $.ajax({
                type: 'post',
                dataType: "json",
                url: base_url+'main/auth',
                data: data,
                success: function(response) {
                    console.debug(response);
                    if(!response.status) {
                        $('#login-form input[type="password"]').val('');
                        $('#login-form .alert strong').html(response.message_title);
                        $('#login-form .alert span').html(response.message_body);
                        $('#login-form .alert').fadeIn('300');
                    }
                    else{
                        window.location = base_url;
                    }
                }
            });
        }
    });
    /*--END Authorization and Registration form--*/

    /*--Update form--*/
    $('#update-form').bootstrapValidator({
        fields: {
            avatar: {
                validators: {
                    file: {
                        extension: 'jpeg,jpg,png',
                        type: 'image/jpeg,image/png',
                        message: 'Выберите другой тип файла'
                    }
                }
            },
            lastname: {
                validators: {
                    notEmpty: {
                        message: 'Пожалуйста укажите фамилию'
                    }
                }
            },
            firstname: {
                validators: {
                    notEmpty: {
                        message: 'Пожалуйста укажите имя'
                    }
                }
            },
            username: {
                validators: {
                    notEmpty: {
                        message: 'Пожалуйста укажите логин'
                    }
                    ,remote: {
                        url: base_url+'dashboard/check_login/',
                        type: 'post',
                        data: function(validator) {
                            return {
                                username: validator.getFieldElements('username').val(),
                                username_original: $('#username_original').val()
                            };
                        },
                        message: 'Такой логин уже существует'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Пожалуйста укажите E-mail'
                    },
                    emailAddress: {
                        message: 'Пожалуйста укажите верный E-mail'
                    }
                }
            },
            birthday: {
                validators: {
                    notEmpty: {
                        message: 'Пожалуйста укажите дату рождения'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Пожалуйста укажите номер телефона'
                    },
                    phone: {
                        country: 'US',
                        message: 'Пожалуйста укажите верный номер телефона'
                    }
                }
            },
            password: {
                validators: {
                    stringLength: {
                        min: 6,
                        max: 16,
                        message:'Пожалуйста, введите по крайней мере 6 символов но не более 16'
                    },
                    identical: {
                        field: 'confirm_password',
                        message: 'Пароли не совпадают'
                    }
                }
            },
            confirm_password: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'Пароли не совпадают'
                    }
                }
            }
        },
        onSuccess: function(e) {
            e.preventDefault();
            var form = $('#update-form');
            var data = new FormData(form[0]);
            $.ajax({
                type: 'post',
                dataType: "json",
                url: base_url+'dashboard/update/'+uid,
                data: data,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if(response.user){
                        $('#update-form .form-group').removeClass('has-success has-error');
                        if(response.file){
                            $('#update-form .avatar').attr("src",response.file);
                            $('.navbar .avatar').attr("src",response.file);
                        }
                        $('#update-form input[name="password"]').val('');
                        $('#update-form input[name="confirm_password"]').val('');
                        $('#update-form input[name="avatar"]').val('');
                    }

                    $('#message_modal .modal-title').html(response.message_title);
                    $('#message_modal .modal-body p').html(response.message_body);
                    $('#message_modal').modal('show');
                }
            });
        }
    }).find('[name="phone"]').mask('000-0000000');
    /*--END Update form--*/

    /*--Contacts Page--*/
    $('#callback-form').bootstrapValidator({
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'Пожалуйста укажите Ваше имя'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Пожалуйста укажите E-mail'
                    },
                    emailAddress: {
                        message: 'Пожалуйста укажите верный E-mail'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Пожалуйста укажите номер телефона'
                    },
                    phone: {
                        country: 'US',
                        message: 'Пожалуйста укажите верный номер телефона'
                    }
                }
            },
            subject: {
                validators: {
                    notEmpty: {
                        message: 'Пожалуйста укажите суть вопроса'
                    }
                }
            },
            message: {
                validators: {
                    notEmpty: {
                        message: 'Пожалуйста укажите текст вопрос'
                    },
                    stringLength: {
                        min: 0,
                        max: 140,
                        message:'Пожалуйста, введите текст не более чем 140 символов'
                    }
                }
            }
        },
        onSuccess: function(e) {
            e.preventDefault();
            var data = $('#callback-form').serialize();
            $.ajax({
                type: 'post',
                dataType: "json",
                url: base_url+'contacts/add_message/',
                data: data,
                success: function(response) {
                    if(response.status){
                        $('#callback-form').trigger("reset");
                        $('#callback-form .form-group').removeClass('has-success has-error');
                        $('#callback-form input[name="phone"]').val('');
                    }
                    $('#message_modal .modal-title').html(response.message_title);
                    $('#message_modal .modal-body p').html(response.message_body);
                    $('#message_modal').modal('show');
                }
            });
        }
    }).find('[name="phone"]').mask('000-0000000');
    /*--END Contacts page--*/
});
