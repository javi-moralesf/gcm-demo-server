function send(type){
	var devices = [];
	var gift = false;
	var hidden = $('#hide_notification').is(":checked");
	var sound = $('#enable_sound').is(":checked");
	var icon = $('#enable_icon').is(":checked");

	if(type == "gift"){
		gift = true;
		type = "broadcast";
	}else if(type == "direct"){
		$.each($('input[name="direct_to"]:checked'), function( index, value ) {
			devices.push($(value).val());
		});
	}
	var data = {
		"send_type": type,
		"devices" : devices,
		hidden : hidden,
		sound: sound,
		icon: icon,
		gift: gift
	};

	$.ajax({
		type: "POST",
		url: "send.php",
		data: data,
		success: function(data){

		}
	});
}