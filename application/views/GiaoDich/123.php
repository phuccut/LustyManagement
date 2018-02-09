
@{
    ViewBag.Title = "Quản lý phường/xã";
    Layout = "~/Views/Shared/_MainLayout.cshtml";
}

<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Quản lý phường/xã</h1>
            <h1 class="page-subhead-line">Danh sách phường/xã </h1>
        </div>
    </div>
    <!-- /. ROW  -->
    <div class="card">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#hientai" aria-controls="home" role="tab" data-toggle="tab">Các mục hiện tại</a></li>
            <li role="presentation"><a href="#daxoa" aria-controls="profile" role="tab" data-toggle="tab">Các mục đã xóa</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="hientai">

                <!-- TAB HIỆN TẠI -->
                <a data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm pull-right" onclick="clearTextBox();"><span class="glyphicon glyphicon-plus"></span> <b>Thêm mới</b></a>

                <div class="row">
                    <div class="col-md-12">
                        <!--   Basic Table  -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <!-- <div class="table-responsive"> -->
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Mã phường/xã</th>
                                            <th>Tên phường/xã</th>
                                            <th>Quận/huyện</th>
                                            <th>Thành phố</th>
                                            <th>Mô tả</th>
                                            <th class="text-center">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyId"></tbody>
                                </table>
                                <!-- </div> -->
                            </div>
                        </div>
                        <!-- End  Basic Table  -->
                    </div>
                </div>
                <!-- /. ROW  -->
                <!-- END TAB HIỆN TẠI -->
            </div>
            <div role="tabpanel" class="tab-pane" id="daxoa">
                <!-- TAB ĐÃ XÓA -->
                <div class="row">
                    <div class="col-md-12">
                        <!--   Basic Table  -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <!-- <div class="table-responsive"> -->
                                <table id="myTableDelete" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Mã phường/xã</th>
                                            <th>Tên phường/xã</th>
                                            <th>Quận/huyện</th>
                                            <th>Thành phố</th>
                                            <th>Mô tả</th>
                                            <th class="text-center">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyIdDelete"></tbody>
                                </table>
                                <!-- </div> -->
                            </div>
                        </div>
                        <!-- End  Basic Table  -->
                    </div>
                </div>
                <!-- /. ROW  -->
            </div>
            <!-- /. END TAB DA XOA-->
        </div>
    </div>
    <!-- END CARD-->
    <!-- Modal   -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabel">Quản lý quận huyện</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="wardId">ID</label>
                        <input type="text" class="form-control" id="wardId" placeholder="Id" disabled="disabled" />
                    </div>
                    <div class="form-group">
                        <label for="cityName">Tỉnh/thành phố</label>
                        <select class="form-control" id="cityId" name="cityId" onchange="loadDistrict()"></select>
                    </div>
                    <div class="form-group">
                        <label for="districtName">Quận/huyện</label>
                        <select class="form-control" id="districtId" name="districtId"></select>
                    </div>
                    <div class="form-group">
                        <label for="wardName">Tên phường/xã</label>
                        <input type="text" class="form-control" id="wardName" placeholder="Tên phường/xã" />
                    </div>
                    <div class="form-group">
                        <label for="wardDesc">Mô tả</label>
                        <input type="text" class="form-control" id="wardDesc" placeholder="Nhập vào mô tả">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="btnAdd" onclick="return Add();">Thêm</button>
                    <button type="button" class="btn btn-primary" id="btnUpdate" style="display:none;" onclick="Update();">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
</div>
@section WardManagement{
<script>
        var listSelectCity = '<option value="" disabled selected>Chọn thành phố</option>';
        var listSelectDistrict = '';
        var listCity = [];
        var listDistrict = [];
        $(document).ready(function () {
            loadData();
            loadDataDelete();
            loadListCity();
            loadListDistrict();
        });
        //FUNCTION LOAD ward
        function loadData() {
            $.ajax({
                url: "/WardManagement/GetList/",
                type: "GET",
                contentType: "application/json;charset=utf-8",
                dataType: "json",
                success: function (result) {
                    var html = '';
                    $("#myTable").DataTable().destroy();
                    $.each(result, function (key, item) {
                        var districtName = listDistrict.find(x=>x.ID === item.DistrictID).Name;
                        var cityID = listDistrict.find(x=>x.ID === item.DistrictID).CityID;
                        var cityName = listCity.find(x=>x.ID === cityID).Name;
                        html += '<tr>';
                        html += '<td>' + item.ID + '</td>';
                        html += '<td>' + item.Name + '</td>';
                        html += '<td>' + districtName + '</td>';
                        html += '<td>' + cityName + '</td>';
                        html += '<td>' + item.Description + '</td>';
                        html += '<td class="text-center">';
                        html += '<button onclick="return GetbyId(' + item.ID + ')"><span class="glyphicon glyphicon-edit"></span> Edit</button>';
                        html += '<button onclick="return Delete(' + item.ID + ')"><span class="glyphicon glyphicon-remove"></span> Delete</button>';
                        html += '</td>';
                        html += '</tr>';
                    });
                    $("#tbodyId").html(html);
                    $("#myTable").DataTable();
                },
                error: function () {
                    $.notify("Tải dữ liệu thất bại", {
                        globalPosition: "top center",
                        className: "error"
                    })
                }
            });
        }

        //FUNCTION LOAD DELETE WARD
        function loadDataDelete() {
            $.ajax({
                url: "/WardManagement/GetListDelete/",
                type: "GET",
                contentType: "application/json;charset=utf-8",
                dataType: "json",
                success: function (result) {
                    var html = '';
                    $("#myTableDelete").DataTable().destroy();
                    $.each(result, function (key, item) {
                        var districtName = listDistrict.find(x=>x.ID === item.DistrictID).Name;
                        var cityID = listDistrict.find(x=>x.ID === item.DistrictID).CityID;
                        var cityName = listCity.find(x=>x.ID === cityID).Name;
                        html += '<tr>';
                        html += '<td>' + item.ID + '</td>';
                        html += '<td>' + item.Name + '</td>';
                        html += '<td>' + districtName + '</td>';
                        html += '<td>' + cityName + '</td>';
                        html += '<td>' + item.Description + '</td>';
                        html += '<td class="text-center">';
                        html += '<button onclick="return RestoreDelete(' + item.ID + ')"><span class="glyphicon glyphicon-repeat"></span> Phục hồi</button>';
                        html += '</td>';
                        html += '</tr>';
                    });
                    $("#tbodyIdDelete").html(html);
                    $("#myTableDelete").DataTable();
                },
                error: function () {
                    $.notify("Tải dữ liệu thất bại", {
                        globalPosition: "top center",
                        className: "error"
                    })
                }
            });
        }
        //FUNCTION ADD ward
        function Add() {
            var wardObj = {
                Name: $('#wardName').val(),
                DistrictID: $('select[id=districtId]').val(),
                Description: $('#wardDesc').val(),
                isDelete: false
            };
            $.ajax({
                url: "@Url.Action("Add", "WardManagement")",
                data: JSON.stringify(wardObj),
                type: "POST",
                contentType: "application/json;charset=utf-8",
                dataType: "json",
                success: function (result) {
                    loadData();
                    $('#myModal').modal('hide');
                    $.notify("Thêm thành công", {
                        globalPosition: "top center",
                        className: "success"
                    })
                },
                error: function () {
                    $.notify("Thêm thất bại", {
                        globalPosition: "top center",
                        className: "error"
                    })
                }
            });
        }
        //FUNCTION GET ward BY ID
         function GetbyId(wardId) {
             $.ajax({
                 url: "@Url.Action("GetbyId","WardManagement")" + "/" + wardId,
                 type: "GET",
                 contentType: "application/json;charset=UTF-8",
                 dataType: "json",
                 success: function (result) {
                     $('#wardId').val(result.ID);
                     $('#wardName').val(result.Name);
                     $('select[id=cityId]').val(listDistrict.find(x=>x.ID === result.DistrictID).CityID);
                     loadDistrict();
                     $('select[id=districtId]').val(result.DistrictID);
                     $('#wardDesc').val(result.Description);
                     $('#myModal').modal('show');
                     $('#btnUpdate').show();
                     $('#btnAdd').hide();
                 },
                 error: function (errormessenger) {
                     alert(errormessenger.responseText);
                 }
             })
         }
        // FUNCTION UPDATE ward
         function Update() {
             var wardObj = {
                 ID: $('#wardId').val(),
                 Name: $('#wardName').val(),
                 DistrictID: $('select[id=districtId]').val(),
                 Description: $('#wardDesc').val(),
                 isDelete: false
             };
             $.ajax({
                 url: "@Url.Action("Update","WardManagement")",
                 data: JSON.stringify(wardObj),
                 type: "POST",
                 contentType: "application/json;charset=utf-8",
                 dataType: "json",
                 success: function (result) {
                     loadData();
                     $('#myModal').modal('hide');
                     $('#wardId').val("");
                     $('#wardName').val("");
                     $('#wardDesc').val("");
                     $.notify("Sửa thành công", {
                         globalPosition: "top center",
                         className: "success"
                     })
                 },
                 error: function () {
                     $.notify("Sửa thất bại", {
                         globalPosition: "top center",
                         className: "error"
                     })
                 }
             });
         }
         //FUNCTION DELETE ward
         function Delete(wardId) {
             var ans = confirm("Bạn có muốn xóa phường/xã này không?");
             if (ans) {
                 $.ajax({
                    url: "@Url.Action("Delete","wardManagement")"+"/"+wardId,
                    type: "GET",
                    contentType: "application/json;charset=UTF-8",
                    dataType: "json",
                    success: function () {
                        loadData();
                        loadDataDelete();
                        $.notify("Xóa thành công", {
                            globalPosition: "top center",
                            className: "success"
                        })
                    },
                     error: function () {
                         $.notify("Xóa thất bại", {
                             globalPosition: "top center",
                             className: "error"
                         })
                     }
                 });
             }
         }
        //FUNCTION RESTORE ward
        function RestoreDelete(wardId) {
            var ans = confirm("Bạn có muốn khôi phục phường/xã này không?");
            if (ans) {
            $.ajax({
                url: "@Url.Action("Restore","WardManagement")"+"/"+wardId,
                type: "GET",
                contentType: "application/json;charset=UTF-8",
                dataType: "json",
                success: function () {
                    loadData();
                    loadDataDelete();
                    $.notify("Phục hồi thành công", {
                        globalPosition: "top center",
                        className: "success"
                    })
                },
                error: function () {
                    $.notify("Phục hồi thất bại", {
                        globalPosition: "top center",
                        className: "error"
                    })
                }
            });
            }
         }
        //FUNCTION CLEAR TEXTBOX FROM MODAL
         function clearTextBox(){
             $('#wardId').val("Tự động khởi tạo");
             $('#wardName').val("");
             $('#cityId').html(listSelectCity);
             $('#districtId').html('<option value="" disabled selected>Chọn thành phố trước</option>');
             $('#wardDesc').val("");
             $('#btnAdd').show();
             $('#btnUpdate').hide();
         }
        //FUNCTION LOAD LIST ALL CITY
         function loadListCity(){
             $.ajax({
                 url: "@Url.Action("GetList", "CityManagement")",
                 type: "GET",
                contentType: "application/json;charset=utf-8",
                dataType: "json",
                async:false,
                success: function (result) {
                 $.each(result, function (key, item) {
                     listSelectCity += "<option value='" + item.ID + "'>" + item.Name + "</option>";
                     listCity.push({
                         "ID": item.ID,
                         "Name":item.Name
                     });
                 });
                 $('#cityId').html(listSelectCity);
             },
             error: function (errormessage) {
                 alert(errormessage.responseText);
             }
            });
         }
        //Load list all district
        function loadListDistrict(){
            $.ajax({
                url: "@Url.Action("GetList", "DistrictManagement")",
                type: "GET",
                contentType: "application/json;charset=utf-8",
                dataType: "json",
                async:false,
                success: function (result) {
                    $.each(result, function (key, item) {
                        listDistrict.push({
                        "ID": item.ID,
                        "Name": item.Name,
                        "CityID" : item.CityID
                    });
                });
                },
            error: function (errormessage) {
                alert(errormessage.responseText);
            }
        });
        }

        //Load District when choose city.
        function loadDistrict() {
            listSelectDistrict = '';
            var cityid = $('select[id=cityId]').val();
            var listDistrictbyCity = listDistrict.filter(function (data) {
                return data.CityID == cityid;
            })
            if (listDistrictbyCity == '') listSelectDistrict = '<option value="" disabled selected>Không có dữ liệu</option>';
            for (var i = 0, len = listDistrictbyCity.length; i < len; i++) {
                listSelectDistrict += "<option value='" + listDistrictbyCity[i].ID + "'>" + listDistrictbyCity[i].Name + "</option>";
            }
            $('#districtId').html(listSelectDistrict);
        }
                </script>
            }

