<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h3 class="display-5">Login System</h3>
</div>
<div>
    <form action="admin-management.php?module=auth&action=login" method="POST">
        <div class="form-group row">
        <label for="inputPassword" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
            <input type="text" name="email" class="form-control" placeholder="Nhập email của bạn..." />
            <?= $errEmail ? "<div class='error'>$errEmail</div>" : '' ?>
        </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu của bạn..." />
                <?= $errPassWord ? "<div class='error'>$errPassWord</div>" : '' ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
            <?= $errMessage ? "<div class='error'>$errMessage</div>" : '' ?>
                <button type="submit" name="btn-login" class="btn btn-primary">Login</button> &nbsp;
            </div>
        </div>
    </form>
</div>
