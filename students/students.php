<?php
    require_once("./student-array.php");

    $studentId = $_GET['id'] ?? null;
    $checkedNam = $gender == 1 ? 'checked' : '';
    $checkedNu = $gender == 2 ? 'checked' : '';
    $gender = $_GET['gender'] ?? null;
    $keyword = $_GET['keyword'] ?? null;

    if (empty($studentId)) {
        echo '<p>Không tìm thấy sinh viên</div>';
    } else {
        $studentInfo = null;

        foreach ($students as $student) {
            if ($student['id'] == $studentId) {
                $studentInfo = $student;
            }
        }

        if ($studentInfo) {
            echo '<h4>Thông tin sinh viên</h4>';
            echo '<ul>';
            echo '<li>Họ và tên: ' . $studentInfo['name']. '</li>';
            echo '<li>Email: ' . $studentInfo['email'] . '</li>';
            echo '<li>Địa chỉ: ' . $studentInfo['address'] . '</li>';
            echo '</ul>';
        } else {
            echo '<p>Không tìm thấy sinh viên</div>';
        }
    }

    echo "<p><a href='form-students.php?keyword=" . $keyword . "&gender=" . $gender . "'>Quay lại danh sách</a></p>";

?>
