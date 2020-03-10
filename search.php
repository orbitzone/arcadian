	<?php
	/**
	* @package Arcadian
	*/

	get_header();
	?>
	<div class="container" style="padding: 80px 0;">
			<div class="col col-md-12">



				<h2 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'arcadian' ), '<span>' . get_search_query() . '</span>' );


					?>
				</h2>
				<div class="row">
				<?php
				$query = preg_replace('/\s+/', '+', get_search_query());
				$apiKey = "?api_key=1e448e0dfcdbb565f5d329820065b4d2";
				$request = wp_remote_get(esc_url_raw('https://api.themoviedb.org/3/search/movie'. $apiKey . '&query=' . $query));


				if( is_wp_error( $request ) ) {
					return false;
				}

				$body = wp_remote_retrieve_body($request);

				$data = json_decode( $body );

				foreach($data->results as $myMovie):
					$movieId = $myMovie->id;
					$movieUrl = wp_remote_get(esc_url_raw('https://api.themoviedb.org/3/movie/' . $movieId . $apiKey));
					$videoUrl = wp_remote_get(esc_url_raw('https://api.themoviedb.org/3/movie/' . $movieId . $videoParam . $apiKey));
					$videoParam = "/videos";
					$movie = wp_remote_retrieve_body($movieUrl);
					$video = wp_remote_retrieve_body($videoUrl);
					$movieData = json_decode($movie);
					$videoData = json_decode($video);
					$imdb = "https://www.imdb.com/title/" . $movieData->imdb_id;
					$genres = array();

					foreach(array_slice($movieData->genres, 0, 3) as $genre):
						array_push($genres, $genre->name);
					endforeach;
					?>
					<div class="col-md-4 col-sm-6 col-xs-12 xs-mb50">
						<div class="movie-box-3 mb30">
							<div class="listing-container">
								<div class="listing-image">
									<?php if ($myMovie->backdrop_path): ?>
										<a href="?movie=<?php echo $movieId; ?>"><img src="https://image.tmdb.org/t/p/w500<?php echo $myMovie->backdrop_path; ?>" alt="<?php echo $myMovie->title; ?>"></a>
									<?php else: ?>
										<a href="?movie=<?php echo $movieId; ?>"><img src="http://via.placeholder.com/500x281" alt="<?php echo $myMovie->title; ?>"></a>
									<?php endif; ?>
								</div>
								<div class="listing-content">
									<div class="inner">
										<div class="play-btn"><a href="<?php echo $youtubeUrl; ?>" class="play-video" data-custom="cookie"><i class="fa fa-play"></i></a></div>
										<h2 class="title"> <a href="?movie=<?php echo $movieId; ?>"> <?php echo $myMovie->title; ?></a></h2>
										<div class="stars">
											<div class="rating"><i class="fa fa-star"></i><span><?php echo $myMovie->vote_average; ?> / 10</span><span class="category"><?php echo implode(", ",$genres); ?></span></div>
										</div>
										<p><?php echo $myMovie->overview; ?></p><a href="<?php echo $imdb;  ?>" target="_blank" class="btn btn-main btn-effect">details</a></div>
									</div>
								</div>
							</div>
						</div>

				<?php endforeach; ?>
				</div>
				</div>
			</div>
		<?php get_footer();
