<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Students Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      min-height: 100vh;
      background: #f4f8ff;
      color: #333;
      overflow-x: hidden;
    }

    .dashboard-container {
      max-width: 1200px;
      margin: 80px auto;
      padding: 40px;
      background: #ffffff;
      border-radius: 15px;
      box-shadow: 0 4px 25px rgba(0, 0, 0, 0.08);
    }

    .dashboard-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
    }

    .dashboard-header h2 {
      font-size: 2em;
      font-weight: 700;
      color: #0b56d0;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .logout-btn {
      padding: 10px 18px;
      border: none;
      border-radius: 8px;
      background: #0b56d0;
      color: #fff;
      font-weight: 600;
      transition: 0.3s;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .logout-btn:hover {
      background: #0948b0;
      box-shadow: 0 0 12px rgba(11, 86, 208, 0.3);
    }

    .user-status {
      background: #e9f2ff;
      border: 1px solid #c8ddff;
      padding: 12px 18px;
      border-radius: 10px;
      margin-bottom: 25px;
      color: #0b56d0;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .user-status.error {
      background: #ffe9ec;
      border-color: #ffc5cc;
      color: #d22d3d;
    }

    .table-card {
      background: #f8fbff;
      border-radius: 15px;
      padding: 25px;
      box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
    }

    table {
      width: 100%;
      text-align: center;
      border-collapse: collapse;
      color: #333;
    }

    th {
      background: #0b56d0;
      color: #fff;
      text-transform: uppercase;
      font-weight: 600;
      padding: 12px;
      border: none;
    }

    td {
      background: #ffffff;
      padding: 10px;
      border-bottom: 1px solid #dce3f5;
    }

    tr:hover td {
      background: #f0f5ff;
    }

    a.btn-action {
      padding: 6px 14px;
      border-radius: 6px;
      font-size: 13px;
      text-decoration: none;
      color: #fff;
      font-weight: 500;
      transition: 0.3s;
      margin: 0 2px;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    a.btn-update {
      background: #0b56d0;
    }
    a.btn-update:hover {
      background: #0948b0;
    }

    a.btn-delete {
      background: #d22d3d;
    }
    a.btn-delete:hover {
      background: #b31f2e;
    }

    .btn-create {
      display: block;
      width: 100%;
      padding: 14px;
      border: none;
      background: #0b56d0;
      color: #fff;
      font-size: 1.1em;
      border-radius: 10px;
      font-weight: 600;
      transition: 0.3s;
      text-align: center;
      margin-top: 25px;
      text-transform: uppercase;
      text-decoration: none;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 8px;
    }

    .btn-create:hover {
      background: #0948b0;
      box-shadow: 0 4px 12px rgba(11, 86, 208, 0.3);
    }

    .search-form input {
      border-radius: 8px;
      border: 1px solid #b8c8ec;
      background: #ffffff;
      color: #333;
    }

    .search-form input:focus {
      outline: none;
      border-color: #0b56d0;
      box-shadow: 0 0 8px rgba(11, 86, 208, 0.2);
    }

    .search-form button {
      background: #0b56d0;
      border: none;
      color: #fff;
      font-weight: 600;
      border-radius: 8px;
      padding: 8px 16px;
      transition: 0.3s;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .search-form button:hover {
      background: #0948b0;
    }

    .pagination-container {
      display: flex;
      justify-content: center;
      margin-top: 25px;
    }
  </style>
</head>
<body>

  <div class="dashboard-container">
    <div class="dashboard-header">
      <h2><i class="fa-solid fa-user-graduate"></i> <?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?></h2>
      <a href="<?= site_url('auth/logout'); ?>">
        <button class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
      </a>
    </div>

    <?php if(!empty($logged_in_user)): ?>
      <div class="user-status">
        <i class="fa-solid fa-circle-user"></i>
        <strong>Welcome:</strong> <?= html_escape($logged_in_user['username']); ?>
      </div>
    <?php else: ?>
      <div class="user-status error">
        <i class="fa-solid fa-triangle-exclamation"></i>
        Logged in user not found
      </div>
    <?php endif; ?>

    <div class="table-card">
      <form action="<?= site_url('users'); ?>" method="get" class="d-flex mb-3 search-form">
        <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
        <input name="q" type="text" class="form-control me-2" placeholder="Search user..." value="<?= html_escape($q); ?>">
        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
      </form>

      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <tr>
            <th><i class="fa-solid fa-id-badge"></i> ID</th>
            <th><i class="fa-solid fa-user"></i> Name</th>
            <th><i class="fa-solid fa-envelope"></i> Email</th>
            <?php if ($logged_in_user['role'] === 'admin'): ?>
              <th><i class="fa-solid fa-lock"></i> Password</th>
              <th><i class="fa-solid fa-user-shield"></i> Role</th>
            <?php endif; ?>
            <th><i class="fa-solid fa-gear"></i> Action</th>
          </tr>
          <?php foreach ($user as $user): ?>
          <tr>
            <td><?= html_escape($user['id']); ?></td>
            <td><?= html_escape($user['username']); ?></td>
            <td><?= html_escape($user['email']); ?></td>
            <?php if ($logged_in_user['role'] === 'admin'): ?>
              <td>*******</td>
              <td><?= html_escape($user['role']); ?></td>
            <?php endif; ?>
            <td>
              <a href="<?= site_url('/users/update/'.$user['id']); ?>" class="btn-action btn-update">
                <i class="fa-solid fa-pen-to-square"></i> Update
              </a>
              <a href="<?= site_url('/users/delete/'.$user['id']); ?>" class="btn-action btn-delete">
                <i class="fa-solid fa-trash"></i> Delete
              </a>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>

      <div class="pagination-container">
        <?php echo $page; ?>
      </div>
    </div>

    <a href="<?= site_url('users/create'); ?>" class="btn-create">
      <i class="fa-solid fa-user-plus"></i> Create New User
    </a>
  </div>
</body>
</html>
