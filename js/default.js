  


		function isEmpty(Obj)
		{
			var Val = Obj.value;
	
			if(Val.length==0) return true;
	
			for(var i=0; i< Val.length; i++)
			{
					if( " \t\n".indexOf( Val.charAt(i)) == -1 ) 
					return false;
			}
			return true;
		}
		
		
		function loginAction()
		{
			if(isEmpty(document.getElementById("username")))
			{
				alert("You did not provide your Username");
				return;
			}
			if(isEmpty(document.getElementById("password")))
			{
				alert("You did not provide your Password");
				return;
			}
			document.rowzloginform.submit();
		}

function signupaction()
		{
			if(isEmpty(document.getElementById("susername")))
			{
				alert("You did not provide your Username");
				return;
			}
			if(isEmpty(document.getElementById("spassword")))
			{
				alert("You did not provide your Password");
				return;
			}
			if(isEmpty(document.getElementById("sfullname")))
			{
				alert("You did not provide your Full Name");
				return;
			}

			document.signupform.submit();
		}

function makeRequest(url) {
        var httpRequest;

        if (window.XMLHttpRequest) { // Mozilla, Safari, ...
            httpRequest = new XMLHttpRequest();
            if (httpRequest.overrideMimeType) {
                httpRequest.overrideMimeType('text/xml');
                // See note below about this line
            }
        } 
        else if (window.ActiveXObject) { // IE
            try {
                httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } 
            catch (e) {
                try {
                    httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } 
                catch (e) {}
            }
        }

        if (!httpRequest) {
            alert('Giving up :( Cannot create an XMLHTTP instance');
            return false;
        }
       //httpRequest.onreadystatechange = ;
	var d = new Date();
        httpRequest.open('GET', url+"&time="+d.getTime(), true);
        httpRequest.send('');

    }

  var http_request = false;
    function alertContents() {

        if (http_request.readyState == 4) {
            if (http_request.status == 200) {
		document.getElementById("overdiv").innerHTML = http_request.responseText;
		call_hide_html();
            } else {
                alert('There was a problem with the request.');
            }
        }

    }




function makePOSTRequest(url, parameters) {
      http_request = false;
      if (window.XMLHttpRequest) { // Mozilla, Safari,...
         http_request = new XMLHttpRequest();
         if (http_request.overrideMimeType) {
         	// set type accordingly to anticipated content type
            //http_request.overrideMimeType('text/xml');
            http_request.overrideMimeType('text/html');
         }
      } else if (window.ActiveXObject) { // IE
         try {
            http_request = new ActiveXObject("Msxml2.XMLHTTP");
         } catch (e) {
            try {
               http_request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {}
         }
      }
      if (!http_request) {
         alert('Cannot create XMLHTTP instance');
         return false;
      }
      
    http_request.onreadystatechange = alertContents;
      http_request.open('POST', url, true);
      http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      http_request.setRequestHeader("Content-length", parameters.length);
      http_request.setRequestHeader("Connection", "close");
      http_request.send(parameters);
   }


     

	 

