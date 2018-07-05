var qr_layout = 'bottom-l';

            $(document).ready(function() {
              
                $('#select_image').css('display','block');
                $('#select_image').click(function(){
                    $('#image_file').trigger('click');    
                });

                $('#image_file').on('change', onImageInput);

                $('#receiver,#account,#amount,#size,#show_amount').change(function(){
                    validateInput();                 
                    generateOutput();
                });
                
                $('#amount').keypress(function(event) {
                    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                        event.preventDefault();
                    }
                });

                $('.button').click(function(){

                    qr_layout = $(this).attr('id');
                    generateOutput();
                });

                $('#print').click(function(){
                        var canvas = document.getElementById("output_canvas");
                        var windowContent = '<!DOCTYPE html>';
                        windowContent += '<html>'
                        windowContent += '<head><title>Print canvas</title></head>';
                        windowContent += '<body>'
                        windowContent += '<img src="' + canvas.toDataURL('image/png') + '">';
                        windowContent += '</body>';
                        windowContent += '</html>';
                        var printWin = window.open('','','width=340,height=260');
                        printWin.document.open();
                        printWin.document.write(windowContent);
                        printWin.document.close();
                        printWin.focus();
                        printWin.print();
                        printWin.close();
                });

                $(window).scroll(fixDiv);
                fixDiv();
            });

            function validateInput(){
                var amount = $('#amount').val();
                if(amount < 0){
                    alert('โปรดระบุจำนวนเงินมากกว่าหรือเท่ากับ 0 เท่านั้น');
                    $('#amount').val('0.00');
                }

            }

            function fixDiv() {
                var $control = $('#left_control,#right_control');
                if ($(window).scrollTop() > 100){
                    $control.css({
                        'position': 'fixed',
                        'top': '10px'
                    });
                }else{
                    $control.css({
                        'position': 'absolute',
                        'top': 'auto'
                    });
                }
            }

            function generateQR(){

                var receiveAmt = $('#amount').val();
                               
                var promptpayId = $('#account').val();

                var content = generatePayload (promptpayId,{ amount: parseFloat(receiveAmt) }); //$('#account').val();

                var qrSize = $('#size').val();
            
                //var promptpay_img = new Image(100, 100);   // using optional size for image
                
                //promptpay_img.src = './assets/img/promptpay.jpg';

                var options = {
                    render: 'canvas',

                    text: content,

                    //minVersion: '6',
                    background: '#ffffff',
                    size: qrSize,
                    radius: 0,
                    quiet: '1',

                    mode: 0,
               
                    //mSize: 0.12,
                    //mPosX: 0.5,
                    //mPosY: 0.5,               
                    //image: promptpay_img
                };

                if(promptpayId != '' && promptpayId != null){
                    $('#container').empty().qrcode(options);                                                       
                }
            }

            function generateOutput(){
                generateQR();
                var qrSize = $('#size').val();
                var image = new Image(qrSize, qrSize);   // using optional size for image
                image.onload = drawImageActualSize; // draw when image has loaded
                image.src = $('#src_img').attr('src');

            }

            function onImageInput() {
                    var input = $('#image_file')[0];
              
                           
                if (input.files && input.files[0]) {
                    if(input.files.length <= 40){
                        
                        var reader = new FileReader();
                        reader.onload = function (event) {
                            $('#src_img').attr('src', event.target.result);
                            generateOutput();
       
                        };

                        reader.readAsDataURL(input.files[0]);                
                   
                        $('#image_list').empty();
                        $('#image_list').css('display','block');
                        $('#image_list').append('<label for="img_list">รูปทั้งหมด</label><br>');

                        for(var i=0; i < input.files.length;i++ ){
                            var img_reader = new FileReader();
                            img_reader.onload = function (event) {
                                var component = '<div class="select_image" onclick="loadImage(this);">';
                                component += '<img id="img_' + i +'" src="'+ event.target.result +'" width="65" height="65" />'                               
                                component += '</div>';                              
                                component += '<br>';
                                $('#image_list').append(component);                     
                                                                              
                            };

                            img_reader.readAsDataURL(input.files[i]);
                        }
                    
                    }else{
                        alert("ระบบอนุญาตให้แก้ไขรูปได้ครั้งละ 40 รูปเท่านั้น");
                    }
                }
            } 

            function loadImage(images){
                var image = $(images).find("img");                
                $('#src_img').attr('src', $(image).attr('src'));
                generateOutput();
            }

            function drawImageActualSize() {
                var canvas = document.getElementById("output_canvas");
                var ctx = canvas.getContext("2d");
                var qr_img = $('#container canvas')[0];
                var qr_margin = 5;
                var sizeRatio = (this.width / 150);
                var promptpay_width = 50 * sizeRatio;
                var promptpay_height = 45 * sizeRatio;
                var promptpay_img = new Image(promptpay_width, promptpay_height);   // using optional size for image                                
                promptpay_img.src = $('#promptpay_logo').attr('src');

                 // use the intrinsic size of image in CSS pixels for the canvas element
                canvas.width = this.naturalWidth * 0.5;
                canvas.height = this.naturalHeight * 0.5;

                // will draw the image as 300x227 ignoring the custom size of 60x45
                // given in the constructor
                ctx.drawImage(this, 0, 0, canvas.width,canvas.height );

                // To use the custom size we'll have to specify the scale parameters 
                // using the element's width and height properties - lets draw one 
                // on top in the corner:
                if(qr_img != null){
                    var qr_margin_x, qr_margin_y;
                    var pp_margin_x, pp_margin_y;
                    var tx_margin_x, tx_margin_y;

                    switch (qr_layout){
                        case 'top-l':
                            if($('#show_amount').is(':checked')){
                                tx_margin_y = 30;                            
                            }else{
                                tx_margin_y = 15;
                            }
                            pp_margin_y = tx_margin_y + 5  ;
                            qr_margin_y =  pp_margin_y + promptpay_height;

                           
                            qr_margin_x = qr_margin;
                            pp_margin_x = qr_margin_x;    
                            tx_margin_x = qr_margin_x + 15;
                           
                            break;
                        case 'top-r': 
                            if($('#show_amount').is(':checked')){
                                tx_margin_y = 30;                            
                            }else{
                                tx_margin_y = 15;
                            }
                            pp_margin_y = tx_margin_y + 5  ;
                            qr_margin_y =  pp_margin_y + promptpay_height;

                            qr_margin_x = canvas.width - this.width - qr_margin;
                            pp_margin_x = qr_margin_x;
                            tx_margin_x = qr_margin_x + 15;

                            break;
                        case 'bottom-l':
                            qr_margin_x = qr_margin;
                            qr_margin_y =  canvas.height - this.height - qr_margin;

                            pp_margin_x = qr_margin_x;
                            pp_margin_y = qr_margin_y - promptpay_height;

                            tx_margin_x = qr_margin_x + 15;
                            tx_margin_y = pp_margin_y - 5;

                            break;
                        case 'bottom-r': 
                            qr_margin_x = canvas.width - this.width - qr_margin;
                            qr_margin_y =  canvas.height - this.height - qr_margin;

                            pp_margin_x = qr_margin_x;
                            pp_margin_y = qr_margin_y - promptpay_height;

                            tx_margin_x = qr_margin_x + 15;
                            tx_margin_y = pp_margin_y - 5;

                            break;
                    }
                    
                    ctx.drawImage(qr_img, qr_margin_x, qr_margin_y, this.width, this.height);
                    ctx.drawImage(promptpay_img, pp_margin_x, pp_margin_y, this.width, promptpay_height); 
                    
                    var fontSize = 15 * sizeRatio;
                    ctx.font = fontSize + "px bold ubuntu";
                        
                    if($('#show_amount').is(':checked')){
                        ctx.fillStyle = "white";
                        ctx.fillRect(qr_margin_x, tx_margin_y - fontSize, this.width, fontSize + 5);
                        ctx.fillRect(qr_margin_x, tx_margin_y - (fontSize * 2), this.width, fontSize + 5);
                        
                        ctx.fillStyle = "grey";
                        ctx.fillText($('#receiver').val(), tx_margin_x , tx_margin_y - fontSize ); 
                        ctx.fillText($('#amount').val() + " บาท", tx_margin_x , tx_margin_y + 2 );    

                    }else{
                        ctx.fillStyle = "white";
                        ctx.fillRect(qr_margin_x, tx_margin_y - fontSize, this.width, fontSize + 5);

                        ctx.fillStyle = "grey";
                        ctx.fillText($('#receiver').val(), tx_margin_x , tx_margin_y); 
                        
                    }

                    ctx.restore();
                    
                    $('.button').css('background-color','#666660');
                   
                    $('#' + qr_layout).css('background-color','#1D89AA');
                    
                    $('#download').css('display', 'block');
                    $('#download').attr('href', canvas.toDataURL('image/png'));
                    $('#download').attr('download', 'download.png');

                }else{
                    $('#download,#print').css('display', 'none');                    
                }
          
            }