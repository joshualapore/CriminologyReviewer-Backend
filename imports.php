<div class="container">
  <div class="modal fade" id="myModall">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <div class="modal-header">
          <h4 class="modal-title">Import file</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <div class="modal-body">
          <form action="" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">          
            <label>Import File:</label> <input type="file" class="btn-light" name="file" id="file" accept=".xls,.xlsx">
              <button type="submit" id="submit" name="import" class="btn-success">Import</button>
                         
              <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>

              <div class="modal-footer btn-group">
                <button type="button" class="btn-danger" data-dismiss="modal">Close</button>
              </div>

          </form>  
        </div>
        
      </div>
    </div>
  </div>
</div>