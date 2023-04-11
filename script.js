			$(document).ready(function() {
			if($('#contact-form').length>0){
				$('#contact-form')[0].reset(); 
			}
			});
			function isNumberKey(evt) {
				var charCode = (evt.which) ? evt.which : evt.keyCode
				if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;
				return true;
			}
			
			document.addEventListener('keydown', function(event) { 
			  if(event.keyCode != 46 && event.keyCode != 8){
				var i = document.getElementById("numero_beneficio").value.length; 
				if (i === 3 || i === 7) 
				  document.getElementById("numero_beneficio").value = document.getElementById("numero_beneficio").value + ".";
				else if (i === 11)
				  document.getElementById("numero_beneficio").value = document.getElementById("numero_beneficio").value + "-";
			  }
			});