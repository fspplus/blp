<?php
include 'header.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
?>

<html>
	<body>
		<div class="col-md-12 col-12 align-self-center headerpage" style="background: url('../assets/images/background/Hanwhalife-bucketlist-profile-page.jpg');height: 400px;background-size:cover; padding: 0 -10%">
		</div>

		<div id="faqpage" class="page-titles homehtml" style="padding: 2% 10%; margin: auto;">
			<div class="search-container" style="background-color: white;">
				<div class="col-lg-12 col-md-12 col-12 align-self-center" style="padding: 4% 0 3% 0; position: relative; z-index: 2; background: white">
					<h1 style="text-align: center; color: #ff7101"><strong>FAQ</strong></h1>
				</div>

				<div class="align-self-center searchbar" style="padding: 0 5%;">
					<input type="text" id="search_text" class="txedit col-lg-11 col-md-10 col-9" style="float: left; margin-top: 0" placeholder="Cari ...">
					<h2 id="searchbtn" class="col-lg-1 col-md-2 col-3" style="float: left; padding-top: 10px; margin-bottom: 40px; text-align: right; color: #666; cursor: pointer; background-color: white"><i class="fas fa-search"></i></h2>
				</div>
			</div>

            <div id="searchResult" class="col-lg-12 col-md-12 col-12 align-self-center" style="padding: 0 5%;"></div>

			<div class="row">
				<?php 
					$sql_tab = "SELECT *, faq_sort AS num FROM faq_table GROUP BY faq_category ORDER BY num";
					$query_tab = mysqli_query($conn,$sql_tab);
					if($query_tab->num_rows>0){
						while($data_tab = mysqli_fetch_array($query_tab)){ ?>
							<div class="col-lg-12 col-md-12 col-12 align-self-center acchead">
								<h2><span class="faq_c"><?php echo $data_tab['faq_category']; ?></span><span class="plus animated" style="float: right;">+</span><span class="minus animated" style="float: right;">-</span></h2>
							</div>

							<div id="acc1" class="col-lg-12 col-md-12 col-12 align-self-center accbody hide">
								<ul>
									<?php
									$counter = $data_tab['faq_category'];
									$sql_tab2 = "SELECT * FROM faq_table WHERE faq_category = '$counter' AND faq_status LIKE 'active' ORDER BY faq_sort ASC";
									$query_tab2 = mysqli_query($conn,$sql_tab2); 
									if($query_tab2->num_rows>0){
										while($data = mysqli_fetch_array($query_tab2)){ ?>
											<li><h3><?php echo $data['faq_question']; ?></h3></li>
											<?php echo $data['faq_answers']; ?>
										<?php }
									}?>
								</ul>
							</div>
						<?php }
					}
				?>
			</div>
		</div>
	</body>
</html>

<?php
include 'footer.php';
?>