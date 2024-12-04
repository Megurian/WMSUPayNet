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
                    loadPie()
                    document.querySelector('.topnav-title').textContent = 'Dashboard';
                })
                
        }else if (this.id === 'student-link') {
            fetch('students/nav.php')
                .then(response => response.text())
                .then(html => {
                    document.querySelector('.content-page').innerHTML = html;
                    document.querySelector('.topnav-title').textContent = 'Student Payments';

                    document.querySelectorAll('.nav-item a.navi-link').forEach(link => {
                        link.addEventListener('click', function(e) {
                            e.preventDefault(); 
                    
                            document.querySelectorAll('.nav-item a.navi-link').forEach(link => link.classList.remove('link-active'));
                            this.classList.add('link-active');

                            if (this.id === 'all-link') {
                                fetch('students/all-table.php')
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('.table-content').innerHTML = html;
                                        sort()
                                        var table = $('#table-all').DataTable({
                                            dom: 'rtp',
                                            pageLength: 10,
                                            ordering: false,
                                        });
                                        
                                        document.getElementById('transaction').addEventListener('click', function(e) {
                                            e.preventDefault();
                                            showTransaction();
                                        });
                                        document.getElementById('attachment-link').addEventListener('click', function(e) {
                                            e.preventDefault();
                                            viewAttachment()
                                        });
                                    })
                            }else if (this.id === 'manual-link') {
                                fetch('students/manual-table.php')
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('.table-content').innerHTML = html;
                                        sort()

                                        var table = $('#table-all').DataTable({
                                            dom: 'rtp',
                                            pageLength: 10,
                                            ordering: false,
                                        });


                                        document.getElementById('add-student').addEventListener('click', function(e) {
                                            e.preventDefault();
                                            addStudent();
                                        });

                                        document.getElementById('add-payment').addEventListener('click', function(e) {
                                            e.preventDefault();
                                            addPayment();
                                        });

                                        document.getElementById('transaction').addEventListener('click', function(e) {
                                            e.preventDefault();
                                            showTransaction();
                                        });
                                    })      
                            }else if (this.id === 'unpaid-link') {
                                fetch('students/unpaid-table.php')
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('.table-content').innerHTML = html;
                                        sort()

                                        var table = $('#table-all').DataTable({
                                            dom: 'rtp',
                                            pageLength: 10,
                                            ordering: false,
                                        });

                                        document.getElementById('transaction').addEventListener('click', function(e) {
                                            e.preventDefault();
                                            showTransaction();
                                        });
                                    })      
                            }else if (this.id === 'request-link') {
                                fetch('students/request.php')
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('.table-content').innerHTML = html;
                                        sort()
                                        
                                        var table = $('#table-all').DataTable({
                                            dom: 'rtp',
                                            pageLength: 10,
                                            ordering: false,
                                        });

                                        document.getElementById('refund').addEventListener('click', function(e) {
                                            e.preventDefault();
                                            showRefund();
                                        });

                                    })      
                            }
                        });
                    })
                    
                    document.querySelector('.nav-item a#all-link').click();
                })
        }else if (this.id === 'fees-link') {
            fetch('fees/fees.php')
            .then(response => response.text())
            .then(html => {
                document.querySelector('.content-page').innerHTML = html;
                document.querySelector('.topnav-title').textContent = 'Fee Management';
                
                document.getElementById('add-fee').addEventListener('click', function(e) {
                    e.preventDefault();
                    addFee();
                });
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
                    var table = $('#table-all').DataTable({
                        dom: 'rtp',
                        pageLength: 10,
                        ordering: false,
                    });

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
                
        }else if (this.id === 'settings-link') {
            fetch('settings/nav.php')
                .then(response => response.text())
                .then(html => {
                    document.querySelector('.content-page').innerHTML = html;
                    document.querySelector('.topnav-title').textContent = 'Settings';

                    document.querySelectorAll('.subnav-item a.subnav-link').forEach(link => {
                        link.addEventListener('click', function(e) {
                            e.preventDefault(); 
                    
                            document.querySelectorAll('.subnav-item a.subnav-link').forEach(link => link.classList.remove('link-active'));
                            this.classList.add('link-active');

                            if (this.id === 'themes-link') {
                                fetch('settings/themes.php')
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('.settings-content').innerHTML = html;
                                        
                                    })
                            }else if (this.id === 'account-link') {
                                fetch('settings/account.php')
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('.settings-content').innerHTML = html;
                                        
                                        document.getElementById('edit-admin').addEventListener('click', function(e) {
                                            e.preventDefault();
                                            editAdmin()
                                        });

                                        document.getElementById('edit-organization').addEventListener('click', function(e) {
                                            e.preventDefault();
                                            addOrg()
                                        });

                                        document.getElementById('bug-report').addEventListener('click', function(e) {
                                            e.preventDefault();
                                            bugReport()
                                        });
                                        
                                    })
                            }else if (this.id === 'roles-link') {
                                fetch('settings/roles.php')
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('.settings-content').innerHTML = html;
                                        document.getElementById('create-admin').addEventListener('click', function(e) {
                                            e.preventDefault();
                                            createAdmin();
                                        });
                                    })
                            }
                        });
                    })
                    
                    document.querySelector('.subnav-item a#themes-link').click();
                })
        }
    });
});
window.addEventListener('load', () => {
    document.querySelector('.sidebar-item a#dashboard-link').click();
});
function addOrg() {
    fetch('settings/setting_modals.html')
      .then(response => response.text())
      .then(html => {
    
        $('.modal-container').html(html);
        $('#modal-add-organization').modal('show');
        $('#form-add-organization').on('submit', function(e) {
          e.preventDefault();
        });
      });
  }
  function viewAttachment() {
    fetch('students/attachment.html')
      .then(response => response.text())
      .then(html => {
    
        $('.modal-container').html(html);
        $('#modal-attachment').modal('show');
       
      });
  }

  function bugReport() {
    fetch('settings/setting_modals.html')
      .then(response => response.text())
      .then(html => {
    
        $('.modal-container').html(html);
        $('#modal-bug-report').modal('show');
        $('#form-bug-report').on('submit', function(e) {
          e.preventDefault();
        });
      });
  }

function editAdmin(){
    fetch('settings/setting_modals.html')
    .then(response => response.text())
    .then(html => {
  
      $('.modal-container').html(html);
      $('#modal-edit-admin').modal('show');
      $('#form-edit-admin').on('submit', function(e) {
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
function addStudent() {
    fetch('students/add-student.html')
      .then(response => response.text())
      .then(html => {
    
        $('.modal-container').html(html);
  
    
        $('#modal-add-student').modal('show');
  
    
        $('#form-add-student').on('submit', function(e) {
          e.preventDefault();
        });
      });
  }

  function addPayment() {
  fetch('students/add-payment.html')
    .then(response => response.text())
    .then(html => {

      $('.modal-container').html(html);

    
      $('#modal-add-payment').modal('show'); // Use the correct modal ID

    
      $('#form-add-payment').on('submit', function(e) {
        e.preventDefault()
      });
    });
}

function showTransaction() {
    fetch('students/transaction.html')
      .then(response => response.text())
      .then(html => {
        $('.modal-container').html(html);
        $('#modal-transaction').modal('show'); 
      });
  }

function showRefund() {
    fetch('students/refund_request.html')
      .then(response => response.text())
      .then(html => {
        $('.modal-container').html(html);
        $('#modal-refund').modal('show'); 
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





// sort
function sort(){
    const table = document.querySelector('.table');
                    const sortColumns = document.querySelectorAll('.sort-column');

                    sortColumns.forEach(column => {
                    column.addEventListener('click', () => {
                    const sortBy = column.dataset.sortBy;
                    const sortIcon = column.querySelector('.sort-icon');

                    if (sortIcon.classList.contains('asc')) {
                    sortIcon.classList.remove('asc');
                    sortData(sortBy, 'desc');
                    } else {
                    sortIcon.classList.add('asc');
                    sortData(sortBy, 'asc');
                    }
                    });
                    });

                    function sortData(sortBy, direction) {
                    const rows = Array.from(table.querySelectorAll('tbody tr'));
                    rows.sort((a, b) => {
                    const aValue = a.querySelector(`td[data-sort-by="${sortBy}"]`).textContent.trim();
                    const bValue = b.querySelector(`td[data-sort-by="${sortBy}"]`).textContent.trim();

                    if (direction === 'asc') {
                    return aValue.localeCompare(bValue);
                    } else {
                    return bValue.localeCompare(aValue);
                    }
                    });

                    rows.forEach(row => table.querySelector('tbody').appendChild(row));
                    }
}

function toggleDropdown(id) {
    var dropdown = document.getElementById(id);
    if (dropdown.style.display === 'none') {
        dropdown.style.display = 'block';
    } else {
        dropdown.style.display = 'none';
    }
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
                var table = $('#table-all').DataTable({
                    dom: 'rtp',
                    pageLength: 10,
                    ordering: false,
                });
            })
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

      function downloadReport() {
        fetch('reports/generate_report.html')
          .then(response => response.text())
          .then(html => {
        
            $('.modal-container').html(html);
            $('#modal-download-report').modal('show');
          });
      }
      function createAdmin() {
        fetch('settings/setting_modals.html')
          .then(response => response.text())
          .then(html => {
        
            $('.modal-container').html(html);
            $('#modal-create-admin').modal('show');
            $('#form-create-admin').on('submit', function(e) {
              e.preventDefault();
            });
          });
      }