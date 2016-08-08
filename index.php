<?php
include "ayar.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script type="text/javascript" src="includes/js/jquery-1.6.4.min.js"></script>
        <script type="text/javascript" src="includes/js/bootstrap.js"></script>
        <script type="text/javascript" src="includes/js/bootstrap.min.js"></script>

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link type="text/css" rel="stylesheet" href="includes/css/bootstrap.css">
        <link type="text/css" rel="stylesheet" href="includes/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="includes/css/bootstrap-theme.css">
        <link type="text/css" rel="stylesheet" href="includes/css/bootstrap-theme.min.css">
        <link type="text/css" rel="stylesheet" href="includes/css/custom.css">
        
        <title>Ziyaretçi Defteri</title>
        
        <script>
function gonder() {
    var adsoyad = $("input[name=adsoyad]").val();
    var telefon = $("input[name=telefon]").val();
    var email   = $("input[name=email]").val();
    var mesaj   = $("textarea[name=mesaj]").val();
    var reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;

    if((adsoyad.trim() == "") || (telefon.trim() == "") || (email.trim() == "") || (mesaj.trim() == ""))
    {
        alert("Tüm bilgileri eksiksiz giriniz!!");
    }
    else if (!(reg.test(email)))
    {
        alert("Geçerli bir email adresi giriniz!!");
    }
    else
    {
        var degers = "adsoyad="+adsoyad+"&telefon="+telefon+"&email="+email+"&mesaj="+mesaj;
        alert("Mesajınız başarıyla gönderilmiştir.");
        $.ajax ({
            type: "post",
            url: "gonder.php",
            data: degers,
            success:function(sonuc){
                if( sonuc == "hata"){
                    alert("veritabani hatasi");
                }
                else
                {
                    $("input[name=adsoyad]").val("");
                    $("input[name=telefon]").val("");
                    $("input[name=email]").val("");
                    $("textarea[name=mesaj]").val("");
                    $("#msjid").load("mesajcek.php");
                }
            }
        })
    }
}

$(document).ready(function() {
     $("#msjid").load("mesajcek.php");
});


$(document).ready(function(e){
 $('#buton').click(function(){ 
 var email = $('#email').val();
 if ($.trim(email).length == 0) {
 alert('Geçerli bir mail adresi giriniz!!');
 return false;
 }
 if (validateEmail(email)) {
// alert('Valid Email Address');
 return false;
 }
 else {
 alert('Geçerli bir mail adresi giriniz!!');
 return false;
 }});
});


        </script>
    </head>
    
    <body>
        
        <div class="container">
         <div class="page-header" style="margin-top:10px;margin-bottom:10px;" id="banner">
            <div class="row">
               <div class="col-lg-3" style="position:fixed;">
                   
        <form method="post" id="form1" onsubmit="return false" class="form-horizontal">
        <fieldset>
        <legend style="text-align:center;">Ziyaretçi Defteri</legend>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Ad Soyad</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="adsoyad" id="adsoyad" placeholder="Ad Soyad">
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Telefon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="telefon" id="telefon" placeholder="Telefon">
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Mesaj</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="mesaj" id="mesaj" placeholder="Mesajınızı yazınız.."></textarea>
                </div>
            </div>
        
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button id="buton" onclick="gonder()" class="btn btn-primary">Gönder</button>
                </div>
            </div>
            
        </fieldset>
        </form>
                   
                </div>
                
               <div class="col-lg-8" style="float:right;">

                <legend>Mesajlar</legend>
                 <div id="msjid" class="col-lg-12 " style="margin 2px;">

                 </div>
                
                </div>

            </div>
  
            </div>
        </div>
                   
                   
    </body>
    
</html>