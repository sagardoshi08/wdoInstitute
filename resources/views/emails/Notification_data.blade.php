<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>butterfly | Notification</title>

    <style type="text/css">
        #outlook a {
            padding: 0;
        }
        body {
            background-color: #FFF !important;
            -webkit-text-size-adjust: none;
            border: none !important;
        }
        a {
             color: #734aca !important;
        }
        #header .wrap {
            width: 100% !important;
        }
        @media (prefers-color-scheme: dark) {
          body {
            background: #ffffff;
          }
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
            td[class=cta-sapcer] {
                width: 18px !important;
            }
            span[class="mobile-spacer"] {
                display: block !important;
            }
        }
    </style>
</head>

<body link="#00768b" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" vlink="#00768b" style="background: #fff !important;">
    <div align="center" style="background: #fff !important;">
        <table width="560" border="0" cellpadding="0" bgcolor="#ffffff" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#000000; border: 1px solid #C1C1C1;">
            <tr>
                <td width="558" valign="top" align="left">
                    <table width="558" border="0" cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif; font-size:11px;color:#000000;">
                        <tr>
                            <td width="24" valign="top" align="left">
                                <img border="0" height="1" hspace="0" src="{{ env('APP_URL').'images/spacer.gif' }}" style="display:block;" vspace="0" width="24" alt="Notification">
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
                                            <img border="0" height="60" hspace="0" src="{{ env('APP_URL').'images/butterfly_logo.jpg' }}" style="display:block;" vspace="0" width="184" alt="Logo">
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
                                    {{-- Message --}} 
                                    <tr>
                                        <td width="510" valign="top" align="left">
                                            <table width="510" border="0" cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#000000;">
                                                <tr>
                                                    <td width="32" valign="top" align="left">
                                                        @if($user_image == '')
                                                            <div style="position: relative; height: 32px; width: 32px; margin-top: 12px;">
                                                                <div style=" border-radius: 100% !important; overflow: hidden; width: 32px; height: 32px; border: none; position: absolute; top: 0px; background-color: #24b183; color: #fff;">
                                                                    <span style=" display: block; font-size: 16px; font-family: &quot;Work Sans&quot;,sans-serif; font-weight: 600; position: absolute; top: 50%; left: 50%; line-height: 1; transform: translate(-50%, -50%); margin: 7px 10px;">{{ substr($member_name, 0, 1)}}</span>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <img border="0" height="32" hspace="0" src="{{ env('DO_URL').$user_image }}" style="display:block;" vspace="0" width="32" alt="Notification">
                                                        @endif
                                                    </td>
                                                    <td width="24" valign="top" align="left">
                                                        <img border="0" height="1" hspace="0" src="{{ env('APP_URL').'images/spacer.gif' }}" style="display:block;" vspace="0" width="24" alt="Notification">
                                                    </td>
                                                    <td width="454" valign="top" align="left" style="color: #333333; font-size: 16px; line-height: 30px;">
                                                        {!! $message_text !!}
                                                    </td>
                                                    @if(isset($post_type) && ($post_type == 'Feed' || $post_type == 'Answer') && isset($notification_status) && $notification_status == 1)
                                                        <td><img border="0" height="40" hspace="0" src="{{ env('APP_URL').'images/approve-filled.png' }}" style="display:block;" vspace="0" width="40" alt="Notification"></td>
                                                        <td style="font-weight: 400; font-size: 16px; line-height: 150%; color: #24B183;"> Approved</td>
                                                    @elseif(isset($post_type) && ($post_type == 'Feed' || $post_type == 'Answer') && isset($notification_status) && $notification_status == 2)
                                                        <td><img border="0" height="40" hspace="0" src="{{ env('APP_URL').'images/close-filled.png' }}" style="display:block;" vspace="0" width="40" alt="Notification"></td>
                                                        <td style="font-weight: 400; font-size: 16px; line-height: 150%; color: #EF4444;"> Declined</td>
                                                    @endif
                                                </tr>
                                           </table>
                                       </td>
                                    </tr>
                                    {{-- Description --}} 
                                    @if(isset($post_type) && ($post_type == 'Feed' || $post_type == 'Answer'))
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="510" valign="top" align="left">
                                                <table width="510" border="0" cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#000000;">
                                                    <tbody>
                                                        <tr>
                                                            <td width="56" align="left" valign="top" style="border-right: 2px solid #C1C1C1;">
                                                                <img border="0" hspace="0" height="1" src="{{ env('APP_URL').'images/spacer.gif' }}" style="display:block;" vspace="0" width="56" jslog="138226; u014N:xr6bB; 53:W2ZhbHNlLDBd" alt="Notification">
                                                            </td>
                                                            <td width="20" align="left" valign="top">
                                                                <img border="0" hspace="0" height="1" src="{{ env('APP_URL').'images/spacer.gif' }}" style="display:block;" vspace="0" width="20" jslog="138226; u014N:xr6bB; 53:W2ZhbHNlLDBd" alt="Notification">
                                                            </td>
                                                            <td width="432" align="left" valign="top" style="color: #727272; font-size: 16px; line-height: 24px;">
                                                               {{ $description }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    @endif
                                    <tr> 
                                        <td>&nbsp;</td>
                                    </tr>
                                    @if(isset($type) && $type == 'owner')
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    {{-- Approve on Dashboard --}}
                                    <tr>
                                        <td width="510" valign="top" align="left">
                                            <table width="510" border="0" cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#000000;">
                                                <tbody>
                                                    <tr>
                                                       <!--  <td width="255" valign="top" align="left" class="empty"><img border="0" height="1" hspace="0" src="{{ env('APP_URL').'images/spacer.gif' }}" style="display:block;" vspace="0"></td> -->
                                                        <td width="255" valign="top" align="right">
                                                            <table width="255" border="0" cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#000000;">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="232" align="right" valign="top" style="color: #24B183; font-size: 16px; line-height: 20px;"><a href="{{ env('CLIENT_APP_URL').'dashboard/notifications' }}" style=" text-decoration:none;color: #24B183  !important; font-size: 16px; line-height: 20px;">Approve on Dashboard</a> </td>
                                                                        <td width="11" align="left" valign="top">
                                                                            <img border="0" height="1" hspace="0" src="{{ env('APP_URL').'images/spacer.gif' }}" style="display:block;" vspace="0" width="11" alt="Notification">
                                                                        </td>
                                                                        <td width="12" align="left" valign="middle">
                                                                            <img alt="arrow" border="0" height="12" hspace="0" src="{{ env('APP_URL').'images/arrow.png' }}" style="display:block;" vspace="0" width="12" alt="Notification">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="510" valign="top" align="left" style="border-bottom: 1px solid #C1C1C1;">&nbsp;</td>
                                    </tr>
                                    @if(isset($feed_media_data) && count($feed_media_data) > 0)
                                        @foreach($feed_media_data as $value)
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
                                                            @if(isset($value['type']) && $value['type'] == 'image')
                                                                <td width="133" valign="top" align="left" class="keepleft">
                                                                    <img alt="arrow" border="0" height="auto" hspace="0" src="{{ env('DO_URL').$value['url'] }}" style="display:block;" vspace="0" width="100%">
                                                                </td>
                                                                <td width="30" valign="top" align="left" class="empty">
                                                                    <img border="0" height="1" hspace="0" src="{{ env('APP_URL').'images/spacer.gif' }}" style="display:block;" vspace="0" width="30" alt="Notification">
                                                                </td>
                                                                <td class="keepleft" width="347" align="left" style="font-size: 16px; color: #727272; line-height: 26px;"><span style="display: none;" class="mobile-spacer"><br class="empty" /></span>
                                                                    @if($value['caption'] != '')
                                                                        {{ $value['caption'] }} 
                                                                    @else 
                                                                        (no caption) 
                                                                    @endif
                                                                </td>
                                                                @if(($post_type == 'Gallery') && ($value['status'] == 1))
                                                                    <td width="30" valign="top" align="left" class="empty">
                                                                        <img border="0" height="1" hspace="0" src="{{ env('APP_URL').'images/spacer.gif' }}" style="display:block;" vspace="0" width="30" alt="Notification">
                                                                    </td>
                                                                    <td>
                                                                        <img border="0" height="40" hspace="0" src="{{ env('APP_URL').'images/approve-filled.png' }}" style="display:block;" vspace="0" width="40" alt="approved Icon">
                                                                    </td>
                                                                    <td style="font-weight: 400; font-size: 16px; line-height: 150%; color: #24B183;"> Approved</td>
                                                                @elseif(($post_type == 'Gallery') && ($value['status'] == 2))
                                                                    <td width="30" valign="top" align="left" class="empty">
                                                                        <img border="0" height="1" hspace="0" src="{{ env('APP_URL').'images/spacer.gif' }}" style="display:block;" vspace="0" width="30" alt="Notification">
                                                                    </td>
                                                                    <td>
                                                                        <img border="0" height="40" hspace="0" src="{{ env('APP_URL').'images/close-filled.png' }}" style="display:block;" vspace="0" width="40" alt="Decline Icon">
                                                                    </td>
                                                                    <td style="font-weight: 400; font-size: 16px; line-height: 150%; color: #EF4444;"> Declined</td>
                                                                @endif
                                                            @endif
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td width="510" valign="top" align="left" style="border-bottom: 1px solid #C1C1C1;">&nbsp;</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    {{-- dashboard btn --}}
                                    <tr>
                                        <td width="510" valign="top" align="center">
                                            <table width="510" border="0" cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#000000;">
                                                <tr>
                                                   <!--  <td width="130" valign="top" align="left" class="cta-sapcer">
                                                        <img border="0" height="1" hspace="0" src="{{ env('APP_URL').'images/spacer.gif' }}" style="display:block;" vspace="0" width="130">
                                                    </td> -->
                                                   <!--  <td width="30" valign="top" align="left" >
                                                        <img border="0" height="1" hspace="0" src="{{ env('APP_URL').'images/spacer.gif' }}" style="display:block;" vspace="0" width="30">
                                                    </td> -->
                                                    <td width="250" valign="top" align="center">
                                                        <a href="{{ env('CLIENT_APP_URL').'dashboard' }}" target="_blank" style="box-sizing: border-box;display: inline-block;font-family: arial,helvetica,sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF !important; background-color: #24b183; border-radius: 8px;-webkit-border-radius: 8px; -moz-border-radius: 8px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;">
                                                            <span style="display:block;padding:0 20px;line-height:120%;">
                                                            <p style="font-size: 14px; line-height: 120%;"><span style="font-size: 16px; line-height: 19.2px;">Go to my <span style="line-height: 19.2px; font-size: 16px;">Dashboard</span></span></p>
                                                          </span>
                                                        </a>
                                                    </td>
                                                   <!--  <td width="30" valign="top" align="left">
                                                        <img border="0" height="1" hspace="0" src="{{ env('APP_URL').'images/spacer.gif' }}" style="display:block;" vspace="0" width="30">
                                                    </td> -->
                                                   <!--  <td width="130" valign="top" align="left" class="cta-sapcer">
                                                        <img border="0" height="1" hspace="0" src="{{ env('APP_URL').'images/spacer.gif' }}" style="display:block;" vspace="0" width="130">
                                                    </td> -->
                                                </tr>
                                           </table>
                                        </td>
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
                                                    <!-- <td width="119" valign="top" align="left" class="empty">
                                                        <img border="0" height="1" hspace="0" src="{{ env('APP_URL').'images/spacer.gif' }}" style="display:block;" vspace="0" width="119">
                                                    </td> -->
                                                    <!-- <td width="12" valign="top" align="left" >
                                                        <img border="0" height="1" hspace="0" src="{{ env('APP_URL').'images/spacer.gif' }}" style="display:block;" vspace="0" width="12">
                                                    </td> -->
                                                    <td width="240" valign="top" align="center">
                                                       <table width="240" border="0" cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#000000;">
                                                            <tr>
                                                                <td width="240" align="center" valign="top" style="color: #24B183; font-size: 16px; line-height: 18px;">
                                                                    <a href="{{ env('CLIENT_APP_URL').'dashboard/settings/notification' }}" style="color: #24B183 !important; font-size: 16px; line-height: 18px; text-decoration: none; display: inline-block;" target="_blank">Update notification settings </a> <span style="display: inline-block;">
                                                                        <img alt="arrow" border="0" height="12" hspace="0" src="{{ env('APP_URL').'images/arrow.png' }}" style="display:block;" vspace="0" width="12" alt="Notification">
                                                                    </span>
                                                                </td>
                                                                <!-- <td width="11" align="right" valign="top">
                                                                    <img border="0" height="1" hspace="0" src="{{ env('APP_URL').'images/spacer.gif' }}" style="display:block;" vspace="0" width="11">
                                                                </td>
                                                                <td width="12" align="right" valign="middle">
                                                                    
                                                                </td> -->
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <!-- <td width="12" valign="top" align="left">
                                                        <img border="0" height="1" hspace="0" src="{{ env('APP_URL').'images/spacer.gif' }}" style="display:block;" vspace="0" width="12">
                                                    </td> -->
                                                   <!--  <td width="119" valign="top" align="left" class="empty">
                                                        <img border="0" height="1" hspace="0" src="{{ env('APP_URL').'images/spacer.gif' }}" style="display:block;" vspace="0" width="119">
                                                    </td> -->
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
                                </table>
                            </td>
                            <td width="24" valign="top" align="left">
                                <img border="0" height="1" hspace="0" src="{{ env('APP_URL').'images/spacer.gif' }}" style="display:block;" vspace="0" width="24" alt="Notification">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>