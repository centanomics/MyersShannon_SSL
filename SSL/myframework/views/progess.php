<div class="container"> 

     
      <h1 class="my-4 mt-5">Login
        <small></small>
      </h1>
      <form action="/progess/loginForm" method="POST">
        <div class="form-group row">
          <label for="username" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="username" placeholder="Username" name="username">
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
          </div>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Bio</label>
          <textarea class="form-control" id="bio" rows="3"></textarea>
        </div>
        <fieldset class="form-group">
          <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Sex</legend>
            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gridRadios" id="male" value="option1" checked name="male">
                <label class="form-check-label" for="gridRadios1">
                  Male
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gridRadios" id="female" value="option2" name="female">
                <label class="form-check-label" for="gridRadios2">
                  Female
                </label>
              </div>
            </div>
          </div>
        </fieldset>
        <div class="form-group row">
          <div class="col-sm-2">Checkbox</div>
          <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="getEmail" name="getEmails">
              <label class="form-check-label" for="gridCheck1">
                Receive emails from us?
              </label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="exampleFormControlSelect1">Age</label>
          <select class="form-control" id="age" name="age">
            <option>18</option>
            <option>19</option>
            <option>20</option>
            <option>21</option>
            <option>22</option>
          </select>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Sign in</button>
          </div>
          <input type="button" class="btn btn-primary" value="Ajax submit" id="ajaxsubmit"/>
        </div>
      </form>

      

</div>
<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script>

  $('#ajaxsubmit').click(function(){
    // alert(1);
    $.ajax({

      method: "POST",
      url: "/welcome/ajaxPars",
      data: { "username":$("#username").val(), 
              "password":$("#password").val(),
              "bio":$("#bio").val(),
              "male":$("#male").val(), "female":$("#female").val(),
              "getEmail":$("#getEmail").val(),
              "age":$("#age").val()},
      success: function(msg) {
        if(msg=="welcome") {
          // alert('success');
          $("#username").removeClass("is-invalid");
          $("#password").removeClass("is-invalid");
          $("#username").addClass("is-valid");
          $("#password").addClass("is-valid");
        } else if(msg=="bad user"){
          // alert('fail user');
          $("#username").removeClass("is-valid");
          $("#username").addClass("is-invalid");
          $("#password").removeClass("is-invalid");
          $("#password").addClass("is-valid");
        } else if(msg=="bad pass") {
          // alert('fail pass');
          $("#username").removeClass("is-invalid");
          $("#username").addClass("is-valid");
          $("#password").removeClass("is-valid");
          $("#password").addClass("is-invalid");
        } else {
          // alert('fail all');
          $("#username").removeClass("is-valid");
          $("#password").removeClass("is-valid");
          $("#username").addClass("is-invalid");
          $("#password").addClass("is-invalid");
        }
      }

    });

  })

</script>