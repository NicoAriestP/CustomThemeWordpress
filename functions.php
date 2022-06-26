<?php
if (!function_exists('onphpid_theme_setup')) {
    function onphpid_theme_setup()
    {   
        //custom background

        // tag title & desc;
        add_theme_support('title-tag',);
        // rss feed link agar pengunjung bisa berlangganan
        add_theme_support('automatic-feed-links');
        //agar bisa membuat menu
        register_nav_menus([
            'primary_id' => esc_html__( 'Primary', 'onphpid-theme' ),
        ]);
        //fitur thumbnail gambar
        add_theme_support('post-thumbnails');
        // //mengaktifkan html5 markup untuk search forms, comment forms, 
        // comment lists, gallery, dan caption 
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);
        //tipe model post
        add_theme_support('post-formats',[
            'gallery',
            'audio',
            'video',
        ]);
        //custom background
        add_theme_support('custom-background', apply_filters('onphpid_theme_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
    }
}
add_action('after_setup_theme', 'onphpid_theme_setup');
//Mendaftarkan css dan js
if (!function_exists('onphpid_theme_scripts')) {
    function onphpid_theme_scripts()
    {
        wp_enqueue_style('onphpid-theme-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('onphpid-theme-bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css');
 
    wp_enqueue_style('onphpid-theme-style', get_stylesheet_uri());
 
    wp_enqueue_script('onphpid-theme-custom', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true);
    wp_enqueue_script('onphpid-theme-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '', true);
 
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    }
}
add_action('wp_enqueue_scripts', 'onphpid_theme_scripts');
//KETERANGAN
// wp_enqueue_style ($handle, $src,  $deps, $ver, $media);
// penjelasan:

// $handle  – nama atau id dari file css dan harus unik agar tidak  ter-rename.

// $scr – alamat URI file css. nilai defaultnya adalah false

// $deps – mode ketergantungan css (seperti bootstrap.js yang hanya akan bekerja apabila ada jquery). nilai defaultnya adalah array().

// $ver – versi atau keluaran keberapa file CSS tersebut. nilai defaultnya adalah false.

// $media – media atau tempat valuenya all’, ‘aural’, ‘braille’, ‘handheld’, ‘projection’, ‘print’, ‘screen’, ‘tty’, atau ‘tv’. secara default adalah all.

// get_template_directory_uri() adalah fungsi yang tugas men-generate alamat theme yang pada kasus ini adalah http://localhost/theme-wp/wp-content/themes/theme-wp.

// get_stylesheet_uri() adalah fungsi yang sama dengan get_template_directory_uri() namun get_stylesheet_uri() khusus merujuk ke style.css dalam kasus ini
// wp_enqueue_script() adalah fungsi yang dibuat untuk menangani penambahan javascript.

// wp_enqueue_script ($handle, $src, $deps,  $ver, $in_footer)
// 1
// wp_enqueue_script ($handle, $src, $deps,  $ver, $in_footer)
// kurang lebih penjelasan untuk parameter wp_enqueue_script() sama seperti wp_enqueue_style() hanya saja ada $in_footer. parameter ini hanya bernilai TRUE dan FALSE, jika TRUE maka javascript akan diletakkan di dekat tag "</body>" dan FALSE akan diletakkan sebelum tag "</head>". nilai defaultnya adalah FALSE.

// wp_enqueue_script('comment-reply') adalah js bawaan wordpress yang digunakan untuk menangani komentar pada halaman single atau page.

//Mendaftarkan sidebar
if (!function_exists('onphpid_theme_widgets_init')) {
    function onphpid_theme_widgets_init()
    {
       register_sidebar(
       array(
           'name'          => __('Sidebar', 'onphpid-theme'),
           'id'            => 'sidebar-pertama',
           'description'   => __('Ini Sidebar Pertama Kita', 'onphpid-theme'),
           'before_widget' => '<section id="%1$s" class="widget %2$s">',
           'after_widget'  => '</section>',
           'before_title'  => '<h3 class="widget-title">',
           'after_title'   => '</h3>',
       )
        );
    }
}
add_action('widgets_init', 'onphpid_theme_widgets_init');