<div class="deznav">
	<div class="deznav-scroll">
		<ul class="metismenu" id="menu">
			<li><a class="ai-icon" href="<?php echo e(route('home')); ?>" aria-expanded="false">
					<i class="flaticon-381-networking"></i>
					<span class="nav-text">Dashboard</span>
				</a>
			</li>
			<?php if(Myhelper::can(['company_manager', 'change_company_profile', 'scheme_manager'])): ?>
    			<li>
    				<a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
    					<i class="flaticon-381-controls-3"></i>
    					<span class="nav-text">Resources</span>
    				</a>
    				<ul aria-expanded="false">
    				    <?php if(Myhelper::can('company_manager')): ?>
    					    <li><a href="<?php echo e(route('resource', ['type' => 'company'])); ?>">Company Manager</a></li>
    					<?php endif; ?>
                        <?php if(Myhelper::can('change_company_profile')): ?>
    					    <li><a href="<?php echo e(route('resource', ['type' => 'companyprofile'])); ?>">Company Profile</a></li>
    					<?php endif; ?>
                        <?php if(Myhelper::can('scheme_manager')): ?>
    					    <li><a href="<?php echo e(route('resource', ['type' => 'scheme'])); ?>">Scheme Manager</a></li>
    					<?php endif; ?>
    				</ul>
    			</li>
    		<?php endif; ?>
    		<?php if(Myhelper::can(['setup_bank', 'api_manager', 'setup_operator'])): ?>
    			<li>
    				<a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
    					<i class="fa-regular fa-gear fw-bold"></i>
    					<span class="nav-text">Setup Tools</span>
    				</a>
    				<ul aria-expanded="false">
    				    <?php if(Myhelper::can('api_manager')): ?>
    					    <li><a href="<?php echo e(route('setup', ['type' => 'api'])); ?>">API Manager</a></li>
    					<?php endif; ?>
        				<?php if(Myhelper::can('api_manager')): ?>
        					<li><a href="<?php echo e(route('setup', ['type' => 'bank'])); ?>">Bank Account</a></li>
        				<?php endif; ?>
        				<?php if(Myhelper::can('api_manager')): ?>
        				    <li><a href="<?php echo e(route('setup', ['type' => 'operator'])); ?>">Operator Manager</a></li>
        				<?php endif; ?>
        				<?php if(Myhelper::can('api_manager')): ?>
        				    <li><a href="<?php echo e(route('setup', ['type' => 'portalsetting'])); ?>">Portal Setting</a></li>
        				<?php endif; ?>
    				</ul>
    			</li>
    		<?php endif; ?>
    		<?php if(Myhelper::can(['view_apiuser', 'view_mis', 'view_web', 'view_admin'])): ?>
    			<li>
    				<a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
    					<i class="fa-regular fa-user fw-bold"></i>
    					<span class="nav-text">Member</span>
    				</a>
    				<ul aria-expanded="false">
    				    <?php if(Myhelper::can(['view_subamdin'])): ?>
        					<li><a href="<?php echo e(route('member', ['type' => 'subadmin'])); ?>">Admin</a></li>
        				<?php endif; ?>
        				<?php if(Myhelper::can(['view_apiuser'])): ?>
        				    <li><a href="<?php echo e(route('member', ['type' => 'apiuser'])); ?>">API User</a></li>
        				<?php endif; ?>
        				<?php if(Myhelper::can(['view_mis'])): ?>
        				    <li><a href="<?php echo e(route('member', ['type' => 'mis'])); ?>">MIS User</a></li>
        				<?php endif; ?>
    				</ul>
    			</li>
			<?php endif; ?>
			<li><a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
					<i class="flaticon-381-network"></i>
					<span class="nav-text">Reports</span>
				</a>
				<ul aria-expanded="false">
				    <?php if(Myhelper::can('collection_statement')): ?>
				        <li><a href="<?php echo e(route('reports', ['type' => 'chargeback'])); ?>">Chargeback</a></li>
					    <li><a href="<?php echo e(route('reports', ['type' => 'payin'])); ?>">Collection</a></li>
					<?php endif; ?>
					<?php if(Myhelper::can('payout_statement')): ?>
					    <li><a href="<?php echo e(route('reports', ['type' => 'payout'])); ?>">Payout</a></li>
					<?php endif; ?>
					<?php if(Myhelper::can('qr_statement')): ?>
					    <li><a href="<?php echo e(route('reports', ['type' => 'upiintent'])); ?>">Intent</a></li>
					<?php endif; ?>
				</ul>
			</li>
			<li><a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
					<i class="flaticon-381-layer-1"></i>
					<span class="nav-text">Account Ledger</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="#">Collection Wallet</a></li>
					<li><a href="#">Payout Wallet</a></li>
				</ul>
			</li>
			<?php if(Myhelper::hasRole('apiuser')): ?>
			    <li><a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
    					<i class="flaticon-381-layer-1"></i>
    					<span class="nav-text">Developer Tools</span>
    				</a>
    				<ul aria-expanded="false">
    					<li><a href="<?php echo e(route('apisetup', ['type' => 'setting'])); ?>">API Settings</a></li>
    					<li><a href="#" target="_blank">Api Documents</a></li>
    				</ul>
    			</li>
    		<?php endif; ?>
		</ul>
	</div>
</div><?php /**PATH /home/u564371677/domains/dashboard.nanakpay.com/public_html/neww/resources/views/layouts/newsidebar.blade.php ENDPATH**/ ?>