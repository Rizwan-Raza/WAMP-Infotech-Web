<?php if (!isset($_SESSION)) {
    session_start();
} if (isset($_SESSION['admin']) and
$_SESSION['admin'] == true) {
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Digital Marketing Company | Web Design Company</title>
    <base href="../" />
    <?php include "includes/head.inc.php"; ?>
    <link rel="stylesheet" href="admin/css/users.css" />
    <link href='admin/packages/core/main.css' rel='stylesheet' />
    <link href='admin/packages/daygrid/main.css' rel='stylesheet' />
    <style>
        #calendar {
            max-width: 900px;
            margin: 40px auto;
        }

        .loader {
            height: 300px
        }

        .loader,
        .loader .preloader-wrapper {
            display: flex;
        }

        .loader .preloader-wrapper {
            margin: auto
        }

        .h-scroll {
            overflow-x: auto;
        }

        #listNav {
            display: none
        }

        #listNav h5 button {
            margin-top: -8px;
        }

        #listView table td.absent {
            background-color: #FAE3E3;
        }

        #listView table td.present {
            background-color: #c8e6c9;
        }

        #listView table td.attending {
            background-color: #FDF1BA;
        }

        #listView table td {
            padding: 8px 5px;
        }

        #detailedInfo {
            max-width: 500px;
        }
    </style>
</head>

<body>
    <!-- Page Layout here -->
    <section class="row m-0 p-0">
        <?php include "includes/sidenav.inc.html" ?>

        <div class="col s12 m9 white m-0 p-0" style="height:100vh;overflow:auto">
            <a class="p-2 pb-0 left" href="javascript:toggleNav()"><i class="material-icons">menu</i></a>
            <div class="px-4">
                <h4 class="my-1">Attendance <button
                        class="btn-flat btn-floating white waves-effect waves-dark right align-right"
                        onclick="switchView(this)"><i class="material-icons black-text">date_range</i></button>
                </h4>
            </div>
            <div class="border-top-1 grey-border border-lighten-2 mt-2"></div>
            <div class="loader">
                <div class="preloader-wrapper big active">
                    <div class="spinner-layer spinner-blue-only">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="gridView" class="p-2">
                <div id='calendar'></div>
                <div id="legends"></div>
            </div>
            <div id="listView" class="grey lighten-3">
                <div id="listNav">
                    <h5 class="m-0 p-2"><span class="fw-700" id="monthTitle"></span><button
                            class="btn-flat btn-floating white waves-effect waves-dark right align-right mr-2"
                            onclick="getNext()" id="nextBtn"><i
                                class="material-icons black-text">arrow_forward</i></button><button
                            class="btn-flat btn-floating white waves-effect waves-dark right align-right mr-2"
                            onclick="getPrevious()" id="prevBtn"><i
                                class="material-icons black-text">arrow_back</i></button>
                    </h5>
                    <div class="clearfix"></div>
                </div>
                <div class="h-scroll border-top-1 grey-border border-lighten-2">
                    <table id="forView">
                        <tbody></tbody>
                    </table>
                    <table id="monthly-attendance" style="display:none">
                        <tbody></tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light bg-primary modal-trigger" href="#exportModal">
                <i class="material-icons">save_alt</i>
            </a>
        </div>

        <div id="exportModal" class="modal border-radius-8">
            <div class="progress-holder hide" id="progress">
                <div class="progress">
                    <div class="indeterminate bg-primary"></div>
                </div>
            </div>
            <div class="prevent-overlay hide full border-radius-8"></div>
            <div class="modal-content">
                <h4>Export Monthly Attendance</h4>
                <div class="row">
                    <div class="col s12 m6 my-4 center">
                        <button onclick="exportFile('.xlsx')"
                            class="fw-500 waves-effect waves-light btn-large px-2 pr-3 btn-floating"
                            style="width: auto; border-radius: 32px;background-color: #217346"><svg height="24px"
                                width="24px" style="margin:16px 16px 16px 0px" role="img" viewBox="0 0 24 24"
                                class="left" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#fff"
                                    d="M23.553 3.102h-8.04V4.59h2.37v2.354h-2.37v.75h2.37v2.357h-2.37v.771h2.37v2.229h-2.37v.893h2.37v2.234h-2.37v.893h2.37v2.247h-2.37v1.639h8.04c.127-.038.233-.188.318-.448.085-.262.129-.475.129-.636V3.374c0-.128-.044-.205-.129-.232-.085-.026-.191-.04-.318-.04zM22.51 19.316h-3.857v-2.245h3.857v2.247-.002zm0-3.138h-3.857v-2.235h3.857v2.235zm0-3.128h-3.857v-2.219h3.857v2.221-.002zm0-3h-3.857V7.696h3.857v2.355-.001zm0-3.119h-3.857v-2.34h3.857v2.355-.015zM0 2.731v18.601l14.16 2.449V.219L0 2.739v-.008zm8.393 14.071c-.054-.146-.308-.766-.758-1.863-.449-1.096-.72-1.734-.799-1.916h-.025l-1.519 3.615-2.03-.137 2.408-4.5-2.205-4.5 2.07-.109 1.368 3.521h.027l1.545-3.681 2.139-.135-2.547 4.87 2.625 4.968-2.299-.135v.002z" />
                            </svg>
                            Download in .xlsx</button>
                    </div>
                    <div class="col s12 m6 my-4 center">
                        <button onclick="exportFile('.xls')"
                            class="fw-500 waves-effect waves-light waves-green btn-large px-2 pr-3 btn-floating grey lighten-4 "
                            style="width: auto; border-radius: 32px;color: #217346"><svg height="24px" width="24px"
                                style="margin:16px 16px 16px 0px" role="img" viewBox="0 0 24 24" class="left"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill="#217346"
                                    d="M23.553 3.102h-8.04V4.59h2.37v2.354h-2.37v.75h2.37v2.357h-2.37v.771h2.37v2.229h-2.37v.893h2.37v2.234h-2.37v.893h2.37v2.247h-2.37v1.639h8.04c.127-.038.233-.188.318-.448.085-.262.129-.475.129-.636V3.374c0-.128-.044-.205-.129-.232-.085-.026-.191-.04-.318-.04zM22.51 19.316h-3.857v-2.245h3.857v2.247-.002zm0-3.138h-3.857v-2.235h3.857v2.235zm0-3.128h-3.857v-2.219h3.857v2.221-.002zm0-3h-3.857V7.696h3.857v2.355-.001zm0-3.119h-3.857v-2.34h3.857v2.355-.015zM0 2.731v18.601l14.16 2.449V.219L0 2.739v-.008zm8.393 14.071c-.054-.146-.308-.766-.758-1.863-.449-1.096-.72-1.734-.799-1.916h-.025l-1.519 3.615-2.03-.137 2.408-4.5-2.205-4.5 2.07-.109 1.368 3.521h.027l1.545-3.681 2.139-.135-2.547 4.87 2.625 4.968-2.299-.135v.002z" />
                            </svg>
                            Download in .xls</button>
                    </div>
                    <div class="col s12 m6 center">
                        <button onclick="exportFile('.csv')"
                            class="fw-500 waves-effect waves-light waves-green btn-large px-2 pr-3 btn-floating grey lighten-4 "
                            style="width: auto; border-radius: 32px;color: #217346"><svg height="24px" width="24px"
                                style="margin:16px 16px 16px 0px" role="img" viewBox="0 0 24 24" class="left"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill="#217346"
                                    d="M23.553 3.102h-8.04V4.59h2.37v2.354h-2.37v.75h2.37v2.357h-2.37v.771h2.37v2.229h-2.37v.893h2.37v2.234h-2.37v.893h2.37v2.247h-2.37v1.639h8.04c.127-.038.233-.188.318-.448.085-.262.129-.475.129-.636V3.374c0-.128-.044-.205-.129-.232-.085-.026-.191-.04-.318-.04zM22.51 19.316h-3.857v-2.245h3.857v2.247-.002zm0-3.138h-3.857v-2.235h3.857v2.235zm0-3.128h-3.857v-2.219h3.857v2.221-.002zm0-3h-3.857V7.696h3.857v2.355-.001zm0-3.119h-3.857v-2.34h3.857v2.355-.015zM0 2.731v18.601l14.16 2.449V.219L0 2.739v-.008zm8.393 14.071c-.054-.146-.308-.766-.758-1.863-.449-1.096-.72-1.734-.799-1.916h-.025l-1.519 3.615-2.03-.137 2.408-4.5-2.205-4.5 2.07-.109 1.368 3.521h.027l1.545-3.681 2.139-.135-2.547 4.87 2.625 4.968-2.299-.135v.002z" />
                            </svg>
                            Download in .csv</button>
                    </div>
                    <div class="col s12 m6 center">
                        <button onclick="exportFile('.txt')"
                            class="fw-500 waves-effect waves-light btn-large px-2 pr-3 btn-floating bg-primary"
                            style="width: auto; border-radius: 32px;"><i class="material-icons left">description</i>
                            Download in .txt</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Modal Structure -->
    <div id="detailedInfo" class="modal">
        <div class="modal-content">
            <h4>Modal Header</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Worked Hours</td>
                        <td id="time">0</td>
                    </tr>
                    <tr>
                        <td>Present</td>
                        <td id="present">0</td>
                    </tr>
                    <tr>
                        <td>Remaining Leaves</td>
                        <td id="leaves">0</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <a href="javascript:;" class="modal-close waves-effect waves-light btn bg-primary">Close</a>
        </div>
    </div>

    <?php include "includes/scripts.inc.php"; ?>
    <script src="https://www.gstatic.com/firebasejs/5.9.0/firebase.js"></script>
    <script src='admin/packages/core/main.js'></script>
    <script src='admin/packages/interaction/main.js'></script>
    <script src='admin/packages/daygrid/main.js'></script>
    <script src="admin/js/attendance/xlsx.core.min.js"></script>
    <script src="admin/js/attendance/FileSaver.min.js"></script>
    <script src="admin/js/attendance/tableexport.min.js"></script>
    <script src="admin/js/attendance/attendance.js"></script>
</body>

</html>

<?php
} else {
        header("Location: /admin/?redirect_to=".$_SERVER['REDIRECT_URL']);
    } ?>