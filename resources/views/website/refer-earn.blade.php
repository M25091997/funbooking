    <x-weblayout>
      <section class="invite-section">
         <div class="container">
            <div class="row">
               <div class="col-lg-6">
                  <div class="left-earn">
                     <h3>
                        INVITE A FRIEND <span>AND GET</span> $5 IN BITCOIN
                     </h3>
                     <p>Be cool. Both get $5 in Bitcoin after spending $200 each.</p>
                     <div class="share-link">
                        <div class="row">
                           <div class="col-lg-9">
                              <div class="invite-link">
                                 <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Share invite link</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="https://www.bitrefill.com/invite/5pseyunc">
                                    <div class="qrscan">
                                       <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                       <img src="./images/qr-code.png" alt="qr-code">
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h2 class="modal-title" id="staticBackdropLabel">Your friends can scan this QR code to join Bitrefill</h2>
                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                       <div class="qrImage">
                                          <img src="./images/model-qr-code.png" alt="qr-code">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="linkBtn">
                                 <button type="submit" class="btn ShareBtn">
                                 <i class="fa-solid fa-share-from-square"></i> Share
                                 </button>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-9">
                              <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">or Invite via email</label>
                                 <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="example@gmail.com">
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="linkBtn">
                                 <button type="submit" class="btn ShareBtn">
                                 <i class="fa-solid fa-paper-plane"></i> Invite
                                 </button>
                              </div>
                           </div>
                           <div class="earn-note">
                              Send multiple e-mails by separating them with commas.
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="refer-img">
                     <img src="./images/refer-earn.webp" alt="earn refer">
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="refer-list-faq">
         <div class="container">
            <div class="row">
               <div class="col-lg-6">
                <div class="left-user-refer-list">
                <div class="headline">
                     <h3>Referral status</h3>
                  </div>
                  <div class="accordion" id="accordionExample">
                     <div class="accordion-item">
                        <h2 class="accordion-header">
                           <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              <div class="refer-user">
                                 <div class="row">
                                    <div class="col-lg-3">
                                       <div class="user-img">
                                          <img src="./images/user2.jpg" alt="user images">
                                       </div>
                                    </div>
                                    <div class="col-lg-9">
                                       <div class="user-earn-details">
                                          <h5>Daisy</h5>
                                          <p>Rewards Earned: <span>S 0</span> ₹ 0</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                           <div class="accordion-body">
                             <div class="refer-earn-list">
                                 <ul>
                                    <li class="connect-refer">
                                    <i class="fa-solid fa-check"></i> SignUp
                                    
                                    </li>
                                    <li>
                                       <div class="successBtn">
                                             Successful
                                       </div>
                                    </li>
                                 </ul>
                                 <ul>
                                    <li class="connect-refer">
                                    <i class="fa-solid fa-check"></i> SignUp
                                    
                                    </li>
                                    <li>
                                       <div class="successBtn">
                                             Successful
                                       </div>
                                    </li>
                                 </ul>

                                 <ul>
                                    <li class="connect-refer">
                                    <i class="fa-solid fa-check"></i> SignUp
                                    
                                    </li>
                                    
                                 </ul>



                             </div>
                           </div>
                        </div>
                     </div>
                     <div class="accordion-item">
                        <h2 class="accordion-header">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                           Accordion Item #2
                           </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                           <div class="accordion-body">
                              <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                           </div>
                        </div>
                     </div>
                     <div class="accordion-item">
                        <h2 class="accordion-header">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                           Accordion Item #3
                           </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                           <div class="accordion-body">
                              <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                           </div>
                        </div>
                     </div>
                  </div>
                </div>
               </div>
               <div class="col-lg-6">
                  <div class="headline">
                     <h3>Frequently asked questions</h3>
                  </div>
                  <div class="right-faq">
                     <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                           <h2 class="accordion-header">
                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#referOne" aria-expanded="true" aria-controls="referOne">
                              What is Bitrefill referral program?
                              </button>
                           </h2>
                           <div id="referOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                 Invite your friends to try out Bitrefill with your unique referral code! After they have spent over $200, you both will receive $5 in bitcoin to your Rewards Balance.
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#referTwo" aria-expanded="false" aria-controls="referTwo">
                              Is there a limit to how many friends I can invite?
                              </button>
                           </h2>
                           <div id="referTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, alias blanditiis repellat ratione praesentium delectus, dolorem quidem adipisci enim, aliquid repellendus architecto facere quis fuga dolore soluta officia inventore molestiae.</p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#referThree" aria-expanded="false" aria-controls="referThree">
                              Where is the $5 credited?
                              </button>
                           </h2>
                           <div id="referThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, alias blanditiis repellat ratione praesentium delectus, dolorem quidem adipisci enim, aliquid repellendus architecto facere quis fuga dolore soluta officia inventore molestiae.</p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header">
                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#referThree" aria-expanded="true" aria-controls="referThree">
                              What is Bitrefill referral program?
                              </button>
                           </h2>
                           <div id="referThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                 Invite your friends to try out Bitrefill with your unique referral code! After they have spent over $200, you both will receive $5 in bitcoin to your Rewards Balance.
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#referFour" aria-expanded="false" aria-controls="referFour">
                              Is there a limit to how many friends I can invite?
                              </button>
                           </h2>
                           <div id="referFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, alias blanditiis repellat ratione praesentium delectus, dolorem quidem adipisci enim, aliquid repellendus architecto facere quis fuga dolore soluta officia inventore molestiae.</p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#referFive" aria-expanded="false" aria-controls="referFive">
                              Where is the $5 credited?
                              </button>
                           </h2>
                           <div id="referFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, alias blanditiis repellat ratione praesentium delectus, dolorem quidem adipisci enim, aliquid repellendus architecto facere quis fuga dolore soluta officia inventore molestiae.</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
    </x-weblayout>