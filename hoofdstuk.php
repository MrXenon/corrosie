<?php 
include 'content/header.php';
include 'model/classTemplate.php';

$template = new Template();

if(isset($_GET['pagenumber'])){
  $id=$_GET['pagenumber'];
}else{
  $id = 0;
}

$chapterList = $template->getChapterList();
$subChapterList = $template->getSubChapterList();
$chapterContentList = $template->getChapterContentList($id);
$chapterContentListByChapter = $template->getChapterContentListByChapter();
$chapterContentListByChapterMinID = $template->getChapterContentListByChapterMinID();

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit;
}

?>

<h1 class=" d-flex justify-content-center"></h1>

<body class="d-flex flex-column min-vh-100">

<?php 
foreach($chapterContentList as $cbj){
echo $cbj->getPageContent();
}
?>

 
    <div class="container pagimenu-3">
      <div class="d-flex justify-content-center ">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
          <?php
          $val = $chapterContentListByChapterMinID['MIN(`id`)'];
          for($page_number = $val; $page_number<= $template->getChapterContentListByChapterCounter() +$val; $page_number++) {  
                echo '<li class="page-item"><a class="page-link" href="hoofdstuk.php?pagenumber='.$page_number.'">'.$page_number.'</a></li>';  
          }  
          ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>

</body>

<?php include 'content/footer.php'; ?>