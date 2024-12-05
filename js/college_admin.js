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
                    loadPie()
                })
                
        }else if (this.id === 'organizations-link') {
            fetch('organization/organizations.php')
                .then(response => response.text())
                .then(html => {
                    document.querySelector('.content-page').innerHTML = html;
                    document.querySelector('.topnav-title').textContent = 'Organizations';
                            document.getElementById('add-organization').addEventListener('click', function(e) {
                                e.preventDefault();
                                addOrg();
                            });
                            document.getElementById('org-overview-link').addEventListener('click', function(e) {
                                e.preventDefault();
                                fetch('organization/org-overview.php')
                                .then(response => response.text())
                                .then(html => {
                                    document.querySelector('.content-page').innerHTML = html;
                                    goBack();
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
                })
        }else if (this.id === 'student-link') {
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
                                            addStudent();
                                        });
                                    })
                            }else if (this.id === 'course-link') {
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
                
        }else  if (this.id === 'fees-link') {
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
                            }else if (this.id === 'college-link') {
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
                
        }else  if (this.id === 'logs-link') {
            fetch('logs/logs.php')
                .then(response => response.text())
                .then(html => {
                    document.querySelector('.content-page').innerHTML = html;
                    document.querySelector('.topnav-title').textContent = 'Activity Logs';

                    
                })
                
        }else  if (this.id === 'report-link') {
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
        
        else {
            e.preventDefault(); 
        }

    });
});

window.addEventListener('load', () => {
    document.querySelector('.sidebar-item a#dashboard-link').click();
});

function addStudent() {
    fetch('student/add-student.html')
      .then(response => response.text())
      .then(html => {
        $('.modal-container').html(html);
        $('#modal-add-student').modal('show');
        $('#form-add-student').on('submit', function(e) {
          e.preventDefault();
        });
      });
  }

function addOrg() {
fetch('organization/add-organization.html')
    .then(response => response.text())
    .then(html => {

    $('.modal-container').html(html);
    $('#modal-add-organization').modal('show');
    $('#form-add-organization').on('submit', function(e) {
        e.preventDefault();
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

function goBack() {
window.history.back();
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
function downloadReport() {
  fetch('reports/generate_report.html')
    .then(response => response.text())
    .then(html => {
  
      $('.modal-container').html(html);
      $('#modal-download-report').modal('show');
    });
}