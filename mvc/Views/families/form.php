<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h2><?= $title ?></h2> 
    <a href="index.php?controller=family">Back</a>
</div>

<div class="container">
    <form action="<?= $actionUrl ?>" method="POST">
        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Tên hộ gia đình:</label>
            <div class="col-sm-9">
                <input type="text" id="name" name="name" value="<?= $family->name ?? null ?>" class="form-control <?= $errMessage['name'] ? 'border border-danger' : '' ?>" 
                    placeholder="Nhập tên hộ gia đình của người dùng..."/>
                <?= $errMessage['name'] ?? null ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-sm-3 col-form-label">Địa chỉ:</label>
            <div class="col-sm-9">
                <input type="text" id="address" name="address" value="<?= $family->address ?? null ?>" class="form-control <?= $errMessage['address'] ? 'border border-danger' : '' ?>" 
                    placeholder="Nhập địa chỉ của hộ gia đình người dùng..."/>
                <?= $errMessage['address'] ?? null ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-3 col-form-label">Số điện thoại:</label>
            <div class="col-sm-9">
                <input type="text" id="phone" name="phone" value="<?= $family->phone ?? null ?>" class="form-control <?= $errMessage['phone'] ? 'border border-danger' : '' ?>" 
                    placeholder="Nhập số điện thoại hộ gia đình người dùng..."/>
                <?= $errMessage['phone'] ?? null ?>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
                <button type="submit" name="btn-save" class="btn btn-primary">Lưu lại</button> &nbsp;
                <button type="reset" class="btn btn-danger">Huỷ bỏ</button>
            </div>
        </div>
    </form>
</div>