	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li class="sidebar-search-wrapper">
					
					<form class="sidebar-search" action="" method="POST">
						<div class="form-container">
							<!-- <div class="input-box">
								<a href="javascript:;" class="remove"></a>
								<input type="text" placeholder="Search..."/>
								<input textype="button" class="submit" value=" "/>
							</div> -->
						</div>
					</form>
					
				</li>
				<li class="start menuclass" menuvalue="dashboard">
					<a href="{{ URL::to('dashboard') }}">
					<i class="fa fa-home"></i>
					<span class="title">
						Dashboard
					</span>
					<span class="selected">
					</span>
					</a>
				</li>
				<?php if(json_decode(Session::get('usergroupdata')->assets)->all=='true'){ ?>
				<li class="menuclass" menuvalue="assets">
					<a href="{{ URL::route('myassets.index') }}">
					<i class="fa fa-th-large"></i>
					<span class="title">
						Assets
					</span>
					<span class="selected">
					</span>
					</a>
				</li>
				<?php } ?>

				<?php if(json_decode(Session::get('usergroupdata')->assetgroups)->all=='true'){ ?>
				<li class="menuclass" menuvalue="assetgroups">
					<a href="{{ URL::route('assetgroups.index') }}">
					<i class="fa  fa-code-fork"></i>
					<span class="title">
						Asset Groups
					</span>
					<span class="selected">
					</span>
					</a>
				</li>
				<?php } ?>
				
				<?php if(json_decode(Session::get('usergroupdata')->users)->all=='true'){ ?>
				<li class="menuclass" menuvalue="users">
					<a href="{{ URL::route('users.index') }}">
					<i class="fa  fa-user"></i>
					<span class="title">
						User
					</span>
					<span class="selected">
					</span>
					</a>
				</li>
				<?php } ?>

				<?php if(json_decode(Session::get('usergroupdata')->usersgroup)->all=='true'){ ?>
				<li class="menuclass" menuvalue="usersgroup">
					<a href="{{ URL::route('usersgroup.index') }}">
					<i class="fa  fa-sitemap"></i>
					<span class="title">
						User Groups
					</span>
					<span class="selected">
					</span>
					</a>
				</li>
				<?php } ?>

				<?php if(json_decode(Session::get('usergroupdata')->locations)->all=='true'){ ?>
				<li class="menuclass" menuvalue="locations">
					<a href="{{ URL::route('locations.index') }}">
					<i class="fa fa-map-marker"></i>
					<span class="title">
						Locations
					</span>
					<span class="selected">
					</span>
					</a>
				</li>
				<?php } ?>

				<?php if(json_decode(Session::get('usergroupdata')->stores)->all=='true'){ ?>
				<li class="menuclass" menuvalue="stores">
					<a href="{{ URL::route('stores.index') }}">
					<i class="fa fa-building"></i>
					<span class="title">
						Stores
					</span>
					<span class="selected">
					</span>
					</a>
				</li>
				<?php } ?>

				<?php if(json_decode(Session::get('usergroupdata')->grn)->all=='true'){ ?>
				<li class="menuclass" menuvalue="grn">
					<a href="{{ URL::to('grn') }}">
					<i class="fa fa-edit"></i>
					<span class="title">
						GRN
					</span>
					<span class="selected">
					</span>
					</a>
				</li>
				<?php } ?>

				<!-- 
				<li class="menuclass" menuvalue="">
					<a href="{{ URL::route('departments.index') }}">
					<i class="fa fa-qrcode"></i>
					<span class="title">
						GRN
					</span>
					<span class="selected">
					</span>
					</a>
				</li>
				<li class="menuclass" menuvalue="">
					<a href="{{ URL::route('departments.index') }}">
					<i class="fa fa-pencil-square-o"></i>
					<span class="title">
						Asset Request
					</span>
					<span class="selected">
					</span>
					</a>
				</li>
				<li class="menuclass" menuvalue="">
					<a href="{{ URL::route('departments.index') }}">
					<i class="fa fa-inbox"></i>
					<span class="title">
						Gate Pass
					</span>
					<span class="selected">
					</span>
					</a>
				</li> -->

			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->