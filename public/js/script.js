$(function() {
	$(document).foundation();

	$('.carousel').slick({
		autoplay: true,
		dots: true,
		arrows: false
	});

	$('#careerAccordion').find('h4').click(function() {
	    $(this).toggleClass('active');
	    $(this).next().slideToggle('fast');
	    $('#careerAccordion h4').not($(this)).removeClass('active');
	    $('#careerAccordion div').not($(this).next()).slideUp('fast');

    });

	var accordion = $('#stepUl').accordion();

	// $.validator.addMethod('filesize', function(value, element, param) {
	//     // param = size (en bytes) 
	//     // element = element to validate (<input>)
	//     // value = value of the element (file name)
	//     return this.optional(element) || (element.files[0].size <= param) 
	// });

	var v = $("#applyForm").validate({
		messages: {
	        firstname: {
	            required: "Please enter your first name"
	        },
	        surname: {
	            required: "Please enter your surname"
	        },
	        tel: {
	            required: "Please enter your telephone number"
	        },
	        email: {
	            required: "Please enter your email address",
	            email: "Please enter a valid email address"
	        },
	        qualification: {
	            required: "Please select a qualification"
	        },
	        fileMatric: {
	        	required: "Please upload your Matric certificate",
	        	extension: "Please choose a file with a correct extension",
	        	filesize: "Please select a smaller file"
	        },
	        fileN2: {
	        	required: "Please upload your N2 certificate",
	        	extension: "Please choose a file with a correct extension"
	        },
	        fileID: {
	        	required: "Please upload a copy of your ID",
	        	extension: "Please choose a file with a correct extension"
	        },
	        fileCV: {
	        	required: "Please upload your CV",
	        	extension: "Please choose a file with a correct extension"
	        }       
	    },
	    rules: {
	    	fileMatric: {	               
            	extension: "doc|docx|pdf"
            	//filesize: 20971520
	        },
	        fileN2: {	               
            	extension: "doc|docx|pdf"
	        },
	        fileID: {	               
            	extension: "doc|docx|pdf"
	        },
	        fileCV: {	               
            	extension: "doc|docx|pdf"
	        }	        
	    },
	    autoHeight: "content",
		errorClass: "warning",
		onkeyup: false, //function(element) { $(element).valid(); },
		onfocusout: false, //function(element) { $(element).valid(); },
		invalidHandler: function(form, validator) {
	        var errors = validator.numberOfInvalids();
	        if (errors) {                    
	            validator.errorList[0].element.focus();
	        }
	    },
	    errorPlacement: function(error, element) {
			if(element.attr("name") == "qualification") {
		    	error.insertAfter("#qualification_n2_label");
		  	}
		  	else {
		    	error.insertAfter(element);
		 	}
		},
		submitHandler: function(e) {
			form.submit();
		}
	});

	// back buttons do not need to run validation
	$("#af2 .prevbutton").click(function() {
		accordion.accordion("option", "active", 0);
		current = 0;
		$("html, body").animate({
	        scrollTop: 0
	    }, 500);
	});
	$("#af3 .prevbutton").click(function() {
		accordion.accordion("option", "active", 1);
		current = 1;
		$("html, body").animate({
	        scrollTop: 0
	    }, 500);
	});
	// these buttons all run the validation, overridden by specific targets above
	$(".open2").click(function() {
		if (v.form()) {
			accordion.accordion("option", "active", 2);
			current = 2;
			$("html, body").animate({
		        scrollTop: 0
		    }, 500);
		}
	});
	$(".open1").click(function() {
		if (v.form()) {
			accordion.accordion("option", "active", 1);
			current = 1;
			$("html, body").animate({
		        scrollTop: 0
		    }, 500);
		}
	});
	$(".open0").click(function() {
		if (v.form()) {
			accordion.accordion("option", "active", 0);
			current = 0;
			$("html, body").animate({
		        scrollTop: 0
		    }, 500);
		}
	});
	$('input[name=qualification]').click(function() {
		$(this).val() === 'matric' ? ($('.file-matric-container').show(), $('.file-N2-container').hide())
								   : ($('.file-N2-container').show(), $('.file-matric-container').hide());
	});


	// $('#applyForm input[type=file]').change(function(e) {
	//     $input = $(this);
	//     $input.next().html($input.val());
	//    	$input.next('span').text($input.val());
	//    	console.log($input.next('div'));
	//    	//console.log($input.val());
	// });


	// The slider being synced must be initialized first
	$('#carousel').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		itemWidth: 210,
		itemMargin: 5,
		asNavFor: '#slider'
	});

	$('#slider').flexslider({
		animation: "slide",
		controlNav: true,
		animationLoop: false,
		slideshow: false,
		sync: "#carousel"
	});


	//enquiry (quick contact) form
	$('#form-enquiry').submit(function(e) {
		e.preventDefault();
		$('.enquiry-message').removeClass('alert-box warning');
		$('.enquiry-spinner').show();
		$("#form-enquiry :input").prop("disabled", true);
		$(this).css('opacity', 0.8);
		var token = $('#form-enquiry :input[name=_token]').val();
		var firstname_value = $('#form-enquiry #firstname').val();
		var surname_value = $('#form-enquiry #surname').val();
		var tel_value = $("#form-enquiry #tel").val();
		var email_value = $("#form-enquiry #email").val();
		var questions_value = $("#form-enquiry #questions").val();
        var captcha_value = $("#form-enquiry #captcha").val();
		if($('#form-enquiry #terms').is(':checked')) {
			var terms_value = 'on';	
		}
		$.ajax({
            type: 'POST',           
            dataType: 'json',
            url: $('#form-enquiry').attr('action'),
            data: {
            	_token: token,
            	firstname: firstname_value,
            	surname: surname_value,
            	tel: tel_value,
            	email: email_value,
            	questions: questions_value,
                captcha: captcha_value,
            	terms: terms_value
            },
            error: function(data){
                console.log(data);                
            },
            success: function(data) {
               console.log(data);
                if(data.status === 'captcha_failure') {
                    $('.captcha-error').html(data.message).addClass('alert-box warning');
                    reloadCaptcha();
                    $('#form-enquiry').css('opacity', 1);
                }
                else {     	         		
            		$('.enquiry-message').html(data.message).addClass('alert-box');
            		console.log(data.message);
                	if(data.status === 'failure') {            		
                		$('#form-enquiry').css('opacity', 1);
                		$('.enquiry-message').html(data.message).addClass('warning');
                	}
                	else {
                		$('#form-enquiry').css('opacity', 0);
                	}
                	$('html, body').animate({
    				    scrollTop: $('.enquiry-message').offset().top - 40
    				}, 200);
                }
            	$('.enquiry-spinner').hide();
            	$('#form-enquiry :input').prop('disabled', false);            	
            }
        });        
	});

});


// 	var current = 0;
// 	var countScroll = 0;
// 	var elementClass = "";

// 	$.validator.addMethod("input-required", function(value, element) {
// 		var $element = $(element);
// 		//console.log($element.offset().top);
// 		//console.log($element.attr('class'));
// alert('ggg');
// 		console.log($element);

// 		elementClass = $element.attr('class');

// 		if(elementClass.indexOf("warning") > -1) {
// 			//console.log("yry");
// 		}

// 		//console.log(value);

// 		//countScroll 

// 		// $("html, body").animate({
// 		//     scrollTop: $element.offset().top - 40
// 		// }, 200);

// 		function match(index) {
// 			return current == index && $(element).parents("#af" + (index + 1)).length;
// 		}

// 		//console.log(this.optional(element));

// 		if (match(0) || match(1) || match(2)) {
// 			return !this.optional(element);
// 		}
// 		return "dependency-mismatch";

// 		//$position = $("stepUl").offset();

// 		// $("html, body").animate({
// 		//     scrollTop: $("stepUl").offset()
// 		// }, 3000);

// 	}, $.validator.messages.required);

	//alert( $('#applyForm input[name=qualification]:checked').val() == 'matric');