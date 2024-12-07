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
                    fetch('university/add-college.php')
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
                                
                                fetch(`university/add-college.php?college_id=${collegeId}`)
                                .then(response => response.text())
                                .then(html => {
                                    $('.modal-container').html(html);
                                    $('#modal-create-admin').modal('show');
                                    createAdmin();
                                });
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
                
        }else if (this.id === 'backup-data-link') {
            fetch('backup-data/nav.php')
                .then(response => response.text())
                .then(html => {
                    document.querySelector('.content-page').innerHTML = html;
                    document.querySelector('.topnav-title').textContent = 'Backup and Data Integrity';

                    document.querySelectorAll('.subnav-item a.subnav-link').forEach(link => {
                        link.addEventListener('click', function(e) {
                            e.preventDefault(); 
                    
                            document.querySelectorAll('.subnav-item a.subnav-link').forEach(link => link.classList.remove('link-active'));
                            this.classList.add('link-active');

                            if (this.id === 'backup-link') {
                                fetch('backup-data/backup.php')
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('.backup-data-content').innerHTML = html;
                                        
                                    })
                            }else if (this.id === 'schedule-link') {
                                fetch('backup-data/schedule-backup.php')
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('.backup-data-content').innerHTML = html;
                                       
                                        
                                    })
                            }
                        });
                    })
                    
                    document.querySelector('.subnav-item a#backup-link').click();
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
            fetch('system-maintenance/nav.php')
                .then(response => response.text())
                .then(html => {
                    document.querySelector('.content-page').innerHTML = html;
                    document.querySelector('.topnav-title').textContent = 'System Maintenance and Updates';

                    document.querySelectorAll('.subnav-item a.subnav-link').forEach(link => {
                        link.addEventListener('click', function(e) {
                            e.preventDefault(); 
                    
                            document.querySelectorAll('.subnav-item a.subnav-link').forEach(link => link.classList.remove('link-active'));
                            this.classList.add('link-active');

                            if (this.id === 'system-maintenance-link') {
                                fetch('system-maintenance/maintenance.php')
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('.system-maintenance-content').innerHTML = html;
                                        monitoring()
                                    })
                            }else if (this.id === 'updates-link') {
                                fetch('system-maintenance/updates.php')
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('.system-maintenance-content').innerHTML = html;
                                       
                                        
                                    })
                            }
                        });
                    })
                    
                    document.querySelector('.subnav-item a#system-maintenance-link').click();
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
    $('#form-create-admin').submit(function(e) {
        e.preventDefault();

        // Create FormData object to handle form data and file upload
        const formData = new FormData(this);
        
        $.ajax({
            url: 'logic/addCollegeAdmin.php',
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
                    $('#form-create-admin')[0].reset(); // Reset form fields
                    $('#modal-create-admin').modal('hide'); // Close modal
                    $('.modal-container').html(html);

                }
            },
            error: function() {
                alert('An error occurred while processing the request.');
            }
        });
    });
}

function addCollege() {
    $('#form-add-college').submit(function(e) {
        e.preventDefault();

        // Create FormData object to handle form data and file upload
        const formData = new FormData(this);
        
        $.ajax({
            url: 'logic/addCollege.php',
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

function monitoring(){
    const monitoringData = {
        labels: ['00', '00', '00'],
        datasets: [{
            label: 'category 1',
            data: [0, 20, 0],
            backgroundColor: 'rgba(153, 102, 255, 0.2)',
            borderColor: 'rgba(153, 102, 255, 1)',
            borderWidth: 1
        }, {
            label: 'Category 2',
            data: [0, 0, 50],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    const errorTrackingData = {
        labels: ['00', '00', '00', '00', '00', '00', '00', '00', '00', '00', '00', '00', '00', '00', '00', '00', '00', '00', '00', '00'],
        datasets: [{
            label: 'Key title goes here',
            data: [10, 9, 8, 9, 10, 9, 8, 7, 8, 9, 10, 11, 12, 11, 10, 9, 8, 9, 10, 9],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }, {
            label: 'Key title goes here',
            data: [5, 6, 7, 6, 5, 6, 7, 8, 9, 10, 11, 12, 13, 12, 11, 10, 9, 8, 9, 10],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    const monitoringChart = new Chart(document.getElementById('monitoringChart'), {
        type: 'bar',
        data: monitoringData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const errorTrackingChart = new Chart(document.getElementById('errorTrackingChart'), {
        type: 'line',
        data: errorTrackingData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

function loadChart(){
    const chartData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Dataset 1',
            data: [-500, -200, 600, 400, 700, 100, -100],
            backgroundColor: 'rgba(9, 57, 9, 1)',
            borderColor: 'rgba(9, 57, 9, 1)',
            borderWidth: 1
        }, {
            label: 'Dataset 2',
            data: [-1200, 100, 700, 600, -200, -100, -100],
            backgroundColor: 'rgba(160, 160, 160, 1)',
            borderColor: 'rgba(160, 160, 160, 1)',
            borderWidth: 1
        }]
    };
    const paymentChart = document.getElementById('paymentChart').getContext('2d');
    const myChart = new Chart(paymentChart, {
        type: 'line',
        data: chartData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
  }