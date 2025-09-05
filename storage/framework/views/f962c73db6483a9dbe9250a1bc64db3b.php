
<?php $__env->startSection('content'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  .card-container {
    max-width: 550px;
    margin: 40px auto;
  }
  .credit-card {
    background: linear-gradient(135deg, #a100ff, #ff007f);
    color: #fff;
    border-radius: 15px;
    padding: 20px;
    margin-bottom: 20px;
    position: relative;
  }
  .credit-card .visa {
    position: absolute;
    right: 20px;
    top: 20px;
    font-size: 28px;
    font-weight: bold;
  }
  .form-control, .form-select {
    border-radius: 10px;
  }
</style>

<div class="container card-container">

  <div class="credit-card shadow">
    <div class="mb-4">#### #### #### ####</div>
    <div class="d-flex justify-content-between">
      <div>
        <small>CARD HOLDER NAME</small>
        <div>FULL NAME</div>
      </div>
      <div>
        <small>EXPIRES</small>
        <div>MM/YY</div>
      </div>
    </div>
    <div class="visa">VISA</div>
  </div>

  <form class="p-4 bg-white rounded shadow">
    <div class="mb-3">
      <label class="form-label">Card Number</label>
      <input type="text" class="form-control" placeholder="Enter card number">
    </div>
    <div class="mb-3">
      <label class="form-label">Card Holder Name</label>
      <input type="text" class="form-control" placeholder="Enter full name">
    </div>
    <div class="row">
      <div class="col-12 col-md-4 mb-3">
        <label class="form-label">Exp. MM</label>
        <select class="form-select">
          <option>MM</option>
          <?php for($i = 1; $i <= 12; $i++): ?>
            <option><?php echo e(str_pad($i, 2, '0', STR_PAD_LEFT)); ?></option>
          <?php endfor; ?>
        </select>
      </div>
      <div class="col-12 col-md-4 mb-3">
        <label class="form-label">Exp. YY</label>
        <select class="form-select">
          <option>YY</option>
          <?php for($y = date('Y'); $y <= date('Y') + 10; $y++): ?>
            <option><?php echo e($y); ?></option>
          <?php endfor; ?>
        </select>
      </div>
      <div class="col-12 col-md-4 mb-3">
        <label class="form-label">CVV</label>
        <input type="password" class="form-control" placeholder="CVV">
      </div>
    </div>
    <button type="submit" class="btn btn-primary w-100 rounded-pill">Pay Now</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\mdrpay\resources\views/Payment/PayIn.blade.php ENDPATH**/ ?>