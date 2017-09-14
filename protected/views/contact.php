<!--  CONTACT  -->

<div class="contact main-block">
  <div class="left-content col-lg-9">
    <div class="scroller"> 
      <!--  MAP  -->
      <div id="map" class="map"></div>
      <!--  //MAP  -->
      <article class="left-content-text">
        <h2>Contacts</h2>
        <strong>You can contact me</strong>
        <div class="row contact-details">
          <div class="contact-info col-lg-6 col-md-6 col-sm-6">
            <p>Photography starting at $1250 for weekday<br \>
              Videography starting at $1900</p>
            <p class="mini">CLICK HERE for <a href="/san-francisco-wedding-photography-price.html" title="PHOTOGRAPHY PRICING">PHOTOGRAPHY PRICING</a><br \>
             </p>
            <div class="info-block"> <em class="glyph fa-phone"></em> <strong>phone</strong> <span class="phone"><a href="tel:7072283015">707-228-3015</a></span> </div>
            <div class="info-block"> <em class="glyph fa-envelope"></em> <strong>e-mail</strong> <span>homeforbrides@gmail.com</span> </div>
            <div class="info-block"> <em class="glyph fa-map-marker"></em> <strong>address</strong> <span>77 Van Ness Ave, #101 San Francisco, CA 94102</span> </div>
          </div>
          <div class="form col-lg-6 col-md-6 col-sm-6">
            <form action="/site/contact" method="post" id="contactform" >
              <input name="name" id="name" placeholder="Your name" type="text"  />
              <input name="phone" id="phone" placeholder="Phone" type="text" />
              <input name="email" id="email" placeholder="E-mail" type="text" />
              <input name="date" id="date" placeholder="Wedding date" type="text" />
              <input name="where" id="where" placeholder="Where are you getting marry at ?" type="text" />
              <select name="service" id="service" >
                <option value="">Which one of these service do you need ?</option>
                <option value="Video">Video</option>
                <option value="Photo">Photo</option>
                <option value="Photo and Video">Photo and Video</option>
                <option value="Makeup">Makeup</option>
              </select>
              <input name="hours" id="hours" placeholder="How many hours of service do you need ?" type="text" />
              <input name="hear" id="hear" placeholder="How do you hear about us ?" type="text" />
              <textarea name="message" placeholder="message"></textarea>
              <input id="submit" value="send message" type="submit" />
            </form>
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
