<script>
    
    var vIsSubmit = false;
    
    $(document).ready(function() {        
        $('.refresh').click(function () { $('#' + $(this).attr('data-parent')).attr('src', $('#' + $(this).attr('data-parent')).attr('src') + '/' + new Date().getTime()); });
        $('#frmCareer').submit(function(e) {
            
            e.preventDefault();
            
            if(vIsSubmit) return;

            var objFormData = new FormData(document.getElementById('frmCareer'));                  // Creating object of FormData class

            vIsSubmit = true;

            $('#career_loader').show();
            $('#career_error').slideUp();
            $('#career_success').slideUp();
            $('div.form-group div.error-inline.text-danger').remove();

            $.ajax(
            {
                
                url: '<?php echo $GLBHost; ?>career/submit',
                contentType: false,
                processData: false,
                type: 'POST',
                data: objFormData,
                dataType: 'json',
                success: function (data)
                {
                    $('#career_loader').hide();                    
                    if(data['iserror'])
                    {
                        vIsSubmit = false;                        
                        //$('.career-form').slideDown();
                        //$('#career_error').html(data['message']).slideDown();
                                                
                        if(data['errorjs'])
                        {                            
                            eval(data['errorjs']);
                            handleErrorControls();

                            $('.form-group').find('[data-error]').each(function()
                            {
                                var vErrorDesc = $(this).attr('data-error');        
                                $(this).closest('.form-group').append('<div class="error-inline text-danger">' + vErrorDesc + '</div>');
                            });	                                
                        }
                    }
                    else
                    {                                    
                        $('#career_success').html(data['message']).slideDown();
                        $('.career-form').slideUp();                        
                        vIsSubmit = false;
                    }
                },
                error: function (data)
                {
                    vIsSubmit = false;
                    handleErrorControls();
                    $('.career-form').slideDown();
                    $('#career_error').html(data).slideDown();
                }
            });
        });
    });
    
    function handleErrorControls()
    {
        $('.form-group input.error, .form-group textarea.error, .form-group select.error').keypress(function()
        {
            $(this).removeAttr('data-error').removeClass('error').closest('.control').find('div.error').remove();
        });
    }
</script>