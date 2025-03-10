<?php include 'app/views/shares/header.php'; ?>

<div class="container my-4">
    <!-- Banner đẹp ở đầu trang -->
    <div class="mb-4">
        <div class="card border-0 shadow-lg position-relative overflow-hidden" style="border-radius: 20px;">
            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" 
                 alt="Banner" 
                 class="card-img-top" 
                 style="object-fit: cover; height: 300px; filter: brightness(70%);">
            <div class="card-img-overlay d-flex align-items-center justify-content-center text-center text-white">
                <div>
                    <h1 class="display-4 fw-bold mb-3">Chào mừng đến với HoangNamMobile</h1>
                    <p class="fs-4 mb-4">Khám phá sản phẩm chất lượng với giá tốt nhất!</p>
                    <a href="/webbanhang/Product/list" class="btn btn-primary btn-lg shadow-sm" 
                       style="background: linear-gradient(45deg, #007bff, #00b4db); border: none;">
                        <i class="bi bi-shop me-2"></i>Mua sắm ngay
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tiêu đề và nút thêm sản phẩm -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Danh sách sản phẩm</h1>
        <a href="/webbanhang/Product/add" class="btn btn-success">Thêm sản phẩm mới</a>
    </div>

    <!-- Thanh tìm kiếm và danh mục -->
    <div class="mb-4">
        <form action="/webbanhang/Product/search" method="GET" class="d-flex gap-2 align-items-center flex-wrap">
            <!-- Thanh tìm kiếm -->
            <div class="input-group shadow-sm" style="max-width: 400px;">
                <span class="input-group-text bg-white border-0">
                    <i class="bi bi-search text-muted"></i>
                </span>
                <input type="text" 
                       name="query" 
                       class="form-control border-0" 
                       placeholder="Tìm kiếm sản phẩm..." 
                       aria-label="Tìm kiếm"
                       value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">
            </div>

            <!-- Danh mục -->
            <div class="dropdown shadow-sm">
                <button class="btn btn-outline-primary dropdown-toggle" 
                        type="button" 
                        id="categoryDropdown" 
                        data-bs-toggle="dropdown" 
                        aria-expanded="false"
                        style="min-width: 200px;">
                    <i class="bi bi-filter me-1"></i>
                    <?php 
                    $selected_category = isset($_GET['category_id']) ? $_GET['category_id'] : '';
                    $selected_name = 'Tất cả danh mục';
                    if ($selected_category && isset($categories)) {
                        foreach ($categories as $cat) {
                            if ($cat->id == $selected_category) {
                                $selected_name = $cat->name;
                                break;
                            }
                        }
                    }
                    echo htmlspecialchars($selected_name);
                    ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                    <li><a class="dropdown-item" href="/webbanhang/Product/list">Tất cả danh mục</a></li>
                    <?php 
                    if (isset($categories) && !empty($categories)) {
                        $displayed_categories = []; // Mảng để theo dõi danh mục đã hiển thị
                        foreach ($categories as $category) {
                            if (!in_array($category->id, $displayed_categories)) {
                                $displayed_categories[] = $category->id;
                    ?>
                            <li>
                                <a class="dropdown-item" 
                                   href="/webbanhang/Product/search?category_id=<?php echo $category->id; ?><?php echo isset($_GET['query']) ? '&query=' . urlencode($_GET['query']) : ''; ?>">
                                    <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                                </a>
                            </li>
                    <?php 
                            }
                        }
                    } else {
                    ?>
                        <li><a class="dropdown-item disabled">Không có danh mục</a></li>
                    <?php } ?>
                </ul>
            </div>

            <!-- Nút tìm kiếm -->
            <button type="submit" class="btn btn-primary shadow-sm" 
                    style="background: linear-gradient(45deg, #007bff, #00b4db); border: none;">
                <i class="bi bi-search me-2"></i>Tìm
            </button>
        </form>
    </div>

    <!-- Danh sách sản phẩm -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php foreach ($products as $product): ?>
            <div class="col">
                <div class="card h-100">
                    <?php if ($product->image): ?>
                        <img src="/webbanhang/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" 
                             class="card-img-top" 
                             alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>"
                             style="object-fit: cover; height: 200px;">
                    <?php endif; ?>
                    
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="/webbanhang/Product/show/<?php echo $product->id; ?>">
                                <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </h5>
                        <p class="card-text text-muted">
                            <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                        <p class="card-text fw-bold text-success">
                            Giá: <?php echo number_format($product->price, 0, ',', '.'); ?> VND
                        </p>
                        <p class="card-text">
                            <small class="text-muted">
                                Danh mục: <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?>
                            </small>
                        </p>
                    </div>
                    
                    <div class="card-footer bg-white border-0">
                        <div class="d-flex gap-2">
                            <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" 
                               class="btn btn-outline-warning btn-sm flex-grow-1 shadow-sm">
                                <i class="bi bi-pencil-square me-1"></i>Sửa
                            </a>
                            <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>" 
                               class="btn btn-outline-danger btn-sm flex-grow-1 shadow-sm"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                <i class="bi bi-trash3 me-1"></i>Xóa
                            </a>
                            <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>" 
                               class="btn btn-primary btn-sm flex-grow-1 shadow-sm"
                               style="background: linear-gradient(45deg, #007bff, #00b4db); border: none;">
                                <i class="bi bi-cart-plus me-1"></i>Thêm
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
    .card {
        transition: transform 0.2s;
        border-radius: 10px;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .btn-outline-warning, .btn-outline-danger {
        transition: all 0.3s ease;
    }
    .btn-outline-warning:hover {
        background-color: #ffc107;
        color: #fff;
        box-shadow: 0 4px 10px rgba(255,193,7,0.3);
    }
    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: #fff;
        box-shadow: 0 4px 10px rgba(220,53,69,0.3);
    }
    .btn-primary {
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        background: linear-gradient(45deg, #0056b3, #0086b3) !important;
        box-shadow: 0 4px 10px rgba(0,123,255,0.3);
        transform: translateY(-2px);
    }
    /* Thanh tìm kiếm và danh mục */
    .input-group {
        border-radius: 25px;
        overflow: hidden;
    }
    .form-control:focus {
        box-shadow: none;
        border-color: #007bff;
    }
    .input-group-text {
        border-radius: 25px 0 0 25px;
    }
    .btn-outline-primary {
        border-color: #007bff;
        color: #007bff;
        transition: all 0.3s ease;
    }
    .btn-outline-primary:hover {
        background-color: #007bff;
        color: #fff;
        box-shadow: 0 4px 10px rgba(0,123,255,0.3);
    }
    .dropdown-menu {
        max-height: 300px;
        overflow-y: auto;
        border-radius: 10px;
    }
    .dropdown-item:hover {
        background-color: #f8f9fa;
    }
    /* Banner */
    .card-img-overlay h1 {
        font-family: 'Poppins', sans-serif;
        font-size: 2.5rem;
        font-weight: bold;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        letter-spacing: 1px;
    }

    .card-img-overlay p {
        font-size: 1.2rem;
        font-weight: 400;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
    }
</style>

<?php include 'app/views/shares/footer.php'; ?>