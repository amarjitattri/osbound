<html>
<head>
  <title>Login Credentials</title>
</head>
<body style="margin: 10px 0; padding: 20px;background: #eef1f3;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; max-width: 600px;box-shadow: 0px 0px 10px #b4b4b4;border-radius: 10px;position: relative;overflow: hidden;" class="content">
        <tr>
            <td align="center" bgcolor="#eef1f3 " style="padding: 20px 20px 20px 20px; color: #fff; font-family: Arial, sans-serif; font-size: 36px; font-weight: bold;">
                <a href="<?= url(''); ?>" target="_blank"><img src="<?= asset('images/logo.png'); ?>" alt="Wackylicious" width="150" style="display:block;" /></a>
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#fff" style="padding: 10px 20px 10px; color: #000; font-family: Arial, sans-serif; font-size: 20px; line-height: 1.4;">
                Your Email and password.
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#fff" style="padding: 10px 20px 10px; color: #000; font-family: Arial, sans-serif; font-size: 20px; line-height: 1.4;">
                <b>Email: </b> {{ $user->email }} <br>
                <b>Password: </b> {{ $user->show_pass }}
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#fff" style="padding: 10px 20px 30px 20px; font-family: Arial, sans-serif;">
                <table bgcolor="#0073AA" border="0" cellspacing="0" cellpadding="0" class="buttonwrapper">
                    <tr>
                        <td align="center" class="button">
                            <a href="{{ route('login') }}" style="color: #ffffff; text-align: center; text-decoration: none;display: inline-block;padding: 15px 20px; font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;">Go to Login</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#eef1f3" style="padding: 15px 10px 15px 10px; color: #555555; font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;border-bottom: 1px solid #ddd;">
                <b><a href="{{ config('app.url') }}">{{ config('app.url') }}</a></b><br/>Shed No. D/2, Behind Tasheel, Industrial Area 13, Sharjah, P.O. Box No. - 95080, UAE
            </td>
        </tr>
        <tr>
            <td style="padding: 15px 10px 15px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td align="center" width="100%" style="color: #000; font-family: Arial, sans-serif; font-size: 12px;">
                            2019 &copy; <a href="{{ config('app.url') }}" style="color: #0073AA;">{{ config('app.name') }}</a> | All Rights Reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
