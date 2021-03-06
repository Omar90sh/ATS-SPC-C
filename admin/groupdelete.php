<?php
session_start();

$self = $_SERVER['PHP_SELF'];
$request = $_SERVER['REQUEST_METHOD'];

include '../config.inc.php';
if ($request !== 'POST') {
    include 'header_get.php';
    include 'topmain.php';
}
echo "<title>$title - Delete Group</title>\n";
echo '<head>';
echo '<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">';
echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">';
echo '<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">';
echo '<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">';
echo '<link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">';
echo '<link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">';
echo '<link rel="stylesheet" href="../plugins/morris/morris.css">';
echo '<link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">';
echo '<link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">';
echo '<link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">';
echo '<link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">';
echo "<script type='text/javascript' src='../plugins/jQuery/jQuery-2.1.4.min.js'></script>";
echo "<script type='text/javascript' src='https://code.jquery.com/ui/1.11.4/jquery-ui.min.js'></script>";
echo "<script type='text/javascript' src='../bootstrap/js/bootstrap.min.js'></script>";
echo "<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js'></script>";
echo "<script type='text/javascript' src='../plugins/morris/morris.min.js'></script>";
echo "<script type='text/javascript' src='../plugins/sparkline/jquery.sparkline.min.js'></script>";
echo "<script type='text/javascript' src='../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>";
echo "<script type='text/javascript' src='../plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>";
echo "<script type='text/javascript' src='../plugins/knob/jquery.knob.js'></script>";
echo "<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js'></script>";
echo "<script type='text/javascript' src='../plugins/daterangepicker/daterangepicker.js'></script>";
echo "<script type='text/javascript' src='../plugins/datepicker/bootstrap-datepicker.js'></script>";
echo "<script type='text/javascript' src='../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'></script>";
echo "<script type='text/javascript' src='../plugins/slimScroll/jquery.slimscroll.min.js'></script>";
echo "<script type='text/javascript' src='../plugins/fastclick/fastclick.min.js'></script>";
echo "<script type='text/javascript' src='../dist/js/app.min.js'></script>";
echo "<script type='text/javascript' src='../dist/js/pages/dashboard.js'></script>";
echo "<script type='text/javascript' src='../dist/js/demo.js'></script>";

echo '</head>';
if (!isset($_SESSION['valid_user'])) {

    echo "<table width=100% border=0 cellpadding=7 cellspacing=1>\n";
    echo "  <tr class=right_main_text><td height=10 align=center valign=top scope=row class=title_underline>Accenture System Administration</td></tr>\n";
    echo "  <tr class=right_main_text>\n";
    echo "    <td align=center valign=top scope=row>\n";
    echo "      <table width=200 border=0 cellpadding=5 cellspacing=0>\n";
    echo "        <tr class=right_main_text><td align=center>You are not presently logged in, or do not have permission to view this page.</td></tr>\n";
    echo "        <tr class=right_main_text><td align=center>Click <a class=admin_headings href='../login.php'><u>here</u></a> to login.</td></tr>\n";
    echo "      </table><br /></td></tr></table>\n";
    exit;
}

if ($request == 'GET') {

    if ((!isset($_GET['groupname'])) && (!isset($_GET['officename']))) {

        echo "<table width=100% border=0 cellpadding=7 cellspacing=1>\n";
        echo "  <tr class=right_main_text><td height=10 align=center valign=top scope=row class=title_underline>Accenture System Error!</td></tr>\n";
        echo "  <tr class=right_main_text>\n";
        echo "    <td align=center valign=top scope=row>\n";
        echo "      <table width=300 border=0 cellpadding=5 cellspacing=0>\n";
        echo "        <tr class=right_main_text><td align=center>How did you get here?</td></tr>\n";
        echo "        <tr class=right_main_text><td align=center>Go back to the <a class=admin_headings href='groupadmin.php'>Group Summary</a> page to edit groups.
            </td></tr>\n";
        echo "      </table><br /></td></tr></table>\n";
        exit;
    }

    $get_group = $_GET['groupname'];
    $get_office = $_GET['officename'];

    echo "<body class='hold-transition skin-blue sidebar-mini'>\n";
    echo "<div class='wrapper'>\n";


    echo "<aside class='main-sidebar'>";
    echo "<section class='sidebar'>\n";
    //echo "<img src='../dist/img/Accenture-Logo.jpg' alt='System Image' height='100' width='200'>\n";

    echo "<div class='user-panel'>\n";
    echo "<div class='pull-left image'>\n";
    echo "<img src='../dist/img/user2-160x160.jpg' class='img-circle' alt='User Image'>\n";
    echo "</div>\n";
    echo "<div class='pull-left info'>\n";
    echo "<p>$logged_in_user</p>\n";
    echo "<a href='#''><i class='fa fa-circle text-success'></i> Online</a>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "<ul class='sidebar-menu'>\n";
    echo "<li class='header'>MAIN NAVIGATION</li>\n";
    echo "<li class='active treeview'>\n";
    echo "<a href=''#'>\n";
    echo "<i class='fa fa-dashboard'></i> <span>Dashboard</span> <i class='fa fa-angle-left pull-right'></i>\n";
    echo "</a>\n";
    echo "</li>\n";
    echo "<li class='treeview'>\n";
    echo "<a href='#'>\n";
    echo "<i class='fa fa-users'></i>\n";
    echo "<span>Users</span>\n";
    echo "<i class='fa fa-angle-left pull-right'></i>\n";
    echo "</a>\n";
    echo "<ul class='treeview-menu'>\n";
    echo "<li><a href='useradmin.php'><i class='fa fa-circle-o'></i>User Summary</a></li>\n";
    echo "<li><a href='usercreate.php'><i class='fa fa-circle-o'></i>Create New User</a></li>\n";
    echo "<li><a href='usersearch.php'><i class='fa fa-circle-o'></i>User Search</a></li>\n";
    echo "</ul>\n";
    echo "</li>\n";

    echo "<li class='treeview'>\n";
    echo "<a href='#'>\n";
    echo "<i class='fa fa-location-arrow'></i>\n";
    echo "<span>Offices</span>\n";
    echo "<i class='fa fa-angle-left pull-right'></i>\n";
    echo "</a>\n";
    echo "<ul class='treeview-menu'>\n";
    echo "<li><a href='officeadmin.php'><i class='fa fa-circle-o'></i>Office Summary</a></li>\n";
    echo "<li><a href='officecreate.php'><i class='fa fa-circle-o'></i>Create New Office</a></li>\n";
    echo "</ul>\n";
    echo "</li>\n";

    echo "<li class='treeview'>\n";
    echo "<a href='#'>\n";
    echo "<i class='fa fa-group'></i>\n";
    echo "<span>Groups</span>\n";
    echo "<i class='fa fa-angle-left pull-right'></i>\n";
    echo "</a>\n";
    echo "<ul class='treeview-menu'>\n";
    echo "<li><a href='groupadmin.php'><i class='fa fa-circle-o'></i>Groups Summary</a></li>\n";
    echo "<li><a href='groupcreate.php'><i class='fa fa-circle-o'></i>Create New Group</a></li>\n";
    echo "</ul>\n";
    echo "</li>\n";




    echo "</ul>\n";
    echo "</section>\n";
    echo "</aside>\n";

    echo "<div class='content-wrapper'>\n";

    echo "    <td align=left class=right_main scope=col>\n";
    echo "      <table width=100% height=100% border=0 cellpadding=10 cellspacing=1>\n";
    echo "        <tr class=right_main_text>\n";
    echo "          <td valign=top>\n";
    echo "            <br />\n";

    $query = "select * from " . $db_prefix . "groups, " . $db_prefix . "offices where officename = '" . $get_office . "' and groupname = '" . $get_group . "'";
    $result = mysql_query($query);

    while ($row = mysql_fetch_array($result)) {

        $officename = "" . $row['officename'] . "";
        $officeid = "" . $row['officeid'] . "";
        $groupname = "" . $row['groupname'] . "";
        $groupid = "" . $row['groupid'] . "";
    }

    if (!isset($officename)) {
        echo "Office name is not defined for this group.\n";
        exit;
    }
    if (!isset($groupname)) {
        echo "Group name is not defined for this group.\n";
        exit;
    }

    $query2 = "select * from " . $db_prefix . "employees where office = '" . $get_office . "' and groups = '" . $get_group . "'";
    $result2 = mysql_query($query2);
    @$user_cnt = mysql_num_rows($result2);

    if ($user_cnt > 0) {
        echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "              <tr>\n";
        echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td>";
        if ($user_cnt == 1) {
            echo "<td class=table_rows_red>This group contains $user_cnt user. This user must be moved to another group before it can be deleted.</td></tr>\n";
        } else {
            echo "<td class=table_rows_red>This group contains $user_cnt users. These users must be moved to another group before it can be deleted.</td></tr>\n";
        }
        echo "            </table>\n";
        echo "            <br />\n";
    }
    echo "            <form name='form' action='$self' method='post'>\n";
    echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
    echo "              <tr>\n";
    echo "                <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/group_delete.png' />&nbsp;&nbsp;&nbsp;Delete Group
                </th>\n";
    echo "              </tr>\n";
    echo "              <tr><td height=15></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Group Name:</td><td align=left width=80%
                      style='padding-left:20px;' class=table_rows><input type='hidden' name='post_groupname'
                      value=\"$groupname\">$get_group</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Parent Office:</td><td align=left width=80%
                      style='padding-left:20px;' class=table_rows width=66%><input type='hidden' name='post_officename'
                      value=\"$officename\">$get_office</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>User Count:</td><td align=left width=80%
                      style='padding-left:20px;' class=table_rows><input type='hidden' name='user_cnt'
                      value=\"$user_cnt\">$user_cnt</td></tr>\n";
    echo "              <tr><td height=15></td></tr>\n";
    echo "            </table>\n";
    echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
    if ($user_cnt == 0) {
        echo "              <tr><td height=40></td></tr></table>\n";
        echo "              <input type='hidden' name='group_name_no_users'>\n";
        echo "              <input type='hidden' name='office_name_no_users'>\n";
    } elseif ($user_cnt == 1) {
        echo "              <tr><td class=table_rows height=53>Move this user to which office?&nbsp;&nbsp;&nbsp;\n";
    } else {
        echo "              <tr><td class=table_rows height=53>Move these users to which office?&nbsp;&nbsp;&nbsp;\n";
    }

    if ($user_cnt > '0') {
        echo "                <select name='office_name' onchange='group_names();'>\n";
        echo "                </select>&nbsp;&nbsp;&nbsp;Which Group?\n";
        echo "                <select name='group_name' onfocus='group_names();'>
                  <option selected></option>\n";
        echo "                </select></td></tr></table>\n";
    }

    echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
    echo "              <input type='hidden' name='post_officeid' value=\"$officeid\">\n";
    echo "              <input type='hidden' name='post_groupid' value=\"$groupid\">\n";
    echo "              <tr><td width=30><input type='image' name='submit' value='Delete Group' src='../images/buttons/next_button.png'></td>
                  <td><a href='groupadmin.php'><img src='../images/buttons/cancel_button.png' border='0'></td></tr></table></form></td></tr>\n";
    include '../footer.php';
    exit;
} elseif ($request == 'POST') {

    include 'header_post.php';
    include 'topmain.php';

    $post_officename = $_POST['post_officename'];
    $post_officeid = $_POST['post_officeid'];
    @$group_name = $_POST['group_name'];
    @$office_name = $_POST['office_name'];
    @$group_name_no_users = $_POST['group_name_no_users'];
    @$office_name_no_users = $_POST['office_name_no_users'];
    $post_groupname = $_POST['post_groupname'];
    $post_groupid = $_POST['post_groupid'];
    $user_cnt = $_POST['user_cnt'];

    // begin post validation //

    if ((!empty($post_officename)) || (!empty($post_officeid)) || ($office_name != 'no_office_users')) {
        $query = "select * from " . $db_prefix . "offices where officename = '" . $post_officename . "' and officeid = '" . $post_officeid . "'";
        $result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
            $officename = "" . $row['officename'] . "";
            $officeid = "" . $row['officeid'] . "";
        }
        mysql_free_result($result);
    }
    if ((!isset($officename)) || (!isset($officeid))) {
        echo "Office name is not defined for this group.\n";
        exit;
    }

    if ((!empty($post_groupname)) || (!empty($post_groupid)) || ($group_name != 'no_group_users')) {
        $query = "select * from " . $db_prefix . "groups where groupname = '" . $post_groupname . "' and groupid = '" . $post_groupid . "'";
        $result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
            $groupname = "" . $row['groupname'] . "";
            $groupid = "" . $row['groupid'] . "";
        }
        mysql_free_result($result);
    }
    if ((!isset($groupname)) || (!isset($groupid))) {
        echo "Group name is not defined for this group.\n";
        exit;
    }

    if (!empty($office_name)) {
        $query = "select * from " . $db_prefix . "offices where officename = '" . $office_name . "'";
        $result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
            $tmp_officename = "" . $row['officename'] . "";
            $tmp_officeid = "" . $row['officeid'] . "";
        }
        mysql_free_result($result);
        if ((!isset($tmp_officename)) || (!isset($tmp_officeid))) {
            echo "Office name is not defined for this group.\n";
            exit;
        }
    }

    if (!empty($group_name)) {
        $query = "select * from " . $db_prefix . "groups where groupname = '" . $group_name . "'";
        $result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
            $tmp_groupname = "" . $row['groupname'] . "";
            $tmp_groupid = "" . $row['groupid'] . "";
        }
        mysql_free_result($result);
        if ((!isset($tmp_groupname)) || (!isset($tmp_groupid))) {
            echo "Group name is not defined for this group.\n";
            exit;
        }
    }

    if (isset($office_name_no_users)) {
        if (!empty($office_name_no_users)) {
            echo "Something is fishy here.\n";
            exit;
        }
    }
    if (isset($group_name_no_users)) {
        if (!empty($group_name_no_users)) {
            echo "Something is fishy here.\n";
            exit;
        }
    }

    $query = "select * from " . $db_prefix . "employees where office = '" . $post_officename . "' and groups = '" . $post_groupname . "'";
    $result = mysql_query($query);
    @$tmp_user_cnt = mysql_num_rows($result);

    if ($user_cnt != $tmp_user_cnt) {
        echo "Posted user count does not equal actual user count for this group.\n";
        exit;
    }

    // end post validation //

    echo "<body class='hold-transition skin-blue sidebar-mini'>\n";
    echo "<div class='wrapper'>\n";


    echo "<aside class='main-sidebar'>";
    echo "<section class='sidebar'>\n";
    //echo "<img src='../dist/img/Accenture-Logo.jpg' alt='System Image' height='100' width='200'>\n";

    echo "<div class='user-panel'>\n";
    echo "<div class='pull-left image'>\n";
    echo "<img src='../dist/img/user2-160x160.jpg' class='img-circle' alt='User Image'>\n";
    echo "</div>\n";
    echo "<div class='pull-left info'>\n";
    echo "<p>$logged_in_user</p>\n";
    echo "<a href='#''><i class='fa fa-circle text-success'></i> Online</a>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "<ul class='sidebar-menu'>\n";
    echo "<li class='header'>MAIN NAVIGATION</li>\n";
    echo "<li class='active treeview'>\n";
    echo "<a href=''#'>\n";
    echo "<i class='fa fa-dashboard'></i> <span>Dashboard</span> <i class='fa fa-angle-left pull-right'></i>\n";
    echo "</a>\n";
    echo "</li>\n";
    echo "<li class='treeview'>\n";
    echo "<a href='#'>\n";
    echo "<i class='fa fa-users'></i>\n";
    echo "<span>Users</span>\n";
    echo "<i class='fa fa-angle-left pull-right'></i>\n";
    echo "</a>\n";
    echo "<ul class='treeview-menu'>\n";
    echo "<li><a href='useradmin.php'><i class='fa fa-circle-o'></i>User Summary</a></li>\n";
    echo "<li><a href='usercreate.php'><i class='fa fa-circle-o'></i>Create New User</a></li>\n";
    echo "<li><a href='usersearch.php'><i class='fa fa-circle-o'></i>User Search</a></li>\n";
    echo "</ul>\n";
    echo "</li>\n";

    echo "<li class='treeview'>\n";
    echo "<a href='#'>\n";
    echo "<i class='fa fa-location-arrow'></i>\n";
    echo "<span>Offices</span>\n";
    echo "<i class='fa fa-angle-left pull-right'></i>\n";
    echo "</a>\n";
    echo "<ul class='treeview-menu'>\n";
    echo "<li><a href='officeadmin.php'><i class='fa fa-circle-o'></i>Office Summary</a></li>\n";
    echo "<li><a href='officecreate.php'><i class='fa fa-circle-o'></i>Create New Office</a></li>\n";
    echo "</ul>\n";
    echo "</li>\n";

    echo "<li class='treeview'>\n";
    echo "<a href='#'>\n";
    echo "<i class='fa fa-group'></i>\n";
    echo "<span>Groups</span>\n";
    echo "<i class='fa fa-angle-left pull-right'></i>\n";
    echo "</a>\n";
    echo "<ul class='treeview-menu'>\n";
    echo "<li><a href='groupadmin.php'><i class='fa fa-circle-o'></i>Groups Summary</a></li>\n";
    echo "<li><a href='groupcreate.php'><i class='fa fa-circle-o'></i>Create New Group</a></li>\n";
    echo "</ul>\n";
    echo "</li>\n";




    echo "</ul>\n";
    echo "</section>\n";
    echo "</aside>\n";

    echo "<div class='content-wrapper'>\n";
    echo "    <td align=left class=right_main scope=col>\n";
    echo "      <table width=100% height=100% border=0 cellpadding=10 cellspacing=1>\n";
    echo "        <tr class=right_main_text>\n";
    echo "          <td valign=top>\n";
    echo "            <br />\n";
    echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
    echo "              <tr>\n";

    if (((isset($office_name)) && (empty($office_name))) || ((isset($group_name)) && (empty($group_name))) ||
        (($group_name == $post_groupname) && ($office_name == $post_officename))
    ) {
        echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td>\n";
    } else {
        echo "                <td class=table_rows width=20 align=center><img src='../images/icons/accept.png' /></td><td class=table_rows_green>Group
                    deleted successfully.</td></tr></table>\n";
    }

    if (((isset($office_name)) && (empty($office_name))) || ((isset($group_name)) && (empty($group_name)))) {
        echo "                <td class=table_rows_red>To delete this group, you must choose to move its' current users to another
                      office <b>AND/OR</b> group.</td></tr></table>\n";
    } elseif (($group_name == $post_groupname) && ($office_name == $post_officename)) {
        echo "                <td class=table_rows_red>To delete this group, you must choose to move its' current users to <b>ANOTHER</b>
                      group.</td></tr></table>\n";
    }

    echo "            <br />\n";
    echo "            <form name='form' action='$self' method='post'>\n";
    echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
    echo "              <tr>\n";
    echo "                <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/group_delete.png' />&nbsp;&nbsp;&nbsp;Delete Group
              </th>\n";
    echo "              </tr>\n";
    echo "              <tr><td height=15></td></tr>\n";

    if (((isset($office_name)) && (empty($office_name))) || ((isset($group_name)) && (empty($group_name))) ||
        (($group_name == $post_groupname) && ($office_name == $post_officename))
    ) {

        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Group Name:</td><td align=left width=80%
                      style='padding-left:20px;' class=table_rows><input type='hidden' name='post_groupname'
                      value=\"$post_groupname\">$post_groupname</td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Parent Office:</td><td align=left width=80%
                      style='padding-left:20px;' class=table_rows><input type='hidden' name='post_officename'
                      value=\"$post_officename\">$post_officename</td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>User Count:</td><td align=left width=80%
                      style='padding-left:20px;' class=table_rows><input type='hidden' name='user_cnt'
                      value=\"$user_cnt\">$user_cnt</td></tr>\n";
        echo "              <tr><td height=15></td></tr>\n";
        echo "            </table>\n";
        echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";

        if ($user_cnt == 0) {
            echo "              <tr><td height=40></td>\n";
        } elseif ($user_cnt == 1) {
            echo "              <tr><td class=table_rows height=53>Move this user to which office?&nbsp;&nbsp;&nbsp;\n";
        } else {
            echo "              <tr><td class=table_rows height=53>Move these users to which office?&nbsp;&nbsp;&nbsp;\n";
        }

        if ($user_cnt > '0') {
            echo "                <select name='office_name' onchange='group_names();'>\n";
            echo "                </select>&nbsp;&nbsp;&nbsp;Which Group?\n";
            echo "                <select name='group_name' onfocus='group_names();'>
                  <option selected></option>\n";
            echo "                </select></td></tr></table>\n";
        }

        echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "              <input type='hidden' name='post_officeid' value=\"$post_officeid\">\n";
        echo "              <input type='hidden' name='post_groupid' value=\"$post_groupid\">\n";
        echo "              <tr><td width=30><input type='image' name='submit' value='Delete Group' src='../images/buttons/next_button.png'></td>
                  <td><a href='groupadmin.php'><img src='../images/buttons/cancel_button.png' border='0'></td></tr></table></form></td></tr>\n";
        include '../footer.php';
        exit;
    } else {

        if ($user_cnt > '0') {
            $query4 = "update " . $db_prefix . "employees set office = ('" . $office_name . "'), groups = ('" . $group_name . "') where office = ('" . $post_officename . "')
           and groups = ('" . $post_groupname . "')";
            $result4 = mysql_query($query4);
        }

        $query5 = "delete from " . $db_prefix . "groups where groupid = '" . $post_groupid . "'";
        $result5 = mysql_query($query5);

        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Group Name:</td><td align=left width=80%
                      style='padding-left:20px;' class=table_rows>$post_groupname</td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Parent Office:</td><td align=left width=80%
                      style='padding-left:20px;' class=table_rows>$post_officename</td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>User Count:</td><td align=left width=80%
                      style='padding-left:20px;' class=table_rows>$user_cnt</td></tr>\n";
        echo "              <tr><td height=15></td></tr>\n";
        echo "            </table>\n";
        echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "              <tr><td height=20 align=left>&nbsp;</td></tr>\n";
        echo "              <tr><td><a href='groupadmin.php'><img src='../images/buttons/done_button.png' border='0'></td></tr></table></td></tr>\n";
        include '../footer.php';
        exit;
    }
}
?>
