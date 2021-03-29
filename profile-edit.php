<?php require_once 'header.php'; ?>
<!-- ============================ Dashboard Start ================================== -->
<section class="gray">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="Reveal-dashboard-navbar">

                    <div class="Reveal-d-user-avater">
                        <img src="https://via.placeholder.com/400x400" class="img-fluid avater" alt="">
                        <h4>Adam Harshvardhan</h4>
                        <span>Canada USA</span>
                    </div>

                    <div class="Reveal-dash-navigation">
                        <ul>
                            <li><a href="dashboard.html"><i class="ti-dashboard"></i>Dashboard</a></li>
                            <li class="active"><a href="my-profile.html"><i class="ti-user"></i>My Profile</a></li>
                            <li><a href="messages.html"><i class="ti-email"></i>Messages</a></li>
                            <li><a href="my-booking.html"><i class="ti-layers"></i>My Booking</a></li>
                            <li><a href="wallet.html"><i class="ti-pencil-alt"></i>Wallet</a></li>
                            <li><a href="add-listing.html"><i class="ti-plus"></i>Add Listing</a></li>
                            <li><a href="my-listings.html"><i class="ti-layers-alt"></i>My Listings</a></li>
                            <li><a href="bookmark-list.html"><i class="ti-heart"></i>Bookmarked Listings</a></li>
                            <li><a href="change-password.html"><i class="ti-unlock"></i>Change Password</a></li>
                            <li><a href="#"><i class="ti-power-off"></i>Log Out</a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="dashboard-wraper">

                    <!-- Basic Information -->
                    <div class="form-submit">
                        <h4>My Account</h4>
                        <div class="submit-section">
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>Your Name</label>
                                    <input type="text" class="form-control" value="Shaurya Preet">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="preet77@gmail.com">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Your Title</label>
                                    <input type="text" class="form-control" value="Web Designer">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" value="123 456 5847">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Address</label>
                                    <input type="text" class="form-control" value="522, Arizona, Canada">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>City</label>
                                    <input type="text" class="form-control" value="Montquebe">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>State</label>
                                    <input type="text" class="form-control" value="Canada">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Zip</label>
                                    <input type="text" class="form-control" value="160052">
                                </div>

                                <div class="form-group col-md-12">
                                    <label>About</label>
                                    <textarea class="form-control">Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper</textarea>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="form-submit">
                        <h4>Social Accounts</h4>
                        <div class="submit-section">
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>Facebook</label>
                                    <input type="text" class="form-control" value="https://facebook.com/">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Twitter</label>
                                    <input type="email" class="form-control" value="https://twitter.com/">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Google Plus</label>
                                    <input type="text" class="form-control" value="https://googleplus.com">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>LinkedIn</label>
                                    <input type="text" class="form-control" value="https://linkedin.com/">
                                </div>

                                <div class="form-group col-lg-12 col-md-12">
                                    <button class="btn btn-theme" type="submit">Save Changes</button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- ============================ Dashboard End ================================== -->
<?php require_once 'footer.php'; ?>