<script src='https://www.google.com/recaptcha/api.js'></script>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 mainbanner bannercontact"> 
      
      <!-- Banner Home -->
      <ul class="sliderComing">
        <li class="banner1" style="background: url(/images/bg_contactus.jpg) no-repeat center center; background-size: cover;"> </li>
        ';
      </ul>
      <div class="text" >
        <div class="largetext">Contact us</div>
      </div>
    </div>
  </div>
</div>
<div class="category">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 col-xs-12 sendmessage">
        <p>&nbsp;</p>
        <?php echo $PostCat['cat_intro'];?>
        <p><i class="fa fa-location"></i> 77 Van Ness Ave, #101 San Francisco, CA 94102  &nbsp; <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></p>
        <p>homeforbrides@gmail.com &nbsp; <span class="glyphicon glyphicon-envelope " aria-hidden="true"></span></p>
        <p>707-228-3015 &nbsp; <span class="glyphicon glyphicon glyphicon-phone" aria-hidden="true"></span></p>
        <?php if(isset($_GET['sent'])):?>
        <div class="row">
          <div class="col-md-10">
            <div class="alert alert-info" role="alert">Thank you for your email. We will get back with you within 24 hours.
              <p><a href="/san-francisco-wedding-photography-price.html" title="Our Price" style="font-size:16px;">Please visit our pricing page for pricing information</a></p>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <form action="contact-us.html" method="post" id="contactform" >
          <div class="row">
            <div class="col-md-10">
              <div class="form-group">
                <input type="text" required="required" class="form-control" id="name" name="name" placeholder="Your name">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5">
              <div class="form-group">
                <input type="text" required="required" class="form-control" id="phone" name="phone" placeholder="Your phone">
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <input type="email" required="required" class="form-control" id="email" name="email" placeholder="Email">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10">
              <div class="form-group">
                <input type="date" class="form-control" id="date" name="date" placeholder="Wedding date">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10">
              <div class="form-group">
                <input type="text" class="form-control" id="where" name="where" placeholder="Wedding venue name or the city">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10">
              <div class="form-group">
                <select class="form-control" id="service" name="service"  placeholder="">
                  <option value="">Which one of these service do you need ?</option>
                  <option value="Photo">Photo</option>
                  <option value="Video">Video</option>
                  <option value="Photo and Video">Photo and Video</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10">
              <div class="form-group">
                <select class="form-control" id="type" name="type"  placeholder="What type of wedding ?">
                  <option value="">What type of wedding ?</option>
                  <option value="Western">Western</option>
                  <option value="Chinese/Vietname">Chinese/Vietnamese</option>
                  <option value="Indian/Eastern">Indian/Eastern</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10">
              <div class="form-group">
                <input type="number" class="form-control" id="hour" name="hour" placeholder="How many hours of service do you need ?">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10">
              <div class="form-group">
                <input type="text" class="form-control" id="hear" name="hear" placeholder="How do you hear about us ?">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10">
              <div class="form-group">
                <textarea class="form-control" style="height:80px;" id="message" name="message" placeholder="Message" ></textarea>
              </div>
            </div>
          </div>
          <div class="g-recaptcha" data-sitekey="6LdrgAoUAAAAAPlTVfEtv2J8gSJYU1Hpr4eQ5EAw"></div>
          <p>&nbsp;</p>
          <button type="submit" class="btn btn-default">Send Message</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $this->widget('application.components.Social');?>
