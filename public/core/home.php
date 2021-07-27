<div id = "mainBodyLoginPage">
</div>
<!-- This div is technically meant to be inside div id = "mainBodyLoginPage" -->
<!-- However the transparency applied on mainBodyLoginPage would mean that id="login" would be rendered transparent as well -->
<!-- CSS Tricks has it that this div be applied outside the above div and positioning be used to visually push the div on top of the above div -->
<div id = "loginBox">

    <!-- Display login notification to user -->
    <div id = "loginInstruction"><center>Osbond and Tutt - Login</center></div>
    
    <!-- Display the Login Form -->
    <form id="loginForm" name="loginForm" method="post" action="index.php?u=2">
        <table>
            <colgroup>
                <col style="width: 20%;">
                <col style="width: 40%;">
            </colgroup>
        
            <!-- Caption -->
            <caption>Please Login</caption>
            
            <!-- Username -->
            <tbody>
                <tr>
                    <td> Username </td> 
                    <td> <input type="text" id="txtUsername" name="txtUsername" placeholder="Username" required> </td>
                </tr>
                
                <!-- Password -->
                <tr>
                    <td> Password </td> 
                    <td> <input type="password" id="txtPassword" name="txtPassword" placeholder="Password" > </td>
                </tr>
                
                <!-- Login Submit Button -->				
                <tr>
                    <td colspan="2" align="right"> 
                         <input type="submit" class="buttonStyle" name="Login" value="LOGIN" >
                    </td>					
                </tr>
                
                <!-- Remind Password Submit Button -->				
                <tr>
                    <td colspan="2" align="right"> 
                         <input type="submit"class="buttonStyle" name="RemindPassword" value="REMIND PASSWORD" >
                    </td>					
                </tr>
            </tbody>
        </table>
    </form>	
    </div>

</div>