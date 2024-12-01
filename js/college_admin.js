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