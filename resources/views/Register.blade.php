<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<style type="text/css">
		input[type=text], input[type=password] {
		    width: 100%;
		    padding: 12px 20px;
		    margin: 8px 0;
		    display: inline-block;
		    border: 1px solid #ccc;
		    box-sizing: border-box;
		}

		/* Set a style for all buttons */
		button {
		    background-color: #4CAF50;
		    color: white;
		    padding: 14px 20px;
		    margin: 8px 0;
		    border: none;
		    cursor: pointer;
		    width: 100%;
		}

		/* Extra styles for the cancel button */
		.cancelbtn {
		    padding: 14px 20px;
		    background-color: #f44336;
		}

		/* Float cancel and signup buttons and add an equal width */
		.cancelbtn,.signupbtn {
		    float: left;
		    width: 50%;
		}

		/* Add padding to container elements */
		.container {
		    padding: 16px;
		}

		/* Clear floats */
		.clearfix::after {
		    content: "";
		    clear: both;
		    display: table;
		}

		/* Change styles for cancel button and signup button on extra small screens */
		/*@media screen and (max-width: 300px) {
		    .cancelbtn, .signupbtn {
		        width: 100%;
		    }
		}*/
	</style>
</head>
<body>
    <form method="post" action="{{ url('/postRegister') }}" >
		  @if ($errors->any())
    		<div class="alert alert-danger">
        		<ul>
            	@foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            	@endforeach
        		</ul>
    		</div>
		  @endif

		  @if (session('response'))
		  	<div class="alert alert-success">
		  	    {{session('response')}}	
		  	</div> 
		  @endif	
		  <div class="container">
		  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		    <label><b>Email</b></label>
		    <input type="text" placeholder="Enter Email" name="email" >

		    <label><b>Name</b></label>
		    <input type="text" placeholder="Enter Name" name="name" >
		    
		    <label><b>Password</b></label>
		    <input type="password" placeholder="Enter Password" name="psw" >	

		    <div class="clearfix">
		    <button type="button"  class="cancelbtn">Cancel</button>
		    <button type="submit" class="signupbtn">Sign Up</button>
		    </div>
		  </div>
</form>
</body>
</html>