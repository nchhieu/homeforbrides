<section class="search hidden-xs">
  <div class="container">
    <div class="row">
      <div class="col-md-12 searchbox">
        <form id="homessearch" action="<?php echo Yii::app()->createUrl("site/search")?>" >
          <div class="innerSearchBox">
            <div class="categories col-md-6 col-sm-6 col-xs-12">
              <label class="hidden-xs">Categories:</label>
              <div class="selectField">
                <select id="tag_id" name="tag_id">
                  <option value="0" selected>All</option>
                  <?php
                  foreach($Tags as $row){
					  echo '<option value="'. $row['tag_id'] .'">'. $row['tag_key'] .'</option>';
				  }
				 ?>
                </select>
              </div>
            </div>
            <div class="location col-md-4 col-sm-6 col-xs-12">
             
               <input type="text" class="form-control" name="key" id="key" style="height:36px;" placeholder="Enter keyword, venues, styles, ideas ...">
             </div>
            <div class="controls col-md-2 col-sm-12 col-xs-12">
              <button type="submit" class="searchBtn">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>