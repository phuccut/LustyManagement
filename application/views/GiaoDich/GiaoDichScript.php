<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
$(document).ready(function () {
    loadData();
});
    var apiUrl = "<?php echo base_url();?>";
    
    function loadData() {
        $.ajax({
            url: apiUrl+"/GiaoDich/GetAll/",
            type: "GET",
            contentType: "application/json;charset=utf-8",
            dataType: "json",
            success: function (result) {
                var html = '';
                $("#datatables").DataTable().destroy();
                $.each(result, function (key, item) {
                    html += '<tr>';
                    html += '<td>' + item.MaInt + '</td>';
                    html += '<td>' + item.LoaiGiaoDich + '</td>';
                    html += '<td>' + item.TaiKhoan + '</td>';
                    html += '<td>' + item.SoTien + '</td>';
                    html += '<td>' + item.MoTa + '</td>';
                    html += '<td>' + item.NganSach + '</td>';
                    html += '<td>' + item.ThoiGian + '</td>';
                    html += '<td class="text-right">';
                    html += '<a href="#" class="btn btn-simple btn-info btn-icon like"><i class="material-icons">favorite</i></a>';
                    html += '<a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i></a>';
                    html += '<a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>';
                    html += '</td>';
                    html += '</tr>';
                });
                $("#tbody").html(html);
                loadDataTable();
            },
            error: function () {
                $.notify("Tải dữ liệu thất bại", {
                    globalPosition: "top center",
                    className: "error"
                })
            }
        });
    }

    function loadDataTable() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    }
</script>

