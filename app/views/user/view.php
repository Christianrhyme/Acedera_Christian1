<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #ffffff;
            margin: 0;
            padding: 0;
            color: #000;
        }
        .top-bar {
            width: 90%;
            margin: 32px auto 0 auto;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }
        .create-btn {
            background: #007bff;
            color: #fff;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(0, 123, 255, 0.2);
            transition: background 0.2s;
        }
        .create-btn:hover {
            background: #0056b3;
        }
        h1 {
            text-align: center;
            margin: 40px 0 32px 0;
            font-size: 2.2rem;
            font-weight: 700;
            color: #007bff;
            letter-spacing: 1px;
        }
        .table-container {
            width: 95%;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 123, 255, 0.1);
            padding: 32px 0 24px 0;
        }
        table {
            width: 98%;
            margin: 0 auto;
            border-collapse: collapse;
            background: #ffffff;
            color: #000;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 123, 255, 0.1);
        }
        th, td {
            padding: 12px 16px;
            text-align: left;
        }
        th {
            background: #007bff;
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        tr:nth-child(odd) {
            background: #ffffff;
        }
        tr:hover {
            background: #e6f0ff;
        }
        .action-btn {
            text-decoration: none;
            padding: 7px 18px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 1rem;
            margin-right: 8px;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px rgba(0, 123, 255, 0.2);
            border: none;
            cursor: pointer;
        }
        .action-btn.edit {
            background: #007bff;
            color: #fff;
        }
        .action-btn.edit:hover {
            background: #0056b3;
        }
        .action-btn.delete {
            background: #dc3545;
            color: #fff;
        }
        .action-btn.delete:hover {
            background: #a71d2a;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <a href="<?= site_url('user/create'); ?>" class="create-btn">+ Create User</a>
    </div>
    <h1>User List</h1>
    <div class="table-container">
        <form action="<?=site_url('user');?>" method="get" class="col-sm-4 float-end d-flex">
		<?php
		$q = '';
		if(isset($_GET['q'])) {
			$q = $_GET['q'];
		}
		?>
        <input class="form-control me-2" name="q" type="text" placeholder="Search" value="<?=html_escape($q);?>">
        <button type="submit" class="btn btn-primary" type="button">Search</button>
	</form>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php foreach (html_escape($index) as $user): ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['username']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td>
                        <a href="<?= site_url('user/update/'.$user['id']); ?>" class="action-btn edit">Edit</a>
                        <a href="<?= site_url('user/delete/'.$user['id']); ?>" class="action-btn delete" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php 
        echo $page;?>
    </div>
</body>
</html>
