<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="Promptpay QR Code Generator">
        <meta name="keywords" content="Promptpay,QR,พร้อมเพย์">
        <meta name="author" content="HypSeller">
        <link href="<?php echo base_url();?>assets/css/styles.css" rel="stylesheet">
        
        <title>PicUp</title>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-7623956490233390",
            enable_page_level_ads: true
            });
        </script>
    </head>
    <body style="background: repeat url('<?php echo base_url();?>assets/img/back.png');">
        <div style="
                    position: fixed;
                    left: 50%;  
                    top: 40%;
                    z-index: 100;
                    height: 400px;
                    margin-top: -200px;
                    width: 600px;
                    margin-left: -300px;
                    text-align: center;">
            <img src="<?php echo base_url();?>assets/img/logo.png" width="480" height="160" />                        
            <div id="login_control" class="control">
                <label for="contact">แนะนำและติดต่อสอบถาม</label>
                <br>  
                <input id="receiver" type="text" value="" placeholder="โปรดระบุชื่อ" />
            </div>
        </div>
    </body>
</html>