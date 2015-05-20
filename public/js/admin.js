$(function() {
	// $('#homeCopyForm').on('submit', function(e) {
	// 	//e.preventDefault();
	// 	$('#hiddenContent').html($('#content').html());
	// 	console.log($(this));
	// 	//$(this).submit();
	// 	return true;
	// 	//$(e.currentTarget).trigger('submit');
	// });
	

 	$('#enquiries').dataTable( {
		"processing": true,
		"serverSide": true,
		"ajax": "http://localhost:8000/admin/ajaxEnquiries",
		//"aaSorting": [[ 3, "desc" ]],
		"columns": [
	            { 'sWidth': '60px' },
	            { 'sWidth': '130px', 'sClass': 'center' },
	            { 'sWidth': '180px', 'sClass': 'center' },
	            { 'sWidth': '60px', 'sClass': 'center' },
	            { 'sWidth': '90px', 'sClass': 'center' },
	            { 'sWidth': '80px', 'sClass': 'center' }
	        ]
	      //  "sPaginationType": "bootstrap"   
	})
            
});