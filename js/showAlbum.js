function showArtDetails(artID){
	var xmlhttp;
	if(artID ==""){
		document.getElementById("artDetails").innerHTML = "";
		return;
	}else{
		if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("artDetails").innerHTML = this.responseText;
		}
	}

	xmlhttp.open("GET","artDetails.php?artID="+artID,true);
	xmlhttp.send();
	}
}