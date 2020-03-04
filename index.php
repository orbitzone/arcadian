	<?php
	/**
	* @package Arcadian
	*/
	get_header();
	?>
	<div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_row-no-padding" style="position: relative; box-sizing: border-box; width: 100%;">
		<div class="wpb_column vc_column_container vc_col-sm-12">
			<div class="vc_column-inner  ">
				<div class="wpb_wrapper">
					<section class="page-header overlay-gradient" style="background: url(https://klbtheme.com/movify/wp-content/uploads/2018/04/movie-collection.jpg);">
						<div class="container">
							<div class="inner">
								<h2 class="title">Movie Grid 3</h2>
								<ol class="breadcrumb">
									<li><a href="#" title="Home" rel="bookmark">Home</a></li>
									<li><span>Movie Grid 3</span></li>
								</ol>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
	<div class="vc_row-full-width vc_clearfix"></div>
	<div class="container">
		<div class="vc_row wpb_row vc_row-fluid vc_custom_1525161690102" style="padding-top: 80px; padding-bottom: 80px;">
			<div class="wpb_column vc_column_container vc_col-sm-12">
				<div class="vc_column-inner  ">
					<div class="wpb_wrapper">
						<div class="row">
							<?php
								$thisUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
								$pageTrack = parse_url($thisUrl);
								parse_str($pageTrack['query'], $params);

								$apiKey = "?api_key=1e448e0dfcdbb565f5d329820065b4d2";
								$listUrl = "https://api.themoviedb.org/3/discover/movie";

								if (!$params['page']) {
									$list = file_get_contents($listUrl . $apiKey);
								}else{
									$page = "&page=" . $params['page'];
									$list = file_get_contents($listUrl . $apiKey . $page);
								}
								$data = json_decode($list);


								foreach($data->results as $myMovie):
									$movieId = $myMovie->id;
									$movieUrl = "https://api.themoviedb.org/3/movie/";
									$videoParam = "/videos";
									$movie = file_get_contents($movieUrl . $movieId . $apiKey);
									$video = file_get_contents($movieUrl . $movieId . $videoParam . $apiKey);
									$movieData = json_decode($movie);
									$videoData = json_decode($video);
									$imdb = "https://www.imdb.com/title/" . $movieData->imdb_id;
									$genres = array();

									foreach(array_slice($movieData->genres, 0, 3) as $genre):
											array_push($genres, $genre->name);
									endforeach;

									$youtubeUrl = "https://www.youtube.com/watch?v=" . $videoData->results[0]->key;
								?>
								 <div class="col-md-4 col-sm-6 col-xs-12 xs-mb50">
									 <div class="movie-box-3 mb30">
										 <div class="listing-container">
											 <div class="listing-image"><img src="https://image.tmdb.org/t/p/w500<?php echo $myMovie->backdrop_path; ?>" alt="Daredevil"></div>
											 <div class="listing-content">
												 <div class="inner">
													 <div class="play-btn"><a href="<?php echo $youtubeUrl; ?>" class="play-video" target="_blank"><i class="fa fa-play"></i></a></div>
													 <h2 class="title"><?php echo $myMovie->title; ?></h2>
													 <div class="stars">
														 <div class="rating"><i class="fa fa-star"></i><span><?php echo $myMovie->vote_average; ?> / 10</span><span class="category"><?php echo implode(", ",$genres); ?></span></div>
													 </div>
													 <p><?php echo $myMovie->overview; ?></p><a href="<?php echo $imdb;  ?>" target="_blank" class="btn btn-main btn-effect">details</a></div>
												 </div>
											 </div>
										 </div>
									 </div>
								<?php endforeach; ?>
													<div class="col-md-12">
														<nav class="pagination">
															<ul class="page-numbers">
																<li><a class="page-numbers" href="?page=1">1</span></li>
																<li><a class="page-numbers" href="?page=2">2</a></li>
																<li><a class="page-numbers" href="?page=3">3</a></li>
																<li><a class="next page-numbers" href="#">Next</a></li>
															</ul>
														</nav>

													</div></div></div></div></div></div></div>
													<?php
													get_footer();
