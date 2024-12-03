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
        }
    });
});
window.addEventListener('load', () => {
    document.querySelector('.sidebar-item a#dashboard-link').click();
});


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
  


function loadChart(){
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