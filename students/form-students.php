<?php
    require_once("./student-array.php");

    // Xử lý tìm kiếm
    $gender = $_GET['gender'] ?? null;
    $keyword = $_GET['keyword'] ?? null;
    $checkedNam = $gender == 1 ? 'checked' : '';
    $checkedNu = $gender == 2 ? 'checked' : '';
    $result = $students;

    if (!empty($_GET)) {
        if (!empty($gender) || !empty($keyword)) {
            $result = [];

            foreach ($students as $student) {
                $isMatchKeyword = false;
                $isMatchGender = false;

                // Xử lý tìm kiếm thông tin theo từng sinh viên theo keyword
                if (!empty($keyword)) {
                    $valueSearchs = [
                        $student['name'],
                        $student['address'],
                        $student['email']
                    ];

                    if (in_array($keyword, $valueSearchs)) {
                        $isMatchKeyword = true;
                    }
                } else {
                    $isMatchKeyword = true;
                }

                // Tìm theo giới tính
                if (!empty($gender)) {
                    if ($student['gender'] == $gender) {
                        $isMatchGender = true;
                    }
                } else {
                    $isMatchGender = true;
                }

                if ($isMatchKeyword && $isMatchGender) {
                    $result[] = $student;
                }
            }
        }
    }
?>

<div class="container">
    <div class="form-search">
        <form action="" method="GET">
            <input type="text" name="keyword" size="70" placeholder="Tìm theo tên, email hoặc địa chỉ" value="<?= $keyword ?>" />
            <label><input type="radio" name="gender" value="1" <?= $checkedNam ?> />Nam</label>
            <label><input type="radio" name="gender" value="2" <?= $checkedNu ?> />Nữ</label>
            <button>Tìm kiếm</button>
        </form>
    </div>

    <div class="total-result" style="text-align: right; width: 800px;">Tổng số sinh viên <?= count($result) ?></div>
    <table width="800" border="1" cellspacing="0" cellpadding="0">
        <tr>
            <th>Id</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Hành Động</th>
        </tr>

        <?php foreach ($result as $student): ?>
            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= $student['name'] ?></td>
                <td><?= $student['email'] ?></td>
                <td><?= $student['gender'] == 1 ? 'Nam' : 'Nữ' ?></td>
                <td><?= $student['address'] ?></td>
                <td>
                    <?php
                        $detailLink = 'students.php?id=' . $student['id'] . '&keyword=' . $keyword . '&gender=' . $gender;
                    ?>
                    <a href="<?= $detailLink ?>">Xem chi tiết</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
