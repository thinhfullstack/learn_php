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
            <?php foreach($users as $userItem): ?>
                <tr>
                    <th scope="row"><?= $userItem->id ?></th>
                    <td><?= $userItem->avatar ?></td>
                    <td><?= $userItem->personal_id ?></td>
                    <td><?= $userItem->name ?></td>
                    <td><?= $userItem->email ?></td>
                    <td><?= $userItem->password ?></td>
                    <td><?= $userItem->birthday ?></td>
                    <td><?= $userObject->getGender($userItem->gender) ?></td>
                    <td><?= $userObject->getFamily($userItem->family_id) ?></td>
                    <td>
                        <a onclick="return confirm('Bạn có thực sự muốn sửa <?= $userItem->name ?> không?')" 
                            href="index.php?module=user&action=edit&id=<?= $userItem->id ?>">Sửa
                        </a>
                        <a onclick="return confirm('Bạn có thực sự muốn xoá <?= $userItem->name ?> không?')" 
                            href="index.php?module=user&action=delete&id=<?= $userItem->id ?>">Xoá
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
    </div>
</div>