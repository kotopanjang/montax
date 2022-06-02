/*=========================================================================================
  File Name: auth-register.js
  Description: Auth register js file.
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  ('use strict');

  var assetsPath = '../../../app-assets/',
    registerMultiStepsWizard = document.querySelector('.register-multi-steps-wizard'),
    pageResetForm = $('.auth-register-form'),
    select = $('.select2'),
    creditCard = $('.credit-card-mask'),
    expiryDateMask = $('.expiry-date-mask'),
    cvvMask = $('.cvv-code-mask'),
    mobileNumberMask = $('.mobile-number-mask'),
    pinCodeMask = $('.pin-code-mask');

  if ($('body').attr('data-framework') === 'laravel') {
    assetsPath = $('body').attr('data-asset-path');
  }

  // jQuery Validation
  // --------------------------------------------------------------------
  if (pageResetForm.length) {
    pageResetForm.validate({
      /*
      * ? To enable validation onkeyup
      onkeyup: function (element) {
        $(element).valid();
      },*/
      /*
      * ? To enable validation on focusout
      onfocusout: function (element) {
        $(element).valid();
      }, */
      rules: {
        'register-username': {
          required: true
        },
        'register-email': {
          required: true,
          email: true
        },
        'register-password': {
          required: true
        }
      }
    });
  }

  // multi-steps registration
  // --------------------------------------------------------------------

  // Horizontal Wizard
  if (typeof registerMultiStepsWizard !== undefined && registerMultiStepsWizard !== null) {
    var numberedStepper = new Stepper(registerMultiStepsWizard),
      $form = $(registerMultiStepsWizard).find('form');
    $form.each(function () {
      var $this = $(this);
      $this.validate({
        rules: {
          username: {
            required: true
          },
          email: {
            required: true
          },
          password: {
            required: true,
            minlength: 8
          },
          'confirm-password': {
            required: true,
            minlength: 8,
            equalTo: '#password'
          },
          'first-name': {
            required: true
          },
          'home-address': {
            required: true
          },
          addCard: {
            required: true
          }
        },
        messages: {
          password: {
            required: 'Enter new password',
            minlength: 'Enter at least 8 characters'
          },
          'confirm-password': {
            required: 'Please confirm new password',
            minlength: 'Enter at least 8 characters',
            equalTo: 'The password and its confirm are not the same'
          }
        }
      });
    });

    $(registerMultiStepsWizard)
      .find('.btn-next')
      .each(function () {
        $(this).on('click', function (e) {
          var isValid = $(this).parent().siblings('form').valid();
          if (isValid) {
            $.ajax({
                type: 'POST',
                url: myurl + '/cekemail',
                data: {
                    email: $("#email").val(),
                },
                cache: false,
                success: function(msg){
                  if(msg.success)
                    numberedStepper.next();
                  else{
                    alert('Email Sudah digunakan');
                    e.preventDefault();
                  }
                },
                    error: function(result) {
                }
            });
          } else {
            e.preventDefault();
          }
        });
      });

    $(registerMultiStepsWizard)
      .find('.btn-prev')
      .on('click', function () {
        numberedStepper.previous();
      });
    var cekpayment = false;
    var nomorid = null;
    var btnsub = $(registerMultiStepsWizard).find('.btn-submit');

    //JANGAN LUPA INI DIUBAH SEWAKTU HOSTING
    var myurl = "http://127.0.0.1:8000";
    //STOP BATAS UBAH
    $(registerMultiStepsWizard)
      .find('.btn-submit')
      .on('click', function () {
        var isValid = $(this).parent().siblings('form').valid();
        if (isValid) {
          btnsub.attr('disabled',true);
          btnsub.html('<i data-feather="check" class="align-middle me-sm-25 me-0"></i><span class="align-middle d-sm-inline-block d-none">Processing...</span>');
          var uname = $('#username').val();
          var umail = $('#email').val();
          var upass = $('#password').val();
          var utipe = $("input[name='plans']:checked").val();
          if(utipe == 'free'){
            register();
          }else{
            $.ajax({
              type: 'POST',
              url: myurl + '/pendaftaran',
              data:{paramnama:uname, parampass:upass, paramemail:umail,tipe:utipe},
              cache: false,
              success: function(msg){
                  nomorid = msg.nomorid;
                  // alert('sukses : ' + msg.nama + " | " + msg.token);

                  var snaptoken = msg.token;
                  snap.pay(snaptoken, {
                      // Optional
                      onSuccess: function(result) {
                          /* You may add your own js here, this is just example */
                          // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                          // console.log("masuk mode onSuccess");
                          // console.log(result)
                          // alert("1");
                          cekpayment = true;
                      },
                      // Optional
                      onPending: function(result) {
                          /* You may add your own js here, this is just example */
                          // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                          // console.log("masuk mode onPending");
                          // console.log(result)
                          // alert("2");

                          // counted++;
                          // alert("count" + counted);
                          // if(counted == 2)
                          // {
                          //     alert("count" + counted);
                          //     location.reload();
                          // }
                          cekpayment = true;
                      },
                      // Optional
                      onError: function(result) {
                          /* You may add your own js here, this is just example */
                          // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                          // console.log("masuk mode onError");
                          // console.log(result)
                          // alert("3");
                      }
                  });
              },
              error: function(result) {
                btnsub.attr('disabled',false);
                btnsub.html('<i data-feather="check" class="align-middle me-sm-25 me-0"></i><span class="align-middle d-sm-inline-block d-none">Submit</span>');
              }
            });
          }
        }
      });

      var intervalId = window.setInterval(function(){
          var adasesi = "{{session()->get('key_id')}}";
          if(nomorid != "" && cekpayment)
          {
            btnsub.attr('disabled',true);
            btnsub.html('<i data-feather="check" class="align-middle me-sm-25 me-0"></i><span class="align-middle d-sm-inline-block d-none">Check Pembayaran...</span>');
            cek_sesi();
          }
      }, 3000);

      function update_bayar()
      {
          var adasesi = "{{session()->get('key_id')}}";
          alert('udpatee');
          $.ajax({
              type: 'POST',
              url: myurl + '/updatebayar',
              data: {
                  paramsessi: nomorid,
              },
              cache: false,
              success: function(msg){
              },
                  error: function(result) {
              }
          });
      }

      function register(){

        var uname = $('#username').val();
        var umail = $('#email').val();
        var upass = $('#password').val();
        var utipe = $("input[name='plans']:checked").val();
        $("input[name=param_name]").val(uname);
        $("input[name=param_email]").val(umail);
        $("input[name=param_pass]").val(upass);
        $("input[name=param_tipe]").val(utipe);
        $("#registerform").submit();
        // $.ajax({
        //     type: 'POST',
        //     url: myurl + '/postRegister',
        //     data: {
        //         param_name: uname,
        //         param_email: umail,
        //         param_pass: upass,
        //         param_tipe: utipe,
        //     },
        //     cache: false,
        //     success: function (msg) {
        //         // alert('pesan : ' + msg);
        //         window.location = myurl;
        //     },
        //     error: function (result) {
        //         alert('error');
        //     }
        // });

        // alert('Registered!');
      }

      function cek_sesi()
      {
          var adasesi = "{{session()->get('key_id')}}";

          $.ajax({
              type: 'POST',
              url: myurl + '/cekpembayaran',
              data: {
                  paramsessi: nomorid,
              },
              cache: false,
              success: function(msg){
                  if(msg.status == "Sukses")
                  {
                      clearInterval(intervalId);
                      update_bayar();
                      register();
                  }
              },
                  error: function(result) {
                    
              }
          });
      }
  }

  // select2
  select.each(function () {
    var $this = $(this);
    $this.wrap('<div class="position-relative"></div>');
    $this.select2({
      // the following code is used to disable x-scrollbar when click in select input and
      // take 100% width in responsive also
      dropdownAutoWidth: true,
      width: '100%',
      dropdownParent: $this.parent()
    });
  });

  // phone number mask
  if (mobileNumberMask.length) {
    new Cleave(mobileNumberMask, {
      phone: true,
      phoneRegionCode: 'US'
    });
  }

  // Pincode
  if (pinCodeMask.length) {
    new Cleave(pinCodeMask, {
      delimiter: '',
      numeral: true
    });
  }

  // multi-steps registration
  // --------------------------------------------------------------------
});
