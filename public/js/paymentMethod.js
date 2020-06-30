// init button paypal

paypal.Buttons({

    createOrder: function(data,actions){

        let terms = document.getElementById('terms_conditions');
        
        if(!terms.checked){
          return alert('debes aceptar los términos y condiciones');
        }

        return fetch(urlCreateOrder, {
            method: 'post',
            body: JSON.stringify({
              discount_code: document.getElementById('discount_code').value
            }),
            headers: {
              'content-type': 'application/json',
              'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
          }).then(function(res) {
    
            if (res.ok) {
    
              return res.json();
            
            } else {
    
              alert("Error");
            
            }
            
            console.log(res);
    
          }).then(function(data) {
    
            return data.id; // Use the same key name for order ID on the client and server
          
        });

    },
    onApprove: function(data) {
      
      $(".loader-page").css({visibility:"visible",opacity:"0.5"});
      console.log(data.orderID);
      return fetch(urlCaptureOrder, {
        method: 'post',
        headers: {
          'content-type': 'application/json',
          'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        body: JSON.stringify({
          orderID: data.orderID
        })
      }).then(function(res) {

        if (res.ok) {

          return res.json();
        
        } else {
          $(".loader-page").css({visibility:"hidden",opacity:"0"});

          alert("error");

        
        }

        window.location.replace(URL_REDIRECT);
        
      }).then(function(details) {

        $(".loader-page").css({visibility:"hidden",opacity:"0"});
        
        window.location.replace(URL_REDIRECT);

      })
    }


}).render('#paypal-button-container');

function getPaymentMethod(){

    const rbs = document.querySelectorAll('input[name="paymentMethod"]');
    let selectedValue;
    for (const rb of rbs) {
        if (rb.checked) {
            selectedValue = rb.value;
            break;
        }
    }
    
    return selectedValue;
}


function paymentWithMercadoPago(){

    console.log('Checkout Mercado Pago');

}

function paymentWithPayPal(){

    console.log('Checkout PayPal');

}

function changeButtonPayment(){

    $result = getPaymentMethod();

    if($result == 'mercadoPago'){
        
        document.querySelector('#btn-payment').style.display = "block";
        
        document.getElementById('amount_payment1').innerText = `${constAmountMP} U$D`;
        document.getElementById('amount_payment2').innerText = `${amountMP} U$D`;
        
        document.querySelector('#paypal-button-container').style.display = "none";
        
    }
    else if ($result == 'paypal'){
        document.querySelector('#btn-payment').style.display = "none";
        
        document.getElementById('amount_payment1').innerText = `${constAmountPaypal} U$D`;
        document.getElementById('amount_payment2').innerText = `${amountPaypal} U$D`;
        
        document.querySelector('#paypal-button-container').style.display = "block";
    }
    else{

        document.querySelector('#btn-payment').style.display = "block";

        document.getElementById('amount_payment1').innerText = `${amountMP} U$D`;
        document.getElementById('amount_payment2').innerText = `${amountMP} U$D`;
        
        document.querySelector('#paypal-button-container').style.display = "none";

    }

    
}

const btn = document.querySelector('#btn-payment');
// handle click button
btn.addEventListener('click',paymentWithMercadoPago,false);

const method =  document.querySelectorAll('input[name="paymentMethod"]');

for (var i = 0 ; i < method.length; i++) {
    
    method[i].addEventListener('click',changeButtonPayment,false); 
 
}



$('#discount_code').on('change keyup copy paste cut',function(e){
  
  document.getElementById('error_code').innerHTML = ``;

  amountPaypal = constAmountPaypal;
  amountMP = constAmountMP;
  changeButtonPayment();
  console.log('hola');
  if(e.target.value.length > 3){
    console.log(e.target.value);
    fetch(URL_DICOUNT_CODE, {
      method: 'post',
      body: JSON.stringify({
        discount_code: e.target.value
      }),
      headers: {
        'content-type': 'application/json',
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
      }
    }).then(function(res) {
      
      if (res.ok) {

        return res.json();
      
      }

    }).then(function(data){

      if(!isEmpty(data)){

        console.log(data);
        amountPaypal = amountPaypal - data.amount;
        amountMP = amountMP - data.amount;
        
      }else{

        document.getElementById('error_code').innerHTML = `
        <span class="invalid-feedback" role="alert" style="display:block;">
          El cupón ingresado no es válido o ha expirado
        </span>`;

      }

      changeButtonPayment();

    })    
  }

  
});


function isEmpty(obj) {
  for(var prop in obj) {
    if(obj.hasOwnProperty(prop)) {
      return false;
    }
  }

  return JSON.stringify(obj) === JSON.stringify({});
}