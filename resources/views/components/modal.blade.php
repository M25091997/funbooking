
<div class="modal fade modal-section" id="signinsocilamedia" tabindex="-1" aria-labelledby="signinsocilamediaLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <div class="model-headline">
               <h2 class="modal-title fs-5" id="signinsocilamediaLabel">Get Started</h2>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
       
              {{-- <a href="#">
              <div class="register-modal">
                  <div class="row">
                     <div class="col-2">
                        <div class="social-icon-modal">
                           <img src="{{ asset('images/google.png') }}" alt="social media icon">
                        </div>
                     </div>
                     <div class="col-10">
                        <div class="content-modal">
                           Continue with google
                        </div>
                     </div>
                  </div>
               </div>
              </a>
           
          
             <a href="#">
             <div class="register-modal">
                  <div class="row">
                     <div class="col-2">
                        <div class="social-icon-modal">
                           <img src="{{ asset('images/apple.png') }}" alt="social media icon">
                        </div>
                     </div>
                     <div class="col-10">
                        <div class="content-modal">
                           Continue with google
                        </div>
                     </div>
                  </div>
               </div>
             </a>
           
              <a href="#">
              <div class="register-modal">
                  <div class="row">
                     <div class="col-2">
                        <div class="social-icon-modal">
                           <img src="{{ asset('images/gmail.png') }}" alt="social media icon">
                        </div>
                     </div>
                     <div class="col-10">
                        <div class="content-modal">
                           Continue with google
                        </div>
                     </div>
                  </div>
               </div>
              </a>
           
            <div class="or-model">
            OR
         </div> --}}
       
            <form action="{{ route('sendotp') }}" method="post" id="login-form">
               @csrf
               <div class="row">
                  <div class="col-12">
                     <div class="mb-3">
                        <input  class="form-control" type="text" id="mobile" name="mobile" placeholder="Enter Mobile Number" pattern="(6|7|8|9)\d{9}$" title="Enter Valid 10-Digit Mobile No." required>
                     </div>
                     <div class="mb-3">
                     <!-- <button class="funBookBtn" data-bs-toggle="modal" data-bs-target="#otpsocilamedia">Submit</button> -->
                     <div class="term-condition">
                     I agree to the <a href="#">Terms & Conditions</a> & <a href="#">Privacy Policy</a>
                     </div>
                     <button class="verifyOtp">Submit</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
        
      </div>
   </div>
</div>

<!-- model end --><div class="modal fade modal-section" id="otpsocilamedia" tabindex="-1" aria-labelledby="otpsocilamediaLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h2 class="modal-title fs-5" id="otpsocilamediaLabel" data-bs-toggle="modal" data-bs-target="#signinsocilamedia"><i class="fa-solid fa-angle-left"></i></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            
            <form action="{{ route('verifyotp') }}" method="post" id="otp-form">
               @csrf
               <div class="opt-modal">
                  <div class="otp-mobile">
                     <h2>Verify your Mobile Number</h2>
                  </div>
                  <div class="sent-num">
                     Enter OTP sent to <span id="mobile-no"></span>
                  </div>
              
          
        <div class="otp-box">
         <ul>
            <li>
               <input type="text" name="otp[]" class="otp" maxlength="1" required/>
            </li>
            <li>
               <input type="text" name="otp[]" class="otp" maxlength="1" required/>
            </li>
            <li>
               <input type="text" name="otp[]" class="otp" maxlength="1" required/>
            </li>
            <li>
               <input type="text" name="otp[]" class="otp" maxlength="1" required/>
            </li>
            <li>
               <input type="text" name="otp[]" class="otp" maxlength="1" required/>
            </li>
            <li>
               <input type="text" name="otp[]" class="otp" maxlength="1" required/>
            </li>
         </ul>
         </div>
        </div>
          
            <div class="term-condition">
           <p>
            Expert OTP in 26 seconds
           </p>
      <button class="verifyOtp">Continue</button>
            </div>
      </form>
         </div>
      </div>
   </div>
</div>
    <script>
        $(document).ready(function() {
            $('body').on('keyup','.otp', function(e) {
               if($(this).val().length==1){
                  $(this).closest('li').next().find('.otp').focus();
               }
            });
            $('#login-form').on('submit', function(e) {
                e.preventDefault();
                let mobile = $('#mobile').val();

                $.ajax({
                    url: "{{ route('sendotp') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        mobile: mobile
                    },
                    success: function(response) {
                        console.log(response);
                        // data-bs-toggle="modal" data-bs-target="#otpsocilamedia"
                        //$('#response').html(response.message);
                        //var data=JSON.parse(response);
                        //var otp=data['otp'];
                        //var data=JSON.parse(response);
                        $('#mobile-no').text(response['mobile'])
                        $('#signinsocilamedia').modal('hide');
                        $('#otpsocilamedia').modal('show');
                        var otp=response['otp'].toString();
                        for (let i = 0; i < otp.length; i++) {
                           //console.log(otp.charAt(i));
                           $('.otp:eq('+i+')').val(otp.charAt(i));
                        }
                        
                    },
                    error: function(response) {
                        $('#response').html('An error occurred.');
                    }
                });
            });
            $('#otp-form').on('submit', function(e) {
                e.preventDefault();
                let otps = [];
                $('input[name="otp[]"]').each(function() {
                    otps.push($(this).val());
                });


                $.ajax({
                    url: "{{ route('verifyotp') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        otp: otps
                    },
                    success: function(response) {
                        console.log(response);
                        window.location="{{ route('website.profile') }}"
                    },
                    error: function(response) {
                        $('#response').html('An error occurred.');
                    }
                });
            });
        });
    </script>