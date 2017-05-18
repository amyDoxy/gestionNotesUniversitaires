			function verificationIdent(){
				var xhttp = new XMLHttpRequest();
				var username = $('#username').val();
				var motDePasse = $('#motDePasse').val();
				
				
				
				
				var lien = "../verification.php";
				var params = "username="+username+"&motDePasse="+motDePasse;
				xhttp.open("POST", lien, true);
				//Send the proper header information along with the request
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

				xhttp.onreadystatechange = function() {//Call a function when the state changes.
				    if(this.readyState == 4 && this.status == 200) {
				        //document.getElementById("error").innerHTML = this.responseText;
				        getResponse(this);
				    }
				}
				
				xhttp.send(params);


			}

			function getResponse(txt){
				var text = txt.responseText;
				var errorMsg = document.getElementById("error");
				//alert (text);
				if(text == 'success'){
					 window.location = "index.php";
				}
				errorMsg.innerHTML = (text == 'erreur')?"Nom d'utilisateur ou Mot de passe invalide.Réessayer":"";
				

			}