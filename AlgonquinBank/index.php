<?php
session_start();

$index = "index";

if (isset($_POST["disclaimer"])) {
    $index = "true";
    $_SESSION["index"] = $index;
    echo '<script>window.location.href = "Disclaimer.php";</script>';
    exit();
} else {
    if (isset($_SESSION["index"])) {
        $index = $_SESSION["index"];
    }
}
include("./common/header.php");
?>


<style>
.btn {
    border: none;
    background-color: transparent;
    font-size: 16px;
    padding: 0;
    cursor: pointer;
    text-decoration: underline;
    color: blue;
}

.btn:focus {
    outline: none;
}

.btn:hover {
    text-decoration: none; 
    color: #0066cc; 
}

</style>

<div class="container">

    <h1>Welcome to Algonquin Bank</h1>
    <br />

    <form action="index.php" method="POST">
        <div class="row">
            <p>
                Algonquin Bank is the most trusted campus student bank. We provide <br>
                a lot of services to Algonquin campus students to manage their finances.
            </p>
            <br>

            <button class="btn index" name="disclaimer" value="Disclaimer">
                Deposit Calculator
            </button>
        </div>
    </form>

</div>

<?php include('./common/footer.php'); ?>
