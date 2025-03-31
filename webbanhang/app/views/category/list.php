<?php include 'app/views/shares/header.php'; ?>
<div class="container mt-4">
    <h2> Danh sách danh mục</h2>
    <a href="/webbanhang/Category/add" class="btn btn-success mb-3"> Thêm danh mục</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th> ID</th>
                <th> Tên danh mục</th>
                <th> Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?php echo htmlspecialchars($category->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <a href="/webbanhang/Category/edit/<?php echo $category->id; ?>" class="btn btn-warning btn-sm"> Sửa</a>
                        <a href="/webbanhang/Category/delete/<?php echo $category->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Xóa danh mục này?');">❌ Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include 'app/views/shares/footer.php'; ?>
