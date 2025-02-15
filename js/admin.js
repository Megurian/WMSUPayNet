document.querySelectorAll('.sidebar-item a.nav-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();

        document.querySelectorAll('.sidebar-item a.nav-link').forEach(link => link.classList.remove('link-active'));
        this.classList.add('link-active');

        if (this.id === 'dashboard-link') {
            
        } else if (this.id === 'university-link') {
            fetch('university/nav.php')
                .then(response => response.text())
                .then(html => {
                    document.querySelector('.content-page').innerHTML = html;
                    document.querySelector('.topnav-title').textContent = 'University';

                    document.querySelectorAll('.subnav-item a.subnav-link').forEach(link => {
                        link.addEventListener('click', function(e) {
                            e.preventDefault();

                            document.querySelectorAll('.subnav-item a.subnav-link').forEach(link => link.classList.remove('link-active'));
                            this.classList.add('link-active');

                            if (this.id === 'colleges-link') {
                                fetch('university/university.php')
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('.university-content').innerHTML = html;
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

                                        document.getElementById('update-year').addEventListener('click', function(e) {
                                            e.preventDefault();
                                            fetch('university/school-year.html')
                                                .then(response => response.text())
                                                .then(html => {
                                                    $('.modal-container').html(html);
                                                    $('#modal-update-year').modal('show');

                                                    // Attach ALL modal event listeners inside this .then() block.
                                                    $('#next-schoolyear').on('click', function() {
                                                        $('#modal-update-year').modal('hide');
                                                        $('#modal-semester').modal('show');
                                                    });

                                                    $('#back-semester').on('click', function() {
                                                        $('#modal-semester').modal('hide');
                                                        $('#modal-update-year').modal('show');
                                                    });

                                                    $('#back-enrollment').on('click', function() {
                                                        $('#modal-enrollement').modal('hide');
                                                        $('#modal-semester').modal('show');
                                                    });

                                                    $('#next-semester').on('click', function() {
                                                        $('#modal-semester').modal('hide');
                                                        $('#modal-enrollement').modal('show');
                                                    });
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

                                                        document.querySelectorAll('.organization').forEach(function(organization) {
                                                            organization.addEventListener('click', function() {
                                                                // Get the organization ID from the data attribute
                                                                const organizationId = this.dataset.organizationId;

                                                                e.preventDefault();
                                                                fetch(`university/org-overview.php?organization_id=${organizationId}`)
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
                                                                    .catch(error => console.error('Error loading organizations:', error));
                                                            });
                                                        });

                                                        // Handle dropdown clicks dynamically for organizations
                                                        document.querySelectorAll('.dropdown-menu').forEach(function(dropdown) {
                                                            dropdown.addEventListener('click', function(e) {
                                                                let collegeId = this.dataset.collegeId;
                                                                let orgId = this.dataset.organizationId;
                                                                let orgName = this.dataset.organizationName;

                                                                if (e.target.classList.contains('setPrimary')) {
                                                                    e.preventDefault();
                                                                    setPrimary(collegeId, orgId, orgName);
                                                                }

                                                                if (e.target.classList.contains('deactivate')) {
                                                                    e.preventDefault();
                                                                    alert('Organizatin Deactivated' + orgId + ' of ' + collegeId);
                                                                }

                                                                if (e.target.classList.contains('delete')) {
                                                                    e.preventDefault();
                                                                    alert('Organization Deleted' + orgId + ' of ' + collegeId);
                                                                }
                                                            });
                                                        });
                                                    })
                                                    .catch(error => console.error('Error loading organizations:', error));
                                            });
                                        });

                                        // Handle edit and delete button clicks dynamically for colleges
                                        document.querySelectorAll('.dropdown-menu').forEach(function(dropdown) {
                                            dropdown.addEventListener('click', function(e) {
                                                let collegeId = this.dataset.collegeId;

                                                if (e.target.classList.contains('edit-college')) {
                                                    e.preventDefault();
                                                    editCollege(collegeId);
                                                }

                                                if (e.target.classList.contains('delete-college')) {
                                                    e.preventDefault();
                                                    deleteCollege(collegeId);
                                                }
                                            });
                                        });
                                    });
                            } else if (this.id === 'uni-orgs-link') {
                                fetch('university/uni-level-orgs.php')
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('.university-content').innerHTML = html;

                                        document.getElementById('add-organization-uni').addEventListener('click', function(e) {
                                            e.preventDefault();
                                            addOrg();
                                        });

                                        uniOrg();
                                    });
                            }
                        });
                    });

                    document.querySelector('.subnav-item a#colleges-link').click();
                });
        } else if (this.id === 'statistic-link') {
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
                                    });
                            } else if (this.id === 'total-registered') {
                                fetch('statistics/total-registered.php')
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('.statistic-content').innerHTML = html;
                                        var table = $('#table-all').DataTable({
                                            dom: 'rtp',
                                            pageLength: 10,
                                            ordering: false,
                                        });
                                    });
                            } else if (this.id === 'total-active') {
                                fetch('statistics/total-active.php')
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('.statistic-content').innerHTML = html;
                                        var table = $('#table-all').DataTable({
                                            dom: 'rtp',
                                            pageLength: 10,
                                            ordering: false,
                                        });
                                    });
                            }
                        });
                    });
                    document.querySelector('.nav-item a#total-amount').click();
                });
        } else if (this.id === 'audit-log-link') {
            fetch('audit-and-system/audit-logs.php')
                .then(response => response.text())
                .then(html => {
                    document.querySelector('.content-page').innerHTML = html;
                    document.querySelector('.topnav-title').textContent = 'Audit Logs and System Monitoring';
                });
        } else if (this.id === 'backup-data-link') {
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
                                    });
                            } else if (this.id === 'schedule-link') {
                                fetch('backup-data/schedule-backup.php')
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('.backup-data-content').innerHTML = html;
                                    });
                            }
                        });
                    });

                    document.querySelector('.subnav-item a#backup-link').click();
                });
        } else if (this.id === 'feedback-link') {
            fetch('user_feedback/feedback.php')
                .then(response => response.text())
                .then(html => {
                    document.querySelector('.content-page').innerHTML = html;
                    document.querySelector('.topnav-title').textContent = 'User Feedback';

                    document.getElementById('attachment-link').addEventListener('click', function(e) {
                        e.preventDefault();
                        viewAttachments();
                    });

                    document.getElementById('view-userReport').addEventListener('click', function(e) {
                        e.preventDefault();
                        view_userReport();
                    });
                });
        } else if (this.id === 'maintenance-link') {
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
                                        monitoring();
                                    });
                            } else if (this.id === 'updates-link') {
                                fetch('system-maintenance/updates.php')
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('.system-maintenance-content').innerHTML = html;
                                    });
                            }
                        });
                    });

                    document.querySelector('.subnav-item a#system-maintenance-link').click();
                });
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

function uniOrg() {
    document.getElementById('uni-org').addEventListener('click', function(e) {
        e.preventDefault();
        fetch('university/uni-orgs-overview.php')
            .then(response => response.text())
            .then(html => {
                document.querySelector('.content-page').innerHTML = html;
                document.querySelector('.topnav-title').textContent = 'Report';
                var table = $('#table-all').DataTable({
                    dom: 'rtp',
                    pageLength: 10,
                    ordering: false,
                });

                document.getElementById('create-admin-uni').addEventListener('click', function(e) {
                    e.preventDefault();
                    createAdminUni();
                });

                document.getElementById('add-fee-uni').addEventListener('click', function(e) {
                    e.preventDefault();
                    addFee();
                });
            });
    });
}

function createAdminUni() {
    fetch('university/add-admin.html')
        .then(response => response.text())
        .then(html => {
            $('.modal-container').html(html);
            $('#modal-create-admin').modal('show');
            $('#form-create-admin').on('submit', function(e) {
                e.preventDefault();
            });
        });
}

function addOrg() {
    fetch('university/add-organization.html')
        .then(response => response.text())
        .then(html => {
            $('.modal-container').html(html);
            $('#modal-add-organization').modal('show');
            $('#form-add-organization').on('submit', function(e) {
                e.preventDefault();
            });
        });
}

function createAdmin() {
    $('#form-create-admin').submit(function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        $.ajax({
            url: 'logic/addCollegeAdmin.php',
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                const res = JSON.parse(response);
                if (res.status === 'error') {
                    alert(res.message);
                } else {
                    alert(res.message);
                    $('#form-create-admin')[0].reset();
                    $('#modal-create-admin').modal('hide');
                    $('.modal-container').html(html);
                }
            },
            error: function() {
                alert('An error occurred while processing the request.');
            }
        });
    });
}

function setPrimary(college_id, organization_id, organization_name) {
    if (confirm('Confirm setting ' + organization_name + ' as the primary organization for this college?')) {
        $.ajax({
            url: `logic/setPrimaryOrg.php`,
            type: 'post',
            data: JSON.stringify({ college_id: college_id, organization_id: organization_id }),
            success: function(response) {
                const res = JSON.parse(response);
                if (res.status === 'error') {
                    alert(res.message);
                } else {
                    alert(res.message);
                }
            },
            error: function() {
                alert('An error occurred while processing the request.');
            }
        });
    }
}

function UpdateYear() {
    $('#form-update-year').submit(function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        $.ajax({
            url: 'logic/modal-update-year.html',
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                const res = JSON.parse(response);
                if (res.status === 'error') {
                    alert(res.message);
                } else {
                    alert(res.message);
                    $('#form-update-year')[0].reset();
                    $('#modal-update-year').modal('hide');
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
        const formData = new FormData(this);
        $.ajax({
            url: 'logic/addCollege.php',
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                const res = JSON.parse(response);
                if (res.status === 'error') {
                    alert(res.message);
                } else {
                    alert(res.message);
                    $('#form-add-college')[0].reset();
                    $('#modal-add-college').modal('hide');
                    refreshCollegeList();
                }
            },
            error: function() {
                alert('An error occurred while processing the request.');
            }
        });
    });
}

function editCollege(collegeId) {
    fetch(`university/edit-college.php?college_id=${collegeId}`)
        .then(response => response.text())
        .then(html => {
            $('.modal-container').html(html);
            $('#editCollegeModal').modal('show');
            $('#form-edit-college').submit(function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                $.ajax({
                    url: 'logic/editCollege.php',
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        const res = JSON.parse(response);
                        if (res.status === 'error') {
                            alert(res.message);
                        } else {
                            alert(res.message);
                            $('#form-edit-college')[0].reset();
                            $('#editCollegeModal').modal('hide');
                            refreshCollegeList();
                        }
                    },
                    error: function() {
                        alert('An error occurred while processing the request.');
                    }
                });
            });
        })
        .catch(error => console.error('Error loading edit college modal:', error));
}

function deleteCollege(collegeId) {
    if (confirm('Are you sure you want to delete this college?')) {
        $.ajax({
            url: `logic/deleteCollege.php?collegeId=${collegeId}`,
            type: 'post',
            success: function(response) {
                const res = JSON.parse(response);
                if (res.status === 'error') {
                    alert(res.message);
                } else {
                    alert(res.message);
                    document.querySelector(`.college[data-college-id="${collegeId}"]`).closest('.card').remove();
                }
            },
            error: function() {
                alert('An error occurred while processing the request.');
            }
        });
    }
}

function refreshCollegeList() {
    fetch('university/university.php')
        .then(response => response.text())
        .then(html => {
            document.querySelector('.university-content').innerHTML = html;
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

            document.getElementById('update-year').addEventListener('click', function(e) {
                e.preventDefault();
                fetch('university/school-year.html')
                    .then(response => response.text())
                    .then(html => {
                        $('.modal-container').html(html);
                        $('#modal-update-year').modal('show');
                        UpdateYear();
                    });
            });

            document.querySelectorAll('.college').forEach(function(college) {
                college.addEventListener('click', function() {
                    const collegeId = this.dataset.collegeId;
                    fetch(`university/organizations.php?college_id=${collegeId}`)
                        .then(response => response.text())
                        .then(html => {
                            document.querySelector('.content-page').innerHTML = html;
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

                            document.querySelectorAll('.organization').forEach(function(organization) {
                                organization.addEventListener('click', function() {
                                    const organizationId = this.dataset.organizationId;
                                    e.preventDefault();
                                    fetch(`university/org-overview.php?organization_id=${organizationId}`)
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
                                        .catch(error => console.error('Error loading organizations:', error));
                                });
                            });
                        })
                        .catch(error => console.error('Error loading organizations:', error));
                });
            });

            document.querySelectorAll('.dropdown-menu').forEach(function(dropdown) {
                dropdown.addEventListener('click', function(e) {
                    let collegeId = this.dataset.collegeId;
                    if (e.target.classList.contains('edit-college')) {
                        e.preventDefault();
                        editCollege(collegeId);
                    }
                    if (e.target.classList.contains('delete-college')) {
                        e.preventDefault();
                        deleteCollege(collegeId);
                    }
                });
            });
        });
}

function monitoring() {
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

function loadChart() {
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
