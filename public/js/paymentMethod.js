// init button paypal

paypal.Buttons({

    createOrder: function(data,actions){

        return fetch(urlCreateOrder, {
            method: 'post',
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
          $("#fakeloader").hide(1);

          alert("error");

        
        }

        console.log(res);
        
      }).then(function(details) {

        alert('Transaction funds captured from ' + details.payer_given_name);

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
        document.querySelector('#paypal-button-container').style.display = "none";
        
    }
    else if ($result == 'paypal'){
        document.querySelector('#btn-payment').style.display = "none";
        document.querySelector('#paypal-button-container').style.display = "block";
    }
    else{

        document.querySelector('#btn-payment').style.display = "block";
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

