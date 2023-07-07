<div class="container">
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg"> 
      <div class="modal-content">
      
        <div class="modal-header bg-light">
          <h4 class="modal-title text-dark">Add Student</h4>
          <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
        </div>
        
        <div class="modal-body bg-light">
          <form method="post">
            <div class="form-group">
              <label for="sid">Student ID:</label>
              <input type="text" class="form-control" name="studentid" id="sid" placeholder="Student Id"onkeypress="return isNumberKey(event)"maxlength="20" required>
            </div>
            <div class="form-group">
              <label for="fn">Firstname:</label>
              <input type="text" class="form-control" name="firstname" id="fn" placeholder="First Name" maxlength="20"  onkeypress="return ValidateAlpha(event)" required>
            </div>
            <div class="form-group">
              <label for="ln">Lastname:</label>
              <input type="text" class="form-control" name="lastname" id="ln" placeholder="Last Name" maxlength="20" onkeypress="return ValidateAlpha(event)" required>
            </div>
    
              <div class="modal-footer btn-group">
                <input type="submit" name="addstudent" class="btn-success" value="Add" style="width: 110px">
                <input type="reset" name="clear" class="btn-info" value="Clear" style="width: 110px">
                <button type="button" class="btn-danger" data-dismiss="modal">Close</button>
              </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
function isNumberKey(evt){
  var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode != 45 && charCode > 31 
  && (charCode < 48 || charCode > 57))
        return false;
        return true;
  }
       
    function ValidateAlpha(evt)
    {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
        return false;
            return true;
    }
</script>