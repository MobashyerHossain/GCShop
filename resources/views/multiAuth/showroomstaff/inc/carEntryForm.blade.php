<form class="product-options mt-3" id="car-entry" >
    <div class="form-row">
        <div class="col col-12">
            <h4>Car Informations</h4>
        </div>

        <!-- Name -->
        <div class="col col-12" style="padding:10px;">
          <input class="form-control" type="text" style="text-transform:capitalize; box-shadow:none !important;" placeholder="Name" required>
        </div>

        <!-- Price -->
        <div class="col col-6" style="padding:10px;">
            <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="font-weight:bold;">$</span>
                </div>
                <input class="form-control" type="text" style="text-transform:capitalize; box-shadow:none !important;" placeholder="Price">
                <div class="input-group-append">
                  <span class="input-group-text" style="font-weight:bold;">.00</span>
                </div>
            </div>
        </div>

        <!-- Discount -->
        <div class="col col-6" style="padding:10px;">
            <div class="input-group">
                <input class="form-control" type="number" min="0" max="100" style="text-transform:capitalize; box-shadow:none !important;" placeholder="Discount">
                <div class="input-group-append">
                  <span class="input-group-text" style="font-weight:bold;">%</span>
                </div>
            </div>
        </div>

        <!-- Image -->
        <div class="col col-3" style="padding:10px;">
          <button class="btn btn-primary" onclick="uploadImage()" style="width:100%; text-transform:capitalize; box-shadow:none !important;"><span class="fa fa-plus mr-2"></span>Image</button>
          <input id="image" class="d-none" type="file" onchange=""/>
        </div>

        <!-- Color -->
        <div class="col col-3" style="padding:10px;">
          <input class="form-control" type="text" style="text-transform:capitalize; box-shadow:none !important;" placeholder="Color">
        </div>

        <!-- Car Make -->
        <div class="col col-6" style="padding:10px;">
            <div class="input-group">
                <select class="form-control" style="text-transform:capitalize; box-shadow:none !important;">
                  <option value="0" selected hidden disabled>Car Make</option>
                  <option value="13">This is item 1</option>
                  <option value="14">This is item 2</option>
                  <option value="15">This is item 3</option>
                  <option value="16">This is item 4</option>
                </select>
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button" style="text-transform:capitalize; box-shadow:none !important;"><span class="fa fa-plus mr-2"></span>New</button>
                </div>
            </div>
        </div>

        <!-- Car Model -->
        <div class="col col-6" style="padding:10px;">
            <div class="input-group">
                <select class="form-control" style="text-transform:capitalize; box-shadow:none !important;">
                  <option value="0" selected hidden disabled>Car Model</option>
                  <option value="13">This is item 1</option>
                  <option value="14">This is item 2</option>
                  <option value="15">This is item 3</option>
                  <option value="16">This is item 4</option>
                </select>
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button" style="text-transform:capitalize; box-shadow:none !important;"><span class="fa fa-plus mr-2"></span>New</button>
                </div>
            </div>
        </div>

        <!-- Car Engine -->
        <div class="col col-6" style="padding:10px;">
            <div class="input-group">
                <select class="form-control" style="text-transform:capitalize; box-shadow:none !important;">
                  <option value="0" selected hidden disabled>Car Engine</option>
                  <option value="13">This is item 1</option>
                  <option value="14">This is item 2</option>
                  <option value="15">This is item 3</option>
                  <option value="16">This is item 4</option>
                </select>
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button" style="text-transform:capitalize; box-shadow:none !important;"><span class="fa fa-plus mr-2"></span>New</button>
                </div>
            </div>
        </div>

        <!-- Details-->
        <div class="details col-12 row mr-auto ml-auto m-0 p-0">
        </div>

        <!-- Add Details Button-->
        <div class="col col-12" style="padding:10px;">
          <button class="btn btn-primary add_detail_fields" style="text-transform:capitalize; box-shadow:none !important;"><span class="fa fa-plus mr-2"></span>More Car Details</button>
        </div>

        <!-- Submit -->
        <div class="col col-12" style="padding:10px;">
          <button class="btn btn-primary" type="submit" style="margin-right:25%;margin-left:25%;width:50%; text-transform:capitalize; box-shadow:none !important;">Add Car to Inventory</button>
        </div>
    </div>
</form>
