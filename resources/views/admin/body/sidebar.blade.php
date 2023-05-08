<div class="sidebar-wrapper" data-simplebar="true">
	<div class="sidebar-header">
		<div>
			<img src="{{ asset('adminbackend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
		</div>
		<div>
			<h4 class="logo-text">Admin</h4>
		</div>
		<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
		</div>
	</div>
	<!--navigation-->
	<ul class="metismenu" id="menu">

		<li>
			<a href="{{ route('admin.dashobard') }}">
				<div class="parent-icon"><i class='bx bx-cookie'></i>
				</div>
				<div class="menu-title">Dashboard</div>
			</a>
		</li>

		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class='bx bx-home-circle'></i>
				</div>
				<div class="menu-title">Marka</div>
			</a>
			<ul>
				<li> <a href="{{ route('all.brand') }}"><i class="bx bx-right-arrow-alt"></i>Türm Marka</a> </li>
				<li> <a href="{{ route('add.brand') }}"><i class="bx bx-right-arrow-alt"></i>Marka Ekle </a>
			</ul>
		</li>
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-category"></i>
				</div>
				<div class="menu-title">Kategori</div>
			</a>
			<ul>
				<li> <a href="{{ route('all.category') }}"><i class="bx bx-right-arrow-alt"></i>Tüm Kategori</a>
				</li>
				<li> <a href="{{ route('add.category') }}"><i class="bx bx-right-arrow-alt"></i>Kategori Ekle</a>
				</li>

			</ul>
		</li>

		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-category"></i>
				</div>
				<div class="menu-title">Alt Kategori</div>
			</a>
			<ul>
				<li> <a href="{{ route('all.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>Tüm Alt Kategori</a>
				</li>
				<li> <a href="{{ route('add.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>Alt Kategori Ekle</a>
				</li>

			</ul>
		</li>

		<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Ürün Yönetimi</div>
					</a>
					<ul>
					<li> <a href="{{ route('all.urun') }}"><i class="bx bx-right-arrow-alt"></i>Tüm Ürün</a>

					<li> <a href="{{ route('ekle.urun') }}"><i class="bx bx-right-arrow-alt"></i>Ürün Ekle</a>

					</ul>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Slider Yönetimi</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.slider') }}"><i class="bx bx-right-arrow-alt"></i>Tüm Slider</a>
						</li>
						<li> <a href="{{ route('add.slider') }}"><i class="bx bx-right-arrow-alt"></i>Slider Ekle</a>						</li>

					</ul>
				</li>
<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Banner Yönetimi</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.afis') }}"><i class="bx bx-right-arrow-alt"></i>Tüm Banner</a>
						</li>
						<li> <a href="{{ route('add.afis') }}"><i class="bx bx-right-arrow-alt"></i>Banner Ekle</a>						</li>

					</ul>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Kupon Sistemi</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.coupon') }}"><i class="bx bx-right-arrow-alt"></i>Tüm Kupon</a>
						</li>
						<li> <a href="{{ route('add.coupon') }}"><i class="bx bx-right-arrow-alt"></i>Kupon Ekle</a>
						</li>

					</ul>
				</li>


				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Teslimat Alanı </div>
					</a>
					<ul>
					<li> <a href="{{ route('all.bolum') }}"><i class="bx bx-right-arrow-alt"></i>Tüm Bölüm</a>
						</li>
						<li> <a href="{{ route('all.bolge') }}"><i class="bx bx-right-arrow-alt"></i>Tüm Bölge</a>


						<li> <a href="{{ route('all.durum') }}"><i class="bx bx-right-arrow-alt"></i>Tüm Sokak</a>
						</li>

					</ul>
				</li>





		<li class="menu-label">Önemli Kısım</li>

		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class='bx bx-cart'></i>
				</div>
				<div class="menu-title">Satici Yönetimi </div>
			</a>
			<ul>
				<li> <a href="{{ route('inactive.satici') }}"><i class="bx bx-right-arrow-alt"></i>Inactive Satici</a>
				<li> <a href="{{ route('active.satici') }}"><i class="bx bx-right-arrow-alt"></i>Active Satici</a>		</li>
			</ul>
		</li>
		<li>

		<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Sıparış Yönetimi </div>
					</a>
					<ul>
						<li> <a href="{{ route('beklemede.siparis') }}"><i class="bx bx-right-arrow-alt"></i>Beklemede Sipariş</a>
						</li>
						<li> <a href="{{ route('admin.onay.siparis') }}"><i class="bx bx-right-arrow-alt"></i>Onayla Siparış</a>
						</li>
						<li> <a href="{{ route('admin.isleniyor.siparis') }}"><i class="bx bx-right-arrow-alt"></i>İşelniyor Sıparış</a>
						</li>
						<li> <a href="{{ route('admin.teslim_edildi.siparis') }}"><i class="bx bx-right-arrow-alt"></i>Teslim Edildi Sıparış</a>
						</li>

					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Iade Sıparış </div>
					</a>
					<ul>
						<li> <a href="{{ route('iade.istek') }}"><i class="bx bx-right-arrow-alt"></i>Iade Istek</a>
						</li>
						<li> <a href="{{ route('tamam.iade.istek') }}"><i class="bx bx-right-arrow-alt"></i>Istek Tamamla</a>
						</li> 
					</ul>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Iptal Sıparış </div>
					</a>
					<ul>
						<li> <a href="{{ route('iptal.istek') }}"><i class="bx bx-right-arrow-alt"></i>Iptal Istek</a>
						</li>
						<li> <a href="{{ route('tamam.iptal.istek') }}"><i class="bx bx-right-arrow-alt"></i>Istek Tamamla</a>
						</li> 
					</ul>
				</li>


				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>

	
				</div>
				<div class="menu-title">Rapor Yönetimi</div>
			</a>
			<ul>
			<li> <a href="{{ route('rapor.view') }}"><i class="bx bx-right-arrow-alt"></i>Rapor View</a>
				</li>

				<li> <a href="{{ route('siparis.by.user') }}"><i class="bx bx-right-arrow-alt"></i>Kullanıcıya Göre Sipariş</a>
						</li>

			</ul>
		</li>

		<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Kullanıcı Yönetimi</div>
					</a>
					<ul>
						<li> <a href="{{ route('all-user') }}"><i class="bx bx-right-arrow-alt"></i>Tüm Kullanıcı</a>
						</li>

							<li> <a href="{{ route('all-satici') }}"><i class="bx bx-right-arrow-alt"></i>Tüm Satici</a>
						</li>


					</ul>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Blog Yönetimi</div>
					</a>
					<ul>
						<li> <a href="{{ route('admin.blog.category') }}"><i class="bx bx-right-arrow-alt"></i>Tüm Blog Kategori</a>
						</li>

						<li> <a href="{{ route('admin.blog.post') }}"><i class="bx bx-right-arrow-alt"></i>Tüm Blog Post</a>
						</li>
					</ul>
				</li>


				<li>
		<a href="javascript:;" class="has-arrow">
			<div class="parent-icon"><i class="bx bx-category"></i>
			</div>
			<div class="menu-title">Yorum Yönetimi</div>
		</a>
		<ul>
			<li> <a href="{{ route('beklemede.review') }}"><i class="bx bx-right-arrow-alt"></i>Beklemede Review</a>
			</li>

			<li> <a href="{{ route('paylas.review') }}"><i class="bx bx-right-arrow-alt"></i>Paylaşmış Review</a>
			</li>


		</ul>
	</li>

	<li>
	<a href="javascript:;" class="has-arrow">
			<div class="parent-icon"><i class="bx bx-category"></i>
			</div>
			<div class="menu-title">Ayarlar Yönetimi</div>
		</a>
		<ul>
			<li> <a href="{{ route('site.setting') }}"><i class="bx bx-right-arrow-alt"></i>Site Ayarları</a>
			</li>

			<li> <a href="{{ route('seo.setting') }}"><i class="bx bx-right-arrow-alt"></i>Seo Ayarları</a>
			</li>


		</ul>
	</li>
	<li>
		<a href="javascript:;" class="has-arrow">
			<div class="parent-icon"><i class="bx bx-category"></i>
			</div>
			<div class="menu-title">Stok Yönetimi</div>
		</a>
		<ul>
			<li> <a href="{{ route('urun.stock') }}"><i class="bx bx-right-arrow-alt"></i>Ürün Stok</a>
			</li>




		</ul>
	</li>


		




		<li class="menu-label">Charts & Maps</li>
		<li>
			<a class="has-arrow" href="javascript:;">
				<div class="parent-icon"><i class="bx bx-line-chart"></i>
				</div>
				<div class="menu-title">Charts</div>
			</a>
			<ul>
				<li> <a href="charts-apex-chart.html"><i class="bx bx-right-arrow-alt"></i>Apex</a>
				</li>
				<li> <a href="charts-chartjs.html"><i class="bx bx-right-arrow-alt"></i>Chartjs</a>
				</li>
				<li> <a href="charts-highcharts.html"><i class="bx bx-right-arrow-alt"></i>Highcharts</a>
				</li>
			</ul>
		</li>



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