jQuery(document).ready(function($) {
    
    // radion active inactive 
    function radio_active_inactive(num) {
        $('.step_'+num+'_radio label').click(function(){
            $('.bimly_radio_'+num).removeClass('active');
            $(this).find('.bimly_radio').addClass('active');
        });
    }
    radio_active_inactive(2);
    radio_active_inactive(3);


    // progress process 
    function progress_step(){
        var total_class_count = $('.bimly_step_form_wrapper').length;
        var progress_width = 100 / total_class_count;

        var single_class_count = $('.progress_active').length;
        var progress_width_plus = progress_width * single_class_count;

        $('.bimly_form_progress_inner').css('width', `${progress_width_plus}%`); 
    }
    

    // validation of form submit 
    function step_with_required(id1, id2) {
        $('.bimly_next_btn_'+id1).click(function(e) {
            var radioGroup = $('input[name="radio_' + id1 + '"]:checked');
            if (radioGroup.length === 0) {
                e.preventDefault();
                $('.error').addClass('show');
            } else {
                $('.error').removeClass('show');
                $('#step_'+id1).removeClass('step_active');
                $('#step_'+id2).addClass('step_active');
                
                $('#step_'+id1).addClass('progress_active');
                
                progress_step();
            }
        });
    }
    step_with_required(1, 2);
    step_with_required(3, 4);


    // multistep show hide 
    function step_active_deactive(id1, id2) {
        $('.bimly_next_btn_'+id1).click(function(){
            $('#step_'+id1).removeClass('step_active');
            $('#step_'+id2).addClass('step_active');

            $('#step_'+id1).addClass('progress_active');

            progress_step();
        });
    }

    step_active_deactive(2,3);
    step_active_deactive(5,6);
    step_active_deactive(7,8);
    step_active_deactive(8,9);


    $('.bimly_next_btn_6').click(function(e) {
        var inputGroup = $('#step_6 input').val();
        if (inputGroup.length === 0) {
            e.preventDefault();
            $('.error').addClass('show');
        } else {
            $('.error').removeClass('show');
            $('#step_6').removeClass('step_active');
            $('#step_7').addClass('step_active');
            
            $('#step_6').addClass('progress_active');
            
            progress_step();
        }
    });


    // loop button click 
    $('.bimly_loop_btn_1').click(function(){
        $('#step_4').removeClass('step_active');
        $('#step_3').addClass('step_active');

        $('#step_4').removeClass('progress_active');

        progress_step();
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
            $('.database_save_'+num).val(data_store);
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
    $('.pdf_generator').click(function(e){
        e.preventDefault();
        $('.pdf_view_time').addClass('active');
    });
    $('.back_arrow_pdf_close').click(function(){
        $('.pdf_view_time').removeClass('active');
    });

    // pdf title show
    $('.pdf_title_click label').click(function(){
        var pdf_title_get = $(this).find('.radio_text').text();
        $('.pdf_title').text(pdf_title_get);
        $('.data_4').val(pdf_title_get);
    });

    // pdf date show
    $('.data_1').on('change', function() {
        var data_store = $(this).val();
        $('.pdf_date').text(data_store);
    });



    // plus added to append input 
    function append_input(num) {
        var id = 1;
        $('.plus_added_'+num).click(function() {

            id++;

            var input_field = `<div>
            <a href="#!" id="data_show_remove${id}_${num}" class="input_remove">X</a>
            <label>Imię i nazwisko przedstawicieli inwestora</label>
            <input type="text" class="data_add_${id}_${num}" placeholder="Wpisz przedstawiciela inwestora"></div>`;

            var save_progress = `
                <div class="data_show_remove${id}_${num}">
                    <p class="info_label">Imię i nazwisko przedstawicieli inwestora</p>
                    <p class="info_value data_show_add_${id}_${num}"></p>
                </div>
            `;
    
            $('.input_append_'+num).append(input_field);
            $('.input_save_append_'+num).append(save_progress);

            // input remove on click 
            $('.input_remove').click(function(){
                $(this).parent().remove();
                var id_save = $(this).attr('id');
                $('.'+id_save).remove();
            });

            $(`.data_add_${id}_${num}`).on('input', function() {
                var extra_input_val = $(this).val();
                $(`.data_show_add_${id}_${num}`).text(extra_input_val);
            });

        });
    }
    append_input(1);
    append_input(2);



    // plus to issue section append
    var num = 0;
    $('.plus_wrapper_click').click(function(){
        num++;
        var issue_box = `
            <div class="separate_border">
                <label>Dodaj opis uwagi</label>
                <textarea class="bimly_text_1 bimly_text_input_${num} error" placeholder="Opisz uwagę tak aby....."></textarea>

                <div>
                    <div class="image_preview_container"></div>
                    <label class="file_upload">
                        <input type="file" name="images[]" class="image_input" accept="image/*" multiple="">
                        <b>
                            <span>
                                <svg widht="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="13" r="3" stroke="#1C274C" stroke-width="1.5"></circle> <path d="M3.0001 12.9999C3.0001 10.191 2.99995 8.78673 3.67407 7.77783C3.96591 7.34107 4.34091 6.96607 4.77767 6.67423C5.78656 6.00011 7.19103 6.00011 9.99995 6.00011H14C16.8089 6.00011 18.2133 6.00011 19.2222 6.67423C19.659 6.96607 20.034 7.34107 20.3258 7.77783C21 8.78673 21.0001 10.191 21.0001 12.9999C21.0001 15.8088 21.0001 17.2133 20.326 18.2222C20.0341 18.6589 19.6591 19.0339 19.2224 19.3258C18.2135 19.9999 16.809 19.9999 14.0001 19.9999H10.0001C7.19117 19.9999 5.78671 19.9999 4.77782 19.3258C4.34106 19.0339 3.96605 18.6589 3.67422 18.2222C3.44239 17.8752 3.29028 17.4815 3.19049 16.9999" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>   <path d="M18 10H17.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>   <path d="M14.5 3.5H9.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>   </g></svg> 
                                
                                (max. 5 zdjęć)
                            </span>
                        </b>
                    </label>
                </div>
            </div>
        `;

        var summary_append = `
            <div class="separate_border">
                <div class="bimly_text_second bimly_text_showed_${num}"></div>

                <div>
                    <div class="image_preview_container image_preview_gap"></div>
                </div>
            </div>
        `;

        $('.step_4_form').append(issue_box);

        $('.summary_append').append(summary_append);

        $('#step_3').removeClass('step_active');
        $('#step_4').addClass('step_active');

        $('#step_3').removeClass('progress_active');

        progress_step();
        $(".image_input").on("change", previewImages);

        $(`.bimly_text_input_${num}`).on('input', function() {
            var text_val = $(this).val();
            $(`.bimly_text_showed_${num}`).text(text_val);
        })


        $('.bimly_next_btn_4').click(function(e) {
            var textarea = $(`.bimly_text_input_${num}`).val();
            if (textarea.length === 0) {
                e.preventDefault();
                $('.error').addClass('show');
            } else {
                $('.error').removeClass('show');
                $('#step_4').removeClass('step_active');
                $('#step_5').addClass('step_active');
                
                $('#step_4').addClass('progress_active');
                
                progress_step();
            }
        });
    });

    // radio click on textarea section append
    $('.bimly_next_btn_3').click(function(){
        num++
        var textarea_text = $('.bimly_radio_3.active').parent().find('.radio_text').text();

        var issue_box = `
            <div class="separate_border">
                <label>Dodaj opis uwagi</label>
                <textarea class="bimly_text_1 bimly_text_input_${num} error" placeholder="Opisz uwagę tak aby.....">${textarea_text}</textarea>

                <div>
                    <div class="image_preview_container"></div>
                    <label class="file_upload">
                        <input type="file" name="images[]" class="image_input" accept="image/*" multiple="">
                        <b>
                            <span>
                                <svg widht="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="13" r="3" stroke="#1C274C" stroke-width="1.5"></circle> <path d="M3.0001 12.9999C3.0001 10.191 2.99995 8.78673 3.67407 7.77783C3.96591 7.34107 4.34091 6.96607 4.77767 6.67423C5.78656 6.00011 7.19103 6.00011 9.99995 6.00011H14C16.8089 6.00011 18.2133 6.00011 19.2222 6.67423C19.659 6.96607 20.034 7.34107 20.3258 7.77783C21 8.78673 21.0001 10.191 21.0001 12.9999C21.0001 15.8088 21.0001 17.2133 20.326 18.2222C20.0341 18.6589 19.6591 19.0339 19.2224 19.3258C18.2135 19.9999 16.809 19.9999 14.0001 19.9999H10.0001C7.19117 19.9999 5.78671 19.9999 4.77782 19.3258C4.34106 19.0339 3.96605 18.6589 3.67422 18.2222C3.44239 17.8752 3.29028 17.4815 3.19049 16.9999" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>   <path d="M18 10H17.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>   <path d="M14.5 3.5H9.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>   </g></svg> 
                                
                                (max. 5 zdjęć)
                            </span>
                        </b>
                    </label>
                </div>
            </div>
        `;


        var summary_append = `
            <div class="separate_border">
                <div class="bimly_text_second bimly_text_showed_${num}">${textarea_text}</div>

                <div>
                    <div class="image_preview_container image_preview_gap"></div>
                </div>
            </div>
        `;

        var radioGroup = $('input[name="radio_3"]:checked');

        if(radioGroup.length === 0) {

        } else {
            if( $('.step_3_radio .error').length == $('.step_3_radio .disabled').length ) {
            
            } else {
                $('.step_4_form').append(issue_box);
                $('.summary_append').append(summary_append);
            }
        }
        

        $('.bimly_radio_3.active').parent().addClass('disabled');
        $('.bimly_radio_3.active').parent().find('input').removeAttr('checked');
        $('.bimly_radio_3').removeClass('active');
        $(".image_input").on("change", previewImages);

        $(`.bimly_text_input_${num}`).on('input', function() {
            var text_val = $(this).val();
            $(`.bimly_text_showed_${num}`).text(text_val);
        })

        $('.bimly_next_btn_4').click(function(e) {
            var textarea = $(`.bimly_text_input_${num}`).val();
            if (textarea.length === 0) {
                e.preventDefault();
                $('.error').addClass('show');
            } else {
                $('.error').removeClass('show');
                $('#step_4').removeClass('step_active');
                $('#step_5').addClass('step_active');
                
                $('#step_4').addClass('progress_active');
                
                progress_step();
            }
        });
    });
    

});