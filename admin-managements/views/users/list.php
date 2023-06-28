<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h2 class="display-4">User Management</h2>
    <p><a href="admin-management.php?module=user&action=create">Add new</a></p>
</div>

<div class="container">
    <div class="card-deck mb-3 text-center">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Avatar</th>
            <th scope="col">User name</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Gender</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($_SESSION['user'] as $user): ?>
          <tr>
            <th scope="row"><?= $user['id'] ?></th>
            <td><img style="width: 50px; height: 50px; border-radius: 50%" src="<?= $user['avatar'] ?>" alt=""></td>
            <td><?= $user['fullname'] ?></td>
            <td><?= $user['phone'] ?></td>
            <td><?= $user['address'] ?></td>
            <td><?= $user['gender'] == 1 ? 'Nam' : 'Nữ' ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['password'] ?></td>
            <td>
              <a href="admin-management.php?module=user&action=edit">Edit</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
</div>