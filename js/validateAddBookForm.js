$(function(){
    'use strict'
    var autherError = true,
        titleError = true,
        descriptionError = true

        // Last check
    $('#submit_div').on("click", function(){
        if($('#submit').attr("disabled") == "disabled"){
            if(autherError == true){
                $(this).parent().parent().find('.form-item .alert.authername').slideDown(500);
            }
            if(titleError == true){
                $(this).parent().parent().find('.form-item .alert.title').slideDown(500);
            }
            if(descriptionError == true){
                $(this).parent().parent().find('.form-item .alert.description').slideDown(500);
            }
        }
    })

    // Auther Name
    $('#authername').keyup(function(){
        if($(this).val() == ''){
            autherError = true
            $(this).css('border', '3px solid rgba(255, 0, 0, .6)').siblings('.alert').slideDown(500).siblings('.star').fadeIn(500)
        }else{
            autherError = false
            $(this).css('border', '3px solid rgba(0, 255, 0, .6)').siblings('.alert').slideUp(500).siblings('.star').fadeOut(500);
        }
        submitActive()
    })
    
    // Title
    $('#title').keyup(function(){
        if($(this).val() == ''){
            titleError = true
            $(this).css('border', '3px solid rgba(255, 0, 0, .6)').siblings('.alert').slideDown(500).siblings('.star').fadeIn(500)
        }else{
            titleError = false
            $(this).css('border', '3px solid rgba(0, 255, 0, .6)').siblings('.alert').slideUp(500).siblings('.star').fadeOut(500);
        }
        submitActive()
    })

    // describtion
    $('#description').keyup(function(){
        if($(this).val().length < 30 || $(this).val().length > 200 ){
            descriptionError = true
            $(this).css('border', '3px solid rgba(255, 0, 0, .6)').siblings('.alert').slideDown(500).siblings('.star').fadeIn(500)
        }else{
            descriptionError = false
            $(this).css('border', '3px solid rgba(0, 255, 0, .6)').siblings('.alert').slideUp(500).siblings('.star').fadeOut(500);
        }
        submitActive()
    })


    // Active submit button
    function submitActive() {
        if (autherError == false && titleError == false && descriptionError == false) {
            $('#submit').removeAttr('disabled')
        } else {
            $('#submit').attr('disabled', 'disabled')
        }
        
    }
})