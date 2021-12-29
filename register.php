<?php
include "includes/header.php";
?>
<body style=" background-color: #F9F9F9;">
  

<div class="container" style="width: 700px;">

<main>
    <div class="py-5 text-center">
      <h2 class="text-primary">Please Sign In</h2>
     
    </div>
          <div class="container mx-auto">
        <h4 class="mb-3">Register</h4>
        <form class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="address" class="form-label">Phone number</label>
              <input type="text" class="form-control" id="address" placeholder="09..." required>
              <div class="invalid-feedback">
                Please enter your Valid phone number.
              </div>
            </div>
            <div class="col-sm-6">
              <label for="country" class="form-label">Location</label>
              <select class="form-select" id="country" required>
                <option value="">Choose...</option>
                <option>United States</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>
            <hr class="my-4">
          <button class="w-50 btn btn-primary mx-auto " type="submit">Continue to checkout</button>
          </div>

          
          </div>

          
        </form>
      </div>

  </main>
</div>
</body>