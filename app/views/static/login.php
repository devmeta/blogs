<div class="section section-we-made-3" id="projects">
    <div class="container">
        <div class="row">
            <div class="title add-animation">
                <h2><?php echo locale('login');?></h2>
                <div class="separator-container">
                    <div class="separator line-separator"><span class="typcn typcn-star-full-outline"></span></div>
                </div>
                <p><?php echo locale('login-title');?><br><br></p>
				<form class="form ajax form-controls" action="/login">
					<div class="form-group">
						<input type="text" name="email" class="form-control input-lg" placeholder="Email or username">
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control input-lg" placeholder="**********">
					</div>
					<?php echo messages();?>
					<div class="alert alert-danger hide"></div>
					<div class="form-group">
						<button type="submit" class="btn btn-lg btn-success btn-login"><span class="typcn typcn-arrow-loop"></i> <?php echo locale('start-session');?></button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
