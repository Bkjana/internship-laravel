<!DOCTYPE html>
<html>
<head>
	<title>Personal Details</title>
	<style>
		/* Style for the form container */
		.container {
			width: 50%;
			margin: auto;
			border: 1px solid #ccc;
			padding: 20px;
			box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
		}
		
		/* Style for the form fields */
		label {
			display: block;
			font-weight: bold;
			margin-bottom: 10px;
		}
		input[type="text"],
		input[type="date"],
        input[type="number"] {
			padding: 5px;
			border-radius: 5px;
			border: 1px solid #ccc;
			margin-bottom: 15px;
			width: 100%;
			box-sizing: border-box;
		}
		
		/* Style for the form submit button */
		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			padding: 10px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
    <h3 style="text-align: center; margin-bottom: 5pt">Enter Personal Details</h3>
	<div class="container" style="background: black; color:white">
		<form action="/stupersonal" method="post">
            @csrf
            <input type="hidden" value="{{$studentid}}" name="studentid">
			<label for="fathername">Father's Name:</label>
			<input type="text" id="fathername" name="fathername" placeholder="Jhon Doe" required>
			
			<label for="mothername">Mother's Name:</label>
			<input type="text" id="mothername" name="mothername" placeholder="Jhon Doe" required>
			
			<label for="dob">Date of Birth:</label>
			<input type="date" id="dob" name="dob" required>
			
            <label for="mobile">Mobile</label>
            <input type="number" name="mobile" placeholder="1234567890">

			<input type="submit" value="Submit">
		</form>
	</div>
</body>
</html>
