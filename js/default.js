  
	   document.onkeydown = checkKeycode

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

		

	 

