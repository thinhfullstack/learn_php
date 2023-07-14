<h2>User List</h2>

<?= $title ?>
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h3 class="display-5">User Infomation</h3>
    <a href="index.php?controller=user&action=create">Add new</a>
</div>

<table width="1200" border="1">
    <tr>
        <td>STT</td>   
        <td>Pesonal ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Password</td>
        <td>Avatar</td>
        <td>Gender</td>
        <td>Birthday</td>
        <td>Family</td>
        <td>Action</td>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user->id ?></td>
        <td><?= $user->personal_id ?></td>
        <td><?= $user->name ?></td>
        <td><?= $user->email ?></td>
        <td><?= $user->password ?></td>
        <td><?= $user->avatar ?></td>
        <td><?= $user->gender == 1 ? 'Nam' : 'Nữ' ?></td>
        <td><?= $user->birthday ?></td>
        <td><?= $user->family_id == 1 ? 'Hộ gia đình ' . $user->id : '' ?></td>
        <td>
            <a onclick="return confirm('bạn có muốn xoá không?')" href="index.php?controller=user&action=delete&id=<?= $user->id ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>