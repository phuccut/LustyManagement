<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-sm-12">
        <h4 class="info-text">Nội dung giao dịch</h4>
    </div>
    <div class="col-sm-12">
        <div class="form-group label-floating">
            <label class="control-label">Mô tả giao dịch</label>
            <input type="text" name="MoTa" class="form-control" id="MoTa">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">Số tiền</label>
            <input type="text" name="SoTien" class="form-control" id="SoTien">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">Ngân sách</label>
            <select name="NganSach" class="form-control" id="NganSach">
                <option value="1">Ngân sách tổng</option>
            </select>
        </div>
    </div>
</div>