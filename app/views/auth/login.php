<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | Blue Minimal</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
  />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-color: #f8faff;
    }

    .login {
      background: #fff;
      width: 380px;
      padding: 50px 40px;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0, 80, 200, 0.15);
      border: 1px solid #dbe3ff;
      animation: fadeIn 0.8s ease;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .login h2 {
      text-align: center;
      color: #1e40af;
      font-weight: 600;
      font-size: 2em;
      margin-bottom: 25px;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
    }

    .inputBox {
      position: relative;
      margin-bottom: 25px;
    }

    .inputBox input {
      width: 100%;
      padding: 14px 45px 14px 45px; /* more space for icons */
      font-size: 1em;
      color: #1e3a8a;
      background: #f1f5ff;
      border: 1px solid #c7d2fe;
      border-radius: 8px;
      outline: none;
      transition: all 0.3s ease;
    }

    .inputBox input:focus {
      border-color: #2563eb;
      background: #e0ecff;
    }

    .inputBox input::placeholder {
      color: #9ca3af;
    }

    .inputBox i {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      color: #2563eb;
      font-size: 1.1em;
    }

    .inputBox .icon-left {
      left: 15px;
    }

    .toggle-password {
      right: 15px;
      cursor: pointer;
      opacity: 0.8;
    }

    .toggle-password:hover {
      opacity: 1;
    }

    .login button {
      width: 100%;
      padding: 14px;
      border: none;
      background: #2563eb;
      color: #fff;
      font-size: 1.1em;
      font-weight: 600;
      border-radius: 8px;
      cursor: pointer;
      text-transform: uppercase;
      transition: 0.3s ease;
      box-shadow: 0 3px 8px rgba(37, 99, 235, 0.3);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }

    .login button:hover {
      background: #1d4ed8;
      box-shadow: 0 5px 12px rgba(37, 99, 235, 0.4);
      transform: translateY(-2px);
    }

    .error-box {
      background: #fee2e2;
      color: #b91c1c;
      padding: 10px;
      border-radius: 6px;
      margin-bottom: 15px;
      text-align: center;
      font-size: 0.9em;
      border: 1px solid #fecaca;
    }

    .group {
      text-align: center;
      margin-top: 20px;
    }

    .group a {
      font-size: 0.95em;
      color: #2563eb;
      text-decoration: none;
      transition: 0.3s;
    }

    .group a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login">
    <h2><i class="fa-solid fa-right-to-bracket"></i> Login</h2>

    <?php if (!empty($error)): ?>
      <div class="error-box">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('auth/login') ?>">
      <div class="inputBox">
        <i class="fa-solid fa-user icon-left"></i>
        <input type="text" placeholder="Username" name="username" required />
      </div>

      <div class="inputBox">
        <i class="fa-solid fa-lock icon-left"></i>
        <input type="password" placeholder="Password" name="password" id="password" required />
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <button type="submit"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
    </form>

    <div class="group">
      <p style="font-size: 0.9em;">
        Don't have an account?
        <a href="<?= site_url('auth/register'); ?>">Register here</a>
      </p>
    </div>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>
