<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update User</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background-color: #f8fbff;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .form-card {
      width: 420px;
      padding: 40px;
      background: #ffffff;
      border: 1px solid #dce7f7;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0, 60, 255, 0.08);
      text-align: center;
    }

    .form-card h1 {
      color: #0b56d0;
      font-size: 2em;
      font-weight: 600;
      margin-bottom: 25px;
    }

    .form-group {
      margin-bottom: 18px;
      position: relative;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 12px 14px;
      font-size: 1em;
      color: #333;
      background: #fff;
      border: 1px solid #cfd9eb;
      border-radius: 8px;
      outline: none;
      transition: all 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus {
      border-color: #0b56d0;
      box-shadow: 0 0 6px rgba(11, 86, 208, 0.25);
    }

    .form-group input::placeholder {
      color: #888;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #0b56d0;
    }

    .btn-submit {
      width: 100%;
      padding: 14px;
      border: none;
      background: #0b56d0;
      color: #fff;
      font-size: 1.1em;
      font-weight: 600;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s ease;
      text-transform: uppercase;
    }

    .btn-submit:hover {
      background: #0948b0;
      box-shadow: 0 4px 12px rgba(11, 86, 208, 0.25);
    }

    .btn-return {
      display: block;
      margin-top: 20px;
      font-size: 0.95em;
      color: #0b56d0;
      text-decoration: none;
      transition: 0.3s;
    }

    .btn-return:hover {
      text-decoration: underline;
      color: #063a8a;
    }
  </style>
</head>
<body>
  <div class="form-card">
    <h1>Update User</h1>
    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST">
      <div class="form-group">
        <input type="text" name="username" value="<?=html_escape($user['username']);?>" placeholder="Username" required>
      </div>
      <div class="form-group">
        <input type="email" name="email" value="<?=html_escape($user['email']);?>" placeholder="Email" required>
      </div>

      <?php if(!empty($logged_in_user) && $logged_in_user['role'] === 'admin'): ?>
        <div class="form-group">
          <select name="role" required>
            <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
          </select>
        </div>

        <div class="form-group">
          <input type="password" placeholder="Password" name="password" id="password" required>
          <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
        </div>
      <?php endif; ?>

      <button type="submit" class="btn-submit">Update User</button>
    </form>
    <a href="<?=site_url('/users');?>" class="btn-return">Return to Home</a>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    if (togglePassword && password) {
      togglePassword.addEventListener('click', function () {
        const type = password.type === 'password' ? 'text' : 'password';
        password.type = type;
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }
  </script>
</body>
</html>
