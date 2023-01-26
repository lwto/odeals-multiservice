<template>
  <section class="account-details mt-4 mb-4">
    <div class="container">
      <h5>MY ACCOUNT DETAILS</h5>
      <div class="row mt-5 justify-content-center">
        <div class="col-lg-8">
          <div class="user-sidebar">
            <div class="user-body user-profile text-center">
              <div class="user-img">
                <img src="/images/user/user.png" alt="" class="rounded-circle avatar-100 image-fluid profile_image_preview">
              </div>
              <div class="sideuser-info">
                <span class="mb-2">Demo User</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="user-content mt-5">
            <form method="POST" action="/update-profile" id="user-form">
              <!-- Status -->
              <input placeholder="status" class="form-control" name="status" type="hidden" value="1" />
              <!-- personal info -->
              <h6 class="mb-4">Personal Information</h6>
              <div class="row">
                <div class="col-md-3">
                  <label for="profile_image" class="form-control-label">Choose Profile Image</label>
                </div>
                <div class="form-group col-md-9">
                  <div class="custom-file">
                    <input class="custom-file-input custom-file-input-sm detail" id="profile_image" lang="en" accept="image/*" name="profile_image" type="file">
                    <label class="custom-file-label upload-label" id="imagelabel" for="profile_image">Profile Image</label>
                  </div> 
                </div>
              </div>
                <div class="row">
                  <div class="col-md-3">
                    <label for="first_name" class="form-control-label">First Name</label>
                    <span class="text-danger">*</span>
                  </div>
                  <div class="form-group col-md-9">
                    <input placeholder="First Name" class="form-control" required name="first_name" type="text" id="first_name"/>
                    <small class="help-block with-errors text-danger"></small>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label for="last_name" class="form-control-label">Last Name</label>
                    <span class="text-danger">*</span>
                  </div>
                  <div class="form-group col-md-9">
                    <input placeholder="Last Name" class="form-control" required name="last_name" type="text" id="last_name"/>
                    <small class="help-block with-errors text-danger"></small>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label for="username" class="form-control-label">Username</label>
                    <span class="text-danger">*</span>
                  </div>
                  <div class="form-group col-md-9">
                    <input placeholder="Username" class="form-control" required name="username" type="text" id="username"/>
                    <small class="help-block with-errors text-danger"></small>
                  </div>
                </div>

                <!-- contact info -->
                <h6 class="mb-4 mt-4">Contact Information</h6>

                <div class="row">
                  <div class="col-md-3">
                    <label for="contact_number" class="form-control-label">Phone Number</label>
                    <span class="text-danger">*</span>
                  </div>
                  <div class="form-group col-md-9">
                    <input placeholder="Phone Number" class="form-control" required name="contact_number" type="text" id="contact_number"/>
                    <small class="help-block with-errors text-danger"></small>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label for="email" class="form-control-label">Email</label>
                    <span class="text-danger">*</span>
                  </div>
                  <div class="form-group col-md-9">
                    <input placeholder="Email" class="form-control" required name="email" type="text" id="email"/>
                    <small class="help-block with-errors text-danger"></small>
                  </div>
                </div>

                <!-- Location info -->
                <h6 class="mb-4 mt-4">Where are you located?</h6>
                
                <div class="row">
                  <div class="col-md-3">
                    <label for="address" class="form-control-label">Address</label>
                  </div>
                  <div class="form-group col-md-9">
                    <input placeholder="Address" class="form-control" name="address" type="text" id="address"/>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <label for="postcode" class="form-control-label">Postcode</label>
                    <span class="text-danger">*</span>
                  </div>
                  <div class="form-group col-md-9">
                    <input placeholder="Postcode" class="form-control" required name="postcode" type="text" id="postcode"/>
                    <small class="help-block with-errors text-danger"></small>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <label for="area" class="form-control-label">Area</label>
                    <span class="text-danger">*</span>
                  </div>
                  <div class="form-group col-md-9">
                    <input placeholder="Area" class="form-control" required name="area" type="text" id="area"/>
                    <small class="help-block with-errors text-danger"></small>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <label for="city" class="form-control-label">City</label>
                    <span class="text-danger">*</span>
                  </div>
                  <div class="form-group col-md-9">
                    <input placeholder="city" class="form-control" required name="city" type="text" id="city"/>
                    <small class="help-block with-errors text-danger"></small>
                  </div>
                </div>

                <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary mt-3">Save</button>
                </div>
            </form>
          </div>
        </div>
       
      </div>
    </div>
  
  </section>
  </template>
  <style scoped>
 
  .custom-file, .custom-file-input {
    height: calc(1.5em + 1.25rem + 2px);
    position: relative;
    width: 100%;
}
.custom-file {
    display: inline-block;
    margin-bottom: 0;
}
.custom-file-input {
  margin: 0;
  opacity: 0;
  z-index: 2;
}
button, input {
  overflow: visible;
}
.custom-file-label.upload-label {
  -webkit-line-clamp: 1;
  -webkit-box-orient: horizontal;
  overflow: hidden;
  padding-right: 100px;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.custom-file-input:lang(en)~.custom-file-label:after {
  content: "Browse";
}
.custom-file-label:after {
  background-color: #f9fbfe;
  color: #324253;
}
.custom-file-label, .custom-file-label:after {
  color: #495057;
  ine-height: 1.5;
  padding: 0.625rem 1.25rem;
  position: absolute;
  right: 0;
  top: 0;
}
.custom-file-label {
  background-color: #fff;
  border: 1px solid #ced4da;
  border-radius: 5px;
  box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
  font-weight: 400;
  height: calc(1.5em + 1.25rem + 2px);
  left: 0;
  z-index: 1;
}
  </style>
  <script>
 
  </script>