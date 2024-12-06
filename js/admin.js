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
                    
                    document.querySelector('.topnav-title').textContent = 'Dashboard';
                    loadChart()
                })
                
        }else if (this.id === 'university-link') {
            fetch('university/university.php')
            .then(response => response.text())
            .then(html => {
                document.querySelector('.content-page').innerHTML = html;
                
                document.querySelector('.topnav-title').textContent = 'University';
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

                document.querySelectorAll('.college').forEach(function(college) {
                    college.addEventListener('click', function() {
                        // Get the college ID from the data attribute
                        const collegeId = this.dataset.collegeId;
                
                        // Send the college ID to organizations.php
                        fetch(`university/organizations.php?college_id=${collegeId}`)
                            .then(response => response.text())
                            .then(html => {
                                document.querySelector('.content-page').innerHTML = html;
                
                                // Example: Bind further event listeners if needed
                                document.getElementById('create-admin').addEventListener('click', function(e) {
                                    e.preventDefault();
                                    createAdmin();
                                });
                
                                document.getElementById('org-1').addEventListener('click', function(e) {
                                    e.preventDefault();
                                    fetch('university/org-overview.php')
                                        .then(response => response.text())
                                        .then(html => {
                                            document.querySelector('.content-page').innerHTML = html;
                
                                            document.getElementById('back-button').addEventListener('click', function(e) {
                                                e.preventDefault();
                                            });
                                        });
                                });
                            })
                            .catch(error => console.error('Error loading organizations:', error));
                    });
                }); 
            })    
        }else if (this.id === 'statistic-link') {
            fetch('statistics/nav.php')
                .then(response => response.text())
                .then(html => {
                    document.querySelector('.content-page').innerHTML = html;
                    document.querySelector('.topnav-title').textContent = 'Statistics';
                    
                    document.querySelectorAll('.nav-item a.navi-link').forEach(link => {
                        link.addEventListener('click', function(e) {
                            e.preventDefault(); 
                    
                            document.querySelectorAll('.nav-item a.navi-link').forEach(link => link.classList.remove('link-active'));
                            this.classList.add('link-active');

                            if (this.id === 'total-amount') {
                                fetch('statistics/total-amount.php')
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('.statistic-content').innerHTML = html;
                                        var table = $('#table-all').DataTable({
                                            dom: 'rtp',
                                            pageLength: 10,
                                            ordering: false,
                                        });
                                    })
                            }else if (this.id === 'total-registered') {
                                fetch('statistics/total-registered.php')
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('.statistic-content').innerHTML = html;
                                        var table = $('#table-all').DataTable({
                                            dom: 'rtp',
                                            pageLength: 10,
                                            ordering: false,
                                        });
                                    })
                            }
                            else if (this.id === 'total-active') {
                                fetch('statistics/total-active.php')
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('.statistic-content').innerHTML = html;
                                        var table = $('#table-all').DataTable({
                                            dom: 'rtp',
                                            pageLength: 10,
                                            ordering: false,
                                        });
                                    })
                            }
                        });
                    })
                    document.querySelector('.nav-item a#total-amount').click();
                })
                
        }else if (this.id === 'audit-log-link') {
            fetch('audit-and-system/audit-logs.php')
                .then(response => response.text())
                .then(html => {
                    document.querySelector('.content-page').innerHTML = html;
                    document.querySelector('.topnav-title').textContent = 'Audit Logs and System Monitoring';

                })
                
        }else if (this.id === 'backup-link') {
            fetch('backup-and-data/backup.php')
                .then(response => response.text())
                .then(html => {
                    document.querySelector('.content-page').innerHTML = html;
                    document.querySelector('.topnav-title').textContent = 'Backup and Data Integrity';

                })
                
        }else if (this.id === 'feedback-link') {
            fetch('user_feedback/feedback.php')
                .then(response => response.text())
                .then(html => {
                    document.querySelector('.content-page').innerHTML = html;
                    document.querySelector('.topnav-title').textContent = 'User Feedback';

                    document.getElementById('attachment-link').addEventListener('click', function(e) {
                        e.preventDefault();
                        viewAttachments()
                    });

                    document.getElementById('view-userReport').addEventListener('click', function(e) {
                        e.preventDefault();
                        view_userReport()
                    });
                })
                
        }else if (this.id === 'maintenance-link') {
            fetch('system-maintenance/maintenance.php')
                .then(response => response.text())
                .then(html => {
                    document.querySelector('.content-page').innerHTML = html;
                    document.querySelector('.topnav-title').textContent = 'System Maintenance and Updates';

                })
                
        } else {
            e.preventDefault(); 
        }

    });
});

window.addEventListener('load', () => {
    document.querySelector('.sidebar-item a#dashboard-link').click();
});

function viewAttachments() {
    fetch('user_feedback/modals.html')
        .then(response => response.text())
        .then(html => {
    
        $('.modal-container').html(html);
        $('#modal-view-attachments').modal('show');
      
        });
    }

function view_userReport() {
    fetch('user_feedback/modals.html')
        .then(response => response.text())
        .then(html => {
    
        $('.modal-container').html(html);
        $('#modal-view-userReport').modal('show');
      
        });
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