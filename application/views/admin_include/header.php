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
			<li><a href="<?php echo base_url()?>index.php/dashboard/dashboard/admin" style="padding:0px 5px 0px 5px !important; margin-0 !important"><img src="<?php echo base_url()?>assets/assets/img/1_home.png"></a></li></li>
			<?php
				foreach($adminMenu as $menu=>$subMenu){
			?>			
			<li><a href="#"><?php echo $menu; ?></a>
			<?php
				if(count($subMenu) > 0)
				{
					echo "<ul>";
				}
				foreach($subMenu as $subMenuAttribute)
				{
			?>
					<li>
						<a href="<?php echo base_url();?>index.php/<?php echo $subMenuAttribute['sub_menu_url']; ?>">
							<?php echo $subMenuAttribute['sub_menu_name']; ?>
						</a>
					</li>				
			<?php
				}				
				if(count($subMenu) > 0)
				{
				  echo "</ul>";
				}
			?>
			</li>
			<?php
			}
			?>			
		</ul>
      </div>
    </div>
  </div>
  <!-- notifications content -->
</header>
