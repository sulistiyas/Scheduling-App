<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="margin:0px; background: #f8f8f8; ">
    <div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
        <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
                <tbody>
                    <tr>
                        <td style="vertical-align: top; padding-bottom:30px; background-color: white" align="center">
                            <img src="{{ asset('assets/dist/img/Inlingua_Logo-removebg-preview.png') }}" width="300" alt="Inlingua" style="border:none">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div style="padding: 40px; background: #fff;">
                <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                    <tbody>
                        <tr>
                            <td>
                                <b>Dear {{ $data['name'] }},</b>
                                <p>Welcome to the Scheduling-App.</p>
                                <p>We are pleased to inform you of your login details as described below. Please kindly click on the below link and enter in your Username and Password. </p>
                                <ul>
                                    <li><b>URL :</b> <a href="#">Scheduling-App</a></li>
                                    <li><b>Username : {{ $data['email'] }} </b> </li>
                                    <li><b>Password : {{ $data['password'] }} </b> </li>
                                </ul>
                                <p>Should you have any queries, please kindly contact IT Support, Sulistiya Nugroho at 0821-1087-3602.</p>
                                <p>Thank you for your attention.</p>
                                <br><br>
                                <p>Kind regards,</p>
                                <p>Scheduling - APP</p>
                                <br>
                                <p>inlingua International Indonesia</p>
                                <p >Jl. Puri Indah Raya Kav A3 No. 2, Kembangan, Jakarta Barat 11610</p>
                                <p >T +62 21 583 55 088 </p>
                                <p><a href="https://inlingua.co.id/">www.inlingua.co.id</a></p>
                                <img src="{{ asset('assets/dist/img/inl_wscc.png') }}" width="300" alt="inl wscc" style="border:none">
                                <p style="color: #3366ff; font-weight: 600"><i>“We keep growing and never stop learning”</i></p>
                            </td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>