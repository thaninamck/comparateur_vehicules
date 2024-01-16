<?php


require_once ('../Controllers/AdminController.php');

class GNewsView {

        public function afficherNews($donneesNews) {
           
            echo '
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

            <div class="container" >
            <div class="d-flex justify-content-between mb-3">
            <h2>Tableau des News</h2>
           
            <div class="col-md-4">
            <input type="text" id="searchInput" class="form-control" placeholder="Rechercher...">
        </div style="margin:20px">
            <a style="margin:20px" href="http://localhost/projet_web/Routers/GNews.php?idadd=1  class="btn btn-primary">Ajouter une nouvelle news</a>
        </div>
                
            </div>
            <table id="myTable" class="display table" style="margin:20px;">
            <thead>
                <tr>
                    <th>Chemin Image</th>
                    <th class="th-sm">Titre</th>
                    <th class="th-sm">Description</th>
                    <th class="th-sm">Contenu</th>
                    <th class="th-sm">Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>';
    
    foreach ($donneesNews as $news) {
        echo '
            <tr>
                <td>' . $news[1] . '</td>
                <td>' . $news[3] . '</td>
                <td>' . $news[4] . '</td>
                <td>' . $news[5] . '</td>
                <td>' . $news[6] . '</td>
                <td>
                    <a href="http://localhost/projet_web/Routers/GNews.php?id=' . $news[2] . '" >Modifier</a>
                    <a href="http://localhost/projet_web/Routers/GNews.php?id=' . $news[2] . '" data-news-id="' . $news[2] . '" class="btn btn-danger delete-news">Supprimer</a>
                </td>
            </tr>';
    }
    
    echo '
            </tbody>
        </table>
            </div>
            ';
        }
        
    
     
        public function showEditNew($new){
           // var_dump("la new est ",$new);
            echo '<form id="newsForm" class="mt-4 mb-4" style="margin:80px">';
            foreach ($new as $newData) {
                echo '
                <div class="mb-3">
                    <label for="imagePath" class="form-label">Chemin Image:</label>
                    <input type="text" class="form-control" id="imagePath" name="imagePath" value="' . $newData["path"] . '">
                </div>
                
                <div class="mb-3">
                    <label for="title" class="form-label">Titre:</label>
                    <input type="text" class="form-control" id="title" name="title" value="' . $newData["titre"] . '">
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="4">' . $newData["description_crt"] . '</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="content" class="form-label">Contenu:</label>
                    <textarea class="form-control" id="content" name="content" rows="6">' . $newData["contenu"] . '</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="date" class="form-label">Date:</label>
                    <input type="date" class="form-control" id="date" name="date" value="' . $newData["date"] . '">
                </div>';
            }
            echo '
                <div class="text-center">
                    <button type="submit" id="' . $newData["id_news"] . '" class="btn btn-primary">Modifier</button>
                </div>
            </form>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            ';
        }
        
        
        public function InsererNew(){
            // var_dump("la new est ",$new);
             echo '<form id="addnewsForm" class="mt-4 mb-4" style="margin:80px">';
             
                 echo '
                 <div class="mb-3">
                     <label for="imagePath" class="form-label">Chemin Image:</label>
                     <input type="text" class="form-control" id="imagePath" name="imagePath" >
                 </div>
                 
                 <div class="mb-3">
                     <label for="title" class="form-label">Titre:</label>
                     <input type="text" class="form-control" id="title" name="title" >
                 </div>
                 
                 <div class="mb-3">
                     <label for="description" class="form-label">Description:</label>
                     <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                 </div>
                 
                 <div class="mb-3">
                     <label for="content" class="form-label">Contenu:</label>
                     <textarea class="form-control" id="content" name="content" rows="6"></textarea>
                 </div>
                 
                 <div class="mb-3">
                     <label for="date" class="form-label">Date:</label>
                     <input type="date" class="form-control" id="date" name="date" >
                 </div>';
             
             echo '
                 <div class="text-center">
                     <button type="submit"  class="btn btn-danger">Inserer</button>
                 </div>
             </form>
             <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
             ';
         }
    
    
    
    
    
    
    
   
    

    
    }

