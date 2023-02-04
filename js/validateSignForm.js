$(function(){
    'use strict'
    var emailError = true,
        passwordError = true,
        nameError = true,
        confirmpasswordError = true,
        inputsLength = $("form input").length

    // Last check
    $('#submit_div').on("click", function(){
        if($('#submit').attr("disabled") == "disabled"){
            if(emailError == true){
                $(this).parent().parent().find('.form-item .alert.email').slideDown(500);
            }
            if(passwordError == true){
                $(this).parent().parent().find('.form-item .alert.password').slideDown(500);
            }
            if(confirmpasswordError == true){
                $(this).parent().parent().find('.form-item .alert.confirmpassword').slideDown(500);
            }
            if(nameError == true){
                $(this).parent().parent().find('.form-item .alert.name').slideDown(500);
            }
        }
    })


    // Name
    $('#name').keyup(function(){
        if($(this).val() == ''){
            nameError = true
            $(this).css('border', '3px solid rgba(255, 0, 0, .6)').siblings('.alert').slideDown(500).siblings('.star').fadeIn(500)
        }else{
            nameError = false
            $(this).css('border', '3px solid rgba(0, 255, 0, .6)').siblings('.alert').slideUp(500).siblings('.star').fadeOut(500);
        }
        submitActive()
    })

    // Email
    $('#email').keyup(function(){
        if($(this).val() == ''){
            emailError = true
            $(this).css('border', '3px solid rgba(255, 0, 0, .6)').siblings('.alert').slideDown(500).siblings('.star').fadeIn(500)
        }else{
            emailError = false
            $(this).css('border', '3px solid rgba(0, 255, 0, .6)').siblings('.alert').slideUp(500).siblings('.star').fadeOut(500);
        }
        submitActive()
    })

    // Password
    $('#password').keyup(function(){
        if($(this).val() == ''){
            passwordError = true
            $(this).css('border', '3px solid rgba(255, 0, 0, .6)').siblings('.alert').slideDown(500).siblings('.star').fadeIn(500)
        }else{
            if($(this).val() != $('#confirmpassword').val()){
                confirmpasswordError = true
                $('#confirmpassword').css('border', '3px solid rgba(255, 0, 0, .6)').siblings('.alert').slideDown(500).siblings('.star').fadeIn(500)
            }else{
                confirmpasswordError = false
                $('#confirmpassword').css('border', '3px solid rgba(0, 255, 0, .6)').siblings('.alert').slideUp(500).siblings('.star').fadeOut(500);
            }
            passwordError = false
            $(this).css('border', '3px solid rgba(0, 255, 0, .6)').siblings('.alert').slideUp(500).siblings('.star').fadeOut(500);
        }
        submitActive()
    })
    $('#confirmpassword').keyup(function(){
        if($(this).val() != $('#password').val()){
            confirmpasswordError = true
            $(this).css('border', '3px solid rgba(255, 0, 0, .6)').siblings('.alert').slideDown(500).siblings('.star').fadeIn(500)
        }else{
            confirmpasswordError = false
            $(this).css('border', '3px solid rgba(0, 255, 0, .6)').siblings('.alert').slideUp(500).siblings('.star').fadeOut(500);
        }
        submitActive()
    })

    // Active submit button
    function submitActive() {
        if (inputsLength == 5) {
            if (emailError == false && passwordError == false && nameError == false && confirmpasswordError == false) {
                $('#submit').removeAttr('disabled')
            } else {
                $('#submit').attr('disabled', 'disabled')
            }
        }else if (inputsLength == 3) {
            if (emailError == false && passwordError == false) {
                $('#submit').removeAttr('disabled')
            } else {
                $('#submit').attr('disabled', 'disabled')
            }
        }
        
    }


    // Show and hide password
    $('.form-item .see').on('click', function(){
        $(this).toggleClass('show-password-active')
        $('.form-item .notsee').toggleClass('show-password-active')
        $(this).siblings('input').attr('type', 'text').focus();
    })
    $('.form-item .notsee').on('click', function(){
        $(this).toggleClass('show-password-active')
        $('.form-item .see').toggleClass('show-password-active')
        $(this).siblings('input').attr('type', 'password').focus();
    })

    $('.form-item .seec').on('click', function(){
        $(this).toggleClass('show-password-active')
        $('.form-item .notseec').toggleClass('show-password-active')
        $(this).siblings('input').attr('type', 'text').focus();
    })
    $('.form-item .notseec').on('click', function(){
        $(this).toggleClass('show-password-active')
        $('.form-item .seec').toggleClass('show-password-active')
        $(this).siblings('input').attr('type', 'password').focus();
    })

    
})