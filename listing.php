<?php
/**
* @package Arcadian
*/

$apiKey = "?api_key=1e448e0dfcdbb565f5d329820065b4d2";

if (!$params['page']) {
  $listUrl = wp_remote_get(esc_url_raw('https://api.themoviedb.org/3/discover/movie' . $apiKey));
  $list = wp_remote_retrieve_body($listUrl);
}else{
  $page = "&page=" . $params['page'];
  $listUrl = wp_remote_get(esc_url_raw('https://api.themoviedb.org/3/discover/movie' . $apiKey . $page));
  $list = wp_remote_retrieve_body($listUrl);
}
$data = json_decode($list);

?>
<div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_row-no-padding" style="position: relative; box-sizing: border-box; width: 100%;">
  <div class="wpb_column vc_column_container vc_col-sm-12">
    <div class="vc_column-inner  ">
      <div class="wpb_wrapper">
        <section class="page-header overlay-gradient" style="background: url(<?php bloginfo('template_url'); ?>/assets/dist/img/movie-collection.jpg);">
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

                $youtubeUrl = "https://www.youtube.com/watch?v=" . $videoData->results[0]->key;
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
                         <h2 class="title"><a href="?movie=<?php echo $movieId; ?>"><?php echo $myMovie->title; ?></a></h2>
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
                      <?php if (!$params['page'] || $params['page'] == 1):
                        echo "<li style='color: #666;'>prev</li>";
                      else:
                        echo "<li><a class='next page-numbers' href='?page=". ($params['page']-1) ."'>prev</a></li>";
                      endif; ?>
                      <?php

                      for ($i=1; $i <= 5; $i++):
                        if ($params['page'] == $i):
                          echo "<li><a class='page-numbers current' href='?page=".$i."'>".$i."</a></li>";
                        else:
                          echo "<li><a class='page-numbers' href='?page=".$i."'>".$i."</a></li>";
                        endif;
                      endfor;

                      ?>
                      <li><a class="next page-numbers" href="?page=<?php echo $params['page']+1; ?>">Next</a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
