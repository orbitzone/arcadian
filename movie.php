<?php
/**
* @package Arcadian
*/

$apiKey = "?api_key=1e448e0dfcdbb565f5d329820065b4d2";

$movieId = $params['movie'];

$movieUrl = wp_remote_get(esc_url_raw('https://api.themoviedb.org/3/movie/' . $movieId . $apiKey));
$videoUrls = wp_remote_get(esc_url_raw('https://api.themoviedb.org/3/movie/' . $movieId . '/videos' . $apiKey));

$movie = wp_remote_retrieve_body($movieUrl);
$video = wp_remote_retrieve_body($videoUrls);
$movieData = json_decode($movie);
$videoData = json_decode($video);
$imdb = "https://www.imdb.com/title/" . $movieData->imdb_id;
$genres = array();

foreach(array_slice($movieData->genres, 0, 3) as $genre):
    array_push($genres, $genre->name);
endforeach;

$youtubeUrl = "https://www.youtube.com/watch?v=" . $videoData->results[0]->key;

?>
<?php if ($movieData->backdrop_path): ?>
  <div style="position: relative; overflow: hidden; background: url(https://image.tmdb.org/t/p/w1280<?php echo $movieData->poster_path; ?>); background-size: cover !important; background-repeat: no-repeat; background-position: 50% 10%;">
    <div class="overlay-gradient" style="z-index: -1;">
<?php else: ?>
  <div style="position: relative; overflow: hidden; background: url(<?php bloginfo('template_url'); ?>/assets/dist/img/movie-collection.jpg); background-size: cover !important; background-repeat: no-repeat; background-position: 50% 10%;">
    <div class="overlay-gradient" style="z-index: -1;">
<?php endif; ?>

<div class="vc_row-full-width vc_clearfix"></div>
<div class="container" style="position: relative; z-index: 2;">
  <div class="vc_row wpb_row vc_row-fluid vc_custom_1525161690102" style="padding-top: 80px; padding-bottom: 80px;">
    <div class="wpb_column vc_column_container vc_col-sm-12">
      <div class="vc_column-inner  ">
        <div class="wpb_wrapper">
          <div class="row">
               <div class="col-md-6 col-sm-6 col-xs-12 xs-mb50" style="margin: 0 auto;">
                 <div class="movie-box-3 mb30">
                   <div class="listing-container">
                     <div class="listing-image">
                       <?php if ($movieData->backdrop_path): ?>
                         <img src="https://image.tmdb.org/t/p/w500<?php echo $movieData->backdrop_path; ?>" alt="<?php echo $movieData->title; ?>">
                       <?php else: ?>
                         <img src="http://via.placeholder.com/500x281" alt="<?php echo $movieData->title; ?>">
                       <?php endif; ?>
                     </div>
                     <div class="listing-content">
                       <div class="inner">
                         <div class="play-btn"><a href="<?php echo $youtubeUrl; ?>" class="play-video" data-custom="cookie"><i class="fa fa-play"></i></a></div>
                         <h2 class="title"><?php echo $movieData->title; ?></h2>
                         <div class="stars">
                           <div class="rating"><i class="fa fa-star"></i><span><?php echo $movieData->vote_average; ?> / 10</span><span class="category"><?php echo implode(", ",$genres); ?></span></div>
                         </div>
                         <p><?php echo $movieData->overview; ?></p><a href="<?php echo $imdb;  ?>" target="_blank" class="btn btn-main btn-effect">details</a></div>
                       </div>
                     </div>
                   </div>
                 </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
