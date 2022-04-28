<?php
include "header.php";
include "footer.php";
$requete = "SELECT body_section FROM section WHERE id_section = :id";
$sql = $bdd->prepare($requete);
$sql->bindParam(':id', $_POST['idSection']);
$sql->execute();
$result = $sql->fetch();
?>
<form method="post" action="modifArticle.php">
  <?php
    if (isset($result['body_section']))
    {
      echo '<input type="hidden" name="titleSection" value="'.$_POST['titleSection'].'">';
      echo '<input type="hidden" name="idSection" value="'.$_POST['idSection'].'">';
      echo '<input type="hidden" name="idParentArticle" value="'.$_POST['idParentArticle'].'">';
      echo '<input type="hidden" name="orderSection" value="'.$_POST['orderSection'].'">';
      ?>
        <textarea id="bodySection" name="bodySection"><?php echo $result['body_section']; ?></textarea> 
      <?php
    }else{
      echo '<input type="hidden" name="idArticle" value="'.$_GET['id'].'">';
      ?>
        <textarea id="titleSection" name="titleSection"></textarea> 
        <textarea id="bodySection" name="bodySection"></textarea> 
      <?php
    }
  ?>
  <button>Valider</button>
</form>
<script>

    tinymce.init({
        selector: '#bodySection',
        plugins: 'image',
        a11y_advanced_options: true,
        // without images_upload_url set, Upload tab won't show up
        images_upload_url: 'upload.php',
    
        // override default upload handler to simulate successful upload
        images_upload_handler: function (blobInfo, success, failure) {
          var xhr, formData;
      
          xhr = new XMLHttpRequest();
          xhr.withCredentials = false;
          xhr.open('POST', 'upload.php');
      
          xhr.onload = function() {
              var json;
        
              if (xhr.status != 200) {
                  failure('HTTP Error: ' + xhr.status);
                  return;
              }
        
              json = JSON.parse(xhr.responseText);
              console.log(json);
        
              if (!json || typeof json.location != 'string') {
                  failure('Invalid JSON: ' + xhr.responseText);
                  return;
              }
        
              success(json.location);
          };
      
          formData = new FormData();
          formData.append('file', blobInfo.blob(), blobInfo.filename());
      
          xhr.send(formData);
      },
    });

    tinymce.init({
        selector: '#titleSection',
    });

</script>