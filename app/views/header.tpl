<!DOCTYPE html>
<html lang="en">
<head>
<title>{$site_title}</title>
     <!-- meta加载 -->
     {section name=list loop=$meta}{$meta[list]}
     {/section}
     <!-- meta加载 -->
     {section name=list loop=$meta}{$meta[list]}
     {/section}
     <!-- css加载 -->
     {section name=list loop=$css}
     {$css[list]}
     {/section}
     <!--[if IE 7]>
          <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
     <![endif]-->

     <!--[if lte IE 8]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
     <![endif]-->
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>