<body class="grdnt_a mhover_a">
<header>
  <div class="container head_s_a">
     <div class="row sepH_b">
      <div class="nine columns">
        <div id="logo"> <img src="<?php echo base_url().'/'.$schoolLogo;?>" alt="Pertho Admin" /> </div>
        <div id="logo-name">
          <h1 style="font-family:cursive,'Open Sans',sans-serif"><?php echo $schoolName; ?></h1>
        </div>
      </div>
      <div class="three columns">
        <div class="user_box cf">
          <div class="user_avatar"> <img src="<?php echo base_url()?>assets/assets/img/user_female.png" alt="" /> </div>
          <div class="user_info user_sep">
            <p class="sepH_a"> <strong> Welcome </strong>&nbsp;<?php echo $userName; ?> ! </p>
            <span> <a href="#" class="sep">Settings</a> <a href="<?php echo base_url()?>index.php/login/logout">Log out</a> </span> </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="twelve columns">
		<ul id="nav" style="width:100%">
		 <?php

              foreach($coordinatorMenu as $menu=>$subMenu){
              ?>
			
			<li><a href="#"><?php echo $menu; ?></a>
			<?php
				if(count($subMenu) > 0){
				echo "<ul>";
				}
				 foreach($subMenu as $subMenuAttribute){
				?>
					<li><a href="<?php echo base_url();?>index.php/<?php echo $subMenuAttribute['sub_menu_url']; ?>"><?php echo $subMenuAttribute['sub_menu_name']; ?></a></li>				
				
				<?php
				}				
				if(count($subMenu) > 0){
				  echo "</ul>";
				  }
				?>
			</li>
		
			<?php
			}
			?>
			
	<!--<li><a href="<?php //echo base_url()?>index.php/onlineexam/online_exam/onlineexam_student_home">OnlineExam</a>-->
			
		</ul>
      </div>
    </div>
  </div>
  
  <!-- notifications content -->
  
  <div style="display:none">
    <div id="ntf_tickets_panel" style="display:none">
      <p class="sticky-title">New Tickets</p>
      <ul class="sticky-list">
        <li> <a href="#">Admin should not break if URL&hellip;</a>
          <p><span class="s_color small">updated 01.04.2012</span></p>
        </li>
        <li> <a href="#">Displaying submenus in custom&hellip;</a>
          <p><span class="s_color small">updated 01.04.2012</span></p>
        </li>
        <li> <a href="#">Featured image on post types.</a>
          <p><span class="s_color small">updated 24.03.2012</span></p>
        </li>
        <li> <a href="#">Multiple feed fixes and&hellip;</a>
          <p><span class="s_color small">updated 22.03.2012</span></p>
        </li>
        <li> <a href="#">Automatic line breaks in&hellip;</a>
          <p><span class="s_color small">updated 18.03.2012</span></p>
        </li>
        <li> <a href="#">Wysiwyg bug with shortcodes.</a>
          <p><span class="s_color small">updated 08.10.2012</span></p>
        </li>
      </ul>
      <a href="#" class="gh_button btn-small">Show all tickets</a> </div>
    <div id="ntf_comments_panel" style="display:none">
      <p class="sticky-title">New Comments</p>
      <ul class="sticky-list">
        <li> <a href="#">Lorem ipsum dolor sit amet&hel+lip;</a>
          <p><span class="s_color small">John Smith on Maiden Castle, Dorset (29.10.2012)</span></p>
        </li>
        <li> <a href="#">Lorem ipsum dolor sit&hellip;</a>
          <p><span class="s_color small">John Smith on Draining and development&hellip; (29.10.2012)</span></p>
        </li>
      </ul>
      <a href="#" class="gh_button btn-small">Show all comments</a> </div>
    <div id="ntf_mail_panel" style="display:none">
      <p class="sticky-title">New Messages</p>
      <ul class="sticky-list">
        <li> <a href="#">Lorem ipsum dolor sit amet&hellip;</a>
          <p><span class="s_color small">From John Smith (29.10.2012)</span></p>
        </li>
        <li> <a href="#">Lorem ipsum dolor sit&hellip;</a>
          <p><span class="s_color small">From John Smith (28.10.2012)</span></p>
        </li>
      </ul>
      <a href="#" class="gh_button btn-small">Show all messages</a> </div>
  </div>
</header>
