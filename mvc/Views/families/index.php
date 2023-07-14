<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h2><?= $title ?></h2>
    <a href="index.php?controller=family&action=create">Add new</a>
</div>

<table width="800" border="1">
    <tr>
        <th>STT</th>   
        <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>
    <?php foreach ($families as $family): ?>
        <tr>
            <td><?= $family->id ?></td>
            <td><?= $family->name ?></td>
            <td><?= $family->address ?></td>
            <td><?= $family->phone ?></td>
            <td>
                <a onclick="return confirm('bạn có muốn sửa <?= $family->name ?> không?')" href="index.php?controller=family&action=edit&id=<?= $family->id ?>">Edit</a>
                <a onclick="return confirm('bạn có muốn xoá <?= $family->name ?> không?')" href="index.php?controller=family&action=delete&id=<?= $family->id ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>