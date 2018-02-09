<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card wizard-card" data-color="rose" id="wizardProfile">
                    <form action="<?php echo base_url('GiaoDich');?>" method="POST">
                        <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                        <div class="wizard-header">
                            <h3 class="wizard-title">
                                Thêm giao dịch mới
                            </h3>
                        </div>
                        <div class="wizard-navigation">
                            <ul>
                                <li>
                                    <a href="#LoaiGiaoDich" data-toggle="tab">Loại Giao Dịch</a>
                                </li>
                                <li>
                                    <a href="#NoiDung" data-toggle="tab">Nội dung</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <!-- TAB 1 -->
                            <div class="tab-pane" id="LoaiGiaoDich">
                                <h4 class="info-text"> Vui lòng chọn loại giao dịch </h4>
                                <div class="row">
                                    <div class="col-lg-10 col-lg-offset-1">
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-radio">
                                                <input type="radio" name="LoaiGiaoDich" value="1">
                                                <div class="icon">
                                                    <i class="fa fa-cube"></i>
                                                </div>
                                                <h6>Nhập hàng</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-radio">
                                                <input type="radio" name="LoaiGiaoDich" value="2">
                                                <div class="icon">
                                                    <i class="fa fa-terminal"></i>
                                                </div>
                                                <h6>Đóng góp</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-radio">
                                                <input type="radio" name="LoaiGiaoDich" value="3">
                                                <div class="icon">
                                                    <i class="fa fa-terminal"></i>
                                                </div>
                                                <h6>Mua đồ</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-radio">
                                                <input type="radio" name="LoaiGiaoDich" value="4">
                                                <div class="icon">
                                                    <i class="fa fa-terminal"></i>
                                                </div>
                                                <h6>Vận chuyển</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-radio">
                                                <input type="radio" name="LoaiGiaoDich" value="4">
                                                <div class="icon">
                                                    <i class="fa fa-terminal"></i>
                                                </div>
                                                <h6>Trả công</h6>
                                            </div>
                                        </div>
 
                                    </div>
                                </div>
                            </div>
                            <!-- Tab 2 -->
                            <div class="tab-pane" id="NoiDung">
                                <?php include("ThemGiaoDichSub.php"); ?>
                            </div>
                        </div>
                        <div class="wizard-footer">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-rose btn-wd' name='next' value='Tiếp theo' onclick="InitLGD();" />
                                <input type='submit' class='btn btn-finish btn-fill btn-rose btn-wd' name='finish' value='finish' />
                            </div>
                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Trở lại' />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- wizard container -->    
        </div>
    <!-- end col-md-12 -->
    </div>
<!-- end row -->
</div>
