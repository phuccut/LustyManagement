<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="post" action="<?php echo base_url('SanPham');?>" class="form-horizontal">
                    <div class="card-header card-header-text" data-background-color="rose">
                        <h4 class="card-title">Thêm sản phẩm</h4>
                    </div>
                    <div class="card-content">
                        <div id="formThemSanPham">
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Tên sản phẩm</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control" name="TenSanPham">
                                        <span class="help-block">Tên chính xác của sản phẩm ấy Shark</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">    
                                <label class="col-sm-2 label-on-left">Loại sản phẩm</label>
                                <div class="col-lg-5 col-md-6 col-sm-3">
                                    <select class="form-control" title="Loại sản phẩm" data-size="7" name="LoaiSanPham">
                                        <option disabled selected>Chọn loại sản phẩm đi mấy shark</option>
                                        <?php 
                                            foreach ($loaiSanPham as $key) {
                                        ?>
                                        <option value="<?php echo $key['MaInt']; ?>"><?php echo $key['TenLoaiSanPham']; ?></option>
                                        <?php        
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Mô tả</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control" name="MoTa">
                                        <span class="help-block">Nhập cũng được mà không nhập cũng được </span>
                                    </div>
                                </div>
                            </div>

                            <div id="Mau">
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Màu sắc</label>
                                        <div class="col-sm-3">
                                            <select class="form-control" title="Single Select" data-size="7" name="MauSac[]">
                                                <option disabled selected>Chọn màu</option>
                                                <?php 
                                                    foreach ($mau as $key) {
                                                ?>
                                                <option value="<?php echo $key['MaInt']; ?>"><?php echo $key['TenMau']; ?></option>
                                                <?php        
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input type="text" class="form-control" placeholder="Số lượng" name="SoLuong[]">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input type="text" class="form-control" placeholder="Giá" name="Gia[]">
                                            </div>
                                        </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Hình ảnh</label>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-rose btn-round btn-file">
                                                    <span class="fileinput-new">Chọn ảnh</span>
                                                    <span class="fileinput-exists">Thay đổi</span>
                                                    <input type="file" name="HinhAnh" />
                                                </span>
                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Xóa</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <button type="submit" class="btn btn-fill btn-rose center">Thêm</button>
                        <button type="button" onclick="ThemMau();" class="btn btn-fill btn-rose center">Thêm màu</button>
                    </div>
                </form>
            </div> <!-- END CARD -->
        </div>
    </div>
<!-- end row -->
</div>
