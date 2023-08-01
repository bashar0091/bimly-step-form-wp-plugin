jQuery(document).ready(function($) {
    
    // radion active inactive 
    $('.step_1_radio label').click(function(){
        $('.bimly_radio').removeClass('active');
        $(this).find('.bimly_radio').addClass('active');
    });


    // progress process 
    function progress_step(){
        var total_class_count = $('.bimly_step_form_wrapper').length;
        var progress_width = 100 / total_class_count;

        var single_class_count = $('.progress_active').length;
        var progress_width_plus = progress_width * single_class_count;

        $('.bimly_form_progress_inner').css('width', `${progress_width_plus}%`); 
    }
    
    // multistep show hide 
    function step_active_deactive(id1, id2) {
        $('.bimly_next_btn_'+id1).click(function(){
            $('#step_'+id1).removeClass('step_active');
            $('#step_'+id2).addClass('step_active');

            $('#step_'+id1).addClass('progress_active');

            progress_step();
        });
    }

    step_active_deactive(1,2);
    step_active_deactive(2,3);
    step_active_deactive(3,4);
    step_active_deactive(4,5);
    step_active_deactive(5,6);
    step_active_deactive(6,7);
    step_active_deactive(7,8);
    step_active_deactive(8,9);
    step_active_deactive(9,10);

    // loop button click 
    $('.bimly_loop_btn_1').click(function(){
        $('#step_4').removeClass('step_active');
        $('#step_3').addClass('step_active');

        $('#step_4').removeClass('progress_active');

        progress_step();
    });

    // radio click on textarea text show 
    $('.step_3_radio label').click(function(){
        var textarea_text = $(this).find('.radio_text').text();
        $('.bimly_text_1').text(textarea_text);
    });



    // Image preview show 
    function previewImages(event) {
        const previewContainer = $(".image_preview_container");
        previewContainer.empty();

        const files = event.target.files;
        const maxItemsToShow = 5;

        for (let i = 0; i < Math.min(files.length, maxItemsToShow); i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function () {
                const imgElement = $("<img>").attr("src", reader.result);
                imgElement.addClass("preview_image");
                const spanElement = $("<span>").addClass("image_remove").append(imgElement);
                previewContainer.append(spanElement);

                $('.image_remove').click(function(){
                    $(this).remove();
                });
            };

            reader.readAsDataURL(file);
        }
    }

    $("#image_input").on("change", previewImages);

    // toggle click 
    $('.top_toggle_click').click(function(){
        $('.bimly_toggle_hide').toggleClass('active')
    });

    // back arrow js 
    function back_arrow_func(id2, id1) {
        $('.back_arrow_'+id2).click(function(){
            $('#step_'+id2).removeClass('step_active');
            $('#step_'+id1).addClass('step_active');
    
            $('#step_'+id1).removeClass('progress_active');
    
            progress_step();
        });
    }
    back_arrow_func(2, 1);
    back_arrow_func(3, 2);
    back_arrow_func(4, 3);
    back_arrow_func(5, 4);
    back_arrow_func(6, 5);
    back_arrow_func(7, 6);
    back_arrow_func(8, 7);
    back_arrow_func(9, 8);
    back_arrow_func(10, 9);
   
    // summary edit click
    $('.summary_edit').click(function(){
        $('#step_5').removeClass('step_active');
        $('#step_4').addClass('step_active');

        $('#step_4').removeClass('progress_active');

        progress_step();
    });


    // info data show 
    function data_change(num) {
        $('.data_'+num).on('change', function() {
            var data_store = $(this).val();
            $('.data_show_'+num).text(data_store);
        });
    }

    data_change(1);
    data_change(2);
    data_change(3);
    data_change(4);
    data_change(5);
    data_change(6);
    data_change(7);
    data_change(8);
    data_change(9);
   
    // signature popup field 1 ===================================
    function signature_func(num) {
        var canvas = document.querySelector(".canvas_"+num);
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        var signaturePad = new SignaturePad(canvas);
      
        $(".clear_btn_" + num).click(function() {
          signaturePad.clear();
        });
      
        $(".save_btn_" + num).click(function() {
          if (signaturePad.isEmpty()) {
            alert("Please provide a signature first.");
          } else {
            var signatureDataURL = signaturePad.toDataURL();
            $(".signature_field_" + num).html('<img src="' + signatureDataURL + '" alt="signature">');
      
            $('.signature_popup_' + num).removeClass('active');
          }
        });
      
        $('.signature_field_' + num).click(function() {
          $('.signature_popup_' + num).addClass('active');
        });
        $('.back_btn_' + num).click(function() {
          $('.signature_popup_' + num).removeClass('active');
        });
    }
    signature_func(1);
    signature_func(2);


    // pdf open close 
    $('.pdf_generator').click(function(){
        $('.pdf_view_time').addClass('active');
    });
    $('.back_arrow_pdf_close').click(function(){
        $('.pdf_view_time').removeClass('active');
    });

    // pdf title show
    $('.pdf_title_click label').click(function(){
        var pdf_title_get = $(this).find('.radio_text').text();
        $('.pdf_title').text(pdf_title_get);
    });

    // pdf date show
    $('.data_1').on('change', function() {
        var data_store = $(this).val();
        $('.pdf_date').text(data_store);
    });

});