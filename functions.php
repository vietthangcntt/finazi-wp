<?php 
/**
  @ Thiết lập các hằng dữ liệu quan trọng
  @ THEME_URL = get_stylesheet_directory() - đường dẫn tới thư mục theme
  @ CORE = thư mục /core của theme, chứa các file nguồn quan trọng.
  **/
  define( 'THEME_URL', get_stylesheet_directory() );
  define( 'CORE', THEME_URL . '/core' );

/**
@ Load file /core/init.php
@ Đây là file cấu hình ban đầu của theme mà sẽ không nên được thay đổi sau này.
**/

  require_once( CORE . '/init.php' );

/**
@ Thiết lập $content_width để khai báo kích thước chiều rộng của nội dung
**/
if ( ! isset( $content_width ) ) {
   /*
    * Nếu biến $content_width chưa có dữ liệu thì gán giá trị cho nó
    */
   $content_width = 900;
}

/**
@ Thiết lập các chức năng sẽ được theme hỗ trợ
**/
if ( ! function_exists( 'finazi_theme_setup' ) ) {
    /*
     * Nếu chưa có hàm thachpham_theme_setup() thì sẽ tạo mới hàm đó
     */
    function finazi_theme_setup() {

    }
    add_action ( 'init', 'finazi_theme_setup' );

}


/*
* Thiết lập theme có thể dịch được
*/
$language_folder = THEME_URL . '/languages';
load_theme_textdomain( 'finazi', $language_folder );

/*
* Tự chèn RSS Feed links trong <head>
*/
add_theme_support( 'automatic-feed-links' );

/*
* Thêm chức năng post thumbnail
*/
add_theme_support( 'post-thumbnails' );

/*
* Thêm chức năng title-tag để tự thêm <title>
*/
add_theme_support( 'title-tag' );

/*
* Thêm chức năng post format
*/
add_theme_support( 'post-formats',
    array(
       'image',
       'video',
       'gallery',
       'quote',
       'link'
    )
 );

/*
* Thêm chức năng custom logo
*/
add_theme_support( 'custom-logo' );
/*
* Thêm chức năng custom background
*/
$default_background = array(
   'default-color' => '#e8e8e8',
);
add_theme_support( 'custom-background', $default_background );


/*
* Tạo menu cho theme
*/
register_nav_menu ( 'primary-menu', __('Primary Menu', 'finazi') );

/*
* Tạo sidebar cho theme
*/
$sidebar = array(
   'name' => __('Main Sidebar', 'finazi'),
   'id' => 'main-sidebar',
   'description' => 'Main sidebar for finazi theme',
   'class' => 'main-sidebar',
   'before_title' => '<h3 class="widgettitle">',
   'after_title' => '</h3>'
);
register_sidebar( $sidebar );

$sidebar_footer=[
      'name'=> __('Footer Sidebar','alice'),
      'id' => 'footer-sidebar',
      'class' => 'main-sidebar',
      'before-title' => '<h3 class="title">',
      'after-title' =>'</h3>',
      'before_widget' => '<div class="col-md-3">',
      'after_widget' => '</div>',
      ];
register_sidebar($sidebar_footer);
/**
@ Thiết lập hàm hiển thị menu
@ finazi_menu( $slug )
**/
if ( ! function_exists( 'finazi_menu' ) ) {
  function finazi_menu( $slug ) {
    $menu = array(
      'theme_location' => $slug,
      'container' => 'nav',
      'container_class' => $slug,
    );
    wp_nav_menu( $menu );
  }
}

/**
@ Thiết lập hàm hiển thị logo
@ finazi_logo()
**/
function themename_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );





if ( ! function_exists( 'finazi_car' ) ) {
  function finazi_car() {?>
    <div class="shop">
      <a href="#"><img src="<?php echo get_stylesheet_directory_uri()?>/images/shop.png" alt="My icon"></a>
      <button class="sumit-search"><i class="fa fa-search" aria-hidden="true"></i></button>
    </div>
  <?php }
}

  /**
@ Hàm hiển thị ảnh thumbnail của post.
@ Ảnh thumbnail sẽ không được hiển thị trong trang single
@ Nhưng sẽ hiển thị trong single nếu post đó có format là Image
@ finazi_thumbnail( $size )
**/
  if (!function_exists('finazi_thumbnail')) {
    function finazi_thumbnail($size){
      if ( has_post_thumbnail()||has_post_format('image')) {?>
        <figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure><?php
        
      }
    }
  }

/**
@ Hàm hiển thị tiêu đề của post trong .entry-header
@ Tiêu đề của post sẽ là nằm trong thẻ <h1> ở trang single
@ Còn ở trang chủ và trang lưu trữ, nó sẽ là thẻ <h2>
@ finazi_entry_header()
**/
  if ( ! function_exists( 'finazi_entry_header' ) ) {
    function finazi_entry_header() {?>
      <h1 class="entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
      </h1><?php 
    }
  }

/**
@ Hàm hiển thị thông tin của post (Post Meta)
@ finazi_entry_meta()
**/
  if (!function_exists("finazi_meta")) {
    function finazi_meta(){
      if (is_home()) {
        echo '<div class="meta">';
          printf(__('<span class="author"> <i class="fa fa-user" aria-hidden="true"></i>  %1$s</span>','alice'),get_the_author());
          printf(__('<span class="date"><i class="fa fa-calendar-o"></i> %1$s</span>','alice'),get_the_date());
        echo '</div>';
      }
      elseif (is_single()){
        echo '<div class="meta">';
          
          printf(__('<span class="date"><ion-icon name="calendar"></ion-icon> %1$s</span>','alice'),get_the_date());
          if (comments_open()) {
            echo '<span class="reply"><i class="fa fa-comment-o"></i> ';
              comments_popup_link(__('Leave a comment', 'alice'),
                         __('One comment', 'alice'),
                                __('% comments', 'alice'),
                               __('Read all comments', 'alice'));
            echo '</span>';
          }
          printf(__('<span class="author"><i class="fa fa-user-circle-o"></i> %1$s</span>','alice'),get_the_author());
        echo '</div>';
      }
    }
  }

  /**
@ Hàm hiển thị tag của post
@ finazi_entry_tag()
**/
  if (!function_exists('finazi_entry_tag')) {
    function finazi_entry_tag(){
      if (has_tag() && is_single()) {
        echo '<div class="tag">';
        printf('Tags: %1$s',get_the_tag_list('',' , '));
        echo '</div>';
      }
    }
  }



  if (! function_exists('finazi_home')) {
    function finazi_home(){
      $home = get_bloginfo('url');
      // $title= the_title();
      if (is_home()) { ?>
        <li class="home-item"><a href=".$home.">Home</a></li>
        <li class="home-item-2">Blog</li>

        
      <?php }
      
        
        if (is_category()) {
          
          $cat=get_the_category();
          echo '<li class="home-item"><a href="'.$home.'">Home</a></li>';
          echo '<li class="home-item-2">'.$cat[0]->name.'</li>';
        }
        if (is_single()) {
          echo '<li class="home-item"><a href="'.$home.'">Home</a></li>';
          echo '<li class="home-item-2">Blog</li>';?>
          <li class="home-item-2" aria-current="page"><?php echo the_title() ?></li>
          <?php
        }
        if (is_page()) {
                      echo '<li class="home-item-2">'.the_title().'</li>';
              }
              if (is_tag()) {
                single_tag_title();
              }
            if (is_day()) {
              echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';
            }
            if (is_month()) {
              echo"<li>Archive for "; the_time('F, Y'); echo'</li>';
            }
            if (is_year()) 
              {echo"<li>Archive for "; the_time('Y'); echo'</li>';
            }
            if (is_author()) {
              echo"<li>Author Archive"; echo'</li>';
            }
            if (isset($_GET['paged']) && !empty($_GET['paged'])) {
              echo "<li>Blog Archives"; echo'</li>';
            }
            if (is_search()) {
              echo"<li>Search Results"; echo'</li>';
            }
          
        }
          
  }


 /**
  @ Hàm hiển thị nội dung của post type
  @ Hàm này sẽ hiển thị đoạn rút gọn của post ngoài trang chủ (the_excerpt)
  @ Nhưng nó sẽ hiển thị toàn bộ nội dung của post ở trang single (the_content)
  @ thachpham_entry_content()
  **/
  if ( ! function_exists( 'finazi_entry_content' ) ) {
    function finazi_entry_content() {
 
      if ( ! is_single() ) :
        the_excerpt();
      else :
        the_content();
 
        /*
         * Code hiển thị phân trang trong post type
         */
        $link_pages = array(
          'before' => __('<p>Page:', 'finazi'),
          'after' => '</p>',
          'nextpagelink'     => __( 'Next page', 'finazi' ),
          'previouspagelink' => __( 'Previous page', 'finazi' )
        );
        wp_link_pages( $link_pages );
      endif;
 
    }
  }


// hien thi chuyen bai post

  function post_navigation(){
    $next= get_next_post();
    $pre= get_previous_post();
    ?>
    
    <div class="blog-related-post flw">
      <?php if (!is_string($pre)) {?>
        <div class="prev-post">
          <div class="control-post-img">
            <?php echo get_the_post_thumbnail($pre->ID); ?>
          </div>
          <div class="control-post-desc">
            <h3 class="control-post-name"><a href="<?php echo $pre->guid; ?>" rel="prev"><?php echo $pre->post_title ?></a></h3>
            <a href="<?php echo $pre->guid; ?>" class="control-post-btn">Previous</a>
          </div>
        </div>
      <?php }  ?>
      
      <?php 
        if (!is_string($next)) {?>
          <div class="next-post">

            <div class="control-post-img">
              <?php echo get_the_post_thumbnail($next->ID); ?>
            </div>
            <div class="control-post-desc">
              <h3 class="control-post-name"><a href="<?php echo $next->guid; ?>" rel="next"><?php echo $next->post_title ?></a></h3>
              <a href="<?php echo $next->guid; ?>" class="control-post-btn">Next</a>
            </div>
          </div>
        
      <?php }
         
    echo "</div>";  
  }

  /*
 * Thêm chữ Read More vào excerpt
 */
  function finazi_readmore() {
      return '<div class="read"><a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('READ MORE', 'alice') . '</a></div>';
  }
  add_filter( 'excerpt_more', 'finazi_readmore' );
function finazi_styles() {
/*
 * Chèn file style.css chứa CSS của theme
 */
  wp_register_style('main-style',get_template_directory_uri().'/style.css','all');
  wp_enqueue_style('main-style');
  wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css','all');
  wp_enqueue_style('font-awesome');
  wp_register_style('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css','all');
  wp_enqueue_style('bootstrap-js');
  wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',array('jquery'));
  wp_enqueue_script('jquery');
  wp_register_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js','all');
  wp_enqueue_style('bootstrap');
  wp_register_script('js', get_template_directory_uri().'/js/menu.js',array('jquery'));
  wp_enqueue_script('js');
  wp_register_style('responsive',get_template_directory_uri().'/css/responsive.css','all');
  wp_enqueue_style('responsive');
}
add_action( 'wp_enqueue_scripts', 'finazi_styles' );
  
 ?>