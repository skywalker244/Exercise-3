<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Group 1 | Exercise 3</title>
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

        <style>
            *{
                font-family: "Figtree", sans-serif;
                font-optical-sizing: auto;
                font-style: normal;
                box-sizing: border-box;
                padding: 0;
                margin: 0;
                transition: 0.2s linear;
                font-size: 1.1rem;
            }

            body{
                height: 100vh;
                width: 100vw;
                display: flex;
                gap: 1rem;
                padding: .5rem;
            }

            .search-file{
                width: 100%;
                height: 100%;
            }

            .search-file form{
                width: 100%;
                height: 100%;
                display: flex;
                gap: 1rem;
            }

            .search-file form .search-form{
                width: 25%;
                height: 100%;
                padding: 1rem;
                border-radius: 10px;
                display: flex;
                flex-direction: column;
                align-items:center;
                box-shadow: 0 0 5px 1px #afafaf;
            }

            .search-file form label{
                width: 100%;
                font-weight: 500;
                font-size: 1.1rem;
                margin-bottom: .5rem;
            }

            .search-file form input[type='text']{
                padding: .5rem 1rem;
                width: 100%;
                border: none;
                border: 1px solid blue;
                margin-bottom: .5rem;
            }

            .search-file form input[type='submit'], .search input, .btn button{
                padding: .5rem 1rem;
                width: auto;
                font-size: 1rem;
                color: blue;
                border: none;
                border: 1px solid blue;
                border-radius: 5px;
                background: white;
                cursor: pointer;
            }

            .search-file form input[type='submit']:hover, .search input:hover, .btn button:hover{
                background-color: blue;
                color: white;
            }

            .search-file .status-tag{
                height: 80%;
                width: 100%;
                display: flex;
                flex-wrap: wrap;
                align-items: center;
            }

            .search-file .status-tag .notif{
                width: 100%;
                padding: 1rem;
                background: #555555;
                color: white;
                border-radius: 5px;
                font-size: 1rem;
                display: flex;
                flex-wrap: wrap;
                justify-content: right;
            }

            .search-file .status-tag .notif p{
                width: 100%;
            }

            .search-file .status-tag .notif button, .status-tag .notif input{
                background: transparent;
                color: white;
                border: 1px solid #333333;
                border-radius: 5px;
                padding: .3rem .5rem;
                cursor: pointer;
            }

            .search-file .status-tag .notif .con-btn{
                background: transparent;
                color: white;
                border: 1px solid #333333;
            }

            .search-file .status-tag .notif button:hover{
                background: red;
                color: white;
                border: 1px solid red;
            }

            .search-file .status-tag .notif input:hover{
                background: blue;
                color: white;
                border: 1px solid blue;
            }

            .content-form{
                height: 100%;
                width: 75%;
                border-radius: 10px;
                box-shadow: 0 0 5px 1px #afafaf;
                display: flex;
                padding: 1rem;
                flex-wrap: wrap;
            }

            .content-form h4{
                width: 30%;
                height: 50px;
                font-size: 1.2rem;
                font-weight: 500;
                display: flex;
                align-items: end;
            }

            .content-form .search-bar{
                height:50px;
                width: 70%;
                display: flex;
                justify-content: right;
                flex-direction: row-reverse;
            }

            .content-form .search-bar .search{
                height: 100%;
                width: 65%;
                display: flex;
                align-items: start;
                justify-content: right;
                margin-top: 5px;
            }

            .content-form .search-bar .search input[type='text']{
                border: 1px solid black;
                width: 300px;
                border-radius: 0;
                display: flex;
                justify-content: right;
                align-items: center;
                cursor:auto;
                color: black;
                margin-right: .5rem;
            }

            .content-form .search-bar input[type='text']:hover{
                background: transparent;
            }

            .content-form .search-bar p{
                font-size: .8rem;
                height: 100%;
                display: flex;
                align-items: end;
                color: blue;
            }

            .content-form .textarea{
                border: 1px solid #afafaf;
                max-width: 100%;
                min-width: 100%;
                max-height: 80%;
                min-height: 80%;
                font-size: 1.1rem;
                padding: .5rem;
                overflow-y: scroll;
            }

            .content-form .btn{
                height: 10%;
                width: 100%;
                display: flex;
                align-items: end;
                justify-content: space-between;
            }

            .content-form .btn p{
                height: 100%;
                width: 50%;
            }

            .content-form .btn input[type='submit']{
                padding: 1rem 2rem;
            }
        </style>

        <script>
            function passValues() {
                var textArea = document.getElementById('textarea').innerText;
                document.getElementById('textHolder').value = textArea;
            }
        </script>
    </head>
    <body>
    <?php
        $FS = '';
        $FC = '';
        $SW = '';
        $WOC = '';
        $RES = 0;
        $HCON = '';
        $SUB = '';
        $TH = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $FLS = trim($_POST['filesearch']) ?? '';
            $SW = trim($_POST['searchword'] ?? '');
            $TH = $_POST['textholder'] ?? '';
            $CLKFLS = isset($_POST['searchFileBtn']);
            $NFLS = isset($_POST['createNewFileBtn']);
            $SWI = isset($_POST['searchword']);
            $SWB = isset($_POST['searchWordBtn']);
            $SWT = htmlspecialchars($SW);
            $FS = htmlspecialchars($FLS);
            $SI = "This is first line.\nThis is second line.";
            $SUB = isset($_POST['saveFileBtn']);

            if (isset($FLS)) {
                if ($CLKFLS) {
                    if (file_exists($FS)) {
                        if (file($FLS, FILE_USE_INCLUDE_PATH)) {
                            $FC = file_get_contents(htmlspecialchars($FLS));
                            $WOC = str_word_count($FC);
                        } else { echo " File not found";}
                    }
                }
                if ($NFLS) {
                    if(file_put_contents($FS, $SI) !== false) {
                        $FC = file_get_contents(htmlspecialchars($FLS));
                        $WOC = str_word_count($FC);
                    }
                }
                if ($SWI) {
                    if ($SWB) {
                        $CON = file_get_contents($FLS);
                        if ($SW !== '') {
                            $ST = preg_quote($SW, '/');
                            $regex = '/\b' . $ST . '\b/i';
                            $RES = preg_match_all($regex, $CON, $matches);

                            $FC = preg_replace($regex, '<mark>$0</mark>', $CON);
                            $WOC = str_word_count($CON);
                        } else { $FC = nl2br(htmlspecialchars($CON)); }
                    }
                } else { $FC = file_get_contents(htmlspecialchars($FLS)); }
                if ($SUB) {
                    $TH = $_POST['textholder'];
                    file_put_contents($FS, $TH);
                }
            }
        }
    ?>
        <div class="search-file">
            <form method="post" onsubmit="passValues()">
                <div class="search-form">
                    <label for="fileSearch">Input File Name</label>
                    <input type="text" name="filesearch" id="fileSearch" placeholder="sample.txt" value="<?php echo $FS; ?>">
                    <input type="submit" name="searchFileBtn" value="Search File">
                    <div class="status-tag">
                        <div class="notif" id="exists" style="display: none;">
                            <p>File '<?php echo $FLS;?>' has been found</p>
                        </div>
                        <div class="notif" id="notFound" style="display: none;">
                            <p>File '<?php echo $FLS;?>' can not be Found</p>
                            <p>Create new File?</p>
                            <input type="submit" name="createNewFileBtn" value="Yes" class="con-btn">
                            <button id="noBtn">No</button>
                        </div>
                        <div class="notif" id="fileCreated" style="display: none;">
                            <p>File '<?php echo $FLS;?>' successfully created.</p>
                        </div>
                        <div class="notif" id="fileNotCreated" style="display: none;">
                            <p>File '<?php echo $FLS;?>' creation unsuccessful.</p>
                        </div>
                        <div class="notif" id="fileSaved" style="display: none;">
                            <p>File '<?php echo $FLS;?>' has been saved.</p>
                        </div>
                        <div class="notif" id="fileNotSaved" style="display: none;">
                            <p>File '<?php echo $FLS;?>' saving failed.</p>
                        </div>
                    </div>
                </div>
                <div class="content-form">
                    <h4>File Contents</h4>
                    <div class="search-bar">
                        <div class="search">
                            <input type="text" name="searchword" id="searchWord" placeholder="Search from File" value="<?php echo htmlspecialchars($SW); ?>">
                            <input type="submit" name="searchWordBtn" value="Search">
                        </div>
                        <p id="resultTag" style="display: none;"><?php echo $RES;?> results found</p>
                    </div>
                    <div class="textarea" id="textarea" contenteditable="true">
                        <?php echo $FC; ?>
                    </div>
                    <input type="hidden" name="textholder" id="textHolder" value="">
                    <div class="btn">
                        <p>No. of words: <strong><?php echo $WOC;?></strong></p>
                        <input type="submit" onclick="passValues()" name="saveFileBtn" value="Save Changes">
                    </div>
                </div>
            </form>
        </div>
        <script>
            const saveBtn = document.getElementById('confirmBtn');
            const cancelBtn = document.getElementById('cancelBtn');
            const showConfirm = document.getElementById('confirmChanges');
            const showMessage = document.getElementById('message');
            const notifCard = document.getElementById('notif');
            const noBtn = document.getElementById('noBtn');
            var exist = document.getElementById('exists');
            var notfound = document.getElementById('notFound');
            var fileCreated = document.getElementById('fileCreated');
            var fileNotCreated = document.getElementById('fileNotCreated');
            var fileSaved = document.getElementById('fileSaved');
            var fileNotSaved = document.getElementById('fileNotSaved');
            var resultTag = document.getElementById('resultTag');

            showConfirm.style.display = "none";

            saveBtn.addEventListener('click', function(event) {
                event.stopPropagation();
                event.preventDefault();
                if (showConfirm.style.display !== "flex") {
                    showConfirm.style.display = "flex";
                }
            });

            showConfirm.addEventListener('click', function(event) {
                event.stopPropagation();
                event.preventDefault();
                if (showConfirm.style.display === "flex") {
                    showConfirm.style.display = "none";
                }
            });

            cancelBtn.addEventListener('click', function(event) {
                event.preventDefault();
                event.stopPropagation();
                if (showConfirm.style.display === "flex") {
                    showConfirm.style.display = "none";
                }
            });

            showMessage.addEventListener('click', function(event) {
                event.preventDefault();
                event.stopPropagation();
            });

            noBtn.addEventListener('click', function(event) {
                if (notifCard.style.display !== "none") {
                    notifCard.style.display = "none";
                }
            });
        </script>
    </body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($FLS)) {
        if ($CLKFLS) {
            if (file_exists($FS)) {
                echo " <script type = 'text/javascript'>
                exist.style.display = 'flex';
                notfound.style.display = 'none';
                fileCreated.style.display = 'none';
                fileNotCreated.style.display = 'none';
                fileSaved.style.display = 'none';
                fileNotSaved.style.display = 'none';
                </script>";
            } else {
                echo " <script type = 'text/javascript'>
                notfound.style.display = 'flex';
                exist.style.display = 'none';
                fileCreated.display = 'none';
                fileNotCreated.display = 'none';
                fileSaved.style.display = 'none';
                fileNotSaved.style.display = 'none';
                </script>";
            }
        }

        if ($NFLS) {
            if(file_put_contents($FS, $SI) !== false) {
                echo " <script type = 'text/javascript'>
                fileCreated.style.display = 'flex';
                exist.style.display = 'none';
                notfound.display = 'none';
                fileNotCreated.style.display = 'none';
                fileSaved.style.display = 'none';
                fileNotSaved.style.display = 'none';
                </script>";
            } else {
                echo " <script type = 'text/javascript'>
                fileNotCreated.style.display = 'flex';
                exist.style.display = 'none';
                notfound.style.display = 'none';
                fileCreated.style.display = 'none';
                fileSaved.style.display = 'none';
                fileNotSaved.style.display = 'none';
                </script>";
                exit;
            }
        }

        if ($SWI) {
            if ($SWB) {
                echo "<script type = 'text/javascript'>
                resultTag.style.display = 'flex';
                </script>";
            }
        }
        if ($SUB) {
            if(file_put_contents($FS, $TH) !== false) {
                echo " <script type = 'text/javascript'>
                fileSaved.style.display = 'flex';
                fileNotCreated.style.display = 'none';
                exist.style.display = 'none';
                notfound.style.display = 'none';
                fileCreated.style.display = 'none';
                fileNotSaved.style.display = 'none';
                </script>"; 
                $FS = '';
                $FLS = '';
                $FC = '';
                $SW = '';
                $WOC = '';
                $RES = 0;
                $HCON = '';
                exit;
            } else {
                echo " <script type = 'text/javascript'>
                fileNotSaved.style.display = 'flex';
                fileNotCreated.style.display = 'none';
                exist.style.display = 'none';
                notfound.style.display = 'none';
                fileCreated.style.display = 'none';
                fileSaved.style.display = 'none';                
                </script>";
            }
        }
    }
}
?>