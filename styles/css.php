<style>
    .error-msg {
        border: 1px solid red;
        color: red;
    }

    .success-msg {
        border: 1px solid green;
        color: green;
    }

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .container .column {
        float: left;
        width: 50%;
    }

    .container .row:after { /* add these things after all row classes */
        display: table; /* display as a table */
        clear: both; /* clear both right and left elements */
    }

    .navbar {
        overflow: hidden;
        background-color: #333;
    }

    .navbar a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .navbar td {
        color: #f2f2f2;
    }

    .navbar a:hover {
        background-color: #ddd;
        color: black;
    }

    .navbar a.active {
        background-color: #04AA6D;
        color: white;
    }

    #avatar {
        float: right;
    }

    .container {
        margin-top: 15px;
        margin-left: 15px;
    }

    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #333;
        color: white;
        text-align: center;
    }

    .slideshow-container * {
        box-sizing: border-box;
    }

    .slideshow-container .mySlides {
        display: none;
    }

    .slideshow-container img {
        vertical-align: middle;
        height: 500px;
    }

    .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
    }

    /* Number text (1/3 etc) */
    .slideshow-container .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    .slideshow-container .active {
        background-color: #717171;
    }

    /* Fading animation */
    .slideshow-container .fade {
        animation-name: fade;
        animation-duration: 20s;
    }

    @keyframes fade {
        from { opacity: 1 } 
        to { opacity: 0 }
    }

    #login-button {
        text-decoration: none;
        display: inline-block;
        margin: 10px;
        border: 1px solid blue;
        border-radius: 20px;
        padding: 10px;
    }

    #login-button:hover {
        background-color: blue;
        color: white;
    }

    #message-form {
        border: 1px solid black;
        border-radius: 10px;
        display: inline-block;
        padding: 10px;
        text-align: center;
    }

    #application-form {
        border: 1px solid black;
        border-radius: 10px;
        display: none;
        padding: 10px;
        text-align: center;
    }
</style>
