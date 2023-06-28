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
        <?php
          $totalUser = count($_SESSION['users']); // Tổng số người dùng
          $userLimit = 5; // Số lượng người dùng hiển thị trên mỗi trang
          $totalPage = ceil($totalUser / $userLimit); // Tổng số trang, làm tròn lên
          $currentPage = $_GET['page'] ?? 1; // Trang hiện tại, mặc định là 1

          $startIndex = ($currentPage - 1) * $userLimit; // Vị trí bắt đầu của danh sách người dùng trên trang hiện tại
          $endIndex = $startIndex + $userLimit - 1; // Vị trí kết thúc của danh sách người dùng trên trang hiện tại

          $users = $_SESSION['users']; // Danh sách người dùng
          $usersPage = array_slice($users, $startIndex, $userLimit); // Lấy danh sách người dùng trên trang hiện tại

          if (isset($_SESSION['users']) && count($usersPage) > 0) {
              foreach ($usersPage as $user) {
                  // Hiển thị thông tin người dùng
                  ?>
                  <tr>
                      <th scope="row"><?= $user['id'] ?></th>
                      <td>
                          <?php if (!empty($user['file'])): ?>
                              <img style="width: 50px; height: 50px; border-radius: 50%;"
                                  src="<?= $user['file'] ?>" alt="">
                          <?php endif; ?>
                      </td>
                      <td><?= $user['fullname'] ?></td>
                      <td><?= $user['phone'] ?></td>
                      <td><?= $user['address'] ?></td>
                      <td><?= $user['gender'] == 1 ? 'Nam' : 'Nữ' ?></td>
                      <td><?= $user['email'] ?></td>
                      <td><?= $user['password'] ?></td>
                      <td>
                          <a onclick="return confirm('Bạn có thực sự muốn sửa <?= $user['fullname'] ?> không?')"
                            href="admin-management.php?module=user&action=edit&id=<?= $user['id'] ?>">Sửa</a>
                          <a onclick="return confirm('Bạn có thực sự muốn xoá không?')"
                            href="admin-management.php?module=user&action=delete&id=<?= $user['id'] ?>">Xoá</a>
                      </td>
                  </tr>
                  <?php
              }
          } else {
              echo "Không có người dùng.";
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
<nav aria-label="Page navigation example" class="d-flex flex-wrap">
    <ul class="pagination">
        <?php for ($page = 1; $page <= $totalPage; $page++): ?>
            <li class="page-item <?= $page == $currentPage ? 'text-danger' : '' ?>">
                <a class="page-link" href="admin-management.php?module=user&page=<?= $page ?>"><?= $page ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>
