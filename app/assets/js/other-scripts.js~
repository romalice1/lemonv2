/////////////////////////////////////
//------- OTHER SCRIPTS-------------
////////////////////////////////////

//////////////////////
//The public function
/////////////////////
function _(el){
	return document.getElementById(el);
}


///////////////////////////////
// Password fields validation
//////////////////////////////
function validateNewUserForm(){
	// initial password
	var pswd1 = _("inputPassword1").value;
	// confirmation password
	var pswd2 = _("inputPassword2").value;
	
	if(pswd1 != pswd2){
		_("pswd_msg").innerHTML = "<i class='text-danger'><span class='glyphicon glyphicon-remove'></span> Passwords don't match!</i>";
	}else{
		_("pswd_msg").innerHTML = "<i class='text-success'><span class='glyphicon glyphicon-ok'></span> Perfect match!</i>";
	}
	
}


//////////////////////////////////////////
// Toggle new document external fields
//////////////////////////////////////////
$(document).ready(function(){
	$('#inputFname').hide();
	$('#inputLname').hide();
	$('#inputPhone').hide();
	
	$('#toggleInputFields').css('cursor','pointer').click(function(){
		$('#inputFname').toggle('slow');
		$('#inputLname').toggle('slow');
		$('#inputPhone').toggle('slow');
		
	});
});


////////////////////////////////
// Document details controller
////////////////////////////////
function documentDetails( doc_id, show ){
	// 'show' is an optional parameter
	if(!show){
		$('#DocumentDetailsModalBody').load("view/doc_view.php?document_id=" + doc_id +"&show=default");
	}else{
		$('#DocumentDetailsModalBody').load("view/doc_view.php?document_id=" + doc_id +"&show=" + show );
	}
}

////////////////////////////////
// Document status update
////////////////////////////////
function updateStatus( doc_id ){
	var new_status = _('new_status_input').value;
	var observation = _('observation_input').value;
	var close_doc = _('close_doc_select').value;
	var user_id = _('user_id_input').value;
	
	$('#DocumentDetailsModalBody').load("view/doc_view.php?document_id=" + doc_id + "&doc_update=true&new_status="+ new_status +"&observation="+ observation+"&close_doc="+close_doc+"&user_id="+user_id);
	return false;
}

