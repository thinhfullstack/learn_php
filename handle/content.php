<?php if ($content): ?>
    <?= $content ?>
    <script>
        window.onload = function() {
            alert('Đã gửi được đơn hàng đi thành công.');
        };
    </script>
    <?php else: ?>
        Chưa có đơn hàng nào được gửi đi!
<?php endif; ?>