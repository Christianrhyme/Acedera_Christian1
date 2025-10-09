<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register | Blue Minimal</title>
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

    .register {
      background: #fff;
      width: 420px;
      padding: 45px 40px;
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

    .register h2 {
      text-align: center;
      color: #1e40af;
      font-weight: 600;
      font-size: 2em;
      margin-bottom: 25px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }

    .inputBox {
      position: relative;
      margin-bottom: 20px;
    }

    .inputBox input,
    .inputBox select {
      width: 100%;
      padding: 14px 45px 14px 45px;
      font-size: 1em;
      color: #1e3a8a;
      background: #f1f5ff;
      border: 1px solid #c7d2fe;
      border-radius: 8px;
      outline: none;
      transition: all 0.3s ease;
    }

    .inputBox input:focus,
    .inputBox select:focus {
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

    .icon-left {
      left: 15px;
    }

    .toggle-password {
      right: 15px;
      cursor: pointer;
      opacity: 0.8;
      transition: 0.3s;
    }

    .toggle-password:hover {
      opacity: 1;
    }

    .register button {
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

    .register button:hover {
      background: #1d4ed8;
      box-shadow: 0 5px 12px rgba(37, 99, 235, 0.4);
      transform: translateY(-2px);
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
  <div class="register">
    <h2><i class="fa-solid fa-user-plus"></i> Create Account</h2>

    <form method="POST" action="<?= site_url('auth/register'); ?>">
      <div class="inputBox">
        <i class="fa-solid fa-user icon-left"></i>
        <input type="text" name="username" placeholder="Username" required />
      </div>

      <div class="inputBox">
        <i class="fa-solid fa-envelope icon-left"></i>
        <input type="email" name="email" placeholder="Email" required />
      </div>

      <div class="inputBox">
        <i class="fa-solid fa-lock icon-left"></i>
        <input type="password" id="password" name="password" placeholder="Password" required />
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <div class="inputBox">
        <i class="fa-solid fa-lock icon-left"></i>
        <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required />
        <i class="fa-solid fa-eye toggle-password" id="toggleConfirmPassword"></i>
      </div>

      <div class="inputBox">
        <i class="fa-solid fa-user-gear icon-left"></i>
        <select name="role" required>
          <option value="user" selected>User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <button type="submit"><i class="fa-solid fa-user-plus"></i> Register</button>
    </form>

    <div class="group">
      <p>Already have an account? <a href="<?= site_url('auth/login'); ?>">Login here</a></p>
    </div>
  </div>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener("click", function () {
        const type = input.getAttribute("type") === "password" ? "text" : "password";
        input.setAttribute("type", type);
        this.classList.toggle("fa-eye");
        this.classList.toggle("fa-eye-slash");
      });
    }

    toggleVisibility("togglePassword", "password");
    toggleVisibility("toggleConfirmPassword", "confirmPassword");
  </script>
</body>
</html>
