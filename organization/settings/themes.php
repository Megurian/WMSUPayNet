<div class="container-fluid">

    <div class="d-flex">
          <div class="col-md-5 mt-5">
                 <div class="col-md-8 mb-2 p-2 rounded border">
                    <div class="form-group">
                        <label for="themeSelect"><h5>Choose a theme</h5></label>
                        <select class="form-select" id="themeSelect">
                            <option value="theme1">Light</option>
                            <option value="theme2">Dark</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-8 border p-2 rounded mb-2">
                    <h5 class="mb-3">Customize color</h5>
                    <div class="d-flex align-items-center mb-2">
                        <span class="mx-2"><i class="fa fa-palette"></i></span>
                        <span class="mx-2">Custom</span>
                        <input type="color" id="colorPicker" value="#4F46E5">
                    </div>  
                    <h5 class="mt-4 mb-3">Saved colors:</h5>
                    <div class="d-flex flex-wrap">
                        <div class="color-swatch mr-2 mb-2" style="background-color: #FF0000;"></div>
                        <div class="color-swatch mr-2 mb-2" style="background-color: #FFA500;"></div>
                        <div class="color-swatch mr-2 mb-2" style="background-color: #FFFF00;"></div>
                        <div class="color-swatch mr-2 mb-2" style="background-color: #008000;"></div>
                        <div class="color-swatch mr-2 mb-2" style="background-color: #00FFFF;"></div>
                        <div class="color-swatch mr-2 mb-2" style="background-color: #0000FF;"></div>
                        <div class="color-swatch mr-2 mb-2" style="background-color: #800080;"></div>
                        <div class="color-swatch mr-2 mb-2" style="background-color: #00FF00;"></div>
                    </div>
                </div>
                <div class="col-md-8 border px-1 rounded mb-2">
                    <h5 class="mt-4 mb-3">Font Size</h5>
                    <div class="form-group ">
                        <div class="mb-3" >
                            <input type="range" class="custom-range " id="colorSlider" min="0" max="100" value="100">
                        </div>
                    </div>
                </div>
          </div>

          <div class="col-md-5 mt-2">
               <h5 class=" mt-5"> Preview</h5>
               <img src="../../images/preview.jpg" alt="" width="500" height="300" class="image-gluid border border-success">
          </div>
    </div>

</div>

