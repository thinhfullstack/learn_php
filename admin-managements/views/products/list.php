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
            <th scope="col">Product name</th>
            <th scope="col">Price</th>
            <th scope="col">Feature Image</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <?php if(isset($_SESSION['products']) ?? null): ?>
            <?php $products = $_SESSION['products'] ?>
            <?php foreach($products as $product): ?>
              <tr>
                <th scope="row"><?= $product['id'] ?></th>
                <td><?= $product['name'] ?></td>
                <td><?= $product['price'] ?></td>
                <td>
                  <?php if (!empty($product['file'])): ?>
                      <img style="width: 50px; height: 80px;"
                          src="<?= $product['file'] ?>" alt="">
                  <?php endif; ?>
                </td>
                <td>
                  <a onclick="return confirm('Bạn có chắc muốn sửa sản phẩm <?= $product['name'] ?> này không?')" 
                     href="admin-management.php?module=product&action=edit&id=<?= $product['id'] ?>">Edit
                  </a>
                  <a onclick="return confirm('Bạn có chắc xoá sản phẩm <?= $product['name'] ?> này không?')" 
                     href="admin-management.php?module=product&action=delete&id=<?= $product['id'] ?>">Delete
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
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