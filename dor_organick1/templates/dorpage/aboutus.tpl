{extends file='page.tpl'}
{block name='page_header_container'}{/block}
{block name='page_content'}
{capture name=path}{l s='About Us'}{/capture}
<h1 class="h1 hidden">{l s="About Us"}</h1>
<div id="dor-about-content">
	<div class="row">
		<div class="about-us-group-1">
			<div class="container">
				<div class="dor-box-html1">
					<div class="box-html-inner">
						<div class="dor-box-header">
						<h2 class="title-box font-vbs"><span class="fnt-size-60">Welcome to organick</span></h2>
						</div>
						<div class="box-html-content">We are <strong>Online Market</strong> of organic fruits, vegetables, juices and dried fruits. Visit our site of a complete list of exclusive we are stocking.</div>
					</div>
				</div>
			</div>
		</div>
		<div class="about-us-group-2">
			<div class="container">
				<div class="row">
					<div class="about-group-steps">
						<div class="step-cols step-left col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="step-signle">
								<span class="icon-step"><span class="icon-item"><i class="flaticon-food"></i></span></span>
								<div class="step-sign-info">
									<h3>{l s="Always Fresh"}</h3>
									<p>Cur tantas regiones barbarorum peat dibus obiit, tot mariata uisque euismod convallis eros quis lacinia</p>
								</div>
							</div>
							<div class="step-signle">
								<span class="icon-step"><span class="icon-item"><i class="flaticon-fruit"></i></span></span>
								<div class="step-sign-info">
									<h3>{l s="Keep You Healthy"}</h3>
									<p>Uisque euismod convallis eros quis lacinia enim rhoncu ur tantas regiones barbarorum peat dibus obiit</p>
								</div>
							</div>
						</div>
						<div class="step-cols step-middle col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="step-col-middle">
								<img src="{$urls.base_url}img/cms/dorado/step-well.png" alt="">
							</div>
						</div>
						<div class="step-cols step-right col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="step-signle">
								<span class="icon-step"><span class="icon-item"><i class="flaticon-broccoli"></i></span></span>
								<div class="step-sign-info">
									<h3>{l s="Make Exercies"}</h3>
									<p>Cur tantas regiones barbarorum peat dibus obiit, tot mariata uisque euismod convallis eros quis lacinia</p>
								</div>
							</div>
							<div class="step-signle">
								<span class="icon-step"><span class="icon-item"><i class="flaticon-salad"></i></span></span>
								<div class="step-sign-info">
									<h3>{l s="Healthy Recipes"}</h3>
									<p>Uisque euismod convallis eros quis lacinia enim rhoncu ur tantas regiones barbarorum peat dibus obiit</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="about-us-group-3" style="background-image:url({$urls.base_url}img/cms/dorado/aboutus/bg-main-step-1.png)">
			<div class="container">
				<div class="row">
					<div class="title-header-tab head-about-group3 col-lg-12 col-sm-12 col-xs-12 text-center">
						<h3><span>{l s="Farm Services"}</span></h3>
						<p><span>{l s="The best services for you"}</span></p>
					</div>
					<div class="about-group-farm-service">
						<div class="farm-service-item col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center">
							<span class="farm-icon"><i class="flaticon-nature-1"></i></span>
							<h3>{l s="Organic Products"}</h3>
							<p>{l s="Cur tantas regiones barbarorum peat dibus obiit, tot mariata uisque euismod convallis eros uils lacinia"}</p>
							<a href="#">{l s="Read more"}</a>
						</div>
						<div class="farm-service-item col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center">
							<span class="farm-icon"><i class="flaticon-star"></i></span>
							<h3>{l s="RFS Machines"}</h3>
							<p>{l s="Cur tantas regiones barbarorum peat dibus obiit, tot mariata uisque euismod convallis eros uils lacinia"}</p>
							<a href="#">{l s="Read more"}</a>
						</div>
						<div class="farm-service-item col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center">
							<span class="farm-icon"><i class="flaticon-food"></i></span>
							<h3>{l s="Food Strategy"}</h3>
							<p>{l s="Cur tantas regiones barbarorum peat dibus obiit, tot mariata uisque euismod convallis eros uils lacinia"}</p>
							<a href="#">{l s="Read more"}</a>
						</div>
						<div class="farm-service-item col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center">
							<span class="farm-icon"><i class="flaticon-nature"></i></span>
							<h3>{l s="Water Management"}</h3>
							<p>{l s="Cur tantas regiones barbarorum peat dibus obiit, tot mariata uisque euismod convallis eros uils lacinia"}</p>
							<a href="#">{l s="Read more"}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="about-us-group-5">
			<div class="container">
				<div class="row">
					<div class="about-our-farmers col-lg-12 col-sm-12 col-xs-12">
						<div class="title-header-tab ourfarmers-head">
							<h3><span>{l s="Our Farmers"}</span></h3>
							<p><span>{l s="We are the best team"}</span></p>
						</div>
						<div class="aboutus-ourfarmers">
							<div class="farmer-item">
								<img src="{$urls.base_url}img/cms/dorado/aboutus/farmer/persion-1.jpg" alt="">
								<h3>Tyler Palmer</h3>
								<span>{l s="Director"}</span>
							</div>
							<div class="farmer-item">
								<img src="{$urls.base_url}img/cms/dorado/aboutus/farmer/persion-2.jpg" alt="">
								<h3>Michael Andrews</h3>
								<span>{l s="Farmer"}</span>
							</div>
							<div class="farmer-item">
								<img src="{$urls.base_url}img/cms/dorado/aboutus/farmer/persion-3.jpg" alt="">
								<h3>Meghan Trainor</h3>
								<span>{l s="Farmer"}</span>
							</div>
							<div class="farmer-item">
								<img src="{$urls.base_url}img/cms/dorado/aboutus/farmer/persion-4.jpg" alt="">
								<h3>Mark Ronson</h3>
								<span>{l s="Farmer"}</span>
							</div>
							<div class="farmer-item">
								<img src="{$urls.base_url}img/cms/dorado/aboutus/farmer/persion-2.jpg" alt="">
								<h3>Tyler Smith</h3>
								<span>{l s="Farmer"}</span>
							</div>
							<div class="farmer-item">
								<img src="{$urls.base_url}img/cms/dorado/aboutus/farmer/persion-3.jpg" alt="">
								<h3>Maria Lee</h3>
								<span>{l s="Farmer"}</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="about-us-group-4">
			<div class="container">
				<div class="row">
					<div class="about-brand-partner col-lg-12 col-sm-12 col-xs-12">
						<div class="aboutPartners">
							<div>
								<a href="#"><img src="{$urls.base_url}img/cms/dorado/aboutus/brands/brand-1.png" alt=""></a>
							</div>
							<div>
								<a href="#"><img src="{$urls.base_url}img/cms/dorado/aboutus/brands/brand-2.png" alt=""></a>
							</div>
							<div>
								<a href="#"><img src="{$urls.base_url}img/cms/dorado/aboutus/brands/brand-3.png" alt=""></a>
							</div>
							<div>
								<a href="#"><img src="{$urls.base_url}img/cms/dorado/aboutus/brands/brand-4.png" alt=""></a>
							</div>
							<div>
								<a href="#"><img src="{$urls.base_url}img/cms/dorado/aboutus/brands/brand-5.png" alt=""></a>
							</div>
							<div>
								<a href="#"><img src="{$urls.base_url}img/cms/dorado/aboutus/brands/brand-1.png" alt=""></a>
							</div>
							<div>
								<a href="#"><img src="{$urls.base_url}img/cms/dorado/aboutus/brands/brand-3.png" alt=""></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{/block}