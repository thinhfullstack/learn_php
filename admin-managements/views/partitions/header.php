<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Vue Mini Project</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="admin-management.php?module=product">Product management</a>
        <a class="p-2 text-dark" href="admin-management.php?module=category">Category management</a>
        <a class="p-2 text-dark" href="admin-management.php?module=user">User management</a>
    </nav>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $_SESSION['user']['name'] ?? null ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="#">Setting</a>
            <?php if(!empty($_SESSION['user'])): ?>
                <a class="dropdown-item" href="admin-management.php?module=auth&action=logout">Logout</a>
            <?php endif; ?>
        </div>
    </div>
</div>