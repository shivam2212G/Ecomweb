@extends('admin.layout.master')
@section('title','Users Bills')
@section('content')
  <style>
    body {
      background-color: #121212;
      color: #fff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding: 20px;
    }

    .header {
      text-align: center;
      margin-bottom: 40px;
    }

    h1 {
      color: #e50914;
      margin-bottom: 10px;
      text-shadow: 1px 1px 2px #000;
      font-size: 2.5rem;
    }

    .subtitle {
      color: #b3b3b3;
      font-size: 1.1rem;
    }

    .billing-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
      gap: 25px;
      margin-top: 30px;
    }

    .billing-card {
      background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
      border-radius: 12px;
      padding: 25px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
      border-left: 4px solid #e50914;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .billing-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 20px rgba(229, 9, 20, 0.2);
    }

    .card-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid #333;
      padding-bottom: 15px;
      margin-bottom: 20px;
    }

    .bill-id {
      color: #e50914;
      font-weight: bold;
      font-size: 1.3rem;
    }

    .bill-total {
      background-color: #e50914;
      color: white;
      padding: 6px 12px;
      border-radius: 20px;
      font-weight: bold;
      font-size: 1.1rem;
    }

    .card-body {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    .info-section {
      margin-bottom: 15px;
    }

    .section-title {
      color: #e50914;
      font-size: 0.95rem;
      margin-bottom: 8px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .info-group {
      margin-bottom: 12px;
    }

    .info-label {
      color: #b3b3b3;
      font-size: 0.85rem;
      margin-bottom: 3px;
    }

    .info-value {
      color: #fff;
      font-weight: 500;
      word-break: break-word;
      font-size: 0.95rem;
    }

    .full-width {
      grid-column: span 2;
    }

    .address-section {
      background-color: rgba(0, 0, 0, 0.2);
      padding: 12px;
      border-radius: 8px;
      margin-top: 5px;
    }

    .timestamps {
      grid-column: span 2;
      display: flex;
      justify-content: space-between;
      font-size: 0.8rem;
      color: #666;
      margin-top: 20px;
      padding-top: 15px;
      border-top: 1px dashed #444;
    }

    .user-id {
      text-align: center;
      color: #888;
      font-size: 0.9rem;
      margin-top: 10px;
    }

    @media (max-width: 768px) {
      .billing-container {
        grid-template-columns: 1fr;
      }
    }
  </style>

  <div class="header">
    <h1>Billing Information</h1>
    <p class="subtitle">Complete customer billing records</p>
  </div>

  <div class="billing-container">
    <?php foreach ($userdata as $user): ?>
      <div class="billing-card">
        <div class="card-header">
          <span class="bill-id">Bill #<?= htmlspecialchars($user['bill_id']) ?></span>
          <span class="bill-total">$<?= htmlspecialchars($user['total']) ?></span>
        </div>

        <div class="card-body">
          <!-- Personal Information Section -->
          <div class="info-section">
            <div class="section-title">Customer Details</div>
            <div class="info-group">
              <div class="info-label">Full Name</div>
              <div class="info-value"><?= htmlspecialchars($user['fname']) ?> <?= htmlspecialchars($user['lname']) ?></div>
            </div>
            <div class="info-group">
              <div class="info-label">Email</div>
              <div class="info-value"><?= htmlspecialchars($user['email']) ?></div>
            </div>
            <div class="info-group">
              <div class="info-label">Mobile</div>
              <div class="info-value"><?= htmlspecialchars($user['mono']) ?></div>
            </div>
          </div>

          <!-- Address Section -->
          <div class="info-section full-width">
            <div class="section-title">Billing Address</div>
            <div class="address-section">
              <div class="info-group">
                <div class="info-label">Address Line 1</div>
                <div class="info-value"><?= htmlspecialchars($user['addl1']) ?></div>
              </div>
              <div class="info-group">
                <div class="info-label">Address Line 2</div>
                <div class="info-value"><?= htmlspecialchars($user['addl2']) ?></div>
              </div>
              <div style="display: flex; gap: 15px;">
                <div style="flex: 1;">
                  <div class="info-group">
                    <div class="info-label">City</div>
                    <div class="info-value"><?= htmlspecialchars($user['city']) ?></div>
                  </div>
                </div>
                <div style="flex: 1;">
                  <div class="info-group">
                    <div class="info-label">State</div>
                    <div class="info-value"><?= htmlspecialchars($user['state']) ?></div>
                  </div>
                </div>
              </div>
              <div style="display: flex; gap: 15px;">
                <div style="flex: 1;">
                  <div class="info-group">
                    <div class="info-label">Country</div>
                    <div class="info-value"><?= htmlspecialchars($user['country']) ?></div>
                  </div>
                </div>
                <div style="flex: 1;">
                  <div class="info-group">
                    <div class="info-label">Zipcode</div>
                    <div class="info-value"><?= htmlspecialchars($user['zipcode']) ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="user-id">User ID: <?= htmlspecialchars($user['u_id']) ?></div>

          <div class="timestamps">
            <span>Created: <?= htmlspecialchars(date('M d, Y H:i', strtotime($user['created_at']))) ?></span>
            <span>Updated: <?= htmlspecialchars(date('M d, Y H:i', strtotime($user['updated_at']))) ?></span>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

@endsection
