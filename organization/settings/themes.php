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
                    <div class="d-flex align-items-center mb-2">
                        <span class="mx-2"><i class="fa fa-palette"></i></span>
                        <h5>Customize color</h5>
                    </div>  
                    <div id="color-picker" >
                        <ul id="color-palette">
                            <li data-color="#4CAF50"><div class="color-selector" style="background-color: #4CAF50;"></div></li>
                            <li data-color="#2196F3"><div class="color-selector" style="background-color: #2196F3;"></div></li>
                            <li data-color="#FF9800"><div class="color-selector" style="background-color: #FF9800;"></div></li>
                            <li data-color="#f44336"><div class="color-selector" style="background-color: #f44336;"></div></li>
                            <li data-color="#9c27b0"><div class="color-selector" style="background-color: #9c27b0;"></div></li>
                            <li data-color="#009688"><div class="color-selector" style="background-color: #009688;"></div></li>
                            <li data-color="#795548"><div class="color-selector" style="background-color: #795548;"></div></li>
                            <li data-color="#607d8b"><div class="color-selector" style="background-color: #607d8b;"></div></li>
                        </ul>
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

