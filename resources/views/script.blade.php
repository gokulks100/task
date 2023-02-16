<script>
    function openModal()
    {
        $("#modalLabel").val("Add Employee");
        $("#employeeModal").modal("show");
        $("#update").hide();
    }
    
    
    function addEmployee()
    {
        let data = new FormData($('#employeeForm')[0]);
        $.ajax({
        url: "{{route('employee.store')}}",
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData:false,
        success:function(data){
            if(data.success==true){
                $('#employeeModal').modal('hide');
                $('#employeeForm')[0].reset();
                $('#employeeTable').DataTable().draw();
                swal('success','Success','success');
            }else{
                swal('warning',data.errorMsg,'warning');
            }
        },error:function(){
            swal('error','something went wrong','error');
        }
        });
    
    }
    
    
    function updateEmployee()
    {
        let data = new FormData($('#employeeForm')[0]);
        $.ajax({
        url: "{{route('employee.store')}}",
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData:false,
        success:function(data){
            if(data.success==true){
                $('#employeeModal').modal('hide');
                $('#employeeForm')[0].reset();
                $('#employeeTable').DataTable().draw();
                swal('success','Updated','success');
            }else{
                swal('warning',data.errorMsg,'warning');
            }
        },error:function(){
            swal('error','something went wrong','error');
        }
        });
    
    }
    
    $(document).on('hide.bs.modal','#employeeTable', function () {
        $('#invoiceForm')[0].reset();
    });
    
    
    $(document).ready( function(){
        $('#employeeTable').on('click', 'tbody .edit_btn', function () {
            $('#employeeForm')[0].reset();
            var id= $(this).attr('data-id');
            $.ajax({
                url: "{{route("employee.editdata")}}",
                type: "get",
                data: {id:id},
                beforeSend: function (xhr) {
                },
                success: function (result) {
                    $("#id").val(result.id);
                    $("#name").val(result.name);
                    $("#email").val(result.email);
                    $("#phone").val(result.phone);
                    $("#gender").val(result.gender);
                }
            });
            $("#employeeModal").modal("show");
            $("#modalLabel").val("Edit Employee");
            $("#add").hide();
            $("#update").show();
    
        });
    
    });
    
    
    function deleteEmployee (id) {
    
    swal({
            title: "Are you sure?",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e){
    
            if(e.value)
            {
                $.ajax({
                    url: "{{route("employee.delete")}}",
                    type: "POST",
                    data: {'id':id , '_token': '{{ csrf_token() }}'},
                    beforeSend: function (xhr) {
                    },
                    success: function (result) {
                        if(result.success == true)
                        {
                            swal('success','success','success');
                            $('#employeeTable').DataTable().draw();
                        }
                        else
                        {
                            swal('error',result.errorMsg,'error');
                        }
                    }
                });
            }
    
        });
    
    
    }
    
    
    function onlyNumberKey(evt) {
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
    

    
    
    </script>
    