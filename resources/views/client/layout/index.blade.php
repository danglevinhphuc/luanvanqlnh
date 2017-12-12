<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>
      @yield('title')
    </title>    
    <meta name="description" content=""/>
    <meta name="keywords" content="" />
    <meta name="copyright" content="luanvan" />
    <meta name="author" content="luanvan" />
    <meta name="geo.placename" content="#" />
    <meta name="geo.region" content="VN" />
    <meta name="geo.position" content="10.764396;106.667749" />
    <meta name="ICBM" content="10.764396, 106.667749" />
    <meta name="dc.description" content="">
    <meta name="dc.keywords" content="">
    <meta name="dc.subject" content="">
    <meta name="dc.created" content="2016-11-01">
    <meta name="dc.publisher" content="">
    <meta name="dc.creator.name" content="luanvan">
    <meta name="dc.identifier" content="">
    <meta name="dc.rights.copyright" content="luanvan">
    <meta name="dc.language" content="vi-VN">
    <link rel="shortcut icon" href='{{ asset("public") }}/client/img/logo.png'>
    <base href="{{ asset('') }}">
    <link href="{{ asset('public') }}/admin_assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="{{ asset('public') }}/bower_components/jquery/dist/jquery.min.js"></script>
    <link rel='stylesheet' id='ap-front-styles-css'  href='{{ asset("public") }}/client/css/frontend-style91ac.css_ver=2.6.8.css' type='text/css' media='all' />
    <link rel='stylesheet' id='thumbs_rating_styles-css'  href='{{ asset("public") }}/client/css/style8a54.css_ver=1.0.0.css' type='text/css' media='all' />
    <link rel='stylesheet' id='anthemes_shortcode_styles-css'  href='{{ asset("public") }}/client/css/anthemes-shortcodesae9e.css_ver=4.7.6.css' type='text/css' media='all' />
    <link rel='stylesheet' id='wprm-public-css'  href='{{ asset("public") }}/client/css/public.mina4e6.css_ver=1.11.0.css' type='text/css' media='all' />
    <link rel='stylesheet' id='wprm-template-css'  href='{{ asset("public") }}/client/css/tastefully-simple.mina4e6.css_ver=1.11.0.css' type='text/css' media='all' />
    <link rel='stylesheet' id='food_wp_style-css'  href='{{ asset("public") }}/client/css/style5152.css_ver=1.0.css' type='text/css' media='all' />
    <style type="text/css">
        @include("css.custom")
    </style>
    <link rel='stylesheet' id='food_wp_responsive-css'  href='{{ asset("public") }}/client/css/responsive5152.css_ver=1.0.css' type='text/css' media='all' />
    <link rel='stylesheet' id='jquery-owl-carousel-css'  href='{{ asset("public") }}/client/css/owl.carousel001e.css_ver=2.0.0.css' type='text/css' media='all' />
    <link rel='stylesheet' id='food_wp_fonts-css'  href='{{ asset("public") }}/client/css/css.css' type='text/css' media='all' />
    <script type='text/javascript' src='{{ asset("public") }}/client/js/jqueryb8ff.js_ver=1.12.4'></script>
    <script type='text/javascript' src='{{ asset("public") }}/client/js/generalf39e.js_ver=4.0.1'></script>
    <link rel='stylesheet'  href='{{ asset("public") }}/client/css/othercss.css' type='text/css' media='all' />
</head>

<body class="home page-template page-template-template-home page-template-template-home-php page page-id-64 responsive-menu-slide-left">

    <div id="wrapper">

        @include("client.layout.header")

        @yield('content')
        @include("client.layout.footer")
    </div>
    <script type='text/javascript' src='{{ asset("public") }}/client/js/underscore.min4511.js_ver=1.8.3'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var DavesWordPressLiveSearchConfig = {"resultsDirection":"down","showThumbs":"true","showExcerpt":"false","showMoreResultsLink":"true","minCharsToSearch":"1","xOffset":"0","yOffset":"0","blogURL":"http:\/\/anthemes.com\/themes\/food","ajaxURL":"http:\/\/anthemes.com\/themes\/food\/wp-admin\/admin-ajax.php","viewMoreText":"View more results","outdatedJQuery":"Dave's WordPress Live Search requires jQuery 1.2.6 or higher. WordPress ships with current jQuery versions. But if you are seeing this message, it's likely that another plugin is including an earlier version.","resultTemplate":"<ul id=\"dwls_search_results\" class=\"search_results dwls_search_results\">\n<input type=\"hidden\" name=\"query\" value=\"<%- resultsSearchTerm %>\" \/>\n<% _.each(searchResults, function(searchResult, index, list) { %>\n        <%\n        \/\/ Thumbnails\n        if(DavesWordPressLiveSearchConfig.showThumbs == \"true\" && searchResult.attachment_thumbnail) {\n                liClass = \"post_with_thumb\";\n        }\n        else {\n                liClass = \"\";\n        }\n        %>\n        <li class=\"daves-wordpress-live-search_result <%- liClass %> '\">\n        <% if(DavesWordPressLiveSearchConfig.showThumbs == \"true\" && searchResult.attachment_thumbnail) { %>\n                <img src=\"<%= searchResult.attachment_thumbnail %>\" class=\"post_thumb\" \/>\n        <% } %>\n\n        <a href=\"<%= searchResult.permalink %>\" class=\"daves-wordpress-live-search_title\"><%= searchResult.post_title %><\/a>\n\n        <% if(searchResult.post_price !== undefined) { %>\n                <p class=\"price\"><%- searchResult.post_price %><\/p>\n        <% } %>\n\n        <% if(DavesWordPressLiveSearchConfig.showExcerpt == \"true\" && searchResult.post_excerpt) { %>\n                <p class=\"excerpt clearfix\"><%= searchResult.post_excerpt %><\/p>\n        <% } %>\n\n        <% if(e.displayPostMeta) { %>\n                <p class=\"meta clearfix daves-wordpress-live-search_author\" id=\"daves-wordpress-live-search_author\">Posted by <%- searchResult.post_author_nicename %><\/p><p id=\"daves-wordpress-live-search_date\" class=\"meta clearfix daves-wordpress-live-search_date\"><%- searchResult.post_date %><\/p>\n        <% } %>\n        <div class=\"clearfix\"><\/div><\/li>\n<% }); %>\n\n<% if(searchResults[0].show_more !== undefined && searchResults[0].show_more && DavesWordPressLiveSearchConfig.showMoreResultsLink == \"true\") { %>\n        <div class=\"clearfix search_footer\"><a href=\"<%= DavesWordPressLiveSearchConfig.blogURL %>\/_s=<%-  resultsSearchTerm %>\"><%- DavesWordPressLiveSearchConfig.viewMoreText %><\/a><\/div>\n<% } %>\n\n<\/ul>"};
        /* ]]> */
    </script>
    <script type='text/javascript' src='{{ asset("public") }}/client/js/daves-wordpress-live-search.minae9e.js_ver=4.7.6'></script>
    <script type='text/javascript' src='{{ asset("public") }}/client/js/excanvas.compiledae9e.js_ver=4.7.6'></script>
    <script type='text/javascript' src='{{ asset("public") }}/client/js/spinners.minae9e.js_ver=4.7.6'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var ap_form_required_message = "This field is required";
        var ap_captcha_error_message = "Sum is not correct.";
        /* ]]> */
    </script>
    <script type='text/javascript' src='{{ asset("public") }}/client/js/frontend91ac.js_ver=2.6.8'></script>
    <script type='text/javascript' src='{{ asset("public") }}/client/js/comment-ratinga4e6.js_ver=1.11.0'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var wprm_public = {"home_url":"http:\/\/anthemes.com\/themes\/food\/","ajax_url":"http:\/\/anthemes.com\/themes\/food\/wp-admin\/admin-ajax.php","nonce":"56265c88f3"};
        /* ]]> */
    </script>
    <script type='text/javascript' src='{{ asset("public") }}/client/js/printa4e6.js_ver=1.11.0'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var food_wp_js_custom = {"template_url":"http:\/\/anthemes.com\/themes\/food\/wp-content\/themes\/food-wp"};
        /* ]]> */
    </script>
    <script type='text/javascript' src='{{ asset("public") }}/client/js/custom5152.js_ver=1.0'></script>
    <script type='text/javascript' src='{{ asset("public") }}/client/js/jquery.main5152.js_ver=1.0'></script>
    <script type='text/javascript' src='{{ asset("public") }}/client/js/owl.carousel.mind5f7.js_ver=2.0'></script>
    <script type='text/javascript' src='{{ asset("public") }}/client/js/wp-embed.minae9e.js_ver=4.7.6'></script>
    @yield('script')
</body>

</html>
