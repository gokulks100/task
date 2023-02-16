<script>
    var datatable;
    $(function(){
        datatable = $('#employeeTable').DataTable({
            processing: true,
            serverSide: true,
            responsive:true,
            'columnDefs': [
                {
                    targets:[5],
                    render:function(data,type,row)
                    {
                        return `<a class="edit_btn" data-id=`+data+` style='cursor:pointer;'><span><i class="fa-solid fa-pen-to-square"></i></span></a>
                        <a class="delete_btn" onclick="deleteEmployee(${data})" style='color:red;cursor:pointer;'><i class="fa-solid fa-trash"></i></a>`;
                    }
                },
                
            ],
            ajax: {
                url: '{{route("employee.getdata")}}',
                type:"get",
                data: function (d) {

                }
            },
            "order": [[0, "desc"]],
            "paging": true,
            dom:"rtip",
            columns: [
                {data : 'id' , name : "id"} ,
                {data : 'name' , name : "name"} ,
                {data : 'email' , name : "email"} ,
                {data : 'phone' , name : "phone"} ,
                {data : 'gender' , name : "gender"} ,
                {data : 'id' , name : "id"} ,
            ],
            "initComplete": function() {
                        var i=0;
                        var input_text= [0,1,2,3];
                        var non_searchable= [];
                        this.api().columns().every(function() {

                        var column = this;

                        if (input_text.includes(i)) {
                            var input = "<input type='text'  placeholder=\"&#xF002; Search\" style='height:25px; font-family: Arial,FontAwesome' class=\"per-page form-control form-control-sm m-input\">";
                            $(input).appendTo($(column.footer()).empty())
                            .on('change', function () {
                                        column.search($(this).val(), false, false, true).draw();
                                });
                        }
                        else if(i == 4)
                        {
                            var column = this;
                            var input = "<select>" +
                                "<option value=''>All</option>" +
                                "<option value='male'>Male</option>" +
                                "<option value='female'>Female</option>" +
                                "<option value='other'>Other</option>" +
                            "</select>";
                            $(input).appendTo($(column.footer()).empty())
                            .on('change', function () {
                                column.search($(this).val(), false, false, true).draw();
                            });
                        }
                        i++;

                        });
               }
        });
    });
</script>
