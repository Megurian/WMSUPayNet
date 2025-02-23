<?php
require_once "../../tools/functions.php";
require_once "../../database/autoload_classes.php";

$collegeObj = new Colleges();
$studentObj = new Students();
?>

<style>
    .floating-btn {
      position: fixed;
     top: 125px;
      right: 28px;
      background-color: #004d00;
      color: white;
      border-radius: 50%;
      width: 54px;
      height: 54px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 24px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .card-img {
      width: 50px;
      height: 50px;
      object-fit: cover;
    }

    .card:hover {
        border-color: #093909;
        cursor: pointer;
    }

</style>


<div class="container my-4">
    <div class="modal-container"></div>

        
       
        <h3 class="mb-4">Colleges</h3>

        <!-- Floating Add Button -->
        <a id="add-college" href="#" class="floating-btn">
        <i class="bi bi-plus"></i>
        </a>

        <div class="row p-3 pb-2 border rounded align-items-center">
           <h5 class="col-md-2"> School Year</h5>
           <h5 class="col-md-2 border rounded p-1"> 2022-2021</h6>
           <div class="col-md-2">
               <a id="update-year" class="btn bgreen" >Update</a>
           </div>
        </div>
        
        <!-- Card -->
        <?php foreach ($collegeObj->getAllColleges() as $college): ?>
                    
            <div class="card shadow-sm mb-4 mt-4">
                <div class="card-body d-flex align-items-center">

                    <img src="<?= htmlspecialchars($college['logo_directory']) ?>" alt="College Logo" width="100" class="rounded-circle me-3">

                    <div class="flex-grow-1 college" data-college-id="<?= htmlspecialchars($college['id']) ?>">
                        <h5 class="mb-1"><?= htmlspecialchars($college['college']) ?></h5>
                        <p class="mb-1 text-muted">
                            <i class="bi bi-people-fill me-1"></i>
                            <?= htmlspecialchars($studentObj->countStudents($college['id'])) ?>
                        </p>
                        <small class="text-muted">Updated <?= htmlspecialchars($college['created_at']) ?></small>
                    </div>

                    <button class="btn btn-outline-secondary btn-sm dropdown-btn" data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end" data-college-id="<?= htmlspecialchars($college['id']) ?>">
                        <li><a class="dropdown-item edit-college" href="#">Edit</a></li>
                        <li><a class="dropdown-item delete-college" href="#">Delete</a></li>
                    </ul>

                </div>
            </div>

        <?php endforeach; ?>
        
        
</div>