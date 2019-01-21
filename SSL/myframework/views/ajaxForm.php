<h6 class="mt-5">&nbsp;</h6>
<!-- <h1 class="mt-5">Hello</h1> -->
<div class="container">
<form action="/contact/processForm" method="POST">
  <input type="text" name="email" id="email" placeholder="Email"/>
  <input type="text" name="password" id="password" placeholder="Password"/>
  <input type="checkbox" name="check" id="check"><label for="check">Want emails?</label>
  <button type="button" name="submit" id="submit" onclick="'send'">Submit</button>
</form>
</div>

<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
</script>
<script>

    

        $("#submit").click(function() {

            var un = $("#email").val();
            var pass= $("#password").val();
            var mark = $("#check").is(':checked');
            alert(mark);

            $.ajax({

                method: 'POST',
                url: '/Ajax/processForm',
                data: {"email":un, "password":pass, "checkmark":mark},
                success: function(msg) {
                    if(msg=="bad") {
                        window.document.location.href = "/Ajax"
                    } else {
                        window.document.location.href = "/progess"
                    }
                }

            })

        });

</script>
