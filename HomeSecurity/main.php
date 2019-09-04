<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <style>
        .bgco{
            background-color: #ddd;

        }

        * {box-sizing: border-box}
        body {font-family: "Lato", sans-serif;}

        /* Style the tab */
        .tab {
        float: left;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        width: 20%;
        height: 300px;
        }

        /* Style the buttons inside the tab */
        .tab button {
        display: block;
        background-color: inherit;
        color: black;
        padding: 22px 16px;
        width: 100%;
        border: none;
        outline: none;
        text-align: left;
        cursor: pointer;
        transition: 0.3s;
        font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
        background-color: #ddd;
        }

        /* Create an active/current "tab button" class */
        .tab button.active {
        background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
        float: left;
        padding: 0px 12px;
        border: 1px solid #ccc;
        width: 80%;
        border-left: none;
        height: 300px;
        }
    </style>

</head>
    <body>
        
        

            <!--หัว-->
            <div class="w3-container w3-teal">
                <h1>Home Security</h1>
                <p>ระบบรักษาความปลอดภัยภายในบ้าน</p>
            </div>

            <!--ปุ่มเมนูแต่ละปุ่ม-->
            <div class="tab" >
                <button>Menu</button>
                <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">London</button>
                <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
                <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
                <button class="tablinks" onclick="openCity(event, 'Tokyo')">Logout</button>
            
            </div>
            <!--ลิ้งค์คอนเท้นแต่ละปุ่ม-->
            <div id="London" class="tabcontent">
                <h3>London</h3>
                <p>London is the capital city of England.</p>
                <p>armmy</p>
                    <form method="post">
                    <input type="submit" value="GO" name="GO">
                    </form>

                    <?php
                    if(isset($_POST['GO']))
                    {
                        echo ("arm");                     
                        $bbb = exec("http://192.168.1.40/onthedoor.php");
                        echo $bbb;
                        $aaa = shell_exec("http://192.168.1.40/onthedoor.php");
                        echo $aaa;
                        passthru("http://192.168.1.40/onthedoor.php");
                        escapeshellcmd("http://192.168.1.40/onthedoor.php");
                        // $command_output = shell_exec($my_command);
                        // echo $command_output;
                    
                     
                    }
                    ?>
            </div>

            <div id="Paris" class="tabcontent">
                <h3>Paris</h3>
                <p>Paris is the capital of France.</p> 
            </div>

            <div id="Tokyo" class="tabcontent">
                <h3>Tokyo</h3>
                <p>Tokyo is the capital of Japan.</p>
            </div>

            <div id="Logout" class="tabcontent">
                <h3>Logout</h3>
                <p>OUT OF PROGRAMS</p>
            </div>


            <!--ส่วนจาวาสคิป-->
            <script src="node_modules/jquery/dist/jquery.min.js"></script>
            <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
            <script>
                function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
                }

                // Get the element with id="defaultOpen" and click on it
                document.getElementById("defaultOpen").click();
            </script>


    </body>
</html>