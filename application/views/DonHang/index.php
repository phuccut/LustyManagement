<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Danh sách đơn hàng</h4>
                    <div class="toolbar">
                        <button class="btn btn-primary btn-raised btn-round" onclick="location.href='<?php echo base_url('DonHang/ThemDonHang');?>'">Thêm đơn hàng mới</button>
                    </div>
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Mã</th>
                                    <th>Trạng thái</th>
                                    <th>Khách hàng</th>
                                    <th>Thời gian</th>
                                    <th>Người tạo</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Mã</th>
                                    <th>Trạng thái</th>
                                    <th>Khách hàng</th>
                                    <th>Thời gian</th>
                                    <th>Người tạo</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </tfoot>
                            <tbody id="tbody">
                            </tbody>
                        </table>
                    </div>
                    <!-- Classic Modal -->
                    <div class="modal fade" id="modalChiTiet" tabindex="-1" role="dialog" aria-labelledby="modalChiTiet" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        <i class="material-icons">clear</i>
                                    </button>
                                    <h4 class="modal-title">Modal title</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>Mã</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                                <th>Thành tiền</th>
                                            </thead>
                                            <tbody id="bodyChiTiet">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-simple">Nice Button</button>
                                    <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  End Modal -->
                </div>
            <!-- end content-->
             </div>
        <!--  end card  -->
        </div>
    <!-- end col-md-12 -->
    </div>
<!-- end row -->
</div>
