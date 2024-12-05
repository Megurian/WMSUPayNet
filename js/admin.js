document.querySelectorAll('.sidebar-item a.nav-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault(); 

        document.querySelectorAll('.sidebar-item a.nav-link').forEach(link => link.classList.remove('link-active'));

        this.classList.add('link-active');

        if (this.id === 'dashboard-link') {
            fetch('overview.php')
                .then(response => response.text())
                .then(html => {
                    document.querySelector('.content-page').innerHTML = html;
                    loadChart()
                })
                
        }else if (this.id === 'university-link') {
            fetch('university/university.php')
            .then(response => response.text())
            .then(html => {
                document.querySelector('.content-page').innerHTML = html;
                
                document.getElementById('add-college').addEventListener('click', function(e) {
                    e.preventDefault();
                    fetch('university/add-college.html')
                    .then(response => response.text())
                    .then(html => {
                        $('.modal-container').html(html);
                        $('#addCollegeModal').modal('show');
                        addCollege();
                    });
                });

                document.getElementById('1').addEventListener('click', function(e) {
                    e.preventDefault();
                    fetch('university/organizations.php')
                    .then(response => response.text())
                    .then(html => {
                        document.querySelector('.content-page').innerHTML = html;

                        
                        document.getElementById('create-admin').addEventListener('click', function(e) {
                            e.preventDefault();
                            
                        });

                        document.getElementById('org-overview-link').addEventListener('click', function(e) {
                            e.preventDefault();
                            fetch('university/org-overview.php')
                            .then(response => response.text())
                            .then(html => {
                                document.querySelector('.content-page').innerHTML = html;

                                document.getElementById('create-admin').addEventListener('click', function(e) {
                                    e.preventDefault();
                                    createAdmin();
                                });
                            })
                        });
                    })
                }); 
            })    
        } else {
            e.preventDefault(); 
        }

    });
});

window.addEventListener('load', () => {
    document.querySelector('.sidebar-item a#dashboard-link').click();
});

function addCollege() {
    
  }

function createAdmin() {
fetch('university/add-college.html')
    .then(response => response.text())
    .then(html => {

    $('.modal-container').html(html);
    $('#modal-create-admin').modal('show');
    $('#form-create-admin').on('submit', function(e) {
        e.preventDefault();
    });
    });
}

function addCollege() {
    $('#form-add-college').submit(function(e) {
        e.preventDefault();

        // Create FormData object to handle form data and file upload
        const formData = new FormData(this);
        
        $.ajax({
            url: 'university/addCollege.php',
            type: 'post',
            data: formData,
            processData: false, // Prevent jQuery from automatically transforming data into a query string
            contentType: false, // Prevent jQuery from setting content type
            success: function(response) {
                const res = JSON.parse(response);
    
                if (res.status === 'error') {
                    alert(res.message);
                } else {
                    alert(res.message);
                    $('#form-add-college')[0].reset(); // Reset form fields
                    $('#modal-add-college').modal('hide'); // Close modal
                }
            },
            error: function() {
                alert('An error occurred while processing the request.');
            }
        });
    });
}
