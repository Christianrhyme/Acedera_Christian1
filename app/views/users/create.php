<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create User</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
      background: #ffffff;
    }

    .create-user {
      width: 420px;
      padding: 40px;
      background: #f8fbff;
      border: 1px solid #dce7f7;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0, 60, 255, 0.1);
    }

    .create-user h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      margin-bottom: 25px;
      color: #0b56d0;
    }

    .inputBox {
      margin-bottom: 20px;
    }

    .inputBox input {
      width: 100%;
      padding: 14px 15px;
      font-size: 1em;
      color: #333;
      background: #ffffff;
      border: 1px solid #cfd9eb;
      border-radius: 8px;
      outline: none;
      transition: all 0.3s ease;
    }

    .inputBox input:focus {
      border-color: #0b56d0;
      box-shadow: 0 0 5px rgba(11, 86, 208, 0.3);
    }

    .inputBox input::placeholder {
      color: #888;
    }

    button {
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

    button:hover {
      background: #0948b0;
      box-shadow: 0 4px 12px rgba(11, 86, 208, 0.25);
    }

    .link-wrapper {
      text-align: center;
      margin-top: 15px;
    }

    .link-wrapper a {
      font-size: 0.95em;
      color: #0b56d0;
      text-decoration: none;
      transition: 0.3s;
    }

    .link-wrapper a:hover {
      text-decoration: underline;
      color: #063a8a;
    }
  </style>
</head>
<body>

  <div class="create-user">
    <h2>Create User</h2>
    <form method="POST" action="<?= site_url('users/create'); ?>">
      <div class="inputBox">
        <input type="text" name="username" placeholder="Username" required value="<?= isset($username) ? html_escape($username) : '' ?>">
      </div>

      <div class="inputBox">
        <input type="email" name="email" placeholder="Email" required value="<?= isset($email) ? html_escape($email) : '' ?>">
      </div>

      <button type="submit">Create User</button>
    </form>

    <div class="link-wrapper">
      <a href="<?= site_url('/users'); ?>">Return to Home</a>
    </div>
  </div>

</body>
</html>
