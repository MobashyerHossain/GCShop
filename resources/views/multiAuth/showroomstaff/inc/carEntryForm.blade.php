<form class="product-option" id="car-entry" >
    <div class="form-row">
        <!-- Name -->
        <div class="col-12 col-md-6" style="padding:10px;">
          <label for="car_name" style="margin:0px;font-size:12px;">Car Name</label>
          <input id="car_name" name="car_name" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('car_name') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ old('car_name') }}" placeholder="Car Name" required>

          @if ($errors->has('car_name'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('car_name') }}</strong>
              </span>
          @endif
        </div>

        <!-- stock -->
        <div class="col-12 col-md-6" style="padding:10px;">
          <label for="car_stock" style="margin:0px;font-size:12px;">Car Stock</label>
          <div class="input-group">
              <input id="car_stock" name="car_stock" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('car_stock') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ old('car_stock') }}" placeholder="Car Stock" required onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));">
              <div class="input-group-append" style="border: 1px solid #a5a5a5;">
                <span class="input-group-text no-outline rounded-0" style="font-weight:bold;">Pieces</span>
              </div>
          </div>

          @if ($errors->has('car_stock'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('car_stock') }}</strong>
              </span>
          @endif
        </div>

        <!-- buying Price -->
        <div class="col-12 col-md-6" style="padding:10px;">
            <label for="buying_price" style="margin:0px;font-size:12px;">Buying Price</label>
            <div class="input-group">
                <div class="input-group-prepend" style="border: 1px solid #a5a5a5;">
                  <span class="input-group-text no-outline rounded-0" style="font-weight:bold;">$</span>
                </div>
                <input id="buying_price" name="buying_price" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('buying_price') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ old('buying_price') }}" placeholder="Buying Price" required onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));">
                <div class="input-group-append" style="border: 1px solid #a5a5a5;">
                  <span class="input-group-text no-outline rounded-0" style="font-weight:bold;">.00</span>
                </div>
            </div>

            @if ($errors->has('buying_price'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('buying_price') }}</strong>
                </span>
            @endif
        </div>

        <!-- selling Price -->
        <div class="col-12 col-md-6" style="padding:10px;">
            <label for="selling_price" style="margin:0px;font-size:12px;">Selling Price</label>
            <div class="input-group">
                <div class="input-group-prepend" style="border: 1px solid #a5a5a5;">
                  <span class="input-group-text no-outline rounded-0" style="font-weight:bold;">$</span>
                </div>
                <input id="selling_price" name="selling_price" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('selling_price') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ old('selling_price') }}" placeholder="Selling Price" required onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));">
                <div class="input-group-append" style="border: 1px solid #a5a5a5;">
                  <span class="input-group-text no-outline rounded-0" style="font-weight:bold;">.00</span>
                </div>
            </div>

            @if ($errors->has('selling_price'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('selling_price') }}</strong>
                </span>
            @endif
        </div>

        <!-- Discount -->
        <div class="col-12 col-md-6" style="padding:10px;">
            <label for="discount" style="margin:0px;font-size:12px;">Discount</label>
            <div class="input-group">
                <input id="discount" name="discount" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }} no-outline rounded-0" type="number" min="0" max="100" value="{{ old('discount') }}" placeholder="Discount">
                <div class="input-group-append" style="border: 1px solid #a5a5a5;">
                  <span class="input-group-text no-outline rounded-0" style="font-weight:bold;">%</span>
                </div>
            </div>

            @if ($errors->has('discount'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('discount') }}</strong>
                </span>
            @endif
        </div>

        <!-- Max Discount -->
        <div class="col-12 col-md-6" style="padding:10px;">
            <label for="max_discount" style="margin:0px;font-size:12px;">Max Discount Possible</label>
            <div class="input-group">
                <input id="max_discount" name="max_discount" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('max_discount') ? ' is-invalid' : '' }} no-outline rounded-0" type="number" min="0" max="100" value="{{ old('max_discount') }}" placeholder="Max Discount Possible">
                <div class="input-group-append" style="border: 1px solid #a5a5a5;">
                  <span class="input-group-text no-outline rounded-0" style="font-weight:bold;">%</span>
                </div>
            </div>

            @if ($errors->has('max_discount'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('max_discount') }}</strong>
                </span>
            @endif
        </div>

        <!-- Car Maker -->
        <div class="col col-6" style="padding:10px;">
            <div class="input-group">
                <select id="car_maker" name="car_maker" style="border: 1px solid #a5a5a5;" class="form-control no-outline rounded-0">
                  <option value="0" selected hidden disabled>Car Maker</option>
                  @foreach((new App\Models\Product\CarMaker())->getAllMakers() as $carmaker)
                    <option value="{{$carmaker->id}}">{{$carmaker->name}}</option>
                  @endforeach
                </select>
                <div class="input-group-append">
                  <button class="btn btn-primary no-outline rounded-0 pt-1 pb-1" type="button" data-toggle="modal" data-target="#carMakerModal"><span class="fa fa-plus mr-2"></span>New</button>
                </div>
            </div>
        </div>

        <!-- Car Model -->
        <div class="col col-6" style="padding:10px;">
            <div class="input-group">
                <select id="car_model" name="car_model" style="border: 1px solid #a5a5a5;" class="form-control no-outline rounded-0">
                  <option value="0" selected hidden disabled>Car Model</option>
                  @foreach((new App\Models\Product\CarModel())->getAllModels() as $carmodel)
                    <option value="{{$carmodel->id}}">{{$carmodel->name}}</option>
                  @endforeach
                </select>
                <div class="input-group-append">
                  <button class="btn btn-primary no-outline rounded-0 pt-1 pb-1" type="button" data-toggle="modal" data-target="#carModelModal"><span class="fa fa-plus mr-2"></span>New</button>
                </div>
            </div>
        </div>

        <!-- Image -->
        <div class="col-12 col-md-6" style="padding:10px;">
          <button type="button" class="btn btn-primary no-outline rounded-0 w-100" onclick="uploadCarImage()" style="font-size:13px;"><span class="fa fa-plus mr-2"></span>Image</button>
          <input id="car_image" class="d-none" type="file"/>
        </div>

        <!-- Add Details Button-->
        <div class="col-12 col-md-6" style="padding:10px;">
          <button id="add_car_detail_fields" class="btn btn-primary no-outline rounded-0 w-100" style="font-size:13px;"><span class="fa fa-plus mr-2"></span>Add Car Details</button>
        </div>

        <!-- Car Details-->
        <div id="car_details" class="col-12 row mr-auto ml-auto m-0 p-0">
        </div>

        <!-- Submit -->
        <div class="col-6 ml-auto mr-auto" style="padding:10px;">
          <button class="btn btn-primary no-outline rounded-0" type="submit" style="margin-right:25%;margin-left:25%;width:50%;">Add Car to Inventory</button>
        </div>
    </div>
</form>
