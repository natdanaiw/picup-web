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
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta property="og:url" content="https://www.hypseller.com/promptpay" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="HypSeller - Sale & Marketing Solutions" />
        <meta property="og:description" content="เว็บที่ช่วยสร้างพร้อมเพย์ QR Code ร่วมกับสินค้าและบริการ เพื่อเพิ่มช่องทางความสะดวกให้กับผู้ซื้อ" />
        <meta property="og:image" content="<?php echo base_url();?>assets/img/logo_600.png" />
        
        <title>HypSeller - Sale & Marketing Solutions</title>

        <!-- CSS -->
        
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap/bootstrap.css" >
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap/bootstrap-responsive.css" >
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/mobile-style.css" >
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/pluton/ico/favicon.ico">
        <link rel="manifest" href="<?php echo base_url();?>assets/js/manifest.json">


        <!-- Java Script Library -->
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery-qrcode-0.14.0.js"></script>
        <script src="<?php echo base_url();?>assets/js/promptpay.js"></script>
        <script src="<?php echo base_url();?>assets/js/hypseller-promptpay-mobile.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/bootstrap/bootstrap.js"></script>

        
        <!-- Global Site Tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-106791470-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments)};
                gtag('js', new Date());

                gtag('config', 'UA-106791470-1');
        </script>
        <script>
            $(document).ready(function(){
                    // Bind to scroll
                $(window).scroll(function () {

                    //Display or hide scroll to top button 
                    if ($(this).scrollTop() > 100) {
                        $('.scrollup').fadeIn();
                    } else {
                        $('.scrollup').fadeOut();
                    }

                    var topMenuHeight = 120;
                    // Get container scroll position
                    var fromTop = $(this).scrollTop() + topMenuHeight + 10;

                    // Get id of current scroll item
                    /*var cur = scrollItems.map(function () {
                    if ($(this).offset().top < fromTop)
                        return this;
                    });

                    // Get the id of the current element
                    cur = cur[cur.length - 1];
                    var id = cur && cur.length ? cur[0].id : "";

                    if (lastId !== id) {
                        lastId = id;
                        // Set/remove active class
                        menuItems
                        .parent().removeClass("active")
                        .end().filter("[href=#" + id + "]").parent().addClass("active");
                    }*/
                });

                /*
                Function for scroliing to top
                ************************************/
                $('#image_scroll').click(function () {
                    $("html, body").animate({
                        scrollTop: $("#image_tool").offset().top
                    }, 600);
                    return false;
                });

                $('#promptpay_scroll').click(function () {
                    $("html, body").animate({
                        scrollTop: $("#promptpay_tool").offset().top
                    }, 600);
                    return false;
                });

            });

        </script>

        <!-- Add home screen script -->
        <script>
            if ('serviceWorker' in navigator) {
                    console.log("Will the service worker register?");
                        navigator.serviceWorker.register('<?php echo base_url();?>assets/js/service-worker.js')
                    .then(function(reg){
                        console.log("Yes, it did.");
                    }).catch(function(err) {
                    console.log("No it didn't. This happened:", err)
                });
            }
        </script>

        <noscript>
            You need to enable JavaScript to run this app.
        </noscript>
    </head>

    <body style="background: repeat url('<?php echo base_url();?>assets/img/back.png');">    
                
        <div class="section secondary-section" id="image_tool">
            <div class="content-container">
                <!-- Start title section -->
                <div class="title">
                    <div id="center banner" >
                      <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/logo.png" width="240" height="80" /></a>
                    </div>
                </div>
                <div id="control" class="control">
                    <div class="highlighted-box center"><h1>รูปสินค้า/บริการ</h1></div>
                <br>
                <div id="select_image" >เลือกไฟล์รูปภาพ</div>   

                <div id="container">
                </div>    

                <input id="image_file" type="file" accept="image/*" style="display: none;">     
                <img id="src_img" src="<?php echo base_url();?>assets/img/back.png" 
                     width="300" 
                     height="200"   
                     style="display: none" />
                 </div>        
            </div>
        </div>

        <!-- Tool Bar -->
        <div class="section secondary-section" id="promptpay_tool">
            <div class="content-container">
                <!-- Start title section -->
                <div class="title">
                    <div id="center banner" >
                        <img id="promptpay_logo" src="<?php echo base_url();?>assets/img/promptpay.jpg" width="380" height="240" />
                    </div>
                </div>
                <div class="control center">
                    <br>
                    <label for="receiver_name">ชื่อผู้รับเงิน</label>
                    <input id="receiver" type="text" value="" placeholder="โปรดระบุชื่อ" />
                 
                    <label for="receiver">เบอร์โทรศัพท์/เลขบัตรประชาชน</label>
                    <input id="account" type="text" value="" />
                    <label for="amount">จำนวนเงิน</label>
                    <input id="amount" type="number" value="" placeholder="0.00" />
                    <br>
                    <div class="center">
                        <div id="confirm" >ตกลง</div> 
                    </div>
                    <br>                    
                </div>
            </div>
        </div>



        <!-- Image Output -->
        <div class="section secondary-section " id="image_output">           
            <div class="content-container">
                <div class=" title">
                    Layout
                </div>
                <div id="canvas_result" class="center">
                    <img src="" id="output_image" width="338" height="563" style="display: none" />
                    <canvas id="output_canvas" style="display: none"></canvas>
                    <hr>
                    <a id="download" href='#' style="display: none">ดาวน์โหลด</a> 
                </div>
                <div class="control center">
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
            </div>
        </div>


        
        
         <!-- Footer section start -->
         <div class="footer">
            <p> Promptpay@HypSeller ©2017 <a href="https://www.hypseller.com">HypSeller</a></p>
        </div>
        <!-- Footer section end -->

        <!-- ScrollUp button start -->        
        <div id="image_scroll" class="scrollup">
            <a href="#">
                ^
            </a>
        </div>
        <!-- ScrollUp button end -->
    <body>
    </html>