    @extends('index')
    @section('content')
        
    <div class="pagetitle">
      <h1>Company Profile Details</h1>
    </div><!-- End Page Title -->

      <div class="row">

        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><a href="{{ route('home') }}" class="btn btn-primary"><i class="bi bi-plus-square-fill" title="Add New"></i>Add New</a>
                <div class="search-bar">
                  <form method="GET" action={{ route('company.index') }}>
                    <input type="text" name="search" id="search" placeholder="Search" title="Enter search keyword" value="{{ $search }}">
                    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                  </form>
                </div><!-- End Search Bar -->
              </h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Company Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Profile Image</th>
                    <th scope="col">Business Type</th>
                    <th scope="col">City</th>
                    <th scope="col">State</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="company-table-body">
                    @foreach ($companyArr as $company)
                    <tr data-id="{{ $company->id }}">
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$company->company_name}}</td>
                        <td>{{$company->company_email}}</td>
                        <td>{{$company->status == 1 ? 'Active' : 'Inactive' }}</td>
                        <td>{{$company->mobile}}</td>
                        <td><img src="{{asset('storage/' .$company->file_path)}}" alt="ProfileImage" height="90px" width="100px"/></td>
                        @if(is_array($company['business_type']) || is_object($company['business_type']))
                        @foreach ($company['business_type'] as $type)
                        <td>{{$type}}</td>
                        @endforeach 
                        @else
                        <td>No</td>
                        @endif
                        <td>{{$company->city}}</td>
                        <td>{{$company->state}}</td>
                        <td><a href={{ route('company.edit', [$company->id]) }}><i class="bi bi-pencil-square" title="Edit"></i></a>
                        <button data-id="{{$company->id}}" class="delete-btn"><i class="bi bi-trash-fill" title="Trash"></i></button>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

              <!-- Display pagination links -->
              {{ $companyArr->appends(['search' => $search])->links('pagination::bootstrap-4') }}
            </div>
          </div>

        </div>
      </div>
    @endsection   