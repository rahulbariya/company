<?php
       $pagetitle = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
       $pagetitle = ucwords(str_replace('_',' ',$pagetitle));
       $pagename = basename($_SERVER['PHP_SELF']);
       //$toptitle = "Welcome to Rahul Bariya";
       $toptitle = "Shree Harikrushna Pipe Factory";

      //print_r($pageurl); exit();
?>

<html>
        <head>
            <title><?php echo $pagetitle; ?></title>
            <link rel="stylesheet" type="text/css" href="/my_project/css/style.css?v=3.3">
            <link rel="stylesheet" href="/resources/demos/style.css">
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

            <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Roboto:400,700&display=swap" rel="stylesheet">

            <script src="/my_project/js/dropdown_box.js"></script>
            <script src='https://kit.fontawesome.com/a076d05399.js'></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


            <script src="/my_project/js/jquery-3.4.1.min.js"></script>
            <script src="/my_project/js/jquery.validate.min.js"></script>
            <script src="/my_project/js/validate_init.js?v=1.3"></script>

            <!-------------------------  DATEPIKER JS  ------------------------------>

           <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script src="/my_project//js/custom.js?v=2.1"></script>


            <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <link rel="stylesheet" href="/resources/demos/style.css">
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->


            <!--------------------------------Jquery library----------------------------------------->
            <!--<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
            <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>-->

        </head>
        <?php
            require 'include/session.php';
            require "include/conn.php";
            include "include/validate_function.php";

        function myDate($date)
        {
            if(!empty($date)){
                $date = date_format(date_create($date),"d-m-y");
            }
            else{$date = '-';}
            return $date;
        }
        function myDateIn($date){
            $date = date_format(date_create($date),"Y-m-d");
            return $date;
        }

        //$breadcrumb = '<li><a href="#">Home</a></li><li><a href="#">Pictures</a></li><li><a href="#">Summer 15</a></li><li>Italy</li>';

        /*$mainpage = '<li><a href="#">Home</a></li>';
        $subpage1 = '<li><a href="#">Pictures</a></li>';
        $subpage2 = '<li><a href="#">Summer 15</a></li>';
        $subpage3 = '<li>Italy</li>';

        $breadcrumb = $mainpage.$subpage1.$subpage2.$subpage3;*/
        //$breadcrumb = '<li><a href="#">Home</a></li><li><a href="#">Pictures</a></li><li><a href="#">Summer 15</a></li><li>Italy</li>';
        ?>