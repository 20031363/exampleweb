<?php 

require_once(__DIR__.'/models/cita.php');


$web = new Cita();

if(!$web->checar('Cliente')) {
    header('Location: /conectatec/index.php'); 
    exit; 
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pago con Stripe y PayPal</title>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Quicksand', sans-serif;
      background: linear-gradient(135deg, #ece9e6, #ffffff);
      padding: 40px;
      color: #2c3e50;
    }
    .container {
      max-width: 450px;
      margin: auto;
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 24px;
    }
    label {
      font-weight: 700;
    }
    input, #card-element {
      width: 100%;
      padding: 12px;
      margin: 10px 0 20px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
    }
    .btn {
      background-color: #27ae60;
      color: white;
      border: none;
      padding: 12px;
      width: 100%;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }
    .btn:hover {
      background-color: #2ecc71;
    }
    #paypal-button-container {
      margin-top: 20px;
    }
    .divider {
      text-align: center;
      margin: 20px 0;
      position: relative;
    }
    .divider::before, .divider::after {
      content: '';
      height: 1px;
      background: #ccc;
      position: absolute;
      top: 50%;
      width: 40%;
    }
    .divider::before { left: 0; }
    .divider::after { right: 0; }
    .divider span {
      background: #fff;
      padding: 0 10px;
      position: relative;
      z-index: 1;
    }
    .continue-link {
      display: block;
      text-align: center;
      margin-top: 20px;
      font-weight: bold;
      text-decoration: none;
      color: #2980b9;
    }
    .continue-link:hover {
      color: #1abc9c;
    }
    .logos {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 30px;
    }
    .logos img {
      height: 40px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Formulario de Pago</h2>

    <form action="procesar_pago.php" method="POST" id="payment-form">
      <label for="total">Total de la compra (MXN)</label>
      <input type="number" step="0.01" min="0" id="total" name="total" 
      value="<?php echo str_replace(',', '', $_GET['total'] ?? '0'); ?>" readonly disabled>

      <label for="card-element">Tarjeta de Crédito</label>
      <div id="card-element"></div>
      <div id="card-errors" role="alert"></div>

      <button class="btn" type="submit">Pagar con Tarjeta</button>
    </form>

    <div class="divider"><span>ó</span></div>

    <div id="paypal-button-container"></div>

    <a href="finalizar_all.php?total=<?php echo $_GET['total'] ?? '0'; ?>" class="continue-link">Continuar Compra</a>

    <div class="logos">
      <img src="https://stripe.com/img/v3/home/social.png" alt="Stripe Logo">
      <img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_111x69.jpg" alt="PayPal Logo">
    </div>
  </div>

  <script src="https://js.stripe.com/v3/"></script>
  <script>
    const stripe = Stripe('pk_test_51RWeDnRLbhQR4V593YXxBwy2JwiCWbbG50Ar9jK4hLneEl4bJvUT7JCvxAPxLdiBRdP2nH1jBPusPRg7Xl9ubUK100zgaTUhsV');
    const elements = stripe.elements();
    const card = elements.create('card');
    card.mount('#card-element');

    const form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
      event.preventDefault();
      stripe.createToken(card).then(function(result) {
        if (result.error) {
          document.getElementById('card-errors').textContent = result.error.message;
        } else {
          const tokenInput = document.createElement('input');
          tokenInput.setAttribute('type', 'hidden');
          tokenInput.setAttribute('name', 'stripeToken');
          tokenInput.setAttribute('value', result.token.id);
          form.appendChild(tokenInput);
          form.submit();
        }
      });
    });
  </script>

  <script src="https://www.paypal.com/sdk/js?client-id=tu-client-id-de-paypal&currency=USD"></script>
  <script>
    paypal.Buttons({
      createOrder: function(data, actions) {
        const total = document.getElementById('total').value;
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: total
            }
          }]
        });
      },
      onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
          window.location.href = "procesar_paypal.php?paymentId=" + data.orderID;
        });
      }
    }).render('#paypal-button-container');
  </script>
</body>
</html>
