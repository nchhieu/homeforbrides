<!--  CONTACT  -->

<div class="contact main-block">
  <div class="left-content col-lg-9">
    <div class="scroller"> 
      <!--  MAP  -->
      <div id="map" class="map"></div>
      <!--  //MAP  -->
      <article class="left-content-text">
        <h2>Contacts</h2>
        <strong>Thank you</strong>
        <div class="row contact-details">
          <div class="contact-info col-lg-6 col-md-6 col-sm-6">
           
            <div class="info-block"> <em class="glyph fa-phone"></em> <strong>phone</strong> <span class="phone">707-228-3015</span> </div>
            <div class="info-block"> <em class="glyph fa-envelope"></em> <strong>e-mail</strong> <span>homeforbrides@gmail.com</span> </div>
            <div class="info-block"> <em class="glyph fa-map-marker"></em> <strong>address</strong> <span>77 Van Ness Ave, #101 San Francisco, CA 94102</span> </div>
          </div>
          <div class="form col-lg-6 col-md-6 col-sm-6">
          <h4>

 Thank you for your email. We will get back with you within 24 hours.
 
 <p><a href="http://homeforbrides.com/san-francisco-wedding-photography-price.html" title="Our Price" style="font-size:16px;">Please visit our pricing page for pricing information</a></p>

</h4>
          </div>
        </div>
      </article>
    </div>
    <div class="scroller__track">
      <div class="scroller__bar"></div>
    </div>
  </div>
  
  <!--  RIGHT IMAGES  -->
  <div class="right-images col-lg-3">
    <div class="scroller">
      <ul>
        <?php 
	  foreach($RightBanner as $row){
	  ?>
        <li> <img src="<?php echo Yii::app()->params['domain'].$row['post_thumb']?>" alt="<?php echo $row['post_title']?>"> <span><a href="<?php echo $row['post_intro']?>" title="<?php echo $row['post_title']?>"><em></em></a></span>
          <div> <a href="<?php echo $row['post_intro']?>" title="<?php echo $row['post_title']?>"><span class="title"><?php echo $row['post_title']?></span></a> </div>
        </li>
        <?php
	  } // for
       ?>
      </ul>
    </div>
    <div class="scroller__track">
      <div class="scroller__bar"></div>
    </div>
  </div>
  <!--  //RIGHT IMAGES  --> 
</div>
<!--  //CONTACT  --> 

<div id="thankyou" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hello!</h4>
      </div>
      <div class="modal-body">
        <p style="font-size:15px;">
Thank you for your email! We are currently out of the office for a few weeks due to destination weddings & mini vocation starting from Monday 11-9-2015.</p>
<p style="font-size:15px;">
 We will still have part time access to our email. We apologize for responding to your email slower than normal rate. Please give us a few days to get back to you.
 </p>
 <p style="font-size:15px;">
 Sorry for the inconvenience.</p>
 
<p style="font-size:15px;"> <a href="http://homeforbrides.com/san-francisco-wedding-photography-price.html" title="Our Price" style="color:#002BB7">Please visit our pricing page for pricing information</a></p>
 
<p style="font-size:15px;">
Have a great day !</br></br>

Best,</br>Home For Brides' team.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>