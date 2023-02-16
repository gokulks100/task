<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee</title>
    <link rel="stylesheet" href="{{asset("asset/dist/sweetalert.css")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('datatables.bundle.js') }}" type="text/javascript"></script>
    <script src="{{asset("asset/datatable/")}}/dataTables.buttons.js"></script>
    <script src="{{asset("asset/datatable/")}}/buttons.print.js"></script>
    <script src="{{asset("asset/datatable/")}}/jszip.min.js"></script>
    <script src="{{asset("asset/datatable/")}}/pdfmake.min.js"></script>
    <script src="{{asset("asset/datatable/")}}/vfs_fonts.js"></script>
    <script src="{{asset("asset/datatable/")}}/buttons.html5.min.js"></script>
    <script src="{{asset("asset/datatable/")}}/buttons.colVis.min.js"></script>
    <script src="{{asset("sweetalert/sweetalert.min.js")}}"></script>
    
    <style>
        tfoot{
            display: table-header-group;
        }

        .container{
            margin-top: 60px;
        }
    </style>

</head>
<body>
    <div class="container">
        <button class="btn btn-success" onclick="openModal()">Add Employee</button>
        <table class="table  table-striped" id="employeeTable">
            <thead class="data-head"> 
                <tr>
                    <th>#</th>
                    <th>userName</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody></tbody>
        </table>
    </div>
    <div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLabel">Add Employee</h5>
              <button type="button" class="close"data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="post" id="employeeForm" action="">
                    <table class="table">
                        <thead>
                        </thead>
                        <td></td><td></td>
                        <tr>
                            <th>User Name</th>
                            <td><input name="name" id="name" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Email Address</th>
                            <td><input name="email" id="email"   type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td><input name="phone" id="phone"  onkeypress="return onlyNumberKey(event)" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>
                                <select name="gender" id="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                         <input type="hidden" id="id" name="id" />
                        {{csrf_field()}}
                  </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" id="add" onclick="addEmployee()" class="btn btn-primary">Save</button>
              <button type="button" id="update" onclick="updateEmployee()" class="btn btn-primary">Update</button>
            </div>
          </div>
        </div>
      </div>
</body>
@include('datatable')
@include('script')
</html>