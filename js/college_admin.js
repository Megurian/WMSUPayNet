// Function to save the current page
function saveCurrentPage(pageId) {
    localStorage.setItem('lastVisitedPage', pageId);
}

// Function to load the last visited page
function loadLastVisitedPage() {
    if (localStorage.getItem('lastVisitedPage')) {
        const lastPage = localStorage.getItem('lastVisitedPage');
        document.querySelector(`.sidebar-item a#${lastPage}`).click();
    } else {
        document.querySelector('.sidebar-item a#dashboard-link').click();
    }
}

// Add click event listeners to all sidebar links
document.querySelectorAll('.sidebar-item a.nav-link').forEach(link => {
    link.addEventListener('click', function() {
        saveCurrentPage(this.id);
    });
});

// Load the last visited page when the window loads
window.addEventListener('load', loadLastVisitedPage);

//Navigate Sidebar using AJAX
document.querySelectorAll('.sidebar-item a.nav-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();

        document.querySelectorAll('.sidebar-item a.nav-link').forEach(link => 
            link.classList.remove('link-active'));
        this.classList.add('link-active');

        if (this.id === 'dashboard-link') {
            dashboard();
        } else if (this.id === 'organizations-link') {
            organizations();
        } else if (this.id === 'student-link') {
            studentManagement();
        } else if (this.id === 'fees-link') {
            fees();
        } else if (this.id === 'logs-link') {
            logs();
        } else if (this.id === 'report-link') {
            report();
        } else {
            e.preventDefault();
        }
    });
});


// Separate the navigation functions
//Dashboard Page AJAX
function dashboard() {
    fetch('overview.php')
        .then(response => response.text())
        .then(html => {
            document.querySelector('.content-page').innerHTML = html;
            document.querySelector('.topnav-title').textContent = 'Dashboard';
            loadPie();
        });
}

//Organization Page AJAX
function organizations() {
    fetch('organization/organizations.php')
        .then(response => response.text())
        .then(html => {
            document.querySelector('.content-page').innerHTML = html;
            document.querySelector('.topnav-title').textContent = 'Organizations';
            document.getElementById('add-organization').addEventListener('click', function(e) {
                e.preventDefault();
                addOrg();
            });

            document.querySelectorAll('.organization').forEach(function(organization) {
                organization.addEventListener('click', function() {
                    // Get the organization ID from the data attribute
                    const organizationId = this.dataset.organizationId;

                    e.preventDefault();
                    fetch(`organization/org-overview.php?organization_id=${organizationId}`)
                        .then(response => response.text())
                        .then(html => {
                            document.querySelector('.content-page').innerHTML = html;

                            document.getElementById('create-admin').addEventListener('click', function(e) {
                                e.preventDefault();
                                createAdmin();
                            });

                            document.getElementById('upload').addEventListener('click', function(e) {
                                e.preventDefault();
                                upload();
                            });
                        })
                });
            });
        })
}

//Student Page AJAX
function studentManagement() {
    fetch('student/nav.php')
        .then(response => response.text())
        .then(html => {
            document.querySelector('.content-page').innerHTML = html;
            document.querySelector('.topnav-title').textContent = 'Student Management';
            document.querySelectorAll('.nav-item a.navi-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault(); 
            
                    document.querySelectorAll('.nav-item a.navi-link').forEach(link => link.classList.remove('link-active'));
                    this.classList.add('link-active');

                    if (this.id === 'student-list-link') {
                        fetch('student/student.php')
                            .then(response => response.text())
                            .then(html => {
                                document.querySelector('.table-content').innerHTML = html;
                               
                                var table = $('#table-all').DataTable({
                                    dom: 'rtp',
                                    pageLength: 10,
                                    ordering: false,
                                });
                                
                                document.getElementById('add-student').addEventListener('click', function(e) {
                                    e.preventDefault();
                                    fetch('student/add-student.php')
                                        .then(response => response.text())
                                        .then(html => {
                                            $('.modal-container').html(html);
                                            $('#modal-add-student').modal('show');
                                            addStudent();
                                        })
                                });
                            })

                    } else if (this.id === 'course-link') {
                        fetch('student/course.php')
                            .then(response => response.text())
                            .then(html => {
                                document.querySelector('.table-content').innerHTML = html;
                                sort()
                            })
                    }
                });
            })
            document.querySelector('.nav-item a#student-list-link').click();
        })
}

//Fees Page AJAX
function fees() {
    fetch('fees/nav.php')
        .then(response => response.text())
        .then(html => {
            document.querySelector('.content-page').innerHTML = html;
            document.querySelector('.topnav-title').textContent = 'Fee Management';

            document.querySelectorAll('.nav-item a.navi-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault(); 
            
                    document.querySelectorAll('.nav-item a.navi-link').forEach(link => link.classList.remove('link-active'));
                    this.classList.add('link-active');

                    if (this.id === 'organization-list-link') {
                        fetch('fees/fees.php')
                            .then(response => response.text())
                            .then(html => {
                                document.querySelector('.table-content').innerHTML = html;
                                
                                var table = $('#table-all').DataTable({
                                    dom: 'rtp',
                                    pageLength: 10,
                                    ordering: false,
                                });
                            })

                    } else if (this.id === 'college-link') {
                        fetch('fees/college_fees.php')
                            .then(response => response.text())
                            .then(html => {
                                document.querySelector('.table-content').innerHTML = html;
                                
                                var table = $('#table-all').DataTable({
                                    dom: 'rtp',
                                    pageLength: 10,
                                    ordering: false,
                                });

                                document.getElementById('add-fee').addEventListener('click', function(e) {
                                    e.preventDefault();
                                    addFee();
                                });
                            })
                    }
                });
            })
            
            document.querySelector('.nav-item a#organization-list-link').click();
        })
}

//Logs Page AJAX
function logs() {
    fetch('logs/logs.php')
        .then(response => response.text())
        .then(html => {
            document.querySelector('.content-page').innerHTML = html;
            document.querySelector('.topnav-title').textContent = 'Activity Logs';  
        })
}

//Reports Page AJAX
function report() {
    fetch('reports/report.php')
        .then(response => response.text())
        .then(html => {
            document.querySelector('.content-page').innerHTML = html;
            document.querySelector('.topnav-title').textContent = 'Report';
            
            document.getElementById('report-form').addEventListener('click', function(e) {
                e.preventDefault();
                generateReport();
            });

            document.getElementById('download-report').addEventListener('click', function(e) {
                e.preventDefault();
                downloadReport()
            });

            document.getElementById('view-report').addEventListener('click', function(e) {
                e.preventDefault();
                fetch('reports/view-report.php')
                    .then(response => response.text())
                    .then(html => {
                        document.querySelector('.content-page').innerHTML = html;
                        document.querySelector('.topnav-title').textContent = 'Report';
                        loadChart()
                        viewDetails()

                        document.getElementById('download-report').addEventListener('click', function(e) {
                            e.preventDefault();
                            downloadReport()
                        });
                    })
            });
        }) 
}



/* LOGIC FUNCTIONS ONLY */
function addOrg() {
    fetch('organization/add-organization.php')
        .then(response => response.text())
        .then(html => {
            $('.modal-container').html(html);
            $('#modal-add-organization').modal('show');
            $('#form-add-organization').submit(function(e) {
                e.preventDefault();
        
                // Create FormData object to handle form data and file upload
                const formData = new FormData(this);
                
                $.ajax({
                    url: 'logic/addOrg.php',
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
                            $('#form-add-organization')[0].reset(); // Reset form fields
                            $('#modal-add-organization').modal('hide'); // Close modal
                            organizations();
                        }
                    },
                    error: function() {
                        alert('An error occurred while processing the request.');
                    }
                });
            });
        })
}

function addStudent() {
    $('#form-add-student').submit(function(e) {
        e.preventDefault();

        // Create FormData object to handle form data and file upload
        const formData = new FormData(this);
        
        $.ajax({
            url: 'logic/addStudent.php',
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
                    $('#form-add-student')[0].reset(); // Reset form fields
                    $('#modal-add-student').modal('hide'); // Close modal
                }
            },
            error: function() {
                alert('An error occurred while processing the request.');
            }
        });
    });
}

function addFee() {
    fetch('fees/add-fee.html')
        .then(response => response.text())
        .then(html => {

        $('.modal-container').html(html);
        $('#modal-add-fee').modal('show');
        $('#form-add-fee').on('submit', function(e) {
            e.preventDefault();
        });
        });
}

function createAdmin() {
    fetch('organization/add-admin.html')
        .then(response => response.text())
        .then(html => {

        $('.modal-container').html(html);
        $('#modal-create-admin').modal('show');
        $('#form-create-admin').on('submit', function(e) {
            e.preventDefault();
        });
        });
}
function generateReport() {
    fetch('reports/generate_report.html')
        .then(response => response.text())
        .then(html => {

        $('.modal-container').html(html);
        $('#modal-generate-report').modal('show');
        $('#form-generate-report').on('submit', function(e) {
            e.preventDefault();
        });
        });
}

function upload(){
    const logoInput = document.getElementById('logo-input');
    const logoPreview = document.getElementById('logo-preview');

    logoInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                logoPreview.src = e.target.result;
                logoPreview.style.display = 'block';
                document.querySelector('.plus-icon').style.display = 'none';
            }
            reader.readAsDataURL(file);
        } else {
            logoPreview.src = '#';
            logoPreview.style.display = 'none';
            document.querySelector('.plus-icon').style.display = 'block';
        }
    });
}

function downloadReport() {
    fetch('reports/generate_report.html')
        .then(response => response.text())
        .then(html => {
        
            $('.modal-container').html(html);
            $('#modal-download-report').modal('show');
        });
}



/* DISPLAY FUNCTIONS ONLY */
function viewFees(){
    document.getElementById('org-overview-link').addEventListener('click', function(e) {
        e.preventDefault();
        fetch('fees/view-fees.php')
        .then(response => response.text())
        .then(html => {
            document.querySelector('.content-page').innerHTML = html;
        })
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

function viewDetails(){
  document.getElementById('view-details').addEventListener('click', function(e) {
      e.preventDefault();
      fetch('reports/view-details.php')
      .then(response => response.text())
      .then(html => {
          document.querySelector('.content-page').innerHTML = html;
          document.querySelector('.topnav-title').textContent = 'Report';
      })
  });
}

function loadPie(){
  const paymentChartCanvas = document.getElementById('paymentChart');
  const paymentChart = new Chart(paymentChartCanvas, {
      type: 'pie',
      data: {
          labels: ['Full', 'Partial', 'Unpaid', 'Due'],
          datasets: [{
              label: 'Payment Status',
              data: [70, 20, 5, 5], 
              backgroundColor: [
                  '#093909',
                  '#84AE84',
                  '#A0A0A0',
                  '#EB1111'
              ],
              borderColor: [
                  '#093909',
                  '#84AE84',
                  '#A0A0A0',
                  '#EB1111'
              ],
              borderWidth: 1
          }]
      },
      options: {
          responsive: true,
          plugins: {
              legend: {
                  position: 'bottom'
              }
          }
      }
  });
}

