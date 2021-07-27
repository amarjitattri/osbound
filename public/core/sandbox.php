	<div id = "login">
		<!-- Display login notification to user -->
		<div id = "loginInstruction">
		Osbond and Tutt - Login
		</div>

        <!-- Display the Login Form -->
		<form id="loginForm" name="loginForm" method="post" action="index.php?u=2">
				<table>
					<!-- Caption -->
					<caption style = "font-size: 18px; text-align: left; margin-bottom: 10px;">Please Login</caption>					
					
					<!-- Username -->
					<tbody>
					<tr style="line-height: 35px;">
						<td style="width: 20%;"> Username </td> 
						<td style="width: 40%;"> <input type="text" id="txtUsername" name="txtUsername" placeholder="Username" class="controlStyle" required> </td>
						<!--<td style="width: 40%;" id="UsernameRow"> </td>-->
					</tr>
	
					<!-- Password -->
					<tr style="line-height: 35px;">
						<td style="width: 20%;"> Password </td> 
						<td style="width: 40%;"> <input type="password" id="txtPassword" name="txtPassword" placeholder="Password" class="controlStyle"> </td>
						<!--<td style="width: 40%;" id="PasswordRow"> </td>-->
					</tr>
	
					<!-- Login Submit Button -->				
					<tr style="line-height: 35px;">
						<td colspan="2" align="right"> 
							 <input type="submit" name="Login" value="Login" style = "margin-right: 36px; width: 100px; height: 27px;">
						</td>					
					</tr>

					<!-- Remind Password Submit Button -->				
					<tr style="line-height: 35px;">
						<td colspan="2" align="right"> 
							 <input type="submit" name="RemindPassword" value="Remind Password" style = "margin-right: 36px; width: 150px; height: 27px;">
						</td>					
					</tr>
					</tbody>
				</table>
		</form>	
	</div>