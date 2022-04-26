<?php
/*
Script Name: Moon Domain For Sale Script
Script URI: https://github.com/mumingulmez/moondomainforsale
Description: A ready-to-use script on all your sites with just a few key settings.
Version: 1.0.13
Author: Mümin Gülmez
Author URI: http://mumin.us
License: Creative Commons Zero v1.0 Universal
License URI: https://creativecommons.org/publicdomain/zero/1.0/
Please check the settings.php file for the installation.
*/

require('settings.php');

$domain = $_SERVER['SERVER_NAME'];
$domain = str_replace("www.", "", $domain );
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $domain; ?> Satılıktır | For Sale</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:300,700" rel="stylesheet">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
        <link rel="stylesheet" href="css/style.css" />
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
		<link rel="icon" href="/favicon.ico" sizes="192x192" />

    </head>
    <body>

        <section class="bg-alt hero p-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 bg-faded text-center col-fixed">
                        <div class="vMiddle">
                          <h1 class="pt-4 h2">
                              <span class="text-green"><?php echo $domain; ?></span>
                              <small>Satılıktır<br><i>Available for sale</i></small>
                          </h1>
                          <p class="mt-4">
                              Hemen satın almak için lütfen talebinizi iletin.<br><i>For instant purchase, please make an order.</i>
                          </p>
						    <h1 class="pt-4 h2">
                              <span class="text-green"><?php echo $offer; ?> <?php echo $currency; ?></span>
                          </h1>
                          <div class="pt-5">
                              <label for="name">
                              <a class="btn text-white bg-green bmtn-lg" href="mailto:info@<?php echo $domain; ?>?subject=Domain%20Fiyat%20Teklifi%20-%20<?php echo $domain; ?>">Şimdi Satın Al<br><i>Buy now</i></a>
                              </label>
                          </div>
                      </div>
                    </div>
                    <div class="col-sm-6 offset-sm-6">
                        <section class="bg-alt">
                            <div class="container">
                                <div class="row height-100">
                                    <div class="col-sm-10 offset-sm-1 mt-2">
                                        <form id="main-offer-form" action="contact.php" method="post">
                                            <h2 class="text-primary">Bu domainle ilgileniyor musunuz?<br><i>Interested in this domain?</i></h2>
                                            <hr/>
                                            <div class="form-group">
                                                <input
                                                  type="text"
                                                  name="name"
                                                  id="name"
                                                  class="form-control"
                                                  placeholder="Tam Ad | Full name *"
                                                >
                                            </div>
                                            <div class="row">
                                              <div class="col">
                                                <div class="form-group">
                                                    <input
                                                      type="email"
                                                      name="email"
                                                      class="form-control"
                                                      placeholder="E-posta | Email *"
                                                    >
                                                </div>
                                              </div>
                                              <div class="col">
                                                <div class="form-group">
                                                    <input
                                                      type="text"
                                                      name="phone"
                                                      class="form-control"
                                                      placeholder="Telefon Numarası | Phone number *"
                                                    >
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-group">
                                                <input
                                                  type="number"
                                                  name="price"
                                                  class="form-control"
                                                  min="0"
                                                  placeholder="Teklifiniz TL | Offer price in <?php echo $currency; ?>? *">
                                            </div>
                                            <div class="form-group">
                                                <textarea name="comments" class="form-control" placeholder="Mesajınız | Message"></textarea>
                                            </div>
                                            <div class="form-group">
                                              <div id="recaptcha" class="g-recaptcha" data-sitekey="<?php echo $recaptcha; ?>" data-callback="onSubmit" "></div>
                                            </div>

                                            <button type="submit" class="btn text-white btn-lg bg-primary btn-block">Teklifi Gönder<br><i>Make an offer</i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script>
          $( "#main-offer-form" ).validate({
            errorClass: 'form-control-feedback',
            errorElement: 'div',
            highlight: function(element) {
              $(element).parents(".form-group").addClass("has-danger");
            },
            unhighlight: function(element) {
              $(element).parents(".form-group").removeClass("has-danger");
            },
            rules: {
                name: 'required',
                email: {
                  required: true,
                  email: true
                },
                phone: {
                  required: true,
                  minlength:10,
                  maxlength:15
                },
                price: {
                  required: true,
                  minlength:3
                },
                comments: {
                  maxlength: 500
                }
              },
              messages: {
                name: 'Lütfen adınızı giriniz. | Please enter your name.',
                email: {
                  required: 'Burayı boş bırakamazsınız. | You can not leave this empty.',
                  email: 'Lütfen geçerli bir email girin. | Please enter a valid email address.'
                },
                phone: {
                  required: 'Burayı boş bırakamazsınız. | You can not leave this empty.',
                  matches: 'Lütfen geçerli bir telefon numarası girin. | Please enter a valide phone number.',
                  minlength: 'Telefon numarası en az 10 hane olmalıdır. | Phone number should be min 10 digits.',
                  maxlength: 'Telefon numarası en çok 15 hane olmalıdır. | Phone number should be max 10 digits.'
                },
                price: {
                  required: 'Lütfen teklifinizi giriniz. | Please enter offered price.',
                  minlength: 'Lütfen daha yüksek bir tutar giriniz. | Please enter a higher amount.'
                },
                comments: {
                  maxlength: 'Mesaj uzunluğu 500 karakterden az olmalıdır. | Message length must be less than 500 character.'
                }
              }
          });
        </script>
    </body>
</html>