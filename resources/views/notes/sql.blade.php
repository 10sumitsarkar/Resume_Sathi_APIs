@extends('frontend.layout.master')

@section('title', 'sql notes')
@section('description', 'In this pdf sql notes w3schools we cover all the important topic of sql which help you to learn
    basic to advance tutorial of sql (pdf) and after this course you are ready for work at any company.')
@section('keywords',
    'basic to advance tutorial of SQL,sql tutorial, sql tutorial pdf, sql tutorial point, sql tutorial for beginners,sql
    advance,structure query language,sql injection tutorial, t sql tutorial, oracle sql developer tutorial, advanced sql
    tutorial, sql developer tutorial, sql database tutorial, sql tutorial w3, sql queries tutorial, sql server tutorial for
    beginners, sql server tutorial pdf, mode sql tutorial, best sql tutorial, pl sql tutorial pdf, sql basics tutorial, sql
    advance tutorial, microsoft sql tutorial, sql online tutorial, sql online tutorial free, sql online tutorial for
    free,sql crash course,sql crash course for free, learn sql queries,sql crash course pdf, sql dba tutorial, learn sql
    from scratch, sql script tutorial, sql server dba tutorial, sql tutorial for beginners pdf, advanced sql tutorial pdf,
    sql query basics, microsoft report builder tutorial, sql language tutorial, sql basics for beginners, sql profiler
    tutorial, sql server profiler tutorial, sql full tutorial, best website to learn sql, mode analytics sql tutorial, best
    site to learn sql, learn sql free online, c# sql tutorial, free sql tutorial, php sql tutorial, learn sql database,
    mysql commands tutorial, learn sql step by step,web designing sql,sql course, advanced sql tutorial point, learn sql
    queries online, mysql sql tutorial, sql full tutorial pdf, sql training pdf,sql,learn sql, what is sql, sqlschool, sql
    tutorial pdf with examples, sql tutorial, sql server tutorial, sql tutorial point, pl sql tutorial, sql for data
    science, sql analyst, sql complete tutorial, sql full tutorial,sql,full and free sql course,sql tutorial for free,
    introduction of sql, what is sql?, Introduction to MySQL, Show all sql databases in sql, Creating database in sql,Delete
    a database in sql, Use a database in sql, Check current database in sql, Create database in sql, Show table in sql,
    Describe table name in sql, Delete a table in sql, Insert data into table in sql, Show data of table in sql, Insert data
    into table in sql, Show data of table in sql, Show warnings in sql, Null vs not null in sql, Default value in sql, Add
    column in a table in sql, Delete a table in sql, Primary key in sql, Auto increment in sql, CRUD operation in sql,
    Select distinct statement in sql, Order by keyword in sql, Limit keyword in sql, Like operator in sql, Aggregate
    function in sql, Logical operation in sql, Concat function in sql, Reverse function in sql, Character length function in
    sql, Uppercase function in sql, Lowercase function in sql, Date time data type in sql, Foreign key in sql, Inner join in
    sql, Left join in sql, Right join in sql,Outer join')
@section('canonical', 'https://www.ResumeSathi.com/notes/sql-notes-pdf')
@section('og-title', 'sql notes')
@section('og:description', 'In this pdf sql notes w3schools we cover all the important topic of sql which help you to
    learn basic to advance tutorial of sql (pdf) and after this course you are ready for work at any company.')
@section('og-url', 'https://www.ResumeSathi.com/notes/sql-notes-pdf')
<meta name="robots" content="noindex" />
@push('custom_css')
    <style>
        .video-container {
            overflow: hidden;
            position: relative;
            width: 100%;
        }

        .video-container::after {
            padding-top: 56.25%;
            display: block;
            content: '';
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
@endpush
@section('content')
    <!-- main content area start-->
    <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">


        <!-- main content area start-->
        <h1 style="color: green;font-size: 28px;text-align: center; padding-bottom: 1rem;"><strong> PDF SQL NOTES (STRUCTURE
                QUERY LANGUAGE)<br><span style="color: transparent;">w3schools</span></strong> </h1>
        <p style="font-size: 18px;text-align: center; padding-bottom: 1rem;">In this pdf sql notes w3schools we cover all
            the important topic of sql which help you to learn basic to advance tutorial of sql (pdf)</p>
        <br>
        <h2><span style="font-size: 24px; color: rgb(41, 105, 176);"><strong>What is SQL?</strong></span></h2>
        <p><span style="font-size: 18px;">Full form of SQL is Structured Query Language, that could be a language to
                storing, retrieving and manipulating information stored in a relational database.</span></p>
        <p><span style="font-size: 18px;">SQL is a standard language for Relational Database System (RDS).</span></p>
        <p><span style="font-size: 18px;">All the Relational Database Management Systems (RDMS) like MySQL, Oracle, Sybase,
                Postgres , SQL Server etc. use SQL language.</span></p>
        <p><br></p>
        <h2><span style="font-size: 24px; color: rgb(41, 105, 176);"><strong>Why SQL?</strong></span></h2>
        <p><span style="font-size: 18px;">SQL is most popular because SQL offers the following advantages &minus;</span></p>
        <ul class="list" style="list-style-type: square;">
            <li>
                <p style="line-height: 2;"><span style="font-size: 18px;">Using SQL user can access data in the relational
                        database management systems.</span></p>
            </li>
            <li>
                <p style="line-height: 2;"><span style="font-size: 18px;">Using SQL user can describe the data.</span></p>
            </li>
            <li>
                <p style="line-height: 2;"><span style="font-size: 18px;">Using SQL user can define the data in a database
                        and manipulate that data.</span></p>
            </li>
            <li>
                <p style="line-height: 2;"><span style="font-size: 18px;">Using SQL user can create and drop databases and
                        tables.</span></p>
            </li>
            <li>
                <p style="line-height: 2;"><span style="font-size: 18px;">Using SQL user can create view, stored procedure,
                        functions in a database.</span></p>
            </li>
            <li>
                <p style="line-height: 2;"><span style="font-size: 18px;">Using SQL user can set permissions on tables,
                        procedures and views.</span></p>
            </li>
        </ul>

        <div class="container text-center mt-5">
            <div class="row">
                <div class="col">
                    <p style="font-size: 20px; font-weight: 800;color: ;">TABLE OF CONTENTS</p>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <div class="row text-center">
                <div class="col-6">
                    <h3 style="font-size:18px">Introduction to MySQL</h3>
                    <hr>
                    <h3 style="font-size:18px">Creating database</h3>
                    <hr>
                    <h3 style="font-size:18px">Delete a database</h3>
                    <hr>
                    <h3 style="font-size:18px">Use a database</h3>
                    <hr>
                    <h3 style="font-size:18px">Check current database</h3>
                    <hr>
                    <h3 style="font-size:18px">Create database</h3>
                    <hr>
                    <h3 style="font-size:18px">Show table</h3>
                    <hr>
                    <h3 style="font-size:18px">Describe table name</h3>
                    <hr>
                    <h3 style="font-size:18px">Delete a table</h3>
                    <hr>
                    <h3 style="font-size:18px">Insert data into table</h3>
                    <hr>
                    <h3 style="font-size:18px">Show data of table</h3>
                    <hr>
                    <h3 style="font-size:18px">Show warnings</h3>
                    <hr>
                    <h3 style="font-size:18px">Null vs not null</h3>
                    <hr>
                    <h3 style="font-size:18px">Default value</h3>
                    <hr>
                    <h3 style="font-size:18px">Add column in a table</h3>
                    <hr>
                    <h3 style="font-size:18px">Delete a table</h3>
                    <hr>
                    <h3 style="font-size:18px">Primary key</h3>
                    <hr>
                    <h3 style="font-size:18px">Auto increment</h3>
                    <hr>

                </div>
                <div class="col-6">

                    <h3 style="font-size:18px">CRUD operation</h3>
                    <hr>
                    <h3 style="font-size:18px">Select distinct statement</h3>
                    <hr>
                    <h3 style="font-size:18px">Order by keyword</h3>
                    <hr>
                    <h3 style="font-size:18px">Limit keyword</h3>
                    <hr>
                    <h3 style="font-size:18px">Like operator</h3>
                    <hr>
                    <h3 style="font-size:18px">Aggregate function</h3>
                    <hr>
                    <h3 style="font-size:18px">Logical operation</h3>
                    <hr>
                    <h3 style="font-size:18px">Concat function</h3>
                    <hr>
                    <h3 style="font-size:18px">Reverse function</h3>
                    <hr>
                    <h3 style="font-size:18px">Character length function</h3>
                    <hr>
                    <h3 style="font-size:18px">Uppercase function</h3>
                    <hr>
                    <h3 style="font-size:18px">Lowercase function</h3>
                    <hr>
                    <h3 style="font-size:18px">Date time data type</h3>
                    <hr>
                    <h3 style="font-size:18px">Foreign key</h3>
                    <hr>
                    <h3 style="font-size:18px">Inner join</h3>
                    <hr>
                    <h3 style="font-size:18px">Left join</h3>
                    <hr>
                    <h3 style="font-size:18px">Right join</h3>
                    <hr>
                    <h3 style="font-size:18px">Outer join</h3>
                    <hr>
                </div>
            </div>
        </div>
        <hr>
        <p class="text-center" style="font-size:20px;font-weight:800">OTHER COURSES</p>

        <div style="text-align:center;font-weight:800;"><img src="{{ asset('front-assets/images/icons/new-image.gif') }}"
                alt="new_gif" width="24"> Learn
            HTML with notes<a class="text-success" href="https://www.ResumeSathi.com/notes/html-notes-pdf">
                click here </a><img src="{{ asset('front-assets/images/icons/new-image.gif') }}" alt="new_gif"
                width="24"></div>

        <br>
        <div style="text-align:center;font-weight:800;"><img src="{{ asset('front-assets/images/icons/new-image.gif') }}"
                alt="new_gif" width="24"> Learn CSS
            with notes<a class="text-success" href="https://www.ResumeSathi.com/notes/css-notes-pdf"> click
                here </a><img src="{{ asset('front-assets/images/icons/new-image.gif') }}" alt="new_gif" width="24">
        </div>
        <br>
        <div style="text-align:center;font-weight:800;"><img src="{{ asset('front-assets/images/icons/new-image.gif') }}"
                alt="new_gif" width="24"> Learn JS
            with notes<a class="text-success"> click here </a><img
                src="{{ asset('front-assets/images/icons/new-image.gif') }}" alt="new_gif" width="24">
        </div>
        <hr>
        <!-- --------------------------------
                                                                               Google Ads start
                                                                      --------------------------------- -->
        <div>
            <div class="right_cmn_border my-3">
                <div class="right_cmn_inner_div clickMeAds p-2">
                </div>
            </div>
        </div>
        <!-- --------------------------------
                                                                                                                                                                       Google Ads end
                                                                                                                                                              --------------------------------- -->


        <iframe class="iframDisplay" src="https://onedrive.live.com/embed?resid=CF70F4CB7D5FA90B%2138843&authkey=!AMqqHrasdxYbVD0&em=2"
            width="100%" height="700" frameborder="0" scrolling="no"></iframe>
    </div>
@endsection
@section('custom-script')

@endsection
