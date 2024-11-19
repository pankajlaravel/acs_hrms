<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar and Sidebar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* General Reset */
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #ffffff;
            border-bottom: 1px solid #eaeaea;
            font-family: Arial, sans-serif;
            width: 100%;
            /* Make the navbar take full width */
            position: fixed;
            /* Fixed to the top */
            top: 0;
            /* Align it to the top */
            left: 0;
            /* Make sure it spans the entire width */
            z-index: 1000;
            /* Ensure it stays above other elements */
        }

        body {
            margin-top: 50px;
            /* Adjust the body's top margin to avoid overlap with the fixed navbar */
        }

        /* Logo Styling */
        .navbar-logo {
            display: flex;
            align-items: center;
            font-size: 20px;
            font-weight: bold;
        }

        .logo-red {
            color: #ff4d4d;
        }

        .logo-icon {
            color: #ff4d4d;
            margin: 0 5px;
        }

        .logo-blue {
            color: #3578e5;
        }

        /* Right Section */
        .navbar-right {
            display: flex;
            align-items: center;
            gap: 15px;
            /* Spacing between items */
        }

        /* Search Box */
        .navbar-search {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-input {
            padding: 5px 10px;
            padding-left: 30px;
            /* Space for the icon */
            border: 1px solid #ccc;
            border-radius: 20px;
            font-size: 14px;
            width: 200px;
        }

        .search-button {
            position: absolute;
            left: 8px;
            /* Adjust position of the icon */
            background: none;
            border: none;
            font-size: 16px;
            color: #666;
            cursor: pointer;
        }

        /* Chat Button */
        .chat-button {
            display: flex;
            align-items: center;
            padding: 5px 10px;
            background-color: #eaf4ff;
            border: 1px solid #d1e8ff;
            border-radius: 20px;
            font-size: 14px;
            cursor: pointer;
        }

        .chat-avatar {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            margin-right: 5px;
        }

        /* Dropdown */
        .dropdown {
            display: flex;
            align-items: center;
            font-size: 14px;
            cursor: pointer;
        }

        .dropdown-arrow {
            margin-left: 5px;
            font-size: 12px;
        }

        /* Notifications */
        .notification {
            position: relative;
        }

        .bell-icon {
            font-size: 18px;
            cursor: pointer;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: red;
            color: white;
            font-size: 10px;
            border-radius: 50%;
            width: 15px;
            height: 15px;
            text-align: center;
            line-height: 15px;
        }

        /* Settings and Logout Button */
        .settings-button,
        .logout-button {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .sidebar {
            display: flex;
            flex-direction: column;
            height: 93vh;
            width: 300px;
            position: fixed;
        }

        /* Top Home Bar */
        .top-home-bar {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            background-color: #f2f2f2;
            border-right: 1px solid #b4c2e0;
            border-bottom: 1px solid #b4c2e0;
            width: 300px;
        }

        .home-icon {
            font-size: 20px;
            color: #7a8190;
        }

        .top-text h2 {
            font-size: 18px;
            font-weight: 700;
            color: #7a8190;
        }

        .top-text p {
            font-size: 14px;
            color: #7a8190;
        }

        /* Sidebar Icons */
        .d-flex {
            display: flex;
        }

        .main-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: hsl(226, 71%, 61%);
            height: calc(93vh - 70px);
            width: 50px;
        }

        .sidebar-icon {
            font-size: 20px;
            color: #fff;
            margin: 15px 0;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }

        .sidebar-icon:hover {
            transform: scale(1.2);
        }

        /* Sidebar Content */
        .sidebar-intro {
            width: 250px;
            padding: 20px;
            border-right: 1px solid #b4c2e0;
            background-color: #ffffff;
            position: relative;
            height: 100%;
            max-height: calc(93vh - 70px);
            /* Limit height based on viewport */
            overflow-y: auto;
            /* Enable vertical scrollbar when content overflows */
        }

        /* Dropdown Menu */
        ul {
            list-style-type: none;
        }

        .menu-item {
            font-size: 16px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #e0e0e0;
        }

        .menu-item:hover {
            background-color: #f0f0f0;
        }

        .submenu {
            list-style: none;
            padding-left: 20px;
            display: none;
            /* Initially hidden */
            max-height: 0;
            transition: max-height 0.3s ease-in-out, display 0s 0.3s;
        }

        .submenu.expanded {
            display: block;
            /* Show when expanded */
            max-height: 500px;
        }

        .submenu li {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
            padding: 5px 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .submenu li:hover {
            background-color: #eaeaea;
            cursor: pointer;
        }

        .dropdown-icon {
            font-size: 16px;
        }

        .dropdown-icon.open {
            transform: rotate(90deg);
        }
        .container {
      display: flex;
      height: 100vh; /* Take full viewport height */
    }
    .content {
      margin-left: 310px; /*Space for the sidebar*/
      padding: 20px;
      flex: 1; /* Take the remaining space */
      overflow-y: auto;
      padding-top: 50px; /* Avoid overlap with fixed navbar */
    height: 100vh;
    }

    /* Main Content Example */
    .content h1 {
      font-size: 24px;
      color: #333;
    }

    .content p {
      color: #555;
      font-size: 16px;
    }
    </style>
</head>
  <body>
{{--     
    <div id="spinner" class="spinner-border text-primary" role="status" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;">
      <span class="sr-only">Loading...</span>
    </div>
   <script src="{{asset('admin/dist/js/demo-theme.min159a.js?1726507346')}}"></script> --}}