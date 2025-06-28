<?php
session_start();
if (isset($_SESSION['admin_sid']) || isset($_SESSION['customer_sid'])) {
    header("location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Materialize CSS -->
  <link href="css/materialize.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #e0c3fc, #8ec5fc);
      font-family: 'Outfit', sans-serif;
      margin: 0;
      padding: 0;
    }
    .register-card {
      background: white;
      padding: 50px 40px;
      border-radius: 15px;
      box-shadow: 0 20px 60px rgba(0,0,0,0.15);
      margin-top: 70px;
    }
    h4 {
      margin-bottom: 10px;
      font-weight: 700;
      color: #333;
    }
    p.subtitle {
      color: #666;
      margin-bottom: 30px;
      font-size: 15px;
    }
    .input-field .prefix {
      color: #8e44ad;
    }
    .input-field input:focus + label {
      color: #8e44ad !important;
    }
    .input-field input:focus {
      border-bottom: 2px solid #8e44ad !important;
      box-shadow: none;
    }
    .btn-custom {
      background: linear-gradient(135deg, #8e44ad, #3498db);
      border-radius: 10px;
      text-transform: none;
      font-weight: 600;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
    }
    .btn-custom:hover {
      box-shadow: 0 12px 30px rgba(0,0,0,0.25);
      transform: translateY(-2px);
    }
    .login-link {
      margin-top: 20px;
      color: #555;
      font-size: 14px;
    }
    .login-link a {
      color: #8e44ad;
      font-weight: 600;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="row center">
      <div class="col s12 m8 offset-m2 l6 offset-l3">
        <div class="register-card">
          <h4>Register ✨</h4>
          <p class="subtitle">Let's create your new account</p>
          <form id="formValidate" method="post" action="routers/register-router.php" novalidate>

            <div class="input-field">
              <i class="material-icons prefix">account_circle</i>
              <input name="username" id="username" type="text" data-error=".errorTxt1">
              <label for="username">Username</label>
              <div class="errorTxt1" style="color:#ff4081;font-size:0.8rem;"></div>
            </div>

            <div class="input-field">
              <i class="material-icons prefix">person</i>
              <input name="name" id="name" type="text" data-error=".errorTxt2">
              <label for="name">Name</label>
              <div class="errorTxt2" style="color:#ff4081;font-size:0.8rem;"></div>
            </div>

            <div class="input-field">
              <i class="material-icons prefix">lock</i>
              <input name="password" id="password" type="password" data-error=".errorTxt3">
              <label for="password">Password</label>
              <div class="errorTxt3" style="color:#ff4081;font-size:0.8rem;"></div>
            </div>

            <div class="input-field">
              <i class="material-icons prefix">phone</i>
              <input name="phone" id="phone" type="number" data-error=".errorTxt4">
              <label for="phone">Phone</label>
              <div class="errorTxt4" style="color:#ff4081;font-size:0.8rem;"></div>
            </div>

            <button type="submit" class="btn btn-custom waves-effect waves-light col s12">Register 🚀</button>

            <p class="login-link">Already have an account? <a href="login.php">Login here</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="js/plugins/jquery-1.11.2.min.js"></script>
  <script src="js/materialize.min.js"></script>
  <script src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="js/plugins/jquery-validation/additional-methods.min.js"></script>

  <script>
    $("#formValidate").validate({
      rules: {
        username: { required: true, minlength: 5 },
        name: { required: true, minlength: 5 },
        password: { required: true, minlength: 5 },
        phone: { required: true, minlength: 4 }
      },
      messages: {
        username: {
          required: "Enter username",
          minlength: "Minimum 5 characters"
        },
        name: {
          required: "Enter name",
          minlength: "Minimum 5 characters"
        },
        password: {
          required: "Enter password",
          minlength: "Minimum 5 characters"
        },
        phone: {
          required: "Enter contact number",
          minlength: "Minimum 4 characters"
        }
      },
      errorElement: 'div',
      errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
          $(placement).append(error);
        } else {
          error.insertAfter(element);
        }
      }
    });
  </script>
</body>
</html>

