<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h3 class="display-5">User Infomation</h3>
        <a href="admin-management.php?module=user&action=list">Back</a>
    </div>
<div class="container">
    <form action="admin-management.php?module=user&action=create" method="POST" enctype="multipart/form-data" >
        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email:</label>
            <div class="col-sm-9">
                <input type="text" id="email" name="email" class="form-control <?= $errEmail ? 'border-danger' : '' ?>" />
                <?= $errEmail ? "<div class='error'>$errEmail</div>" : '' ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password:</label>
            <div class="col-sm-9">
                <input type="password" id="password" name="pwd" class="form-control <?= $errPWD ? 'border-danger' : '' ?>" />
                <?= $errPWD ? "<div class='error'>$errPWD</div>" : '' ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="fullname" class="col-sm-3 col-form-label">FullName:</label>
            <div class="col-sm-9">
                <input type="text" id="fullname" name="fullname" class="form-control <?= $errFullName ? 'border-danger' : '' ?>" />
                <?= $errFullName ? "<div class='error'>$errFullName</div>" : '' ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-3 col-form-label">Phone:</label>
            <div class="col-sm-9">
                <input type="text" id="phone" name="phone" class="form-control <?= $errPhone ? 'border-danger' : '' ?>" rows="3" />
                <?= $errPhone ? "<div class='error'>$errPhone</div>" : '' ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-sm-3 col-form-label">Address:</label>
            <div class="col-sm-9">
                <input type="text" id="address" name="address" class="form-control <?= $errAddress ? 'border-danger' : '' ?>" rows="3" />
                <?= $errAddress ? "<div class='error'>$errAddress</div>" : '' ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="gender" class="col-sm-3 col-form-label">Gender:</label>
            <div class="col-sm-9">
                <label for="male">
                    <input type="radio" id="male" name="gender" value="1" <?= $gender == 1 ? 'checked' : '' ?> rows="3" /> Nam
                </label>
                <label for="famale">
                    <input type="radio" id="famale" name="gender" value="2" <?= $gender == 2 ? 'checked' : '' ?> rows="3" /> Nữ
                </label>
                <?= $errGender ? "<div class='error'>$errGender</div>" : '' ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="avatar" class="col-sm-3 col-form-label">Avatar:</label>
            <div class="col-sm-9">
                <input type="file" id="file" name="file" class="form-control" rows="3" />
                <?= $errFile ? "<div class='error'>$errFile</div>" : '' ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="save" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
                <button type="submit" name="btn-save" class="btn btn-primary">Save</button> &nbsp;
                <button type="reset" name="btn-reset" class="btn btn-danger">Cancel</button>
            </div>
        </div>
    </form>
</div>
