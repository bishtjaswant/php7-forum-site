<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="" id="login-modal-footer"></div>
      <div class="modal-header" >
        <div class="" ></div>
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="login-frm"  novalidate>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" id="login_email" required  placeholder="email address" class="form-control" id="email" aria-describedby="emailHelp">
          </div> 
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="login_password" required placeholder="***************" class="form-control" id="password">
          </div>
          <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" id="rememberme" for="exampleCheck1">Remember me ?</label>
  </div>
          <button type="submit" class="btn btn-outline-primary">Login</button>
          <button type="button" id="login_dismiss" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </form>
      </div>
      <div id="login-modal-footer" class="modal-footer"> </div>
    </div>
  </div>
</div>