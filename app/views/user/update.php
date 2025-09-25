<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User/update</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #000;
        }
        .form-container {
            background: #ffffff;
            color: #000;
            padding: 32px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 16px rgba(0, 123, 255, 0.1);
            width: 370px;
        }
        .form-container h1 {
            text-align: center;
            margin-bottom: 24px;
            font-size: 2rem;
            color: #007bff;
            font-weight: 700;
            letter-spacing: 1px;
        }
        label {
            font-weight: 600;
            display: block;
            margin-top: 16px;
            margin-bottom: 6px;
            color: #007bff;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #007bff;
            border-radius: 8px;
            outline: none;
            background: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 123, 255, 0.06);
            transition: border 0.2s, box-shadow 0.2s;
            font-size: 15px;
        }
        input[type="text"]:focus, input[type="email"]:focus {
            border: 1.5px solid #0056b3;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
        }
        input[type="submit"] {
            margin-top: 28px;
            width: 100%;
            padding: 13px;
            background: #007bff;
            color: #fff;
            font-size: 1.1rem;
            font-weight: 700;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0, 123, 255, 0.1);
            transition: background 0.2s, box-shadow 0.2s;
        }
        input[type="submit"]:hover {
            background: #0056b3;
            box-shadow: 0 4px 16px rgba(0, 123, 255, 0.2);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Update User</h1>
        <form method="post" action="<?= site_url('user/update/'.$user['id']) ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?= html_escape($user['username']) ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= html_escape($user['email']) ?>" required>

            <input type="submit" value="Update User">
        </form>
    </div>
</body>
</html>
