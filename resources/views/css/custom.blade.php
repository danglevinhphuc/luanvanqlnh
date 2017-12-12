<?php
/*** set the content type header ***/
/*** Without this header, it wont work ***/
header("Content-type: text/css");

?>
/* Style ( default color ) f47500 -------------------------------------------
-----------------------------------------------------------------------------*/
h1,h2,h3,h4,h5,h6          { color: #333;}
pre                        { border: 1px solid #eae9e9; background-color: #FFF; -moz-box-shadow: 0 1px 10px rgba(0,0,0,0.1); -webkit-box-shadow: 0 1px 10px rgba(0,0,0,0.1); box-shadow: 0 1px 10px rgba(0,0,0,0.1);}
input[type="email"],
input[type="number"],
input[type="search"],
textarea,
input[type="text"],
input[type="tel"],
input[type="url"],
input[type="password"]     { border:2px solid #d5d6d8; color:#333;  }


/*-----------------------------------------------------------------------------
----------------------------- 1 - Layout --------------------------------------
-----------------------------------------------------------------------------*/
a:link, a:visited          { color: #000; text-decoration: none; }
a:hover                    { color: <?php echo $maugiaodien ?>; }
::-moz-selection           { background:#000; color: #fff; text-shadow: none; }
::selection                { background:#000; color: #fff; text-shadow: none; }
/* -- Header -- */
html body                  { color: #414141; background-color: #fafafa;}
header, .sticky            { background-color: <?php echo $maugiaodien ?>; }
.bar-header                { background-color: #FFF; border-bottom: 1px solid #f1f1f1; }
/* - Layout content - */
.wrap-fullwidth-bg         { background-color: #FFF; border: 1px solid #f1f1f1;}
/* .page-content */      
.single-content            { background-color: #FFF; border: 1px solid #f1f1f1;}


/*-----------------------------------------------------------------------------
----------------------------- 2 - Header --------------------------------------
-----------------------------------------------------------------------------*/
/* -- Top social icons -- */
.top-social li a            { color: <?php echo $maugiaodien ?>; }
.top-social li a:hover      { color: #000;}
#responsive-menu-additional-content ul.top-social li a  { color: #fff !important; }

/* -- Search Header (menu) -- */
#searchform2 .buttonicon   { background-color: #fff; color: #31363a; }
#searchform2 #s            { background-color: #FFF; border: 1px solid #f1f1f1; border-left-color: #FFF; color: #000 !important;}

/* -- Live Search -- */
ul.search_results li:hover { background-color: #f2f2f2 !important; }
ul.search_results          { -moz-box-shadow: 0 0 5px #999 !important; -webkit-box-shadow: 0 0 5px #999 !important; box-shadow: 0 0 5px #999 !important;} 

/* -- Top Header Menu -- */
.jquerycssmenu ul li.current-home > a { }
.jquerycssmenu ul li.current_page_item > a, 
.jquerycssmenu ul li.current-menu-ancestor > a, 
.jquerycssmenu ul li.current-menu-item > a, 
.jquerycssmenu ul li.current-menu-parent > a { color: <?php echo $maugiaodien ?>; }
.jquerycssmenu ul li ul li.current_page_item > a, 
.jquerycssmenu ul li ul li.current-menu-ancestor > a, 
.jquerycssmenu ul li ul li.current-menu-item > a, 
.jquerycssmenu ul li ul li.current-menu-parent > a { color: <?php echo $maugiaodien ?>;  }
/*Top level menu link items style*/
.jquerycssmenu ul li i { color: <?php echo $maugiaodien ?>; }
.jquerycssmenu ul li a { color: #333; }
.jquerycssmenu ul li a:hover { color: <?php echo $maugiaodien ?>; }
.jquerycssmenu ul li ul li a { color: #333; }
/*1st sub level menu*/
.jquerycssmenu ul li ul { background: #FFF;}
.jquerycssmenu ul li ul li ul { background-color: #FFF;}
.jquerycssmenu ul li ul li { background: #FFF; }
/* Sub level menu links style */
.jquerycssmenu ul li ul li:hover { color: #000 !important;}
.jquerycssmenu ul li ul li:hover a { color: #000 !important; }
.jquerycssmenu ul li ul li:hover a { background-color: #FFF; color: #000 !important;}
.jquerycssmenu ul li ul li:hover a:hover { color: <?php echo $maugiaodien ?>;}


/*-----------------------------------------------------------------------------
----------------------------- 3 - Home Content --------------------------------
-----------------------------------------------------------------------------*/

/* ##### Featured Slider home ##### 
################################## */
#featured-slider 				  { background-color: #FFF; }
#featured-slider .content h3      { color: #222; }
#featured-slider .content a h3    { color: #222; }
#featured-slider .content a:hover { color: #FFF !important; }
.owl-prev, .owl-next              { background-color: #FFF; }
.owl-prev i, .owl-next i          { color: #222; }
#featured-slider .article-category   { background-color: #FFF; }
#featured-slider .article-category i { background-color: <?php echo $maugiaodien ?>; color: #FFF; border-color: #760b32 transparent #760b32 #760b32; }

/* ###### Blog Masonry style ###### 
#################################### */
ul.masonry_list li         { background-color: #fff; border: 1px solid #f1f1f1; }
ul.masonry_list .article-category i { background-color: <?php echo $maugiaodien ?>; color: #FFF; border-color: #760b32 transparent #760b32 #760b32; }
ul.masonry_list .article-category   { background-color: #FFF; }
ul.masonry_list h3      { color: #222; }
ul.masonry_list a h3    { color: #222; }
ul.masonry_list a:hover { color: #222 !important; } 

/* -- Sticky Posts style -- */
ul.masonry_list li.sticky { background-color: #000 !important;}
ul.masonry_list li.sticky a h3 { color: #FFF !important; }
ul.masonry_list li.sticky span.thumbs-rating-already-voted { background: #000 !important; }

/* -- Pagination -- */
.wp-pagenavi a, .wp-pagenavi span { background-color: #FFF; color: #333; border: 1px solid #f1f1f1; }
.wp-pagenavi a:hover { color: #fff !important; background-color: <?php echo $maugiaodien ?>;}
.wp-pagenavi span.current { background-color: <?php echo $maugiaodien ?>; color: #fff !important; }

/* ####### Widgets Modules ######### 
#################################### */
ul.articles-modules .article-category i { background-color: <?php echo $maugiaodien ?>; color: #FFF; border-color: #760b32 transparent #760b32 #760b32; }
ul.articles-modules .article-category   { background-color: <?php echo $maugiaodien ?>; }
ul.articles-modules .author-box      { border-right: 1px solid #f1f1f1; border-bottom: 1px solid #f1f1f1; background-color: #FFF; }
ul.articles-modules .author-box .at-links a       {  color: #3f677a;}
ul.articles-modules .author-box .at-time          { color: #888; }
ul.articles-modules .author-box .at-time i        { color: #95acfc;  }
ul.articles-modules .author-box .at-location      { color: #888; }
ul.articles-modules .author-box .at-location i    { color: #30b72d; }
ul.articles-modules .title-section a h3           { background-color: #FFF; }
h3.title-module            { color: <?php echo $maugiaodien ?>;}
ul.articles-modules .owl-prev, ul.articles-modules .owl-next  { background-color: #FFF; }


/*-----------------------------------------------------------------------------
----------------------------- 4 - Entry Content -------------------------------
-----------------------------------------------------------------------------*/

/* -- Archive-header -- */
.archive-header            { border: 1px solid #eae9e9; background-color: #FFF; -moz-box-shadow: 0 1px 10px rgba(0,0,0,0.1); -webkit-box-shadow: 0 1px 10px rgba(0,0,0,0.1); box-shadow: 0 1px 10px rgba(0,0,0,0.1);}
.archive-header h3         { color: #222; }

/* ##### Related articles single ##### 
################################## */
.single-related           { background-color: #f9f9f9; }
.single-related h3        { border-bottom: 2px solid <?php echo $maugiaodien ?>;}
 
/* -- Page / Article Title -- */
h1.article-title           { color: #000; }
h1.page-title              { color: #000; border-bottom: 5px solid #f2f2f2; }

/* -- Entry bottom -- */
.single-content h3.title   { color: #FFF !important; background-color: <?php echo $maugiaodien ?>; } 

/*-- Entry button -- */
.entry-btn                 { background-color: <?php echo $maugiaodien ?>; color: #FFF !important;  } 

/* -- Prev and Next articles --*/
.prev-articles             { background-color: #FFF; border-top: dashed 5px <?php echo $maugiaodien ?>; }

/* -- Author entry small box -- */
ul.aut-meta li.name a      { color: <?php echo $maugiaodien ?>; }
ul.aut-meta li.time        { color: #94979c;}

/* -- blockquote -- */
blockquote                 { background: #f9f9f9; border-left: 5px solid <?php echo $maugiaodien ?>; }

/* -- Typography First Content Letter -- */
div.p-first-letter p:first-child:first-letter { color: <?php echo $maugiaodien ?>; } 

/* -- Entry content style -- */
.entry p a        { color: <?php echo $maugiaodien ?>; }
.entry p a:hover  { color: #000 !important; }

/* -- Responsive Images -- */
.wp-caption-text           { color: #888;}
.entry .wp-caption-text a         { color: #000 !important; }
.wp-caption-text a:hover   { color: #000 !important; }

/* -- Pagination entry articles -- */
.my-paginated-posts span { background-color: <?php echo $maugiaodien ?>; color: #FFF !important;}
.my-paginated-posts p a  { background-color: #222; color:#fff !important;}
.my-paginated-posts p a:hover { color:#fff !important; }


/*-----------------------------------------------------------------------------
----------------------------- 5 - Sidebar & Widgets ---------------------------
-----------------------------------------------------------------------------*/

/* -- Sidebar -- */
.sidebar h3.title { border-bottom: 2px solid <?php echo $maugiaodien ?>; }
.sidebar .widget  {  background-color: #FFF; border: 1px solid #f1f1f1; }
  
/* -- FeedBurner -- */
div.feed-info i        { color: <?php echo $maugiaodien ?>;}
div.feed-info strong   { border-bottom: 1px solid <?php echo $maugiaodien ?>;}
#newsletter-form input.newsletter  { border:1px solid #d5d6d8; color:#333; }
#newsletter-form input.newsletter-btn  { color: #FFF; background-color: <?php echo $maugiaodien ?>; }

/* -- Article widget -- */
.article_list li         { border-bottom: 1px solid rgba(241, 241, 241, .8); }
.article_list li h3:hover { color: #000; }
ul.article_list li div.post-nr { background-color: <?php echo $maugiaodien ?>; }

/* -- Categories in two columns -- */
.widget_anthemes_categories li { color: <?php echo $maugiaodien ?>; } 

/* -- Default Tags -- */
div.tagcloud a:hover  { }
div.tagcloud a        { background: #f5f5f5 !important; }
div.tagcloud span     { color: <?php echo $maugiaodien ?>; }

/* -- Archives in two columns -- */
div.widget_archive select, div.widget_categories select { border-radius: 3px; border:1px solid #d5d6d8; color:#999; }

/* -- Default Search -- */
div.widget_search #searchform2 #s { background-color: #FFF; border: 1px solid #f5f4f4; }
div.widget_search #searchform2 .buttonicon   { background-color: #000; color: #FFF; }

/* -- Archives in two columns -- */
.widget_archive li { color: <?php echo $maugiaodien ?>; } 

/* -- Meta in two columns -- */
.widget_meta li { color: <?php echo $maugiaodien ?>;} 

/* -- Calendar -- */ 
#wp-calendar tbody td#today { background-color: #222; color: #FFF;}


/*-----------------------------------------------------------------------------
----------------------------- 6 - Comments Form -------------------------------
-----------------------------------------------------------------------------*/

ul.comment li                 {   background-color: #fafafa; border-left: 2px solid #f1f1f1;  }
ul.comment li ul.children li  { -moz-box-shadow: none; box-shadow: none; -webkit-box-shadow: none;}

/* -- Comments -- */
.comments h3.comment-reply-title  { color: #FFF !important; background-color: <?php echo $maugiaodien ?>; }
.comments h3.comment-reply-title i { border-color: <?php echo $maugiaodien ?> transparent <?php echo $maugiaodien ?> <?php echo $maugiaodien ?>; }
.comments h3.comment-reply-title a { color: #FFF; }

/* -- comment Form -- */
#commentform #author, #email  { border:2px solid #d5d6d8; color:#333; }	
#commentform textarea         { border:2px solid #d5d6d8; color:#333;} 
#commentform #sendemail       { background-color: <?php echo $maugiaodien ?>; color: #FFF; }
#commentform label span       { color:#F00;}
#commentform span             { color:#F00;} 


/*-----------------------------------------------------------------------------
----------------------------- 7 - Contact Form --------------------------------
-----------------------------------------------------------------------------*/

/* -- Contact Form 7 Plugin -- */
form.wpcf7-form input         { border:2px solid #d5d6d8; color:#333; }
form.wpcf7-form textarea      { border:2px solid #d5d6d8; color:#333; }
form.wpcf7-form input.wpcf7-submit    { background-color: #222; color: #FFF; border: none; }
form.wpcf7-form .wpcf7-validation-errors { color: red;}


/*-----------------------------------------------------------------------------
----------------------------- 8 - Custom Pages --------------------------------
-----------------------------------------------------------------------------*/
/* -- Tag & Category Index -- */
#mcTagMap .tagindex h4, #sc_mcTagMap .tagindex h4 { color: <?php echo $maugiaodien ?>; border-bottom: 5px solid <?php echo $maugiaodien ?>;  }
#mcTagMap .tagindex ul li, #sc_mcTagMap .tagindex ul li { border-bottom: 1px solid #f0eee9; }

/* -- Front-end Submission Form -- */
input.ap-form-submit-button   { background-color: #ff7f00; color: #FFF; border-color: #192B33;}
input.ap-form-submit-button:hover { background-color: #192B33; border-color: #192B33;}
.ap-form-wrapper h2               { background-color: #192B33; color: #FFF;}
 

/*-----------------------------------------------------------------------------
------------------------------ 9 - Footer -------------------------------------
-----------------------------------------------------------------------------*/
footer                        { background-color: #000000;}

/* -- widgets -- */
footer .widget h3.title       { color: #94979c; border-bottom: 5px solid #111; }
footer .widget h3.title span  { background-color:<?php echo $maugiaodien ?>; color: #FFF;}
footer .article_list li       { border-bottom: 1px solid #111; }
footer .article_list li h4 a  { color: #FFF !important;}

/* -- Copyright -- */
.copyright                    { color: #999; border-top: 5px solid #111; }
.copyright a                  { color: #FFF; border-bottom: 1px solid <?php echo $maugiaodien ?>; }

/* -- Footer Social Icons -- */
ul.footer-social li a         { color: #FFF; }
ul.footer-social li a:hover   { opacity: 0.7; color: #FFF !important;}

/* -- Back to Top -- */
#back-top span                { background-color: <?php echo $maugiaodien ?>;}
#back-top a:hover             { opacity: 0.7; } 

/* ##### Random Articles Footer ##### 
################################## */
#random-wrap-section h3.title-section  { color: <?php echo $maugiaodien ?>; }
#random-section .article-category i { background-color: <?php echo $maugiaodien ?>; color: #FFF; border-color: #760b32 transparent #760b32 #760b32; }
#random-section .article-category   { background-color: #FFF; }

/* -- Follow Section -- */
#follow-section               { background-color: #FFF; border-top: 1px solid #f1f1f1;}
.follow-left                  { border-right: 1px solid #f1f1f1; }
#follow-section h4            { color: <?php echo $maugiaodien ?>;}
#follow-section i             { background-color: <?php echo $maugiaodien ?>; color: #FFF; }