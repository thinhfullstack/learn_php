<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h2 class="display-4">User Management</h2>
    <p><a href="index.php?module=user&action=create">Add new</a></p>
  </div>

<div class="container-sm">
    <div class="card-deck mb-3 text-center">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Avatar</th>
            <th scope="col">CCCD</th>
            <th scope="col">Họ và tên</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Năm sinh</th>
            <th scope="col">Giới tính</th>
            <th scope="col">Hộ gia đình</th>
            <th scope="col">Hành động</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
                <tr>
                    <th scope="row"><?= $user->id ?></th>
                    <td><?= $user->avatar ?></td>
                    <td><?= $user->personal_id ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->password ?></td>
                    <td><?= $user->birthday ?></td>
                    <td><?= $userModel->getGender($user->gender) ?></td>
                    <td><?= $userModel->getFamily($user->family_id) ?></td>
                    <td>
                        <a onclick="return confirm('Bạn có thực sự muốn sửa <?= $user->name ?> không?')" 
                            href="index.php?module=user&action=edit&id=<?= $user->id ?>">Sửa
                        </a>
                        <a onclick="return confirm('Bạn có thực sự muốn xoá <?= $user->name ?> không?')" 
                            href="index.php?module=user&action=delete&id=<?= $user->id ?>">Xoá
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
    </div>
</div>