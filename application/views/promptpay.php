<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Promptpay QR Code Generator">
        <meta name="keywords" content="Promptpay,QR,พร้อมเพย์">
        <meta name="author" content="HypSeller">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta property="og:url" content="https://www.hypseller.com/promptpay" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="HypSeller - Sale & Marketing Solutions" />
        <meta property="og:description" content="เว็บที่ช่วยสร้างพร้อมเพย์ QR Code ร่วมกับสินค้าและบริการ เพื่อเพิ่มช่องทางความสะดวกให้กับผู้ซื้อ" />
        <meta property="og:image" content="<?php echo base_url();?>assets/img/logo_600.png" />
        
        <title>HypSeller - Sale & Marketing Solutions</title>
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery-qrcode-0.14.0.js"></script>
        <script src="<?php echo base_url();?>assets/js/promptpay.js"></script>
        <link href="<?php echo base_url();?>assets/css/styles.css" rel="stylesheet">
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/pluton/ico/favicon.ico">
        <script src="<?php echo base_url();?>assets/js/hypseller-promptpay.min.js"></script>
        
        
        <!-- Global Site Tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-106791470-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments)};
                gtag('js', new Date());

                gtag('config', 'UA-106791470-1');
        </script>
       
        <noscript>
            You need to enable JavaScript to run this app.
        </noscript>
    </head>

    <body style="background: repeat url('<?php echo base_url();?>assets/img/back.png');">
                
        <div id="container">
        </div>
        
        <div id="content_img" >
            <img id="src_img" src="<?php echo base_url();?>assets/img/back.png" width="300" height="200"
                 style="display: none"  
             />

        </div>
        <div id="left_control" class="control left">
            <div id="banner" >
                <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/logo.png" width="120" height="40 " /></a>
            </div>
            <hr>
                <label for="picture">รูปสินค้า/บริการ</label>
                <br>
                <a id="select_image" href='#'>เลือกไฟล์รูปภาพ</a>   
                <input id="image_file" type="file" accept="image/*" multiple style="display: none;">            
            <hr>
                <img id="promptpay_logo" src="<?php echo base_url();?>assets/img/promptpay.jpg" width="190" height="100" />
                <label for="receiver_name">ชื่อผู้รับเงิน</label>
                <input id="receiver" type="text" value="" placeholder="โปรดระบุชื่อ" />
                <label for="receiver">เบอร์โทรศัพท์/เลขบัตรประชาชน</label>
                <input id="account" type="text" value="" />
                <label for="amount">จำนวนเงิน</label>
                <input id="amount" type="number" value="0.00" />
                <label for="amount">แสดงจำนวนเงิน</label>
                <br>
                <input id="show_amount" type="checkbox" checked="checked" />
            <hr>
                <label for="position">ตำแหน่งแสดงผล</label>    
                <br />
                <div id="layout">
                    <button id="top-l" class="button"></button> <button id="top-r" class="button"></button>
                    <br>
                    <br>
                    <button id="bottom-l" class="button"></button> <button id="bottom-r" class="button"></button>
                </div>
            <hr>
                <label for="size">ขนาด</label>   
                <br /> 
                <input id="size" type="range" value="150" min="50" max="300" step="50">
            <hr>
        
        </div>


        
        <div id="right_control" class="control right">
            <a id="download" href='#'>ดาวน์โหลด</a>                  
            <a id="print" href='#'>Print</a>             
          
            <label for="support">ร่วมสนับสนุน</label>
            <br>
            <img id="support_img" src="<?php echo base_url();?>assets/img/support.png" width="110" height="110" />
            <hr>
            <label for="contact">แนะนำและติดต่อสอบถาม</label>
            <br>  
            <span class="square individual">        
                <a class="ninth before after" href="mailto:info@hypseller.com" >info@hypseller.com</a>      
            </span>
            <hr>
            <div id="image_list" style="display: none">              
            </div>
        </div>
        
        <div id="result">
            <canvas id="output_canvas"></canvas>
            <div id="test"></div>
        </div>


        <div id="footer" class="footer" >
            Promptpay@HypSeller ©2017                     
        </div>
        
    </body>
</html>