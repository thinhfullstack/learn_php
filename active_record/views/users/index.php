<h3>Danh sach User</h3>

<table border="1" width="800">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>CCCD</th>
        <th>Email</th>
        <th>Birthday</th>
        <th>Gender</th>
    </tr>

    <?php foreach ($users as $userItem): ?>
    <tr>
        <td><?= $userItem->id ?></td>
        <td><?= $userItem->name ?></td>
        <td><?= $userItem->personal_id ?></td>
        <td><?= $userItem->email ?></td>
        <td><?= $userItem->birthday ?></td>
        <td><?= $userModel->getGender($userItem->gender) ?></td>
    </tr>
    <?php endforeach; ?>
</table>