@extends('index')
@section('content')
    <div class="pagetitle">
        <h1 style="text-align: unset">Company Profile</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>

                        <!-- General Form Elements -->
                        <form method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data" id="companyProfile">
                            @csrf
                            <div class="row mb-3">
                                <label for="company_name" class="col-sm-2 col-form-label">Company Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="company_name" name="company_name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="company_email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-5">
                                    <input type="email" class="form-control" id="company_email" name="company_email">
                                </div>
                            </div>
                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                <div class="col-sm-10">
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="active" value="1" checked>
                                    <label class="form-check-label" for="active">
                                      Active
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="deactive" value="0">
                                    <label class="form-check-label" for="deactive">
                                      Deactive
                                    </label>
                                  </div>
                                </div>
                              </fieldset>
                            <div class="row mb-3">
                                <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" id="mobile" name="mobile">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputCity" class="col-sm-2 col-form-label">City</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="city" name="city">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Select State</label>
                                <div class="col-sm-5">
                                    <select class="form-select" aria-label="Default select example" name="state">
                                        <option selected disabled>Select State</option>
                                        <option value="GJ">Gujarat</option>
                                        <option value="AS">Assam</option>
                                        <option value="GA">Goa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="file_path" class="col-sm-2 col-form-label">File Upload</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="file" id="file_path" name="file_path">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Type of Business</legend>
                                <div class="col-sm-10">
              
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="itCompany" name="business_type[]" value="IT" checked>
                                    <label class="form-check-label" for="itCompany">
                                      IT Company
                                    </label>
                                  </div>
              
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="marketing" name="business_type[]" value="Marketing">
                                    <label class="form-check-label" for="marketing">
                                      Marketing Company
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="other" name="business_type[]" value="Other">
                                    <label class="form-check-label" for="other">
                                      Other
                                    </label>
                                  </div>
              
                                </div>
                              </div>
                            <div class="row mb-3">
                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" style="height: 100px" id="address" name="address"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" style="height: 100px" id="description" name="description"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-5">
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
