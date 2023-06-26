<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h2 class="display-4">Product Management</h2>
    <p><a href="admin-management.php?module=product&action=create">Add new</a></p>
</div>

<div class="container">
    <div class="card-deck mb-3 text-center">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Họ và tên</th>
            <th scope="col">Email</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Hành động</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $totalStudents = 5000; // Tổng có 5000 sinh viên
          $limit = 10; // Giới hạn 10 sinh viên của 1 trang
          $totalPage = $totalStudents / $limit; // Tổng các trang (page)
          $currentPage = $_GET['page'] ?? 1; // Kiểm tra xem page có tồn tại không, nếu không thì sẽ bắt đầu trang 1
          $students = ($currentPage - 1) * $limit; // Công thức tính số sinh viên của 1 trang
          $students += 1; // index tiếp theo của sinh viên của trang mới (1->10, 11->20, 21->30, ...)
          $currentPageLimit = $currentPage * $limit; // Số sinh viên của 1 trang khi ta chọn 1 trang khác nhau 
        ?>
          <?php for($students; $students <= $currentPageLimit; $students++): ?>
            <tr>
              <th scope="row"><?= $students ?></th>
              <td><?= "Tên sinh viên " . $students ?></td>
              <td><?= "sinhvien_" . $students . "@gmail.com"?></td>
              <td><?= "Địa chỉ " . $students ?></td>
              <td>
                <a href="admin-management.php?module=product&action=edit">Sửa</a>
                <a href="admin-management.php?module=product&action=delete">Xoá</a>
              </td>
            </tr>
          <?php endfor; ?>
        </tbody>
      </table>
      <nav aria-label="Page navigation example" class="d-flex flex-wrap">
        <?php for($page = 1; $page <= $totalPage; $page++): ?>
        <?php $active = $page == $currentPage ? 'text-danger' : '' ?>
        <ul class="pagination">
          <li class="page-item"><a class="page-link <?= $active ?>" href="admin-management.php?module=product&page=<?= $page ?>"><?= $page ?></a></li>
        </ul>
        <?php endfor; ?>
      </nav>
    </div>
</div>