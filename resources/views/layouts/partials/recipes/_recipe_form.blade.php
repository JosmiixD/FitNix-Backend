<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
    <h5 class="text-dark font-weight-bold mb-10">User's Profile Details:</h5>
    <!--begin::Group-->
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label text-left">Avatar</label>
        <div class="col-lg-9 col-xl-9">
            <div class="image-input image-input-outline" id="kt_user_add_avatar">
                <div class="image-input-wrapper" style="background-image: url(images/global/no-image.png); background-position: center; background-size: cover;"></div>
                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                    <i class="fa fa-pen icon-sm text-muted"></i>
                    <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                    <input type="hidden" name="profile_avatar_remove" />
                </label>
                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                </span>
            </div>
        </div>
    </div>
    <!--end::Group-->
    <!--begin::Group-->
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
        <div class="col-lg-9 col-xl-9">
            <input class="form-control form-control-solid form-control-lg" name="firstname" type="text" value="" />
        </div>
    </div>
    <!--end::Group-->
    <!--begin::Group-->
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
        <div class="col-lg-9 col-xl-9">
            <input class="form-control form-control-solid form-control-lg" name="lastname" type="text" value="" />
        </div>
    </div>
    <!--end::Group-->
    <!--begin::Group-->
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label">Company Name</label>
        <div class="col-lg-9 col-xl-9">
            <input class="form-control form-control-solid form-control-lg" name="companyname" type="text" value="Loop Inc." />
            <span class="form-text text-muted">If you want your invoices addressed to a company. Leave blank to use your full name.</span>
        </div>
    </div>
    <!--end::Group-->
    <!--begin::Group-->
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
        <div class="col-lg-9 col-xl-9">
            <div class="input-group input-group-solid input-group-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="la la-phone"></i>
                    </span>
                </div>
                <input type="text" class="form-control form-control-solid form-control-lg" name="phone" value="5678967456" placeholder="Phone" />
            </div>
            <span class="form-text text-muted">Enter valid US phone number(e.g: 5678967456).</span>
        </div>
    </div>
    <!--end::Group-->
    <!--begin::Group-->
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
        <div class="col-lg-9 col-xl-9">
            <div class="input-group input-group-solid input-group-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="la la-at"></i>
                    </span>
                </div>
                <input type="text" class="form-control form-control-solid form-control-lg" name="email" value="" />
            </div>
        </div>
    </div>
    <!--end::Group-->
    <!--begin::Group-->
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label">Company Site</label>
        <div class="col-lg-9 col-xl-9">
            <div class="input-group input-group-solid input-group-lg">
                <input type="text" class="form-control form-control-solid form-control-lg" name="companywebsite" placeholder="Username" value="loop" />
                <div class="input-group-append">
                    <span class="input-group-text">.com</span>
                </div>
            </div>
        </div>
    </div>
    <!--end::Group-->
</div>