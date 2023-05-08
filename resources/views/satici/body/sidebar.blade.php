@php
$id = Auth::user()->id;
$verdorId = App\Models\User::find($id);
$status = $verdorId->status;
@endphp

<div class="sidebar-wrapper" data-simplebar="true">
	<div class="sidebar-header">
		<div>
			<img src="{{ asset('adminbackend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
		</div>
		<div>
			<h4 class="logo-text">Satici</h4>
		</div>
		<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
		</div>
	</div>
	<!--navigation-->
	<ul class="metismenu" id="menu">

		<li>
			<a href="{{ route('satici.dashobard') }}">
				<div class="parent-icon"><i class='bx bx-cookie'></i>
				</div>
				<div class="menu-title">Dashboard</div>
			</a>
		</li>

		@if($status === 'active')

		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class='bx bx-home-circle'></i>
				</div>
				<div class="menu-title">Product Manage</div>
			</a>
			<ul>
			<li> <a href="{{ route('satici.all.urun') }}"><i class="bx bx-right-arrow-alt"></i>All Product</a>

			<li> <a href="{{ route('satici.add.urun') }}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
			</ul>
		</li>
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-category"></i>
				</div>
				<div class="menu-title"> Siparis Manage </div>
			</a>
			<ul>
			<li> <a href="{{ route('satici.siparis') }}"><i class="bx bx-right-arrow-alt"></i>Satici Sipariş</a>
			<li> <a href="{{ route('satici.iade.siparis') }}"><i class="bx bx-right-arrow-alt"></i>İade Siparis</a>
			<li> <a href="{{ route('satici.iptal.siparis') }}"><i class="bx bx-right-arrow-alt"></i>Iptal Siparis</a>

			<li> <a href="{{ route('satici.tamam.iade.siparis') }}"><i class="bx bx-right-arrow-alt"></i>Complete Iade Order</a>
			<li> <a href="{{ route('satici.tamam.iptal.siparis') }}"><i class="bx bx-right-arrow-alt"></i>Complete Iptal Order</a>

						</li>						</li>
				
			</ul>
		</li>

		<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title"> Review Manage </div>
					</a>
					<ul>
						<li> <a href="{{ route('satici.all.review') }}"><i class="bx bx-right-arrow-alt"></i>All Review</a>
						</li>



					</ul>
				</li>


		@else


		@endif			 







		


		<li>
			<a href=" " target="_blank">
				<div class="parent-icon"><i class="bx bx-support"></i>
				</div>
				<div class="menu-title">Support</div>
			</a>
		</li>
	</ul>
	<!--end navigation-->
</div>