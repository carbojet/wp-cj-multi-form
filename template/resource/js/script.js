(function($) {
    
    var customFormDropDownVal = [];
    customFormDropDownVal.push([
            "Select from List",
        ]);
    for(var k in localjsvar.dropfields.cj_grade_and_finish){
        var value = localjsvar.dropfields.cj_grade_and_finish[k].split(',')
        customFormDropDownVal.push(value)
    }

var rowValid = true
$("document").ready(function(){
    $("body").on("change",".cj-form-row select",function(){
        if($(this).val()!=""){
            $(this).find(":selected").attr("selected","selected")
            $(this).find(":not(:selected)").removeAttr("selected")
            var rowValid = true
        }
    })
    /*
    $("body").on("change",".cj-form-row input,.cj-form-row select",function(){
        if($(this).val()!=""){
            if($(this).closest("li.active").length>0){
                var rowValid = true
                //$(this).closest(".cj-form-row").find("button[name=cj_add_more]").removeAttr("disabled")
                $("button[name=cj_add_more]").removeAttr("disabled")
            }
        }
    })
    */
    $("body").on("change","select[name=cj_material]",function(){
        var selectsubPos = $(this).find("option:selected").index()
        if($(this).val()!=""){
            $(this).closest(".cj-form-row").find(".cj_grade_finish").addClass("active")						
        }else{
            $(this).closest(".cj-form-row").find(".cj_grade_finish").removeClass("active")
        }
        var selectsubOptions = customFormDropDownVal[selectsubPos]
        var html = '<option value="">Select from List</option>';
        for(var i=0;selectsubOptions.length>i;i++){
            html +='<option value="'+selectsubOptions[i]+'">'+selectsubOptions[i]+'</option>';
        }
        $(this).closest(".cj-form-row").find("select[name=cj_grade_finish]").html(html)
        $(this).closest(".cj-form-row").find(".cj_shapes").removeClass("active")
        $(this).closest(".cj-form-row").find(".shapes-options li.active").removeClass("active")
        $(this).closest(".cj-form-row").find(".cj_quantity").removeClass("active")
        //$(this).closest(".cj-form-row").find("button[name=cj_add_more]").removeClass("active")
        //$("button[name=cj_add_more]").removeClass("active")
        $("button[name=cj_add_more]").attr("disabled",true)
        
    })
    $("body").on("change","select[name=cj_grade_finish]",function(){
        var cjgradefinish = $(this).val().toString().replace(/\s+/g,'')
        if(cjgradefinish!=""){
            $(this).closest(".cj-form-row").find(".cj_shapes").addClass("active")
            if(cjgradefinish=='Other'){
                $(this).closest(".cj_grade_finish").find("div.other").addClass("active")
            }else{
                $(this).closest(".cj_grade_finish").find("div.other").removeClass("active")
            }
        }else{
            $(this).closest(".cj-form-row").find(".cj_shapes").removeClass("active")
        }
    })
    $("body").on("change","select[name=cj_shapes]",function(){
        $(this).closest('.cj-form-row').find(".shapes-options").find("li").removeClass("active")
        var liPos = $(this).find("option:selected").index()-1
        $(this).closest('.cj-form-row').find(".shapes-options").find("li:eq("+liPos+")").addClass("active")
    })
    $("body").on("keyup",".shapes-options li.active .show-quantity",function(){
        if($(this).val()!=""){
            $(this).closest(".cj-form-row").find(".cj_quantity").addClass("active")
        }else{
            $(this).closest(".cj-form-row").find(".cj_quantity").removeClass("active")
        }					
    })
    $("body").on("keyup paste","input[name=cj_length]",function(){
        var length = $(this).val().replace(/[^0-9]/g, '')
        if(length>6000){
            $(this).val(6000)
        }else{
            $(this).val(length)
        }
        

    })
    
    $("body").on("keyup","input[name=cj_quantity]",function(){
        
        if($(this).val()>0){
            //$(this).closest(".cj-form-row").find("button[name=cj_add_more]").addClass("active")
            console.log($(this).closest(".cj-form-row").hasClass("added"));
            if($(this).closest(".cj-form-row").hasClass("added")==false){
                $("button[name=cj_add_more]").removeAttr("disabled")
            }

            $(this).closest(".cj-form-row").addClass('item')
            $(this).closest(".cj-form-row").find("li.active").find("select,input").each(function(){
                if($(this).val()==""){
                    rowValid=false
                }
            })
        }else{
            
            //$(this).closest(".cj-form-row").find("button[name=cj_add_more]").removeClass("active")
            $(this).closest(".cj-form-row").removeClass('item')
            
            //$("button[name=cj_add_more]").removeClass("active")
            $("button[name=cj_add_more]").attr("disabled",true)
        }


        if(!$("cj-form-delivery-detail active").hasClass("active") && $(".cj-form-row.item").length>0){
            $("button[name='cj_next_delivery_detail']").removeAttr("disabled")
        }else{
            $("button[name='cj_next_delivery_detail']").attr("disabled",true)
        }
        
        if(rowValid && $(this).val()>0){
            //$(this).closest(".cj-form-row").find("button[name=cj_add_more]").removeAttr("disabled")
            if($(this).closest(".cj-form-row").hasClass("added")==false){
                $("button[name=cj_add_more]").removeAttr("disabled")
            }
            //$(this).closest(".cj-form-row").removeClass('item')
        }
    })
    $("body").on("click","button[name=cj_next_delivery_detail]",function(){
        //$(this).removeClass("active")
        $(".cj-form-delivery-detail").addClass("active")
        $(".form-footer").addClass("active")
    })
    $("body").on("click","button[name=cj_add_more]",function(){
        var formRow = $(".cj-form-row:first").clone()
        
        formRow.addClass("added")
        $(".cj-form-row:last").after(formRow)
        
        //$(".form-footer").addClass("active")
        $(".cj-form-row:first").removeClass('item')
        $(".cj-form-row:first").find("select").val("")
        $(".cj-form-row:first").find("input").val("")
        $(".cj-form-row:first").find("textarea").val("")
        $(".cj-form-row:first").find(".cj_grade_finish").removeClass("active")
        $(".cj-form-row:first").find(".cj_shapes").removeClass("active")
        $(".cj-form-row:first").find(".shapes-options li").removeClass("active")
        $(".cj-form-row:first").find(".cj_quantity").removeClass("active")
        //$("button[name=cj_add_more]").removeClass("active")
        $("button[name=cj_add_more]").attr("disabled",true)
        
    })
    $("body").on("click","span.edit-form-row",function(){
        $(this).closest(".cj-form-row").removeClass("added").addClass("edited")
    })
    $("body").on("click","span.remove-form-row",function(){
        $(this).closest(".cj-form-row").remove()
        if($(".cj-form-row.item").length<=0){
            $("button[name=cj_next_delivery_detail]").attr("disabled",true)
            $("button[name=cj_add_more]").attr("disabled",true)
            $(".cj-form-delivery-detail").removeClass("active")
            $(".form-footer").removeClass("active")
        }
    })
    $("body").on("click","span.update-form-row",function(){
        $(this).closest(".cj-form-row").removeClass("edited").addClass("added")
    })

    // $("body").on("keypress",".elementor-field-group.required input",function(){
    //     if($(this).val()==""){
    //         $(this).closest(".elementor-field-group").addClass("required")
    //     }else{
    //          $(this).closest(".elementor-field-group").removeClass("required").removeClass("has-error")
    //     }
    // })

    $("body").on("keyup",".elementor-field-group.required input",function(){
        if($(this).val()==""){
            $(this).closest(".elementor-field-group").addClass("has-error")
        }else{
             $(this).closest(".elementor-field-group").removeClass("has-error")
        }
    })
    
    $("body").on("click","button[name=submit_cj_form]",function(){
        var formvalidation = false;
        $(".mail-message").removeClass("active")
        var cjForm = {}
        formRows = []
        $(".elementor-field-group.required input").each(function(){
            if($(this).val()==""){
                $(this).closest(".required").addClass("has-error") 
            }else{
                $(this).closest(".required").removeClass("has-error")
            }
        })
        $(".cj-form-row.item").each(function(){
            var formRow = {}
            formRow["Material"] = $(this).find("select[name=cj_material]").val()
            
            var gradeFinal = $(this).find("select[name=cj_grade_finish]").val().toString().replace(/\s+/g,'')
            if(gradeFinal=="Other")
            {
                gradeFinal = $(this).find("input[name=cj_grade_finish_other]").val()
            }
            formRow["Grade-Finish"] = gradeFinal
            formRow["Form"] = $(this).find("select[name=cj_shapes]").val()
            var formOptions = [];
            $(this).find(".shapes-options li.active").find("select,input").each(function(){
                var tempOption = {}
                tempOption[$(this).attr("data-label")] = $(this).val()
                formOptions.push(tempOption)
            })
            console.log(formOptions)
            formRow["Dimentions-and-Units"] = formOptions
            formRow["Quantity"] = $(this).find("input[name=cj_quantity]").val() 
            formRow["Comment"] = $(this).find("textarea[name=form_comments]").val()
            formRows.push(formRow)
        })

        if($("form .has-error").length<=0){
            formvalidation = true;
        }


        cjForm["rows"] = formRows;
        cjForm["Name"] = $("input[name=cj_username]").val();
        cjForm["Company"] = $("input[name=cj_company]").val();
        cjForm["Email"] = $("input[name=cj_email]").val();
        cjForm["Phone"] = $("input[name=cj_phone]").val();
        cjForm["date"] = $("input[name=cj_datetimepick]").val();
        //cjForm["Place-to-Ship"] = $("input[name=cj_deliverwhere]").val();
        cjForm["Address-1"] = $("input[name=cj_address1]").val();
        cjForm["Address-2"] = $("input[name=cj_address2]").val();
        cjForm["City"] = $("input[name=cj_city]").val();
        cjForm["State"] = $("input[name=cj_state]").val();
        cjForm["Postal-Code"] = $("input[name=cj_zipcode]").val();
        cjForm["Country"] = $("select[name=cj_country]").val();
        postData = {
            "action":"cj_mail_sendform",
            "cjForm": cjForm
        }
        if(formvalidation){
            $.ajax({
                url: localjsvar.ajaxUrl,
                type:"post",
                data:postData,
                beforeSend:function(){
                    $("span.loading").show();
                },
                success:function(responce){
                    //console.log(responce)
                    if(responce){
                        window.location.replace(localjsvar.dropfields.cj_form_redirect);
                        //$(".mail-message").addClass("active")
                    }
                    $("span.loading").hide();
                },
                error:function(error){
                    console.log(error);
                }
            })
        }


    })
})
})( jQuery );