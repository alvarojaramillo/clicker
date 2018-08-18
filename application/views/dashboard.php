   <head>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css')?>">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.min.css')?>">
      <script src="<?php echo base_url('assets/js/gauge.min.css')?>"></script>
      
      
      <?php
        if (isset($this->session->userdata['logged_in'])){
         $userdata = array(
            'username' => $this->session->userdata['logged_in']['username'],
            'logindate' => $this->session->userdata['logged_in']['logindate'],
            'full_name' => $this->session->userdata['logged_in']['full_name'],
            'first_name' => $this->session->userdata['logged_in']['first_name'],
            'eis_sup' => $this->session->userdata['logged_in']['eis_sup'],
            'first_login' => $this->session->userdata['logged_in']['first_login']
         );
            
        }else{
            
        }
      ?>
   </head>
<body><a href="<?php echo base_url() ?>index.php/User_authentication/logout">For Log Out Click Here</a>

      <div class="row">
         <div id="sidebar" class="col-2">
            <center>
               <img src="<?php echo base_url('assets/img/avatar.png')?>">
               <h2> <?php echo $userdata['first_name']?> </h2>
               <h3>
                  <span id="agentid"><?php echo $userdata['username']?></span>
                  
               </h3>
               <h5>Last Login: <?php echo $userdata['logindate']?></h5>
               <h5>Last Login: <?php echo $userdata['first_login']?></h5>
            </center>
            <div class="btn-field">
            <center>
            <h5>Calls</h5>
            <button type="button" id="callsLess" class="btn btn-default btn-minus" onclick="javascript:callsLess()">-</button>
            <button type="button" id="callsPlus" class="btn btn-default btn-plus" onclick="javascript:callsPlus()">+</button>
            </center>
            </div>
            <div class="btn-field">
            <center>
            <h5>Reservations</h5>
            <button type="button" id="RESLess" class="btn btn-default btn-minus" onclick="javascript:RESLess()">-</button>
            <button type="button" id="RESPlus" class="btn btn-default btn-plus" onclick="javascript:RESPlus()">+</button>
            </center>
            </div>
            <div class="btn-field">
            <center>
            <h5>Enrollments</h5>
            <button type="button" id="cmeLess" class="btn btn-default btn-minus" onclick="javascript:CMELess()">-</button>
            <button type="button" id="cmePlus" class="btn btn-default btn-plus" onclick="javascript:CMEPlus()">+</button>
            </center>
            </div>
            <div class="btn-field">
            <center>
            <h5>Partner Offers</span></h5>
            <button type="button" id="pofLess" class="btn btn-default btn-minus" onclick="javascript:POffersLess()">-</button>
            <button type="button" id="pofPlus" class="btn btn-default btn-plus" onclick="javascript:POffersPlus()">+</button>
            </center>

            <span style="display:none;" id="cme"></span>
            <span style="display:none;" id="pof"></span>
              <span style="display:none;" id="res"></span>

            <div style="display:none;" id="loader"></div>
            <div style="display:none;" class="ratios" id="status"></div>
            </div>
         </div>
         <div class="col-10 main">
            <div class="row">
               <div class="col-md-6 col-sm-6
                  col-lg-6 col-xl-3">
                  <div class="dash-widget dash-widget5">
                     <span
                        class="dash-widget-icon bg-success"><i class="fa fa-phone-square"
                        aria-hidden="true"></i></span>
                     <div class="dash-widget-info">
                        <h3><span id="callsClicked">1***</span></h3>
                        <span>Calls</span>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-sm-6
                  col-lg-6 col-xl-3">
                  <div class="dash-widget dash-widget5">
                     <span
                        class="dash-widget-icon bg-info"><i class="fa fa-calendar"
                        aria-hidden="true"></i></span>
                     <div class="dash-widget-info">
                        <h3><span id="RESClicked">1***</span></h3>
                        <span>Reservations</span>
                     </div>
                  </div>
               </div>
               <div class="col-md-6
                  col-sm-6 col-lg-6 col-xl-3">
                  <div class="dash-widget dash-widget5">
                     <span class="dash-widget-icon bg-warning"><i class="fa
                        fa-address-book"></i></span>
                     <div class="dash-widget-info">
                        <h3><span id="CMEClicked">1***</span></h3>
                        <span>Enrollments</span>
                     </div>
                  </div>
               </div>
               <div class="col-md-6
                  col-sm-6 col-lg-6 col-xl-3">
                  <div class="dash-widget dash-widget5">
                     <span class="dash-widget-icon bg-danger"><i class="fa fa-percent"
                        aria-hidden="true"></i></span>
                     <div class="dash-widget-info">
                        <span>
                           <h3><span id="POffersClicked">1***</span></h3>
                           <span>Partner Offers</span>
                        </span>
                     </div>
                  </div>
               </div>
            </div>

               <div id="reservations_graph"></div>
               <div id="enrollments_graph"></div>
               <div id="offers_graph"></div>


            </div>
         </div>
      </div>
   </body>