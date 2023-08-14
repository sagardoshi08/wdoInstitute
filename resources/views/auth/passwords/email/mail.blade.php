<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reset Password</title>
    <style type="text/css">
    #outlook a {
        padding: 0;
    }

    body {
        background-color: #FFF;
        -webkit-text-size-adjust: none;
        border: none !important;
    }

    a {
        color: #00768b
    }

    #header .wrap {
        width: 100% !important;
    }

    @media screen and (max-width: 480px) {
        table {
            width: 100% !important;
            -webkit-text-size-adjust: none !important;
        }

        img[class=img-responsive] {
            width: 100% !important;
            height: auto !important;
        }

        td[class=mobile-spacer] {
            width: 18px !important;
        }
        td[class=center-div] {
            text-align: center !important;
        }
        td[class=keepleft] {
            float: left !important;
            text-align: left !important;
            clear: both !important;
            width: 100% !important;
        }

        br[class=empty] {
            display: none !important;
        }

        td[class=empty] {
            display: none !important;
            width: 0;
        }
    }
    </style>
</head>

<body link="#00768b" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" vlink="#00768b">
    <div align="center">
        <table width="560" border="0" cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif; font-size:11px;  color:#000000; border: 1px solid #C1C1C1;">
            <tr>
                <td width="558" valign="top" align="left">
                    <table width="558" border="0" cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif; font-size:11px;color:#000000;">
                        <tr>
                            <td width="24" valign="top" align="left">
                                <img border="0" height="1" hspace="0" src="{{ asset('backend/images/reset-password/spacer.gif')}}" style="display:block;" vspace="0" width="24">
                            </td>
                            <td width="510" valign="top" align="left">
                                <table width="510" border="0" cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#000000;">
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="510" valign="top" align="center">
                                            <img border="0" height="47" hspace="0" src="{{ asset('backend/images/reset-password/hmmngbrd-logo-latest.jpg')}}" style="display:block;" vspace="0" width="184">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                   
                                    <tr>
                                        <td width="510" valign="top" align="left" style="border-bottom: 1px solid #C1C1C1;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td width="510" valign="top" align="center" style="color: #3F3E50; font-size: 20px;">
                                        <strong>Trouble signing In? </strong>
                                      </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td width="510" valign="top" align="center" style="color: #313743; font-size: 16px; line-height: 24px;">
                                        Resetting your password is easy. Just press the button below and follow the instructions. We'll have you back sharing memories in no time.
                                      </td>
                                    </tr>
                                     <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                     <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="510" valign="top" align="left">
                                           <table width="510" border="0" cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#000000;">
                                            <tr>
                                              <td width="121" valign="top" align="left" class="empty">
                                                <img border="0" height="1" hspace="0" src="{{ asset('backend/images/reset-password/spacer.gif')}}" style="display:block;" vspace="0" width="121">
                                              </td>
                                              <td width="30" valign="top" align="left">
                                                <img border="0" height="1" hspace="0" src="{{ asset('backend/images/reset-password/spacer.gif')}}" style="display:block;" vspace="0" width="30">
                                              </td>
                                              <td width="208" valign="top" align="left">
                                                <a href="{{ route('resetPassword', [$token,$email]) }}"><img border="0" height="55" hspace="0" src="{{ asset('backend/images/reset-password/reset-my-password.jpg')}}" style="display:block;" vspace="0" width="208" class="img-responsive"></a>
                                              </td>
                                               <td width="30" valign="top" align="left" >
                                                <img border="0" height="1" hspace="0" src="{{ asset('backend/images/reset-password/spacer.gif')}}" style="display:block;" vspace="0" width="30">
                                              </td>
                                              <td width="121" valign="top" align="left" class="empty">
                                                <img border="0" height="1" hspace="0" src="{{ asset('backend/images/reset-password/spacer.gif')}}" style="display:block;" vspace="0" width="121">
                                              </td>
                                            </tr>
                                           </table>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;<br/></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>

                                </table>
                            </td>
                            <td width="24" valign="top" align="left">
                                <img border="0" height="1" hspace="0" src="{{ asset('backend/images/reset-password/spacer.gif')}}" style="display:block;" vspace="0" width="24">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>