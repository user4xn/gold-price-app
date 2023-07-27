<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
    <form id="formValidationUser" method="POST" action="{{ route('store-user') }}">
      @csrf
      <div class="mb-3">
        <label class="form-label" for="add-user-fullname">Full Name</label>
        <input type="text" class="form-control" id="add-user-fullname" placeholder="John Doe" name="userFullName" aria-label="John Doe" />
      </div>
      <div class="mb-3">
        <label class="form-label" for="add-user-email">Email</label>
        <input type="text" id="add-user-email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="userEmail" />
      </div>
      <div class="mb-3 form-password-toggle"">
        <label class="form-label" for="add-user-pass2">Password</label>
        <div class="input-group input-group-merge">
          <input class="form-control" type="password" id="userConfirmPassword" name="userConfirmPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
          <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
        </div>
      </div>
      <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit" id="submit-button">Submit</button>
      <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
    </form>
  </div>
</div>