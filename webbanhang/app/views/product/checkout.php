<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <div class="card border-0 shadow-lg">
        <div class="card-header bg-gradient-primary text-white rounded-top">
            <h1 class="mb-0 fw-bold">Thanh toán</h1>
        </div>
        
        <div class="card-body p-4">
            <form method="POST" action="/webbanhang/Product/processCheckout">
                <div class="row g-3">
                    <!-- Họ tên -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Họ tên</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="name" 
                                   name="name" 
                                   placeholder="Nhập họ và tên" 
                                   required>
                        </div>
                    </div>

                    <!-- Số điện thoại -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="phone" class="form-label fw-bold">Số điện thoại</label>
                            <input type="tel" 
                                   class="form-control" 
                                   id="phone" 
                                   name="phone" 
                                   placeholder="Nhập số điện thoại" 
                                   pattern="[0-9]{10,11}" 
                                   title="Số điện thoại phải có 10-11 chữ số" 
                                   required>
                        </div>
                    </div>

                    <!-- Địa chỉ -->
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="address" class="form-label fw-bold">Địa chỉ giao hàng</label>
                            <textarea class="form-control" 
                                      id="address" 
                                      name="address" 
                                      rows="4" 
                                      placeholder="Nhập địa chỉ nhận hàng" 
                                      required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Nút hành động -->
                <div class="d-flex gap-3">
                    <button type="submit" class="btn btn-primary btn-lg flex-grow-1 shadow-sm">
                        <i class="bi bi-credit-card me-2"></i>Thanh toán
                    </button>
                    <a href="/webbanhang/Product/list" class="btn btn-outline-secondary btn-lg flex-grow-1">
                        <i class="bi bi-arrow-left me-2"></i>Quay lại giỏ hàng
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 20px;
        transition: all 0.3s ease;
    }
    .card:hover {
        box-shadow: 0 15px 30px rgba(0,0,0,0.15) !important;
    }
    .bg-gradient-primary {
        background: linear-gradient(45deg, #007bff, #00b4db);
    }
    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0,123,255,0.3);
    }
    .btn-primary {
        background: linear-gradient(45deg, #007bff, #00b4db);
        border: none;
    }
    .btn-primary:hover {
        background: linear-gradient(45deg, #0056b3, #0086b3);
    }
    .btn-outline-secondary:hover {
        background-color: #6c757d;
        color: white;
    }
</style>

<?php include 'app/views/shares/footer.php'; ?>