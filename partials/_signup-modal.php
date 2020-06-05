<!-- Modal -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sign up for an iDev coding forum </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="sign-form">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="first">First Name</label>
                            <input require type="text" id="first" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col-md-6">
                            <label for="last">Last Name</label>
                            <input require type="text" id="last" class="form-control" placeholder="Last Name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">Email address</label>
                            <input require type="email" id="email" class="form-control" placeholder="email address">
                        </div>
                        <div class="col-md-6">
                            <label for="password">Password</label>
                            <input require type="password" id="password" class="form-control" placeholder="**********">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="address">Address</label>
                            <textarea require id="address" class="form-control" placeholder="address" cols="30" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="phone">Phone Number</label>
                            <input type="number" require name="" id="phone" class="form-control" placeholder="phone">
                        </div>

                        <div class="col-md-6">
                            <label for="gender">Gender</label>
                            <div class="form-group form-inline">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="male" value="male" name="gender" class="custom-control-input" checked="">
                                    <label class="custom-control-label" for="male">Male</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio"  value="female" id="female" name="gender" class="custom-control-input">
                                    <label class="custom-control-label" for="female">Female</label>
                                </div>

                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-12 mx-4 my-3">
                                <button type="submit" class="btn btn-outline-primary">Create</button>
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </div>

                </form>


            </div>
            <div  id="modal-footer">
            </div>
        </div>
    </div>
</div>