<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?php echo $this->config->item('TITLE'); ?></title>
    </head>
    <body bgcolor="#f0f3f4" style="margin:0; padding:0; font-family:Arial, Helvetica, sans-serif;font-size:12px; color:#000;">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f0f3f4">
            <tr>
                <td>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:20px; display:block; max-width: 600px">
                        <!--Email header start-->
                        <tbody>
                            <tr>
                                <td height="70" align="left" valign="top" bgcolor="#ffffff" style="border-bottom: solid 1px #eeeeee;">
                                    
                                </td>
                            </tr>
                            <tr>
                                <td height="20" align="center" valign="middle" bgcolor="#ffffff"></td>
                            </tr>
                        <!--Email header end-->

                         <!--Email body start-->
                        <tr>
                            <td align="center" valign="top" bgcolor="#FFFFFF"><table width="94%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:20px;">
                                            <p>Recently you have requested password reset assistance, and so here is token which will allow you to reset your password. If you have not requested a password reset, please ignore this email.</p>
                                            <div style="background: yellow;">
                                            <center><?php echo $unictokan;?></center>
                                            </div>
                                            
                                               
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" height="30">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="left" height="50">&nbsp;</td>
                                    </tr>
                                </table></td>
                        </tr>
                        <!--Email body end-->


                        <!--Email footer Start-->
                        
                        <tr>
                            <td align="center" height="26" bgcolor="#dddddd" style="color:#333333; font-family:Arial, Helvetica, sans-serif;">
                                <p style="margin: 0px; line-height: 26px; font-size: 11px;" >Copyright &copy; <?php echo date('Y'); ?> <?php echo $this->config->item('TITLE'); ?>, Inc., All rights reserved.</p>
                            </td>
                        </tr>
                        <!--Email footer end-->
                    </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>